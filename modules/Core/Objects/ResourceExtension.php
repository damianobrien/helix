<?php
/**
 * This is an extension of the ResourceRelationships class in the Helix Class Library
 * 
 * Add methods and/or properties to this class to extend the functionality of the
 * Resource class family.  Changes to this class will affect all sites that use
 * this installation of the Helix Class Library.
 * 
 * If you need to customize this class for a single site, custom code should be placed
 * in a class called Resource, and should extend the ResourceExtension class.
 * The custom code file should be in the site folder called: library/Resource.php
 * 
 * Object -> Resource
 */
class ResourceExtension extends ResourceRelationships {
	
	public $tempPath;
	
	public function __construct($id=null, $hash=null, $path=null) {
		parent::__construct($id, $hash);
		if (isset($path) && is_file($path)) {
			$this->tempPath = $path;
			$this->name = basename($path);
			$this->mimeType = File::mime($path);
			$this->bytes = filesize($path);
		}
	}
	
	public function getFileName() {
		return "{$this->hash}.{$this->name}";
	}
	
	public function getAbsoluteFolder() {
		return $this->getBaseFolder() . $this->getRelativeFolder(); 
	}
	
	private function getBaseFolder() {
		return realpath(".") . "/resources/data";
	}
	
	private function getRelativeFolder() {
		return isset($this->folder) ? "/{$this->folder}" : "";
	}
	
	public function  getAbsolutePath() {
		return $this->getAbsoluteFolder() . "/" . $this->getFileName();
	}
	
	public function getWebPath() {
		return "/resources/data" . $this->getRelativeFolder() . "/" . $this->getFileName();
	}

	public function insert() {
		parent::insert();
		if (isset($this->tempPath) && is_file($this->tempPath)) {
			rename($this->tempPath, $this->getAbsolutePath());
			$this->tempPath = null;
		}
	}

}
?>