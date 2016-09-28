<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the saleitem table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the saleitem
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called SaleitemExtension, and should extend the SaleitemTable
 * class.  The custom code file should be in the helix/modules/Commerce folder
 * and should be called SaleitemExtension.php
 * 
 * Object -> Saleitem
 */
class SaleitemTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $name;
	public $description;
	public $unitPrice;
	public $unitId;
	public $saleitemTypeId;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = null;
		$this->description = null;
		$this->unitPrice = null;
		$this->unitId = null;
		$this->saleitemTypeId = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}saleitem{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}saleitem{$db->re}.{$db->le}id{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}name{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}description{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}unit_price{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}unit_id{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}saleitem_type_id{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}mdate{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}cdate{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}saleitem{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->description = $db->record["description"];
				$this->unitPrice = $db->record["unit_price"];
				$this->unitId = $db->record["unit_id"];
				$this->saleitemTypeId = $db->record["saleitem_type_id"];
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
		$this->_initial["unitPrice"] = $this->unitPrice;
		$this->_initial["unitId"] = $this->unitId;
		$this->_initial["saleitemTypeId"] = $this->saleitemTypeId;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Saleitem();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}saleitem{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}saleitem{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}saleitem{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}saleitem{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}saleitem{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}fdate{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}tdate{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}id{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}name{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}description{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}unit_price{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}unit_id{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}saleitem_type_id{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}mdate{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}cdate{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}saleitem{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}saleitem{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->description = $db->record["description"];
				$object->unitPrice = $db->record["unit_price"];
				$object->unitId = $db->record["unit_id"];
				$object->saleitemTypeId = $db->record["saleitem_type_id"];
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
		$isDirty = $isDirty || ((float)$this->unitPrice !== (float)$this->_initial["unitPrice"]);
		$isDirty = $isDirty || ((int)$this->unitId !== (int)$this->_initial["unitId"]);
		$isDirty = $isDirty || ((int)$this->saleitemTypeId !== (int)$this->_initial["saleitemTypeId"]);
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
			"INSERT INTO {$db->le}saleitem{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}description{$db->re}, {$db->le}unit_price{$db->re}, {$db->le}unit_id{$db->re}, {$db->le}saleitem_type_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue($this->unitPrice) . ",",
				$db->queryValue(is_null($this->unitId)?null:(int)$this->unitId) . ",",
				$db->queryValue(is_null($this->saleitemTypeId)?null:(int)$this->saleitemTypeId) . ",",
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
				"UPDATE {$db->le}saleitem{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}unit_price{$db->re}={$db->queryValue($this->unitPrice)},",
					"{$db->le}unit_id{$db->re}={$db->queryValue(is_null($this->unitId)?null:(int)$this->unitId)},",
					"{$db->le}saleitem_type_id{$db->re}={$db->queryValue(is_null($this->saleitemTypeId)?null:(int)$this->saleitemTypeId)},",
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
		$record = Saleitem::select($db->encapsulate("saleitem") . ".mdate as fdate,null as tdate,{$db->encapsulate("saleitem")}.*",null,$db->encapsulate("saleitem").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}saleitem{$dbLog->re} (",
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
				"FROM {$dbLog->le}saleitem{$dbLog->re}",
				"WHERE {$dbLog->le}saleitem{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}saleitem{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("saleitem") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("saleitem") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}saleitem{$db->le}",
			"LEFT JOIN {$db->le}unit{$db->re} ON {$db->le}saleitem{$db->re}.{$db->le}unit_id{$db->re}={$db->le}unit{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}saleitem_type{$db->re} ON {$db->le}saleitem{$db->re}.{$db->le}saleitem_type_id{$db->re}={$db->le}saleitem_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}saleitem{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Saleitem::select("{$db->le}saleitem{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Saleitem::select("{$db->le}saleitem{$db->re}.{$db->le}id{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}name{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}description{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}unit_price{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}unit_id{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}saleitem_type_id{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}mdate{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}cdate{$db->re}, {$db->le}saleitem{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Saleitem();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->description = $record["description"];
				$object->unitPrice = $record["unit_price"];
				$object->unitId = $record["unit_id"];
				$object->saleitemTypeId = $record["saleitem_type_id"];
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
			$clauses[] = "saleitem.name LIKE '%{$keyword}%' OR saleitem.description LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Saleitem::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Saleitem Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new SaleitemType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new SaleitemType($this->saleitemTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new SaleitemType(null, $type);
		$this->saleitemTypeId = $type->id;
		return $this->saleitemTypeId;
	}

	public function getCategorySaleitem($categoryId, $type="default") {
		return new CategorySaleitem(null, $categoryId, $this->id, CategorySaleitem::typeId($type));
	}

	public function getOrderSaleitem($orderId, $type="default") {
		return new OrderSaleitem(null, $orderId, $this->id, OrderSaleitem::typeId($type));
	}

	public function getResourceSaleitem($resourceId, $type="default") {
		return new ResourceSaleitem(null, $resourceId, $this->id, ResourceSaleitem::typeId($type));
	}

	public function getSaleitemTax($taxId, $type="default") {
		return new SaleitemTax(null, $this->id, $taxId, SaleitemTax::typeId($type));
	}

	public function getUnit() {
		return new Unit($this->unitId);
	}

	public function setUnit(Unit $unit) {
		if ($unit->id>0) {
			$this->unitId = $unit->id;
		}
	}

	public function getSaleitemType() {
		return new SaleitemType($this->saleitemTypeId);
	}

	public function setSaleitemType(SaleitemType $saleitemType) {
		if ($saleitemType->id>0) {
			$this->saleitemTypeId = $saleitemType->id;
		}
	}

	public function setCategory($category=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeCategoryList($type);
		$this->addCategory($category, $type);
		return $this;
	}
	public function removeCategory($category, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($category) ? $category : array($category);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getCategorySaleitem($id, $type);
			if ($deleteObject) {
				$relationship->getCategory()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeCategoryList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return CategorySaleitem::deleteAll(null, $this->id, $type);
		}
	}
	public function addCategory($category=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($category)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($category) ? $category : array($category);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getCategorySaleitem($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getCategory($type="default") {
		if (isset($this->_cache["Category"]) && isset($this->_cache["Category"][$type])) {
			$category = $this->_cache["Category"][$type];
		} else {
			$category = new Category($this->getCategoryId($type));
		}
		$this->_cache["Category"][$type] = $category;
		return $this->_cache["Category"][$type];
	}
	public function getCategoryList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getCategoryIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Category::objects($order, "{$db->le}category{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getCategoryId($type="default") {
		return $this->getCategoryIds($type)->get(0);
	}
	public function getCategoryIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}category{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}category{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}category{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}category{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}category{$db->re} ",
			"INNER JOIN {$db->le}category_saleitem{$db->re} ON {$db->le}category_saleitem{$db->re}.{$db->le}category_id{$db->re}={$db->le}category{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}category_saleitem{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}category{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}category_saleitem{$db->re}.{$db->le}saleitem_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}category_saleitem{$db->re}.{$db->le}category_saleitem_type_id{$db->re}=" . $db->queryValue(CategorySaleitem::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}category_saleitem{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setOrder($order=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeOrderList($type);
		$this->addOrder($order, $type);
		return $this;
	}
	public function removeOrder($order, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($order) ? $order : array($order);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getOrderSaleitem($id, $type);
			if ($deleteObject) {
				$relationship->getOrder()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeOrderList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return OrderSaleitem::deleteAll(null, $this->id, $type);
		}
	}
	public function addOrder($order=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($order)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($order) ? $order : array($order);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getOrderSaleitem($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getOrder($type="default") {
		if (isset($this->_cache["Order"]) && isset($this->_cache["Order"][$type])) {
			$order = $this->_cache["Order"][$type];
		} else {
			$order = new Order($this->getOrderId($type));
		}
		$this->_cache["Order"][$type] = $order;
		return $this->_cache["Order"][$type];
	}
	public function getOrderList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getOrderIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Order::objects($order, "{$db->le}order{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getOrderId($type="default") {
		return $this->getOrderIds($type)->get(0);
	}
	public function getOrderIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}order{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}order{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}order{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}order{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}order{$db->re} ",
			"INNER JOIN {$db->le}order_saleitem{$db->re} ON {$db->le}order_saleitem{$db->re}.{$db->le}order_id{$db->re}={$db->le}order{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}order_saleitem{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}order{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}order_saleitem{$db->re}.{$db->le}saleitem_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}order_saleitem{$db->re}.{$db->le}order_saleitem_type_id{$db->re}=" . $db->queryValue(OrderSaleitem::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}order_saleitem{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getResourceSaleitem($id, $type);
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
			return ResourceSaleitem::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getResourceSaleitem($id, $type);
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
			"INNER JOIN {$db->le}resource_saleitem{$db->re} ON {$db->le}resource_saleitem{$db->re}.{$db->le}resource_id{$db->re}={$db->le}resource{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}resource_saleitem{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}resource_saleitem{$db->re}.{$db->le}saleitem_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}resource_saleitem{$db->re}.{$db->le}resource_saleitem_type_id{$db->re}=" . $db->queryValue(ResourceSaleitem::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}resource_saleitem{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setTax($tax=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeTaxList($type);
		$this->addTax($tax, $type);
		return $this;
	}
	public function removeTax($tax, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($tax) ? $tax : array($tax);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getSaleitemTax($id, $type);
			if ($deleteObject) {
				$relationship->getTax()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeTaxList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return SaleitemTax::deleteAll($this->id, null, $type);
		}
	}
	public function addTax($tax=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($tax)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($tax) ? $tax : array($tax);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getSaleitemTax($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getTax($type="default") {
		if (isset($this->_cache["Tax"]) && isset($this->_cache["Tax"][$type])) {
			$tax = $this->_cache["Tax"][$type];
		} else {
			$tax = new Tax($this->getTaxId($type));
		}
		$this->_cache["Tax"][$type] = $tax;
		return $this->_cache["Tax"][$type];
	}
	public function getTaxList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getTaxIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Tax::objects($order, "{$db->le}tax{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getTaxId($type="default") {
		return $this->getTaxIds($type)->get(0);
	}
	public function getTaxIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}tax{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}tax{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}tax{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}tax{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}tax{$db->re} ",
			"INNER JOIN {$db->le}saleitem_tax{$db->re} ON {$db->le}saleitem_tax{$db->re}.{$db->le}tax_id{$db->re}={$db->le}tax{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}saleitem_tax{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}tax{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}saleitem_tax{$db->re}.{$db->le}saleitem_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}saleitem_tax{$db->re}.{$db->le}saleitem_tax_type_id{$db->re}=" . $db->queryValue(SaleitemTax::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}saleitem_tax{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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