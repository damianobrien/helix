<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the address table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the address
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called AddressExtension, and should extend the AddressTable
 * class.  The custom code file should be in the helix/modules/Core folder
 * and should be called AddressExtension.php
 * 
 * Object -> Address
 */
class AddressTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $name;
	public $line1;
	public $line2;
	public $line3;
	public $city;
	public $province;
	public $stateId;
	public $postalCode;
	public $countryId;
	public $createdById;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = null;
		$this->line1 = null;
		$this->line2 = null;
		$this->line3 = null;
		$this->city = null;
		$this->province = null;
		$this->stateId = null;
		$this->postalCode = null;
		$this->countryId = null;
		$this->createdById = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}address{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}address{$db->re}.{$db->le}id{$db->re}, {$db->le}address{$db->re}.{$db->le}name{$db->re}, {$db->le}address{$db->re}.{$db->le}line1{$db->re}, {$db->le}address{$db->re}.{$db->le}line2{$db->re}, {$db->le}address{$db->re}.{$db->le}line3{$db->re}, {$db->le}address{$db->re}.{$db->le}city{$db->re}, {$db->le}address{$db->re}.{$db->le}province{$db->re}, {$db->le}address{$db->re}.{$db->le}state_id{$db->re}, {$db->le}address{$db->re}.{$db->le}postal_code{$db->re}, {$db->le}address{$db->re}.{$db->le}country_id{$db->re}, {$db->le}address{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}address{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}address{$db->re}.{$db->le}mdate{$db->re}, {$db->le}address{$db->re}.{$db->le}cdate{$db->re}, {$db->le}address{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}address{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->line1 = $db->record["line1"];
				$this->line2 = $db->record["line2"];
				$this->line3 = $db->record["line3"];
				$this->city = $db->record["city"];
				$this->province = $db->record["province"];
				$this->stateId = $db->record["state_id"];
				$this->postalCode = $db->record["postal_code"];
				$this->countryId = $db->record["country_id"];
				$this->createdById = $db->record["created_by_id"];
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
		$this->_initial["line1"] = $this->line1;
		$this->_initial["line2"] = $this->line2;
		$this->_initial["line3"] = $this->line3;
		$this->_initial["city"] = $this->city;
		$this->_initial["province"] = $this->province;
		$this->_initial["stateId"] = $this->stateId;
		$this->_initial["postalCode"] = $this->postalCode;
		$this->_initial["countryId"] = $this->countryId;
		$this->_initial["createdById"] = $this->createdById;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Address();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}address{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}address{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}address{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}address{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}address{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}address{$db->re}.{$db->le}fdate{$db->re}, {$db->le}address{$db->re}.{$db->le}tdate{$db->re}, {$db->le}address{$db->re}.{$db->le}id{$db->re}, {$db->le}address{$db->re}.{$db->le}name{$db->re}, {$db->le}address{$db->re}.{$db->le}line1{$db->re}, {$db->le}address{$db->re}.{$db->le}line2{$db->re}, {$db->le}address{$db->re}.{$db->le}line3{$db->re}, {$db->le}address{$db->re}.{$db->le}city{$db->re}, {$db->le}address{$db->re}.{$db->le}province{$db->re}, {$db->le}address{$db->re}.{$db->le}state_id{$db->re}, {$db->le}address{$db->re}.{$db->le}postal_code{$db->re}, {$db->le}address{$db->re}.{$db->le}country_id{$db->re}, {$db->le}address{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}address{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}address{$db->re}.{$db->le}mdate{$db->re}, {$db->le}address{$db->re}.{$db->le}cdate{$db->re}, {$db->le}address{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}address{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}address{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->line1 = $db->record["line1"];
				$object->line2 = $db->record["line2"];
				$object->line3 = $db->record["line3"];
				$object->city = $db->record["city"];
				$object->province = $db->record["province"];
				$object->stateId = $db->record["state_id"];
				$object->postalCode = $db->record["postal_code"];
				$object->countryId = $db->record["country_id"];
				$object->createdById = $db->record["created_by_id"];
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
		$isDirty = $isDirty || ((string)$this->line1 !== (string)$this->_initial["line1"]);
		$isDirty = $isDirty || ((string)$this->line2 !== (string)$this->_initial["line2"]);
		$isDirty = $isDirty || ((string)$this->line3 !== (string)$this->_initial["line3"]);
		$isDirty = $isDirty || ((string)$this->city !== (string)$this->_initial["city"]);
		$isDirty = $isDirty || ((string)$this->province !== (string)$this->_initial["province"]);
		$isDirty = $isDirty || ((int)$this->stateId !== (int)$this->_initial["stateId"]);
		$isDirty = $isDirty || ((string)$this->postalCode !== (string)$this->_initial["postalCode"]);
		$isDirty = $isDirty || ((int)$this->countryId !== (int)$this->_initial["countryId"]);
		$isDirty = $isDirty || ((int)$this->createdById !== (int)$this->_initial["createdById"]);
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
			"INSERT INTO {$db->le}address{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}line1{$db->re}, {$db->le}line2{$db->re}, {$db->le}line3{$db->re}, {$db->le}city{$db->re}, {$db->le}province{$db->re}, {$db->le}state_id{$db->re}, {$db->le}postal_code{$db->re}, {$db->le}country_id{$db->re}, {$db->le}created_by_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->line1) . ",",
				$db->queryValue($this->line2) . ",",
				$db->queryValue($this->line3) . ",",
				$db->queryValue($this->city) . ",",
				$db->queryValue($this->province) . ",",
				$db->queryValue(is_null($this->stateId)?null:(int)$this->stateId) . ",",
				$db->queryValue($this->postalCode) . ",",
				$db->queryValue(is_null($this->countryId)?null:(int)$this->countryId) . ",",
				$db->queryValue((int)$session->getUserId()) . ",",
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
				"UPDATE {$db->le}address{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}line1{$db->re}={$db->queryValue($this->line1)},",
					"{$db->le}line2{$db->re}={$db->queryValue($this->line2)},",
					"{$db->le}line3{$db->re}={$db->queryValue($this->line3)},",
					"{$db->le}city{$db->re}={$db->queryValue($this->city)},",
					"{$db->le}province{$db->re}={$db->queryValue($this->province)},",
					"{$db->le}state_id{$db->re}={$db->queryValue(is_null($this->stateId)?null:(int)$this->stateId)},",
					"{$db->le}postal_code{$db->re}={$db->queryValue($this->postalCode)},",
					"{$db->le}country_id{$db->re}={$db->queryValue(is_null($this->countryId)?null:(int)$this->countryId)},",
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
		$record = Address::select($db->encapsulate("address") . ".mdate as fdate,null as tdate,{$db->encapsulate("address")}.*",null,$db->encapsulate("address").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}address{$dbLog->re} (",
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
				"FROM {$dbLog->le}address{$dbLog->re}",
				"WHERE {$dbLog->le}address{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}address{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("address") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("address") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}address{$db->le}",
			"LEFT JOIN {$db->le}state{$db->re} ON {$db->le}address{$db->re}.{$db->le}state_id{$db->re}={$db->le}state{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}country{$db->re} ON {$db->le}address{$db->re}.{$db->le}country_id{$db->re}={$db->le}country{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}address{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Address::select("{$db->le}address{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Address::select("{$db->le}address{$db->re}.{$db->le}id{$db->re}, {$db->le}address{$db->re}.{$db->le}name{$db->re}, {$db->le}address{$db->re}.{$db->le}line1{$db->re}, {$db->le}address{$db->re}.{$db->le}line2{$db->re}, {$db->le}address{$db->re}.{$db->le}line3{$db->re}, {$db->le}address{$db->re}.{$db->le}city{$db->re}, {$db->le}address{$db->re}.{$db->le}province{$db->re}, {$db->le}address{$db->re}.{$db->le}state_id{$db->re}, {$db->le}address{$db->re}.{$db->le}postal_code{$db->re}, {$db->le}address{$db->re}.{$db->le}country_id{$db->re}, {$db->le}address{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}address{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}address{$db->re}.{$db->le}mdate{$db->re}, {$db->le}address{$db->re}.{$db->le}cdate{$db->re}, {$db->le}address{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Address();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->line1 = $record["line1"];
				$object->line2 = $record["line2"];
				$object->line3 = $record["line3"];
				$object->city = $record["city"];
				$object->province = $record["province"];
				$object->stateId = $record["state_id"];
				$object->postalCode = $record["postal_code"];
				$object->countryId = $record["country_id"];
				$object->createdById = $record["created_by_id"];
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
			$clauses[] = "address.name LIKE '%{$keyword}%' OR address.line1 LIKE '%{$keyword}%' OR address.line2 LIKE '%{$keyword}%' OR address.line3 LIKE '%{$keyword}%' OR address.city LIKE '%{$keyword}%' OR address.province LIKE '%{$keyword}%' OR address.postal_code LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Address::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Address Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getAddressEvent($eventId, $type="default") {
		return new AddressEvent(null, $this->id, $eventId, AddressEvent::typeId($type));
	}

	public function getAddressCreditcardaccount($creditcardaccountId, $type="default") {
		return new AddressCreditcardaccount(null, $this->id, $creditcardaccountId, AddressCreditcardaccount::typeId($type));
	}

	public function getAddressEntity($entityId, $type="default") {
		return new AddressEntity(null, $this->id, $entityId, AddressEntity::typeId($type));
	}

	public function getState() {
		return new State($this->stateId);
	}

	public function setState(State $state) {
		if ($state->id>0) {
			$this->stateId = $state->id;
		}
	}

	public function getCountry() {
		return new Country($this->countryId);
	}

	public function setCountry(Country $country) {
		if ($country->id>0) {
			$this->countryId = $country->id;
		}
	}

	public function setCreditcardaccount($creditcardaccount=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeCreditcardaccountList($type);
		$this->addCreditcardaccount($creditcardaccount, $type);
		return $this;
	}
	public function removeCreditcardaccount($creditcardaccount, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($creditcardaccount) ? $creditcardaccount : array($creditcardaccount);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getAddressCreditcardaccount($id, $type);
			if ($deleteObject) {
				$relationship->getCreditcardaccount()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeCreditcardaccountList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return AddressCreditcardaccount::deleteAll($this->id, null, $type);
		}
	}
	public function addCreditcardaccount($creditcardaccount=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($creditcardaccount)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($creditcardaccount) ? $creditcardaccount : array($creditcardaccount);
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
	public function getCreditcardaccount($type="default") {
		if (isset($this->_cache["Creditcardaccount"]) && isset($this->_cache["Creditcardaccount"][$type])) {
			$creditcardaccount = $this->_cache["Creditcardaccount"][$type];
		} else {
			$creditcardaccount = new Creditcardaccount($this->getCreditcardaccountId($type));
		}
		$this->_cache["Creditcardaccount"][$type] = $creditcardaccount;
		return $this->_cache["Creditcardaccount"][$type];
	}
	public function getCreditcardaccountList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getCreditcardaccountIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Creditcardaccount::objects($order, "{$db->le}creditcardaccount{$db->le}.{$db->re}paymentaccount_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getCreditcardaccountId($type="default") {
		return $this->getCreditcardaccountIds($type)->get(0);
	}
	public function getCreditcardaccountIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}creditcardaccount{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}creditcardaccount{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}creditcardaccount{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}creditcardaccount{$db->re}.{$db->le}paymentaccount_id{$db->re} ",
			"FROM {$db->le}creditcardaccount{$db->re} ",
			"INNER JOIN {$db->le}address_creditcardaccount{$db->re} ON {$db->le}address_creditcardaccount{$db->re}.{$db->le}creditcardaccount_paymentaccount_id{$db->re}={$db->le}creditcardaccount{$db->re}.{$db->le}paymentaccount_id{$db->re} ",
			"	AND {$db->le}address_creditcardaccount{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}creditcardaccount{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}address_creditcardaccount{$db->re}.{$db->le}address_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}address_creditcardaccount{$db->re}.{$db->le}address_creditcardaccount_type_id{$db->re}=" . $db->queryValue(AddressCreditcardaccount::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}address_creditcardaccount{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getAddressEntity($id, $type);
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
			return AddressEntity::deleteAll($this->id, null, $type);
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
				$relationship = $this->getAddressEntity($id, $type);
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
			"INNER JOIN {$db->le}address_entity{$db->re} ON {$db->le}address_entity{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}address_entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}address_entity{$db->re}.{$db->le}address_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}address_entity{$db->re}.{$db->le}address_entity_type_id{$db->re}=" . $db->queryValue(AddressEntity::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}address_entity{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setEvent($event=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeEventList($type);
		$this->addEvent($event, $type);
		return $this;
	}
	public function removeEvent($event, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($event) ? $event : array($event);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getAddressEvent($id, $type);
			if ($deleteObject) {
				$relationship->getEvent()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeEventList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return AddressEvent::deleteAll($this->id, null, $type);
		}
	}
	public function addEvent($event=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($event)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($event) ? $event : array($event);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getAddressEvent($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getEvent($type="default") {
		if (isset($this->_cache["Event"]) && isset($this->_cache["Event"][$type])) {
			$event = $this->_cache["Event"][$type];
		} else {
			$event = new Event($this->getEventId($type));
		}
		$this->_cache["Event"][$type] = $event;
		return $this->_cache["Event"][$type];
	}
	public function getEventList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getEventIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Event::objects($order, "{$db->le}event{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getEventId($type="default") {
		return $this->getEventIds($type)->get(0);
	}
	public function getEventIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}event{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}event{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}event{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}event{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}event{$db->re} ",
			"INNER JOIN {$db->le}address_event{$db->re} ON {$db->le}address_event{$db->re}.{$db->le}event_id{$db->re}={$db->le}event{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}address_event{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}event{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}address_event{$db->re}.{$db->le}address_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}address_event{$db->re}.{$db->le}address_event_type_id{$db->re}=" . $db->queryValue(AddressEvent::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}address_event{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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