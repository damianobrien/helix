<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the check table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the check
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called CheckExtension, and should extend the CheckTable
 * class.  The custom code file should be in the helix/modules/Commerce folder
 * and should be called CheckExtension.php
 * 
 * Object -> Check
 */
class CheckTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $payee;
	public $checkNumber;
	public $memo;
	public $checkTypeId;
	public $date;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->payee = null;
		$this->checkNumber = null;
		$this->memo = null;
		$this->checkTypeId = null;
		$this->date = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}check{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}check{$db->re}.{$db->le}id{$db->re}, {$db->le}check{$db->re}.{$db->le}payee{$db->re}, {$db->le}check{$db->re}.{$db->le}check_number{$db->re}, {$db->le}check{$db->re}.{$db->le}memo{$db->re}, {$db->le}check{$db->re}.{$db->le}check_type_id{$db->re}, {$db->le}check{$db->re}.{$db->le}date{$db->re}, {$db->le}check{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}check{$db->re}.{$db->le}mdate{$db->re}, {$db->le}check{$db->re}.{$db->le}cdate{$db->re}, {$db->le}check{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}check{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->payee = $db->record["payee"];
				$this->checkNumber = $db->record["check_number"];
				$this->memo = $db->record["memo"];
				$this->checkTypeId = $db->record["check_type_id"];
				$this->date = is_null(($db->record["date"]))?null:new Date($db->record["date"]);
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["payee"] = $this->payee;
		$this->_initial["checkNumber"] = $this->checkNumber;
		$this->_initial["memo"] = $this->memo;
		$this->_initial["checkTypeId"] = $this->checkTypeId;
		$this->_initial["date"] = $this->date;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Check();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}check{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}check{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}check{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}check{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}check{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}check{$db->re}.{$db->le}fdate{$db->re}, {$db->le}check{$db->re}.{$db->le}tdate{$db->re}, {$db->le}check{$db->re}.{$db->le}id{$db->re}, {$db->le}check{$db->re}.{$db->le}payee{$db->re}, {$db->le}check{$db->re}.{$db->le}check_number{$db->re}, {$db->le}check{$db->re}.{$db->le}memo{$db->re}, {$db->le}check{$db->re}.{$db->le}check_type_id{$db->re}, {$db->le}check{$db->re}.{$db->le}date{$db->re}, {$db->le}check{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}check{$db->re}.{$db->le}mdate{$db->re}, {$db->le}check{$db->re}.{$db->le}cdate{$db->re}, {$db->le}check{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}check{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}check{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->payee = $db->record["payee"];
				$object->checkNumber = $db->record["check_number"];
				$object->memo = $db->record["memo"];
				$object->checkTypeId = $db->record["check_type_id"];
				$object->date = is_null(($db->record["date"]))?null:new Date($db->record["date"]);
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
		$isDirty = $isDirty || ((string)$this->payee !== (string)$this->_initial["payee"]);
		$isDirty = $isDirty || ((int)$this->checkNumber !== (int)$this->_initial["checkNumber"]);
		$isDirty = $isDirty || ((string)$this->memo !== (string)$this->_initial["memo"]);
		$isDirty = $isDirty || ((int)$this->checkTypeId !== (int)$this->_initial["checkTypeId"]);
		$isDirty = $isDirty || ((string)$this->date != (string)$this->_initial["date"]);
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
			"INSERT INTO {$db->le}check{$db->re} (",
			"	{$db->le}payee{$db->re}, {$db->le}check_number{$db->re}, {$db->le}memo{$db->re}, {$db->le}check_type_id{$db->re}, {$db->le}date{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->payee) . ",",
				$db->queryValue(is_null($this->checkNumber)?null:(int)$this->checkNumber) . ",",
				$db->queryValue($this->memo) . ",",
				$db->queryValue(is_null($this->checkTypeId)?null:(int)$this->checkTypeId) . ",",
				$db->queryValue($this->date) . ",",
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
				"UPDATE {$db->le}check{$db->re} SET",
					"{$db->le}payee{$db->re}={$db->queryValue($this->payee)},",
					"{$db->le}check_number{$db->re}={$db->queryValue(is_null($this->checkNumber)?null:(int)$this->checkNumber)},",
					"{$db->le}memo{$db->re}={$db->queryValue($this->memo)},",
					"{$db->le}check_type_id{$db->re}={$db->queryValue(is_null($this->checkTypeId)?null:(int)$this->checkTypeId)},",
					"{$db->le}date{$db->re}={$db->queryValue($this->date)},",
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
		$record = Check::select($db->encapsulate("check") . ".mdate as fdate,null as tdate,{$db->encapsulate("check")}.*",null,$db->encapsulate("check").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}check{$dbLog->re} (",
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
				"FROM {$dbLog->le}check{$dbLog->re}",
				"WHERE {$dbLog->le}check{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}check{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("check") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("check") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}check{$db->le}",
			"LEFT JOIN {$db->le}check_type{$db->re} ON {$db->le}check{$db->re}.{$db->le}check_type_id{$db->re}={$db->le}check_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}check{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Check::select("{$db->le}check{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Check::select("{$db->le}check{$db->re}.{$db->le}id{$db->re}, {$db->le}check{$db->re}.{$db->le}payee{$db->re}, {$db->le}check{$db->re}.{$db->le}check_number{$db->re}, {$db->le}check{$db->re}.{$db->le}memo{$db->re}, {$db->le}check{$db->re}.{$db->le}check_type_id{$db->re}, {$db->le}check{$db->re}.{$db->le}date{$db->re}, {$db->le}check{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}check{$db->re}.{$db->le}mdate{$db->re}, {$db->le}check{$db->re}.{$db->le}cdate{$db->re}, {$db->le}check{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Check();
				$object->id = $record["id"];
				$object->payee = $record["payee"];
				$object->checkNumber = $record["check_number"];
				$object->memo = $record["memo"];
				$object->checkTypeId = $record["check_type_id"];
				$object->date = is_null(($record["date"]))?null:new Date($record["date"]);
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
			$clauses[] = "check.payee LIKE '%{$keyword}%' OR check.memo LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Check::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Check Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new CheckType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new CheckType($this->checkTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new CheckType(null, $type);
		$this->checkTypeId = $type->id;
		return $this->checkTypeId;
	}

	public function getBankaccountCheck($bankaccountId, $type="default") {
		return new BankaccountCheck(null, $bankaccountId, $this->id, BankaccountCheck::typeId($type));
	}

	public function getCheckType() {
		return new CheckType($this->checkTypeId);
	}

	public function setCheckType(CheckType $checkType) {
		if ($checkType->id>0) {
			$this->checkTypeId = $checkType->id;
		}
	}

	public function setBankaccount($bankaccount=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeBankaccountList($type);
		$this->addBankaccount($bankaccount, $type);
		return $this;
	}
	public function removeBankaccount($bankaccount, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($bankaccount) ? $bankaccount : array($bankaccount);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getBankaccountCheck($id, $type);
			if ($deleteObject) {
				$relationship->getBankaccount()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeBankaccountList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return BankaccountCheck::deleteAll(null, $this->id, $type);
		}
	}
	public function addBankaccount($bankaccount=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($bankaccount)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($bankaccount) ? $bankaccount : array($bankaccount);
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
	public function getBankaccount($type="default") {
		if (isset($this->_cache["Bankaccount"]) && isset($this->_cache["Bankaccount"][$type])) {
			$bankaccount = $this->_cache["Bankaccount"][$type];
		} else {
			$bankaccount = new Bankaccount($this->getBankaccountId($type));
		}
		$this->_cache["Bankaccount"][$type] = $bankaccount;
		return $this->_cache["Bankaccount"][$type];
	}
	public function getBankaccountList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getBankaccountIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Bankaccount::objects($order, "{$db->le}bankaccount{$db->le}.{$db->re}paymentaccount_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getBankaccountId($type="default") {
		return $this->getBankaccountIds($type)->get(0);
	}
	public function getBankaccountIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}bankaccount{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}bankaccount{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}bankaccount{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}bankaccount{$db->re}.{$db->le}paymentaccount_id{$db->re} ",
			"FROM {$db->le}bankaccount{$db->re} ",
			"INNER JOIN {$db->le}bankaccount_check{$db->re} ON {$db->le}bankaccount_check{$db->re}.{$db->le}bankaccount_paymentaccount_id{$db->re}={$db->le}bankaccount{$db->re}.{$db->le}paymentaccount_id{$db->re} ",
			"	AND {$db->le}bankaccount_check{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}bankaccount{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}bankaccount_check{$db->re}.{$db->le}check_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}bankaccount_check{$db->re}.{$db->le}bankaccount_check_type_id{$db->re}=" . $db->queryValue(BankaccountCheck::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}bankaccount_check{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["paymentaccount_id"];
		}
		
		return new Collection($ids);
	}

}
?>