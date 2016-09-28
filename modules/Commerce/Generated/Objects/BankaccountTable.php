<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the bankaccount table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the bankaccount
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called BankaccountExtension, and should extend the BankaccountTable
 * class.  The custom code file should be in the helix/modules/Commerce folder
 * and should be called BankaccountExtension.php
 * 
 * Object -> Paymentaccount -> Bankaccount
 */
class BankaccountTable extends Paymentaccount {
	public $logSequence;
	public $fdate;
	public $tdate;

	public $routingNumber;
	public $bankaccountTypeId;
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
		$this->routingNumber = null;
		$this->bankaccountTypeId = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}bankaccount{$db->re}.{$db->le}paymentaccount_id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}name{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}description{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}paymentaccount_type_id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}account_number{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}routing_number{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}bankaccount_type_id{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}mdate{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}cdate{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}bankaccount{$db->re}",
			"INNER JOIN {$db->le}paymentaccount{$db->re} ON {$db->le}bankaccount{$db->re}.{$db->le}paymentaccount_id{$db->re}={$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->description = $db->record["description"];
				$this->paymentaccountTypeId = $db->record["paymentaccount_type_id"];
				$this->accountNumber = $db->record["account_number"];
				$this->routingNumber = $db->record["routing_number"];
				$this->bankaccountTypeId = $db->record["bankaccount_type_id"];
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
		$this->_initial["routingNumber"] = $this->routingNumber;
		$this->_initial["bankaccountTypeId"] = $this->bankaccountTypeId;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Bankaccount();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}bankaccount{$db->re}.{$db->le}paymentaccount_id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}bankaccount{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}bankaccount{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}bankaccount{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}paymentaccount{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}paymentaccount{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}paymentaccount{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}bankaccount{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}fdate{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}tdate{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}name{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}description{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}paymentaccount_type_id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}account_number{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}routing_number{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}bankaccount_type_id{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}mdate{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}cdate{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}bankaccount{$db->re}",
			"INNER JOIN {$db->le}paymentaccount{$db->re} ON {$db->le}bankaccount{$db->re}.{$db->le}paymentaccount_id{$db->re}={$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$query .= "ORDER BY {$db->le}bankaccount{$db->re}.log_sequence desc limit 1";
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
				$object->routingNumber = $db->record["routing_number"];
				$object->bankaccountTypeId = $db->record["bankaccount_type_id"];
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
		$isDirty = $isDirty || ((string)$this->routingNumber !== (string)$this->_initial["routingNumber"]);
		$isDirty = $isDirty || ((int)$this->bankaccountTypeId !== (int)$this->_initial["bankaccountTypeId"]);
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
			"INSERT INTO {$db->le}bankaccount{$db->re} (",
			"	{$db->le}paymentaccount_id{$db->re}, {$db->le}routing_number{$db->re}, {$db->le}bankaccount_type_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->id)?null:(int)$this->id) . ",",
				$db->queryValue($this->routingNumber) . ",",
				$db->queryValue(is_null($this->bankaccountTypeId)?null:(int)$this->bankaccountTypeId) . ",",
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
				"UPDATE {$db->le}bankaccount{$db->re} SET",
					"{$db->le}routing_number{$db->re}={$db->queryValue($this->routingNumber)},",
					"{$db->le}bankaccount_type_id{$db->re}={$db->queryValue(is_null($this->bankaccountTypeId)?null:(int)$this->bankaccountTypeId)},",
					"{$db->le}updated_by_id{$db->re}={$db->queryValue((int)$session->getUserId())},",
					"{$db->le}mdate{$db->re}={$db->queryValue(timestamp())},",
					"{$db->le}deleted{$db->re}={$db->queryValue(is_null($this->deleted)?null:(int)$this->deleted)}",
				"WHERE paymentaccount_id={$db->queryValue((int)$this->id)}"
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
		$record = Bankaccount::select($db->encapsulate("bankaccount") . ".mdate as fdate,null as tdate,{$db->encapsulate("bankaccount")}.*",null,$db->encapsulate("bankaccount").".paymentaccount_id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}bankaccount{$dbLog->re} (",
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
				"FROM {$dbLog->le}bankaccount{$dbLog->re}",
				"WHERE {$dbLog->le}bankaccount{$dbLog->re}.{$dbLog->le}paymentaccount_id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}bankaccount{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("bankaccount") . " WHERE paymentaccount_id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("bankaccount") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}bankaccount{$db->le}",
			"INNER JOIN {$db->le}paymentaccount{$db->re} ON {$db->le}bankaccount{$db->re}.{$db->le}paymentaccount_id{$db->re}={$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}bankaccount_type{$db->re} ON {$db->le}bankaccount{$db->re}.{$db->le}bankaccount_type_id{$db->re}={$db->le}bankaccount_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}paymentaccount_type{$db->re} ON {$db->le}paymentaccount{$db->re}.{$db->le}paymentaccount_type_id{$db->re}={$db->le}paymentaccount_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}bankaccount{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Bankaccount::select("{$db->le}bankaccount{$db->le}.paymentaccount_id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Bankaccount::select("{$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}name{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}description{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}paymentaccount_type_id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}account_number{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}routing_number{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}bankaccount_type_id{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}mdate{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}cdate{$db->re}, {$db->le}bankaccount{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Bankaccount();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->description = $record["description"];
				$object->paymentaccountTypeId = $record["paymentaccount_type_id"];
				$object->accountNumber = $record["account_number"];
				$object->routingNumber = $record["routing_number"];
				$object->bankaccountTypeId = $record["bankaccount_type_id"];
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
			$clauses[] = "paymentaccount.name LIKE '%{$keyword}%' OR paymentaccount.description LIKE '%{$keyword}%' OR paymentaccount.account_number LIKE '%{$keyword}%' OR bankaccount.routing_number LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Bankaccount::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Bankaccount Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new BankaccountType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new BankaccountType($this->bankaccountTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new BankaccountType(null, $type);
		$this->bankaccountTypeId = $type->id;
		return $this->bankaccountTypeId;
	}

	public function getAchBankaccount($achId, $type="default") {
		return new AchBankaccount(null, $achId, $this->id, AchBankaccount::typeId($type));
	}

	public function getBankaccountCheck($checkId, $type="default") {
		return new BankaccountCheck(null, $this->id, $checkId, BankaccountCheck::typeId($type));
	}

	public function getPaymentaccount() {
		return new Paymentaccount($this->id);
	}

	public function getBankaccountType() {
		return new BankaccountType($this->bankaccountTypeId);
	}

	public function setBankaccountType(BankaccountType $bankaccountType) {
		if ($bankaccountType->id>0) {
			$this->bankaccountTypeId = $bankaccountType->id;
		}
	}

	public function setAch($ach=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeAchList($type);
		$this->addAch($ach, $type);
		return $this;
	}
	public function removeAch($ach, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($ach) ? $ach : array($ach);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getAchBankaccount($id, $type);
			if ($deleteObject) {
				$relationship->getAch()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeAchList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return AchBankaccount::deleteAll(null, $this->id, $type);
		}
	}
	public function addAch($ach=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($ach)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($ach) ? $ach : array($ach);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getAchBankaccount($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getAch($type="default") {
		if (isset($this->_cache["Ach"]) && isset($this->_cache["Ach"][$type])) {
			$ach = $this->_cache["Ach"][$type];
		} else {
			$ach = new Ach($this->getAchId($type));
		}
		$this->_cache["Ach"][$type] = $ach;
		return $this->_cache["Ach"][$type];
	}
	public function getAchList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getAchIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Ach::objects($order, "{$db->le}ach{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getAchId($type="default") {
		return $this->getAchIds($type)->get(0);
	}
	public function getAchIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}ach{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}ach{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}ach{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}ach{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}ach{$db->re} ",
			"INNER JOIN {$db->le}ach_bankaccount{$db->re} ON {$db->le}ach_bankaccount{$db->re}.{$db->le}ach_id{$db->re}={$db->le}ach{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}ach_bankaccount{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}ach{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}ach_bankaccount{$db->re}.{$db->le}bankaccount_paymentaccount_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}ach_bankaccount{$db->re}.{$db->le}ach_bankaccount_type_id{$db->re}=" . $db->queryValue(AchBankaccount::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}ach_bankaccount{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setCheck($check=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeCheckList($type);
		$this->addCheck($check, $type);
		return $this;
	}
	public function removeCheck($check, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($check) ? $check : array($check);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getBankaccountCheck($id, $type);
			if ($deleteObject) {
				$relationship->getCheck()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeCheckList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return BankaccountCheck::deleteAll($this->id, null, $type);
		}
	}
	public function addCheck($check=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($check)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($check) ? $check : array($check);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getBankaccountCheck($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getCheck($type="default") {
		if (isset($this->_cache["Check"]) && isset($this->_cache["Check"][$type])) {
			$check = $this->_cache["Check"][$type];
		} else {
			$check = new Check($this->getCheckId($type));
		}
		$this->_cache["Check"][$type] = $check;
		return $this->_cache["Check"][$type];
	}
	public function getCheckList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getCheckIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Check::objects($order, "{$db->le}check{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getCheckId($type="default") {
		return $this->getCheckIds($type)->get(0);
	}
	public function getCheckIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}check{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}check{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}check{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}check{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}check{$db->re} ",
			"INNER JOIN {$db->le}bankaccount_check{$db->re} ON {$db->le}bankaccount_check{$db->re}.{$db->le}check_id{$db->re}={$db->le}check{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}bankaccount_check{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}check{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}bankaccount_check{$db->re}.{$db->le}bankaccount_paymentaccount_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}bankaccount_check{$db->re}.{$db->le}bankaccount_check_type_id{$db->re}=" . $db->queryValue(BankaccountCheck::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}bankaccount_check{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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