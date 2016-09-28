<?php
/**
 * A class containing the response data and methods to manipulate it
 * 
 * @author Johnathan Hebert <johnathan@jdcommerce.com>
 */
class CacheResponse extends Response {
	public $cache;
	
	public function __construct($cache=null) {
		$this->cache = isset($cache) ? $cache : self::findCache();
	}
	
	public static function findCache() {
		global $config;
		$key = sha1(Request::$url->getFullURL());
		$path = "{$config["root"]}/cache/{$key}.html";
		debug("Test: " . (time() - filemtime($path)));
		if (is_file($path) && time()-filemtime($path)<=$config["cache_duration"]) {
			return file_get_contents($path);
		} else {
			unset($path);
			return false;
		}
	}
	
	public function send() {
		echo $this->cache;
	}
}
?>
