<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the paymentaccount table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the paymentaccount
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called PaymentaccountExtension, and should extend the PaymentaccountTable
 * class.  The custom code file should be in the helix/modules/Commerce folder
 * and should be called PaymentaccountExtension.php
 * 
 * Object -> Paymentaccount
 */
class PaymentaccountTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $name;
	public $description;
	public $paymentaccountTypeId;
	public $accountNumber;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = null;
		$this->description = null;
		$this->paymentaccountTypeId = null;
		$this->accountNumber = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}name{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}description{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}paymentaccount_type_id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}account_number{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}mdate{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}cdate{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}paymentaccount{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->description = $db->record["description"];
				$this->paymentaccountTypeId = $db->record["paymentaccount_type_id"];
				$this->accountNumber = $db->record["account_number"];
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
		$this->_initial["paymentaccountTypeId"] = $this->paymentaccountTypeId;
		$this->_initial["accountNumber"] = $this->accountNumber;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Paymentaccount();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}paymentaccount{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}paymentaccount{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}paymentaccount{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}paymentaccount{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}fdate{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}tdate{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}name{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}description{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}paymentaccount_type_id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}account_number{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}mdate{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}cdate{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}paymentaccount{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}paymentaccount{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->description = $db->record["description"];
				$object->paymentaccountTypeId = $db->record["paymentaccount_type_id"];
				$object->accountNumber = $db->record["account_number"];
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
		$isDirty = $isDirty || ((int)$this->paymentaccountTypeId !== (int)$this->_initial["paymentaccountTypeId"]);
		$isDirty = $isDirty || ((string)$this->accountNumber !== (string)$this->_initial["accountNumber"]);
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
			"INSERT INTO {$db->le}paymentaccount{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}description{$db->re}, {$db->le}paymentaccount_type_id{$db->re}, {$db->le}account_number{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue(is_null($this->paymentaccountTypeId)?null:(int)$this->paymentaccountTypeId) . ",",
				$db->queryValue($this->accountNumber) . ",",
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
				"UPDATE {$db->le}paymentaccount{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}paymentaccount_type_id{$db->re}={$db->queryValue(is_null($this->paymentaccountTypeId)?null:(int)$this->paymentaccountTypeId)},",
					"{$db->le}account_number{$db->re}={$db->queryValue($this->accountNumber)},",
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
		$record = Paymentaccount::select($db->encapsulate("paymentaccount") . ".mdate as fdate,null as tdate,{$db->encapsulate("paymentaccount")}.*",null,$db->encapsulate("paymentaccount").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}paymentaccount{$dbLog->re} (",
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
				"FROM {$dbLog->le}paymentaccount{$dbLog->re}",
				"WHERE {$dbLog->le}paymentaccount{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}paymentaccount{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("paymentaccount") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("paymentaccount") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}paymentaccount{$db->le}",
			"LEFT JOIN {$db->le}paymentaccount_type{$db->re} ON {$db->le}paymentaccount{$db->re}.{$db->le}paymentaccount_type_id{$db->re}={$db->le}paymentaccount_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}paymentaccount{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Paymentaccount::select("{$db->le}paymentaccount{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Paymentaccount::select("{$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}name{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}description{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}paymentaccount_type_id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}account_number{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}mdate{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}cdate{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Paymentaccount();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->description = $record["description"];
				$object->paymentaccountTypeId = $record["paymentaccount_type_id"];
				$object->accountNumber = $record["account_number"];
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
			$clauses[] = "paymentaccount.name LIKE '%{$keyword}%' OR paymentaccount.description LIKE '%{$keyword}%' OR paymentaccount.account_number LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Paymentaccount::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Paymentaccount Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new PaymentaccountType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new PaymentaccountType($this->paymentaccountTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new PaymentaccountType(null, $type);
		$this->paymentaccountTypeId = $type->id;
		return $this->paymentaccountTypeId;
	}

	public function getEntityPaymentaccount($entityId, $type="default") {
		return new EntityPaymentaccount(null, $entityId, $this->id, EntityPaymentaccount::typeId($type));
	}

	public function getPaymentPaymentaccount($paymentId, $type="default") {
		return new PaymentPaymentaccount(null, $paymentId, $this->id, PaymentPaymentaccount::typeId($type));
	}

	public function getPaymentaccountType() {
		return new PaymentaccountType($this->paymentaccountTypeId);
	}

	public function setPaymentaccountType(PaymentaccountType $paymentaccountType) {
		if ($paymentaccountType->id>0) {
			$this->paymentaccountTypeId = $paymentaccountType->id;
		}
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
			$relationship = $this->getEntityPaymentaccount($id, $type);
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
			return EntityPaymentaccount::deleteAll($this->id, null, $type);
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
				$relationship = $this->getEntityPaymentaccount($id, $type);
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
			"INNER JOIN {$db->le}entity_paymentaccount{$db->re} ON {$db->le}entity_paymentaccount{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_paymentaccount{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_paymentaccount{$db->re}.{$db->le}paymentaccount_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_paymentaccount{$db->re}.{$db->le}entity_paymentaccount_type_id{$db->re}=" . $db->queryValue(EntityPaymentaccount::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_paymentaccount{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setPayment($payment=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removePaymentList($type);
		$this->addPayment($payment, $type);
		return $this;
	}
	public function removePayment($payment, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($payment) ? $payment : array($payment);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getPaymentPaymentaccount($id, $type);
			if ($deleteObject) {
				$relationship->getPayment()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removePaymentList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return PaymentPaymentaccount::deleteAll(null, $this->id, $type);
		}
	}
	public function addPayment($payment=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($payment)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($payment) ? $payment : array($payment);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getPaymentPaymentaccount($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getPayment($type="default") {
		if (isset($this->_cache["Payment"]) && isset($this->_cache["Payment"][$type])) {
			$payment = $this->_cache["Payment"][$type];
		} else {
			$payment = new Payment($this->getPaymentId($type));
		}
		$this->_cache["Payment"][$type] = $payment;
		return $this->_cache["Payment"][$type];
	}
	public function getPaymentList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getPaymentIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Payment::objects($order, "{$db->le}payment{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getPaymentId($type="default") {
		return $this->getPaymentIds($type)->get(0);
	}
	public function getPaymentIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}payment{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}payment{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}payment{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}payment{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}payment{$db->re} ",
			"INNER JOIN {$db->le}payment_paymentaccount{$db->re} ON {$db->le}payment_paymentaccount{$db->re}.{$db->le}payment_id{$db->re}={$db->le}payment{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}payment_paymentaccount{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}payment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}payment_paymentaccount{$db->re}.{$db->le}paymentaccount_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}payment_paymentaccount{$db->re}.{$db->le}payment_paymentaccount_type_id{$db->re}=" . $db->queryValue(PaymentPaymentaccount::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}payment_paymentaccount{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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