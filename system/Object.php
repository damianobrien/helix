<?php
class Object {
	
	public function __toString() {
		return print_r($this, true);
	}
	
	public function getClass() {
		return get_class($this);
	}
	
	protected function log() {	}
	
	public function getArray() {
		return get_object_vars($this);
	}
	
	public function getProperties() {
		return array_keys($this->getArray());
	}
	
	public function getJson() {
		return json_encode($this);
	}
	
	public function hasProperty($property) {
		return in_array($property, $this->getProperties());
	}
	
	public function __get($property) {
		if (method_exists($this, "get{$property}")) {
			return $this->{"get{$property}"}();
		} else if (strstr($property, "_")) {
			list($type, $method) = explode("_", $property, 2);
			return method_exists($this, "get{$method}") ? $this->{"get{$method}"}($type) : null;
		} else {
			return null;
		}
	}

	public function __set($property, $value) {
		if (isset($this->_snapshot)) {return false;}
		if (method_exists($this, "set{$property}")) {
			$this->{"set{$property}"}($value);
		} else if (strstr($property, "_")) {
			list($type, $method) = explode("_", $property, 2);
			if (method_exists($this, "set{$method}")) {
				$this->{"set{$method}"}($value, $type);
			}
		}
		return $this;
	}
}
?>