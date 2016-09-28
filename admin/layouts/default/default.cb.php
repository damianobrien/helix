<?php
class DefaultLayout extends Layout { 
	
	public function initialize() {
		global $config;
		$this->title = $config["title"];
		$this->addStyle(url("/_shared/extjs/3.3.1/resources/css/ext-all.css"));
		$this->addStyle(url("/_shared/extjs/3.3.1/resources/css/xtheme-gray.css"));
		$this->addScript(url("/_shared/extjs/3.3.1/adapter/ext/ext-base.js"));
		$this->addScript(url("/_shared/extjs/3.3.1/ext-all.js"));
	}
	
}
?>