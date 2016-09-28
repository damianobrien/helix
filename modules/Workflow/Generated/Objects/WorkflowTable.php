<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the workflow table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the workflow
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called WorkflowExtension, and should extend the WorkflowTable
 * class.  The custom code file should be in the helix/modules/Workflow folder
 * and should be called WorkflowExtension.php
 * 
 * Object -> Workflow
 */
class WorkflowTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $name;
	public $description;
	public $primary;
	public $order;
	public $updatedById;
	public $mdate;
	public $createdById;
	public $cdate;
	public $disabled;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = null;
		$this->description = null;
		$this->primary = false;
		$this->order = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->createdById = null;
		$this->cdate = new Date();
		$this->disabled = false;
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}workflow{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}workflow{$db->re}.{$db->le}id{$db->re}, {$db->le}workflow{$db->re}.{$db->le}name{$db->re}, {$db->le}workflow{$db->re}.{$db->le}description{$db->re}, {$db->le}workflow{$db->re}.{$db->le}primary{$db->re}, {$db->le}workflow{$db->re}.{$db->le}order{$db->re}, {$db->le}workflow{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}workflow{$db->re}.{$db->le}mdate{$db->re}, {$db->le}workflow{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}workflow{$db->re}.{$db->le}cdate{$db->re}, {$db->le}workflow{$db->re}.{$db->le}disabled{$db->re}, {$db->le}workflow{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}workflow{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->description = $db->record["description"];
				$this->primary = $db->record["primary"];
				$this->order = $db->record["order"];
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->createdById = $db->record["created_by_id"];
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->disabled = $db->record["disabled"];
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["name"] = $this->name;
		$this->_initial["description"] = $this->description;
		$this->_initial["primary"] = $this->primary;
		$this->_initial["order"] = $this->order;
		$this->_initial["createdById"] = $this->createdById;
		$this->_initial["disabled"] = $this->disabled;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Workflow();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}workflow{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}workflow{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}workflow{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}workflow{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}workflow{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}workflow{$db->re}.{$db->le}fdate{$db->re}, {$db->le}workflow{$db->re}.{$db->le}tdate{$db->re}, {$db->le}workflow{$db->re}.{$db->le}id{$db->re}, {$db->le}workflow{$db->re}.{$db->le}name{$db->re}, {$db->le}workflow{$db->re}.{$db->le}description{$db->re}, {$db->le}workflow{$db->re}.{$db->le}primary{$db->re}, {$db->le}workflow{$db->re}.{$db->le}order{$db->re}, {$db->le}workflow{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}workflow{$db->re}.{$db->le}mdate{$db->re}, {$db->le}workflow{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}workflow{$db->re}.{$db->le}cdate{$db->re}, {$db->le}workflow{$db->re}.{$db->le}disabled{$db->re}, {$db->le}workflow{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}workflow{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}workflow{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->description = $db->record["description"];
				$object->primary = $db->record["primary"];
				$object->order = $db->record["order"];
				$object->updatedById = $db->record["updated_by_id"];
				$object->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$object->createdById = $db->record["created_by_id"];
				$object->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$object->disabled = $db->record["disabled"];
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
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
		$isDirty = $isDirty || ((int)$this->primary !== (int)$this->_initial["primary"]);
		$isDirty = $isDirty || ((int)$this->order !== (int)$this->_initial["order"]);
		$isDirty = $isDirty || ((int)$this->createdById !== (int)$this->_initial["createdById"]);
		$isDirty = $isDirty || ((int)$this->disabled !== (int)$this->_initial["disabled"]);
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
			"INSERT INTO {$db->le}workflow{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}description{$db->re}, {$db->le}primary{$db->re}, {$db->le}order{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}created_by_id{$db->re}, {$db->le}cdate{$db->re}, {$db->le}disabled{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue(is_null($this->primary)?null:(int)$this->primary) . ",",
				$db->queryValue(is_null($this->order)?null:(int)$this->order) . ",",
				$db->queryValue((int)$session->getUserId()) . ",",
				$db->queryValue(timestamp()) . ",",
				$db->queryValue((int)$session->getUserId()) . ",",
				$db->queryValue(timestamp()) . ",",
				$db->queryValue(is_null($this->disabled)?null:(int)$this->disabled) . ",",
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
				"UPDATE {$db->le}workflow{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}primary{$db->re}={$db->queryValue(is_null($this->primary)?null:(int)$this->primary)},",
					"{$db->le}order{$db->re}={$db->queryValue(is_null($this->order)?null:(int)$this->order)},",
					"{$db->le}updated_by_id{$db->re}={$db->queryValue((int)$session->getUserId())},",
					"{$db->le}mdate{$db->re}={$db->queryValue(timestamp())},",
					"{$db->le}disabled{$db->re}={$db->queryValue(is_null($this->disabled)?null:(int)$this->disabled)},",
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
		$record = Workflow::select($db->encapsulate("workflow") . ".mdate as fdate,null as tdate,{$db->encapsulate("workflow")}.*",null,$db->encapsulate("workflow").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}workflow{$dbLog->re} (",
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
				"FROM {$dbLog->le}workflow{$dbLog->re}",
				"WHERE {$dbLog->le}workflow{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}workflow{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("workflow") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("workflow") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}workflow{$db->le}",

			"WHERE {$db->le}workflow{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
			"ORDER BY " . alt($order, "{$db->le}workflow{$db->le}.{$db->le}order{$db->re}"),
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
		return Workflow::select("{$db->le}workflow{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Workflow::select("{$db->le}workflow{$db->re}.{$db->le}id{$db->re}, {$db->le}workflow{$db->re}.{$db->le}name{$db->re}, {$db->le}workflow{$db->re}.{$db->le}description{$db->re}, {$db->le}workflow{$db->re}.{$db->le}primary{$db->re}, {$db->le}workflow{$db->re}.{$db->le}order{$db->re}, {$db->le}workflow{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}workflow{$db->re}.{$db->le}mdate{$db->re}, {$db->le}workflow{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}workflow{$db->re}.{$db->le}cdate{$db->re}, {$db->le}workflow{$db->re}.{$db->le}disabled{$db->re}, {$db->le}workflow{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Workflow();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->description = $record["description"];
				$object->primary = $record["primary"];
				$object->order = $record["order"];
				$object->updatedById = $record["updated_by_id"];
				$object->mdate = is_null(($record["mdate"]))?null:new Date($record["mdate"]);
				$object->createdById = $record["created_by_id"];
				$object->cdate = is_null(($record["cdate"]))?null:new Date($record["cdate"]);
				$object->disabled = $record["disabled"];
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
			$clauses[] = "workflow.name LIKE '%{$keyword}%' OR workflow.description LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Workflow::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Workflow Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getWfmapWorkflow($wfmapId, $type="default") {
		return new WfmapWorkflow(null, $wfmapId, $this->id, WfmapWorkflow::typeId($type));
	}


	public function setWfmap($wfmap=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeWfmapList($type);
		$this->addWfmap($wfmap, $type);
		return $this;
	}
	public function removeWfmap($wfmap, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($wfmap) ? $wfmap : array($wfmap);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getWfmapWorkflow($id, $type);
			if ($deleteObject) {
				$relationship->getWfmap()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeWfmapList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return WfmapWorkflow::deleteAll(null, $this->id, $type);
		}
	}
	public function addWfmap($wfmap=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($wfmap)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($wfmap) ? $wfmap : array($wfmap);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getWfmapWorkflow($id, $type);
				$relationship->order = ++$order;
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getWfmap($type="default") {
		if (isset($this->_cache["Wfmap"]) && isset($this->_cache["Wfmap"][$type])) {
			$wfmap = $this->_cache["Wfmap"][$type];
		} else {
			$wfmap = new Wfmap($this->getWfmapId($type));
		}
		$this->_cache["Wfmap"][$type] = $wfmap;
		return $this->_cache["Wfmap"][$type];
	}
	public function getWfmapList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getWfmapIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Wfmap::objects($order, "{$db->le}wfmap{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getWfmapId($type="default") {
		return $this->getWfmapIds($type)->get(0);
	}
	public function getWfmapIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}wfmap{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}wfmap{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}wfmap{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}wfmap{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}wfmap{$db->re} ",
			"INNER JOIN {$db->le}wfmap_workflow{$db->re} ON {$db->le}wfmap_workflow{$db->re}.{$db->le}wfmap_id{$db->re}={$db->le}wfmap{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}wfmap_workflow{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}wfmap{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}wfmap_workflow{$db->re}.{$db->le}workflow_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}wfmap_workflow{$db->re}.{$db->le}wfmap_workflow_type_id{$db->re}=" . $db->queryValue(WfmapWorkflow::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}wfmap_workflow{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY " . alt("{$order}", "{$db->le}wfmap{$db->re}.{$db->le}order{$db->re}") : ""),
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