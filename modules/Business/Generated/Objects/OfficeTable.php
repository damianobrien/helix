<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the office table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the office
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called OfficeExtension, and should extend the OfficeTable
 * class.  The custom code file should be in the helix/modules/Business folder
 * and should be called OfficeExtension.php
 * 
 * Object -> Entity -> Office
 */
class OfficeTable extends Entity {
	public $logSequence;
	public $fdate;
	public $tdate;

	public $name;
	public $abbreviation;
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
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}office{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}office{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		} else if (isset($abbreviation)) {
			$condition = "{$db->le}office{$db->re}.{$db->le}abbreviation{$db->re}={$db->queryValue($abbreviation)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}entity{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}office{$db->re}.{$db->le}name{$db->re}, {$db->le}office{$db->re}.{$db->le}abbreviation{$db->re}, {$db->le}office{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}office{$db->re}.{$db->le}mdate{$db->re}, {$db->le}office{$db->re}.{$db->le}cdate{$db->re}, {$db->le}office{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}office{$db->re}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}office{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->description = $db->record["description"];
				$this->entityTypeId = $db->record["entity_type_id"];
				$this->createdById = $db->record["created_by_id"];
				$this->name = $db->record["name"];
				$this->abbreviation = $db->record["abbreviation"];
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
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $name=null, $abbreviation=null) {
		$object = new Office();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}office{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}office{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		} else if (isset($abbreviation)) {
			$condition = "{$db->le}office{$db->re}.{$db->le}abbreviation{$db->re}={$db->queryValue($abbreviation)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}office{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}office{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}office{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}entity{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}entity{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}entity{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}office{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}office{$db->re}.{$db->le}fdate{$db->re}, {$db->le}office{$db->re}.{$db->le}tdate{$db->re}, {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}entity{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}office{$db->re}.{$db->le}name{$db->re}, {$db->le}office{$db->re}.{$db->le}abbreviation{$db->re}, {$db->le}office{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}office{$db->re}.{$db->le}mdate{$db->re}, {$db->le}office{$db->re}.{$db->le}cdate{$db->re}, {$db->le}office{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}office{$db->re}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}office{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$query .= "ORDER BY {$db->le}office{$db->re}.log_sequence desc limit 1";
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
			"INSERT INTO {$db->le}office{$db->re} (",
			"	{$db->le}entity_id{$db->re}, {$db->le}name{$db->re}, {$db->le}abbreviation{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->id)?null:(int)$this->id) . ",",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->abbreviation) . ",",
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
				"UPDATE {$db->le}office{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}abbreviation{$db->re}={$db->queryValue($this->abbreviation)},",
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
		$record = Office::select($db->encapsulate("office") . ".mdate as fdate,null as tdate,{$db->encapsulate("office")}.*",null,$db->encapsulate("office").".entity_id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}office{$dbLog->re} (",
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
				"FROM {$dbLog->le}office{$dbLog->re}",
				"WHERE {$dbLog->le}office{$dbLog->re}.{$dbLog->le}entity_id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}office{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("office") . " WHERE entity_id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("office") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}office{$db->le}",
			"INNER JOIN {$db->le}entity{$db->re} ON {$db->le}office{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}entity_type{$db->re} ON {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}={$db->le}entity_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}office{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Office::select("{$db->le}office{$db->le}.entity_id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Office::select("{$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}entity{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}office{$db->re}.{$db->le}name{$db->re}, {$db->le}office{$db->re}.{$db->le}abbreviation{$db->re}, {$db->le}office{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}office{$db->re}.{$db->le}mdate{$db->re}, {$db->le}office{$db->re}.{$db->le}cdate{$db->re}, {$db->le}office{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Office();
				$object->id = $record["id"];
				$object->description = $record["description"];
				$object->entityTypeId = $record["entity_type_id"];
				$object->createdById = $record["created_by_id"];
				$object->name = $record["name"];
				$object->abbreviation = $record["abbreviation"];
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
			$clauses[] = "entity.description LIKE '%{$keyword}%' OR office.name LIKE '%{$keyword}%' OR office.abbreviation LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Office::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Office Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getAssetOffice($assetId, $type="default") {
		return new AssetOffice(null, $assetId, $this->id, AssetOffice::typeId($type));
	}

	public function getBusinessOffice($businessId, $type="default") {
		return new BusinessOffice(null, $businessId, $this->id, BusinessOffice::typeId($type));
	}

	public function getEmployeeOffice($employeeId, $type="default") {
		return new EmployeeOffice(null, $employeeId, $this->id, EmployeeOffice::typeId($type));
	}

	public function getProjectOffice($projectId, $type="default") {
		return new ProjectOffice(null, $this->id, $projectId, ProjectOffice::typeId($type));
	}

	public function getEntity() {
		return new Entity($this->id);
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
			$relationship = $this->getAssetOffice($id, $type);
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
			return AssetOffice::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getAssetOffice($id, $type);
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
			"INNER JOIN {$db->le}asset_office{$db->re} ON {$db->le}asset_office{$db->re}.{$db->le}asset_id{$db->re}={$db->le}asset{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}asset_office{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset_office{$db->re}.{$db->le}office_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}asset_office{$db->re}.{$db->le}asset_office_type_id{$db->re}=" . $db->queryValue(AssetOffice::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}asset_office{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getBusinessOffice($id, $type);
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
			return BusinessOffice::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getBusinessOffice($id, $type);
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
			"INNER JOIN {$db->le}business_office{$db->re} ON {$db->le}business_office{$db->re}.{$db->le}business_entity_id{$db->re}={$db->le}business{$db->re}.{$db->le}entity_id{$db->re} ",
			"	AND {$db->le}business_office{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business_office{$db->re}.{$db->le}office_entity_id{$db->re}={$db->queryValue($this->id)} ",
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
			$relationship = $this->getEmployeeOffice($id, $type);
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
			return EmployeeOffice::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getEmployeeOffice($id, $type);
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
			"INNER JOIN {$db->le}employee_office{$db->re} ON {$db->le}employee_office{$db->re}.{$db->le}employee_person_entity_id{$db->re}={$db->le}employee{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}employee_office{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}employee{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}employee_office{$db->re}.{$db->le}office_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}employee_office{$db->re}.{$db->le}employee_office_type_id{$db->re}=" . $db->queryValue(EmployeeOffice::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}employee_office{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setProject($project=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeProjectList($type);
		$this->addProject($project, $type);
		return $this;
	}
	public function removeProject($project, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($project) ? $project : array($project);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getProjectOffice($id, $type);
			if ($deleteObject) {
				$relationship->getProject()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeProjectList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ProjectOffice::deleteAll(null, $this->id, $type);
		}
	}
	public function addProject($project=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($project)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($project) ? $project : array($project);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getProjectOffice($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getProject($type="default") {
		if (isset($this->_cache["Project"]) && isset($this->_cache["Project"][$type])) {
			$project = $this->_cache["Project"][$type];
		} else {
			$project = new Project($this->getProjectId($type));
		}
		$this->_cache["Project"][$type] = $project;
		return $this->_cache["Project"][$type];
	}
	public function getProjectList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getProjectIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Project::objects($order, "{$db->le}project{$db->le}.{$db->re}projectentity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getProjectId($type="default") {
		return $this->getProjectIds($type)->get(0);
	}
	public function getProjectIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}project{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}project{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}project{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}project{$db->re}.{$db->le}projectentity_id{$db->re} ",
			"FROM {$db->le}project{$db->re} ",
			"INNER JOIN {$db->le}project_office{$db->re} ON {$db->le}project_office{$db->re}.{$db->le}project_projectentity_id{$db->re}={$db->le}project{$db->re}.{$db->le}projectentity_id{$db->re} ",
			"	AND {$db->le}project_office{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}project{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}project_office{$db->re}.{$db->le}office_entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}project_office{$db->re}.{$db->le}project_office_type_id{$db->re}=" . $db->queryValue(ProjectOffice::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}project_office{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["projectentity_id"];
		}
		
		return new Collection($ids);
	}

}
?>