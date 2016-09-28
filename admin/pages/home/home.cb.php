<?php
class HomePage extends DefaultLayout {
	
	public function initialize() {
		parent::initialize();
		$this->addStyle(url("/resources/styles/bundle.php"));
		$this->addScript(url("/resources/scripts/bundle.php"));
	}
	
}
?>