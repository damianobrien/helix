<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the software table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the software
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called SoftwareExtension, and should extend the SoftwareTable
 * class.  The custom code file should be in the helix/modules/Asset folder
 * and should be called SoftwareExtension.php
 * 
 * Object -> Asset -> Software
 */
class SoftwareTable extends Asset {
	public $logSequence;
	public $fdate;
	public $tdate;

	public $version;
	public $purpose;
	public $requirements;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = null;
		$this->description = null;
		$this->assetTypeId = null;
		$this->assetstatusId = null;
		$this->departmentId = null;
		$this->sku = null;
		$this->model = null;
		$this->partNumber = null;
		$this->serialNumber = null;
		$this->unitPrice = 0;
		$this->quantity = 0;
		$this->capex = false;
		$this->version = null;
		$this->purpose = null;
		$this->requirements = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}software{$db->re}.{$db->le}asset_id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}asset{$db->re}.{$db->le}id{$db->re}, {$db->le}asset{$db->re}.{$db->le}name{$db->re}, {$db->le}asset{$db->re}.{$db->le}description{$db->re}, {$db->le}asset{$db->re}.{$db->le}asset_type_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}assetstatus_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}department_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}sku{$db->re}, {$db->le}asset{$db->re}.{$db->le}model{$db->re}, {$db->le}asset{$db->re}.{$db->le}part_number{$db->re}, {$db->le}asset{$db->re}.{$db->le}serial_number{$db->re}, {$db->le}asset{$db->re}.{$db->le}unit_price{$db->re}, {$db->le}asset{$db->re}.{$db->le}quantity{$db->re}, {$db->le}asset{$db->re}.{$db->le}capex{$db->re}, {$db->le}software{$db->re}.{$db->le}version{$db->re}, {$db->le}software{$db->re}.{$db->le}purpose{$db->re}, {$db->le}software{$db->re}.{$db->le}requirements{$db->re}, {$db->le}software{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}software{$db->re}.{$db->le}mdate{$db->re}, {$db->le}software{$db->re}.{$db->le}cdate{$db->re}, {$db->le}software{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}software{$db->re}",
			"INNER JOIN {$db->le}asset{$db->re} ON {$db->le}software{$db->re}.{$db->le}asset_id{$db->re}={$db->le}asset{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->description = $db->record["description"];
				$this->assetTypeId = $db->record["asset_type_id"];
				$this->assetstatusId = $db->record["assetstatus_id"];
				$this->departmentId = $db->record["department_id"];
				$this->sku = $db->record["sku"];
				$this->model = $db->record["model"];
				$this->partNumber = $db->record["part_number"];
				$this->serialNumber = $db->record["serial_number"];
				$this->unitPrice = $db->record["unit_price"];
				$this->quantity = $db->record["quantity"];
				$this->capex = $db->record["capex"];
				$this->version = $db->record["version"];
				$this->purpose = $db->record["purpose"];
				$this->requirements = $db->record["requirements"];
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
		$this->_initial["description"] = $this->description;
		$this->_initial["assetTypeId"] = $this->assetTypeId;
		$this->_initial["assetstatusId"] = $this->assetstatusId;
		$this->_initial["departmentId"] = $this->departmentId;
		$this->_initial["sku"] = $this->sku;
		$this->_initial["model"] = $this->model;
		$this->_initial["partNumber"] = $this->partNumber;
		$this->_initial["serialNumber"] = $this->serialNumber;
		$this->_initial["unitPrice"] = $this->unitPrice;
		$this->_initial["quantity"] = $this->quantity;
		$this->_initial["capex"] = $this->capex;
		$this->_initial["version"] = $this->version;
		$this->_initial["purpose"] = $this->purpose;
		$this->_initial["requirements"] = $this->requirements;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Software();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}software{$db->re}.{$db->le}asset_id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}software{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}software{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}software{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}asset{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}asset{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}asset{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}software{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}software{$db->re}.{$db->le}fdate{$db->re}, {$db->le}software{$db->re}.{$db->le}tdate{$db->re}, {$db->le}asset{$db->re}.{$db->le}id{$db->re}, {$db->le}asset{$db->re}.{$db->le}name{$db->re}, {$db->le}asset{$db->re}.{$db->le}description{$db->re}, {$db->le}asset{$db->re}.{$db->le}asset_type_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}assetstatus_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}department_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}sku{$db->re}, {$db->le}asset{$db->re}.{$db->le}model{$db->re}, {$db->le}asset{$db->re}.{$db->le}part_number{$db->re}, {$db->le}asset{$db->re}.{$db->le}serial_number{$db->re}, {$db->le}asset{$db->re}.{$db->le}unit_price{$db->re}, {$db->le}asset{$db->re}.{$db->le}quantity{$db->re}, {$db->le}asset{$db->re}.{$db->le}capex{$db->re}, {$db->le}software{$db->re}.{$db->le}version{$db->re}, {$db->le}software{$db->re}.{$db->le}purpose{$db->re}, {$db->le}software{$db->re}.{$db->le}requirements{$db->re}, {$db->le}software{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}software{$db->re}.{$db->le}mdate{$db->re}, {$db->le}software{$db->re}.{$db->le}cdate{$db->re}, {$db->le}software{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}software{$db->re}",
			"INNER JOIN {$db->le}asset{$db->re} ON {$db->le}software{$db->re}.{$db->le}asset_id{$db->re}={$db->le}asset{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$query .= "ORDER BY {$db->le}software{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->description = $db->record["description"];
				$object->assetTypeId = $db->record["asset_type_id"];
				$object->assetstatusId = $db->record["assetstatus_id"];
				$object->departmentId = $db->record["department_id"];
				$object->sku = $db->record["sku"];
				$object->model = $db->record["model"];
				$object->partNumber = $db->record["part_number"];
				$object->serialNumber = $db->record["serial_number"];
				$object->unitPrice = $db->record["unit_price"];
				$object->quantity = $db->record["quantity"];
				$object->capex = $db->record["capex"];
				$object->version = $db->record["version"];
				$object->purpose = $db->record["purpose"];
				$object->requirements = $db->record["requirements"];
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
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
		$isDirty = $isDirty || ((int)$this->assetTypeId !== (int)$this->_initial["assetTypeId"]);
		$isDirty = $isDirty || ((int)$this->assetstatusId !== (int)$this->_initial["assetstatusId"]);
		$isDirty = $isDirty || ((int)$this->departmentId !== (int)$this->_initial["departmentId"]);
		$isDirty = $isDirty || ((string)$this->sku !== (string)$this->_initial["sku"]);
		$isDirty = $isDirty || ((string)$this->model !== (string)$this->_initial["model"]);
		$isDirty = $isDirty || ((string)$this->partNumber !== (string)$this->_initial["partNumber"]);
		$isDirty = $isDirty || ((string)$this->serialNumber !== (string)$this->_initial["serialNumber"]);
		$isDirty = $isDirty || ((float)$this->unitPrice !== (float)$this->_initial["unitPrice"]);
		$isDirty = $isDirty || ((int)$this->quantity !== (int)$this->_initial["quantity"]);
		$isDirty = $isDirty || ((int)$this->capex !== (int)$this->_initial["capex"]);
		$isDirty = $isDirty || ((string)$this->version !== (string)$this->_initial["version"]);
		$isDirty = $isDirty || ((string)$this->purpose !== (string)$this->_initial["purpose"]);
		$isDirty = $isDirty || ((string)$this->requirements !== (string)$this->_initial["requirements"]);
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

	public function insert($insertParent=true) {
		if (isset($this->_snapshot)) {return false;}
		global $session, $config;

		$db = Database::getInstance();
		if ($insertParent) {
			parent::insert();
		}
		$query = implode(NL, array(
			"INSERT INTO {$db->le}software{$db->re} (",
			"	{$db->le}asset_id{$db->re}, {$db->le}version{$db->re}, {$db->le}purpose{$db->re}, {$db->le}requirements{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->id)?null:(int)$this->id) . ",",
				$db->queryValue($this->version) . ",",
				$db->queryValue($this->purpose) . ",",
				$db->queryValue($this->requirements) . ",",
				$db->queryValue((int)$session->getUserId()) . ",",
				$db->queryValue(timestamp()) . ",",
				$db->queryValue(timestamp()) . ",",
				$db->queryValue(is_null($this->deleted)?null:(int)$this->deleted),
			")"
		));
		$status = $db->query($query);

		if ($config["enable_database_log"]) {
			$this->log();
		}

		return $status;
	}

	public function update() {
		if (isset($this->_snapshot)) {return false;}
		global $session, $config;

		parent::update();
		if ($this->isDirty()) {
			$db = Database::getInstance();
			$query = implode(NL, array(
				"UPDATE {$db->le}software{$db->re} SET",
					"{$db->le}version{$db->re}={$db->queryValue($this->version)},",
					"{$db->le}purpose{$db->re}={$db->queryValue($this->purpose)},",
					"{$db->le}requirements{$db->re}={$db->queryValue($this->requirements)},",
					"{$db->le}updated_by_id{$db->re}={$db->queryValue((int)$session->getUserId())},",
					"{$db->le}mdate{$db->re}={$db->queryValue(timestamp())},",
					"{$db->le}deleted{$db->re}={$db->queryValue(is_null($this->deleted)?null:(int)$this->deleted)}",
				"WHERE asset_id={$db->queryValue((int)$this->id)}"
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
		$record = Software::select($db->encapsulate("software") . ".mdate as fdate,null as tdate,{$db->encapsulate("software")}.*",null,$db->encapsulate("software").".asset_id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}software{$dbLog->re} (",
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
				"FROM {$dbLog->le}software{$dbLog->re}",
				"WHERE {$dbLog->le}software{$dbLog->re}.{$dbLog->le}asset_id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}software{$dbLog->re}",
					"SET {$dbLog->le}tdate{$dbLog->re}={$record["mdate"]}",
					"where log_sequence={$updateSequence}"
				));
				$dbLog->query($query);
			}
		}
		$db->changeDatabase($database);
		return $status;
	}

	public function getInherited() {
		$this->get();
	}

	public function addSibling($object) {
		if (isset($this->_snapshot)) {return false;}
		if (method_exists($object, "getInherited") && is_null($object->id) && $object->getInherited()->getClass()===$this->getInherited()->getClass()) {
			$object->id = $this->id;
			return $object->insert(false);
		} else {
			return false;
		}
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
		$query = "DELETE FROM " . $db->encapsulate("software") . " WHERE asset_id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("software") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}software{$db->le}",
			"INNER JOIN {$db->le}asset{$db->re} ON {$db->le}software{$db->re}.{$db->le}asset_id{$db->re}={$db->le}asset{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}asset_type{$db->re} ON {$db->le}asset{$db->re}.{$db->le}asset_type_id{$db->re}={$db->le}asset_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}assetstatus{$db->re} ON {$db->le}asset{$db->re}.{$db->le}assetstatus_id{$db->re}={$db->le}assetstatus{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}department{$db->re} ON {$db->le}asset{$db->re}.{$db->le}department_id{$db->re}={$db->le}department{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}software{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Software::select("{$db->le}software{$db->le}.asset_id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Software::select("{$db->le}asset{$db->re}.{$db->le}id{$db->re}, {$db->le}asset{$db->re}.{$db->le}name{$db->re}, {$db->le}asset{$db->re}.{$db->le}description{$db->re}, {$db->le}asset{$db->re}.{$db->le}asset_type_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}assetstatus_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}department_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}sku{$db->re}, {$db->le}asset{$db->re}.{$db->le}model{$db->re}, {$db->le}asset{$db->re}.{$db->le}part_number{$db->re}, {$db->le}asset{$db->re}.{$db->le}serial_number{$db->re}, {$db->le}asset{$db->re}.{$db->le}unit_price{$db->re}, {$db->le}asset{$db->re}.{$db->le}quantity{$db->re}, {$db->le}asset{$db->re}.{$db->le}capex{$db->re}, {$db->le}software{$db->re}.{$db->le}version{$db->re}, {$db->le}software{$db->re}.{$db->le}purpose{$db->re}, {$db->le}software{$db->re}.{$db->le}requirements{$db->re}, {$db->le}software{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}software{$db->re}.{$db->le}mdate{$db->re}, {$db->le}software{$db->re}.{$db->le}cdate{$db->re}, {$db->le}software{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Software();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->description = $record["description"];
				$object->assetTypeId = $record["asset_type_id"];
				$object->assetstatusId = $record["assetstatus_id"];
				$object->departmentId = $record["department_id"];
				$object->sku = $record["sku"];
				$object->model = $record["model"];
				$object->partNumber = $record["part_number"];
				$object->serialNumber = $record["serial_number"];
				$object->unitPrice = $record["unit_price"];
				$object->quantity = $record["quantity"];
				$object->capex = $record["capex"];
				$object->version = $record["version"];
				$object->purpose = $record["purpose"];
				$object->requirements = $record["requirements"];
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
			$clauses[] = "asset.name LIKE '%{$keyword}%' OR asset.description LIKE '%{$keyword}%' OR asset.sku LIKE '%{$keyword}%' OR asset.model LIKE '%{$keyword}%' OR asset.part_number LIKE '%{$keyword}%' OR asset.serial_number LIKE '%{$keyword}%' OR software.version LIKE '%{$keyword}%' OR software.purpose LIKE '%{$keyword}%' OR software.requirements LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Software::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Software Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getLicenseSoftware($licenseId, $type="default") {
		return new LicenseSoftware(null, $licenseId, $this->id, LicenseSoftware::typeId($type));
	}

	public function getAsset() {
		return new Asset($this->id);
	}

	public function setLicense($license=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeLicenseList($type);
		$this->addLicense($license, $type);
		return $this;
	}
	public function removeLicense($license, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($license) ? $license : array($license);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getLicenseSoftware($id, $type);
			if ($deleteObject) {
				$relationship->getLicense()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeLicenseList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return LicenseSoftware::deleteAll(null, $this->id, $type);
		}
	}
	public function addLicense($license=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($license)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($license) ? $license : array($license);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getLicenseSoftware($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getLicense($type="default") {
		if (isset($this->_cache["License"]) && isset($this->_cache["License"][$type])) {
			$license = $this->_cache["License"][$type];
		} else {
			$license = new License($this->getLicenseId($type));
		}
		$this->_cache["License"][$type] = $license;
		return $this->_cache["License"][$type];
	}
	public function getLicenseList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getLicenseIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : License::objects($order, "{$db->le}license{$db->le}.{$db->re}asset_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getLicenseId($type="default") {
		return $this->getLicenseIds($type)->get(0);
	}
	public function getLicenseIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}license{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}license{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}license{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}license{$db->re}.{$db->le}asset_id{$db->re} ",
			"FROM {$db->le}license{$db->re} ",
			"INNER JOIN {$db->le}license_software{$db->re} ON {$db->le}license_software{$db->re}.{$db->le}license_asset_id{$db->re}={$db->le}license{$db->re}.{$db->le}asset_id{$db->re} ",
			"	AND {$db->le}license_software{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}license{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}license_software{$db->re}.{$db->le}software_asset_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}license_software{$db->re}.{$db->le}license_software_type_id{$db->re}=" . $db->queryValue(LicenseSoftware::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}license_software{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["asset_id"];
		}
		
		return new Collection($ids);
	}

}
?>