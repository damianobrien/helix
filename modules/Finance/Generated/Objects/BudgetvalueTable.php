<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the budgetvalue table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the budgetvalue
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called BudgetvalueExtension, and should extend the BudgetvalueTable
 * class.  The custom code file should be in the helix/modules/Finance folder
 * and should be called BudgetvalueExtension.php
 * 
 * Object -> Budgetvalue
 */
class BudgetvalueTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $value;
	public $unitId;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->value = null;
		$this->unitId = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}budgetvalue{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}budgetvalue{$db->re}.{$db->le}id{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}value{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}unit_id{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}mdate{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}cdate{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}budgetvalue{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->value = $db->record["value"];
				$this->unitId = $db->record["unit_id"];
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
		$this->_initial["unitId"] = $this->unitId;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Budgetvalue();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}budgetvalue{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}budgetvalue{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}budgetvalue{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}budgetvalue{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}budgetvalue{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}fdate{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}tdate{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}id{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}value{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}unit_id{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}mdate{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}cdate{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}budgetvalue{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}budgetvalue{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->value = $db->record["value"];
				$object->unitId = $db->record["unit_id"];
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
		$isDirty = $isDirty || ((int)$this->unitId !== (int)$this->_initial["unitId"]);
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
			"INSERT INTO {$db->le}budgetvalue{$db->re} (",
			"	{$db->le}value{$db->re}, {$db->le}unit_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->value) . ",",
				$db->queryValue(is_null($this->unitId)?null:(int)$this->unitId) . ",",
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
				"UPDATE {$db->le}budgetvalue{$db->re} SET",
					"{$db->le}value{$db->re}={$db->queryValue($this->value)},",
					"{$db->le}unit_id{$db->re}={$db->queryValue(is_null($this->unitId)?null:(int)$this->unitId)},",
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
		$record = Budgetvalue::select($db->encapsulate("budgetvalue") . ".mdate as fdate,null as tdate,{$db->encapsulate("budgetvalue")}.*",null,$db->encapsulate("budgetvalue").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}budgetvalue{$dbLog->re} (",
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
				"FROM {$dbLog->le}budgetvalue{$dbLog->re}",
				"WHERE {$dbLog->le}budgetvalue{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}budgetvalue{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("budgetvalue") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("budgetvalue") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}budgetvalue{$db->le}",
			"LEFT JOIN {$db->le}unit{$db->re} ON {$db->le}budgetvalue{$db->re}.{$db->le}unit_id{$db->re}={$db->le}unit{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}budgetvalue{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Budgetvalue::select("{$db->le}budgetvalue{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Budgetvalue::select("{$db->le}budgetvalue{$db->re}.{$db->le}id{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}value{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}unit_id{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}mdate{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}cdate{$db->re}, {$db->le}budgetvalue{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Budgetvalue();
				$object->id = $record["id"];
				$object->value = $record["value"];
				$object->unitId = $record["unit_id"];
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
		return Budgetvalue::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Budgetvalue Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getBudgetBudgetvalue($budgetId, $type="default") {
		return new BudgetBudgetvalue(null, $budgetId, $this->id, BudgetBudgetvalue::typeId($type));
	}

	public function getBudgetchangeBudgetvalue($budgetchangeId, $type="default") {
		return new BudgetchangeBudgetvalue(null, $budgetchangeId, $this->id, BudgetchangeBudgetvalue::typeId($type));
	}

	public function getUnit() {
		return new Unit($this->unitId);
	}

	public function setUnit(Unit $unit) {
		if ($unit->id>0) {
			$this->unitId = $unit->id;
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
			$relationship = $this->getBudgetBudgetvalue($id, $type);
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
			return BudgetBudgetvalue::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getBudgetBudgetvalue($id, $type);
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
			"INNER JOIN {$db->le}budget_budgetvalue{$db->re} ON {$db->le}budget_budgetvalue{$db->re}.{$db->le}budget_id{$db->re}={$db->le}budget{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}budget_budgetvalue{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}budget{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}budget_budgetvalue{$db->re}.{$db->le}budgetvalue_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}budget_budgetvalue{$db->re}.{$db->le}budget_budgetvalue_type_id{$db->re}=" . $db->queryValue(BudgetBudgetvalue::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}budget_budgetvalue{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setBudgetchange($budgetchange=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeBudgetchangeList($type);
		$this->addBudgetchange($budgetchange, $type);
		return $this;
	}
	public function removeBudgetchange($budgetchange, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($budgetchange) ? $budgetchange : array($budgetchange);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getBudgetchangeBudgetvalue($id, $type);
			if ($deleteObject) {
				$relationship->getBudgetchange()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeBudgetchangeList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return BudgetchangeBudgetvalue::deleteAll(null, $this->id, $type);
		}
	}
	public function addBudgetchange($budgetchange=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($budgetchange)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($budgetchange) ? $budgetchange : array($budgetchange);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getBudgetchangeBudgetvalue($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getBudgetchange($type="default") {
		if (isset($this->_cache["Budgetchange"]) && isset($this->_cache["Budgetchange"][$type])) {
			$budgetchange = $this->_cache["Budgetchange"][$type];
		} else {
			$budgetchange = new Budgetchange($this->getBudgetchangeId($type));
		}
		$this->_cache["Budgetchange"][$type] = $budgetchange;
		return $this->_cache["Budgetchange"][$type];
	}
	public function getBudgetchangeList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getBudgetchangeIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Budgetchange::objects($order, "{$db->le}budgetchange{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getBudgetchangeId($type="default") {
		return $this->getBudgetchangeIds($type)->get(0);
	}
	public function getBudgetchangeIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}budgetchange{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}budgetchange{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}budgetchange{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}budgetchange{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}budgetchange{$db->re} ",
			"INNER JOIN {$db->le}budgetchange_budgetvalue{$db->re} ON {$db->le}budgetchange_budgetvalue{$db->re}.{$db->le}budgetchange_id{$db->re}={$db->le}budgetchange{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}budgetchange_budgetvalue{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}budgetchange{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}budgetchange_budgetvalue{$db->re}.{$db->le}budgetvalue_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}budgetchange_budgetvalue{$db->re}.{$db->le}budgetchange_budgetvalue_type_id{$db->re}=" . $db->queryValue(BudgetchangeBudgetvalue::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}budgetchange_budgetvalue{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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