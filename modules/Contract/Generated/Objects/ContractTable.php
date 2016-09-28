<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the contract table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the contract
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called ContractExtension, and should extend the ContractTable
 * class.  The custom code file should be in the helix/modules/Contract folder
 * and should be called ContractExtension.php
 * 
 * Object -> Contract
 */
class ContractTable extends Object {
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
	public $contractstatusId;
	public $typeId;
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
		$this->contractstatusId = null;
		$this->typeId = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}contract{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}contract{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		} else if (isset($code)) {
			$condition = "{$db->le}contract{$db->re}.{$db->le}code{$db->re}={$db->queryValue($code)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}contract{$db->re}.{$db->le}id{$db->re}, {$db->le}contract{$db->re}.{$db->le}name{$db->re}, {$db->le}contract{$db->re}.{$db->le}code{$db->re}, {$db->le}contract{$db->re}.{$db->le}description{$db->re}, {$db->le}contract{$db->re}.{$db->le}contractstatus_id{$db->re}, {$db->le}contract{$db->re}.{$db->le}type_id{$db->re}, {$db->le}contract{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}contract{$db->re}.{$db->le}mdate{$db->re}, {$db->le}contract{$db->re}.{$db->le}cdate{$db->re}, {$db->le}contract{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}contract{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->code = $db->record["code"];
				$this->description = $db->record["description"];
				$this->contractstatusId = $db->record["contractstatus_id"];
				$this->typeId = $db->record["type_id"];
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
		$this->_initial["contractstatusId"] = $this->contractstatusId;
		$this->_initial["typeId"] = $this->typeId;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $name=null, $code=null) {
		$object = new Contract();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}contract{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}contract{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		} else if (isset($code)) {
			$condition = "{$db->le}contract{$db->re}.{$db->le}code{$db->re}={$db->queryValue($code)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}contract{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}contract{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}contract{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}contract{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}contract{$db->re}.{$db->le}fdate{$db->re}, {$db->le}contract{$db->re}.{$db->le}tdate{$db->re}, {$db->le}contract{$db->re}.{$db->le}id{$db->re}, {$db->le}contract{$db->re}.{$db->le}name{$db->re}, {$db->le}contract{$db->re}.{$db->le}code{$db->re}, {$db->le}contract{$db->re}.{$db->le}description{$db->re}, {$db->le}contract{$db->re}.{$db->le}contractstatus_id{$db->re}, {$db->le}contract{$db->re}.{$db->le}type_id{$db->re}, {$db->le}contract{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}contract{$db->re}.{$db->le}mdate{$db->re}, {$db->le}contract{$db->re}.{$db->le}cdate{$db->re}, {$db->le}contract{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}contract{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}contract{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->code = $db->record["code"];
				$object->description = $db->record["description"];
				$object->contractstatusId = $db->record["contractstatus_id"];
				$object->typeId = $db->record["type_id"];
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
		$isDirty = $isDirty || ((int)$this->contractstatusId !== (int)$this->_initial["contractstatusId"]);
		$isDirty = $isDirty || ((int)$this->typeId !== (int)$this->_initial["typeId"]);
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
			"INSERT INTO {$db->le}contract{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}code{$db->re}, {$db->le}description{$db->re}, {$db->le}contractstatus_id{$db->re}, {$db->le}type_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->code) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue(is_null($this->contractstatusId)?null:(int)$this->contractstatusId) . ",",
				$db->queryValue(is_null($this->typeId)?null:(int)$this->typeId) . ",",
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
				"UPDATE {$db->le}contract{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}code{$db->re}={$db->queryValue($this->code)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}contractstatus_id{$db->re}={$db->queryValue(is_null($this->contractstatusId)?null:(int)$this->contractstatusId)},",
					"{$db->le}type_id{$db->re}={$db->queryValue(is_null($this->typeId)?null:(int)$this->typeId)},",
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
		$record = Contract::select($db->encapsulate("contract") . ".mdate as fdate,null as tdate,{$db->encapsulate("contract")}.*",null,$db->encapsulate("contract").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}contract{$dbLog->re} (",
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
				"FROM {$dbLog->le}contract{$dbLog->re}",
				"WHERE {$dbLog->le}contract{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}contract{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("contract") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("contract") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}contract{$db->le}",
			"LEFT JOIN {$db->le}contractstatus{$db->re} ON {$db->le}contract{$db->re}.{$db->le}contractstatus_id{$db->re}={$db->le}contractstatus{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}contract_type{$db->re} ON {$db->le}contract{$db->re}.{$db->le}type_id{$db->re}={$db->le}contract_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}contract{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Contract::select("{$db->le}contract{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Contract::select("{$db->le}contract{$db->re}.{$db->le}id{$db->re}, {$db->le}contract{$db->re}.{$db->le}name{$db->re}, {$db->le}contract{$db->re}.{$db->le}code{$db->re}, {$db->le}contract{$db->re}.{$db->le}description{$db->re}, {$db->le}contract{$db->re}.{$db->le}contractstatus_id{$db->re}, {$db->le}contract{$db->re}.{$db->le}type_id{$db->re}, {$db->le}contract{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}contract{$db->re}.{$db->le}mdate{$db->re}, {$db->le}contract{$db->re}.{$db->le}cdate{$db->re}, {$db->le}contract{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Contract();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->code = $record["code"];
				$object->description = $record["description"];
				$object->contractstatusId = $record["contractstatus_id"];
				$object->typeId = $record["type_id"];
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
			$clauses[] = "contract.name LIKE '%{$keyword}%' OR contract.code LIKE '%{$keyword}%' OR contract.description LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Contract::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Contract Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new ContractType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new ContractType($this->contractTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new ContractType(null, $type);
		$this->contractTypeId = $type->id;
		return $this->contractTypeId;
	}

	public function getContractContractvalue($contractvalueId, $type="default") {
		return new ContractContractvalue(null, $this->id, $contractvalueId, ContractContractvalue::typeId($type));
	}

	public function getContractProjectentity($projectentityId, $type="default") {
		return new ContractProjectentity(null, $this->id, $projectentityId, ContractProjectentity::typeId($type));
	}

	public function getContractstatus() {
		return new Contractstatus($this->contractstatusId);
	}

	public function setContractstatus(Contractstatus $contractstatus) {
		if ($contractstatus->id>0) {
			$this->contractstatusId = $contractstatus->id;
		}
	}

	public function getContractType() {
		return new ContractType($this->typeId);
	}

	public function setContractType(ContractType $contractType) {
		if ($contractType->id>0) {
			$this->typeId = $contractType->id;
		}
	}

	public function setContractvalue($contractvalue=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeContractvalueList($type);
		$this->addContractvalue($contractvalue, $type);
		return $this;
	}
	public function removeContractvalue($contractvalue, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($contractvalue) ? $contractvalue : array($contractvalue);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getContractContractvalue($id, $type);
			if ($deleteObject) {
				$relationship->getContractvalue()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeContractvalueList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ContractContractvalue::deleteAll($this->id, null, $type);
		}
	}
	public function addContractvalue($contractvalue=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($contractvalue)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($contractvalue) ? $contractvalue : array($contractvalue);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getContractContractvalue($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getContractvalue($type="default") {
		if (isset($this->_cache["Contractvalue"]) && isset($this->_cache["Contractvalue"][$type])) {
			$contractvalue = $this->_cache["Contractvalue"][$type];
		} else {
			$contractvalue = new Contractvalue($this->getContractvalueId($type));
		}
		$this->_cache["Contractvalue"][$type] = $contractvalue;
		return $this->_cache["Contractvalue"][$type];
	}
	public function getContractvalueList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getContractvalueIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Contractvalue::objects($order, "{$db->le}contractvalue{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getContractvalueId($type="default") {
		return $this->getContractvalueIds($type)->get(0);
	}
	public function getContractvalueIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}contractvalue{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}contractvalue{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}contractvalue{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}contractvalue{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}contractvalue{$db->re} ",
			"INNER JOIN {$db->le}contract_contractvalue{$db->re} ON {$db->le}contract_contractvalue{$db->re}.{$db->le}contractvalue_id{$db->re}={$db->le}contractvalue{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}contract_contractvalue{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contractvalue{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contract_contractvalue{$db->re}.{$db->le}contract_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}contract_contractvalue{$db->re}.{$db->le}contract_contractvalue_type_id{$db->re}=" . $db->queryValue(ContractContractvalue::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}contract_contractvalue{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getContractProjectentity($id, $type);
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
			return ContractProjectentity::deleteAll($this->id, null, $type);
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
				$relationship = $this->getContractProjectentity($id, $type);
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
			"INNER JOIN {$db->le}contract_projectentity{$db->re} ON {$db->le}contract_projectentity{$db->re}.{$db->le}projectentity_id{$db->re}={$db->le}projectentity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}contract_projectentity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}projectentity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contract_projectentity{$db->re}.{$db->le}contract_id{$db->re}={$db->queryValue($this->id)} ",
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

}
?>