<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the wfmap_workflow table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the wfmap_workflow
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called WfmapWorkflowExtension, and should extend the WfmapWorkflowTable
 * class.  The custom code file should be in the helix/modules/Workflow folder
 * and should be called WfmapWorkflowExtension.php
 * 
 * Object -> WfmapWorkflow
 */
class WfmapWorkflowTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $wfmapId;
	public $workflowId;
	public $wfmapWorkflowTypeId;
	public $primary;
	public $order;
	public $updatedById;
	public $mdate;
	public $createdById;
	public $cdate;
	public $disabled;
	public $deleted;

	public function __construct($id=null, $wfmapId=null, $workflowId=null, $wfmapWorkflowTypeId=1) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->wfmapId = $wfmapId;
		$this->workflowId = $workflowId;
		$this->wfmapWorkflowTypeId = $wfmapWorkflowTypeId;
		$this->primary = false;
		$this->order = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->createdById = null;
		$this->cdate = new Date();
		$this->disabled = false;
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}wfmap_workflow{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($wfmapId) && isset($workflowId)) {
			$condition = "{$db->le}wfmap_id{$db->re}={$db->queryValue($wfmapId)} AND {$db->le}workflow_id{$db->re}={$db->queryValue($workflowId)} AND {$db->le}wfmap_workflow_type_id{$db->re}={$db->queryValue($wfmapWorkflowTypeId)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}wfmap_workflow{$db->re}.{$db->le}id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}wfmap_id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}workflow_id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}wfmap_workflow_type_id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}primary{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}order{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}mdate{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}cdate{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}disabled{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}wfmap_workflow{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->wfmapId = $db->record["wfmap_id"];
				$this->workflowId = $db->record["workflow_id"];
				$this->wfmapWorkflowTypeId = $db->record["wfmap_workflow_type_id"];
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
		$this->_initial["wfmapId"] = $this->wfmapId;
		$this->_initial["workflowId"] = $this->workflowId;
		$this->_initial["wfmapWorkflowTypeId"] = $this->wfmapWorkflowTypeId;
		$this->_initial["primary"] = $this->primary;
		$this->_initial["order"] = $this->order;
		$this->_initial["createdById"] = $this->createdById;
		$this->_initial["disabled"] = $this->disabled;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $wfmapId=null, $workflowId=null, $wfmapWorkflowTypeId=1) {
		$object = new WfmapWorkflow();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}wfmap_workflow{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($wfmapId) && isset($workflowId)) {
			$condition = "{$db->le}wfmap_id{$db->re}={$db->queryValue($wfmapId)} AND {$db->le}workflow_id{$db->re}={$db->queryValue($workflowId)} AND {$db->le}wfmap_workflow_type_id{$db->re}={$db->queryValue($wfmapWorkflowTypeId)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}wfmap_workflow{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}wfmap_workflow{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}wfmap_workflow{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}wfmap_workflow{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}fdate{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}tdate{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}wfmap_id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}workflow_id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}wfmap_workflow_type_id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}primary{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}order{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}mdate{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}cdate{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}disabled{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}wfmap_workflow{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}wfmap_workflow{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->wfmapId = $db->record["wfmap_id"];
				$object->workflowId = $db->record["workflow_id"];
				$object->wfmapWorkflowTypeId = $db->record["wfmap_workflow_type_id"];
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
		$isDirty = $isDirty || ((int)$this->wfmapId !== (int)$this->_initial["wfmapId"]);
		$isDirty = $isDirty || ((int)$this->workflowId !== (int)$this->_initial["workflowId"]);
		$isDirty = $isDirty || ((int)$this->wfmapWorkflowTypeId !== (int)$this->_initial["wfmapWorkflowTypeId"]);
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
			"INSERT INTO {$db->le}wfmap_workflow{$db->re} (",
			"	{$db->le}wfmap_id{$db->re}, {$db->le}workflow_id{$db->re}, {$db->le}wfmap_workflow_type_id{$db->re}, {$db->le}primary{$db->re}, {$db->le}order{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}created_by_id{$db->re}, {$db->le}cdate{$db->re}, {$db->le}disabled{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->wfmapId)?null:(int)$this->wfmapId) . ",",
				$db->queryValue(is_null($this->workflowId)?null:(int)$this->workflowId) . ",",
				$db->queryValue(is_null($this->wfmapWorkflowTypeId)?null:(int)$this->wfmapWorkflowTypeId) . ",",
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
				"UPDATE {$db->le}wfmap_workflow{$db->re} SET",
					"{$db->le}wfmap_id{$db->re}={$db->queryValue(is_null($this->wfmapId)?null:(int)$this->wfmapId)},",
					"{$db->le}workflow_id{$db->re}={$db->queryValue(is_null($this->workflowId)?null:(int)$this->workflowId)},",
					"{$db->le}wfmap_workflow_type_id{$db->re}={$db->queryValue(is_null($this->wfmapWorkflowTypeId)?null:(int)$this->wfmapWorkflowTypeId)},",
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
		$record = WfmapWorkflow::select($db->encapsulate("wfmap_workflow") . ".mdate as fdate,null as tdate,{$db->encapsulate("wfmap_workflow")}.*",null,$db->encapsulate("wfmap_workflow").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}wfmap_workflow{$dbLog->re} (",
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
				"FROM {$dbLog->le}wfmap_workflow{$dbLog->re}",
				"WHERE {$dbLog->le}wfmap_workflow{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}wfmap_workflow{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("wfmap_workflow") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($wfmapId=null, $workflowId=null, $type=null) {
		$db = Database::getInstance();
		$conditions = array();
		if (isset($wfmapId)) {
			$conditions[] = "{$db->le}wfmap_id{$db->re}={$db->queryValue($wfmapId)}";
		}
		if (isset($workflowId)) {
			$conditions[] = "{$db->le}workflow_id{$db->re}={$db->queryValue($workflowId)}";
		}
		if (isset($type)) {
			$conditions[] = "{$db->le}wfmap_workflow_type_id{$db->re}=" . $db->queryValue(self::typeId($type));
		}
		$condition = count($conditions)===0 ? "" : " WHERE " . implode(" AND ", $conditions);
		$query = "UPDATE " . $db->encapsulate("wfmap_workflow") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}wfmap_workflow{$db->le}",

			"WHERE {$db->le}wfmap_workflow{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
			"ORDER BY " . alt($order, "{$db->le}wfmap_workflow{$db->le}.{$db->le}order{$db->re}"),
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
		return WfmapWorkflow::select("{$db->le}wfmap_workflow{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (WfmapWorkflow::select("{$db->le}wfmap_workflow{$db->re}.{$db->le}id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}wfmap_id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}workflow_id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}wfmap_workflow_type_id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}primary{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}order{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}mdate{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}cdate{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}disabled{$db->re}, {$db->le}wfmap_workflow{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new WfmapWorkflow();
				$object->id = $record["id"];
				$object->wfmapId = $record["wfmap_id"];
				$object->workflowId = $record["workflow_id"];
				$object->wfmapWorkflowTypeId = $record["wfmap_workflow_type_id"];
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
			$clauses[] = "id LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return WfmapWorkflow::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "WfmapWorkflow Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new WfmapWorkflowType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new WfmapWorkflowType($this->wfmapWorkflowTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new WfmapWorkflowType(null, $type);
		$this->wfmapWorkflowTypeId = $type->id;
		return $this->wfmapWorkflowTypeId;
	}


	public function getWfmap() {
		return new Wfmap($this->wfmapId);
	}

	public function setWfmap(Wfmap $wfmap) {
		if ($wfmap->id>0) {
			$this->wfmapId = $wfmap->id;
		}
	}

	public function getWorkflow() {
		return new Workflow($this->workflowId);
	}

	public function setWorkflow(Workflow $workflow) {
		if ($workflow->id>0) {
			$this->workflowId = $workflow->id;
		}
	}

	public function getWfmapWorkflowType() {
		return new WfmapWorkflowType($this->wfmapWorkflowTypeId);
	}

	public function setWfmapWorkflowType(WfmapWorkflowType $wfmapWorkflowType) {
		if ($wfmapWorkflowType->id>0) {
			$this->wfmapWorkflowTypeId = $wfmapWorkflowType->id;
		}
	}


}
?>