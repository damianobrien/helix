<?php
class DefaultLayout extends Layout { 
	
	public function initialize() {
		global $config;
		$this->title = $config["title"];
	}
	
}
?>