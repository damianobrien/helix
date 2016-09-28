<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the employee table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the employee
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called EmployeeExtension, and should extend the EmployeeTable
 * class.  The custom code file should be in the helix/modules/HR folder
 * and should be called EmployeeExtension.php
 * 
 * Object -> Entity -> Person -> Employee
 */
class EmployeeTable extends Person {
	public $logSequence;
	public $fdate;
	public $tdate;

	public $code;
	public $title;
	public $employeeTypeId;
	public $employeestatusId;
	public $departmentId;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $ssn=null, $email=null, $code=null) {
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
		$this->code = $code;
		$this->title = null;
		$this->employeeTypeId = null;
		$this->employeestatusId = null;
		$this->departmentId = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}employee{$db->re}.{$db->le}person_entity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($ssn)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}ssn{$db->re}={$db->queryValue($ssn)}";
		} else if (isset($email)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}email{$db->re}={$db->queryValue($email)}";
		} else if (isset($code)) {
			$condition = "{$db->le}employee{$db->re}.{$db->le}code{$db->re}={$db->queryValue($code)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}first_name{$db->re}, {$db->le}person{$db->re}.{$db->le}middle_name{$db->re}, {$db->le}person{$db->re}.{$db->le}last_name{$db->re}, {$db->le}person{$db->re}.{$db->le}prefix{$db->re}, {$db->le}person{$db->re}.{$db->le}suffix{$db->re}, {$db->le}person{$db->re}.{$db->le}ssn{$db->re}, {$db->le}person{$db->re}.{$db->le}email{$db->re}, {$db->le}person{$db->re}.{$db->le}nickname{$db->re}, {$db->le}person{$db->re}.{$db->le}initials{$db->re}, {$db->le}person{$db->re}.{$db->le}birthdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deathdate{$db->re}, {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}employee{$db->re}.{$db->le}code{$db->re}, {$db->le}employee{$db->re}.{$db->le}title{$db->re}, {$db->le}employee{$db->re}.{$db->le}employee_type_id{$db->re}, {$db->le}employee{$db->re}.{$db->le}employeestatus_id{$db->re}, {$db->le}employee{$db->re}.{$db->le}department_id{$db->re}, {$db->le}employee{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}employee{$db->re}.{$db->le}mdate{$db->re}, {$db->le}employee{$db->re}.{$db->le}cdate{$db->re}, {$db->le}employee{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}employee{$db->re}",
			"INNER JOIN {$db->le}person{$db->re} ON {$db->le}employee{$db->re}.{$db->le}person_entity_id{$db->re}={$db->le}person{$db->re}.{$db->le}entity_id{$db->re}",
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
				$this->code = $db->record["code"];
				$this->title = $db->record["title"];
				$this->employeeTypeId = $db->record["employee_type_id"];
				$this->employeestatusId = $db->record["employeestatus_id"];
				$this->departmentId = $db->record["department_id"];
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
		$this->_initial["code"] = $this->code;
		$this->_initial["title"] = $this->title;
		$this->_initial["employeeTypeId"] = $this->employeeTypeId;
		$this->_initial["employeestatusId"] = $this->employeestatusId;
		$this->_initial["departmentId"] = $this->departmentId;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $ssn=null, $email=null, $code=null) {
		$object = new Employee();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}employee{$db->re}.{$db->le}person_entity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($ssn)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}ssn{$db->re}={$db->queryValue($ssn)}";
		} else if (isset($email)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}email{$db->re}={$db->queryValue($email)}";
		} else if (isset($code)) {
			$condition = "{$db->le}employee{$db->re}.{$db->le}code{$db->re}={$db->queryValue($code)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}employee{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}employee{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}employee{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}person{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}person{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}person{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}entity{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}entity{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}entity{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}employee{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}employee{$db->re}.{$db->le}fdate{$db->re}, {$db->le}employee{$db->re}.{$db->le}tdate{$db->re}, {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}first_name{$db->re}, {$db->le}person{$db->re}.{$db->le}middle_name{$db->re}, {$db->le}person{$db->re}.{$db->le}last_name{$db->re}, {$db->le}person{$db->re}.{$db->le}prefix{$db->re}, {$db->le}person{$db->re}.{$db->le}suffix{$db->re}, {$db->le}person{$db->re}.{$db->le}ssn{$db->re}, {$db->le}person{$db->re}.{$db->le}email{$db->re}, {$db->le}person{$db->re}.{$db->le}nickname{$db->re}, {$db->le}person{$db->re}.{$db->le}initials{$db->re}, {$db->le}person{$db->re}.{$db->le}birthdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deathdate{$db->re}, {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}employee{$db->re}.{$db->le}code{$db->re}, {$db->le}employee{$db->re}.{$db->le}title{$db->re}, {$db->le}employee{$db->re}.{$db->le}employee_type_id{$db->re}, {$db->le}employee{$db->re}.{$db->le}employeestatus_id{$db->re}, {$db->le}employee{$db->re}.{$db->le}department_id{$db->re}, {$db->le}employee{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}employee{$db->re}.{$db->le}mdate{$db->re}, {$db->le}employee{$db->re}.{$db->le}cdate{$db->re}, {$db->le}employee{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}employee{$db->re}",
			"INNER JOIN {$db->le}person{$db->re} ON {$db->le}employee{$db->re}.{$db->le}person_entity_id{$db->re}={$db->le}person{$db->re}.{$db->le}entity_id{$db->re}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}person{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$query .= "ORDER BY {$db->le}employee{$db->re}.log_sequence desc limit 1";
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
				$object->code = $db->record["code"];
				$object->title = $db->record["title"];
				$object->employeeTypeId = $db->record["employee_type_id"];
				$object->employeestatusId = $db->record["employeestatus_id"];
				$object->departmentId = $db->record["department_id"];
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
		$isDirty = $isDirty || ((string)$this->code !== (string)$this->_initial["code"]);
		$isDirty = $isDirty || ((string)$this->title !== (string)$this->_initial["title"]);
		$isDirty = $isDirty || ((int)$this->employeeTypeId !== (int)$this->_initial["employeeTypeId"]);
		$isDirty = $isDirty || ((int)$this->employeestatusId !== (int)$this->_initial["employeestatusId"]);
		$isDirty = $isDirty || ((int)$this->departmentId !== (int)$this->_initial["departmentId"]);
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
			"INSERT INTO {$db->le}employee{$db->re} (",
			"	{$db->le}person_entity_id{$db->re}, {$db->le}code{$db->re}, {$db->le}title{$db->re}, {$db->le}employee_type_id{$db->re}, {$db->le}employeestatus_id{$db->re}, {$db->le}department_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->id)?null:(int)$this->id) . ",",
				$db->queryValue($this->code) . ",",
				$db->queryValue($this->title) . ",",
				$db->queryValue(is_null($this->employeeTypeId)?null:(int)$this->employeeTypeId) . ",",
				$db->queryValue(is_null($this->employeestatusId)?null:(int)$this->employeestatusId) . ",",
				$db->queryValue(is_null($this->departmentId)?null:(int)$this->departmentId) . ",",
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
				"UPDATE {$db->le}employee{$db->re} SET",
					"{$db->le}code{$db->re}={$db->queryValue($this->code)},",
					"{$db->le}title{$db->re}={$db->queryValue($this->title)},",
					"{$db->le}employee_type_id{$db->re}={$db->queryValue(is_null($this->employeeTypeId)?null:(int)$this->employeeTypeId)},",
					"{$db->le}employeestatus_id{$db->re}={$db->queryValue(is_null($this->employeestatusId)?null:(int)$this->employeestatusId)},",
					"{$db->le}department_id{$db->re}={$db->queryValue(is_null($this->departmentId)?null:(int)$this->departmentId)},",
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
		$record = Employee::select($db->encapsulate("employee") . ".mdate as fdate,null as tdate,{$db->encapsulate("employee")}.*",null,$db->encapsulate("employee").".person_entity_id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}employee{$dbLog->re} (",
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
				"FROM {$dbLog->le}employee{$dbLog->re}",
				"WHERE {$dbLog->le}employee{$dbLog->re}.{$dbLog->le}person_entity_id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}employee{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("employee") . " WHERE person_entity_id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("employee") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}employee{$db->le}",
			"INNER JOIN {$db->le}person{$db->re} ON {$db->le}employee{$db->re}.{$db->le}person_entity_id{$db->re}={$db->le}person{$db->re}.{$db->le}entity_id{$db->re}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}person{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}employee_type{$db->re} ON {$db->le}employee{$db->re}.{$db->le}employee_type_id{$db->re}={$db->le}employee_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}employeestatus{$db->re} ON {$db->le}employee{$db->re}.{$db->le}employeestatus_id{$db->re}={$db->le}employeestatus{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}department{$db->re} ON {$db->le}employee{$db->re}.{$db->le}department_id{$db->re}={$db->le}department{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}person_type{$db->re} ON {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}={$db->le}person_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}entity_type{$db->re} ON {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}={$db->le}entity_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}employee{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Employee::select("{$db->le}employee{$db->le}.person_entity_id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Employee::select("{$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}first_name{$db->re}, {$db->le}person{$db->re}.{$db->le}middle_name{$db->re}, {$db->le}person{$db->re}.{$db->le}last_name{$db->re}, {$db->le}person{$db->re}.{$db->le}prefix{$db->re}, {$db->le}person{$db->re}.{$db->le}suffix{$db->re}, {$db->le}person{$db->re}.{$db->le}ssn{$db->re}, {$db->le}person{$db->re}.{$db->le}email{$db->re}, {$db->le}person{$db->re}.{$db->le}nickname{$db->re}, {$db->le}person{$db->re}.{$db->le}initials{$db->re}, {$db->le}person{$db->re}.{$db->le}birthdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deathdate{$db->re}, {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}employee{$db->re}.{$db->le}code{$db->re}, {$db->le}employee{$db->re}.{$db->le}title{$db->re}, {$db->le}employee{$db->re}.{$db->le}employee_type_id{$db->re}, {$db->le}employee{$db->re}.{$db->le}employeestatus_id{$db->re}, {$db->le}employee{$db->re}.{$db->le}department_id{$db->re}, {$db->le}employee{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}employee{$db->re}.{$db->le}mdate{$db->re}, {$db->le}employee{$db->re}.{$db->le}cdate{$db->re}, {$db->le}employee{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Employee();
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
				$object->code = $record["code"];
				$object->title = $record["title"];
				$object->employeeTypeId = $record["employee_type_id"];
				$object->employeestatusId = $record["employeestatus_id"];
				$object->departmentId = $record["department_id"];
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
			$clauses[] = "entity.description LIKE '%{$keyword}%' OR person.first_name LIKE '%{$keyword}%' OR person.middle_name LIKE '%{$keyword}%' OR person.last_name LIKE '%{$keyword}%' OR person.prefix LIKE '%{$keyword}%' OR person.suffix LIKE '%{$keyword}%' OR person.ssn LIKE '%{$keyword}%' OR person.email LIKE '%{$keyword}%' OR person.nickname LIKE '%{$keyword}%' OR person.initials LIKE '%{$keyword}%' OR employee.code LIKE '%{$keyword}%' OR employee.title LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Employee::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Employee Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new EmployeeType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new EmployeeType($this->employeeTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new EmployeeType(null, $type);
		$this->employeeTypeId = $type->id;
		return $this->employeeTypeId;
	}

	public function getBusinessEmployee($businessId, $type="default") {
		return new BusinessEmployee(null, $businessId, $this->id, BusinessEmployee::typeId($type));
	}

	public function getEmployeeEmployeedate($employeedateId, $type="default") {
		return new EmployeeEmployeedate(null, $this->id, $employeedateId, EmployeeEmployeedate::typeId($type));
	}

	public function getEmployeeOffice($officeId, $type="default") {
		return new EmployeeOffice(null, $this->id, $officeId, EmployeeOffice::typeId($type));
	}

	public function getEmployeeResource($resourceId, $type="default") {
		return new EmployeeResource(null, $this->id, $resourceId, EmployeeResource::typeId($type));
	}

	public function getEmployeeProjectentity($projectentityId, $type="default") {
		return new EmployeeProjectentity(null, $this->id, $projectentityId, EmployeeProjectentity::typeId($type));
	}

	public function getPerson() {
		return new Person($this->id);
	}

	public function getEmployeeType() {
		return new EmployeeType($this->employeeTypeId);
	}

	public function setEmployeeType(EmployeeType $employeeType) {
		if ($employeeType->id>0) {
			$this->employeeTypeId = $employeeType->id;
		}
	}

	public function getEmployeestatus() {
		return new Employeestatus($this->employeestatusId);
	}

	public function setEmployeestatus(Employeestatus $employeestatus) {
		if ($employeestatus->id>0) {
			$this->employeestatusId = $employeestatus->id;
		}
	}

	public function getDepartment() {
		return new Department($this->departmentId);
	}

	public function setDepartment(Department $department) {
		if ($department->id>0) {
			$this->departmentId = $department->id;
		}
	}

	public function setBusiness($business=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeBusinessList($type);
		$this->addBusiness($business, $type);
		return $this;
	}
	public function removeBusiness($business, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($business) ? $business : array($business);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getBusinessEmployee($id, $type);
			if ($deleteObject) {
				$relationship->getBusiness()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeBusinessList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return BusinessEmployee::deleteAll(null, $this->id, $type);
		}
	}
	public function addBusiness($business=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($business)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($business) ? $business : array($business);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getBusinessEmployee($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getBusiness($type="default") {
		if (isset($this->_cache["Business"]) && isset($this->_cache["Business"][$type])) {
			$business = $this->_cache["Business"][$type];
		} else {
			$business = new Business($this->getBusinessId($type));
		}
		$this->_cache["Business"][$type] = $business;
		return $this->_cache["Business"][$type];
	}
	public function getBusinessList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getBusinessIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Business::objects($order, "{$db->le}business{$db->le}.{$db->re}entity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getBusinessId($type="default") {
		return $this->getBusinessIds($type)->get(0);
	}
	public function getBusinessIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}business{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}business{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}business{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}business{$db->re}.{$db->le}entity_id{$db->re} ",
			"FROM {$db->le}business{$db->re} ",
			"INNER JOIN {$db->le}business_employee{$db->re} ON {$db->le}business_employee{$db->re}.{$db->le}business_entity_id{$db->re}={$db->le}business{$db->re}.{$db->le}entity_id{$db->re} ",
			"	AND {$db->le}business_employee{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business_employee{$db->re}.{$db->le}employee_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}business_employee{$db->re}.{$db->le}business_employee_type_id{$db->re}=" . $db->queryValue(BusinessEmployee::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}business_employee{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["entity_id"];
		}
		
		return new Collection($ids);
	}

	public function setEmployeedate($employeedate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeEmployeedateList($type);
		$this->addEmployeedate($employeedate, $type);
		return $this;
	}
	public function removeEmployeedate($employeedate, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($employeedate) ? $employeedate : array($employeedate);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEmployeeEmployeedate($id, $type);
			if ($deleteObject) {
				$relationship->getEmployeedate()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeEmployeedateList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EmployeeEmployeedate::deleteAll($this->id, null, $type);
		}
	}
	public function addEmployeedate($employeedate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($employeedate)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($employeedate) ? $employeedate : array($employeedate);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEmployeeEmployeedate($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getEmployeedate($type="default") {
		if (isset($this->_cache["Employeedate"]) && isset($this->_cache["Employeedate"][$type])) {
			$employeedate = $this->_cache["Employeedate"][$type];
		} else {
			$employeedate = new Employeedate($this->getEmployeedateId($type));
		}
		$this->_cache["Employeedate"][$type] = $employeedate;
		return $this->_cache["Employeedate"][$type];
	}
	public function getEmployeedateList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getEmployeedateIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Employeedate::objects($order, "{$db->le}employeedate{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getEmployeedateId($type="default") {
		return $this->getEmployeedateIds($type)->get(0);
	}
	public function getEmployeedateIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}employeedate{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}employeedate{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}employeedate{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}employeedate{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}employeedate{$db->re} ",
			"INNER JOIN {$db->le}employee_employeedate{$db->re} ON {$db->le}employee_employeedate{$db->re}.{$db->le}employeedate_id{$db->re}={$db->le}employeedate{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}employee_employeedate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}employeedate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}employee_employeedate{$db->re}.{$db->le}employee_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}employee_employeedate{$db->re}.{$db->le}employee_employeedate_type_id{$db->re}=" . $db->queryValue(EmployeeEmployeedate::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}employee_employeedate{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setOffice($office=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeOfficeList($type);
		$this->addOffice($office, $type);
		return $this;
	}
	public function removeOffice($office, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($office) ? $office : array($office);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEmployeeOffice($id, $type);
			if ($deleteObject) {
				$relationship->getOffice()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeOfficeList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EmployeeOffice::deleteAll($this->id, null, $type);
		}
	}
	public function addOffice($office=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($office)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($office) ? $office : array($office);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEmployeeOffice($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getOffice($type="default") {
		if (isset($this->_cache["Office"]) && isset($this->_cache["Office"][$type])) {
			$office = $this->_cache["Office"][$type];
		} else {
			$office = new Office($this->getOfficeId($type));
		}
		$this->_cache["Office"][$type] = $office;
		return $this->_cache["Office"][$type];
	}
	public function getOfficeList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getOfficeIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Office::objects($order, "{$db->le}office{$db->le}.{$db->re}entity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getOfficeId($type="default") {
		return $this->getOfficeIds($type)->get(0);
	}
	public function getOfficeIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}office{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}office{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}office{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}office{$db->re}.{$db->le}entity_id{$db->re} ",
			"FROM {$db->le}office{$db->re} ",
			"INNER JOIN {$db->le}employee_office{$db->re} ON {$db->le}employee_office{$db->re}.{$db->le}office_entity_id{$db->re}={$db->le}office{$db->re}.{$db->le}entity_id{$db->re} ",
			"	AND {$db->le}employee_office{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}office{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}employee_office{$db->re}.{$db->le}employee_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}employee_office{$db->re}.{$db->le}employee_office_type_id{$db->re}=" . $db->queryValue(EmployeeOffice::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}employee_office{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["entity_id"];
		}
		
		return new Collection($ids);
	}

	public function setProjectentity($projectentity=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeProjectentityList($type);
		$this->addProjectentity($projectentity, $type);
		return $this;
	}
	public function removeProjectentity($projectentity, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($projectentity) ? $projectentity : array($projectentity);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEmployeeProjectentity($id, $type);
			if ($deleteObject) {
				$relationship->getProjectentity()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeProjectentityList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EmployeeProjectentity::deleteAll($this->id, null, $type);
		}
	}
	public function addProjectentity($projectentity=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($projectentity)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($projectentity) ? $projectentity : array($projectentity);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEmployeeProjectentity($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getProjectentity($type="default") {
		if (isset($this->_cache["Projectentity"]) && isset($this->_cache["Projectentity"][$type])) {
			$projectentity = $this->_cache["Projectentity"][$type];
		} else {
			$projectentity = new Projectentity($this->getProjectentityId($type));
		}
		$this->_cache["Projectentity"][$type] = $projectentity;
		return $this->_cache["Projectentity"][$type];
	}
	public function getProjectentityList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getProjectentityIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Projectentity::objects($order, "{$db->le}projectentity{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getProjectentityId($type="default") {
		return $this->getProjectentityIds($type)->get(0);
	}
	public function getProjectentityIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}projectentity{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}projectentity{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}projectentity{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}projectentity{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}projectentity{$db->re} ",
			"INNER JOIN {$db->le}employee_projectentity{$db->re} ON {$db->le}employee_projectentity{$db->re}.{$db->le}projectentity_id{$db->re}={$db->le}projectentity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}employee_projectentity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}projectentity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}employee_projectentity{$db->re}.{$db->le}person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}employee_projectentity{$db->re}.{$db->le}employee_projectentity_type_id{$db->re}=" . $db->queryValue(EmployeeProjectentity::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}employee_projectentity{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setResource($resource=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeResourceList($type);
		$this->addResource($resource, $type);
		return $this;
	}
	public function removeResource($resource, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($resource) ? $resource : array($resource);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEmployeeResource($id, $type);
			if ($deleteObject) {
				$relationship->getResource()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeResourceList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EmployeeResource::deleteAll($this->id, null, $type);
		}
	}
	public function addResource($resource=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($resource)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($resource) ? $resource : array($resource);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEmployeeResource($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getResource($type="default") {
		if (isset($this->_cache["Resource"]) && isset($this->_cache["Resource"][$type])) {
			$resource = $this->_cache["Resource"][$type];
		} else {
			$resource = new Resource($this->getResourceId($type));
		}
		$this->_cache["Resource"][$type] = $resource;
		return $this->_cache["Resource"][$type];
	}
	public function getResourceList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getResourceIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Resource::objects($order, "{$db->le}resource{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getResourceId($type="default") {
		return $this->getResourceIds($type)->get(0);
	}
	public function getResourceIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}resource{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}resource{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}resource{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}resource{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}resource{$db->re} ",
			"INNER JOIN {$db->le}employee_resource{$db->re} ON {$db->le}employee_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->le}resource{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}employee_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}employee_resource{$db->re}.{$db->le}employee_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}employee_resource{$db->re}.{$db->le}employee_resource_type_id{$db->re}=" . $db->queryValue(EmployeeResource::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}employee_resource{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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