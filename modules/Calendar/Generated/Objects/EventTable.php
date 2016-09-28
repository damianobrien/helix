<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the event table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the event
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called EventExtension, and should extend the EventTable
 * class.  The custom code file should be in the helix/modules/Calendar folder
 * and should be called EventExtension.php
 * 
 * Object -> Event
 */
class EventTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $name;
	public $startDate;
	public $endDate;
	public $description;
	public $startTime;
	public $endTime;
	public $eventpriorityId;
	public $eventstatusId;
	public $eventTypeId;
	public $capacity;
	public $allday;
	public $private;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = null;
		$this->startDate = null;
		$this->endDate = null;
		$this->description = null;
		$this->startTime = null;
		$this->endTime = null;
		$this->eventpriorityId = null;
		$this->eventstatusId = null;
		$this->eventTypeId = null;
		$this->capacity = 0;
		$this->allday = false;
		$this->private = false;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}event{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}event{$db->re}.{$db->le}id{$db->re}, {$db->le}event{$db->re}.{$db->le}name{$db->re}, {$db->le}event{$db->re}.{$db->le}start_date{$db->re}, {$db->le}event{$db->re}.{$db->le}end_date{$db->re}, {$db->le}event{$db->re}.{$db->le}description{$db->re}, {$db->le}event{$db->re}.{$db->le}start_time{$db->re}, {$db->le}event{$db->re}.{$db->le}end_time{$db->re}, {$db->le}event{$db->re}.{$db->le}eventpriority_id{$db->re}, {$db->le}event{$db->re}.{$db->le}eventstatus_id{$db->re}, {$db->le}event{$db->re}.{$db->le}event_type_id{$db->re}, {$db->le}event{$db->re}.{$db->le}capacity{$db->re}, {$db->le}event{$db->re}.{$db->le}allday{$db->re}, {$db->le}event{$db->re}.{$db->le}private{$db->re}, {$db->le}event{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}event{$db->re}.{$db->le}mdate{$db->re}, {$db->le}event{$db->re}.{$db->le}cdate{$db->re}, {$db->le}event{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}event{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->startDate = is_null(($db->record["start_date"]))?null:new Date($db->record["start_date"]);
				$this->endDate = is_null(($db->record["end_date"]))?null:new Date($db->record["end_date"]);
				$this->description = $db->record["description"];
				$this->startTime = is_null(($db->record["start_time"]))?null:new Date($db->record["start_time"]);
				$this->endTime = is_null(($db->record["end_time"]))?null:new Date($db->record["end_time"]);
				$this->eventpriorityId = $db->record["eventpriority_id"];
				$this->eventstatusId = $db->record["eventstatus_id"];
				$this->eventTypeId = $db->record["event_type_id"];
				$this->capacity = $db->record["capacity"];
				$this->allday = $db->record["allday"];
				$this->private = $db->record["private"];
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["name"] = $this->name;
		$this->_initial["startDate"] = $this->startDate;
		$this->_initial["endDate"] = $this->endDate;
		$this->_initial["description"] = $this->description;
		$this->_initial["startTime"] = $this->startTime;
		$this->_initial["endTime"] = $this->endTime;
		$this->_initial["eventpriorityId"] = $this->eventpriorityId;
		$this->_initial["eventstatusId"] = $this->eventstatusId;
		$this->_initial["eventTypeId"] = $this->eventTypeId;
		$this->_initial["capacity"] = $this->capacity;
		$this->_initial["allday"] = $this->allday;
		$this->_initial["private"] = $this->private;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Event();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}event{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}event{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}event{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}event{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}event{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}event{$db->re}.{$db->le}fdate{$db->re}, {$db->le}event{$db->re}.{$db->le}tdate{$db->re}, {$db->le}event{$db->re}.{$db->le}id{$db->re}, {$db->le}event{$db->re}.{$db->le}name{$db->re}, {$db->le}event{$db->re}.{$db->le}start_date{$db->re}, {$db->le}event{$db->re}.{$db->le}end_date{$db->re}, {$db->le}event{$db->re}.{$db->le}description{$db->re}, {$db->le}event{$db->re}.{$db->le}start_time{$db->re}, {$db->le}event{$db->re}.{$db->le}end_time{$db->re}, {$db->le}event{$db->re}.{$db->le}eventpriority_id{$db->re}, {$db->le}event{$db->re}.{$db->le}eventstatus_id{$db->re}, {$db->le}event{$db->re}.{$db->le}event_type_id{$db->re}, {$db->le}event{$db->re}.{$db->le}capacity{$db->re}, {$db->le}event{$db->re}.{$db->le}allday{$db->re}, {$db->le}event{$db->re}.{$db->le}private{$db->re}, {$db->le}event{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}event{$db->re}.{$db->le}mdate{$db->re}, {$db->le}event{$db->re}.{$db->le}cdate{$db->re}, {$db->le}event{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}event{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}event{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->startDate = is_null(($db->record["start_date"]))?null:new Date($db->record["start_date"]);
				$object->endDate = is_null(($db->record["end_date"]))?null:new Date($db->record["end_date"]);
				$object->description = $db->record["description"];
				$object->startTime = is_null(($db->record["start_time"]))?null:new Date($db->record["start_time"]);
				$object->endTime = is_null(($db->record["end_time"]))?null:new Date($db->record["end_time"]);
				$object->eventpriorityId = $db->record["eventpriority_id"];
				$object->eventstatusId = $db->record["eventstatus_id"];
				$object->eventTypeId = $db->record["event_type_id"];
				$object->capacity = $db->record["capacity"];
				$object->allday = $db->record["allday"];
				$object->private = $db->record["private"];
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
		$isDirty = $isDirty || ((string)$this->name !== (string)$this->_initial["name"]);
		$isDirty = $isDirty || ((string)$this->startDate != (string)$this->_initial["startDate"]);
		$isDirty = $isDirty || ((string)$this->endDate != (string)$this->_initial["endDate"]);
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
		$isDirty = $isDirty || ((string)$this->startTime != (string)$this->_initial["startTime"]);
		$isDirty = $isDirty || ((string)$this->endTime != (string)$this->_initial["endTime"]);
		$isDirty = $isDirty || ((int)$this->eventpriorityId !== (int)$this->_initial["eventpriorityId"]);
		$isDirty = $isDirty || ((int)$this->eventstatusId !== (int)$this->_initial["eventstatusId"]);
		$isDirty = $isDirty || ((int)$this->eventTypeId !== (int)$this->_initial["eventTypeId"]);
		$isDirty = $isDirty || ((int)$this->capacity !== (int)$this->_initial["capacity"]);
		$isDirty = $isDirty || ((int)$this->allday !== (int)$this->_initial["allday"]);
		$isDirty = $isDirty || ((int)$this->private !== (int)$this->_initial["private"]);
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

	public function insert() {
		if (isset($this->_snapshot)) {return false;}
		global $session, $config;

		$db = Database::getInstance();
		$query = implode(NL, array(
			"INSERT INTO {$db->le}event{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}start_date{$db->re}, {$db->le}end_date{$db->re}, {$db->le}description{$db->re}, {$db->le}start_time{$db->re}, {$db->le}end_time{$db->re}, {$db->le}eventpriority_id{$db->re}, {$db->le}eventstatus_id{$db->re}, {$db->le}event_type_id{$db->re}, {$db->le}capacity{$db->re}, {$db->le}allday{$db->re}, {$db->le}private{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->startDate) . ",",
				$db->queryValue($this->endDate) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue($this->startTime) . ",",
				$db->queryValue($this->endTime) . ",",
				$db->queryValue(is_null($this->eventpriorityId)?null:(int)$this->eventpriorityId) . ",",
				$db->queryValue(is_null($this->eventstatusId)?null:(int)$this->eventstatusId) . ",",
				$db->queryValue(is_null($this->eventTypeId)?null:(int)$this->eventTypeId) . ",",
				$db->queryValue(is_null($this->capacity)?null:(int)$this->capacity) . ",",
				$db->queryValue(is_null($this->allday)?null:(int)$this->allday) . ",",
				$db->queryValue(is_null($this->private)?null:(int)$this->private) . ",",
				$db->queryValue((int)$session->getUserId()) . ",",
				$db->queryValue(timestamp()) . ",",
				$db->queryValue(timestamp()) . ",",
				$db->queryValue(is_null($this->deleted)?null:(int)$this->deleted),
			")"
		));
		$status = $db->query($query);
		$this->id = $db->getInsertedId();

		if ($config["enable_database_log"]) {
			$this->log();
		}

		return $status;
	}

	public function update() {
		if (isset($this->_snapshot)) {return false;}
		global $session, $config;

		if ($this->isDirty()) {
			$db = Database::getInstance();
			$query = implode(NL, array(
				"UPDATE {$db->le}event{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}start_date{$db->re}={$db->queryValue($this->startDate)},",
					"{$db->le}end_date{$db->re}={$db->queryValue($this->endDate)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}start_time{$db->re}={$db->queryValue($this->startTime)},",
					"{$db->le}end_time{$db->re}={$db->queryValue($this->endTime)},",
					"{$db->le}eventpriority_id{$db->re}={$db->queryValue(is_null($this->eventpriorityId)?null:(int)$this->eventpriorityId)},",
					"{$db->le}eventstatus_id{$db->re}={$db->queryValue(is_null($this->eventstatusId)?null:(int)$this->eventstatusId)},",
					"{$db->le}event_type_id{$db->re}={$db->queryValue(is_null($this->eventTypeId)?null:(int)$this->eventTypeId)},",
					"{$db->le}capacity{$db->re}={$db->queryValue(is_null($this->capacity)?null:(int)$this->capacity)},",
					"{$db->le}allday{$db->re}={$db->queryValue(is_null($this->allday)?null:(int)$this->allday)},",
					"{$db->le}private{$db->re}={$db->queryValue(is_null($this->private)?null:(int)$this->private)},",
					"{$db->le}updated_by_id{$db->re}={$db->queryValue((int)$session->getUserId())},",
					"{$db->le}mdate{$db->re}={$db->queryValue(timestamp())},",
					"{$db->le}deleted{$db->re}={$db->queryValue(is_null($this->deleted)?null:(int)$this->deleted)}",
				"WHERE id={$db->queryValue((int)$this->id)}"
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
		$record = Event::select($db->encapsulate("event") . ".mdate as fdate,null as tdate,{$db->encapsulate("event")}.*",null,$db->encapsulate("event").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}event{$dbLog->re} (",
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
				"FROM {$dbLog->le}event{$dbLog->re}",
				"WHERE {$dbLog->le}event{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}event{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("event") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("event") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}event{$db->le}",
			"LEFT JOIN {$db->le}eventpriority{$db->re} ON {$db->le}event{$db->re}.{$db->le}eventpriority_id{$db->re}={$db->le}eventpriority{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}eventstatus{$db->re} ON {$db->le}event{$db->re}.{$db->le}eventstatus_id{$db->re}={$db->le}eventstatus{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}event_type{$db->re} ON {$db->le}event{$db->re}.{$db->le}event_type_id{$db->re}={$db->le}event_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}event{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Event::select("{$db->le}event{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Event::select("{$db->le}event{$db->re}.{$db->le}id{$db->re}, {$db->le}event{$db->re}.{$db->le}name{$db->re}, {$db->le}event{$db->re}.{$db->le}start_date{$db->re}, {$db->le}event{$db->re}.{$db->le}end_date{$db->re}, {$db->le}event{$db->re}.{$db->le}description{$db->re}, {$db->le}event{$db->re}.{$db->le}start_time{$db->re}, {$db->le}event{$db->re}.{$db->le}end_time{$db->re}, {$db->le}event{$db->re}.{$db->le}eventpriority_id{$db->re}, {$db->le}event{$db->re}.{$db->le}eventstatus_id{$db->re}, {$db->le}event{$db->re}.{$db->le}event_type_id{$db->re}, {$db->le}event{$db->re}.{$db->le}capacity{$db->re}, {$db->le}event{$db->re}.{$db->le}allday{$db->re}, {$db->le}event{$db->re}.{$db->le}private{$db->re}, {$db->le}event{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}event{$db->re}.{$db->le}mdate{$db->re}, {$db->le}event{$db->re}.{$db->le}cdate{$db->re}, {$db->le}event{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Event();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->startDate = is_null(($record["start_date"]))?null:new Date($record["start_date"]);
				$object->endDate = is_null(($record["end_date"]))?null:new Date($record["end_date"]);
				$object->description = $record["description"];
				$object->startTime = is_null(($record["start_time"]))?null:new Date($record["start_time"]);
				$object->endTime = is_null(($record["end_time"]))?null:new Date($record["end_time"]);
				$object->eventpriorityId = $record["eventpriority_id"];
				$object->eventstatusId = $record["eventstatus_id"];
				$object->eventTypeId = $record["event_type_id"];
				$object->capacity = $record["capacity"];
				$object->allday = $record["allday"];
				$object->private = $record["private"];
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
			$clauses[] = "event.name LIKE '%{$keyword}%' OR event.description LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Event::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Event Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new EventType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new EventType($this->eventTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new EventType(null, $type);
		$this->eventTypeId = $type->id;
		return $this->eventTypeId;
	}

	public function getAddressEvent($addressId, $type="default") {
		return new AddressEvent(null, $addressId, $this->id, AddressEvent::typeId($type));
	}

	public function getCalendarEvent($calendarId, $type="default") {
		return new CalendarEvent(null, $calendarId, $this->id, CalendarEvent::typeId($type));
	}

	public function getEntityEvent($entityId, $type="default") {
		return new EntityEvent(null, $entityId, $this->id, EntityEvent::typeId($type));
	}

	public function getEventEventdate($eventdateId, $type="default") {
		return new EventEventdate(null, $this->id, $eventdateId, EventEventdate::typeId($type));
	}

	public function getEventService($serviceId, $type="default") {
		return new EventService(null, $this->id, $serviceId, EventService::typeId($type));
	}

	public function getEventUrl($urlId, $type="default") {
		return new EventUrl(null, $this->id, $urlId, EventUrl::typeId($type));
	}

	public function getContactEvent($contactId, $type="default") {
		return new ContactEvent(null, $contactId, $this->id, ContactEvent::typeId($type));
	}

	public function getEventpriority() {
		return new Eventpriority($this->eventpriorityId);
	}

	public function setEventpriority(Eventpriority $eventpriority) {
		if ($eventpriority->id>0) {
			$this->eventpriorityId = $eventpriority->id;
		}
	}

	public function getEventstatus() {
		return new Eventstatus($this->eventstatusId);
	}

	public function setEventstatus(Eventstatus $eventstatus) {
		if ($eventstatus->id>0) {
			$this->eventstatusId = $eventstatus->id;
		}
	}

	public function getEventType() {
		return new EventType($this->eventTypeId);
	}

	public function setEventType(EventType $eventType) {
		if ($eventType->id>0) {
			$this->eventTypeId = $eventType->id;
		}
	}

	public function setAddress($address=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeAddressList($type);
		$this->addAddress($address, $type);
		return $this;
	}
	public function removeAddress($address, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($address) ? $address : array($address);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getAddressEvent($id, $type);
			if ($deleteObject) {
				$relationship->getAddress()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeAddressList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return AddressEvent::deleteAll(null, $this->id, $type);
		}
	}
	public function addAddress($address=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($address)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($address) ? $address : array($address);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getAddressEvent($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getAddress($type="default") {
		if (isset($this->_cache["Address"]) && isset($this->_cache["Address"][$type])) {
			$address = $this->_cache["Address"][$type];
		} else {
			$address = new Address($this->getAddressId($type));
		}
		$this->_cache["Address"][$type] = $address;
		return $this->_cache["Address"][$type];
	}
	public function getAddressList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getAddressIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Address::objects($order, "{$db->le}address{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getAddressId($type="default") {
		return $this->getAddressIds($type)->get(0);
	}
	public function getAddressIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}address{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}address{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}address{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}address{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}address{$db->re} ",
			"INNER JOIN {$db->le}address_event{$db->re} ON {$db->le}address_event{$db->re}.{$db->le}address_id{$db->re}={$db->le}address{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}address_event{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}address{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}address_event{$db->re}.{$db->le}event_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}address_event{$db->re}.{$db->le}address_event_type_id{$db->re}=" . $db->queryValue(AddressEvent::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}address_event{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getCalendarEvent($id, $type);
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
			return CalendarEvent::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getCalendarEvent($id, $type);
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
			"INNER JOIN {$db->le}calendar_event{$db->re} ON {$db->le}calendar_event{$db->re}.{$db->le}calendar_id{$db->re}={$db->le}calendar{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}calendar_event{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}calendar{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}calendar_event{$db->re}.{$db->le}event_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}calendar_event{$db->re}.{$db->le}calendar_event_type_id{$db->re}=" . $db->queryValue(CalendarEvent::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}calendar_event{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setContact($contact=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeContactList($type);
		$this->addContact($contact, $type);
		return $this;
	}
	public function removeContact($contact, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($contact) ? $contact : array($contact);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getContactEvent($id, $type);
			if ($deleteObject) {
				$relationship->getContact()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeContactList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ContactEvent::deleteAll(null, $this->id, $type);
		}
	}
	public function addContact($contact=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($contact)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($contact) ? $contact : array($contact);
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
	public function getContact($type="default") {
		if (isset($this->_cache["Contact"]) && isset($this->_cache["Contact"][$type])) {
			$contact = $this->_cache["Contact"][$type];
		} else {
			$contact = new Contact($this->getContactId($type));
		}
		$this->_cache["Contact"][$type] = $contact;
		return $this->_cache["Contact"][$type];
	}
	public function getContactList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getContactIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Contact::objects($order, "{$db->le}contact{$db->le}.{$db->re}person_entity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getContactId($type="default") {
		return $this->getContactIds($type)->get(0);
	}
	public function getContactIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}contact{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}contact{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}contact{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}contact{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"FROM {$db->le}contact{$db->re} ",
			"INNER JOIN {$db->le}contact_event{$db->re} ON {$db->le}contact_event{$db->re}.{$db->le}contact_person_entity_id{$db->re}={$db->le}contact{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}contact_event{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contact{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contact_event{$db->re}.{$db->le}event_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}contact_event{$db->re}.{$db->le}contact_event_type_id{$db->re}=" . $db->queryValue(ContactEvent::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}contact_event{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["person_entity_id"];
		}
		
		return new Collection($ids);
	}

	public function setEntity($entity=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeEntityList($type);
		$this->addEntity($entity, $type);
		return $this;
	}
	public function removeEntity($entity, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($entity) ? $entity : array($entity);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEntityEvent($id, $type);
			if ($deleteObject) {
				$relationship->getEntity()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeEntityList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EntityEvent::deleteAll(null, $this->id, $type);
		}
	}
	public function addEntity($entity=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($entity)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($entity) ? $entity : array($entity);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEntityEvent($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getEntity($type="default") {
		if (isset($this->_cache["Entity"]) && isset($this->_cache["Entity"][$type])) {
			$entity = $this->_cache["Entity"][$type];
		} else {
			$entity = new Entity($this->getEntityId($type));
		}
		$this->_cache["Entity"][$type] = $entity;
		return $this->_cache["Entity"][$type];
	}
	public function getEntityList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getEntityIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Entity::objects($order, "{$db->le}entity{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getEntityId($type="default") {
		return $this->getEntityIds($type)->get(0);
	}
	public function getEntityIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}entity{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}entity{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}entity{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}entity{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}entity{$db->re} ",
			"INNER JOIN {$db->le}entity_event{$db->re} ON {$db->le}entity_event{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_event{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_event{$db->re}.{$db->le}event_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_event{$db->re}.{$db->le}entity_event_type_id{$db->re}=" . $db->queryValue(EntityEvent::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_event{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setEventdate($eventdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeEventdateList($type);
		$this->addEventdate($eventdate, $type);
		return $this;
	}
	public function removeEventdate($eventdate, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($eventdate) ? $eventdate : array($eventdate);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEventEventdate($id, $type);
			if ($deleteObject) {
				$relationship->getEventdate()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeEventdateList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EventEventdate::deleteAll($this->id, null, $type);
		}
	}
	public function addEventdate($eventdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($eventdate)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($eventdate) ? $eventdate : array($eventdate);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEventEventdate($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getEventdate($type="default") {
		if (isset($this->_cache["Eventdate"]) && isset($this->_cache["Eventdate"][$type])) {
			$eventdate = $this->_cache["Eventdate"][$type];
		} else {
			$eventdate = new Eventdate($this->getEventdateId($type));
		}
		$this->_cache["Eventdate"][$type] = $eventdate;
		return $this->_cache["Eventdate"][$type];
	}
	public function getEventdateList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getEventdateIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Eventdate::objects($order, "{$db->le}eventdate{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getEventdateId($type="default") {
		return $this->getEventdateIds($type)->get(0);
	}
	public function getEventdateIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}eventdate{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}eventdate{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}eventdate{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}eventdate{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}eventdate{$db->re} ",
			"INNER JOIN {$db->le}event_eventdate{$db->re} ON {$db->le}event_eventdate{$db->re}.{$db->le}eventdate_id{$db->re}={$db->le}eventdate{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}event_eventdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}eventdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}event_eventdate{$db->re}.{$db->le}event_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}event_eventdate{$db->re}.{$db->le}event_eventdate_type_id{$db->re}=" . $db->queryValue(EventEventdate::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}event_eventdate{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setService($service=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeServiceList($type);
		$this->addService($service, $type);
		return $this;
	}
	public function removeService($service, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($service) ? $service : array($service);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEventService($id, $type);
			if ($deleteObject) {
				$relationship->getService()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeServiceList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EventService::deleteAll($this->id, null, $type);
		}
	}
	public function addService($service=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($service)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($service) ? $service : array($service);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEventService($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getService($type="default") {
		if (isset($this->_cache["Service"]) && isset($this->_cache["Service"][$type])) {
			$service = $this->_cache["Service"][$type];
		} else {
			$service = new Service($this->getServiceId($type));
		}
		$this->_cache["Service"][$type] = $service;
		return $this->_cache["Service"][$type];
	}
	public function getServiceList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getServiceIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Service::objects($order, "{$db->le}service{$db->le}.{$db->re}saleitem_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getServiceId($type="default") {
		return $this->getServiceIds($type)->get(0);
	}
	public function getServiceIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}service{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}service{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}service{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}service{$db->re}.{$db->le}saleitem_id{$db->re} ",
			"FROM {$db->le}service{$db->re} ",
			"INNER JOIN {$db->le}event_service{$db->re} ON {$db->le}event_service{$db->re}.{$db->le}service_saleitem_id{$db->re}={$db->le}service{$db->re}.{$db->le}saleitem_id{$db->re} ",
			"	AND {$db->le}event_service{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}service{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}event_service{$db->re}.{$db->le}event_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}event_service{$db->re}.{$db->le}event_service_type_id{$db->re}=" . $db->queryValue(EventService::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}event_service{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["saleitem_id"];
		}
		
		return new Collection($ids);
	}

	public function setUrl($url=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeUrlList($type);
		$url = is_object($url) || is_int($url) ? $url : $this->getUrl($type, true)->setValue($url);
		$this->addUrl($url, $type);
		return $this;
	}
	public function removeUrl($url, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($url) ? $url : array($url);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEventUrl($id, $type);
			if ($deleteObject) {
				$relationship->getUrl()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeUrlList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EventUrl::deleteAll($this->id, null, $type);
		}
	}
	public function addUrl($url=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($url)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($url) ? $url : array($url);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEventUrl($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getUrl($type="default", $getAsObject=false) {
		if (isset($this->_cache["Url"]) && isset($this->_cache["Url"][$type])) {
			$url = $this->_cache["Url"][$type];
		} else {
			$url = new Url($this->getUrlId($type));
		}
		$this->_cache["Url"][$type] = $url;
		return $getAsObject ? $this->_cache["Url"][$type] : $this->_cache["Url"][$type]->value;
	}
	public function getUrlList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getUrlIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Url::objects($order, "{$db->le}url{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getUrlId($type="default") {
		return $this->getUrlIds($type)->get(0);
	}
	public function getUrlIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}url{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}url{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}url{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}url{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}url{$db->re} ",
			"INNER JOIN {$db->le}event_url{$db->re} ON {$db->le}event_url{$db->re}.{$db->le}url_id{$db->re}={$db->le}url{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}event_url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}event_url{$db->re}.{$db->le}event_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}event_url{$db->re}.{$db->le}event_url_type_id{$db->re}=" . $db->queryValue(EventUrl::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}event_url{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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