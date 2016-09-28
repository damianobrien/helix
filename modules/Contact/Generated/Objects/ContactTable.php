<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the contact table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the contact
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called ContactExtension, and should extend the ContactTable
 * class.  The custom code file should be in the helix/modules/Contact folder
 * and should be called ContactExtension.php
 * 
 * Object -> Entity -> Person -> Contact
 */
class ContactTable extends Person {
	public $logSequence;
	public $fdate;
	public $tdate;

	public $abbreviation;
	public $prefix;
	public $title;
	public $longTitle;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $ssn=null, $email=null, $abbreviation=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->description = null;
		$this->entityTypeId = null;
		$this->firstName = null;
		$this->middleName = null;
		$this->lastName = null;
		$this->suffix = null;
		$this->ssn = $ssn;
		$this->email = $email;
		$this->nickname = null;
		$this->initials = null;
		$this->birthdate = null;
		$this->deathdate = null;
		$this->personTypeId = null;
		$this->createdById = null;
		$this->abbreviation = $abbreviation;
		$this->prefix = null;
		$this->title = null;
		$this->longTitle = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}contact{$db->re}.{$db->le}person_entity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($ssn)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}ssn{$db->re}={$db->queryValue($ssn)}";
		} else if (isset($email)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}email{$db->re}={$db->queryValue($email)}";
		} else if (isset($abbreviation)) {
			$condition = "{$db->le}contact{$db->re}.{$db->le}abbreviation{$db->re}={$db->queryValue($abbreviation)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}first_name{$db->re}, {$db->le}person{$db->re}.{$db->le}middle_name{$db->re}, {$db->le}person{$db->re}.{$db->le}last_name{$db->re}, {$db->le}person{$db->re}.{$db->le}suffix{$db->re}, {$db->le}person{$db->re}.{$db->le}ssn{$db->re}, {$db->le}person{$db->re}.{$db->le}email{$db->re}, {$db->le}person{$db->re}.{$db->le}nickname{$db->re}, {$db->le}person{$db->re}.{$db->le}initials{$db->re}, {$db->le}person{$db->re}.{$db->le}birthdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deathdate{$db->re}, {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}contact{$db->re}.{$db->le}abbreviation{$db->re}, {$db->le}contact{$db->re}.{$db->le}prefix{$db->re}, {$db->le}contact{$db->re}.{$db->le}title{$db->re}, {$db->le}contact{$db->re}.{$db->le}long_title{$db->re}, {$db->le}contact{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}contact{$db->re}.{$db->le}mdate{$db->re}, {$db->le}contact{$db->re}.{$db->le}cdate{$db->re}, {$db->le}contact{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}contact{$db->re}",
			"INNER JOIN {$db->le}person{$db->re} ON {$db->le}contact{$db->re}.{$db->le}person_entity_id{$db->re}={$db->le}person{$db->re}.{$db->le}entity_id{$db->re}",
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
				$this->suffix = $db->record["suffix"];
				$this->ssn = $db->record["ssn"];
				$this->email = $db->record["email"];
				$this->nickname = $db->record["nickname"];
				$this->initials = $db->record["initials"];
				$this->birthdate = is_null(($db->record["birthdate"]))?null:new Date($db->record["birthdate"]);
				$this->deathdate = is_null(($db->record["deathdate"]))?null:new Date($db->record["deathdate"]);
				$this->personTypeId = $db->record["person_type_id"];
				$this->createdById = $db->record["created_by_id"];
				$this->abbreviation = $db->record["abbreviation"];
				$this->prefix = $db->record["prefix"];
				$this->title = $db->record["title"];
				$this->longTitle = $db->record["long_title"];
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
		$this->_initial["suffix"] = $this->suffix;
		$this->_initial["ssn"] = $this->ssn;
		$this->_initial["email"] = $this->email;
		$this->_initial["nickname"] = $this->nickname;
		$this->_initial["initials"] = $this->initials;
		$this->_initial["birthdate"] = $this->birthdate;
		$this->_initial["deathdate"] = $this->deathdate;
		$this->_initial["personTypeId"] = $this->personTypeId;
		$this->_initial["createdById"] = $this->createdById;
		$this->_initial["abbreviation"] = $this->abbreviation;
		$this->_initial["prefix"] = $this->prefix;
		$this->_initial["title"] = $this->title;
		$this->_initial["longTitle"] = $this->longTitle;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $ssn=null, $email=null, $abbreviation=null) {
		$object = new Contact();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}contact{$db->re}.{$db->le}person_entity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($ssn)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}ssn{$db->re}={$db->queryValue($ssn)}";
		} else if (isset($email)) {
			$condition = "{$db->le}person{$db->re}.{$db->le}email{$db->re}={$db->queryValue($email)}";
		} else if (isset($abbreviation)) {
			$condition = "{$db->le}contact{$db->re}.{$db->le}abbreviation{$db->re}={$db->queryValue($abbreviation)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}contact{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}contact{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}contact{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}person{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}person{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}person{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}entity{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}entity{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}entity{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}contact{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}contact{$db->re}.{$db->le}fdate{$db->re}, {$db->le}contact{$db->re}.{$db->le}tdate{$db->re}, {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}first_name{$db->re}, {$db->le}person{$db->re}.{$db->le}middle_name{$db->re}, {$db->le}person{$db->re}.{$db->le}last_name{$db->re}, {$db->le}person{$db->re}.{$db->le}suffix{$db->re}, {$db->le}person{$db->re}.{$db->le}ssn{$db->re}, {$db->le}person{$db->re}.{$db->le}email{$db->re}, {$db->le}person{$db->re}.{$db->le}nickname{$db->re}, {$db->le}person{$db->re}.{$db->le}initials{$db->re}, {$db->le}person{$db->re}.{$db->le}birthdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deathdate{$db->re}, {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}contact{$db->re}.{$db->le}abbreviation{$db->re}, {$db->le}contact{$db->re}.{$db->le}prefix{$db->re}, {$db->le}contact{$db->re}.{$db->le}title{$db->re}, {$db->le}contact{$db->re}.{$db->le}long_title{$db->re}, {$db->le}contact{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}contact{$db->re}.{$db->le}mdate{$db->re}, {$db->le}contact{$db->re}.{$db->le}cdate{$db->re}, {$db->le}contact{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}contact{$db->re}",
			"INNER JOIN {$db->le}person{$db->re} ON {$db->le}contact{$db->re}.{$db->le}person_entity_id{$db->re}={$db->le}person{$db->re}.{$db->le}entity_id{$db->re}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}person{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$query .= "ORDER BY {$db->le}contact{$db->re}.log_sequence desc limit 1";
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
				$object->suffix = $db->record["suffix"];
				$object->ssn = $db->record["ssn"];
				$object->email = $db->record["email"];
				$object->nickname = $db->record["nickname"];
				$object->initials = $db->record["initials"];
				$object->birthdate = is_null(($db->record["birthdate"]))?null:new Date($db->record["birthdate"]);
				$object->deathdate = is_null(($db->record["deathdate"]))?null:new Date($db->record["deathdate"]);
				$object->personTypeId = $db->record["person_type_id"];
				$object->createdById = $db->record["created_by_id"];
				$object->abbreviation = $db->record["abbreviation"];
				$object->prefix = $db->record["prefix"];
				$object->title = $db->record["title"];
				$object->longTitle = $db->record["long_title"];
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
		$isDirty = $isDirty || ((string)$this->suffix !== (string)$this->_initial["suffix"]);
		$isDirty = $isDirty || ((string)$this->ssn !== (string)$this->_initial["ssn"]);
		$isDirty = $isDirty || ((string)$this->email !== (string)$this->_initial["email"]);
		$isDirty = $isDirty || ((string)$this->nickname !== (string)$this->_initial["nickname"]);
		$isDirty = $isDirty || ((string)$this->initials !== (string)$this->_initial["initials"]);
		$isDirty = $isDirty || ((string)$this->birthdate != (string)$this->_initial["birthdate"]);
		$isDirty = $isDirty || ((string)$this->deathdate != (string)$this->_initial["deathdate"]);
		$isDirty = $isDirty || ((int)$this->personTypeId !== (int)$this->_initial["personTypeId"]);
		$isDirty = $isDirty || ((int)$this->createdById !== (int)$this->_initial["createdById"]);
		$isDirty = $isDirty || ((string)$this->abbreviation !== (string)$this->_initial["abbreviation"]);
		$isDirty = $isDirty || ((string)$this->prefix !== (string)$this->_initial["prefix"]);
		$isDirty = $isDirty || ((string)$this->title !== (string)$this->_initial["title"]);
		$isDirty = $isDirty || ((string)$this->longTitle !== (string)$this->_initial["longTitle"]);
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
			"INSERT INTO {$db->le}contact{$db->re} (",
			"	{$db->le}person_entity_id{$db->re}, {$db->le}abbreviation{$db->re}, {$db->le}prefix{$db->re}, {$db->le}title{$db->re}, {$db->le}long_title{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->id)?null:(int)$this->id) . ",",
				$db->queryValue($this->abbreviation) . ",",
				$db->queryValue($this->prefix) . ",",
				$db->queryValue($this->title) . ",",
				$db->queryValue($this->longTitle) . ",",
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
				"UPDATE {$db->le}contact{$db->re} SET",
					"{$db->le}abbreviation{$db->re}={$db->queryValue($this->abbreviation)},",
					"{$db->le}prefix{$db->re}={$db->queryValue($this->prefix)},",
					"{$db->le}title{$db->re}={$db->queryValue($this->title)},",
					"{$db->le}long_title{$db->re}={$db->queryValue($this->longTitle)},",
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
		$record = Contact::select($db->encapsulate("contact") . ".mdate as fdate,null as tdate,{$db->encapsulate("contact")}.*",null,$db->encapsulate("contact").".person_entity_id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}contact{$dbLog->re} (",
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
				"FROM {$dbLog->le}contact{$dbLog->re}",
				"WHERE {$dbLog->le}contact{$dbLog->re}.{$dbLog->le}person_entity_id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}contact{$dbLog->re}",
					"SET {$dbLog->le}tdate{$dbLog->re}={$record["mdate"]}",
					"where log_sequence={$updateSequence}"
				));
				$dbLog->query($query);
			}
		}
		$db->changeDatabase($database);
		return $status;
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
		$query = "DELETE FROM " . $db->encapsulate("contact") . " WHERE person_entity_id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("contact") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}contact{$db->le}",
			"INNER JOIN {$db->le}person{$db->re} ON {$db->le}contact{$db->re}.{$db->le}person_entity_id{$db->re}={$db->le}person{$db->re}.{$db->le}entity_id{$db->re}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}person{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}person_type{$db->re} ON {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}={$db->le}person_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}entity_type{$db->re} ON {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}={$db->le}entity_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}contact{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Contact::select("{$db->le}contact{$db->le}.person_entity_id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Contact::select("{$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}first_name{$db->re}, {$db->le}person{$db->re}.{$db->le}middle_name{$db->re}, {$db->le}person{$db->re}.{$db->le}last_name{$db->re}, {$db->le}person{$db->re}.{$db->le}suffix{$db->re}, {$db->le}person{$db->re}.{$db->le}ssn{$db->re}, {$db->le}person{$db->re}.{$db->le}email{$db->re}, {$db->le}person{$db->re}.{$db->le}nickname{$db->re}, {$db->le}person{$db->re}.{$db->le}initials{$db->re}, {$db->le}person{$db->re}.{$db->le}birthdate{$db->re}, {$db->le}person{$db->re}.{$db->le}deathdate{$db->re}, {$db->le}person{$db->re}.{$db->le}person_type_id{$db->re}, {$db->le}person{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}contact{$db->re}.{$db->le}abbreviation{$db->re}, {$db->le}contact{$db->re}.{$db->le}prefix{$db->re}, {$db->le}contact{$db->re}.{$db->le}title{$db->re}, {$db->le}contact{$db->re}.{$db->le}long_title{$db->re}, {$db->le}contact{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}contact{$db->re}.{$db->le}mdate{$db->re}, {$db->le}contact{$db->re}.{$db->le}cdate{$db->re}, {$db->le}contact{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Contact();
				$object->id = $record["id"];
				$object->description = $record["description"];
				$object->entityTypeId = $record["entity_type_id"];
				$object->firstName = $record["first_name"];
				$object->middleName = $record["middle_name"];
				$object->lastName = $record["last_name"];
				$object->suffix = $record["suffix"];
				$object->ssn = $record["ssn"];
				$object->email = $record["email"];
				$object->nickname = $record["nickname"];
				$object->initials = $record["initials"];
				$object->birthdate = is_null(($record["birthdate"]))?null:new Date($record["birthdate"]);
				$object->deathdate = is_null(($record["deathdate"]))?null:new Date($record["deathdate"]);
				$object->personTypeId = $record["person_type_id"];
				$object->createdById = $record["created_by_id"];
				$object->abbreviation = $record["abbreviation"];
				$object->prefix = $record["prefix"];
				$object->title = $record["title"];
				$object->longTitle = $record["long_title"];
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
			$clauses[] = "entity.description LIKE '%{$keyword}%' OR person.first_name LIKE '%{$keyword}%' OR person.middle_name LIKE '%{$keyword}%' OR person.last_name LIKE '%{$keyword}%' OR person.suffix LIKE '%{$keyword}%' OR person.ssn LIKE '%{$keyword}%' OR person.email LIKE '%{$keyword}%' OR person.nickname LIKE '%{$keyword}%' OR person.initials LIKE '%{$keyword}%' OR contact.abbreviation LIKE '%{$keyword}%' OR contact.prefix LIKE '%{$keyword}%' OR contact.title LIKE '%{$keyword}%' OR contact.long_title LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Contact::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Contact Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getBusinessContact($businessId, $type="default") {
		return new BusinessContact(null, $businessId, $this->id, BusinessContact::typeId($type));
	}

	public function getCalendarContact($calendarId, $type="default") {
		return new CalendarContact(null, $calendarId, $this->id, CalendarContact::typeId($type));
	}

	public function getCommentContact($commentId, $type="default") {
		return new CommentContact(null, $commentId, $this->id, CommentContact::typeId($type));
	}

	public function getContactEvent($eventId, $type="default") {
		return new ContactEvent(null, $this->id, $eventId, ContactEvent::typeId($type));
	}

	public function getContactGroup($groupId, $type="default") {
		return new ContactGroup(null, $this->id, $groupId, ContactGroup::typeId($type));
	}

	public function getContactResource($resourceId, $type="default") {
		return new ContactResource(null, $this->id, $resourceId, ContactResource::typeId($type));
	}

	public function getPerson() {
		return new Person($this->id);
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
			$relationship = $this->getBusinessContact($id, $type);
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
			return BusinessContact::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getBusinessContact($id, $type);
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
			"INNER JOIN {$db->le}business_contact{$db->re} ON {$db->le}business_contact{$db->re}.{$db->le}business_entity_id{$db->re}={$db->le}business{$db->re}.{$db->le}entity_id{$db->re} ",
			"	AND {$db->le}business_contact{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business_contact{$db->re}.{$db->le}contact_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}business_contact{$db->re}.{$db->le}business_contact_type_id{$db->re}=" . $db->queryValue(BusinessContact::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}business_contact{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setCalendar($calendar=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeCalendarList($type);
		$this->addCalendar($calendar, $type);
		return $this;
	}
	public function removeCalendar($calendar, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($calendar) ? $calendar : array($calendar);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getCalendarContact($id, $type);
			if ($deleteObject) {
				$relationship->getCalendar()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeCalendarList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return CalendarContact::deleteAll(null, $this->id, $type);
		}
	}
	public function addCalendar($calendar=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($calendar)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($calendar) ? $calendar : array($calendar);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getCalendarContact($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getCalendar($type="default") {
		if (isset($this->_cache["Calendar"]) && isset($this->_cache["Calendar"][$type])) {
			$calendar = $this->_cache["Calendar"][$type];
		} else {
			$calendar = new Calendar($this->getCalendarId($type));
		}
		$this->_cache["Calendar"][$type] = $calendar;
		return $this->_cache["Calendar"][$type];
	}
	public function getCalendarList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getCalendarIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Calendar::objects($order, "{$db->le}calendar{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getCalendarId($type="default") {
		return $this->getCalendarIds($type)->get(0);
	}
	public function getCalendarIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}calendar{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}calendar{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}calendar{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}calendar{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}calendar{$db->re} ",
			"INNER JOIN {$db->le}calendar_contact{$db->re} ON {$db->le}calendar_contact{$db->re}.{$db->le}calendar_id{$db->re}={$db->le}calendar{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}calendar_contact{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}calendar{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}calendar_contact{$db->re}.{$db->le}contact_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}calendar_contact{$db->re}.{$db->le}calendar_contact_type_id{$db->re}=" . $db->queryValue(CalendarContact::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}calendar_contact{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getCommentContact($id, $type);
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
			return CommentContact::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getCommentContact($id, $type);
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
			"INNER JOIN {$db->le}comment_contact{$db->re} ON {$db->le}comment_contact{$db->re}.{$db->le}comment_id{$db->re}={$db->le}comment{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}comment_contact{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment_contact{$db->re}.{$db->le}contact_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}comment_contact{$db->re}.{$db->le}comment_contact_type_id{$db->re}=" . $db->queryValue(CommentContact::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}comment_contact{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setEvent($event=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeEventList($type);
		$this->addEvent($event, $type);
		return $this;
	}
	public function removeEvent($event, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($event) ? $event : array($event);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getContactEvent($id, $type);
			if ($deleteObject) {
				$relationship->getEvent()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeEventList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ContactEvent::deleteAll($this->id, null, $type);
		}
	}
	public function addEvent($event=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($event)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($event) ? $event : array($event);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getContactEvent($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getEvent($type="default") {
		if (isset($this->_cache["Event"]) && isset($this->_cache["Event"][$type])) {
			$event = $this->_cache["Event"][$type];
		} else {
			$event = new Event($this->getEventId($type));
		}
		$this->_cache["Event"][$type] = $event;
		return $this->_cache["Event"][$type];
	}
	public function getEventList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getEventIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Event::objects($order, "{$db->le}event{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getEventId($type="default") {
		return $this->getEventIds($type)->get(0);
	}
	public function getEventIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}event{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}event{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}event{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}event{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}event{$db->re} ",
			"INNER JOIN {$db->le}contact_event{$db->re} ON {$db->le}contact_event{$db->re}.{$db->le}event_id{$db->re}={$db->le}event{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}contact_event{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}event{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contact_event{$db->re}.{$db->le}contact_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}contact_event{$db->re}.{$db->le}contact_event_type_id{$db->re}=" . $db->queryValue(ContactEvent::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}contact_event{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getContactGroup($id, $type);
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
			return ContactGroup::deleteAll($this->id, null, $type);
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
				$relationship = $this->getContactGroup($id, $type);
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
			"INNER JOIN {$db->le}contact_group{$db->re} ON {$db->le}contact_group{$db->re}.{$db->le}group_id{$db->re}={$db->le}group{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}contact_group{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}group{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contact_group{$db->re}.{$db->le}contact_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}contact_group{$db->re}.{$db->le}contact_group_type_id{$db->re}=" . $db->queryValue(ContactGroup::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}contact_group{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getContactResource($id, $type);
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
			return ContactResource::deleteAll($this->id, null, $type);
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
				$relationship = $this->getContactResource($id, $type);
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
			"INNER JOIN {$db->le}contact_resource{$db->re} ON {$db->le}contact_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->le}resource{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}contact_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contact_resource{$db->re}.{$db->le}contact_person_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}contact_resource{$db->re}.{$db->le}contact_resource_type_id{$db->re}=" . $db->queryValue(ContactResource::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}contact_resource{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function getParent($type="default") {
		$db = Database::getInstance();
		$relationships = ContactContact::objects(null, "{$db->le}child_contact_id{$db->re}='{$this->id}' AND {$db->le}contact_contact_type_id{$db->re}='" . ContactContact::typeId($type) . "'");
		return ($relationships->count()===1) ? $relationships->get(0)->getParent() : new Contact();
	}

	public function getChildIds() {
		$db = Database::getInstance();
		return ContactContact::select("contact_contact.child_contact_id", null, "contact_contact.parent_contact_id={$this->id}");
	}

	public function getChildren() {
		return $this->hasChildren() ? Contact::objects(null, "contact.person_entity_id IN (" . $this->getChildIds()->join(",") . ")") : new Collection();
	}

	public function getChildCount() {
		return $this->getChildIds()->count();
	}

	public function hasChildren() {
		return $this->getChildCount()>0;
	}

	public function isChild() {
		return $this->getParent()->id>0;
	}

	public function isRoot() {
		return $this->id>0 && !$this->isChild();
	}

	public function getSiblingIds() {
		$db = Database::getInstance();
		return ContactContact::select("contact_contact.child_contact_id", null, "contact_contact.child_contact_id<>'{$this->id}' AND contact_contact.parent_contact_id=" . $db->queryValue($this->getParent()->id));
	}

	public function getSiblings() {
		return $this->hasSiblings() ? Contact::objects(null, "contact.person_entity_id IN (" . $this->getSiblingIds()->join(",") . ")") : new Collection();
	}

	public function getSiblingCount() {
		return $this->getSiblingIds()->count();
	}

	public function hasSiblings() {
		return $this->getSiblingCount()>0;
	}

	public function getDescendants() {
		$descendants = new Collection();
		foreach ($this->getChildren() as $child) {
			$descendants->add($child);
			if ($child->hasChildren()) {
				$descendants->add($child->getDescendants());
			}
		}
		return $descendants;
	}

	public function getAncestors() {
		$ancestors = new Collection();
		$child = $this;
		while ($child->isChild()) {
			$parent = $child->getParent();
			$ancestors->add($parent);
			$child = $parent;
		}
		return $ancestors;
	}

	public function getLevel() {
		$level = 0;
		$child = $this;
		while ($child->isChild()) {
			$level++;
			$child = $child->getParent();
		}
		return $level;
	}

}
?>