<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the payment table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the payment
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called PaymentExtension, and should extend the PaymentTable
 * class.  The custom code file should be in the helix/modules/Commerce folder
 * and should be called PaymentExtension.php
 * 
 * Object -> Payment
 */
class PaymentTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $amount;
	public $description;
	public $paymentTypeId;
	public $paymentmethodId;
	public $paymentstatusId;
	public $processResponse;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->amount = null;
		$this->description = null;
		$this->paymentTypeId = null;
		$this->paymentmethodId = null;
		$this->paymentstatusId = null;
		$this->processResponse = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}payment{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}payment{$db->re}.{$db->le}id{$db->re}, {$db->le}payment{$db->re}.{$db->le}amount{$db->re}, {$db->le}payment{$db->re}.{$db->le}description{$db->re}, {$db->le}payment{$db->re}.{$db->le}payment_type_id{$db->re}, {$db->le}payment{$db->re}.{$db->le}paymentmethod_id{$db->re}, {$db->le}payment{$db->re}.{$db->le}paymentstatus_id{$db->re}, {$db->le}payment{$db->re}.{$db->le}process_response{$db->re}, {$db->le}payment{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}payment{$db->re}.{$db->le}mdate{$db->re}, {$db->le}payment{$db->re}.{$db->le}cdate{$db->re}, {$db->le}payment{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}payment{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->amount = $db->record["amount"];
				$this->description = $db->record["description"];
				$this->paymentTypeId = $db->record["payment_type_id"];
				$this->paymentmethodId = $db->record["paymentmethod_id"];
				$this->paymentstatusId = $db->record["paymentstatus_id"];
				$this->processResponse = $db->record["process_response"];
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["amount"] = $this->amount;
		$this->_initial["description"] = $this->description;
		$this->_initial["paymentTypeId"] = $this->paymentTypeId;
		$this->_initial["paymentmethodId"] = $this->paymentmethodId;
		$this->_initial["paymentstatusId"] = $this->paymentstatusId;
		$this->_initial["processResponse"] = $this->processResponse;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Payment();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}payment{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}payment{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}payment{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}payment{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}payment{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}payment{$db->re}.{$db->le}fdate{$db->re}, {$db->le}payment{$db->re}.{$db->le}tdate{$db->re}, {$db->le}payment{$db->re}.{$db->le}id{$db->re}, {$db->le}payment{$db->re}.{$db->le}amount{$db->re}, {$db->le}payment{$db->re}.{$db->le}description{$db->re}, {$db->le}payment{$db->re}.{$db->le}payment_type_id{$db->re}, {$db->le}payment{$db->re}.{$db->le}paymentmethod_id{$db->re}, {$db->le}payment{$db->re}.{$db->le}paymentstatus_id{$db->re}, {$db->le}payment{$db->re}.{$db->le}process_response{$db->re}, {$db->le}payment{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}payment{$db->re}.{$db->le}mdate{$db->re}, {$db->le}payment{$db->re}.{$db->le}cdate{$db->re}, {$db->le}payment{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}payment{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}payment{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->amount = $db->record["amount"];
				$object->description = $db->record["description"];
				$object->paymentTypeId = $db->record["payment_type_id"];
				$object->paymentmethodId = $db->record["paymentmethod_id"];
				$object->paymentstatusId = $db->record["paymentstatus_id"];
				$object->processResponse = $db->record["process_response"];
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
		$isDirty = $isDirty || ((float)$this->amount !== (float)$this->_initial["amount"]);
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
		$isDirty = $isDirty || ((int)$this->paymentTypeId !== (int)$this->_initial["paymentTypeId"]);
		$isDirty = $isDirty || ((int)$this->paymentmethodId !== (int)$this->_initial["paymentmethodId"]);
		$isDirty = $isDirty || ((int)$this->paymentstatusId !== (int)$this->_initial["paymentstatusId"]);
		$isDirty = $isDirty || ((string)$this->processResponse !== (string)$this->_initial["processResponse"]);
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
			"INSERT INTO {$db->le}payment{$db->re} (",
			"	{$db->le}amount{$db->re}, {$db->le}description{$db->re}, {$db->le}payment_type_id{$db->re}, {$db->le}paymentmethod_id{$db->re}, {$db->le}paymentstatus_id{$db->re}, {$db->le}process_response{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->amount) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue(is_null($this->paymentTypeId)?null:(int)$this->paymentTypeId) . ",",
				$db->queryValue(is_null($this->paymentmethodId)?null:(int)$this->paymentmethodId) . ",",
				$db->queryValue(is_null($this->paymentstatusId)?null:(int)$this->paymentstatusId) . ",",
				$db->queryValue($this->processResponse) . ",",
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
				"UPDATE {$db->le}payment{$db->re} SET",
					"{$db->le}amount{$db->re}={$db->queryValue($this->amount)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}payment_type_id{$db->re}={$db->queryValue(is_null($this->paymentTypeId)?null:(int)$this->paymentTypeId)},",
					"{$db->le}paymentmethod_id{$db->re}={$db->queryValue(is_null($this->paymentmethodId)?null:(int)$this->paymentmethodId)},",
					"{$db->le}paymentstatus_id{$db->re}={$db->queryValue(is_null($this->paymentstatusId)?null:(int)$this->paymentstatusId)},",
					"{$db->le}process_response{$db->re}={$db->queryValue($this->processResponse)},",
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
		$record = Payment::select($db->encapsulate("payment") . ".mdate as fdate,null as tdate,{$db->encapsulate("payment")}.*",null,$db->encapsulate("payment").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}payment{$dbLog->re} (",
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
				"FROM {$dbLog->le}payment{$dbLog->re}",
				"WHERE {$dbLog->le}payment{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}payment{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("payment") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("payment") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}payment{$db->le}",
			"LEFT JOIN {$db->le}payment_type{$db->re} ON {$db->le}payment{$db->re}.{$db->le}payment_type_id{$db->re}={$db->le}payment_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}paymentmethod{$db->re} ON {$db->le}payment{$db->re}.{$db->le}paymentmethod_id{$db->re}={$db->le}paymentmethod{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}paymentstatus{$db->re} ON {$db->le}payment{$db->re}.{$db->le}paymentstatus_id{$db->re}={$db->le}paymentstatus{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}payment{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Payment::select("{$db->le}payment{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Payment::select("{$db->le}payment{$db->re}.{$db->le}id{$db->re}, {$db->le}payment{$db->re}.{$db->le}amount{$db->re}, {$db->le}payment{$db->re}.{$db->le}description{$db->re}, {$db->le}payment{$db->re}.{$db->le}payment_type_id{$db->re}, {$db->le}payment{$db->re}.{$db->le}paymentmethod_id{$db->re}, {$db->le}payment{$db->re}.{$db->le}paymentstatus_id{$db->re}, {$db->le}payment{$db->re}.{$db->le}process_response{$db->re}, {$db->le}payment{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}payment{$db->re}.{$db->le}mdate{$db->re}, {$db->le}payment{$db->re}.{$db->le}cdate{$db->re}, {$db->le}payment{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Payment();
				$object->id = $record["id"];
				$object->amount = $record["amount"];
				$object->description = $record["description"];
				$object->paymentTypeId = $record["payment_type_id"];
				$object->paymentmethodId = $record["paymentmethod_id"];
				$object->paymentstatusId = $record["paymentstatus_id"];
				$object->processResponse = $record["process_response"];
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
			$clauses[] = "payment.description LIKE '%{$keyword}%' OR payment.process_response LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Payment::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Payment Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new PaymentType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new PaymentType($this->paymentTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new PaymentType(null, $type);
		$this->paymentTypeId = $type->id;
		return $this->paymentTypeId;
	}

	public function getEntityPayment($entityId, $type="default") {
		return new EntityPayment(null, $entityId, $this->id, EntityPayment::typeId($type));
	}

	public function getOrderPayment($orderId, $type="default") {
		return new OrderPayment(null, $orderId, $this->id, OrderPayment::typeId($type));
	}

	public function getPaymentPaymentaccount($paymentaccountId, $type="default") {
		return new PaymentPaymentaccount(null, $this->id, $paymentaccountId, PaymentPaymentaccount::typeId($type));
	}

	public function getPaymentType() {
		return new PaymentType($this->paymentTypeId);
	}

	public function setPaymentType(PaymentType $paymentType) {
		if ($paymentType->id>0) {
			$this->paymentTypeId = $paymentType->id;
		}
	}

	public function getPaymentmethod() {
		return new Paymentmethod($this->paymentmethodId);
	}

	public function setPaymentmethod(Paymentmethod $paymentmethod) {
		if ($paymentmethod->id>0) {
			$this->paymentmethodId = $paymentmethod->id;
		}
	}

	public function getPaymentstatus() {
		return new Paymentstatus($this->paymentstatusId);
	}

	public function setPaymentstatus(Paymentstatus $paymentstatus) {
		if ($paymentstatus->id>0) {
			$this->paymentstatusId = $paymentstatus->id;
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
			$relationship = $this->getEntityPayment($id, $type);
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
			return EntityPayment::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getEntityPayment($id, $type);
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
			"INNER JOIN {$db->le}entity_payment{$db->re} ON {$db->le}entity_payment{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_payment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_payment{$db->re}.{$db->le}payment_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_payment{$db->re}.{$db->le}entity_payment_type_id{$db->re}=" . $db->queryValue(EntityPayment::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_payment{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getOrderPayment($id, $type);
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
			return OrderPayment::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getOrderPayment($id, $type);
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
			"INNER JOIN {$db->le}order_payment{$db->re} ON {$db->le}order_payment{$db->re}.{$db->le}order_id{$db->re}={$db->le}order{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}order_payment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}order{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}order_payment{$db->re}.{$db->le}payment_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}order_payment{$db->re}.{$db->le}order_payment_type_id{$db->re}=" . $db->queryValue(OrderPayment::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}order_payment{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setPaymentaccount($paymentaccount=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removePaymentaccountList($type);
		$this->addPaymentaccount($paymentaccount, $type);
		return $this;
	}
	public function removePaymentaccount($paymentaccount, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($paymentaccount) ? $paymentaccount : array($paymentaccount);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getPaymentPaymentaccount($id, $type);
			if ($deleteObject) {
				$relationship->getPaymentaccount()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removePaymentaccountList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return PaymentPaymentaccount::deleteAll($this->id, null, $type);
		}
	}
	public function addPaymentaccount($paymentaccount=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($paymentaccount)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($paymentaccount) ? $paymentaccount : array($paymentaccount);
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
	public function getPaymentaccount($type="default") {
		if (isset($this->_cache["Paymentaccount"]) && isset($this->_cache["Paymentaccount"][$type])) {
			$paymentaccount = $this->_cache["Paymentaccount"][$type];
		} else {
			$paymentaccount = new Paymentaccount($this->getPaymentaccountId($type));
		}
		$this->_cache["Paymentaccount"][$type] = $paymentaccount;
		return $this->_cache["Paymentaccount"][$type];
	}
	public function getPaymentaccountList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getPaymentaccountIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Paymentaccount::objects($order, "{$db->le}paymentaccount{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getPaymentaccountId($type="default") {
		return $this->getPaymentaccountIds($type)->get(0);
	}
	public function getPaymentaccountIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}paymentaccount{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}paymentaccount{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}paymentaccount{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}paymentaccount{$db->re} ",
			"INNER JOIN {$db->le}payment_paymentaccount{$db->re} ON {$db->le}payment_paymentaccount{$db->re}.{$db->le}paymentaccount_id{$db->re}={$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}payment_paymentaccount{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}paymentaccount{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}payment_paymentaccount{$db->re}.{$db->le}payment_id{$db->re}={$db->queryValue($this->id)} ",
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