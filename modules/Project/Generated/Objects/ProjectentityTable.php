<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the projectentity table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the projectentity
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called ProjectentityExtension, and should extend the ProjectentityTable
 * class.  The custom code file should be in the helix/modules/Project folder
 * and should be called ProjectentityExtension.php
 * 
 * Object -> Projectentity
 */
class ProjectentityTable extends Object {
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
	public $projectentitystatusId;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $name=null, $code=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = $name;
		$this->code = $code;
		$this->description = null;
		$this->projectentitystatusId = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}projectentity{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}projectentity{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		} else if (isset($code)) {
			$condition = "{$db->le}projectentity{$db->re}.{$db->le}code{$db->re}={$db->queryValue($code)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}projectentity{$db->re}.{$db->le}id{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}name{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}code{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}description{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}projectentitystatus_id{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}mdate{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}cdate{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}projectentity{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->code = $db->record["code"];
				$this->description = $db->record["description"];
				$this->projectentitystatusId = $db->record["projectentitystatus_id"];
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
		$this->_initial["projectentitystatusId"] = $this->projectentitystatusId;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $name=null, $code=null) {
		$object = new Projectentity();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}projectentity{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}projectentity{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		} else if (isset($code)) {
			$condition = "{$db->le}projectentity{$db->re}.{$db->le}code{$db->re}={$db->queryValue($code)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}projectentity{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}projectentity{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}projectentity{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}projectentity{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}fdate{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}tdate{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}id{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}name{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}code{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}description{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}projectentitystatus_id{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}mdate{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}cdate{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}projectentity{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}projectentity{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->code = $db->record["code"];
				$object->description = $db->record["description"];
				$object->projectentitystatusId = $db->record["projectentitystatus_id"];
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
		$isDirty = $isDirty || ((int)$this->projectentitystatusId !== (int)$this->_initial["projectentitystatusId"]);
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
			"INSERT INTO {$db->le}projectentity{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}code{$db->re}, {$db->le}description{$db->re}, {$db->le}projectentitystatus_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->code) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue(is_null($this->projectentitystatusId)?null:(int)$this->projectentitystatusId) . ",",
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
				"UPDATE {$db->le}projectentity{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}code{$db->re}={$db->queryValue($this->code)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}projectentitystatus_id{$db->re}={$db->queryValue(is_null($this->projectentitystatusId)?null:(int)$this->projectentitystatusId)},",
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
		$record = Projectentity::select($db->encapsulate("projectentity") . ".mdate as fdate,null as tdate,{$db->encapsulate("projectentity")}.*",null,$db->encapsulate("projectentity").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}projectentity{$dbLog->re} (",
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
				"FROM {$dbLog->le}projectentity{$dbLog->re}",
				"WHERE {$dbLog->le}projectentity{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}projectentity{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("projectentity") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("projectentity") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}projectentity{$db->le}",
			"LEFT JOIN {$db->le}projectentitystatus{$db->re} ON {$db->le}projectentity{$db->re}.{$db->le}projectentitystatus_id{$db->re}={$db->le}projectentitystatus{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}projectentity{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Projectentity::select("{$db->le}projectentity{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Projectentity::select("{$db->le}projectentity{$db->re}.{$db->le}id{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}name{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}code{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}description{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}projectentitystatus_id{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}mdate{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}cdate{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Projectentity();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->code = $record["code"];
				$object->description = $record["description"];
				$object->projectentitystatusId = $record["projectentitystatus_id"];
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
			$clauses[] = "projectentity.name LIKE '%{$keyword}%' OR projectentity.code LIKE '%{$keyword}%' OR projectentity.description LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Projectentity::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Projectentity Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getBudgetProjectentity($budgetId, $type="default") {
		return new BudgetProjectentity(null, $budgetId, $this->id, BudgetProjectentity::typeId($type));
	}

	public function getCommentProjectentity($commentId, $type="default") {
		return new CommentProjectentity(null, $commentId, $this->id, CommentProjectentity::typeId($type));
	}

	public function getContractProjectentity($contractId, $type="default") {
		return new ContractProjectentity(null, $contractId, $this->id, ContractProjectentity::typeId($type));
	}

	public function getEmployeeProjectentity($employeeId, $type="default") {
		return new EmployeeProjectentity(null, $employeeId, $this->id, EmployeeProjectentity::typeId($type));
	}

	public function getEntityProjectentity($entityId, $type="default") {
		return new EntityProjectentity(null, $entityId, $this->id, EntityProjectentity::typeId($type));
	}

	public function getProjectentityProjectentitydate($projectentitydateId, $type="default") {
		return new ProjectentityProjectentitydate(null, $this->id, $projectentitydateId, ProjectentityProjectentitydate::typeId($type));
	}

	public function getProjectentityResource($resourceId, $type="default") {
		return new ProjectentityResource(null, $this->id, $resourceId, ProjectentityResource::typeId($type));
	}

	public function getProjectentityTask($taskId, $type="default") {
		return new ProjectentityTask(null, $this->id, $taskId, ProjectentityTask::typeId($type));
	}

	public function getProjectentitystatus() {
		return new Projectentitystatus($this->projectentitystatusId);
	}

	public function setProjectentitystatus(Projectentitystatus $projectentitystatus) {
		if ($projectentitystatus->id>0) {
			$this->projectentitystatusId = $projectentitystatus->id;
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
			$relationship = $this->getBudgetProjectentity($id, $type);
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
			return BudgetProjectentity::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getBudgetProjectentity($id, $type);
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
			"INNER JOIN {$db->le}budget_projectentity{$db->re} ON {$db->le}budget_projectentity{$db->re}.{$db->le}budget_id{$db->re}={$db->le}budget{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}budget_projectentity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}budget{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}budget_projectentity{$db->re}.{$db->le}projectentity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}budget_projectentity{$db->re}.{$db->le}budget_projectentity_type_id{$db->re}=" . $db->queryValue(BudgetProjectentity::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}budget_projectentity{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getCommentProjectentity($id, $type);
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
			return CommentProjectentity::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getCommentProjectentity($id, $type);
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
			"INNER JOIN {$db->le}comment_projectentity{$db->re} ON {$db->le}comment_projectentity{$db->re}.{$db->le}comment_id{$db->re}={$db->le}comment{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}comment_projectentity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment_projectentity{$db->re}.{$db->le}projectentity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}comment_projectentity{$db->re}.{$db->le}comment_projectentity_type_id{$db->re}=" . $db->queryValue(CommentProjectentity::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}comment_projectentity{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setContract($contract=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeContractList($type);
		$this->addContract($contract, $type);
		return $this;
	}
	public function removeContract($contract, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($contract) ? $contract : array($contract);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getContractProjectentity($id, $type);
			if ($deleteObject) {
				$relationship->getContract()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeContractList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ContractProjectentity::deleteAll(null, $this->id, $type);
		}
	}
	public function addContract($contract=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($contract)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($contract) ? $contract : array($contract);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getContractProjectentity($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getContract($type="default") {
		if (isset($this->_cache["Contract"]) && isset($this->_cache["Contract"][$type])) {
			$contract = $this->_cache["Contract"][$type];
		} else {
			$contract = new Contract($this->getContractId($type));
		}
		$this->_cache["Contract"][$type] = $contract;
		return $this->_cache["Contract"][$type];
	}
	public function getContractList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getContractIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Contract::objects($order, "{$db->le}contract{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getContractId($type="default") {
		return $this->getContractIds($type)->get(0);
	}
	public function getContractIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}contract{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}contract{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}contract{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}contract{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}contract{$db->re} ",
			"INNER JOIN {$db->le}contract_projectentity{$db->re} ON {$db->le}contract_projectentity{$db->re}.{$db->le}contract_id{$db->re}={$db->le}contract{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}contract_projectentity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contract{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contract_projectentity{$db->re}.{$db->le}projectentity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}contract_projectentity{$db->re}.{$db->le}contract_projectentity_type_id{$db->re}=" . $db->queryValue(ContractProjectentity::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}contract_projectentity{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setEmployee($employee=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeEmployeeList($type);
		$this->addEmployee($employee, $type);
		return $this;
	}
	public function removeEmployee($employee, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($employee) ? $employee : array($employee);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEmployeeProjectentity($id, $type);
			if ($deleteObject) {
				$relationship->getEmployee()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeEmployeeList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EmployeeProjectentity::deleteAll(null, $this->id, $type);
		}
	}
	public function addEmployee($employee=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($employee)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($employee) ? $employee : array($employee);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEmployeeProjectentity($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getEmployee($type="default") {
		if (isset($this->_cache["Employee"]) && isset($this->_cache["Employee"][$type])) {
			$employee = $this->_cache["Employee"][$type];
		} else {
			$employee = new Employee($this->getEmployeeId($type));
		}
		$this->_cache["Employee"][$type] = $employee;
		return $this->_cache["Employee"][$type];
	}
	public function getEmployeeList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getEmployeeIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Employee::objects($order, "{$db->le}employee{$db->le}.{$db->re}person_entity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getEmployeeId($type="default") {
		return $this->getEmployeeIds($type)->get(0);
	}
	public function getEmployeeIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}employee{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}employee{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}employee{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}employee{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"FROM {$db->le}employee{$db->re} ",
			"INNER JOIN {$db->le}employee_projectentity{$db->re} ON {$db->le}employee_projectentity{$db->re}.{$db->le}person_entity_id{$db->re}={$db->le}employee{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}employee_projectentity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}employee{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}employee_projectentity{$db->re}.{$db->le}projectentity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}employee_projectentity{$db->re}.{$db->le}employee_projectentity_type_id{$db->re}=" . $db->queryValue(EmployeeProjectentity::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}employee_projectentity{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getEntityProjectentity($id, $type);
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
			return EntityProjectentity::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getEntityProjectentity($id, $type);
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
			"INNER JOIN {$db->le}entity_projectentity{$db->re} ON {$db->le}entity_projectentity{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_projectentity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_projectentity{$db->re}.{$db->le}projectentity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_projectentity{$db->re}.{$db->le}entity_projectentity_type_id{$db->re}=" . $db->queryValue(EntityProjectentity::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_projectentity{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setProjectentitydate($projectentitydate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeProjectentitydateList($type);
		$this->addProjectentitydate($projectentitydate, $type);
		return $this;
	}
	public function removeProjectentitydate($projectentitydate, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($projectentitydate) ? $projectentitydate : array($projectentitydate);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getProjectentityProjectentitydate($id, $type);
			if ($deleteObject) {
				$relationship->getProjectentitydate()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeProjectentitydateList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ProjectentityProjectentitydate::deleteAll($this->id, null, $type);
		}
	}
	public function addProjectentitydate($projectentitydate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($projectentitydate)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($projectentitydate) ? $projectentitydate : array($projectentitydate);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getProjectentityProjectentitydate($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getProjectentitydate($type="default") {
		if (isset($this->_cache["Projectentitydate"]) && isset($this->_cache["Projectentitydate"][$type])) {
			$projectentitydate = $this->_cache["Projectentitydate"][$type];
		} else {
			$projectentitydate = new Projectentitydate($this->getProjectentitydateId($type));
		}
		$this->_cache["Projectentitydate"][$type] = $projectentitydate;
		return $this->_cache["Projectentitydate"][$type];
	}
	public function getProjectentitydateList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getProjectentitydateIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Projectentitydate::objects($order, "{$db->le}projectentitydate{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getProjectentitydateId($type="default") {
		return $this->getProjectentitydateIds($type)->get(0);
	}
	public function getProjectentitydateIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}projectentitydate{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}projectentitydate{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}projectentitydate{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}projectentitydate{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}projectentitydate{$db->re} ",
			"INNER JOIN {$db->le}projectentity_projectentitydate{$db->re} ON {$db->le}projectentity_projectentitydate{$db->re}.{$db->le}projectentitydate_id{$db->re}={$db->le}projectentitydate{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}projectentity_projectentitydate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}projectentitydate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}projectentity_projectentitydate{$db->re}.{$db->le}projectentity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}projectentity_projectentitydate{$db->re}.{$db->le}projectentity_projectentitydate_type_id{$db->re}=" . $db->queryValue(ProjectentityProjectentitydate::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}projectentity_projectentitydate{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getProjectentityResource($id, $type);
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
			return ProjectentityResource::deleteAll($this->id, null, $type);
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
				$relationship = $this->getProjectentityResource($id, $type);
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
			"INNER JOIN {$db->le}projectentity_resource{$db->re} ON {$db->le}projectentity_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->le}resource{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}projectentity_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}projectentity_resource{$db->re}.{$db->le}projectentity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}projectentity_resource{$db->re}.{$db->le}projectentity_resource_type_id{$db->re}=" . $db->queryValue(ProjectentityResource::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}projectentity_resource{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getProjectentityTask($id, $type);
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
			return ProjectentityTask::deleteAll($this->id, null, $type);
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
				$relationship = $this->getProjectentityTask($id, $type);
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
			"INNER JOIN {$db->le}projectentity_task{$db->re} ON {$db->le}projectentity_task{$db->re}.{$db->le}task_id{$db->re}={$db->le}task{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}projectentity_task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}projectentity_task{$db->re}.{$db->le}projectentity_id{$db->re}={$db->queryValue($this->id)} ",
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

}
?>