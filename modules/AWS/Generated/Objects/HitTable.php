<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the hit table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the hit
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called HitExtension, and should extend the HitTable
 * class.  The custom code file should be in the helix/modules/AWS folder
 * and should be called HitExtension.php
 * 
 * Object -> Hit
 */
class HitTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $hitid;
	public $name;
	public $description;
	public $title;
	public $keywords;
	public $numAssignments;
	public $question;
	public $hitstatusId;
	public $hitreviewstatusId;
	public $lifetimeinseconds;
	public $autoapprovaldelayinseconds;
	public $assignmentdurationinseconds;
	public $requesterannotation;
	public $numberofsimilarhits;
	public $numberofassignmentspending;
	public $numberofassignmentsavailable;
	public $numberofassignmentscompleted;
	public $maxassignments;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $hitid=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->hitid = $hitid;
		$this->name = null;
		$this->description = null;
		$this->title = null;
		$this->keywords = null;
		$this->numAssignments = null;
		$this->question = null;
		$this->hitstatusId = null;
		$this->hitreviewstatusId = null;
		$this->lifetimeinseconds = null;
		$this->autoapprovaldelayinseconds = null;
		$this->assignmentdurationinseconds = null;
		$this->requesterannotation = null;
		$this->numberofsimilarhits = null;
		$this->numberofassignmentspending = null;
		$this->numberofassignmentsavailable = null;
		$this->numberofassignmentscompleted = null;
		$this->maxassignments = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}hit{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($hitid)) {
			$condition = "{$db->le}hit{$db->re}.{$db->le}hitid{$db->re}={$db->queryValue($hitid)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}hit{$db->re}.{$db->le}id{$db->re}, {$db->le}hit{$db->re}.{$db->le}hitid{$db->re}, {$db->le}hit{$db->re}.{$db->le}name{$db->re}, {$db->le}hit{$db->re}.{$db->le}description{$db->re}, {$db->le}hit{$db->re}.{$db->le}title{$db->re}, {$db->le}hit{$db->re}.{$db->le}keywords{$db->re}, {$db->le}hit{$db->re}.{$db->le}num_assignments{$db->re}, {$db->le}hit{$db->re}.{$db->le}question{$db->re}, {$db->le}hit{$db->re}.{$db->le}hitstatus_id{$db->re}, {$db->le}hit{$db->re}.{$db->le}hitreviewstatus_id{$db->re}, {$db->le}hit{$db->re}.{$db->le}lifetimeinseconds{$db->re}, {$db->le}hit{$db->re}.{$db->le}autoapprovaldelayinseconds{$db->re}, {$db->le}hit{$db->re}.{$db->le}assignmentdurationinseconds{$db->re}, {$db->le}hit{$db->re}.{$db->le}requesterannotation{$db->re}, {$db->le}hit{$db->re}.{$db->le}numberofsimilarhits{$db->re}, {$db->le}hit{$db->re}.{$db->le}numberofassignmentspending{$db->re}, {$db->le}hit{$db->re}.{$db->le}numberofassignmentsavailable{$db->re}, {$db->le}hit{$db->re}.{$db->le}numberofassignmentscompleted{$db->re}, {$db->le}hit{$db->re}.{$db->le}maxassignments{$db->re}, {$db->le}hit{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}hit{$db->re}.{$db->le}mdate{$db->re}, {$db->le}hit{$db->re}.{$db->le}cdate{$db->re}, {$db->le}hit{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}hit{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->hitid = $db->record["hitid"];
				$this->name = $db->record["name"];
				$this->description = $db->record["description"];
				$this->title = $db->record["title"];
				$this->keywords = $db->record["keywords"];
				$this->numAssignments = $db->record["num_assignments"];
				$this->question = $db->record["question"];
				$this->hitstatusId = $db->record["hitstatus_id"];
				$this->hitreviewstatusId = $db->record["hitreviewstatus_id"];
				$this->lifetimeinseconds = $db->record["lifetimeinseconds"];
				$this->autoapprovaldelayinseconds = $db->record["autoapprovaldelayinseconds"];
				$this->assignmentdurationinseconds = $db->record["assignmentdurationinseconds"];
				$this->requesterannotation = $db->record["requesterannotation"];
				$this->numberofsimilarhits = $db->record["numberofsimilarhits"];
				$this->numberofassignmentspending = $db->record["numberofassignmentspending"];
				$this->numberofassignmentsavailable = $db->record["numberofassignmentsavailable"];
				$this->numberofassignmentscompleted = $db->record["numberofassignmentscompleted"];
				$this->maxassignments = $db->record["maxassignments"];
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["hitid"] = $this->hitid;
		$this->_initial["name"] = $this->name;
		$this->_initial["description"] = $this->description;
		$this->_initial["title"] = $this->title;
		$this->_initial["keywords"] = $this->keywords;
		$this->_initial["numAssignments"] = $this->numAssignments;
		$this->_initial["question"] = $this->question;
		$this->_initial["hitstatusId"] = $this->hitstatusId;
		$this->_initial["hitreviewstatusId"] = $this->hitreviewstatusId;
		$this->_initial["lifetimeinseconds"] = $this->lifetimeinseconds;
		$this->_initial["autoapprovaldelayinseconds"] = $this->autoapprovaldelayinseconds;
		$this->_initial["assignmentdurationinseconds"] = $this->assignmentdurationinseconds;
		$this->_initial["requesterannotation"] = $this->requesterannotation;
		$this->_initial["numberofsimilarhits"] = $this->numberofsimilarhits;
		$this->_initial["numberofassignmentspending"] = $this->numberofassignmentspending;
		$this->_initial["numberofassignmentsavailable"] = $this->numberofassignmentsavailable;
		$this->_initial["numberofassignmentscompleted"] = $this->numberofassignmentscompleted;
		$this->_initial["maxassignments"] = $this->maxassignments;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $hitid=null) {
		$object = new Hit();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}hit{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($hitid)) {
			$condition = "{$db->le}hit{$db->re}.{$db->le}hitid{$db->re}={$db->queryValue($hitid)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}hit{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}hit{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}hit{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}hit{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}hit{$db->re}.{$db->le}fdate{$db->re}, {$db->le}hit{$db->re}.{$db->le}tdate{$db->re}, {$db->le}hit{$db->re}.{$db->le}id{$db->re}, {$db->le}hit{$db->re}.{$db->le}hitid{$db->re}, {$db->le}hit{$db->re}.{$db->le}name{$db->re}, {$db->le}hit{$db->re}.{$db->le}description{$db->re}, {$db->le}hit{$db->re}.{$db->le}title{$db->re}, {$db->le}hit{$db->re}.{$db->le}keywords{$db->re}, {$db->le}hit{$db->re}.{$db->le}num_assignments{$db->re}, {$db->le}hit{$db->re}.{$db->le}question{$db->re}, {$db->le}hit{$db->re}.{$db->le}hitstatus_id{$db->re}, {$db->le}hit{$db->re}.{$db->le}hitreviewstatus_id{$db->re}, {$db->le}hit{$db->re}.{$db->le}lifetimeinseconds{$db->re}, {$db->le}hit{$db->re}.{$db->le}autoapprovaldelayinseconds{$db->re}, {$db->le}hit{$db->re}.{$db->le}assignmentdurationinseconds{$db->re}, {$db->le}hit{$db->re}.{$db->le}requesterannotation{$db->re}, {$db->le}hit{$db->re}.{$db->le}numberofsimilarhits{$db->re}, {$db->le}hit{$db->re}.{$db->le}numberofassignmentspending{$db->re}, {$db->le}hit{$db->re}.{$db->le}numberofassignmentsavailable{$db->re}, {$db->le}hit{$db->re}.{$db->le}numberofassignmentscompleted{$db->re}, {$db->le}hit{$db->re}.{$db->le}maxassignments{$db->re}, {$db->le}hit{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}hit{$db->re}.{$db->le}mdate{$db->re}, {$db->le}hit{$db->re}.{$db->le}cdate{$db->re}, {$db->le}hit{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}hit{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}hit{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->hitid = $db->record["hitid"];
				$object->name = $db->record["name"];
				$object->description = $db->record["description"];
				$object->title = $db->record["title"];
				$object->keywords = $db->record["keywords"];
				$object->numAssignments = $db->record["num_assignments"];
				$object->question = $db->record["question"];
				$object->hitstatusId = $db->record["hitstatus_id"];
				$object->hitreviewstatusId = $db->record["hitreviewstatus_id"];
				$object->lifetimeinseconds = $db->record["lifetimeinseconds"];
				$object->autoapprovaldelayinseconds = $db->record["autoapprovaldelayinseconds"];
				$object->assignmentdurationinseconds = $db->record["assignmentdurationinseconds"];
				$object->requesterannotation = $db->record["requesterannotation"];
				$object->numberofsimilarhits = $db->record["numberofsimilarhits"];
				$object->numberofassignmentspending = $db->record["numberofassignmentspending"];
				$object->numberofassignmentsavailable = $db->record["numberofassignmentsavailable"];
				$object->numberofassignmentscompleted = $db->record["numberofassignmentscompleted"];
				$object->maxassignments = $db->record["maxassignments"];
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
		$isDirty = $isDirty || ((string)$this->hitid !== (string)$this->_initial["hitid"]);
		$isDirty = $isDirty || ((string)$this->name !== (string)$this->_initial["name"]);
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
		$isDirty = $isDirty || ((string)$this->title !== (string)$this->_initial["title"]);
		$isDirty = $isDirty || ((string)$this->keywords !== (string)$this->_initial["keywords"]);
		$isDirty = $isDirty || ((int)$this->numAssignments !== (int)$this->_initial["numAssignments"]);
		$isDirty = $isDirty || ((string)$this->question !== (string)$this->_initial["question"]);
		$isDirty = $isDirty || ((int)$this->hitstatusId !== (int)$this->_initial["hitstatusId"]);
		$isDirty = $isDirty || ((int)$this->hitreviewstatusId !== (int)$this->_initial["hitreviewstatusId"]);
		$isDirty = $isDirty || ((int)$this->lifetimeinseconds !== (int)$this->_initial["lifetimeinseconds"]);
		$isDirty = $isDirty || ((int)$this->autoapprovaldelayinseconds !== (int)$this->_initial["autoapprovaldelayinseconds"]);
		$isDirty = $isDirty || ((int)$this->assignmentdurationinseconds !== (int)$this->_initial["assignmentdurationinseconds"]);
		$isDirty = $isDirty || ((string)$this->requesterannotation !== (string)$this->_initial["requesterannotation"]);
		$isDirty = $isDirty || ((int)$this->numberofsimilarhits !== (int)$this->_initial["numberofsimilarhits"]);
		$isDirty = $isDirty || ((int)$this->numberofassignmentspending !== (int)$this->_initial["numberofassignmentspending"]);
		$isDirty = $isDirty || ((int)$this->numberofassignmentsavailable !== (int)$this->_initial["numberofassignmentsavailable"]);
		$isDirty = $isDirty || ((int)$this->numberofassignmentscompleted !== (int)$this->_initial["numberofassignmentscompleted"]);
		$isDirty = $isDirty || ((int)$this->maxassignments !== (int)$this->_initial["maxassignments"]);
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
			"INSERT INTO {$db->le}hit{$db->re} (",
			"	{$db->le}hitid{$db->re}, {$db->le}name{$db->re}, {$db->le}description{$db->re}, {$db->le}title{$db->re}, {$db->le}keywords{$db->re}, {$db->le}num_assignments{$db->re}, {$db->le}question{$db->re}, {$db->le}hitstatus_id{$db->re}, {$db->le}hitreviewstatus_id{$db->re}, {$db->le}lifetimeinseconds{$db->re}, {$db->le}autoapprovaldelayinseconds{$db->re}, {$db->le}assignmentdurationinseconds{$db->re}, {$db->le}requesterannotation{$db->re}, {$db->le}numberofsimilarhits{$db->re}, {$db->le}numberofassignmentspending{$db->re}, {$db->le}numberofassignmentsavailable{$db->re}, {$db->le}numberofassignmentscompleted{$db->re}, {$db->le}maxassignments{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->hitid) . ",",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue($this->title) . ",",
				$db->queryValue($this->keywords) . ",",
				$db->queryValue(is_null($this->numAssignments)?null:(int)$this->numAssignments) . ",",
				$db->queryValue($this->question) . ",",
				$db->queryValue(is_null($this->hitstatusId)?null:(int)$this->hitstatusId) . ",",
				$db->queryValue(is_null($this->hitreviewstatusId)?null:(int)$this->hitreviewstatusId) . ",",
				$db->queryValue(is_null($this->lifetimeinseconds)?null:(int)$this->lifetimeinseconds) . ",",
				$db->queryValue(is_null($this->autoapprovaldelayinseconds)?null:(int)$this->autoapprovaldelayinseconds) . ",",
				$db->queryValue(is_null($this->assignmentdurationinseconds)?null:(int)$this->assignmentdurationinseconds) . ",",
				$db->queryValue($this->requesterannotation) . ",",
				$db->queryValue(is_null($this->numberofsimilarhits)?null:(int)$this->numberofsimilarhits) . ",",
				$db->queryValue(is_null($this->numberofassignmentspending)?null:(int)$this->numberofassignmentspending) . ",",
				$db->queryValue(is_null($this->numberofassignmentsavailable)?null:(int)$this->numberofassignmentsavailable) . ",",
				$db->queryValue(is_null($this->numberofassignmentscompleted)?null:(int)$this->numberofassignmentscompleted) . ",",
				$db->queryValue(is_null($this->maxassignments)?null:(int)$this->maxassignments) . ",",
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
				"UPDATE {$db->le}hit{$db->re} SET",
					"{$db->le}hitid{$db->re}={$db->queryValue($this->hitid)},",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}title{$db->re}={$db->queryValue($this->title)},",
					"{$db->le}keywords{$db->re}={$db->queryValue($this->keywords)},",
					"{$db->le}num_assignments{$db->re}={$db->queryValue(is_null($this->numAssignments)?null:(int)$this->numAssignments)},",
					"{$db->le}question{$db->re}={$db->queryValue($this->question)},",
					"{$db->le}hitstatus_id{$db->re}={$db->queryValue(is_null($this->hitstatusId)?null:(int)$this->hitstatusId)},",
					"{$db->le}hitreviewstatus_id{$db->re}={$db->queryValue(is_null($this->hitreviewstatusId)?null:(int)$this->hitreviewstatusId)},",
					"{$db->le}lifetimeinseconds{$db->re}={$db->queryValue(is_null($this->lifetimeinseconds)?null:(int)$this->lifetimeinseconds)},",
					"{$db->le}autoapprovaldelayinseconds{$db->re}={$db->queryValue(is_null($this->autoapprovaldelayinseconds)?null:(int)$this->autoapprovaldelayinseconds)},",
					"{$db->le}assignmentdurationinseconds{$db->re}={$db->queryValue(is_null($this->assignmentdurationinseconds)?null:(int)$this->assignmentdurationinseconds)},",
					"{$db->le}requesterannotation{$db->re}={$db->queryValue($this->requesterannotation)},",
					"{$db->le}numberofsimilarhits{$db->re}={$db->queryValue(is_null($this->numberofsimilarhits)?null:(int)$this->numberofsimilarhits)},",
					"{$db->le}numberofassignmentspending{$db->re}={$db->queryValue(is_null($this->numberofassignmentspending)?null:(int)$this->numberofassignmentspending)},",
					"{$db->le}numberofassignmentsavailable{$db->re}={$db->queryValue(is_null($this->numberofassignmentsavailable)?null:(int)$this->numberofassignmentsavailable)},",
					"{$db->le}numberofassignmentscompleted{$db->re}={$db->queryValue(is_null($this->numberofassignmentscompleted)?null:(int)$this->numberofassignmentscompleted)},",
					"{$db->le}maxassignments{$db->re}={$db->queryValue(is_null($this->maxassignments)?null:(int)$this->maxassignments)},",
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
		$record = Hit::select($db->encapsulate("hit") . ".mdate as fdate,null as tdate,{$db->encapsulate("hit")}.*",null,$db->encapsulate("hit").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}hit{$dbLog->re} (",
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
				"FROM {$dbLog->le}hit{$dbLog->re}",
				"WHERE {$dbLog->le}hit{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}hit{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("hit") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("hit") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}hit{$db->le}",
			"LEFT JOIN {$db->le}hitstatus{$db->re} ON {$db->le}hit{$db->re}.{$db->le}hitstatus_id{$db->re}={$db->le}hitstatus{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}hitreviewstatus{$db->re} ON {$db->le}hit{$db->re}.{$db->le}hitreviewstatus_id{$db->re}={$db->le}hitreviewstatus{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}hit{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Hit::select("{$db->le}hit{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Hit::select("{$db->le}hit{$db->re}.{$db->le}id{$db->re}, {$db->le}hit{$db->re}.{$db->le}hitid{$db->re}, {$db->le}hit{$db->re}.{$db->le}name{$db->re}, {$db->le}hit{$db->re}.{$db->le}description{$db->re}, {$db->le}hit{$db->re}.{$db->le}title{$db->re}, {$db->le}hit{$db->re}.{$db->le}keywords{$db->re}, {$db->le}hit{$db->re}.{$db->le}num_assignments{$db->re}, {$db->le}hit{$db->re}.{$db->le}question{$db->re}, {$db->le}hit{$db->re}.{$db->le}hitstatus_id{$db->re}, {$db->le}hit{$db->re}.{$db->le}hitreviewstatus_id{$db->re}, {$db->le}hit{$db->re}.{$db->le}lifetimeinseconds{$db->re}, {$db->le}hit{$db->re}.{$db->le}autoapprovaldelayinseconds{$db->re}, {$db->le}hit{$db->re}.{$db->le}assignmentdurationinseconds{$db->re}, {$db->le}hit{$db->re}.{$db->le}requesterannotation{$db->re}, {$db->le}hit{$db->re}.{$db->le}numberofsimilarhits{$db->re}, {$db->le}hit{$db->re}.{$db->le}numberofassignmentspending{$db->re}, {$db->le}hit{$db->re}.{$db->le}numberofassignmentsavailable{$db->re}, {$db->le}hit{$db->re}.{$db->le}numberofassignmentscompleted{$db->re}, {$db->le}hit{$db->re}.{$db->le}maxassignments{$db->re}, {$db->le}hit{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}hit{$db->re}.{$db->le}mdate{$db->re}, {$db->le}hit{$db->re}.{$db->le}cdate{$db->re}, {$db->le}hit{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Hit();
				$object->id = $record["id"];
				$object->hitid = $record["hitid"];
				$object->name = $record["name"];
				$object->description = $record["description"];
				$object->title = $record["title"];
				$object->keywords = $record["keywords"];
				$object->numAssignments = $record["num_assignments"];
				$object->question = $record["question"];
				$object->hitstatusId = $record["hitstatus_id"];
				$object->hitreviewstatusId = $record["hitreviewstatus_id"];
				$object->lifetimeinseconds = $record["lifetimeinseconds"];
				$object->autoapprovaldelayinseconds = $record["autoapprovaldelayinseconds"];
				$object->assignmentdurationinseconds = $record["assignmentdurationinseconds"];
				$object->requesterannotation = $record["requesterannotation"];
				$object->numberofsimilarhits = $record["numberofsimilarhits"];
				$object->numberofassignmentspending = $record["numberofassignmentspending"];
				$object->numberofassignmentsavailable = $record["numberofassignmentsavailable"];
				$object->numberofassignmentscompleted = $record["numberofassignmentscompleted"];
				$object->maxassignments = $record["maxassignments"];
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
			$clauses[] = "hit.hitid LIKE '%{$keyword}%' OR hit.name LIKE '%{$keyword}%' OR hit.description LIKE '%{$keyword}%' OR hit.title LIKE '%{$keyword}%' OR hit.keywords LIKE '%{$keyword}%' OR hit.question LIKE '%{$keyword}%' OR hit.requesterannotation LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Hit::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Hit Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getHitHitassignment($hitassignmentId, $type="default") {
		return new HitHitassignment(null, $this->id, $hitassignmentId, HitHitassignment::typeId($type));
	}

	public function getHitHitdate($hitdateId, $type="default") {
		return new HitHitdate(null, $this->id, $hitdateId, HitHitdate::typeId($type));
	}

	public function getHitHitqualification($hitqualificationId, $type="default") {
		return new HitHitqualification(null, $this->id, $hitqualificationId, HitHitqualification::typeId($type));
	}

	public function getHitHitreward($hitrewardId, $type="default") {
		return new HitHitreward(null, $this->id, $hitrewardId, HitHitreward::typeId($type));
	}

	public function getHitHittemplate($hittemplateId, $type="default") {
		return new HitHittemplate(null, $this->id, $hittemplateId, HitHittemplate::typeId($type));
	}

	public function getHitstatus() {
		return new Hitstatus($this->hitstatusId);
	}

	public function setHitstatus(Hitstatus $hitstatus) {
		if ($hitstatus->id>0) {
			$this->hitstatusId = $hitstatus->id;
		}
	}

	public function getHitreviewstatus() {
		return new Hitreviewstatus($this->hitreviewstatusId);
	}

	public function setHitreviewstatus(Hitreviewstatus $hitreviewstatus) {
		if ($hitreviewstatus->id>0) {
			$this->hitreviewstatusId = $hitreviewstatus->id;
		}
	}

	public function setHitassignment($hitassignment=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeHitassignmentList($type);
		$this->addHitassignment($hitassignment, $type);
		return $this;
	}
	public function removeHitassignment($hitassignment, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($hitassignment) ? $hitassignment : array($hitassignment);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getHitHitassignment($id, $type);
			if ($deleteObject) {
				$relationship->getHitassignment()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeHitassignmentList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return HitHitassignment::deleteAll($this->id, null, $type);
		}
	}
	public function addHitassignment($hitassignment=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($hitassignment)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($hitassignment) ? $hitassignment : array($hitassignment);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getHitHitassignment($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getHitassignment($type="default") {
		if (isset($this->_cache["Hitassignment"]) && isset($this->_cache["Hitassignment"][$type])) {
			$hitassignment = $this->_cache["Hitassignment"][$type];
		} else {
			$hitassignment = new Hitassignment($this->getHitassignmentId($type));
		}
		$this->_cache["Hitassignment"][$type] = $hitassignment;
		return $this->_cache["Hitassignment"][$type];
	}
	public function getHitassignmentList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getHitassignmentIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Hitassignment::objects($order, "{$db->le}hitassignment{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getHitassignmentId($type="default") {
		return $this->getHitassignmentIds($type)->get(0);
	}
	public function getHitassignmentIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}hitassignment{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}hitassignment{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}hitassignment{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}hitassignment{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}hitassignment{$db->re} ",
			"INNER JOIN {$db->le}hit_hitassignment{$db->re} ON {$db->le}hit_hitassignment{$db->re}.{$db->le}hitassignment_id{$db->re}={$db->le}hitassignment{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}hit_hitassignment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hitassignment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hit_hitassignment{$db->re}.{$db->le}hit_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}hit_hitassignment{$db->re}.{$db->le}hit_hitassignment_type_id{$db->re}=" . $db->queryValue(HitHitassignment::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}hit_hitassignment{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setHitdate($hitdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeHitdateList($type);
		$this->addHitdate($hitdate, $type);
		return $this;
	}
	public function removeHitdate($hitdate, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($hitdate) ? $hitdate : array($hitdate);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getHitHitdate($id, $type);
			if ($deleteObject) {
				$relationship->getHitdate()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeHitdateList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return HitHitdate::deleteAll($this->id, null, $type);
		}
	}
	public function addHitdate($hitdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($hitdate)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($hitdate) ? $hitdate : array($hitdate);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getHitHitdate($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getHitdate($type="default") {
		if (isset($this->_cache["Hitdate"]) && isset($this->_cache["Hitdate"][$type])) {
			$hitdate = $this->_cache["Hitdate"][$type];
		} else {
			$hitdate = new Hitdate($this->getHitdateId($type));
		}
		$this->_cache["Hitdate"][$type] = $hitdate;
		return $this->_cache["Hitdate"][$type];
	}
	public function getHitdateList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getHitdateIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Hitdate::objects($order, "{$db->le}hitdate{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getHitdateId($type="default") {
		return $this->getHitdateIds($type)->get(0);
	}
	public function getHitdateIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}hitdate{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}hitdate{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}hitdate{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}hitdate{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}hitdate{$db->re} ",
			"INNER JOIN {$db->le}hit_hitdate{$db->re} ON {$db->le}hit_hitdate{$db->re}.{$db->le}hitdate_id{$db->re}={$db->le}hitdate{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}hit_hitdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hitdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hit_hitdate{$db->re}.{$db->le}hit_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}hit_hitdate{$db->re}.{$db->le}hit_hitdate_type_id{$db->re}=" . $db->queryValue(HitHitdate::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}hit_hitdate{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setHitqualification($hitqualification=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeHitqualificationList($type);
		$this->addHitqualification($hitqualification, $type);
		return $this;
	}
	public function removeHitqualification($hitqualification, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($hitqualification) ? $hitqualification : array($hitqualification);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getHitHitqualification($id, $type);
			if ($deleteObject) {
				$relationship->getHitqualification()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeHitqualificationList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return HitHitqualification::deleteAll($this->id, null, $type);
		}
	}
	public function addHitqualification($hitqualification=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($hitqualification)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($hitqualification) ? $hitqualification : array($hitqualification);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getHitHitqualification($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getHitqualification($type="default") {
		if (isset($this->_cache["Hitqualification"]) && isset($this->_cache["Hitqualification"][$type])) {
			$hitqualification = $this->_cache["Hitqualification"][$type];
		} else {
			$hitqualification = new Hitqualification($this->getHitqualificationId($type));
		}
		$this->_cache["Hitqualification"][$type] = $hitqualification;
		return $this->_cache["Hitqualification"][$type];
	}
	public function getHitqualificationList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getHitqualificationIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Hitqualification::objects($order, "{$db->le}hitqualification{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getHitqualificationId($type="default") {
		return $this->getHitqualificationIds($type)->get(0);
	}
	public function getHitqualificationIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}hitqualification{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}hitqualification{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}hitqualification{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}hitqualification{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}hitqualification{$db->re} ",
			"INNER JOIN {$db->le}hit_hitqualification{$db->re} ON {$db->le}hit_hitqualification{$db->re}.{$db->le}hitqualification_id{$db->re}={$db->le}hitqualification{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}hit_hitqualification{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hitqualification{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hit_hitqualification{$db->re}.{$db->le}hit_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}hit_hitqualification{$db->re}.{$db->le}hit_hitqualification_type_id{$db->re}=" . $db->queryValue(HitHitqualification::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}hit_hitqualification{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setHitreward($hitreward=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeHitrewardList($type);
		$this->addHitreward($hitreward, $type);
		return $this;
	}
	public function removeHitreward($hitreward, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($hitreward) ? $hitreward : array($hitreward);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getHitHitreward($id, $type);
			if ($deleteObject) {
				$relationship->getHitreward()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeHitrewardList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return HitHitreward::deleteAll($this->id, null, $type);
		}
	}
	public function addHitreward($hitreward=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($hitreward)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($hitreward) ? $hitreward : array($hitreward);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getHitHitreward($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getHitreward($type="default") {
		if (isset($this->_cache["Hitreward"]) && isset($this->_cache["Hitreward"][$type])) {
			$hitreward = $this->_cache["Hitreward"][$type];
		} else {
			$hitreward = new Hitreward($this->getHitrewardId($type));
		}
		$this->_cache["Hitreward"][$type] = $hitreward;
		return $this->_cache["Hitreward"][$type];
	}
	public function getHitrewardList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getHitrewardIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Hitreward::objects($order, "{$db->le}hitreward{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getHitrewardId($type="default") {
		return $this->getHitrewardIds($type)->get(0);
	}
	public function getHitrewardIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}hitreward{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}hitreward{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}hitreward{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}hitreward{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}hitreward{$db->re} ",
			"INNER JOIN {$db->le}hit_hitreward{$db->re} ON {$db->le}hit_hitreward{$db->re}.{$db->le}hitreward_id{$db->re}={$db->le}hitreward{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}hit_hitreward{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hitreward{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hit_hitreward{$db->re}.{$db->le}hit_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}hit_hitreward{$db->re}.{$db->le}hit_hitreward_type_id{$db->re}=" . $db->queryValue(HitHitreward::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}hit_hitreward{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setHittemplate($hittemplate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeHittemplateList($type);
		$this->addHittemplate($hittemplate, $type);
		return $this;
	}
	public function removeHittemplate($hittemplate, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($hittemplate) ? $hittemplate : array($hittemplate);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getHitHittemplate($id, $type);
			if ($deleteObject) {
				$relationship->getHittemplate()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeHittemplateList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return HitHittemplate::deleteAll($this->id, null, $type);
		}
	}
	public function addHittemplate($hittemplate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($hittemplate)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($hittemplate) ? $hittemplate : array($hittemplate);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getHitHittemplate($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getHittemplate($type="default") {
		if (isset($this->_cache["Hittemplate"]) && isset($this->_cache["Hittemplate"][$type])) {
			$hittemplate = $this->_cache["Hittemplate"][$type];
		} else {
			$hittemplate = new Hittemplate($this->getHittemplateId($type));
		}
		$this->_cache["Hittemplate"][$type] = $hittemplate;
		return $this->_cache["Hittemplate"][$type];
	}
	public function getHittemplateList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getHittemplateIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Hittemplate::objects($order, "{$db->le}hittemplate{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getHittemplateId($type="default") {
		return $this->getHittemplateIds($type)->get(0);
	}
	public function getHittemplateIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}hittemplate{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}hittemplate{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}hittemplate{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}hittemplate{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}hittemplate{$db->re} ",
			"INNER JOIN {$db->le}hit_hittemplate{$db->re} ON {$db->le}hit_hittemplate{$db->re}.{$db->le}hittemplate_id{$db->re}={$db->le}hittemplate{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}hit_hittemplate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hittemplate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hit_hittemplate{$db->re}.{$db->le}hit_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}hit_hittemplate{$db->re}.{$db->le}hit_hittemplate_type_id{$db->re}=" . $db->queryValue(HitHittemplate::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}hit_hittemplate{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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