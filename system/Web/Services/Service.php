<?php
/**
 * A Service Object
 * 
 * @author Johnathan Hebert <johnathan@jdcommerce.com>
 */
class Service extends Object {
	
	public $data;
	public $output;
	
	public function __construct() {
		
	}
	
	public function executeAction($action, array $args) {
		$this->data = $this->{$action}($args);
	}

	public function gatherData() {
	}
	
	public function setHeaders() {
		if (val(Request::$data, "format")==="json") {
			Response::setHeader("Content-Type", "application/json");
		} else {
			Response::setHeader("Content-Type", "text/plain");
		}
	}
	
	public function format() {
		$format = Request::param("format");
		$contentType = Request::header("Content-Type");
		if ((strlen($format)>0 && $format!=="json") || (strlen($contentType)>0 && $contentType!=="application/json")) {
			$this->output = $this->data;
		} else {
			$this->output = json_encode($this->data);
		}
	}
	
	public function filter() {
	}
	
	public function cache() {
	}
	
	public function send() {
		echo $this->output;
		if (OutputBuffer::isActive()) {
			OutputBuffer::flush();
		}
	}
	
	public function cleanup() {
	}
	
	public function log() {
	}
	
}
?>