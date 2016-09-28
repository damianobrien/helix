<?php
/**
 * Global session object to be used with Helix applications
 * 
 * @var Session
 */
$session;

/**
 * Locate class files and automatically load them on first use
 * 
 * @param string $class
 */
function autoload($class) {
	$libraryLocation = "library/{$class}.php";
	$generatedLocation = "library/Generated/{$class}.php";
	$absoluteLocation = val(Helix::$classes, $class);
	$helixLocation = Helix::$path . "/" . val(Helix::$classes, $class);
	if (is_file($libraryLocation)) {
		include($libraryLocation);
		Helix::$autoloaded[$class] = $libraryLocation;
	} else if (is_file($absoluteLocation)) {
		include($absoluteLocation);
		Helix::$autoloaded[$class] = $absoluteLocation;
	} else  if (is_file($generatedLocation)) {
		include($generatedLocation);
		Helix::$autoloaded[$class] = $generatedLocation;
	} else if (is_file($helixLocation)) {
		include($helixLocation);
		Helix::$autoloaded[$class] = $helixLocation;
	} else {
		return false;
	}
}

function logMessage($file, $message=null) {
	global $config, $session;
	if ($config["enable_log"]) {
		$logFile = $config["log_prefix"] . $file;
		$path = "logs/{$logFile}";
        $time = "[" . date("d-M-Y H:i:s") . "]";
        $requestId = "[" . Request::$id . "]";
		$sessionHash = "[" . ($session ? $session->hash : "NO SESSION") . "]";
		$username = "[" . (isTrue($config["enable_session"]) && $session && $session->getUserId()>0 ? $session->user->username : "Anonymous") . "]";
		$ip = "[" . Request::$remoteAddress . "]";
		$text = "{$time} {$requestId} {$sessionHash} {$username} {$ip} {$message}";
		if (is_file($path) && date("Ymd")>date("Ymd", filemtime($path))) {
            rename($path, "logs/archive/" . str_replace(".log", date(".Ymd", filemtime($path)) . ".log", $logFile));
			file_put_contents($path, $text);
		} else {
            $entry = (count(Request::$logs)===0 ? NL : "") . NL . $text; 
			file_put_contents($path, $entry, FILE_APPEND);
		}
        Request::$logs[] = $text;
	}
}

function debug($message=null,$file=null) {
	$text = $message;
	$host = Request::$url->host;
	$prefix = strlen($host) > 0 ? "{$host}." : "";
	
	if(is_null($file)){
		logMessage("{$prefix}debug.log", $text);
	} else {
		logMessage($file, $text);
	}
}

function logException($e, $type=null) {
	$reflector = new ReflectionClass($e);
	$extra = isset($type) ? " [{$type}]" : null;
	debug("{$reflector->name}{$extra}: " . $e->getMessage() . NL . $e->getTraceAsString() . NL);
}


function helixErrorHandler($errno, $error, $file=null, $line=null) {
	debug("PHP Error {$errno}: {$error} in {$file} on line {$line}");
	return false;
}

/**
 * Define this function for PHP version < 5.3
 */
if (!function_exists("lcfirst")) {
	function lcfirst($string) {
		return strtolower($string[0]) . substr($string, 1);
	}
}

/**
 * Convert a string to Camel Case by capitalizing each first letter that follows
 * a space, tab, underscore or dash -- and converting the rest to lower case
 * 
 * @param string $string
 */
function camel($string) {
	$parts = preg_split('/[\s_\-]+/i',strtolower($string));
	$camel = array_shift($parts) . str_replace(" ","",ucwords(implode(" ",$parts)));
	return $camel;
}

/**
 * Plucks the property value from each object and returns them in an array
 * 
 * @param array $objects
 * @param string $property
 */
function pluck(array $objects, $property) {
	$properties = array();
	
	foreach ($objects as $object) {
		$properties[] = $object->{$property};
	}
	
	return $properties;
}

/**
 * Return a date and time string formatted as YYYY-MM-DD HH:MM:SS
 */
function timestamp($includeTime=true, $includeDate=true) {
	$parts = array();
	if ($includeDate) {
		$parts[] = "Y-m-d";
	}
	if ($includeTime) {
		$parts[] = "H:i:s";
	}
	$format = implode(" ", $parts);
	return date($format);
}

/**
 * Return the first non-null parameter, or null if all are null
 * 
 * @param mixed Accept a variable number of parameters
 * @return mixed
 */
function alt() {
	foreach (func_get_args() as $arg) {
		if (!is_null($arg)) {
			return $arg;
		}
	}
	
	return null;
}

/**
 * Return a boolean value that converts common strings that represent boolean true
 * 
 * The $value will be converted to string and will be considered true if it is one
 * of the following (case-insensitive): 1 | y | yes | true | on
 * 
 * @param mixed $value
 * @return bool
 */
function isTrue($value) {
	return is_bool($value) ? $value : (bool)preg_match('/^(1|y|yes|true|on)$/i',(string)$value);
}

function isFalse($value) {
	return !isTrue($value);
}

/**
 * Check if an array key exists before attempting to access its value
 * 
 * @param array $array
 * @param mixed $key
 * @return mixed
 */
function val(array $array, $key) {
	return array_key_exists($key, $array) ? $array[$key] : null;
}

/**
 * Return a value from the request array
 *
 * @param mixed $key
 * @return mixed
 */
function req($key) {
	return val(Request::$data, $key);
}

/**
 * Turn an array into a parameter string separated by the delimiter
 * 
 * For arrays of arrays, or arrays of objects, specify a valueItem as an index
 * or property of the value to be used as the parameter value
 *
 * @param array $array
 * @param string|int|null $valueItem
 * @param string $delimiter
 * @return string
 */
function paramify(array $array, $valueItem=null, $delimiter="&", $hiddenKeyRegex=null) {
	$params = array();
	foreach ($array as $key=>$value) {
		if (isset($hiddenKeyRegex) && preg_match($hiddenKeyRegex, $key)) {
			$value = "{HIDDEN}";
		} else if (is_array($value)) {
			$value = $value[$valueItem];
		} else if (is_object($value)) {
			$value = $value->{$valueItem};
		}
		$params[] = "{$key}=" . json_encode($value);
	}
	return implode($delimiter, $params);
}

function url($url) {
	return HTML::url($url);
}

function hurl($url) {
	echo HTML::url($url);
}

function encode($string) {
	return HTML::encode($string);
}

function hencode($string) {
	echo HTML::encode($string);
}

function show($block) {
	Block::show($block);
}

function copyFolder($source, $target) {
	if (is_dir($source)) {
		@mkdir($target, 0777, true);
		$d = dir($source);
		while (false !== ($entry = $d->read())) {
			if ($entry == '.' || $entry == '..') {continue;}
			$path = "{$source}/{$entry}";
			if (is_dir($path)) {
				if (!stristr($path,".svn")) {
					copyFolder($path, "{$target}/{$entry}");
				}
				continue;
			}
			if (!stristr($path,".svn")) {
				copy($path, "{$target}/{$entry}");
			}
		}
		$d->close();
	} else {
		copy($source, $target);
	}
}
	
function toPascalCase($string) {
	$segments = preg_split('/[\s_-]+/i', $string);
	foreach ($segments as &$segment) {
		$segment = ucfirst(strtolower($segment));
	}
	return implode("", $segments);
}

/**
* Convert BR tags to newlines and carriage returns.
*
* @param string The string to convert
* @return string The converted string
*/
function br2nl ( $string )
{
    return preg_replace('/\<br(\s*)?\/?\>/i', PHP_EOL, $string);
}
?>