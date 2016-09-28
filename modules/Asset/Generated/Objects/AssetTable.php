<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the asset table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the asset
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called AssetExtension, and should extend the AssetTable
 * class.  The custom code file should be in the helix/modules/Asset folder
 * and should be called AssetExtension.php
 * 
 * Object -> Asset
 */
class AssetTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $name;
	public $description;
	public $assetTypeId;
	public $assetstatusId;
	public $departmentId;
	public $sku;
	public $model;
	public $partNumber;
	public $serialNumber;
	public $unitPrice;
	public $quantity;
	public $capex;
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
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}asset{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}asset{$db->re}.{$db->le}id{$db->re}, {$db->le}asset{$db->re}.{$db->le}name{$db->re}, {$db->le}asset{$db->re}.{$db->le}description{$db->re}, {$db->le}asset{$db->re}.{$db->le}asset_type_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}assetstatus_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}department_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}sku{$db->re}, {$db->le}asset{$db->re}.{$db->le}model{$db->re}, {$db->le}asset{$db->re}.{$db->le}part_number{$db->re}, {$db->le}asset{$db->re}.{$db->le}serial_number{$db->re}, {$db->le}asset{$db->re}.{$db->le}unit_price{$db->re}, {$db->le}asset{$db->re}.{$db->le}quantity{$db->re}, {$db->le}asset{$db->re}.{$db->le}capex{$db->re}, {$db->le}asset{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}mdate{$db->re}, {$db->le}asset{$db->re}.{$db->le}cdate{$db->re}, {$db->le}asset{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}asset{$db->re}",
				"WHERE {$condition}"
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
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Asset();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}asset{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}asset{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}asset{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}asset{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}asset{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}asset{$db->re}.{$db->le}fdate{$db->re}, {$db->le}asset{$db->re}.{$db->le}tdate{$db->re}, {$db->le}asset{$db->re}.{$db->le}id{$db->re}, {$db->le}asset{$db->re}.{$db->le}name{$db->re}, {$db->le}asset{$db->re}.{$db->le}description{$db->re}, {$db->le}asset{$db->re}.{$db->le}asset_type_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}assetstatus_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}department_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}sku{$db->re}, {$db->le}asset{$db->re}.{$db->le}model{$db->re}, {$db->le}asset{$db->re}.{$db->le}part_number{$db->re}, {$db->le}asset{$db->re}.{$db->le}serial_number{$db->re}, {$db->le}asset{$db->re}.{$db->le}unit_price{$db->re}, {$db->le}asset{$db->re}.{$db->le}quantity{$db->re}, {$db->le}asset{$db->re}.{$db->le}capex{$db->re}, {$db->le}asset{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}mdate{$db->re}, {$db->le}asset{$db->re}.{$db->le}cdate{$db->re}, {$db->le}asset{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}asset{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}asset{$db->re}.log_sequence desc limit 1";
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
			"INSERT INTO {$db->le}asset{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}description{$db->re}, {$db->le}asset_type_id{$db->re}, {$db->le}assetstatus_id{$db->re}, {$db->le}department_id{$db->re}, {$db->le}sku{$db->re}, {$db->le}model{$db->re}, {$db->le}part_number{$db->re}, {$db->le}serial_number{$db->re}, {$db->le}unit_price{$db->re}, {$db->le}quantity{$db->re}, {$db->le}capex{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue(is_null($this->assetTypeId)?null:(int)$this->assetTypeId) . ",",
				$db->queryValue(is_null($this->assetstatusId)?null:(int)$this->assetstatusId) . ",",
				$db->queryValue(is_null($this->departmentId)?null:(int)$this->departmentId) . ",",
				$db->queryValue($this->sku) . ",",
				$db->queryValue($this->model) . ",",
				$db->queryValue($this->partNumber) . ",",
				$db->queryValue($this->serialNumber) . ",",
				$db->queryValue($this->unitPrice) . ",",
				$db->queryValue(is_null($this->quantity)?null:(int)$this->quantity) . ",",
				$db->queryValue(is_null($this->capex)?null:(int)$this->capex) . ",",
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
				"UPDATE {$db->le}asset{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}asset_type_id{$db->re}={$db->queryValue(is_null($this->assetTypeId)?null:(int)$this->assetTypeId)},",
					"{$db->le}assetstatus_id{$db->re}={$db->queryValue(is_null($this->assetstatusId)?null:(int)$this->assetstatusId)},",
					"{$db->le}department_id{$db->re}={$db->queryValue(is_null($this->departmentId)?null:(int)$this->departmentId)},",
					"{$db->le}sku{$db->re}={$db->queryValue($this->sku)},",
					"{$db->le}model{$db->re}={$db->queryValue($this->model)},",
					"{$db->le}part_number{$db->re}={$db->queryValue($this->partNumber)},",
					"{$db->le}serial_number{$db->re}={$db->queryValue($this->serialNumber)},",
					"{$db->le}unit_price{$db->re}={$db->queryValue($this->unitPrice)},",
					"{$db->le}quantity{$db->re}={$db->queryValue(is_null($this->quantity)?null:(int)$this->quantity)},",
					"{$db->le}capex{$db->re}={$db->queryValue(is_null($this->capex)?null:(int)$this->capex)},",
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
		$record = Asset::select($db->encapsulate("asset") . ".mdate as fdate,null as tdate,{$db->encapsulate("asset")}.*",null,$db->encapsulate("asset").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}asset{$dbLog->re} (",
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
				"FROM {$dbLog->le}asset{$dbLog->re}",
				"WHERE {$dbLog->le}asset{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}asset{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("asset") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("asset") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}asset{$db->le}",
			"LEFT JOIN {$db->le}asset_type{$db->re} ON {$db->le}asset{$db->re}.{$db->le}asset_type_id{$db->re}={$db->le}asset_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}assetstatus{$db->re} ON {$db->le}asset{$db->re}.{$db->le}assetstatus_id{$db->re}={$db->le}assetstatus{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}department{$db->re} ON {$db->le}asset{$db->re}.{$db->le}department_id{$db->re}={$db->le}department{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}asset{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Asset::select("{$db->le}asset{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Asset::select("{$db->le}asset{$db->re}.{$db->le}id{$db->re}, {$db->le}asset{$db->re}.{$db->le}name{$db->re}, {$db->le}asset{$db->re}.{$db->le}description{$db->re}, {$db->le}asset{$db->re}.{$db->le}asset_type_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}assetstatus_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}department_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}sku{$db->re}, {$db->le}asset{$db->re}.{$db->le}model{$db->re}, {$db->le}asset{$db->re}.{$db->le}part_number{$db->re}, {$db->le}asset{$db->re}.{$db->le}serial_number{$db->re}, {$db->le}asset{$db->re}.{$db->le}unit_price{$db->re}, {$db->le}asset{$db->re}.{$db->le}quantity{$db->re}, {$db->le}asset{$db->re}.{$db->le}capex{$db->re}, {$db->le}asset{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}asset{$db->re}.{$db->le}mdate{$db->re}, {$db->le}asset{$db->re}.{$db->le}cdate{$db->re}, {$db->le}asset{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Asset();
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
			$clauses[] = "asset.name LIKE '%{$keyword}%' OR asset.description LIKE '%{$keyword}%' OR asset.sku LIKE '%{$keyword}%' OR asset.model LIKE '%{$keyword}%' OR asset.part_number LIKE '%{$keyword}%' OR asset.serial_number LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Asset::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Asset Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new AssetType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new AssetType($this->assetTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new AssetType(null, $type);
		$this->assetTypeId = $type->id;
		return $this->assetTypeId;
	}

	public function getAssetAssetdate($assetdateId, $type="default") {
		return new AssetAssetdate(null, $this->id, $assetdateId, AssetAssetdate::typeId($type));
	}

	public function getAssetBusiness($businessId, $type="default") {
		return new AssetBusiness(null, $this->id, $businessId, AssetBusiness::typeId($type));
	}

	public function getAssetOffice($officeId, $type="default") {
		return new AssetOffice(null, $this->id, $officeId, AssetOffice::typeId($type));
	}

	public function getAssetPerson($personId, $type="default") {
		return new AssetPerson(null, $this->id, $personId, AssetPerson::typeId($type));
	}

	public function getAssetResource($resourceId, $type="default") {
		return new AssetResource(null, $this->id, $resourceId, AssetResource::typeId($type));
	}

	public function getAssetUrl($urlId, $type="default") {
		return new AssetUrl(null, $this->id, $urlId, AssetUrl::typeId($type));
	}

	public function getAssetType() {
		return new AssetType($this->assetTypeId);
	}

	public function setAssetType(AssetType $assetType) {
		if ($assetType->id>0) {
			$this->assetTypeId = $assetType->id;
		}
	}

	public function getAssetstatus() {
		return new Assetstatus($this->assetstatusId);
	}

	public function setAssetstatus(Assetstatus $assetstatus) {
		if ($assetstatus->id>0) {
			$this->assetstatusId = $assetstatus->id;
		}
	}

	public function getDepartment() {
		return new Department($this->departmentId);
	}

	public function setDepartment(Department $department) {
		if ($department->id>0) {
			$this->departmentId = $department->id;
		}
	}

	public function setAssetdate($assetdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeAssetdateList($type);
		$this->addAssetdate($assetdate, $type);
		return $this;
	}
	public function removeAssetdate($assetdate, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($assetdate) ? $assetdate : array($assetdate);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getAssetAssetdate($id, $type);
			if ($deleteObject) {
				$relationship->getAssetdate()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeAssetdateList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return AssetAssetdate::deleteAll($this->id, null, $type);
		}
	}
	public function addAssetdate($assetdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($assetdate)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($assetdate) ? $assetdate : array($assetdate);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getAssetAssetdate($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getAssetdate($type="default") {
		if (isset($this->_cache["Assetdate"]) && isset($this->_cache["Assetdate"][$type])) {
			$assetdate = $this->_cache["Assetdate"][$type];
		} else {
			$assetdate = new Assetdate($this->getAssetdateId($type));
		}
		$this->_cache["Assetdate"][$type] = $assetdate;
		return $this->_cache["Assetdate"][$type];
	}
	public function getAssetdateList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getAssetdateIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Assetdate::objects($order, "{$db->le}assetdate{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getAssetdateId($type="default") {
		return $this->getAssetdateIds($type)->get(0);
	}
	public function getAssetdateIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}assetdate{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}assetdate{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}assetdate{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}assetdate{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}assetdate{$db->re} ",
			"INNER JOIN {$db->le}asset_assetdate{$db->re} ON {$db->le}asset_assetdate{$db->re}.{$db->le}assetdate_id{$db->re}={$db->le}assetdate{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}asset_assetdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}assetdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset_assetdate{$db->re}.{$db->le}asset_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}asset_assetdate{$db->re}.{$db->le}asset_assetdate_type_id{$db->re}=" . $db->queryValue(AssetAssetdate::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}asset_assetdate{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setBusiness($business=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeBusinessList($type);
		$this->addBusiness($business, $type);
		return $this;
	}
	public function removeBusiness($business, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($business) ? $business : array($business);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getAssetBusiness($id, $type);
			if ($deleteObject) {
				$relationship->getBusiness()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeBusinessList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return AssetBusiness::deleteAll($this->id, null, $type);
		}
	}
	public function addBusiness($business=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($business)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($business) ? $business : array($business);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getAssetBusiness($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getBusiness($type="default") {
		if (isset($this->_cache["Business"]) && isset($this->_cache["Business"][$type])) {
			$business = $this->_cache["Business"][$type];
		} else {
			$business = new Business($this->getBusinessId($type));
		}
		$this->_cache["Business"][$type] = $business;
		return $this->_cache["Business"][$type];
	}
	public function getBusinessList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getBusinessIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Business::objects($order, "{$db->le}business{$db->le}.{$db->re}entity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getBusinessId($type="default") {
		return $this->getBusinessIds($type)->get(0);
	}
	public function getBusinessIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}business{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}business{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}business{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}business{$db->re}.{$db->le}entity_id{$db->re} ",
			"FROM {$db->le}business{$db->re} ",
			"INNER JOIN {$db->le}asset_business{$db->re} ON {$db->le}asset_business{$db->re}.{$db->le}business_entity_id{$db->re}={$db->le}business{$db->re}.{$db->le}entity_id{$db->re} ",
			"	AND {$db->le}asset_business{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset_business{$db->re}.{$db->le}asset_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}asset_business{$db->re}.{$db->le}asset_business_type_id{$db->re}=" . $db->queryValue(AssetBusiness::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}asset_business{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["entity_id"];
		}
		
		return new Collection($ids);
	}

	public function setOffice($office=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeOfficeList($type);
		$this->addOffice($office, $type);
		return $this;
	}
	public function removeOffice($office, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($office) ? $office : array($office);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getAssetOffice($id, $type);
			if ($deleteObject) {
				$relationship->getOffice()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeOfficeList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return AssetOffice::deleteAll($this->id, null, $type);
		}
	}
	public function addOffice($office=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($office)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($office) ? $office : array($office);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getAssetOffice($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getOffice($type="default") {
		if (isset($this->_cache["Office"]) && isset($this->_cache["Office"][$type])) {
			$office = $this->_cache["Office"][$type];
		} else {
			$office = new Office($this->getOfficeId($type));
		}
		$this->_cache["Office"][$type] = $office;
		return $this->_cache["Office"][$type];
	}
	public function getOfficeList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getOfficeIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Office::objects($order, "{$db->le}office{$db->le}.{$db->re}entity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getOfficeId($type="default") {
		return $this->getOfficeIds($type)->get(0);
	}
	public function getOfficeIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}office{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}office{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}office{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}office{$db->re}.{$db->le}entity_id{$db->re} ",
			"FROM {$db->le}office{$db->re} ",
			"INNER JOIN {$db->le}asset_office{$db->re} ON {$db->le}asset_office{$db->re}.{$db->le}office_entity_id{$db->re}={$db->le}office{$db->re}.{$db->le}entity_id{$db->re} ",
			"	AND {$db->le}asset_office{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}office{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset_office{$db->re}.{$db->le}asset_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}asset_office{$db->re}.{$db->le}asset_office_type_id{$db->re}=" . $db->queryValue(AssetOffice::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}asset_office{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["entity_id"];
		}
		
		return new Collection($ids);
	}

	public function setPerson($person=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removePersonList($type);
		$this->addPerson($person, $type);
		return $this;
	}
	public function removePerson($person, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($person) ? $person : array($person);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getAssetPerson($id, $type);
			if ($deleteObject) {
				$relationship->getPerson()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removePersonList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return AssetPerson::deleteAll($this->id, null, $type);
		}
	}
	public function addPerson($person=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($person)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($person) ? $person : array($person);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getAssetPerson($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getPerson($type="default") {
		if (isset($this->_cache["Person"]) && isset($this->_cache["Person"][$type])) {
			$person = $this->_cache["Person"][$type];
		} else {
			$person = new Person($this->getPersonId($type));
		}
		$this->_cache["Person"][$type] = $person;
		return $this->_cache["Person"][$type];
	}
	public function getPersonList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getPersonIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Person::objects($order, "{$db->le}person{$db->le}.{$db->re}entity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getPersonId($type="default") {
		return $this->getPersonIds($type)->get(0);
	}
	public function getPersonIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}person{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}person{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}person{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}person{$db->re}.{$db->le}entity_id{$db->re} ",
			"FROM {$db->le}person{$db->re} ",
			"INNER JOIN {$db->le}asset_person{$db->re} ON {$db->le}asset_person{$db->re}.{$db->le}person_entity_id{$db->re}={$db->le}person{$db->re}.{$db->le}entity_id{$db->re} ",
			"	AND {$db->le}asset_person{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}person{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset_person{$db->re}.{$db->le}asset_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}asset_person{$db->re}.{$db->le}asset_person_type_id{$db->re}=" . $db->queryValue(AssetPerson::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}asset_person{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["entity_id"];
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
			$relationship = $this->getAssetResource($id, $type);
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
			return AssetResource::deleteAll($this->id, null, $type);
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
				$relationship = $this->getAssetResource($id, $type);
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
			"INNER JOIN {$db->le}asset_resource{$db->re} ON {$db->le}asset_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->le}resource{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}asset_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset_resource{$db->re}.{$db->le}asset_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}asset_resource{$db->re}.{$db->le}asset_resource_type_id{$db->re}=" . $db->queryValue(AssetResource::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}asset_resource{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setUrl($url=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeUrlList($type);
		$url = is_object($url) || is_int($url) ? $url : $this->getUrl($type, true)->setValue($url);
		$this->addUrl($url, $type);
		return $this;
	}
	public function removeUrl($url, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($url) ? $url : array($url);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getAssetUrl($id, $type);
			if ($deleteObject) {
				$relationship->getUrl()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeUrlList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return AssetUrl::deleteAll($this->id, null, $type);
		}
	}
	public function addUrl($url=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($url)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($url) ? $url : array($url);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getAssetUrl($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getUrl($type="default", $getAsObject=false) {
		if (isset($this->_cache["Url"]) && isset($this->_cache["Url"][$type])) {
			$url = $this->_cache["Url"][$type];
		} else {
			$url = new Url($this->getUrlId($type));
		}
		$this->_cache["Url"][$type] = $url;
		return $getAsObject ? $this->_cache["Url"][$type] : $this->_cache["Url"][$type]->value;
	}
	public function getUrlList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getUrlIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Url::objects($order, "{$db->le}url{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getUrlId($type="default") {
		return $this->getUrlIds($type)->get(0);
	}
	public function getUrlIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}url{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}url{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}url{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}url{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}url{$db->re} ",
			"INNER JOIN {$db->le}asset_url{$db->re} ON {$db->le}asset_url{$db->re}.{$db->le}url_id{$db->re}={$db->le}url{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}asset_url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset_url{$db->re}.{$db->le}asset_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}asset_url{$db->re}.{$db->le}asset_url_type_id{$db->re}=" . $db->queryValue(AssetUrl::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}asset_url{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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