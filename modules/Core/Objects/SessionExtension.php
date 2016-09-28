<?php
/**
 * This is an extension of the SessionRelationships class in the Helix Class Library
 * 
 * Add methods and/or properties to this class to extend the functionality of the
 * Session class family.  Changes to this class will affect all sites that use
 * this installation of the Helix Class Library.
 * 
 * If you need to customize this class for a single site, custom code should be placed
 * in a class called Session, and should extend the SessionExtension class.
 * The custom code file should be in the site folder called: library/Session.php
 * 
 * Object -> Session
 */
class SessionExtension extends SessionRelationships {
	
	protected $vars;
	public $serialDelimiter;
	
	public static function current() {
		global $session;
		return $session;
	}
	
	public function __construct($id=null, $hash=null) {
		parent::__construct($id, $hash);
		$this->serialDelimiter = "<|>";
		$this->vars = $this->unserialize($this->data);
		$this->ip = Request::$remoteAddress;
		if ($this->requestId!=Request::$id) {
			$this->requestId = Request::$id;
			$this->requestNumber = alt($this->requestNumber, 0) + 1;
		}
	}
	
	public static function getActiveSession() {
		global $config;

        $hash = isTrue($config["enable_session"]) ? req("session") : null;
        return new Session(null, $hash);
	}
	
	public function add($key, $value, $overwrite=true) {
		$this->vars[$key] = isset($this->vars[$key]) ? ($overwrite ? $value : $this->vars[$key]) : $value;
	}
	
	public function remove($key) {
		if (isset($this->vars[$key])) {
			unset($this->vars[$key]);
		}
	}
	
	public function get($key) {
		return val($this->vars, $key);
	}
	
	public function insert() {
		$this->data = $this->serialize($this->vars);
		parent::insert();
	}
	
	public function update() {
		$this->data = $this->serialize($this->vars);
		parent::update();
	}
	
	protected function encode($data) {
		if (is_array($data)) {
			$encodedData = array();
			foreach ($data as $key=>$value) {
				$encodedData[$this->encode($key)] = $this->encode($value);
			}
			return $encodedData;
		} else if (is_string($data)) {
			return rawurlencode($data);
		} else if (is_object($data)) {
			return $data;
		} else {
			return $data;
		}
	}
	
	protected function decode($data)
	{
		if (is_array($data)) {
			$decodedData = array();
			foreach ($data as $key=>$value) {
				$decodedData[$this->decode($key)] = $this->decode($value);
			}
			return $decodedData;
		} else if (is_string($data)) {
			return rawurldecode($data);
		} else if (is_object($data)) {
			return $data;
		} else {
			return $data;
		}
	}
	
	protected function serialize(array $data) {
		$serializedData = null;
		if (count($data)>0) {
			$serializedValues = array();
			$encodedData = $this->encode($data);
			foreach ($encodedData as $encodedKey=>$encodedValue) {
				$serializedValues[] = $encodedKey . "=" . serialize($encodedValue);
			}
			$serializedData = implode($this->serialDelimiter, $serializedValues);
		}
		return $serializedData;
	}
	
	protected function unserialize($serializedData) {
		$data = array();
		if (isset($serializedData)) {
			$serializedValues = explode($this->serialDelimiter, $serializedData);
			foreach ($serializedValues as $keyValueString) {
				list($encodedKey, $encodedSerializedValue) = explode("=", $keyValueString);
				$data[$this->decode($encodedKey)] = $this->decode(unserialize($encodedSerializedValue)); 
			}
		}
		return $data;
	}
	
	//If a new user is in the _cache array, remove it so it doesn't auto-save
	public function save() {
		if(isset($this->_cache["User"]) && !isset($this->_cache["User"]->id)) {
			unset($this->_cache["User"]);
		}
		
		return parent::save();
	}

    public function toJSON(){
        return json_encode($this->unserialize($this->data));
    }
}
?>