<?php
/**
 * A class containing the response data and methods to manipulate it
 * 
 * @author Johnathan Hebert <johnathan@jdcommerce.com>
 */
class HTMLResponse extends Response {
	
	public $html;
	
	/**
	 * Construct the new Response object
	 */
	public function __construct(array $segments=null) {
		global $config;
		$segments = (isset($segments) && count($segments)>0) ? $segments : explode("/", $config["home"]);
		$args = array();
		
		// Request a block directly
		if (val($segments, 0)==="_blocks") {
			$this->setBlockResponse($segments);
			
		// Request a layout directly
		} else if (val($segments, 0)==="_layouts") {
			$this->setLayoutResponse($segments);
			
		// Request a page directly (default)
		} else {
			$this->setPageResponse($segments);
		}
	}
	
	private function setPageResponse($segments) {
		global $config;
		$classes = array();
		$args = array();
		for ($len=count($segments); $len>0; $len--) {
			$path = $config["root"] . DS . "pages" . DS . implode(DS, array_slice($segments, 0, $len));
			if (is_file("{$path}.php") || is_file($path . DS . basename($path) . ".php")) {
				$page = basename($path);
				$folder = is_file("{$path}.php") ? dirname($path) : $path;
				$args = $len<count($segments) ? array_slice($segments, $len) : array();
				$className = toPascalCase($page) . "Page";
				if (!isset($pageFolder)) $pageFolder = $folder;
				if (!isset($activePage)) $activePage = $page;
				if (is_file($folder . DS . "{$page}.cb.php")) {
					array_unshift($classes, $folder . DS . "{$page}.cb.php");
					if (!isset($class)) $class = $className;
				}
			}
		}
		
		foreach ($classes as $pageClass) {
			include($pageClass);
		}
		
		if (!isset($class)) {
			$class = isset($config["default_layout"]) ? toPascalCase($config["default_layout"]) . "Layout" : "Layout";
		}
		
		if (isset($page)) {
			$this->html = new $class($args);
			$this->html->name = $page;
			$this->html->path = (isset($pageFolder) && isset($activePage)) ? $pageFolder . DS . "{$activePage}.php" : null;
		}
	}
	
	private function setBlockResponse($segments) {
		if (count($segments)>=2) {
			$this->html = Block::load($segments[1], array_slice($segments, 2));
		}
	}
	
	private function setLayoutResponse($segments) {
		if (count($segments)>=2) {
			$this->html = Layout::load($segments[1], array_slice($segments, 2));
		}
	}
	
	public function authenticate() {
		return $this->html->authenticate();
	}
	
	public function authorize() {
		return $this->html->authorize();
	}
	
	/**
	 * Execute any action specified in the request
	 */
	public function executeAction() {
		return $this->html->executeAction(Request::$action);
	}

	/**
	 * Gather all of the response data in a common format
	 */
	public function gatherData() {
		$this->html->gatherData();
	}
	
	/**
	 * Set any response headers before the output is sent to the client system
	 */
	public function setHeaders() {
		$this->html->setHeaders();
	}
	
	/**
	 * Format the response data to appropriately handle the request
	 */
	public function format() {
		$this->html->format();
	}
	
	/**
	 * Filter the response output if necessary
	 */
	public function filter() {
		$this->html->filter();
	}
	
	/**
	 * Cache the response if necessary
	 */
	public function cache() {
		$this->html->cache();
	}
	
	/**
	 * Log any information for this response
	 */
	public function log() {
		$this->html->log();
	}
}
?>
