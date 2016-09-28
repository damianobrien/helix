<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the user table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the user
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called UserExtension, and should extend the UserTable
 * class.  The custom code file should be in the helix/modules/Core folder
 * and should be called UserExtension.php
 * 
 * Object -> Entity -> Person -> User
 */
class UserTable extends Person {
	public $logSequence;
	public $fdate;
	public $tdate;

	public $username;
	public $hash;
	public $password;
	public $authmethodId;
	public $userTypeId;
	public $userstatusId;
	public $inactive;
	public $createdById;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $ssn=null, $email=null, $username=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->description = null;
		$this->entityTypeId = null;
		$this->firstName = null;
		$this->middleName = null;
		$this->lastName = null;
		$this->prefix = null;
		$this->suffix = null;
		$this->ssn = $ssn;
		$this->email = $email;
		$this->nickname = null;
		$this->initials = null;
		$this->birthdate = null;
		$this->deathdate = null;
		$this->personTypeId = null;
		$this->username = $username;
		$this->hash = null;
		$this->password = null;
		$this->authmethodId = null;
		$this->userTypeId = null;
		$this->userstatusId = null;
		$this->inactive = false;
		$this->createdById = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}user{$db->re}.{$db->le}person_entity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($ssn)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}ssn{$db->re}={$db->queryValue($ssn)}";
		} else if (isset($email)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}email{$db->re}={$db->queryValue($email)}";
		} else if (isset($username)) {
			$condition = "{$db->le}user{$db->re}.{$db->le}username{$db->re}={$db->queryValue($username)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}first_name{$db->re}, {$db->le}person{$db->re}.{$db->le}middle_name{$db->re}, {$db->le}person{$db->re}.{$db->le}last_name{$db->re}, {$db->le}person{$db->re}.{$db->le}prefix{$db->re}, {$db->le}person{$db->re}.{$db->le}suffix{$db->re}, {$db->le}person{$db->re}.{$db->le}ssn{$db->re}, {$db->le}person{$db->re}.{$db->le}email{$db->re}, {$db->le}person{$db->re}.{$db->le}nickname{$db->re}, {$db->le}person{$db->re}.{$db->le}initials{$db->re}, {$db->le}person{$db->re}.{$db->le}birthdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deathdate{$db->re}, {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}, {$db->le}user{$db->re}.{$db->le}username{$db->re}, {$db->le}user{$db->re}.{$db->le}hash{$db->re}, {$db->le}user{$db->re}.{$db->le}password{$db->re}, {$db->le}user{$db->re}.{$db->le}authmethod_id{$db->re}, {$db->le}user{$db->re}.{$db->le}user_type_id{$db->re}, {$db->le}user{$db->re}.{$db->le}userstatus_id{$db->re}, {$db->le}user{$db->re}.{$db->le}inactive{$db->re}, {$db->le}user{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}user{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}user{$db->re}.{$db->le}mdate{$db->re}, {$db->le}user{$db->re}.{$db->le}cdate{$db->re}, {$db->le}user{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}user{$db->re}",
			"INNER JOIN {$db->le}person{$db->re} ON {$db->le}user{$db->re}.{$db->le}person_entity_id{$db->re}={$db->le}person{$db->re}.{$db->le}entity_id{$db->re}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}person{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->description = $db->record["description"];
				$this->entityTypeId = $db->record["entity_type_id"];
				$this->firstName = $db->record["first_name"];
				$this->middleName = $db->record["middle_name"];
				$this->lastName = $db->record["last_name"];
				$this->prefix = $db->record["prefix"];
				$this->suffix = $db->record["suffix"];
				$this->ssn = $db->record["ssn"];
				$this->email = $db->record["email"];
				$this->nickname = $db->record["nickname"];
				$this->initials = $db->record["initials"];
				$this->birthdate = is_null(($db->record["birthdate"]))?null:new Date($db->record["birthdate"]);
				$this->deathdate = is_null(($db->record["deathdate"]))?null:new Date($db->record["deathdate"]);
				$this->personTypeId = $db->record["person_type_id"];
				$this->username = $db->record["username"];
				$this->hash = $db->record["hash"];
				$this->password = $db->record["password"];
				$this->authmethodId = $db->record["authmethod_id"];
				$this->userTypeId = $db->record["user_type_id"];
				$this->userstatusId = $db->record["userstatus_id"];
				$this->inactive = $db->record["inactive"];
				$this->createdById = $db->record["created_by_id"];
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["description"] = $this->description;
		$this->_initial["entityTypeId"] = $this->entityTypeId;
		$this->_initial["firstName"] = $this->firstName;
		$this->_initial["middleName"] = $this->middleName;
		$this->_initial["lastName"] = $this->lastName;
		$this->_initial["prefix"] = $this->prefix;
		$this->_initial["suffix"] = $this->suffix;
		$this->_initial["ssn"] = $this->ssn;
		$this->_initial["email"] = $this->email;
		$this->_initial["nickname"] = $this->nickname;
		$this->_initial["initials"] = $this->initials;
		$this->_initial["birthdate"] = $this->birthdate;
		$this->_initial["deathdate"] = $this->deathdate;
		$this->_initial["personTypeId"] = $this->personTypeId;
		$this->_initial["username"] = $this->username;
		$this->_initial["hash"] = $this->hash;
		$this->_initial["password"] = $this->password;
		$this->_initial["authmethodId"] = $this->authmethodId;
		$this->_initial["userTypeId"] = $this->userTypeId;
		$this->_initial["userstatusId"] = $this->userstatusId;
		$this->_initial["inactive"] = $this->inactive;
		$this->_initial["createdById"] = $this->createdById;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $ssn=null, $email=null, $username=null) {
		$object = new User();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}user{$db->re}.{$db->le}person_entity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($ssn)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}ssn{$db->re}={$db->queryValue($ssn)}";
		} else if (isset($email)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}email{$db->re}={$db->queryValue($email)}";
		} else if (isset($username)) {
			$condition = "{$db->le}user{$db->re}.{$db->le}username{$db->re}={$db->queryValue($username)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}user{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}user{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}user{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}person{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}person{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}person{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}entity{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}entity{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}entity{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}user{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}user{$db->re}.{$db->le}fdate{$db->re}, {$db->le}user{$db->re}.{$db->le}tdate{$db->re}, {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}first_name{$db->re}, {$db->le}person{$db->re}.{$db->le}middle_name{$db->re}, {$db->le}person{$db->re}.{$db->le}last_name{$db->re}, {$db->le}person{$db->re}.{$db->le}prefix{$db->re}, {$db->le}person{$db->re}.{$db->le}suffix{$db->re}, {$db->le}person{$db->re}.{$db->le}ssn{$db->re}, {$db->le}person{$db->re}.{$db->le}email{$db->re}, {$db->le}person{$db->re}.{$db->le}nickname{$db->re}, {$db->le}person{$db->re}.{$db->le}initials{$db->re}, {$db->le}person{$db->re}.{$db->le}birthdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deathdate{$db->re}, {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}, {$db->le}user{$db->re}.{$db->le}username{$db->re}, {$db->le}user{$db->re}.{$db->le}hash{$db->re}, {$db->le}user{$db->re}.{$db->le}password{$db->re}, {$db->le}user{$db->re}.{$db->le}authmethod_id{$db->re}, {$db->le}user{$db->re}.{$db->le}user_type_id{$db->re}, {$db->le}user{$db->re}.{$db->le}userstatus_id{$db->re}, {$db->le}user{$db->re}.{$db->le}inactive{$db->re}, {$db->le}user{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}user{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}user{$db->re}.{$db->le}mdate{$db->re}, {$db->le}user{$db->re}.{$db->le}cdate{$db->re}, {$db->le}user{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}user{$db->re}",
			"INNER JOIN {$db->le}person{$db->re} ON {$db->le}user{$db->re}.{$db->le}person_entity_id{$db->re}={$db->le}person{$db->re}.{$db->le}entity_id{$db->re}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}person{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$query .= "ORDER BY {$db->le}user{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->description = $db->record["description"];
				$object->entityTypeId = $db->record["entity_type_id"];
				$object->firstName = $db->record["first_name"];
				$object->middleName = $db->record["middle_name"];
				$object->lastName = $db->record["last_name"];
				$object->prefix = $db->record["prefix"];
				$object->suffix = $db->record["suffix"];
				$object->ssn = $db->record["ssn"];
				$object->email = $db->record["email"];
				$object->nickname = $db->record["nickname"];
				$object->initials = $db->record["initials"];
				$object->birthdate = is_null(($db->record["birthdate"]))?null:new Date($db->record["birthdate"]);
				$object->deathdate = is_null(($db->record["deathdate"]))?null:new Date($db->record["deathdate"]);
				$object->personTypeId = $db->record["person_type_id"];
				$object->username = $db->record["username"];
				$object->hash = $db->record["hash"];
				$object->password = $db->record["password"];
				$object->authmethodId = $db->record["authmethod_id"];
				$object->userTypeId = $db->record["user_type_id"];
				$object->userstatusId = $db->record["userstatus_id"];
				$object->inactive = $db->record["inactive"];
				$object->createdById = $db->record["created_by_id"];
				$object->updatedById = $db->record["updated_by_id"];
				$object->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$object->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$object->deleted = $db->record["deleted"];
			} else {
				$object->id = null;
			}
		}
		
		$db->changeDatabase($database);
		return $object;
	}

	public function __call($method, $arguments) {
		if (preg_match('/^set(.*)$/', $method, $matches)) {
			$property = lcfirst($matches[1]);
			$this->{$property} = $arguments[0];
		}
		return $this;
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

	public function isDirty() {
		$isDirty = false;

		$isDirty = $isDirty || ((int)$this->id !== (int)$this->_initial["id"]);
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
		$isDirty = $isDirty || ((int)$this->entityTypeId !== (int)$this->_initial["entityTypeId"]);
		$isDirty = $isDirty || ((string)$this->firstName !== (string)$this->_initial["firstName"]);
		$isDirty = $isDirty || ((string)$this->middleName !== (string)$this->_initial["middleName"]);
		$isDirty = $isDirty || ((string)$this->lastName !== (string)$this->_initial["lastName"]);
		$isDirty = $isDirty || ((string)$this->prefix !== (string)$this->_initial["prefix"]);
		$isDirty = $isDirty || ((string)$this->suffix !== (string)$this->_initial["suffix"]);
		$isDirty = $isDirty || ((string)$this->ssn !== (string)$this->_initial["ssn"]);
		$isDirty = $isDirty || ((string)$this->email !== (string)$this->_initial["email"]);
		$isDirty = $isDirty || ((string)$this->nickname !== (string)$this->_initial["nickname"]);
		$isDirty = $isDirty || ((string)$this->initials !== (string)$this->_initial["initials"]);
		$isDirty = $isDirty || ((string)$this->birthdate != (string)$this->_initial["birthdate"]);
		$isDirty = $isDirty || ((string)$this->deathdate != (string)$this->_initial["deathdate"]);
		$isDirty = $isDirty || ((int)$this->personTypeId !== (int)$this->_initial["personTypeId"]);
		$isDirty = $isDirty || ((string)$this->username !== (string)$this->_initial["username"]);
		$isDirty = $isDirty || ((string)$this->hash !== (string)$this->_initial["hash"]);
		$isDirty = $isDirty || ((string)$this->password !== (string)$this->_initial["password"]);
		$isDirty = $isDirty || ((int)$this->authmethodId !== (int)$this->_initial["authmethodId"]);
		$isDirty = $isDirty || ((int)$this->userTypeId !== (int)$this->_initial["userTypeId"]);
		$isDirty = $isDirty || ((int)$this->userstatusId !== (int)$this->_initial["userstatusId"]);
		$isDirty = $isDirty || ((int)$this->inactive !== (int)$this->_initial["inactive"]);
		$isDirty = $isDirty || ((int)$this->createdById !== (int)$this->_initial["createdById"]);
		$isDirty = $isDirty || ((int)$this->deleted !== (int)$this->_initial["deleted"]);

		return $isDirty;
	}

	public function save() {
		if (isset($this->_snapshot)) {return false;}
		$status = $this->id>0 ? $this->update() : $this->insert();

		foreach ($this->_cache as $class=>$list) {
			foreach ($list as $type=>$object) {
				$object->save();
				$this->{"add" . $object->getClass()}($object, $type);
			}
			unset($this->_cache[$class]);
		}

		return $status;
	}

	public function insert($insertParent=true) {
		if (isset($this->_snapshot)) {return false;}
		global $session, $config;

		$db = Database::getInstance();
		if ($insertParent) {
			parent::insert();
		}
		$query = implode(NL, array(
			"INSERT INTO {$db->le}user{$db->re} (",
			"	{$db->le}person_entity_id{$db->re}, {$db->le}username{$db->re}, {$db->le}hash{$db->re}, {$db->le}password{$db->re}, {$db->le}authmethod_id{$db->re}, {$db->le}user_type_id{$db->re}, {$db->le}userstatus_id{$db->re}, {$db->le}inactive{$db->re}, {$db->le}created_by_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->id)?null:(int)$this->id) . ",",
				$db->queryValue($this->username) . ",",
				$db->queryValue($this->hash) . ",",
				$db->queryValue($this->password) . ",",
				$db->queryValue(is_null($this->authmethodId)?null:(int)$this->authmethodId) . ",",
				$db->queryValue(is_null($this->userTypeId)?null:(int)$this->userTypeId) . ",",
				$db->queryValue(is_null($this->userstatusId)?null:(int)$this->userstatusId) . ",",
				$db->queryValue(is_null($this->inactive)?null:(int)$this->inactive) . ",",
				$db->queryValue((int)$session->getUserId()) . ",",
				$db->queryValue((int)$session->getUserId()) . ",",
				$db->queryValue(timestamp()) . ",",
				$db->queryValue(timestamp()) . ",",
				$db->queryValue(is_null($this->deleted)?null:(int)$this->deleted),
			")"
		));
		$status = $db->query($query);

		if ($config["enable_database_log"]) {
			$this->log();
		}

		return $status;
	}

	public function update() {
		if (isset($this->_snapshot)) {return false;}
		global $session, $config;

		parent::update();
		if ($this->isDirty()) {
			$db = Database::getInstance();
			$query = implode(NL, array(
				"UPDATE {$db->le}user{$db->re} SET",
					"{$db->le}username{$db->re}={$db->queryValue($this->username)},",
					"{$db->le}hash{$db->re}={$db->queryValue($this->hash)},",
					"{$db->le}password{$db->re}={$db->queryValue($this->password)},",
					"{$db->le}authmethod_id{$db->re}={$db->queryValue(is_null($this->authmethodId)?null:(int)$this->authmethodId)},",
					"{$db->le}user_type_id{$db->re}={$db->queryValue(is_null($this->userTypeId)?null:(int)$this->userTypeId)},",
					"{$db->le}userstatus_id{$db->re}={$db->queryValue(is_null($this->userstatusId)?null:(int)$this->userstatusId)},",
					"{$db->le}inactive{$db->re}={$db->queryValue(is_null($this->inactive)?null:(int)$this->inactive)},",
					"{$db->le}updated_by_id{$db->re}={$db->queryValue((int)$session->getUserId())},",
					"{$db->le}mdate{$db->re}={$db->queryValue(timestamp())},",
					"{$db->le}deleted{$db->re}={$db->queryValue(is_null($this->deleted)?null:(int)$this->deleted)}",
				"WHERE person_entity_id={$db->queryValue((int)$this->id)}"
			));
			$status = $db->query($query);

			if ($config["enable_database_log"]) {
				$this->log();
			}

			return $status;
		} else {
			return false;
		}
	}

	protected function log() {
		if (isset($this->_snapshot)) {return false;}
		parent::log();
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$record = User::select($db->encapsulate("user") . ".mdate as fdate,null as tdate,{$db->encapsulate("user")}.*",null,$db->encapsulate("user").".person_entity_id={$this->id}")->first();
		$log = "{$database}_log";
		$dbLog = Database::getInstance(null,null,null,null,$log);
		foreach($record as $k=>$v){
		    if(!is_int($v)){
		        $record[$k] = $dbLog->queryValue($v);
		    }
		}
		$insertColumns = $dbLog->le.implode("{$dbLog->le},{$dbLog->re}",array_keys($record)).$dbLog->re;
		$insertValues = implode(",",$record);
		$query = implode(NL, array(
			"INSERT INTO {$dbLog->le}user{$dbLog->re} (",
			$insertColumns,
			") VALUES (",
			$insertValues,
			")"
		));
		$status = $dbLog->query($query);

		$logSequence = $dbLog->getInsertedId();

		if ($logSequence){
			$query = implode(NL, array(
				"SELECT {$dbLog->le}log_sequence{$dbLog->re}",
				"FROM {$dbLog->le}user{$dbLog->re}",
				"WHERE {$dbLog->le}user{$dbLog->re}.{$dbLog->le}person_entity_id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}user{$dbLog->re}",
					"SET {$dbLog->le}tdate{$dbLog->re}={$record["mdate"]}",
					"where log_sequence={$updateSequence}"
				));
				$dbLog->query($query);
			}
		}
		$db->changeDatabase($database);
		return $status;
	}

	public function getInherited() {
		$this->get();
	}

	public function addSibling($object) {
		if (isset($this->_snapshot)) {return false;}
		if (method_exists($object, "getInherited") && is_null($object->id) && $object->getInherited()->getClass()===$this->getInherited()->getClass()) {
			$object->id = $this->id;
			return $object->insert(false);
		} else {
			return false;
		}
	}

	public function delete() {
		if (isset($this->_snapshot)) {return false;}
		$this->deleted = true;
		$status = $this->update();
		return $status;
	}

	public function unDelete() {
		if (isset($this->_snapshot)) {return false;}
		$this->deleted = false;
		$status = $this->update();
		return $status;
	}

	public function purge() {
		if (isset($this->_snapshot)) {return false;}
		$db = Database::getInstance();
		$query = "DELETE FROM " . $db->encapsulate("user") . " WHERE person_entity_id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("user") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}user{$db->le}",
			"INNER JOIN {$db->le}person{$db->re} ON {$db->le}user{$db->re}.{$db->le}person_entity_id{$db->re}={$db->le}person{$db->re}.{$db->le}entity_id{$db->re}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}person{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}authmethod{$db->re} ON {$db->le}user{$db->re}.{$db->le}authmethod_id{$db->re}={$db->le}authmethod{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}user_type{$db->re} ON {$db->le}user{$db->re}.{$db->le}user_type_id{$db->re}={$db->le}user_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}userstatus{$db->re} ON {$db->le}user{$db->re}.{$db->le}userstatus_id{$db->re}={$db->le}userstatus{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}person_type{$db->re} ON {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}={$db->le}person_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}entity_type{$db->re} ON {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}={$db->le}entity_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}user{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
			(isset($order) ? "ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));

		$db->query($query);

		if (count($columns)>1) {
			while ($db->getRecord()) {
				$records[] = $db->record;
			}
		} else {
			while ($db->getRecord(false)) {
				$records[] = $db->record[0];
			}
		}

		return new Collection($records);
	}

	public static function ids($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		return User::select("{$db->le}user{$db->le}.person_entity_id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (User::select("{$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}first_name{$db->re}, {$db->le}person{$db->re}.{$db->le}middle_name{$db->re}, {$db->le}person{$db->re}.{$db->le}last_name{$db->re}, {$db->le}person{$db->re}.{$db->le}prefix{$db->re}, {$db->le}person{$db->re}.{$db->le}suffix{$db->re}, {$db->le}person{$db->re}.{$db->le}ssn{$db->re}, {$db->le}person{$db->re}.{$db->le}email{$db->re}, {$db->le}person{$db->re}.{$db->le}nickname{$db->re}, {$db->le}person{$db->re}.{$db->le}initials{$db->re}, {$db->le}person{$db->re}.{$db->le}birthdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deathdate{$db->re}, {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}, {$db->le}user{$db->re}.{$db->le}username{$db->re}, {$db->le}user{$db->re}.{$db->le}hash{$db->re}, {$db->le}user{$db->re}.{$db->le}password{$db->re}, {$db->le}user{$db->re}.{$db->le}authmethod_id{$db->re}, {$db->le}user{$db->re}.{$db->le}user_type_id{$db->re}, {$db->le}user{$db->re}.{$db->le}userstatus_id{$db->re}, {$db->le}user{$db->re}.{$db->le}inactive{$db->re}, {$db->le}user{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}user{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}user{$db->re}.{$db->le}mdate{$db->re}, {$db->le}user{$db->re}.{$db->le}cdate{$db->re}, {$db->le}user{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new User();
				$object->id = $record["id"];
				$object->description = $record["description"];
				$object->entityTypeId = $record["entity_type_id"];
				$object->firstName = $record["first_name"];
				$object->middleName = $record["middle_name"];
				$object->lastName = $record["last_name"];
				$object->prefix = $record["prefix"];
				$object->suffix = $record["suffix"];
				$object->ssn = $record["ssn"];
				$object->email = $record["email"];
				$object->nickname = $record["nickname"];
				$object->initials = $record["initials"];
				$object->birthdate = is_null(($record["birthdate"]))?null:new Date($record["birthdate"]);
				$object->deathdate = is_null(($record["deathdate"]))?null:new Date($record["deathdate"]);
				$object->personTypeId = $record["person_type_id"];
				$object->username = $record["username"];
				$object->hash = $record["hash"];
				$object->password = $record["password"];
				$object->authmethodId = $record["authmethod_id"];
				$object->userTypeId = $record["user_type_id"];
				$object->userstatusId = $record["userstatus_id"];
				$object->inactive = $record["inactive"];
				$object->createdById = $record["created_by_id"];
				$object->updatedById = $record["updated_by_id"];
				$object->mdate = is_null(($record["mdate"]))?null:new Date($record["mdate"]);
				$object->cdate = is_null(($record["cdate"]))?null:new Date($record["cdate"]);
				$object->deleted = $record["deleted"];
			$objects[] = $object;
		}
		return new Collection($objects);
	}

	public static function search($query=null, $order=null, $where=null, $limit=null, $offset=0) {
		$keywords = array();
		$clauses = array();

		preg_match_all('/"([^"]+)"/i', $query, $matches, PREG_SET_ORDER);
		foreach ($matches as $match) {
			$keywords[] = $match[1];
		}

		$query = preg_replace('/"[^"]+"/i', '', $query);
		foreach (preg_split('/ +/i',$query) as $keyword) {
			$keywords[] = $keyword;
		}

		foreach ($keywords as $keyword) {
			$clauses[] = "entity.description LIKE '%{$keyword}%' OR person.first_name LIKE '%{$keyword}%' OR person.middle_name LIKE '%{$keyword}%' OR person.last_name LIKE '%{$keyword}%' OR person.prefix LIKE '%{$keyword}%' OR person.suffix LIKE '%{$keyword}%' OR person.ssn LIKE '%{$keyword}%' OR person.email LIKE '%{$keyword}%' OR person.nickname LIKE '%{$keyword}%' OR person.initials LIKE '%{$keyword}%' OR user.username LIKE '%{$keyword}%' OR user.hash LIKE '%{$keyword}%' OR user.password LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return User::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "User Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new UserType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new UserType($this->userTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new UserType(null, $type);
		$this->userTypeId = $type->id;
		return $this->userTypeId;
	}

	public function getContentUser($contentId, $type="default") {
		return new ContentUser(null, $contentId, $this->id, ContentUser::typeId($type));
	}

	public function getCommentUser($commentId, $type="default") {
		return new CommentUser(null, $commentId, $this->id, CommentUser::typeId($type));
	}

	public function getGroupUser($groupId, $type="default") {
		return new GroupUser(null, $groupId, $this->id, GroupUser::typeId($type));
	}

	public function getPermUser($permId, $type="default") {
		return new PermUser(null, $permId, $this->id, PermUser::typeId($type));
	}

	public function getPreferenceUser($preferenceId, $type="default") {
		return new PreferenceUser(null, $preferenceId, $this->id, PreferenceUser::typeId($type));
	}

	public function getRoleUser($roleId, $type="default") {
		return new RoleUser(null, $roleId, $this->id, RoleUser::typeId($type));
	}

	public function getSessionUser($sessionId, $type="default") {
		return new SessionUser(null, $sessionId, $this->id, SessionUser::typeId($type));
	}

	public function getQuerysetUser($querysetId, $type="default") {
		return new QuerysetUser(null, $querysetId, $this->id, QuerysetUser::typeId($type));
	}

	public function getPostUser($postId, $type="default") {
		return new PostUser(null, $postId, $this->id, PostUser::typeId($type));
	}

	public function getReportUser($reportId, $type="default") {
		return new ReportUser(null, $reportId, $this->id, ReportUser::typeId($type));
	}

	public function getPerson() {
		return new Person($this->id);
	}

	public function getAuthmethod() {
		return new Authmethod($this->authmethodId);
	}

	public function setAuthmethod(Authmethod $authmethod) {
		if ($authmethod->id>0) {
			$this->authmethodId = $authmethod->id;
		}
	}

	public function getUserType() {
		return new UserType($this->userTypeId);
	}

	public function setUserType(UserType $userType) {
		if ($userType->id>0) {
			$this->userTypeId = $userType->id;
		}
	}

	public function getUserstatus() {
		return new Userstatus($this->userstatusId);
	}

	public function setUserstatus(Userstatus $userstatus) {
		if ($userstatus->id>0) {
			$this->userstatusId = $userstatus->id;
		}
	}

	public function setComment($comment=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeCommentList($type);
		$this->addComment($comment, $type);
		return $this;
	}
	public function removeComment($comment, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($comment) ? $comment : array($comment);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getCommentUser($id, $type);
			if ($deleteObject) {
				$relationship->getComment()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeCommentList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return CommentUser::deleteAll(null, $this->id, $type);
		}
	}
	public function addComment($comment=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($comment)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($comment) ? $comment : array($comment);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getCommentUser($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getComment($type="default") {
		if (isset($this->_cache["Comment"]) && isset($this->_cache["Comment"][$type])) {
			$comment = $this->_cache["Comment"][$type];
		} else {
			$comment = new Comment($this->getCommentId($type));
		}
		$this->_cache["Comment"][$type] = $comment;
		return $this->_cache["Comment"][$type];
	}
	public function getCommentList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getCommentIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Comment::objects($order, "{$db->le}comment{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getCommentId($type="default") {
		return $this->getCommentIds($type)->get(0);
	}
	public function getCommentIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}comment{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}comment{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}comment{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}comment{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}comment{$db->re} ",
			"INNER JOIN {$db->le}comment_user{$db->re} ON {$db->le}comment_user{$db->re}.{$db->le}comment_id{$db->re}={$db->le}comment{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}comment_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}comment_user{$db->re}.{$db->le}comment_user_type_id{$db->re}=" . $db->queryValue(CommentUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}comment_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["id"];
		}
		
		return new Collection($ids);
	}

	public function setContent($content=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeContentList($type);
		$this->addContent($content, $type);
		return $this;
	}
	public function removeContent($content, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($content) ? $content : array($content);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getContentUser($id, $type);
			if ($deleteObject) {
				$relationship->getContent()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeContentList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ContentUser::deleteAll(null, $this->id, $type);
		}
	}
	public function addContent($content=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($content)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($content) ? $content : array($content);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getContentUser($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getContent($type="default") {
		if (isset($this->_cache["Content"]) && isset($this->_cache["Content"][$type])) {
			$content = $this->_cache["Content"][$type];
		} else {
			$content = new Content($this->getContentId($type));
		}
		$this->_cache["Content"][$type] = $content;
		return $this->_cache["Content"][$type];
	}
	public function getContentList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getContentIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Content::objects($order, "{$db->le}content{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getContentId($type="default") {
		return $this->getContentIds($type)->get(0);
	}
	public function getContentIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}content{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}content{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}content{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}content{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}content{$db->re} ",
			"INNER JOIN {$db->le}content_user{$db->re} ON {$db->le}content_user{$db->re}.{$db->le}content_id{$db->re}={$db->le}content{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}content_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}content_user{$db->re}.{$db->le}content_user_type_id{$db->re}=" . $db->queryValue(ContentUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}content_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["id"];
		}
		
		return new Collection($ids);
	}

	public function setGroup($group=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeGroupList($type);
		$this->addGroup($group, $type);
		return $this;
	}
	public function removeGroup($group, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($group) ? $group : array($group);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getGroupUser($id, $type);
			if ($deleteObject) {
				$relationship->getGroup()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeGroupList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return GroupUser::deleteAll(null, $this->id, $type);
		}
	}
	public function addGroup($group=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($group)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($group) ? $group : array($group);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getGroupUser($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getGroup($type="default") {
		if (isset($this->_cache["Group"]) && isset($this->_cache["Group"][$type])) {
			$group = $this->_cache["Group"][$type];
		} else {
			$group = new Group($this->getGroupId($type));
		}
		$this->_cache["Group"][$type] = $group;
		return $this->_cache["Group"][$type];
	}
	public function getGroupList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getGroupIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Group::objects($order, "{$db->le}group{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getGroupId($type="default") {
		return $this->getGroupIds($type)->get(0);
	}
	public function getGroupIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}group{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}group{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}group{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}group{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}group{$db->re} ",
			"INNER JOIN {$db->le}group_user{$db->re} ON {$db->le}group_user{$db->re}.{$db->le}group_id{$db->re}={$db->le}group{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}group_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}group{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}group_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}group_user{$db->re}.{$db->le}group_user_type_id{$db->re}=" . $db->queryValue(GroupUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}group_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["id"];
		}
		
		return new Collection($ids);
	}

	public function setPerm($perm=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removePermList($type);
		$this->addPerm($perm, $type);
		return $this;
	}
	public function removePerm($perm, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($perm) ? $perm : array($perm);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getPermUser($id, $type);
			if ($deleteObject) {
				$relationship->getPerm()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removePermList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return PermUser::deleteAll(null, $this->id, $type);
		}
	}
	public function addPerm($perm=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($perm)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($perm) ? $perm : array($perm);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getPermUser($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getPerm($type="default") {
		if (isset($this->_cache["Perm"]) && isset($this->_cache["Perm"][$type])) {
			$perm = $this->_cache["Perm"][$type];
		} else {
			$perm = new Perm($this->getPermId($type));
		}
		$this->_cache["Perm"][$type] = $perm;
		return $this->_cache["Perm"][$type];
	}
	public function getPermList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getPermIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Perm::objects($order, "{$db->le}perm{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getPermId($type="default") {
		return $this->getPermIds($type)->get(0);
	}
	public function getPermIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}perm{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}perm{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}perm{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}perm{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}perm{$db->re} ",
			"INNER JOIN {$db->le}perm_user{$db->re} ON {$db->le}perm_user{$db->re}.{$db->le}perm_id{$db->re}={$db->le}perm{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}perm_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}perm{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}perm_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}perm_user{$db->re}.{$db->le}perm_user_type_id{$db->re}=" . $db->queryValue(PermUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}perm_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["id"];
		}
		
		return new Collection($ids);
	}

	public function setPost($post=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removePostList($type);
		$this->addPost($post, $type);
		return $this;
	}
	public function removePost($post, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($post) ? $post : array($post);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getPostUser($id, $type);
			if ($deleteObject) {
				$relationship->getPost()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removePostList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return PostUser::deleteAll(null, $this->id, $type);
		}
	}
	public function addPost($post=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($post)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($post) ? $post : array($post);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getPostUser($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getPost($type="default") {
		if (isset($this->_cache["Post"]) && isset($this->_cache["Post"][$type])) {
			$post = $this->_cache["Post"][$type];
		} else {
			$post = new Post($this->getPostId($type));
		}
		$this->_cache["Post"][$type] = $post;
		return $this->_cache["Post"][$type];
	}
	public function getPostList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getPostIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Post::objects($order, "{$db->le}post{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getPostId($type="default") {
		return $this->getPostIds($type)->get(0);
	}
	public function getPostIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}post{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}post{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}post{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}post{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}post{$db->re} ",
			"INNER JOIN {$db->le}post_user{$db->re} ON {$db->le}post_user{$db->re}.{$db->le}post_id{$db->re}={$db->le}post{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}post_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}post{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}post_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}post_user{$db->re}.{$db->le}post_user_type_id{$db->re}=" . $db->queryValue(PostUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}post_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["id"];
		}
		
		return new Collection($ids);
	}

	public function setPreference($preference=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removePreferenceList($type);
		$this->addPreference($preference, $type);
		return $this;
	}
	public function removePreference($preference, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($preference) ? $preference : array($preference);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getPreferenceUser($id, $type);
			if ($deleteObject) {
				$relationship->getPreference()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removePreferenceList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return PreferenceUser::deleteAll(null, $this->id, $type);
		}
	}
	public function addPreference($preference=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($preference)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($preference) ? $preference : array($preference);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getPreferenceUser($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getPreference($type="default") {
		if (isset($this->_cache["Preference"]) && isset($this->_cache["Preference"][$type])) {
			$preference = $this->_cache["Preference"][$type];
		} else {
			$preference = new Preference($this->getPreferenceId($type));
		}
		$this->_cache["Preference"][$type] = $preference;
		return $this->_cache["Preference"][$type];
	}
	public function getPreferenceList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getPreferenceIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Preference::objects($order, "{$db->le}preference{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getPreferenceId($type="default") {
		return $this->getPreferenceIds($type)->get(0);
	}
	public function getPreferenceIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}preference{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}preference{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}preference{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}preference{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}preference{$db->re} ",
			"INNER JOIN {$db->le}preference_user{$db->re} ON {$db->le}preference_user{$db->re}.{$db->le}preference_id{$db->re}={$db->le}preference{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}preference_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}preference{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}preference_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}preference_user{$db->re}.{$db->le}preference_user_type_id{$db->re}=" . $db->queryValue(PreferenceUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}preference_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["id"];
		}
		
		return new Collection($ids);
	}

	public function setQueryset($queryset=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeQuerysetList($type);
		$this->addQueryset($queryset, $type);
		return $this;
	}
	public function removeQueryset($queryset, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($queryset) ? $queryset : array($queryset);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getQuerysetUser($id, $type);
			if ($deleteObject) {
				$relationship->getQueryset()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeQuerysetList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return QuerysetUser::deleteAll(null, $this->id, $type);
		}
	}
	public function addQueryset($queryset=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($queryset)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($queryset) ? $queryset : array($queryset);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getQuerysetUser($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getQueryset($type="default") {
		if (isset($this->_cache["Queryset"]) && isset($this->_cache["Queryset"][$type])) {
			$queryset = $this->_cache["Queryset"][$type];
		} else {
			$queryset = new Queryset($this->getQuerysetId($type));
		}
		$this->_cache["Queryset"][$type] = $queryset;
		return $this->_cache["Queryset"][$type];
	}
	public function getQuerysetList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getQuerysetIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Queryset::objects($order, "{$db->le}queryset{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getQuerysetId($type="default") {
		return $this->getQuerysetIds($type)->get(0);
	}
	public function getQuerysetIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}queryset{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}queryset{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}queryset{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}queryset{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}queryset{$db->re} ",
			"INNER JOIN {$db->le}queryset_user{$db->re} ON {$db->le}queryset_user{$db->re}.{$db->le}queryset_id{$db->re}={$db->le}queryset{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}queryset_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}queryset{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}queryset_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}queryset_user{$db->re}.{$db->le}queryset_user_type_id{$db->re}=" . $db->queryValue(QuerysetUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}queryset_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["id"];
		}
		
		return new Collection($ids);
	}

	public function setReport($report=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeReportList($type);
		$this->addReport($report, $type);
		return $this;
	}
	public function removeReport($report, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($report) ? $report : array($report);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getReportUser($id, $type);
			if ($deleteObject) {
				$relationship->getReport()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeReportList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ReportUser::deleteAll(null, $this->id, $type);
		}
	}
	public function addReport($report=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($report)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($report) ? $report : array($report);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getReportUser($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getReport($type="default") {
		if (isset($this->_cache["Report"]) && isset($this->_cache["Report"][$type])) {
			$report = $this->_cache["Report"][$type];
		} else {
			$report = new Report($this->getReportId($type));
		}
		$this->_cache["Report"][$type] = $report;
		return $this->_cache["Report"][$type];
	}
	public function getReportList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getReportIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Report::objects($order, "{$db->le}report{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getReportId($type="default") {
		return $this->getReportIds($type)->get(0);
	}
	public function getReportIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}report{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}report{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}report{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}report{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}report{$db->re} ",
			"INNER JOIN {$db->le}report_user{$db->re} ON {$db->le}report_user{$db->re}.{$db->le}report_id{$db->re}={$db->le}report{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}report_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}report{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}report_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}report_user{$db->re}.{$db->le}report_user_type_id{$db->re}=" . $db->queryValue(ReportUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}report_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["id"];
		}
		
		return new Collection($ids);
	}

	public function setRole($role=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeRoleList($type);
		$this->addRole($role, $type);
		return $this;
	}
	public function removeRole($role, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($role) ? $role : array($role);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getRoleUser($id, $type);
			if ($deleteObject) {
				$relationship->getRole()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeRoleList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return RoleUser::deleteAll(null, $this->id, $type);
		}
	}
	public function addRole($role=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($role)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($role) ? $role : array($role);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getRoleUser($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getRole($type="default") {
		if (isset($this->_cache["Role"]) && isset($this->_cache["Role"][$type])) {
			$role = $this->_cache["Role"][$type];
		} else {
			$role = new Role($this->getRoleId($type));
		}
		$this->_cache["Role"][$type] = $role;
		return $this->_cache["Role"][$type];
	}
	public function getRoleList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getRoleIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Role::objects($order, "{$db->le}role{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getRoleId($type="default") {
		return $this->getRoleIds($type)->get(0);
	}
	public function getRoleIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}role{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}role{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}role{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}role{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}role{$db->re} ",
			"INNER JOIN {$db->le}role_user{$db->re} ON {$db->le}role_user{$db->re}.{$db->le}role_id{$db->re}={$db->le}role{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}role_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}role{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}role_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}role_user{$db->re}.{$db->le}role_user_type_id{$db->re}=" . $db->queryValue(RoleUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}role_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["id"];
		}
		
		return new Collection($ids);
	}

	public function setSession($session=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeSessionList($type);
		$this->addSession($session, $type);
		return $this;
	}
	public function removeSession($session, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($session) ? $session : array($session);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getSessionUser($id, $type);
			if ($deleteObject) {
				$relationship->getSession()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeSessionList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return SessionUser::deleteAll(null, $this->id, $type);
		}
	}
	public function addSession($session=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($session)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($session) ? $session : array($session);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getSessionUser($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getSession($type="default") {
		if (isset($this->_cache["Session"]) && isset($this->_cache["Session"][$type])) {
			$session = $this->_cache["Session"][$type];
		} else {
			$session = new Session($this->getSessionId($type));
		}
		$this->_cache["Session"][$type] = $session;
		return $this->_cache["Session"][$type];
	}
	public function getSessionList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getSessionIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Session::objects($order, "{$db->le}session{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getSessionId($type="default") {
		return $this->getSessionIds($type)->get(0);
	}
	public function getSessionIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}session{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}session{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}session{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}session{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}session{$db->re} ",
			"INNER JOIN {$db->le}session_user{$db->re} ON {$db->le}session_user{$db->re}.{$db->le}session_id{$db->re}={$db->le}session{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}session_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}session{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}session_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}session_user{$db->re}.{$db->le}session_user_type_id{$db->re}=" . $db->queryValue(SessionUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}session_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["id"];
		}
		
		return new Collection($ids);
	}

}
?>