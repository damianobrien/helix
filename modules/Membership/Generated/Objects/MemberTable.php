<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the member table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the member
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called MemberExtension, and should extend the MemberTable
 * class.  The custom code file should be in the helix/modules/Membership folder
 * and should be called MemberExtension.php
 * 
 * Object -> Entity -> Person -> Member
 */
class MemberTable extends Person {
	public $logSequence;
	public $fdate;
	public $tdate;

	public $memberTypeId;
	public $memberstatusId;
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
		$this->memberTypeId = null;
		$this->memberstatusId = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}member{$db->re}.{$db->le}person_entity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($ssn)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}ssn{$db->re}={$db->queryValue($ssn)}";
		} else if (isset($email)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}email{$db->re}={$db->queryValue($email)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}first_name{$db->re}, {$db->le}person{$db->re}.{$db->le}middle_name{$db->re}, {$db->le}person{$db->re}.{$db->le}last_name{$db->re}, {$db->le}person{$db->re}.{$db->le}prefix{$db->re}, {$db->le}person{$db->re}.{$db->le}suffix{$db->re}, {$db->le}person{$db->re}.{$db->le}ssn{$db->re}, {$db->le}person{$db->re}.{$db->le}email{$db->re}, {$db->le}person{$db->re}.{$db->le}nickname{$db->re}, {$db->le}person{$db->re}.{$db->le}initials{$db->re}, {$db->le}person{$db->re}.{$db->le}birthdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deathdate{$db->re}, {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}member{$db->re}.{$db->le}member_type_id{$db->re}, {$db->le}member{$db->re}.{$db->le}memberstatus_id{$db->re}, {$db->le}member{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}member{$db->re}.{$db->le}mdate{$db->re}, {$db->le}member{$db->re}.{$db->le}cdate{$db->re}, {$db->le}member{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}member{$db->re}",
			"INNER JOIN {$db->le}person{$db->re} ON {$db->le}member{$db->re}.{$db->le}person_entity_id{$db->re}={$db->le}person{$db->re}.{$db->le}entity_id{$db->re}",
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
				$this->memberTypeId = $db->record["member_type_id"];
				$this->memberstatusId = $db->record["memberstatus_id"];
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
		$this->_initial["memberTypeId"] = $this->memberTypeId;
		$this->_initial["memberstatusId"] = $this->memberstatusId;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $ssn=null, $email=null) {
		$object = new Member();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}member{$db->re}.{$db->le}person_entity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($ssn)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}ssn{$db->re}={$db->queryValue($ssn)}";
		} else if (isset($email)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}email{$db->re}={$db->queryValue($email)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}member{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}member{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}member{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}person{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}person{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}person{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}entity{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}entity{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}entity{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}member{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}member{$db->re}.{$db->le}fdate{$db->re}, {$db->le}member{$db->re}.{$db->le}tdate{$db->re}, {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}first_name{$db->re}, {$db->le}person{$db->re}.{$db->le}middle_name{$db->re}, {$db->le}person{$db->re}.{$db->le}last_name{$db->re}, {$db->le}person{$db->re}.{$db->le}prefix{$db->re}, {$db->le}person{$db->re}.{$db->le}suffix{$db->re}, {$db->le}person{$db->re}.{$db->le}ssn{$db->re}, {$db->le}person{$db->re}.{$db->le}email{$db->re}, {$db->le}person{$db->re}.{$db->le}nickname{$db->re}, {$db->le}person{$db->re}.{$db->le}initials{$db->re}, {$db->le}person{$db->re}.{$db->le}birthdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deathdate{$db->re}, {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}member{$db->re}.{$db->le}member_type_id{$db->re}, {$db->le}member{$db->re}.{$db->le}memberstatus_id{$db->re}, {$db->le}member{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}member{$db->re}.{$db->le}mdate{$db->re}, {$db->le}member{$db->re}.{$db->le}cdate{$db->re}, {$db->le}member{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}member{$db->re}",
			"INNER JOIN {$db->le}person{$db->re} ON {$db->le}member{$db->re}.{$db->le}person_entity_id{$db->re}={$db->le}person{$db->re}.{$db->le}entity_id{$db->re}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}person{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$query .= "ORDER BY {$db->le}member{$db->re}.log_sequence desc limit 1";
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
				$object->memberTypeId = $db->record["member_type_id"];
				$object->memberstatusId = $db->record["memberstatus_id"];
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
		$isDirty = $isDirty || ((int)$this->memberTypeId !== (int)$this->_initial["memberTypeId"]);
		$isDirty = $isDirty || ((int)$this->memberstatusId !== (int)$this->_initial["memberstatusId"]);
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
			"INSERT INTO {$db->le}member{$db->re} (",
			"	{$db->le}person_entity_id{$db->re}, {$db->le}member_type_id{$db->re}, {$db->le}memberstatus_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->id)?null:(int)$this->id) . ",",
				$db->queryValue(is_null($this->memberTypeId)?null:(int)$this->memberTypeId) . ",",
				$db->queryValue(is_null($this->memberstatusId)?null:(int)$this->memberstatusId) . ",",
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
				"UPDATE {$db->le}member{$db->re} SET",
					"{$db->le}member_type_id{$db->re}={$db->queryValue(is_null($this->memberTypeId)?null:(int)$this->memberTypeId)},",
					"{$db->le}memberstatus_id{$db->re}={$db->queryValue(is_null($this->memberstatusId)?null:(int)$this->memberstatusId)},",
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
		$record = Member::select($db->encapsulate("member") . ".mdate as fdate,null as tdate,{$db->encapsulate("member")}.*",null,$db->encapsulate("member").".person_entity_id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}member{$dbLog->re} (",
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
				"FROM {$dbLog->le}member{$dbLog->re}",
				"WHERE {$dbLog->le}member{$dbLog->re}.{$dbLog->le}person_entity_id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}member{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("member") . " WHERE person_entity_id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("member") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}member{$db->le}",
			"INNER JOIN {$db->le}person{$db->re} ON {$db->le}member{$db->re}.{$db->le}person_entity_id{$db->re}={$db->le}person{$db->re}.{$db->le}entity_id{$db->re}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}person{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}member_type{$db->re} ON {$db->le}member{$db->re}.{$db->le}member_type_id{$db->re}={$db->le}member_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}memberstatus{$db->re} ON {$db->le}member{$db->re}.{$db->le}memberstatus_id{$db->re}={$db->le}memberstatus{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}person_type{$db->re} ON {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}={$db->le}person_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}entity_type{$db->re} ON {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}={$db->le}entity_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}member{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Member::select("{$db->le}member{$db->le}.person_entity_id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Member::select("{$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}first_name{$db->re}, {$db->le}person{$db->re}.{$db->le}middle_name{$db->re}, {$db->le}person{$db->re}.{$db->le}last_name{$db->re}, {$db->le}person{$db->re}.{$db->le}prefix{$db->re}, {$db->le}person{$db->re}.{$db->le}suffix{$db->re}, {$db->le}person{$db->re}.{$db->le}ssn{$db->re}, {$db->le}person{$db->re}.{$db->le}email{$db->re}, {$db->le}person{$db->re}.{$db->le}nickname{$db->re}, {$db->le}person{$db->re}.{$db->le}initials{$db->re}, {$db->le}person{$db->re}.{$db->le}birthdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deathdate{$db->re}, {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}member{$db->re}.{$db->le}member_type_id{$db->re}, {$db->le}member{$db->re}.{$db->le}memberstatus_id{$db->re}, {$db->le}member{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}member{$db->re}.{$db->le}mdate{$db->re}, {$db->le}member{$db->re}.{$db->le}cdate{$db->re}, {$db->le}member{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Member();
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
				$object->memberTypeId = $record["member_type_id"];
				$object->memberstatusId = $record["memberstatus_id"];
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
		return Member::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Member Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new MemberType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new MemberType($this->memberTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new MemberType(null, $type);
		$this->memberTypeId = $type->id;
		return $this->memberTypeId;
	}

	public function getMemberMemberdate($memberdateId, $type="default") {
		return new MemberMemberdate(null, $this->id, $memberdateId, MemberMemberdate::typeId($type));
	}

	public function getPerson() {
		return new Person($this->id);
	}

	public function getMemberType() {
		return new MemberType($this->memberTypeId);
	}

	public function setMemberType(MemberType $memberType) {
		if ($memberType->id>0) {
			$this->memberTypeId = $memberType->id;
		}
	}

	public function getMemberstatus() {
		return new Memberstatus($this->memberstatusId);
	}

	public function setMemberstatus(Memberstatus $memberstatus) {
		if ($memberstatus->id>0) {
			$this->memberstatusId = $memberstatus->id;
		}
	}

	public function setMemberdate($memberdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeMemberdateList($type);
		$this->addMemberdate($memberdate, $type);
		return $this;
	}
	public function removeMemberdate($memberdate, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($memberdate) ? $memberdate : array($memberdate);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getMemberMemberdate($id, $type);
			if ($deleteObject) {
				$relationship->getMemberdate()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeMemberdateList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return MemberMemberdate::deleteAll($this->id, null, $type);
		}
	}
	public function addMemberdate($memberdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($memberdate)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($memberdate) ? $memberdate : array($memberdate);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getMemberMemberdate($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getMemberdate($type="default") {
		if (isset($this->_cache["Memberdate"]) && isset($this->_cache["Memberdate"][$type])) {
			$memberdate = $this->_cache["Memberdate"][$type];
		} else {
			$memberdate = new Memberdate($this->getMemberdateId($type));
		}
		$this->_cache["Memberdate"][$type] = $memberdate;
		return $this->_cache["Memberdate"][$type];
	}
	public function getMemberdateList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getMemberdateIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Memberdate::objects($order, "{$db->le}memberdate{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getMemberdateId($type="default") {
		return $this->getMemberdateIds($type)->get(0);
	}
	public function getMemberdateIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}memberdate{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}memberdate{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}memberdate{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}memberdate{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}memberdate{$db->re} ",
			"INNER JOIN {$db->le}member_memberdate{$db->re} ON {$db->le}member_memberdate{$db->re}.{$db->le}memberdate_id{$db->re}={$db->le}memberdate{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}member_memberdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}memberdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}member_memberdate{$db->re}.{$db->le}member_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}member_memberdate{$db->re}.{$db->le}member_memberdate_type_id{$db->re}=" . $db->queryValue(MemberMemberdate::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}member_memberdate{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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