<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the creditcardaccount table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the creditcardaccount
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called CreditcardaccountExtension, and should extend the CreditcardaccountTable
 * class.  The custom code file should be in the helix/modules/Commerce folder
 * and should be called CreditcardaccountExtension.php
 * 
 * Object -> Paymentaccount -> Creditcardaccount
 */
class CreditcardaccountTable extends Paymentaccount {
	public $logSequence;
	public $fdate;
	public $tdate;

	public $expirationMonth;
	public $expirationYear;
	public $creditcardaccountTypeId;
	public $creditcardbrandId;
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
		$this->expirationMonth = null;
		$this->expirationYear = null;
		$this->creditcardaccountTypeId = null;
		$this->creditcardbrandId = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}creditcardaccount{$db->re}.{$db->le}paymentaccount_id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}name{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}description{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}paymentaccount_type_id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}account_number{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}expiration_month{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}expiration_year{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}creditcardaccount_type_id{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}creditcardbrand_id{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}mdate{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}cdate{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}creditcardaccount{$db->re}",
			"INNER JOIN {$db->le}paymentaccount{$db->re} ON {$db->le}creditcardaccount{$db->re}.{$db->le}paymentaccount_id{$db->re}={$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->description = $db->record["description"];
				$this->paymentaccountTypeId = $db->record["paymentaccount_type_id"];
				$this->accountNumber = $db->record["account_number"];
				$this->expirationMonth = $db->record["expiration_month"];
				$this->expirationYear = $db->record["expiration_year"];
				$this->creditcardaccountTypeId = $db->record["creditcardaccount_type_id"];
				$this->creditcardbrandId = $db->record["creditcardbrand_id"];
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
		$this->_initial["expirationMonth"] = $this->expirationMonth;
		$this->_initial["expirationYear"] = $this->expirationYear;
		$this->_initial["creditcardaccountTypeId"] = $this->creditcardaccountTypeId;
		$this->_initial["creditcardbrandId"] = $this->creditcardbrandId;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Creditcardaccount();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}creditcardaccount{$db->re}.{$db->le}paymentaccount_id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}creditcardaccount{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}creditcardaccount{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}creditcardaccount{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}paymentaccount{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}paymentaccount{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}paymentaccount{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}creditcardaccount{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}fdate{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}tdate{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}name{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}description{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}paymentaccount_type_id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}account_number{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}expiration_month{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}expiration_year{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}creditcardaccount_type_id{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}creditcardbrand_id{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}mdate{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}cdate{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}creditcardaccount{$db->re}",
			"INNER JOIN {$db->le}paymentaccount{$db->re} ON {$db->le}creditcardaccount{$db->re}.{$db->le}paymentaccount_id{$db->re}={$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$query .= "ORDER BY {$db->le}creditcardaccount{$db->re}.log_sequence desc limit 1";
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
				$object->expirationMonth = $db->record["expiration_month"];
				$object->expirationYear = $db->record["expiration_year"];
				$object->creditcardaccountTypeId = $db->record["creditcardaccount_type_id"];
				$object->creditcardbrandId = $db->record["creditcardbrand_id"];
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
		$isDirty = $isDirty || ((int)$this->expirationMonth !== (int)$this->_initial["expirationMonth"]);
		$isDirty = $isDirty || ((int)$this->expirationYear !== (int)$this->_initial["expirationYear"]);
		$isDirty = $isDirty || ((int)$this->creditcardaccountTypeId !== (int)$this->_initial["creditcardaccountTypeId"]);
		$isDirty = $isDirty || ((int)$this->creditcardbrandId !== (int)$this->_initial["creditcardbrandId"]);
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
			"INSERT INTO {$db->le}creditcardaccount{$db->re} (",
			"	{$db->le}paymentaccount_id{$db->re}, {$db->le}expiration_month{$db->re}, {$db->le}expiration_year{$db->re}, {$db->le}creditcardaccount_type_id{$db->re}, {$db->le}creditcardbrand_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->id)?null:(int)$this->id) . ",",
				$db->queryValue(is_null($this->expirationMonth)?null:(int)$this->expirationMonth) . ",",
				$db->queryValue(is_null($this->expirationYear)?null:(int)$this->expirationYear) . ",",
				$db->queryValue(is_null($this->creditcardaccountTypeId)?null:(int)$this->creditcardaccountTypeId) . ",",
				$db->queryValue(is_null($this->creditcardbrandId)?null:(int)$this->creditcardbrandId) . ",",
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
				"UPDATE {$db->le}creditcardaccount{$db->re} SET",
					"{$db->le}expiration_month{$db->re}={$db->queryValue(is_null($this->expirationMonth)?null:(int)$this->expirationMonth)},",
					"{$db->le}expiration_year{$db->re}={$db->queryValue(is_null($this->expirationYear)?null:(int)$this->expirationYear)},",
					"{$db->le}creditcardaccount_type_id{$db->re}={$db->queryValue(is_null($this->creditcardaccountTypeId)?null:(int)$this->creditcardaccountTypeId)},",
					"{$db->le}creditcardbrand_id{$db->re}={$db->queryValue(is_null($this->creditcardbrandId)?null:(int)$this->creditcardbrandId)},",
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
		$record = Creditcardaccount::select($db->encapsulate("creditcardaccount") . ".mdate as fdate,null as tdate,{$db->encapsulate("creditcardaccount")}.*",null,$db->encapsulate("creditcardaccount").".paymentaccount_id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}creditcardaccount{$dbLog->re} (",
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
				"FROM {$dbLog->le}creditcardaccount{$dbLog->re}",
				"WHERE {$dbLog->le}creditcardaccount{$dbLog->re}.{$dbLog->le}paymentaccount_id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}creditcardaccount{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("creditcardaccount") . " WHERE paymentaccount_id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("creditcardaccount") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}creditcardaccount{$db->le}",
			"INNER JOIN {$db->le}paymentaccount{$db->re} ON {$db->le}creditcardaccount{$db->re}.{$db->le}paymentaccount_id{$db->re}={$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}creditcardaccount_type{$db->re} ON {$db->le}creditcardaccount{$db->re}.{$db->le}creditcardaccount_type_id{$db->re}={$db->le}creditcardaccount_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}creditcardbrand{$db->re} ON {$db->le}creditcardaccount{$db->re}.{$db->le}creditcardbrand_id{$db->re}={$db->le}creditcardbrand{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}paymentaccount_type{$db->re} ON {$db->le}paymentaccount{$db->re}.{$db->le}paymentaccount_type_id{$db->re}={$db->le}paymentaccount_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}creditcardaccount{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Creditcardaccount::select("{$db->le}creditcardaccount{$db->le}.paymentaccount_id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Creditcardaccount::select("{$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}name{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}description{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}paymentaccount_type_id{$db->re}, {$db->le}paymentaccount{$db->re}.{$db->le}account_number{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}expiration_month{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}expiration_year{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}creditcardaccount_type_id{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}creditcardbrand_id{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}mdate{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}cdate{$db->re}, {$db->le}creditcardaccount{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Creditcardaccount();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->description = $record["description"];
				$object->paymentaccountTypeId = $record["paymentaccount_type_id"];
				$object->accountNumber = $record["account_number"];
				$object->expirationMonth = $record["expiration_month"];
				$object->expirationYear = $record["expiration_year"];
				$object->creditcardaccountTypeId = $record["creditcardaccount_type_id"];
				$object->creditcardbrandId = $record["creditcardbrand_id"];
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
		return Creditcardaccount::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Creditcardaccount Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new CreditcardaccountType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new CreditcardaccountType($this->creditcardaccountTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new CreditcardaccountType(null, $type);
		$this->creditcardaccountTypeId = $type->id;
		return $this->creditcardaccountTypeId;
	}

	public function getAddressCreditcardaccount($addressId, $type="default") {
		return new AddressCreditcardaccount(null, $addressId, $this->id, AddressCreditcardaccount::typeId($type));
	}

	public function getPaymentaccount() {
		return new Paymentaccount($this->id);
	}

	public function getCreditcardaccountType() {
		return new CreditcardaccountType($this->creditcardaccountTypeId);
	}

	public function setCreditcardaccountType(CreditcardaccountType $creditcardaccountType) {
		if ($creditcardaccountType->id>0) {
			$this->creditcardaccountTypeId = $creditcardaccountType->id;
		}
	}

	public function getCreditcardbrand() {
		return new Creditcardbrand($this->creditcardbrandId);
	}

	public function setCreditcardbrand(Creditcardbrand $creditcardbrand) {
		if ($creditcardbrand->id>0) {
			$this->creditcardbrandId = $creditcardbrand->id;
		}
	}

	public function setAddress($address=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeAddressList($type);
		$this->addAddress($address, $type);
		return $this;
	}
	public function removeAddress($address, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($address) ? $address : array($address);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getAddressCreditcardaccount($id, $type);
			if ($deleteObject) {
				$relationship->getAddress()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeAddressList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return AddressCreditcardaccount::deleteAll(null, $this->id, $type);
		}
	}
	public function addAddress($address=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($address)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($address) ? $address : array($address);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getAddressCreditcardaccount($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getAddress($type="default") {
		if (isset($this->_cache["Address"]) && isset($this->_cache["Address"][$type])) {
			$address = $this->_cache["Address"][$type];
		} else {
			$address = new Address($this->getAddressId($type));
		}
		$this->_cache["Address"][$type] = $address;
		return $this->_cache["Address"][$type];
	}
	public function getAddressList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getAddressIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Address::objects($order, "{$db->le}address{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getAddressId($type="default") {
		return $this->getAddressIds($type)->get(0);
	}
	public function getAddressIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}address{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}address{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}address{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}address{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}address{$db->re} ",
			"INNER JOIN {$db->le}address_creditcardaccount{$db->re} ON {$db->le}address_creditcardaccount{$db->re}.{$db->le}address_id{$db->re}={$db->le}address{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}address_creditcardaccount{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}address{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}address_creditcardaccount{$db->re}.{$db->le}creditcardaccount_paymentaccount_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}address_creditcardaccount{$db->re}.{$db->le}address_creditcardaccount_type_id{$db->re}=" . $db->queryValue(AddressCreditcardaccount::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}address_creditcardaccount{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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