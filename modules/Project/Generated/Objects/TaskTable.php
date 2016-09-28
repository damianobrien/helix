<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the task table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the task
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called TaskExtension, and should extend the TaskTable
 * class.  The custom code file should be in the helix/modules/Project folder
 * and should be called TaskExtension.php
 * 
 * Object -> Task
 */
class TaskTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $name;
	public $code;
	public $description;
	public $taskstatusId;
	public $taskpriorityId;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = null;
		$this->code = null;
		$this->description = null;
		$this->taskstatusId = null;
		$this->taskpriorityId = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}task{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}task{$db->re}.{$db->le}id{$db->re}, {$db->le}task{$db->re}.{$db->le}name{$db->re}, {$db->le}task{$db->re}.{$db->le}code{$db->re}, {$db->le}task{$db->re}.{$db->le}description{$db->re}, {$db->le}task{$db->re}.{$db->le}taskstatus_id{$db->re}, {$db->le}task{$db->re}.{$db->le}taskpriority_id{$db->re}, {$db->le}task{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}task{$db->re}.{$db->le}mdate{$db->re}, {$db->le}task{$db->re}.{$db->le}cdate{$db->re}, {$db->le}task{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}task{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->code = $db->record["code"];
				$this->description = $db->record["description"];
				$this->taskstatusId = $db->record["taskstatus_id"];
				$this->taskpriorityId = $db->record["taskpriority_id"];
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
		$this->_initial["code"] = $this->code;
		$this->_initial["description"] = $this->description;
		$this->_initial["taskstatusId"] = $this->taskstatusId;
		$this->_initial["taskpriorityId"] = $this->taskpriorityId;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Task();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}task{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}task{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}task{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}task{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}task{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}task{$db->re}.{$db->le}fdate{$db->re}, {$db->le}task{$db->re}.{$db->le}tdate{$db->re}, {$db->le}task{$db->re}.{$db->le}id{$db->re}, {$db->le}task{$db->re}.{$db->le}name{$db->re}, {$db->le}task{$db->re}.{$db->le}code{$db->re}, {$db->le}task{$db->re}.{$db->le}description{$db->re}, {$db->le}task{$db->re}.{$db->le}taskstatus_id{$db->re}, {$db->le}task{$db->re}.{$db->le}taskpriority_id{$db->re}, {$db->le}task{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}task{$db->re}.{$db->le}mdate{$db->re}, {$db->le}task{$db->re}.{$db->le}cdate{$db->re}, {$db->le}task{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}task{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}task{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->code = $db->record["code"];
				$object->description = $db->record["description"];
				$object->taskstatusId = $db->record["taskstatus_id"];
				$object->taskpriorityId = $db->record["taskpriority_id"];
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
		$isDirty = $isDirty || ((string)$this->code !== (string)$this->_initial["code"]);
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
		$isDirty = $isDirty || ((int)$this->taskstatusId !== (int)$this->_initial["taskstatusId"]);
		$isDirty = $isDirty || ((int)$this->taskpriorityId !== (int)$this->_initial["taskpriorityId"]);
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
			"INSERT INTO {$db->le}task{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}code{$db->re}, {$db->le}description{$db->re}, {$db->le}taskstatus_id{$db->re}, {$db->le}taskpriority_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->code) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue(is_null($this->taskstatusId)?null:(int)$this->taskstatusId) . ",",
				$db->queryValue(is_null($this->taskpriorityId)?null:(int)$this->taskpriorityId) . ",",
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
				"UPDATE {$db->le}task{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}code{$db->re}={$db->queryValue($this->code)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}taskstatus_id{$db->re}={$db->queryValue(is_null($this->taskstatusId)?null:(int)$this->taskstatusId)},",
					"{$db->le}taskpriority_id{$db->re}={$db->queryValue(is_null($this->taskpriorityId)?null:(int)$this->taskpriorityId)},",
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
		$record = Task::select($db->encapsulate("task") . ".mdate as fdate,null as tdate,{$db->encapsulate("task")}.*",null,$db->encapsulate("task").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}task{$dbLog->re} (",
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
				"FROM {$dbLog->le}task{$dbLog->re}",
				"WHERE {$dbLog->le}task{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}task{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("task") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("task") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}task{$db->le}",
			"LEFT JOIN {$db->le}taskstatus{$db->re} ON {$db->le}task{$db->re}.{$db->le}taskstatus_id{$db->re}={$db->le}taskstatus{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}taskpriority{$db->re} ON {$db->le}task{$db->re}.{$db->le}taskpriority_id{$db->re}={$db->le}taskpriority{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}task{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Task::select("{$db->le}task{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Task::select("{$db->le}task{$db->re}.{$db->le}id{$db->re}, {$db->le}task{$db->re}.{$db->le}name{$db->re}, {$db->le}task{$db->re}.{$db->le}code{$db->re}, {$db->le}task{$db->re}.{$db->le}description{$db->re}, {$db->le}task{$db->re}.{$db->le}taskstatus_id{$db->re}, {$db->le}task{$db->re}.{$db->le}taskpriority_id{$db->re}, {$db->le}task{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}task{$db->re}.{$db->le}mdate{$db->re}, {$db->le}task{$db->re}.{$db->le}cdate{$db->re}, {$db->le}task{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Task();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->code = $record["code"];
				$object->description = $record["description"];
				$object->taskstatusId = $record["taskstatus_id"];
				$object->taskpriorityId = $record["taskpriority_id"];
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
			$clauses[] = "task.name LIKE '%{$keyword}%' OR task.code LIKE '%{$keyword}%' OR task.description LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Task::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Task Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getBudgetTask($budgetId, $type="default") {
		return new BudgetTask(null, $budgetId, $this->id, BudgetTask::typeId($type));
	}

	public function getCommentTask($commentId, $type="default") {
		return new CommentTask(null, $commentId, $this->id, CommentTask::typeId($type));
	}

	public function getDocumentTask($documentId, $type="default") {
		return new DocumentTask(null, $documentId, $this->id, DocumentTask::typeId($type));
	}

	public function getEntityTask($entityId, $type="default") {
		return new EntityTask(null, $entityId, $this->id, EntityTask::typeId($type));
	}

	public function getOrgpositionTask($orgpositionId, $type="default") {
		return new OrgpositionTask(null, $orgpositionId, $this->id, OrgpositionTask::typeId($type));
	}

	public function getPercentcompleteTask($percentcompleteId, $type="default") {
		return new PercentcompleteTask(null, $percentcompleteId, $this->id, PercentcompleteTask::typeId($type));
	}

	public function getProjectentityTask($projectentityId, $type="default") {
		return new ProjectentityTask(null, $projectentityId, $this->id, ProjectentityTask::typeId($type));
	}

	public function getTaskTaskdate($taskdateId, $type="default") {
		return new TaskTaskdate(null, $this->id, $taskdateId, TaskTaskdate::typeId($type));
	}

	public function getTaskstatus() {
		return new Taskstatus($this->taskstatusId);
	}

	public function setTaskstatus(Taskstatus $taskstatus) {
		if ($taskstatus->id>0) {
			$this->taskstatusId = $taskstatus->id;
		}
	}

	public function getTaskpriority() {
		return new Taskpriority($this->taskpriorityId);
	}

	public function setTaskpriority(Taskpriority $taskpriority) {
		if ($taskpriority->id>0) {
			$this->taskpriorityId = $taskpriority->id;
		}
	}

	public function setBudget($budget=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeBudgetList($type);
		$this->addBudget($budget, $type);
		return $this;
	}
	public function removeBudget($budget, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($budget) ? $budget : array($budget);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getBudgetTask($id, $type);
			if ($deleteObject) {
				$relationship->getBudget()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeBudgetList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return BudgetTask::deleteAll(null, $this->id, $type);
		}
	}
	public function addBudget($budget=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($budget)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($budget) ? $budget : array($budget);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getBudgetTask($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getBudget($type="default") {
		if (isset($this->_cache["Budget"]) && isset($this->_cache["Budget"][$type])) {
			$budget = $this->_cache["Budget"][$type];
		} else {
			$budget = new Budget($this->getBudgetId($type));
		}
		$this->_cache["Budget"][$type] = $budget;
		return $this->_cache["Budget"][$type];
	}
	public function getBudgetList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getBudgetIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Budget::objects($order, "{$db->le}budget{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getBudgetId($type="default") {
		return $this->getBudgetIds($type)->get(0);
	}
	public function getBudgetIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}budget{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}budget{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}budget{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}budget{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}budget{$db->re} ",
			"INNER JOIN {$db->le}budget_task{$db->re} ON {$db->le}budget_task{$db->re}.{$db->le}budget_id{$db->re}={$db->le}budget{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}budget_task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}budget{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}budget_task{$db->re}.{$db->le}task_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}budget_task{$db->re}.{$db->le}budget_task_type_id{$db->re}=" . $db->queryValue(BudgetTask::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}budget_task{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getCommentTask($id, $type);
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
			return CommentTask::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getCommentTask($id, $type);
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
			"INNER JOIN {$db->le}comment_task{$db->re} ON {$db->le}comment_task{$db->re}.{$db->le}comment_id{$db->re}={$db->le}comment{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}comment_task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment_task{$db->re}.{$db->le}task_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}comment_task{$db->re}.{$db->le}comment_task_type_id{$db->re}=" . $db->queryValue(CommentTask::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}comment_task{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setDocument($document=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeDocumentList($type);
		$this->addDocument($document, $type);
		return $this;
	}
	public function removeDocument($document, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($document) ? $document : array($document);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getDocumentTask($id, $type);
			if ($deleteObject) {
				$relationship->getDocument()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeDocumentList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return DocumentTask::deleteAll(null, $this->id, $type);
		}
	}
	public function addDocument($document=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($document)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($document) ? $document : array($document);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getDocumentTask($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getDocument($type="default") {
		if (isset($this->_cache["Document"]) && isset($this->_cache["Document"][$type])) {
			$document = $this->_cache["Document"][$type];
		} else {
			$document = new Document($this->getDocumentId($type));
		}
		$this->_cache["Document"][$type] = $document;
		return $this->_cache["Document"][$type];
	}
	public function getDocumentList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getDocumentIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Document::objects($order, "{$db->le}document{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getDocumentId($type="default") {
		return $this->getDocumentIds($type)->get(0);
	}
	public function getDocumentIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}document{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}document{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}document{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}document{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}document{$db->re} ",
			"INNER JOIN {$db->le}document_task{$db->re} ON {$db->le}document_task{$db->re}.{$db->le}document_id{$db->re}={$db->le}document{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}document_task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}document{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}document_task{$db->re}.{$db->le}task_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}document_task{$db->re}.{$db->le}document_task_type_id{$db->re}=" . $db->queryValue(DocumentTask::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}document_task{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getEntityTask($id, $type);
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
			return EntityTask::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getEntityTask($id, $type);
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
			"INNER JOIN {$db->le}entity_task{$db->re} ON {$db->le}entity_task{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_task{$db->re}.{$db->le}task_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_task{$db->re}.{$db->le}entity_task_type_id{$db->re}=" . $db->queryValue(EntityTask::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_task{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setOrgposition($orgposition=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeOrgpositionList($type);
		$this->addOrgposition($orgposition, $type);
		return $this;
	}
	public function removeOrgposition($orgposition, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($orgposition) ? $orgposition : array($orgposition);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getOrgpositionTask($id, $type);
			if ($deleteObject) {
				$relationship->getOrgposition()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeOrgpositionList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return OrgpositionTask::deleteAll(null, $this->id, $type);
		}
	}
	public function addOrgposition($orgposition=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($orgposition)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($orgposition) ? $orgposition : array($orgposition);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getOrgpositionTask($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getOrgposition($type="default") {
		if (isset($this->_cache["Orgposition"]) && isset($this->_cache["Orgposition"][$type])) {
			$orgposition = $this->_cache["Orgposition"][$type];
		} else {
			$orgposition = new Orgposition($this->getOrgpositionId($type));
		}
		$this->_cache["Orgposition"][$type] = $orgposition;
		return $this->_cache["Orgposition"][$type];
	}
	public function getOrgpositionList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getOrgpositionIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Orgposition::objects($order, "{$db->le}orgposition{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getOrgpositionId($type="default") {
		return $this->getOrgpositionIds($type)->get(0);
	}
	public function getOrgpositionIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}orgposition{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}orgposition{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}orgposition{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}orgposition{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}orgposition{$db->re} ",
			"INNER JOIN {$db->le}orgposition_task{$db->re} ON {$db->le}orgposition_task{$db->re}.{$db->le}orgposition_id{$db->re}={$db->le}orgposition{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}orgposition_task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}orgposition{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}orgposition_task{$db->re}.{$db->le}task_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}orgposition_task{$db->re}.{$db->le}orgposition_task_type_id{$db->re}=" . $db->queryValue(OrgpositionTask::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}orgposition_task{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setPercentcomplete($percentcomplete=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removePercentcompleteList($type);
		$this->addPercentcomplete($percentcomplete, $type);
		return $this;
	}
	public function removePercentcomplete($percentcomplete, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($percentcomplete) ? $percentcomplete : array($percentcomplete);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getPercentcompleteTask($id, $type);
			if ($deleteObject) {
				$relationship->getPercentcomplete()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removePercentcompleteList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return PercentcompleteTask::deleteAll(null, $this->id, $type);
		}
	}
	public function addPercentcomplete($percentcomplete=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($percentcomplete)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($percentcomplete) ? $percentcomplete : array($percentcomplete);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getPercentcompleteTask($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getPercentcomplete($type="default") {
		if (isset($this->_cache["Percentcomplete"]) && isset($this->_cache["Percentcomplete"][$type])) {
			$percentcomplete = $this->_cache["Percentcomplete"][$type];
		} else {
			$percentcomplete = new Percentcomplete($this->getPercentcompleteId($type));
		}
		$this->_cache["Percentcomplete"][$type] = $percentcomplete;
		return $this->_cache["Percentcomplete"][$type];
	}
	public function getPercentcompleteList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getPercentcompleteIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Percentcomplete::objects($order, "{$db->le}percentcomplete{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getPercentcompleteId($type="default") {
		return $this->getPercentcompleteIds($type)->get(0);
	}
	public function getPercentcompleteIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}percentcomplete{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}percentcomplete{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}percentcomplete{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}percentcomplete{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}percentcomplete{$db->re} ",
			"INNER JOIN {$db->le}percentcomplete_task{$db->re} ON {$db->le}percentcomplete_task{$db->re}.{$db->le}percentcomplete_id{$db->re}={$db->le}percentcomplete{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}percentcomplete_task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}percentcomplete{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}percentcomplete_task{$db->re}.{$db->le}task_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}percentcomplete_task{$db->re}.{$db->le}percentcomplete_task_type_id{$db->re}=" . $db->queryValue(PercentcompleteTask::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}percentcomplete_task{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getProjectentityTask($id, $type);
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
			return ProjectentityTask::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getProjectentityTask($id, $type);
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
			"INNER JOIN {$db->le}projectentity_task{$db->re} ON {$db->le}projectentity_task{$db->re}.{$db->le}projectentity_id{$db->re}={$db->le}projectentity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}projectentity_task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}projectentity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}projectentity_task{$db->re}.{$db->le}task_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}projectentity_task{$db->re}.{$db->le}projectentity_task_type_id{$db->re}=" . $db->queryValue(ProjectentityTask::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}projectentity_task{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setTaskdate($taskdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeTaskdateList($type);
		$this->addTaskdate($taskdate, $type);
		return $this;
	}
	public function removeTaskdate($taskdate, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($taskdate) ? $taskdate : array($taskdate);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getTaskTaskdate($id, $type);
			if ($deleteObject) {
				$relationship->getTaskdate()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeTaskdateList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return TaskTaskdate::deleteAll($this->id, null, $type);
		}
	}
	public function addTaskdate($taskdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($taskdate)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($taskdate) ? $taskdate : array($taskdate);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getTaskTaskdate($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getTaskdate($type="default") {
		if (isset($this->_cache["Taskdate"]) && isset($this->_cache["Taskdate"][$type])) {
			$taskdate = $this->_cache["Taskdate"][$type];
		} else {
			$taskdate = new Taskdate($this->getTaskdateId($type));
		}
		$this->_cache["Taskdate"][$type] = $taskdate;
		return $this->_cache["Taskdate"][$type];
	}
	public function getTaskdateList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getTaskdateIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Taskdate::objects($order, "{$db->le}taskdate{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getTaskdateId($type="default") {
		return $this->getTaskdateIds($type)->get(0);
	}
	public function getTaskdateIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}taskdate{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}taskdate{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}taskdate{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}taskdate{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}taskdate{$db->re} ",
			"INNER JOIN {$db->le}task_taskdate{$db->re} ON {$db->le}task_taskdate{$db->re}.{$db->le}taskdate_id{$db->re}={$db->le}taskdate{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}task_taskdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}taskdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}task_taskdate{$db->re}.{$db->le}task_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}task_taskdate{$db->re}.{$db->le}task_taskdate_type_id{$db->re}=" . $db->queryValue(TaskTaskdate::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}task_taskdate{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
		$relationships = TaskTask::objects(null, "{$db->le}child_task_id{$db->re}='{$this->id}' AND {$db->le}task_task_type_id{$db->re}='" . TaskTask::typeId($type) . "'");
		return ($relationships->count()===1) ? $relationships->get(0)->getParent() : new Task();
	}

	public function getChildIds() {
		$db = Database::getInstance();
		return TaskTask::select("task_task.child_task_id", null, "task_task.parent_task_id={$this->id}");
	}

	public function getChildren() {
		return $this->hasChildren() ? Task::objects(null, "task.id IN (" . $this->getChildIds()->join(",") . ")") : new Collection();
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
		return TaskTask::select("task_task.child_task_id", null, "task_task.child_task_id<>'{$this->id}' AND task_task.parent_task_id=" . $db->queryValue($this->getParent()->id));
	}

	public function getSiblings() {
		return $this->hasSiblings() ? Task::objects(null, "task.id IN (" . $this->getSiblingIds()->join(",") . ")") : new Collection();
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