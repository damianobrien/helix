<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the hittemplate table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the hittemplate
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called HittemplateExtension, and should extend the HittemplateTable
 * class.  The custom code file should be in the helix/modules/AWS folder
 * and should be called HittemplateExtension.php
 * 
 * Object -> Hittemplate
 */
class HittemplateTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $hittemplateid;
	public $name;
	public $description;
	public $title;
	public $keywords;
	public $question;
	public $lifetimeinseconds;
	public $autoapprovaldelayinseconds;
	public $requesterannotation;
	public $maxassignments;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $hittemplateid=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->hittemplateid = $hittemplateid;
		$this->name = null;
		$this->description = null;
		$this->title = null;
		$this->keywords = null;
		$this->question = null;
		$this->lifetimeinseconds = null;
		$this->autoapprovaldelayinseconds = null;
		$this->requesterannotation = null;
		$this->maxassignments = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}hittemplate{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($hittemplateid)) {
			$condition = "{$db->le}hittemplate{$db->re}.{$db->le}hittemplateid{$db->re}={$db->queryValue($hittemplateid)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}hittemplate{$db->re}.{$db->le}id{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}hittemplateid{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}name{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}description{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}title{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}keywords{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}question{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}lifetimeinseconds{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}autoapprovaldelayinseconds{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}requesterannotation{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}maxassignments{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}mdate{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}cdate{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}hittemplate{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->hittemplateid = $db->record["hittemplateid"];
				$this->name = $db->record["name"];
				$this->description = $db->record["description"];
				$this->title = $db->record["title"];
				$this->keywords = $db->record["keywords"];
				$this->question = $db->record["question"];
				$this->lifetimeinseconds = $db->record["lifetimeinseconds"];
				$this->autoapprovaldelayinseconds = $db->record["autoapprovaldelayinseconds"];
				$this->requesterannotation = $db->record["requesterannotation"];
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
		$this->_initial["hittemplateid"] = $this->hittemplateid;
		$this->_initial["name"] = $this->name;
		$this->_initial["description"] = $this->description;
		$this->_initial["title"] = $this->title;
		$this->_initial["keywords"] = $this->keywords;
		$this->_initial["question"] = $this->question;
		$this->_initial["lifetimeinseconds"] = $this->lifetimeinseconds;
		$this->_initial["autoapprovaldelayinseconds"] = $this->autoapprovaldelayinseconds;
		$this->_initial["requesterannotation"] = $this->requesterannotation;
		$this->_initial["maxassignments"] = $this->maxassignments;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $hittemplateid=null) {
		$object = new Hittemplate();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}hittemplate{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($hittemplateid)) {
			$condition = "{$db->le}hittemplate{$db->re}.{$db->le}hittemplateid{$db->re}={$db->queryValue($hittemplateid)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}hittemplate{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}hittemplate{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}hittemplate{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}hittemplate{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}fdate{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}tdate{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}id{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}hittemplateid{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}name{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}description{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}title{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}keywords{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}question{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}lifetimeinseconds{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}autoapprovaldelayinseconds{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}requesterannotation{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}maxassignments{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}mdate{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}cdate{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}hittemplate{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}hittemplate{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->hittemplateid = $db->record["hittemplateid"];
				$object->name = $db->record["name"];
				$object->description = $db->record["description"];
				$object->title = $db->record["title"];
				$object->keywords = $db->record["keywords"];
				$object->question = $db->record["question"];
				$object->lifetimeinseconds = $db->record["lifetimeinseconds"];
				$object->autoapprovaldelayinseconds = $db->record["autoapprovaldelayinseconds"];
				$object->requesterannotation = $db->record["requesterannotation"];
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
		$isDirty = $isDirty || ((string)$this->hittemplateid !== (string)$this->_initial["hittemplateid"]);
		$isDirty = $isDirty || ((string)$this->name !== (string)$this->_initial["name"]);
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
		$isDirty = $isDirty || ((string)$this->title !== (string)$this->_initial["title"]);
		$isDirty = $isDirty || ((string)$this->keywords !== (string)$this->_initial["keywords"]);
		$isDirty = $isDirty || ((string)$this->question !== (string)$this->_initial["question"]);
		$isDirty = $isDirty || ((int)$this->lifetimeinseconds !== (int)$this->_initial["lifetimeinseconds"]);
		$isDirty = $isDirty || ((int)$this->autoapprovaldelayinseconds !== (int)$this->_initial["autoapprovaldelayinseconds"]);
		$isDirty = $isDirty || ((string)$this->requesterannotation !== (string)$this->_initial["requesterannotation"]);
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
			"INSERT INTO {$db->le}hittemplate{$db->re} (",
			"	{$db->le}hittemplateid{$db->re}, {$db->le}name{$db->re}, {$db->le}description{$db->re}, {$db->le}title{$db->re}, {$db->le}keywords{$db->re}, {$db->le}question{$db->re}, {$db->le}lifetimeinseconds{$db->re}, {$db->le}autoapprovaldelayinseconds{$db->re}, {$db->le}requesterannotation{$db->re}, {$db->le}maxassignments{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->hittemplateid) . ",",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue($this->title) . ",",
				$db->queryValue($this->keywords) . ",",
				$db->queryValue($this->question) . ",",
				$db->queryValue(is_null($this->lifetimeinseconds)?null:(int)$this->lifetimeinseconds) . ",",
				$db->queryValue(is_null($this->autoapprovaldelayinseconds)?null:(int)$this->autoapprovaldelayinseconds) . ",",
				$db->queryValue($this->requesterannotation) . ",",
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
				"UPDATE {$db->le}hittemplate{$db->re} SET",
					"{$db->le}hittemplateid{$db->re}={$db->queryValue($this->hittemplateid)},",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}title{$db->re}={$db->queryValue($this->title)},",
					"{$db->le}keywords{$db->re}={$db->queryValue($this->keywords)},",
					"{$db->le}question{$db->re}={$db->queryValue($this->question)},",
					"{$db->le}lifetimeinseconds{$db->re}={$db->queryValue(is_null($this->lifetimeinseconds)?null:(int)$this->lifetimeinseconds)},",
					"{$db->le}autoapprovaldelayinseconds{$db->re}={$db->queryValue(is_null($this->autoapprovaldelayinseconds)?null:(int)$this->autoapprovaldelayinseconds)},",
					"{$db->le}requesterannotation{$db->re}={$db->queryValue($this->requesterannotation)},",
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
		$record = Hittemplate::select($db->encapsulate("hittemplate") . ".mdate as fdate,null as tdate,{$db->encapsulate("hittemplate")}.*",null,$db->encapsulate("hittemplate").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}hittemplate{$dbLog->re} (",
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
				"FROM {$dbLog->le}hittemplate{$dbLog->re}",
				"WHERE {$dbLog->le}hittemplate{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}hittemplate{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("hittemplate") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("hittemplate") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}hittemplate{$db->le}",

			"WHERE {$db->le}hittemplate{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Hittemplate::select("{$db->le}hittemplate{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Hittemplate::select("{$db->le}hittemplate{$db->re}.{$db->le}id{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}hittemplateid{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}name{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}description{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}title{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}keywords{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}question{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}lifetimeinseconds{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}autoapprovaldelayinseconds{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}requesterannotation{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}maxassignments{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}mdate{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}cdate{$db->re}, {$db->le}hittemplate{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Hittemplate();
				$object->id = $record["id"];
				$object->hittemplateid = $record["hittemplateid"];
				$object->name = $record["name"];
				$object->description = $record["description"];
				$object->title = $record["title"];
				$object->keywords = $record["keywords"];
				$object->question = $record["question"];
				$object->lifetimeinseconds = $record["lifetimeinseconds"];
				$object->autoapprovaldelayinseconds = $record["autoapprovaldelayinseconds"];
				$object->requesterannotation = $record["requesterannotation"];
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
			$clauses[] = "hittemplate.hittemplateid LIKE '%{$keyword}%' OR hittemplate.name LIKE '%{$keyword}%' OR hittemplate.description LIKE '%{$keyword}%' OR hittemplate.title LIKE '%{$keyword}%' OR hittemplate.keywords LIKE '%{$keyword}%' OR hittemplate.question LIKE '%{$keyword}%' OR hittemplate.requesterannotation LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Hittemplate::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Hittemplate Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getHitHittemplate($hitId, $type="default") {
		return new HitHittemplate(null, $hitId, $this->id, HitHittemplate::typeId($type));
	}

	public function getHitqualificationHittemplate($hitqualificationId, $type="default") {
		return new HitqualificationHittemplate(null, $hitqualificationId, $this->id, HitqualificationHittemplate::typeId($type));
	}

	public function getHitrewardHittemplate($hitrewardId, $type="default") {
		return new HitrewardHittemplate(null, $hitrewardId, $this->id, HitrewardHittemplate::typeId($type));
	}


	public function setHit($hit=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeHitList($type);
		$this->addHit($hit, $type);
		return $this;
	}
	public function removeHit($hit, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($hit) ? $hit : array($hit);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getHitHittemplate($id, $type);
			if ($deleteObject) {
				$relationship->getHit()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeHitList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return HitHittemplate::deleteAll(null, $this->id, $type);
		}
	}
	public function addHit($hit=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($hit)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($hit) ? $hit : array($hit);
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
	public function getHit($type="default") {
		if (isset($this->_cache["Hit"]) && isset($this->_cache["Hit"][$type])) {
			$hit = $this->_cache["Hit"][$type];
		} else {
			$hit = new Hit($this->getHitId($type));
		}
		$this->_cache["Hit"][$type] = $hit;
		return $this->_cache["Hit"][$type];
	}
	public function getHitList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getHitIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Hit::objects($order, "{$db->le}hit{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getHitId($type="default") {
		return $this->getHitIds($type)->get(0);
	}
	public function getHitIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}hit{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}hit{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}hit{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}hit{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}hit{$db->re} ",
			"INNER JOIN {$db->le}hit_hittemplate{$db->re} ON {$db->le}hit_hittemplate{$db->re}.{$db->le}hit_id{$db->re}={$db->le}hit{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}hit_hittemplate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hit{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hit_hittemplate{$db->re}.{$db->le}hittemplate_id{$db->re}={$db->queryValue($this->id)} ",
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
			$relationship = $this->getHitqualificationHittemplate($id, $type);
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
			return HitqualificationHittemplate::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getHitqualificationHittemplate($id, $type);
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
			"INNER JOIN {$db->le}hitqualification_hittemplate{$db->re} ON {$db->le}hitqualification_hittemplate{$db->re}.{$db->le}hitqualification_id{$db->re}={$db->le}hitqualification{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}hitqualification_hittemplate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hitqualification{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hitqualification_hittemplate{$db->re}.{$db->le}hittemplate_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}hitqualification_hittemplate{$db->re}.{$db->le}hitqualification_hittemplate_type_id{$db->re}=" . $db->queryValue(HitqualificationHittemplate::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}hitqualification_hittemplate{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getHitrewardHittemplate($id, $type);
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
			return HitrewardHittemplate::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getHitrewardHittemplate($id, $type);
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
			"INNER JOIN {$db->le}hitreward_hittemplate{$db->re} ON {$db->le}hitreward_hittemplate{$db->re}.{$db->le}hitreward_id{$db->re}={$db->le}hitreward{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}hitreward_hittemplate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hitreward{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hitreward_hittemplate{$db->re}.{$db->le}hittemplate_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}hitreward_hittemplate{$db->re}.{$db->le}hitreward_hittemplate_type_id{$db->re}=" . $db->queryValue(HitrewardHittemplate::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}hitreward_hittemplate{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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