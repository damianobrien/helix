<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the percentcomplete table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the percentcomplete
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called PercentcompleteExtension, and should extend the PercentcompleteTable
 * class.  The custom code file should be in the helix/modules/Project folder
 * and should be called PercentcompleteExtension.php
 * 
 * Object -> Percentcomplete
 */
class PercentcompleteTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $value;
	public $pdate;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->value = null;
		$this->pdate = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}percentcomplete{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}percentcomplete{$db->re}.{$db->le}id{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}value{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}pdate{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}mdate{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}cdate{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}percentcomplete{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->value = $db->record["value"];
				$this->pdate = is_null(($db->record["pdate"]))?null:new Date($db->record["pdate"]);
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["value"] = $this->value;
		$this->_initial["pdate"] = $this->pdate;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Percentcomplete();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}percentcomplete{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}percentcomplete{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}percentcomplete{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}percentcomplete{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}percentcomplete{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}fdate{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}tdate{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}id{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}value{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}pdate{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}mdate{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}cdate{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}percentcomplete{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}percentcomplete{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->value = $db->record["value"];
				$object->pdate = is_null(($db->record["pdate"]))?null:new Date($db->record["pdate"]);
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
		$isDirty = $isDirty || ((float)$this->value !== (float)$this->_initial["value"]);
		$isDirty = $isDirty || ((string)$this->pdate != (string)$this->_initial["pdate"]);
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
			"INSERT INTO {$db->le}percentcomplete{$db->re} (",
			"	{$db->le}value{$db->re}, {$db->le}pdate{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->value) . ",",
				$db->queryValue($this->pdate) . ",",
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
				"UPDATE {$db->le}percentcomplete{$db->re} SET",
					"{$db->le}value{$db->re}={$db->queryValue($this->value)},",
					"{$db->le}pdate{$db->re}={$db->queryValue($this->pdate)},",
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
		$record = Percentcomplete::select($db->encapsulate("percentcomplete") . ".mdate as fdate,null as tdate,{$db->encapsulate("percentcomplete")}.*",null,$db->encapsulate("percentcomplete").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}percentcomplete{$dbLog->re} (",
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
				"FROM {$dbLog->le}percentcomplete{$dbLog->re}",
				"WHERE {$dbLog->le}percentcomplete{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}percentcomplete{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("percentcomplete") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("percentcomplete") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}percentcomplete{$db->le}",

			"WHERE {$db->le}percentcomplete{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Percentcomplete::select("{$db->le}percentcomplete{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Percentcomplete::select("{$db->le}percentcomplete{$db->re}.{$db->le}id{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}value{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}pdate{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}mdate{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}cdate{$db->re}, {$db->le}percentcomplete{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Percentcomplete();
				$object->id = $record["id"];
				$object->value = $record["value"];
				$object->pdate = is_null(($record["pdate"]))?null:new Date($record["pdate"]);
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
			$clauses[] = "id LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Percentcomplete::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Percentcomplete Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getPercentcompleteProject($projectId, $type="default") {
		return new PercentcompleteProject(null, $this->id, $projectId, PercentcompleteProject::typeId($type));
	}

	public function getPercentcompleteTask($taskId, $type="default") {
		return new PercentcompleteTask(null, $this->id, $taskId, PercentcompleteTask::typeId($type));
	}


	public function setProject($project=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeProjectList($type);
		$this->addProject($project, $type);
		return $this;
	}
	public function removeProject($project, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($project) ? $project : array($project);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getPercentcompleteProject($id, $type);
			if ($deleteObject) {
				$relationship->getProject()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeProjectList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return PercentcompleteProject::deleteAll($this->id, null, $type);
		}
	}
	public function addProject($project=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($project)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($project) ? $project : array($project);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getPercentcompleteProject($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getProject($type="default") {
		if (isset($this->_cache["Project"]) && isset($this->_cache["Project"][$type])) {
			$project = $this->_cache["Project"][$type];
		} else {
			$project = new Project($this->getProjectId($type));
		}
		$this->_cache["Project"][$type] = $project;
		return $this->_cache["Project"][$type];
	}
	public function getProjectList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getProjectIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Project::objects($order, "{$db->le}project{$db->le}.{$db->re}projectentity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getProjectId($type="default") {
		return $this->getProjectIds($type)->get(0);
	}
	public function getProjectIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}project{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}project{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}project{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}project{$db->re}.{$db->le}projectentity_id{$db->re} ",
			"FROM {$db->le}project{$db->re} ",
			"INNER JOIN {$db->le}percentcomplete_project{$db->re} ON {$db->le}percentcomplete_project{$db->re}.{$db->le}project_projectentity_id{$db->re}={$db->le}project{$db->re}.{$db->le}projectentity_id{$db->re} ",
			"	AND {$db->le}percentcomplete_project{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}project{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}percentcomplete_project{$db->re}.{$db->le}percentcomplete_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}percentcomplete_project{$db->re}.{$db->le}percentcomplete_project_type_id{$db->re}=" . $db->queryValue(PercentcompleteProject::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}percentcomplete_project{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["projectentity_id"];
		}
		
		return new Collection($ids);
	}

	public function setTask($task=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeTaskList($type);
		$this->addTask($task, $type);
		return $this;
	}
	public function removeTask($task, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($task) ? $task : array($task);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getPercentcompleteTask($id, $type);
			if ($deleteObject) {
				$relationship->getTask()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeTaskList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return PercentcompleteTask::deleteAll($this->id, null, $type);
		}
	}
	public function addTask($task=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($task)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($task) ? $task : array($task);
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
	public function getTask($type="default") {
		if (isset($this->_cache["Task"]) && isset($this->_cache["Task"][$type])) {
			$task = $this->_cache["Task"][$type];
		} else {
			$task = new Task($this->getTaskId($type));
		}
		$this->_cache["Task"][$type] = $task;
		return $this->_cache["Task"][$type];
	}
	public function getTaskList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getTaskIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Task::objects($order, "{$db->le}task{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getTaskId($type="default") {
		return $this->getTaskIds($type)->get(0);
	}
	public function getTaskIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}task{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}task{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}task{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}task{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}task{$db->re} ",
			"INNER JOIN {$db->le}percentcomplete_task{$db->re} ON {$db->le}percentcomplete_task{$db->re}.{$db->le}task_id{$db->re}={$db->le}task{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}percentcomplete_task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}percentcomplete_task{$db->re}.{$db->le}percentcomplete_id{$db->re}={$db->queryValue($this->id)} ",
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

}
?>