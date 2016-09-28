<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the person table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the person
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called PersonExtension, and should extend the PersonTable
 * class.  The custom code file should be in the helix/modules/Core folder
 * and should be called PersonExtension.php
 * 
 * Object -> Entity -> Person
 */
class PersonTable extends Entity {
	public $logSequence;
	public $fdate;
	public $tdate;

	public $firstName;
	public $middleName;
	public $lastName;
	public $prefix;
	public $suffix;
	public $ssn;
	public $email;
	public $nickname;
	public $initials;
	public $birthdate;
	public $deathdate;
	public $personTypeId;
	public $createdById;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $ssn=null, $email=null) {
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
		$this->createdById = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($ssn)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}ssn{$db->re}={$db->queryValue($ssn)}";
		} else if (isset($email)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}email{$db->re}={$db->queryValue($email)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}first_name{$db->re}, {$db->le}person{$db->re}.{$db->le}middle_name{$db->re}, {$db->le}person{$db->re}.{$db->le}last_name{$db->re}, {$db->le}person{$db->re}.{$db->le}prefix{$db->re}, {$db->le}person{$db->re}.{$db->le}suffix{$db->re}, {$db->le}person{$db->re}.{$db->le}ssn{$db->re}, {$db->le}person{$db->re}.{$db->le}email{$db->re}, {$db->le}person{$db->re}.{$db->le}nickname{$db->re}, {$db->le}person{$db->re}.{$db->le}initials{$db->re}, {$db->le}person{$db->re}.{$db->le}birthdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deathdate{$db->re}, {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}person{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}person{$db->re}.{$db->le}mdate{$db->re}, {$db->le}person{$db->re}.{$db->le}cdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}person{$db->re}",
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
		$this->_initial["createdById"] = $this->createdById;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $ssn=null, $email=null) {
		$object = new Person();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($ssn)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}ssn{$db->re}={$db->queryValue($ssn)}";
		} else if (isset($email)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}email{$db->re}={$db->queryValue($email)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}person{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}person{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}person{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}entity{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}entity{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}entity{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}person{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}person{$db->re}.{$db->le}fdate{$db->re}, {$db->le}person{$db->re}.{$db->le}tdate{$db->re}, {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}first_name{$db->re}, {$db->le}person{$db->re}.{$db->le}middle_name{$db->re}, {$db->le}person{$db->re}.{$db->le}last_name{$db->re}, {$db->le}person{$db->re}.{$db->le}prefix{$db->re}, {$db->le}person{$db->re}.{$db->le}suffix{$db->re}, {$db->le}person{$db->re}.{$db->le}ssn{$db->re}, {$db->le}person{$db->re}.{$db->le}email{$db->re}, {$db->le}person{$db->re}.{$db->le}nickname{$db->re}, {$db->le}person{$db->re}.{$db->le}initials{$db->re}, {$db->le}person{$db->re}.{$db->le}birthdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deathdate{$db->re}, {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}person{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}person{$db->re}.{$db->le}mdate{$db->re}, {$db->le}person{$db->re}.{$db->le}cdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}person{$db->re}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}person{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$query .= "ORDER BY {$db->le}person{$db->re}.log_sequence desc limit 1";
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
			"INSERT INTO {$db->le}person{$db->re} (",
			"	{$db->le}entity_id{$db->re}, {$db->le}first_name{$db->re}, {$db->le}middle_name{$db->re}, {$db->le}last_name{$db->re}, {$db->le}prefix{$db->re}, {$db->le}suffix{$db->re}, {$db->le}ssn{$db->re}, {$db->le}email{$db->re}, {$db->le}nickname{$db->re}, {$db->le}initials{$db->re}, {$db->le}birthdate{$db->re}, {$db->le}deathdate{$db->re}, {$db->le}person_type_id{$db->re}, {$db->le}created_by_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->id)?null:(int)$this->id) . ",",
				$db->queryValue($this->firstName) . ",",
				$db->queryValue($this->middleName) . ",",
				$db->queryValue($this->lastName) . ",",
				$db->queryValue($this->prefix) . ",",
				$db->queryValue($this->suffix) . ",",
				$db->queryValue($this->ssn) . ",",
				$db->queryValue($this->email) . ",",
				$db->queryValue($this->nickname) . ",",
				$db->queryValue($this->initials) . ",",
				$db->queryValue($this->birthdate) . ",",
				$db->queryValue($this->deathdate) . ",",
				$db->queryValue(is_null($this->personTypeId)?null:(int)$this->personTypeId) . ",",
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
				"UPDATE {$db->le}person{$db->re} SET",
					"{$db->le}first_name{$db->re}={$db->queryValue($this->firstName)},",
					"{$db->le}middle_name{$db->re}={$db->queryValue($this->middleName)},",
					"{$db->le}last_name{$db->re}={$db->queryValue($this->lastName)},",
					"{$db->le}prefix{$db->re}={$db->queryValue($this->prefix)},",
					"{$db->le}suffix{$db->re}={$db->queryValue($this->suffix)},",
					"{$db->le}ssn{$db->re}={$db->queryValue($this->ssn)},",
					"{$db->le}email{$db->re}={$db->queryValue($this->email)},",
					"{$db->le}nickname{$db->re}={$db->queryValue($this->nickname)},",
					"{$db->le}initials{$db->re}={$db->queryValue($this->initials)},",
					"{$db->le}birthdate{$db->re}={$db->queryValue($this->birthdate)},",
					"{$db->le}deathdate{$db->re}={$db->queryValue($this->deathdate)},",
					"{$db->le}person_type_id{$db->re}={$db->queryValue(is_null($this->personTypeId)?null:(int)$this->personTypeId)},",
					"{$db->le}updated_by_id{$db->re}={$db->queryValue((int)$session->getUserId())},",
					"{$db->le}mdate{$db->re}={$db->queryValue(timestamp())},",
					"{$db->le}deleted{$db->re}={$db->queryValue(is_null($this->deleted)?null:(int)$this->deleted)}",
				"WHERE entity_id={$db->queryValue((int)$this->id)}"
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
		$record = Person::select($db->encapsulate("person") . ".mdate as fdate,null as tdate,{$db->encapsulate("person")}.*",null,$db->encapsulate("person").".entity_id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}person{$dbLog->re} (",
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
				"FROM {$dbLog->le}person{$dbLog->re}",
				"WHERE {$dbLog->le}person{$dbLog->re}.{$dbLog->le}entity_id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}person{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("person") . " WHERE entity_id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("person") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}person{$db->le}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}person{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}person_type{$db->re} ON {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}={$db->le}person_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}entity_type{$db->re} ON {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}={$db->le}entity_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}person{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Person::select("{$db->le}person{$db->le}.entity_id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Person::select("{$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}first_name{$db->re}, {$db->le}person{$db->re}.{$db->le}middle_name{$db->re}, {$db->le}person{$db->re}.{$db->le}last_name{$db->re}, {$db->le}person{$db->re}.{$db->le}prefix{$db->re}, {$db->le}person{$db->re}.{$db->le}suffix{$db->re}, {$db->le}person{$db->re}.{$db->le}ssn{$db->re}, {$db->le}person{$db->re}.{$db->le}email{$db->re}, {$db->le}person{$db->re}.{$db->le}nickname{$db->re}, {$db->le}person{$db->re}.{$db->le}initials{$db->re}, {$db->le}person{$db->re}.{$db->le}birthdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deathdate{$db->re}, {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}person{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}person{$db->re}.{$db->le}mdate{$db->re}, {$db->le}person{$db->re}.{$db->le}cdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Person();
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
			$clauses[] = "entity.description LIKE '%{$keyword}%' OR person.first_name LIKE '%{$keyword}%' OR person.middle_name LIKE '%{$keyword}%' OR person.last_name LIKE '%{$keyword}%' OR person.prefix LIKE '%{$keyword}%' OR person.suffix LIKE '%{$keyword}%' OR person.ssn LIKE '%{$keyword}%' OR person.email LIKE '%{$keyword}%' OR person.nickname LIKE '%{$keyword}%' OR person.initials LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Person::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Person Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new PersonType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new PersonType($this->personTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new PersonType(null, $type);
		$this->personTypeId = $type->id;
		return $this->personTypeId;
	}

	public function getAssetPerson($assetId, $type="default") {
		return new AssetPerson(null, $assetId, $this->id, AssetPerson::typeId($type));
	}

	public function getPersonPersondate($persondateId, $type="default") {
		return new PersonPersondate(null, $this->id, $persondateId, PersonPersondate::typeId($type));
	}

	public function getPersonRating($ratingId, $type="default") {
		return new PersonRating(null, $this->id, $ratingId, PersonRating::typeId($type));
	}

	public function getEntity() {
		return new Entity($this->id);
	}

	public function getPersonType() {
		return new PersonType($this->personTypeId);
	}

	public function setPersonType(PersonType $personType) {
		if ($personType->id>0) {
			$this->personTypeId = $personType->id;
		}
	}

	public function setAsset($asset=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeAssetList($type);
		$this->addAsset($asset, $type);
		return $this;
	}
	public function removeAsset($asset, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($asset) ? $asset : array($asset);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getAssetPerson($id, $type);
			if ($deleteObject) {
				$relationship->getAsset()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeAssetList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return AssetPerson::deleteAll(null, $this->id, $type);
		}
	}
	public function addAsset($asset=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($asset)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($asset) ? $asset : array($asset);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getAssetPerson($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getAsset($type="default") {
		if (isset($this->_cache["Asset"]) && isset($this->_cache["Asset"][$type])) {
			$asset = $this->_cache["Asset"][$type];
		} else {
			$asset = new Asset($this->getAssetId($type));
		}
		$this->_cache["Asset"][$type] = $asset;
		return $this->_cache["Asset"][$type];
	}
	public function getAssetList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getAssetIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Asset::objects($order, "{$db->le}asset{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getAssetId($type="default") {
		return $this->getAssetIds($type)->get(0);
	}
	public function getAssetIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}asset{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}asset{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}asset{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}asset{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}asset{$db->re} ",
			"INNER JOIN {$db->le}asset_person{$db->re} ON {$db->le}asset_person{$db->re}.{$db->le}asset_id{$db->re}={$db->le}asset{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}asset_person{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset_person{$db->re}.{$db->le}person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}asset_person{$db->re}.{$db->le}asset_person_type_id{$db->re}=" . $db->queryValue(AssetPerson::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}asset_person{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setPersondate($persondate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removePersondateList($type);
		$persondate = is_object($persondate) || is_int($persondate) ? $persondate : $this->getPersondate($type, true)->setValue($persondate);
		$this->addPersondate($persondate, $type);
		return $this;
	}
	public function removePersondate($persondate, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($persondate) ? $persondate : array($persondate);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getPersonPersondate($id, $type);
			if ($deleteObject) {
				$relationship->getPersondate()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removePersondateList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return PersonPersondate::deleteAll($this->id, null, $type);
		}
	}
	public function addPersondate($persondate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($persondate)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($persondate) ? $persondate : array($persondate);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getPersonPersondate($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getPersondate($type="default", $getAsObject=false) {
		if (isset($this->_cache["Persondate"]) && isset($this->_cache["Persondate"][$type])) {
			$persondate = $this->_cache["Persondate"][$type];
		} else {
			$persondate = new Persondate($this->getPersondateId($type));
		}
		$this->_cache["Persondate"][$type] = $persondate;
		return $getAsObject ? $this->_cache["Persondate"][$type] : $this->_cache["Persondate"][$type]->value;
	}
	public function getPersondateList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getPersondateIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Persondate::objects($order, "{$db->le}persondate{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getPersondateId($type="default") {
		return $this->getPersondateIds($type)->get(0);
	}
	public function getPersondateIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}persondate{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}persondate{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}persondate{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}persondate{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}persondate{$db->re} ",
			"INNER JOIN {$db->le}person_persondate{$db->re} ON {$db->le}person_persondate{$db->re}.{$db->le}persondate_id{$db->re}={$db->le}persondate{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}person_persondate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}persondate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}person_persondate{$db->re}.{$db->le}person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}person_persondate{$db->re}.{$db->le}person_persondate_type_id{$db->re}=" . $db->queryValue(PersonPersondate::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}person_persondate{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setRating($rating=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeRatingList($type);
		$this->addRating($rating, $type);
		return $this;
	}
	public function removeRating($rating, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($rating) ? $rating : array($rating);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getPersonRating($id, $type);
			if ($deleteObject) {
				$relationship->getRating()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeRatingList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return PersonRating::deleteAll($this->id, null, $type);
		}
	}
	public function addRating($rating=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($rating)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($rating) ? $rating : array($rating);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getPersonRating($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getRating($type="default") {
		if (isset($this->_cache["Rating"]) && isset($this->_cache["Rating"][$type])) {
			$rating = $this->_cache["Rating"][$type];
		} else {
			$rating = new Rating($this->getRatingId($type));
		}
		$this->_cache["Rating"][$type] = $rating;
		return $this->_cache["Rating"][$type];
	}
	public function getRatingList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getRatingIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Rating::objects($order, "{$db->le}rating{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getRatingId($type="default") {
		return $this->getRatingIds($type)->get(0);
	}
	public function getRatingIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}rating{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}rating{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}rating{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}rating{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}rating{$db->re} ",
			"INNER JOIN {$db->le}person_rating{$db->re} ON {$db->le}person_rating{$db->re}.{$db->le}rating_id{$db->re}={$db->le}rating{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}person_rating{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}rating{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}person_rating{$db->re}.{$db->le}person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}person_rating{$db->re}.{$db->le}person_rating_type_id{$db->re}=" . $db->queryValue(PersonRating::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}person_rating{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY " . alt("{$order}", "{$db->le}rating{$db->re}.{$db->le}order{$db->re}") : ""),
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