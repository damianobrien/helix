<?php
/**
 * An HTML Block Object
 * 
 * @author Johnathan Hebert <johnathan@jdcommerce.com>
 */
class Block extends HTML {
	
	public function __construct() {
		global $config;
	}
	
	public static function load($name) {
		global $config, $session;
		$folder = "{$config["root"]}/blocks/{$name}";
		$className = toPascalCase($name) . "Block";
		if (is_file("{$folder}/{$name}.php")) {
			if (is_file("{$folder}/{$name}.cb.php")) {
				include_once("{$folder}/{$name}.cb.php");
				$block = new $className();
				$block->path = "{$folder}/{$name}.php";
			} else {
				$block = new Block();
				$block->path = "{$folder}/{$name}.php";
			}
			return $block;
		} else if (is_file("{$config["root"]}/blocks/{$name}.php")) {
			$block = new Block();
			$block->path = "{$config["root"]}/blocks/{$name}.php";
			return $block;
		} else {
			return Helix::setError(404, "Failed to load block: {$name}")->html;
		}
	}
	
	public function render() {
		global $config, $session;
		include($this->path);
	}
	
	public static function show($name) {
		global $config, $session;
		$block = Block::load($name);
		
		if ($block->authenticate()===false) {
			self::setError(403, "Authentication failed for this request");
		}
		
		if ($block->authorize()===false) {
			self::setError(403, "You are not authorized to make this request");
		}
		
		$block->gatherData();
		$block->setHeaders();
		$block->format();
		$block->filter();
		$block->cache();
		$block->send();
		$block->cleanup();
		$block->log();
	}
	
}
?>
