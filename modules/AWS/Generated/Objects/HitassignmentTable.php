<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the hitassignment table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the hitassignment
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called HitassignmentExtension, and should extend the HitassignmentTable
 * class.  The custom code file should be in the helix/modules/AWS folder
 * and should be called HitassignmentExtension.php
 * 
 * Object -> Hitassignment
 */
class HitassignmentTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $hitassignmentid;
	public $hitassignmentstatusId;
	public $answer;
	public $requesterfeedback;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $hitassignmentid=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->hitassignmentid = $hitassignmentid;
		$this->hitassignmentstatusId = null;
		$this->answer = null;
		$this->requesterfeedback = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}hitassignment{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($hitassignmentid)) {
			$condition = "{$db->le}hitassignment{$db->re}.{$db->le}hitassignmentid{$db->re}={$db->queryValue($hitassignmentid)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}hitassignment{$db->re}.{$db->le}id{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}hitassignmentid{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}hitassignmentstatus_id{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}answer{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}requesterfeedback{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}mdate{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}cdate{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}hitassignment{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->hitassignmentid = $db->record["hitassignmentid"];
				$this->hitassignmentstatusId = $db->record["hitassignmentstatus_id"];
				$this->answer = $db->record["answer"];
				$this->requesterfeedback = $db->record["requesterfeedback"];
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["hitassignmentid"] = $this->hitassignmentid;
		$this->_initial["hitassignmentstatusId"] = $this->hitassignmentstatusId;
		$this->_initial["answer"] = $this->answer;
		$this->_initial["requesterfeedback"] = $this->requesterfeedback;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $hitassignmentid=null) {
		$object = new Hitassignment();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}hitassignment{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($hitassignmentid)) {
			$condition = "{$db->le}hitassignment{$db->re}.{$db->le}hitassignmentid{$db->re}={$db->queryValue($hitassignmentid)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}hitassignment{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}hitassignment{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}hitassignment{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}hitassignment{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}fdate{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}tdate{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}id{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}hitassignmentid{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}hitassignmentstatus_id{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}answer{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}requesterfeedback{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}mdate{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}cdate{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}hitassignment{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}hitassignment{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->hitassignmentid = $db->record["hitassignmentid"];
				$object->hitassignmentstatusId = $db->record["hitassignmentstatus_id"];
				$object->answer = $db->record["answer"];
				$object->requesterfeedback = $db->record["requesterfeedback"];
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
		$isDirty = $isDirty || ((string)$this->hitassignmentid !== (string)$this->_initial["hitassignmentid"]);
		$isDirty = $isDirty || ((int)$this->hitassignmentstatusId !== (int)$this->_initial["hitassignmentstatusId"]);
		$isDirty = $isDirty || ((string)$this->answer !== (string)$this->_initial["answer"]);
		$isDirty = $isDirty || ((string)$this->requesterfeedback !== (string)$this->_initial["requesterfeedback"]);
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
			"INSERT INTO {$db->le}hitassignment{$db->re} (",
			"	{$db->le}hitassignmentid{$db->re}, {$db->le}hitassignmentstatus_id{$db->re}, {$db->le}answer{$db->re}, {$db->le}requesterfeedback{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->hitassignmentid) . ",",
				$db->queryValue(is_null($this->hitassignmentstatusId)?null:(int)$this->hitassignmentstatusId) . ",",
				$db->queryValue($this->answer) . ",",
				$db->queryValue($this->requesterfeedback) . ",",
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
				"UPDATE {$db->le}hitassignment{$db->re} SET",
					"{$db->le}hitassignmentid{$db->re}={$db->queryValue($this->hitassignmentid)},",
					"{$db->le}hitassignmentstatus_id{$db->re}={$db->queryValue(is_null($this->hitassignmentstatusId)?null:(int)$this->hitassignmentstatusId)},",
					"{$db->le}answer{$db->re}={$db->queryValue($this->answer)},",
					"{$db->le}requesterfeedback{$db->re}={$db->queryValue($this->requesterfeedback)},",
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
		$record = Hitassignment::select($db->encapsulate("hitassignment") . ".mdate as fdate,null as tdate,{$db->encapsulate("hitassignment")}.*",null,$db->encapsulate("hitassignment").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}hitassignment{$dbLog->re} (",
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
				"FROM {$dbLog->le}hitassignment{$dbLog->re}",
				"WHERE {$dbLog->le}hitassignment{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}hitassignment{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("hitassignment") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("hitassignment") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}hitassignment{$db->le}",
			"LEFT JOIN {$db->le}hitassignmentstatus{$db->re} ON {$db->le}hitassignment{$db->re}.{$db->le}hitassignmentstatus_id{$db->re}={$db->le}hitassignmentstatus{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}hitassignment{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Hitassignment::select("{$db->le}hitassignment{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Hitassignment::select("{$db->le}hitassignment{$db->re}.{$db->le}id{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}hitassignmentid{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}hitassignmentstatus_id{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}answer{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}requesterfeedback{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}mdate{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}cdate{$db->re}, {$db->le}hitassignment{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Hitassignment();
				$object->id = $record["id"];
				$object->hitassignmentid = $record["hitassignmentid"];
				$object->hitassignmentstatusId = $record["hitassignmentstatus_id"];
				$object->answer = $record["answer"];
				$object->requesterfeedback = $record["requesterfeedback"];
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
			$clauses[] = "hitassignment.hitassignmentid LIKE '%{$keyword}%' OR hitassignment.answer LIKE '%{$keyword}%' OR hitassignment.requesterfeedback LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Hitassignment::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Hitassignment Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getHitHitassignment($hitId, $type="default") {
		return new HitHitassignment(null, $hitId, $this->id, HitHitassignment::typeId($type));
	}

	public function getHitassignmentHitassignmentdate($hitassignmentdateId, $type="default") {
		return new HitassignmentHitassignmentdate(null, $this->id, $hitassignmentdateId, HitassignmentHitassignmentdate::typeId($type));
	}

	public function getHitassignmentTurk($turkId, $type="default") {
		return new HitassignmentTurk(null, $this->id, $turkId, HitassignmentTurk::typeId($type));
	}

	public function getHitassignmentstatus() {
		return new Hitassignmentstatus($this->hitassignmentstatusId);
	}

	public function setHitassignmentstatus(Hitassignmentstatus $hitassignmentstatus) {
		if ($hitassignmentstatus->id>0) {
			$this->hitassignmentstatusId = $hitassignmentstatus->id;
		}
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
			$relationship = $this->getHitHitassignment($id, $type);
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
			return HitHitassignment::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getHitHitassignment($id, $type);
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
			"INNER JOIN {$db->le}hit_hitassignment{$db->re} ON {$db->le}hit_hitassignment{$db->re}.{$db->le}hit_id{$db->re}={$db->le}hit{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}hit_hitassignment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hit{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hit_hitassignment{$db->re}.{$db->le}hitassignment_id{$db->re}={$db->queryValue($this->id)} ",
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

	public function setHitassignmentdate($hitassignmentdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeHitassignmentdateList($type);
		$this->addHitassignmentdate($hitassignmentdate, $type);
		return $this;
	}
	public function removeHitassignmentdate($hitassignmentdate, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($hitassignmentdate) ? $hitassignmentdate : array($hitassignmentdate);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getHitassignmentHitassignmentdate($id, $type);
			if ($deleteObject) {
				$relationship->getHitassignmentdate()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeHitassignmentdateList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return HitassignmentHitassignmentdate::deleteAll($this->id, null, $type);
		}
	}
	public function addHitassignmentdate($hitassignmentdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($hitassignmentdate)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($hitassignmentdate) ? $hitassignmentdate : array($hitassignmentdate);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getHitassignmentHitassignmentdate($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getHitassignmentdate($type="default") {
		if (isset($this->_cache["Hitassignmentdate"]) && isset($this->_cache["Hitassignmentdate"][$type])) {
			$hitassignmentdate = $this->_cache["Hitassignmentdate"][$type];
		} else {
			$hitassignmentdate = new Hitassignmentdate($this->getHitassignmentdateId($type));
		}
		$this->_cache["Hitassignmentdate"][$type] = $hitassignmentdate;
		return $this->_cache["Hitassignmentdate"][$type];
	}
	public function getHitassignmentdateList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getHitassignmentdateIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Hitassignmentdate::objects($order, "{$db->le}hitassignmentdate{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getHitassignmentdateId($type="default") {
		return $this->getHitassignmentdateIds($type)->get(0);
	}
	public function getHitassignmentdateIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}hitassignmentdate{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}hitassignmentdate{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}hitassignmentdate{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}hitassignmentdate{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}hitassignmentdate{$db->re} ",
			"INNER JOIN {$db->le}hitassignment_hitassignmentdate{$db->re} ON {$db->le}hitassignment_hitassignmentdate{$db->re}.{$db->le}hitassignmentdate_id{$db->re}={$db->le}hitassignmentdate{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}hitassignment_hitassignmentdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hitassignmentdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hitassignment_hitassignmentdate{$db->re}.{$db->le}hitassignment_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}hitassignment_hitassignmentdate{$db->re}.{$db->le}hitassignment_hitassignmentdate_type_id{$db->re}=" . $db->queryValue(HitassignmentHitassignmentdate::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}hitassignment_hitassignmentdate{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setTurk($turk=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeTurkList($type);
		$this->addTurk($turk, $type);
		return $this;
	}
	public function removeTurk($turk, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($turk) ? $turk : array($turk);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getHitassignmentTurk($id, $type);
			if ($deleteObject) {
				$relationship->getTurk()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeTurkList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return HitassignmentTurk::deleteAll($this->id, null, $type);
		}
	}
	public function addTurk($turk=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($turk)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($turk) ? $turk : array($turk);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getHitassignmentTurk($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getTurk($type="default") {
		if (isset($this->_cache["Turk"]) && isset($this->_cache["Turk"][$type])) {
			$turk = $this->_cache["Turk"][$type];
		} else {
			$turk = new Turk($this->getTurkId($type));
		}
		$this->_cache["Turk"][$type] = $turk;
		return $this->_cache["Turk"][$type];
	}
	public function getTurkList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getTurkIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Turk::objects($order, "{$db->le}turk{$db->le}.{$db->re}person_entity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getTurkId($type="default") {
		return $this->getTurkIds($type)->get(0);
	}
	public function getTurkIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}turk{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}turk{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}turk{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}turk{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"FROM {$db->le}turk{$db->re} ",
			"INNER JOIN {$db->le}hitassignment_turk{$db->re} ON {$db->le}hitassignment_turk{$db->re}.{$db->le}turk_person_entity_id{$db->re}={$db->le}turk{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}hitassignment_turk{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}turk{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hitassignment_turk{$db->re}.{$db->le}hitassignment_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}hitassignment_turk{$db->re}.{$db->le}hitassignment_turk_type_id{$db->re}=" . $db->queryValue(HitassignmentTurk::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}hitassignment_turk{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

}
?>