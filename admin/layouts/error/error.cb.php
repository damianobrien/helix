<?php
class ErrorLayout extends Layout {
	
	public $statusCode;
	public $message;
	
	public function __construct($statusCode=null, $message=null) {
		$this->statusCode = $statusCode;
		$this->message = $message;
		$this->layoutPath = dirname(__FILE__) . "/error.php";
		$this->initialize();
	}
	
	public function initialize() {
		if (isset($this->statusCode)) {
			$this->title = "{$this->statusCode} Error - " . alt(val(Response::$statusTexts, $this->statusCode), "Unknown");
		} else {
			$this->title = "Application Error";
		}
	}
	
	public function setHeaders() {
		if (isset($this->statusCode)) {
			Response::setStatus($this->statusCode);
		}
	}
	
	public function insertError() {
		global $config;
		$error = alt($this->statusCode, "general");
		include("{$config["root"]}/errors/{$error}.php");
	}
	
}
?>