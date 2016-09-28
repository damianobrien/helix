<?php
/**
 * An class representing the Helix Class Library
 * 
 * @author Johnathan Hebert <johnathan@jdcommerce.com>
 */
class Helix {
	
	/**
	 * Path to the Helix folder
	 * 
	 * @var string 
	 */
	public static $path;
	
	/**
	 * An object that inherits Response, depending on the type of request 
	 * 
	 * @var Response
	 */
	public static $response;
	
	/**
	 * An array for the __autoload() method to lookup class paths 
	 * 
	 * @var array
	 */
	public static $classes = array();
	
	/**
	 * An array of the autoloaded classes 
	 * 
	 * @var array
	 */
	public static $autoloaded = array(); 

	
	
	/**
	 * This class contains only static methods and should not be constructed
	 */
	private function __construct() {
		
	}
	
	/**
	 * Initialize the static properties, define constants, etc
	 */
	public static function initialize() {
		global $config, $session;
		self::$path = dirname(dirname(__FILE__));
		self::load("system/Global");
		spl_autoload_register("autoload");
		set_error_handler("helixErrorHandler");
		self::defineConstants();
		$systemClasses = json_decode(file_get_contents(self::$path . "/config/helix.classes.json"), true);
		$siteConfigPath = val(glob("library/Config/*.classes.json"), 0);
		if (file_exists($siteConfigPath)) {
			$siteClasses = json_decode(file_get_contents($siteConfigPath), true);
		} else {
			$siteClasses = array();
		}
		$otherClasses = self::findOtherClasses();
		self::$classes = array_merge($systemClasses, $siteClasses, $otherClasses);
		$session = Session::getActiveSession();
		
		self::logRequest();
	}
	
	private static function findAllCodebehindFiles($start) {
		$folder = realpath($start);
		$paths = array();
		if (is_dir($folder)) {
			foreach (glob("{$folder}/*") as $path) {
				if (preg_match('/\.cb\.php$/', $path)>0 && is_file($path)) {
					$paths[] = $path;
				} else if (is_dir($path)) {
					$paths = array_merge($paths, self::findAllCodebehindFiles($path));
				}
			}
		}
		return $paths;
	}
	
	private static function findOtherClasses() {
		global $config;
		$classes = array();
		$map = array(
		    "layouts"=>"Layout",
		    "blocks"=>"Block"
		);
		foreach (array_keys($map) as $type) {
			foreach (glob("{$config["root"]}/{$type}/*/*.php") as $path) {
				if (preg_match('/^(.*)\.cb\.php$/', basename($path), $matches)>0) {
					$class = ucfirst(strtolower($matches[1])) . $map[$type];
					$classes[$class] = str_replace("\\", "/", preg_replace('/^' . preg_quote(dirname(__FILE__) . DS, "/") . '/i', '', $path));
				}
			}
		}
		return $classes;
	}
	
	private static function logRequest() {
		global $config;
        //Exclude specified url paths from log
		if (array_key_exists("log_exclude_url_pattern",$config) && $config["log_exclude_url_pattern"] && preg_match($config["log_exclude_url_pattern"], Request::$url->path)) return;
		
		//don't log request if log_exclude_request = true in site
		if (array_key_exists("log_exclude_request",$config) && $config["log_exclude_request"]) return;
		if (!preg_match('/^\/_shared/i', Request::$url->path)) {
			$method = Request::$method;
			$url = Request::$url->getFullURL();
			$postData = Request::$method==="POST" ? " [POST:" . paramify(Request::$post, null, "&", "/password/i") . "]" : " [NO POST]";
			$fileData = count(Request::$files)>0 ? " [FILES:" . paramify(Request::$files, "name") . "]" : " [NO FILES]";
			$cookies = count(Request::$cookies)>0 ? " [COOKIES:" . paramify(Request::$cookies) . "]" : " [NO COOKIES]";
			$userAgent = " [USER-AGENT:{$_SERVER["HTTP_USER_AGENT"]}]";
			$referer = strlen(val($_SERVER, "HTTP_REFERER"))>0 ? " [REFERER:{$_SERVER["HTTP_REFERER"]}]" : " [NO REFERER]";
			debug("{$method} {$url}{$postData}{$fileData}{$cookies}{$referer}{$userAgent}");
			if ($config["enable_helix_log_db"]) {
				$postData = Request::$method==="POST" ? paramify(Request::$post, null, "&", "/password/i"): null;
				$fileData = count(Request::$files)>0 ? paramify(Request::$files, "name") : null;
				$cookies = count(Request::$cookies)>0 ? paramify(Request::$cookies) : null;
				$referer = strlen(val($_SERVER, "HTTP_REFERER"))>0 ? " [REFERER:{$_SERVER["HTTP_REFERER"]}]" : null;
				
				$path = alt(preg_replace('/^' . preg_quote($config["webroot"],"/") . '\/?/i', '/', Request::$url->path));
				$segments = preg_split('/[\/]/', $path, null, PREG_SPLIT_NO_EMPTY);
				if(!(preg_match('/dev\./i', Request::$headers["Host"])) && (
						preg_match('/(\.exe|\.jar)/i', $segments[count($segments)-1])||!stristr($segments[count($segments)-1],".")
					)
				)
				{
					Helix::logRequestDb(
						$method,
						$url,
						$postData,
						$fileData,
						$cookies,
						$referer,
						$_SERVER["HTTP_USER_AGENT"]);
				}
			}
		}
	}
	
	private static function logRequestDb($method,$url,$postData,$fileData,$cookies,$referer,$userAgent) {
		global $config,$session;
		$db = DatabaseFactory::createDatabase("mysql",$config["mysql_helix_log_host"], $config["mysql_helix_log_user"], $config["mysql_helix_log_password"], $config["mysql_helix_log_database"], $config["mysql_helix_log_port"]);
		
		$requestHash = Request::$id;
		$sessionHash = $session->hash;
		$username = (isTrue($config["enable_session"]) && $session->getUserId()>0 ? $session->user->username : null);
		$ip = Request::$remoteAddress;
		
		$query = implode(NL, array("INSERT INTO {$db->le}debug{$db->re} (",
			"	{$db->le}requestHash{$db->re}, {$db->le}session{$db->re}, {$db->le}user{$db->re}, {$db->le}ip{$db->re}, {$db->le}method{$db->re}, {$db->le}url{$db->re}, {$db->le}post{$db->re}, {$db->le}file{$db->re}, {$db->le}cookies{$db->re}, {$db->le}referer{$db->re}, {$db->le}agent{$db->re}",
			") VALUES (",
				$db->queryValue(trim($requestHash)) . ",",
				$db->queryValue(trim($sessionHash)) . ",",
				$db->queryValue(trim($username)) . ",",
				$db->queryValue(trim($ip)) . ",",
				$db->queryValue(trim($method)) . ",",
				$db->queryValue(trim($url)) . ",",
				$db->queryValue(trim($postData)) . ",",
				$db->queryValue(trim($fileData)) . ",",
				$db->queryValue(trim($cookies)) . ",",
				$db->queryValue(trim($referer)) . ",",
				$db->queryValue(trim($userAgent)),
			")"
		));
		
		$status = $db->query($query);
		return $status;
	}

	/**
	 * Locate and include the class file using the given class name
	 * 
	 * @param string $class The path to the class to be loaded
	 * @return bool True if the class was successfully included
	 */
	private static function loadClass($class) {
		$loaded = false;
		
		$paths = array(
			$class,
			"{$class}.php",
			self::$path . "/{$class}",
			self::$path . "/{$class}.php"
		);
		
		foreach ($paths as $path) {
			if (is_file($path)) {
				$loaded = (bool)include_once($path);
				break;
			}
		}
		
		return $loaded;
	}
	
	/**
	 * Locate and include all the class files in the given namespace
	 * 
	 * @param string $namespace The path to the namespace relative to Helix/
	 * @return bool True if all classes in the namespace were included
	 */
	private static function loadNamespace($namespace) {
		$loaded = true;
		
		$path = self::$path . "/{$namespace}";
		if (file_exists($path)) {
			$classPathList = glob("{$path}/*.php");
			foreach ($classPathList as $classPath) {
				$loaded = $loaded && self::loadClass($classPath);
			}
		}
		
		return $loaded;
	}
	
	/**
	 * Load the class or namespace given
	 * 
	 * @param string $classOrNamespace
	 */
	public static function load($classOrNamespace) {
		$loaded = false;
		
		// Attempt to load the class or alternatively the namespace
		$loaded = self::loadClass($classOrNamespace) || self::loadNamespace($classOrNamespace);
		
		return $loaded;
	}
	
	public static function getResponse($path=null) {
		global $config;
		
		/* if ($config["enable_cache"]) {
			$cache = CacheResponse::findCache();
			if ($cache !== false) {
				return new CacheResponse($cache);
			}
		} */
		
		$path = alt($path, preg_replace('/^' . preg_quote($config["webroot"],"/") . '\/?/i', '/', Request::$url->path));
		$segments = preg_split('/[\/]/', $path, null, PREG_SPLIT_NO_EMPTY);
		$isResource = is_file("{$config["root"]}{$path}");
		$isPageResource = is_file("{$config["root"]}/pages{$path}");
		
		// Direct request for a resource
		if ($isResource) {
			$response = new WebFileResponse($path);
			
		// Request for a resource in a page folder
		} else if ($isPageResource) {
			//debug("page resource: "."/pages{$path}");
			$response = new WebFileResponse("/pages{$path}");
			
		// Request for a shared resource in the helix resources folder
		} else if (val($segments, 0)==="_shared") {
			$response = new WebFileResponse(self::$path . "/resources/" . implode("/", array_slice($segments,1)), true);
			
		// Request for a web service
		} else if (val($segments, 0)==="_services") {
			if (count($segments)>=2) {
				$response = new ServiceResponse(array_slice($segments,1));
				if (is_null($response->service)) {
					$response = Helix::setError(400, "Requested service not found: {$segments[1]}");
				} else if (count($segments)===2) {
					$response = Helix::setError(400, "An action must be requested for this service: {$segments[1]}");
				}
			} else {
				$response = Helix::setError(400, "No service was requested");
			}

        }
        //if alternete  route defined in config/site.php $config["routes"]
		else if (array_key_exists("/".val($segments, 0),$config["routes"])){
            $response = new WebFileResponse($config["root"] . $config["routes"]["/".val($segments, 0)] . implode("/", array_slice($segments,1)), true);
        }
        // Request for a page
        else {
			$response = new HTMLResponse($segments);
			if (is_null($response->html)) {
				$response = Helix::setError(404, "Requested item not found: {$path}");
			}
		}
		
		return $response;
	}
	
	/**
	 * Set the Response to an ErrorResponse with the given status code
	 * 
	 * This will set the static response property of this object to be
	 * reset to an ErrorResponse object for the remainder of the processing
	 * @param int $statusCode The HTTP status code of the error
	 */
	public static function setError($statusCode, $message=null) {
		global $config;
		include_once($config["root"] . DS . "layouts" . DS . "error" . DS . "error.cb.php");
		self::$response = new ErrorResponse($statusCode, $message);
		return self::$response;
	}

	/**
	 * Respond to the request using the given configuration
	 * 
	 * @param array $config
	 */
	public static function respond() {
		// Determine the type of response based on the request URL and data
		self::$response = self::getResponse();
		
		// Authenticate the request and respond with an error upon failure
		if (self::$response->authenticate()===false) {
			self::setError(401, "Authentication failed for this request");
		}
		
		// Authorize the request and respond with an error upon failure
		if (self::$response->authorize()===false) {
			self::setError(401, "You are not authorized to make this request");
		}
		
		// Execute any action specified in the request and capture the output
		$output = self::$response->executeAction();
		
		// If an action was requested, then send back the output, otherwise continue responding
		if ((self::$response instanceof HTMLResponse) && isset(Request::$action)) {
			echo $output;
		} else { 
			self::$response->gatherData();
			self::$response->setHeaders();
			self::$response->format();
			self::$response->filter();
			self::$response->cache();
			self::$response->send();
			self::$response->cleanup();
			self::$response->log();
		}
	}
	
	public static function defineConstants() {
		global $config;
		define("DS", DIRECTORY_SEPARATOR);
		define("PS", PATH_SEPARATOR);
		define("CR", "\r");
		define("NL", "\n");
		define("CN", "\r\n");
		define("TAB", "\t");
		define("SITE", preg_replace('/\.classes\.json$/i', '', basename(
			val(
				glob($config["root"] . DS . "library" . DS . "Config" . DS . "*.classes.json"), 0
			)
		)));
	}
	
	public static function mapSystemClasses($folder=null) {
		$folder = is_null($folder) ? self::$path : $folder;
		foreach (glob("{$folder}/*") as $path) {
			if (is_file($path) && preg_match('/^[A-Z].*\.php$/', basename($path))) {
				self::$classes[basename($path, ".php")] = $path;
			} else if (is_dir($path)) {
				self::mapSystemClasses($path);
			}
		}
	}
	
}

//-----------------------------------------------------------------------------

/**
 * Initialize the Helix Class Library
 * 
 * This method will load basic classes and set foundation properties of the
 * Helix Class Library.
 */
Helix::initialize();
?>
