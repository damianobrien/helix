<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the business table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the business
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called BusinessExtension, and should extend the BusinessTable
 * class.  The custom code file should be in the helix/modules/Business folder
 * and should be called BusinessExtension.php
 * 
 * Object -> Entity -> Business
 */
class BusinessTable extends Entity {
	public $logSequence;
	public $fdate;
	public $tdate;

	public $name;
	public $abbreviation;
	public $businessTypeId;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $name=null, $abbreviation=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->description = null;
		$this->entityTypeId = null;
		$this->createdById = null;
		$this->name = $name;
		$this->abbreviation = $abbreviation;
		$this->businessTypeId = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}business{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}business{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		} else if (isset($abbreviation)) {
			$condition = "{$db->le}business{$db->re}.{$db->le}abbreviation{$db->re}={$db->queryValue($abbreviation)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}entity{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}business{$db->re}.{$db->le}name{$db->re}, {$db->le}business{$db->re}.{$db->le}abbreviation{$db->re}, {$db->le}business{$db->re}.{$db->le}business_type_id{$db->re}, {$db->le}business{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}business{$db->re}.{$db->le}mdate{$db->re}, {$db->le}business{$db->re}.{$db->le}cdate{$db->re}, {$db->le}business{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}business{$db->re}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}business{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->description = $db->record["description"];
				$this->entityTypeId = $db->record["entity_type_id"];
				$this->createdById = $db->record["created_by_id"];
				$this->name = $db->record["name"];
				$this->abbreviation = $db->record["abbreviation"];
				$this->businessTypeId = $db->record["business_type_id"];
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["description"] = $this->description;
		$this->_initial["entityTypeId"] = $this->entityTypeId;
		$this->_initial["createdById"] = $this->createdById;
		$this->_initial["name"] = $this->name;
		$this->_initial["abbreviation"] = $this->abbreviation;
		$this->_initial["businessTypeId"] = $this->businessTypeId;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $name=null, $abbreviation=null) {
		$object = new Business();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}business{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}business{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		} else if (isset($abbreviation)) {
			$condition = "{$db->le}business{$db->re}.{$db->le}abbreviation{$db->re}={$db->queryValue($abbreviation)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}business{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}business{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}business{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}entity{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}entity{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}entity{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}business{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}business{$db->re}.{$db->le}fdate{$db->re}, {$db->le}business{$db->re}.{$db->le}tdate{$db->re}, {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}entity{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}business{$db->re}.{$db->le}name{$db->re}, {$db->le}business{$db->re}.{$db->le}abbreviation{$db->re}, {$db->le}business{$db->re}.{$db->le}business_type_id{$db->re}, {$db->le}business{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}business{$db->re}.{$db->le}mdate{$db->re}, {$db->le}business{$db->re}.{$db->le}cdate{$db->re}, {$db->le}business{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}business{$db->re}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}business{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$query .= "ORDER BY {$db->le}business{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->description = $db->record["description"];
				$object->entityTypeId = $db->record["entity_type_id"];
				$object->createdById = $db->record["created_by_id"];
				$object->name = $db->record["name"];
				$object->abbreviation = $db->record["abbreviation"];
				$object->businessTypeId = $db->record["business_type_id"];
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
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
		$isDirty = $isDirty || ((int)$this->entityTypeId !== (int)$this->_initial["entityTypeId"]);
		$isDirty = $isDirty || ((int)$this->createdById !== (int)$this->_initial["createdById"]);
		$isDirty = $isDirty || ((string)$this->name !== (string)$this->_initial["name"]);
		$isDirty = $isDirty || ((string)$this->abbreviation !== (string)$this->_initial["abbreviation"]);
		$isDirty = $isDirty || ((int)$this->businessTypeId !== (int)$this->_initial["businessTypeId"]);
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
			"INSERT INTO {$db->le}business{$db->re} (",
			"	{$db->le}entity_id{$db->re}, {$db->le}name{$db->re}, {$db->le}abbreviation{$db->re}, {$db->le}business_type_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->id)?null:(int)$this->id) . ",",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->abbreviation) . ",",
				$db->queryValue(is_null($this->businessTypeId)?null:(int)$this->businessTypeId) . ",",
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
				"UPDATE {$db->le}business{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}abbreviation{$db->re}={$db->queryValue($this->abbreviation)},",
					"{$db->le}business_type_id{$db->re}={$db->queryValue(is_null($this->businessTypeId)?null:(int)$this->businessTypeId)},",
					"{$db->le}updated_by_id{$db->re}={$db->queryValue((int)$session->getUserId())},",
					"{$db->le}mdate{$db->re}={$db->queryValue(timestamp())},",
					"{$db->le}deleted{$db->re}={$db->queryValue(is_null($this->deleted)?null:(int)$this->deleted)}",
				"WHERE entity_id={$db->queryValue((int)$this->id)}"
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
		$record = Business::select($db->encapsulate("business") . ".mdate as fdate,null as tdate,{$db->encapsulate("business")}.*",null,$db->encapsulate("business").".entity_id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}business{$dbLog->re} (",
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
				"FROM {$dbLog->le}business{$dbLog->re}",
				"WHERE {$dbLog->le}business{$dbLog->re}.{$dbLog->le}entity_id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}business{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("business") . " WHERE entity_id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("business") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}business{$db->le}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}business{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}business_type{$db->re} ON {$db->le}business{$db->re}.{$db->le}business_type_id{$db->re}={$db->le}business_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}entity_type{$db->re} ON {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}={$db->le}entity_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}business{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Business::select("{$db->le}business{$db->le}.entity_id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Business::select("{$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}entity{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}business{$db->re}.{$db->le}name{$db->re}, {$db->le}business{$db->re}.{$db->le}abbreviation{$db->re}, {$db->le}business{$db->re}.{$db->le}business_type_id{$db->re}, {$db->le}business{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}business{$db->re}.{$db->le}mdate{$db->re}, {$db->le}business{$db->re}.{$db->le}cdate{$db->re}, {$db->le}business{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Business();
				$object->id = $record["id"];
				$object->description = $record["description"];
				$object->entityTypeId = $record["entity_type_id"];
				$object->createdById = $record["created_by_id"];
				$object->name = $record["name"];
				$object->abbreviation = $record["abbreviation"];
				$object->businessTypeId = $record["business_type_id"];
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
			$clauses[] = "entity.description LIKE '%{$keyword}%' OR business.name LIKE '%{$keyword}%' OR business.abbreviation LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Business::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Business Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new BusinessType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new BusinessType($this->businessTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new BusinessType(null, $type);
		$this->businessTypeId = $type->id;
		return $this->businessTypeId;
	}

	public function getAssetBusiness($assetId, $type="default") {
		return new AssetBusiness(null, $assetId, $this->id, AssetBusiness::typeId($type));
	}

	public function getBusinessComment($commentId, $type="default") {
		return new BusinessComment(null, $this->id, $commentId, BusinessComment::typeId($type));
	}

	public function getBusinessGroup($groupId, $type="default") {
		return new BusinessGroup(null, $this->id, $groupId, BusinessGroup::typeId($type));
	}

	public function getBusinessOffice($officeId, $type="default") {
		return new BusinessOffice(null, $this->id, $officeId, BusinessOffice::typeId($type));
	}

	public function getBusinessContact($contactId, $type="default") {
		return new BusinessContact(null, $this->id, $contactId, BusinessContact::typeId($type));
	}

	public function getBusinessEmployee($employeeId, $type="default") {
		return new BusinessEmployee(null, $this->id, $employeeId, BusinessEmployee::typeId($type));
	}

	public function getEntity() {
		return new Entity($this->id);
	}

	public function getBusinessType() {
		return new BusinessType($this->businessTypeId);
	}

	public function setBusinessType(BusinessType $businessType) {
		if ($businessType->id>0) {
			$this->businessTypeId = $businessType->id;
		}
	}

	public function setAsset($asset=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeAssetList($type);
		$this->addAsset($asset, $type);
		return $this;
	}
	public function removeAsset($asset, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($asset) ? $asset : array($asset);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getAssetBusiness($id, $type);
			if ($deleteObject) {
				$relationship->getAsset()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeAssetList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return AssetBusiness::deleteAll(null, $this->id, $type);
		}
	}
	public function addAsset($asset=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($asset)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($asset) ? $asset : array($asset);
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
	public function getAsset($type="default") {
		if (isset($this->_cache["Asset"]) && isset($this->_cache["Asset"][$type])) {
			$asset = $this->_cache["Asset"][$type];
		} else {
			$asset = new Asset($this->getAssetId($type));
		}
		$this->_cache["Asset"][$type] = $asset;
		return $this->_cache["Asset"][$type];
	}
	public function getAssetList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getAssetIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Asset::objects($order, "{$db->le}asset{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getAssetId($type="default") {
		return $this->getAssetIds($type)->get(0);
	}
	public function getAssetIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}asset{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}asset{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}asset{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}asset{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}asset{$db->re} ",
			"INNER JOIN {$db->le}asset_business{$db->re} ON {$db->le}asset_business{$db->re}.{$db->le}asset_id{$db->re}={$db->le}asset{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}asset_business{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset_business{$db->re}.{$db->le}business_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}asset_business{$db->re}.{$db->le}asset_business_type_id{$db->re}=" . $db->queryValue(AssetBusiness::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}asset_business{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setComment($comment=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeCommentList($type);
		$this->addComment($comment, $type);
		return $this;
	}
	public function removeComment($comment, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($comment) ? $comment : array($comment);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getBusinessComment($id, $type);
			if ($deleteObject) {
				$relationship->getComment()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeCommentList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return BusinessComment::deleteAll($this->id, null, $type);
		}
	}
	public function addComment($comment=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($comment)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($comment) ? $comment : array($comment);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getBusinessComment($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getComment($type="default") {
		if (isset($this->_cache["Comment"]) && isset($this->_cache["Comment"][$type])) {
			$comment = $this->_cache["Comment"][$type];
		} else {
			$comment = new Comment($this->getCommentId($type));
		}
		$this->_cache["Comment"][$type] = $comment;
		return $this->_cache["Comment"][$type];
	}
	public function getCommentList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getCommentIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Comment::objects($order, "{$db->le}comment{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getCommentId($type="default") {
		return $this->getCommentIds($type)->get(0);
	}
	public function getCommentIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}comment{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}comment{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}comment{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}comment{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}comment{$db->re} ",
			"INNER JOIN {$db->le}business_comment{$db->re} ON {$db->le}business_comment{$db->re}.{$db->le}comment_id{$db->re}={$db->le}comment{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}business_comment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business_comment{$db->re}.{$db->le}business_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}business_comment{$db->re}.{$db->le}business_comment_type_id{$db->re}=" . $db->queryValue(BusinessComment::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}business_comment{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setContact($contact=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeContactList($type);
		$this->addContact($contact, $type);
		return $this;
	}
	public function removeContact($contact, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($contact) ? $contact : array($contact);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getBusinessContact($id, $type);
			if ($deleteObject) {
				$relationship->getContact()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeContactList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return BusinessContact::deleteAll($this->id, null, $type);
		}
	}
	public function addContact($contact=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($contact)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($contact) ? $contact : array($contact);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getBusinessContact($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getContact($type="default") {
		if (isset($this->_cache["Contact"]) && isset($this->_cache["Contact"][$type])) {
			$contact = $this->_cache["Contact"][$type];
		} else {
			$contact = new Contact($this->getContactId($type));
		}
		$this->_cache["Contact"][$type] = $contact;
		return $this->_cache["Contact"][$type];
	}
	public function getContactList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getContactIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Contact::objects($order, "{$db->le}contact{$db->le}.{$db->re}person_entity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getContactId($type="default") {
		return $this->getContactIds($type)->get(0);
	}
	public function getContactIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}contact{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}contact{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}contact{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}contact{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"FROM {$db->le}contact{$db->re} ",
			"INNER JOIN {$db->le}business_contact{$db->re} ON {$db->le}business_contact{$db->re}.{$db->le}contact_person_entity_id{$db->re}={$db->le}contact{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}business_contact{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contact{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business_contact{$db->re}.{$db->le}business_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}business_contact{$db->re}.{$db->le}business_contact_type_id{$db->re}=" . $db->queryValue(BusinessContact::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}business_contact{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["person_entity_id"];
		}
		
		return new Collection($ids);
	}

	public function setEmployee($employee=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeEmployeeList($type);
		$this->addEmployee($employee, $type);
		return $this;
	}
	public function removeEmployee($employee, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($employee) ? $employee : array($employee);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getBusinessEmployee($id, $type);
			if ($deleteObject) {
				$relationship->getEmployee()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeEmployeeList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return BusinessEmployee::deleteAll($this->id, null, $type);
		}
	}
	public function addEmployee($employee=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($employee)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($employee) ? $employee : array($employee);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getBusinessEmployee($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getEmployee($type="default") {
		if (isset($this->_cache["Employee"]) && isset($this->_cache["Employee"][$type])) {
			$employee = $this->_cache["Employee"][$type];
		} else {
			$employee = new Employee($this->getEmployeeId($type));
		}
		$this->_cache["Employee"][$type] = $employee;
		return $this->_cache["Employee"][$type];
	}
	public function getEmployeeList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getEmployeeIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Employee::objects($order, "{$db->le}employee{$db->le}.{$db->re}person_entity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getEmployeeId($type="default") {
		return $this->getEmployeeIds($type)->get(0);
	}
	public function getEmployeeIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}employee{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}employee{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}employee{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}employee{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"FROM {$db->le}employee{$db->re} ",
			"INNER JOIN {$db->le}business_employee{$db->re} ON {$db->le}business_employee{$db->re}.{$db->le}employee_person_entity_id{$db->re}={$db->le}employee{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}business_employee{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}employee{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business_employee{$db->re}.{$db->le}business_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}business_employee{$db->re}.{$db->le}business_employee_type_id{$db->re}=" . $db->queryValue(BusinessEmployee::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}business_employee{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["person_entity_id"];
		}
		
		return new Collection($ids);
	}

	public function setGroup($group=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeGroupList($type);
		$this->addGroup($group, $type);
		return $this;
	}
	public function removeGroup($group, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($group) ? $group : array($group);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getBusinessGroup($id, $type);
			if ($deleteObject) {
				$relationship->getGroup()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeGroupList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return BusinessGroup::deleteAll($this->id, null, $type);
		}
	}
	public function addGroup($group=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($group)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($group) ? $group : array($group);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getBusinessGroup($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getGroup($type="default") {
		if (isset($this->_cache["Group"]) && isset($this->_cache["Group"][$type])) {
			$group = $this->_cache["Group"][$type];
		} else {
			$group = new Group($this->getGroupId($type));
		}
		$this->_cache["Group"][$type] = $group;
		return $this->_cache["Group"][$type];
	}
	public function getGroupList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getGroupIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Group::objects($order, "{$db->le}group{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getGroupId($type="default") {
		return $this->getGroupIds($type)->get(0);
	}
	public function getGroupIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}group{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}group{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}group{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}group{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}group{$db->re} ",
			"INNER JOIN {$db->le}business_group{$db->re} ON {$db->le}business_group{$db->re}.{$db->le}group_id{$db->re}={$db->le}group{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}business_group{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}group{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business_group{$db->re}.{$db->le}business_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}business_group{$db->re}.{$db->le}business_group_type_id{$db->re}=" . $db->queryValue(BusinessGroup::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}business_group{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getBusinessOffice($id, $type);
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
			return BusinessOffice::deleteAll($this->id, null, $type);
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
				$relationship = $this->getBusinessOffice($id, $type);
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
			"INNER JOIN {$db->le}business_office{$db->re} ON {$db->le}business_office{$db->re}.{$db->le}office_entity_id{$db->re}={$db->le}office{$db->re}.{$db->le}entity_id{$db->re} ",
			"	AND {$db->le}business_office{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}office{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business_office{$db->re}.{$db->le}business_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}business_office{$db->re}.{$db->le}business_office_type_id{$db->re}=" . $db->queryValue(BusinessOffice::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}business_office{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function getParent($type="default") {
		$db = Database::getInstance();
		$relationships = BusinessBusiness::objects(null, "{$db->le}child_business_id{$db->re}='{$this->id}' AND {$db->le}business_business_type_id{$db->re}='" . BusinessBusiness::typeId($type) . "'");
		return ($relationships->count()===1) ? $relationships->get(0)->getParent() : new Business();
	}

	public function getChildIds() {
		$db = Database::getInstance();
		return BusinessBusiness::select("business_business.child_business_id", null, "business_business.parent_business_id={$this->id}");
	}

	public function getChildren() {
		return $this->hasChildren() ? Business::objects(null, "business.entity_id IN (" . $this->getChildIds()->join(",") . ")") : new Collection();
	}

	public function getChildCount() {
		return $this->getChildIds()->count();
	}

	public function hasChildren() {
		return $this->getChildCount()>0;
	}

	public function isChild() {
		return $this->getParent()->id>0;
	}

	public function isRoot() {
		return $this->id>0 && !$this->isChild();
	}

	public function getSiblingIds() {
		$db = Database::getInstance();
		return BusinessBusiness::select("business_business.child_business_id", null, "business_business.child_business_id<>'{$this->id}' AND business_business.parent_business_id=" . $db->queryValue($this->getParent()->id));
	}

	public function getSiblings() {
		return $this->hasSiblings() ? Business::objects(null, "business.entity_id IN (" . $this->getSiblingIds()->join(",") . ")") : new Collection();
	}

	public function getSiblingCount() {
		return $this->getSiblingIds()->count();
	}

	public function hasSiblings() {
		return $this->getSiblingCount()>0;
	}

	public function getDescendants() {
		$descendants = new Collection();
		foreach ($this->getChildren() as $child) {
			$descendants->add($child);
			if ($child->hasChildren()) {
				$descendants->add($child->getDescendants());
			}
		}
		return $descendants;
	}

	public function getAncestors() {
		$ancestors = new Collection();
		$child = $this;
		while ($child->isChild()) {
			$parent = $child->getParent();
			$ancestors->add($parent);
			$child = $parent;
		}
		return $ancestors;
	}

	public function getLevel() {
		$level = 0;
		$child = $this;
		while ($child->isChild()) {
			$level++;
			$child = $child->getParent();
		}
		return $level;
	}

}
?>