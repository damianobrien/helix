<?php
class CreateApplicationPage extends Layout {
	
	public function initialize() {
		parent::initialize();
		$this->title = "Create A Helix Application";
	}
	
	public function createApplication() {
		global $config;
		$applicationName = trim(val(Request::$data, "application-name"));
		if (preg_match('/^.+$/i', $applicationName)) {
			$source = "{$config["root"]}/resources/setup";
			$target = dirname($config["helix"]) . DS . $applicationName;
			if (!file_exists($target)) {
				copyFolder($source, $target);
				copy("{$target}/config/server.default.php", "{$target}/config/server.php");
				echo "Successfully created {$applicationName} at {$target}";
			} else {
				echo "Error - {$target} folder already exists";
			}
		} else {
			echo "Application Name is not valid!";
		}
	}
	
}
?>