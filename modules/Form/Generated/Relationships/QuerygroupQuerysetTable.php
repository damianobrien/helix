<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the querygroup_queryset table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the querygroup_queryset
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called QuerygroupQuerysetExtension, and should extend the QuerygroupQuerysetTable
 * class.  The custom code file should be in the helix/modules/Form folder
 * and should be called QuerygroupQuerysetExtension.php
 * 
 * Object -> QuerygroupQueryset
 */
class QuerygroupQuerysetTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $querygroupId;
	public $querysetId;
	public $querygroupQuerysetTypeId;
	public $primary;
	public $order;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $querygroupId=null, $querysetId=null, $querygroupQuerysetTypeId=1) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->querygroupId = $querygroupId;
		$this->querysetId = $querysetId;
		$this->querygroupQuerysetTypeId = $querygroupQuerysetTypeId;
		$this->primary = false;
		$this->order = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}querygroup_queryset{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($querygroupId) && isset($querysetId)) {
			$condition = "{$db->le}querygroup_id{$db->re}={$db->queryValue($querygroupId)} AND {$db->le}queryset_id{$db->re}={$db->queryValue($querysetId)} AND {$db->le}querygroup_queryset_type_id{$db->re}={$db->queryValue($querygroupQuerysetTypeId)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}querygroup_queryset{$db->re}.{$db->le}id{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}querygroup_id{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}queryset_id{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}querygroup_queryset_type_id{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}primary{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}order{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}mdate{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}cdate{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}querygroup_queryset{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->querygroupId = $db->record["querygroup_id"];
				$this->querysetId = $db->record["queryset_id"];
				$this->querygroupQuerysetTypeId = $db->record["querygroup_queryset_type_id"];
				$this->primary = $db->record["primary"];
				$this->order = $db->record["order"];
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["querygroupId"] = $this->querygroupId;
		$this->_initial["querysetId"] = $this->querysetId;
		$this->_initial["querygroupQuerysetTypeId"] = $this->querygroupQuerysetTypeId;
		$this->_initial["primary"] = $this->primary;
		$this->_initial["order"] = $this->order;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $querygroupId=null, $querysetId=null, $querygroupQuerysetTypeId=1) {
		$object = new QuerygroupQueryset();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}querygroup_queryset{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($querygroupId) && isset($querysetId)) {
			$condition = "{$db->le}querygroup_id{$db->re}={$db->queryValue($querygroupId)} AND {$db->le}queryset_id{$db->re}={$db->queryValue($querysetId)} AND {$db->le}querygroup_queryset_type_id{$db->re}={$db->queryValue($querygroupQuerysetTypeId)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}querygroup_queryset{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}querygroup_queryset{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}querygroup_queryset{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}querygroup_queryset{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}fdate{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}tdate{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}id{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}querygroup_id{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}queryset_id{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}querygroup_queryset_type_id{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}primary{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}order{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}mdate{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}cdate{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}querygroup_queryset{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}querygroup_queryset{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->querygroupId = $db->record["querygroup_id"];
				$object->querysetId = $db->record["queryset_id"];
				$object->querygroupQuerysetTypeId = $db->record["querygroup_queryset_type_id"];
				$object->primary = $db->record["primary"];
				$object->order = $db->record["order"];
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
		$isDirty = $isDirty || ((int)$this->querygroupId !== (int)$this->_initial["querygroupId"]);
		$isDirty = $isDirty || ((int)$this->querysetId !== (int)$this->_initial["querysetId"]);
		$isDirty = $isDirty || ((int)$this->querygroupQuerysetTypeId !== (int)$this->_initial["querygroupQuerysetTypeId"]);
		$isDirty = $isDirty || ((int)$this->primary !== (int)$this->_initial["primary"]);
		$isDirty = $isDirty || ((int)$this->order !== (int)$this->_initial["order"]);
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
			"INSERT INTO {$db->le}querygroup_queryset{$db->re} (",
			"	{$db->le}querygroup_id{$db->re}, {$db->le}queryset_id{$db->re}, {$db->le}querygroup_queryset_type_id{$db->re}, {$db->le}primary{$db->re}, {$db->le}order{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->querygroupId)?null:(int)$this->querygroupId) . ",",
				$db->queryValue(is_null($this->querysetId)?null:(int)$this->querysetId) . ",",
				$db->queryValue(is_null($this->querygroupQuerysetTypeId)?null:(int)$this->querygroupQuerysetTypeId) . ",",
				$db->queryValue(is_null($this->primary)?null:(int)$this->primary) . ",",
				$db->queryValue(is_null($this->order)?null:(int)$this->order) . ",",
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
				"UPDATE {$db->le}querygroup_queryset{$db->re} SET",
					"{$db->le}querygroup_id{$db->re}={$db->queryValue(is_null($this->querygroupId)?null:(int)$this->querygroupId)},",
					"{$db->le}queryset_id{$db->re}={$db->queryValue(is_null($this->querysetId)?null:(int)$this->querysetId)},",
					"{$db->le}querygroup_queryset_type_id{$db->re}={$db->queryValue(is_null($this->querygroupQuerysetTypeId)?null:(int)$this->querygroupQuerysetTypeId)},",
					"{$db->le}primary{$db->re}={$db->queryValue(is_null($this->primary)?null:(int)$this->primary)},",
					"{$db->le}order{$db->re}={$db->queryValue(is_null($this->order)?null:(int)$this->order)},",
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
		$record = QuerygroupQueryset::select($db->encapsulate("querygroup_queryset") . ".mdate as fdate,null as tdate,{$db->encapsulate("querygroup_queryset")}.*",null,$db->encapsulate("querygroup_queryset").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}querygroup_queryset{$dbLog->re} (",
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
				"FROM {$dbLog->le}querygroup_queryset{$dbLog->re}",
				"WHERE {$dbLog->le}querygroup_queryset{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}querygroup_queryset{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("querygroup_queryset") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($querygroupId=null, $querysetId=null, $type=null) {
		$db = Database::getInstance();
		$conditions = array();
		if (isset($querygroupId)) {
			$conditions[] = "{$db->le}querygroup_id{$db->re}={$db->queryValue($querygroupId)}";
		}
		if (isset($querysetId)) {
			$conditions[] = "{$db->le}queryset_id{$db->re}={$db->queryValue($querysetId)}";
		}
		if (isset($type)) {
			$conditions[] = "{$db->le}querygroup_queryset_type_id{$db->re}=" . $db->queryValue(self::typeId($type));
		}
		$condition = count($conditions)===0 ? "" : " WHERE " . implode(" AND ", $conditions);
		$query = "UPDATE " . $db->encapsulate("querygroup_queryset") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}querygroup_queryset{$db->le}",

			"WHERE {$db->le}querygroup_queryset{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
			"ORDER BY " . alt($order, "{$db->le}querygroup_queryset{$db->le}.{$db->le}order{$db->re}"),
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
		return QuerygroupQueryset::select("{$db->le}querygroup_queryset{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (QuerygroupQueryset::select("{$db->le}querygroup_queryset{$db->re}.{$db->le}id{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}querygroup_id{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}queryset_id{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}querygroup_queryset_type_id{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}primary{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}order{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}mdate{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}cdate{$db->re}, {$db->le}querygroup_queryset{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new QuerygroupQueryset();
				$object->id = $record["id"];
				$object->querygroupId = $record["querygroup_id"];
				$object->querysetId = $record["queryset_id"];
				$object->querygroupQuerysetTypeId = $record["querygroup_queryset_type_id"];
				$object->primary = $record["primary"];
				$object->order = $record["order"];
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
			$clauses[] = "id LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return QuerygroupQueryset::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "QuerygroupQueryset Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new QuerygroupQuerysetType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new QuerygroupQuerysetType($this->querygroupQuerysetTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new QuerygroupQuerysetType(null, $type);
		$this->querygroupQuerysetTypeId = $type->id;
		return $this->querygroupQuerysetTypeId;
	}

	public function getQueryquerysetQuerygroupqueryset($queryQuerysetId, $type="default") {
		return new QueryquerysetQuerygroupqueryset(null, $queryQuerysetId, $this->id, QueryquerysetQuerygroupqueryset::typeId($type));
	}

	public function getQuerygroup() {
		return new Querygroup($this->querygroupId);
	}

	public function setQuerygroup(Querygroup $querygroup) {
		if ($querygroup->id>0) {
			$this->querygroupId = $querygroup->id;
		}
	}

	public function getQueryset() {
		return new Queryset($this->querysetId);
	}

	public function setQueryset(Queryset $queryset) {
		if ($queryset->id>0) {
			$this->querysetId = $queryset->id;
		}
	}

	public function getQuerygroupQuerysetType() {
		return new QuerygroupQuerysetType($this->querygroupQuerysetTypeId);
	}

	public function setQuerygroupQuerysetType(QuerygroupQuerysetType $querygroupQuerysetType) {
		if ($querygroupQuerysetType->id>0) {
			$this->querygroupQuerysetTypeId = $querygroupQuerysetType->id;
		}
	}

	public function setQueryQueryset($queryQueryset=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeQueryQuerysetList($type);
		$this->addQueryQueryset($queryQueryset, $type);
		return $this;
	}
	public function removeQueryQueryset($queryQueryset, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($queryQueryset) ? $queryQueryset : array($queryQueryset);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getQueryquerysetQuerygroupqueryset($id, $type);
			if ($deleteObject) {
				$relationship->getQueryQueryset()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeQueryQuerysetList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return QueryquerysetQuerygroupqueryset::deleteAll(null, $this->id, $type);
		}
	}
	public function addQueryQueryset($queryQueryset=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($queryQueryset)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($queryQueryset) ? $queryQueryset : array($queryQueryset);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getQueryquerysetQuerygroupqueryset($id, $type);
				$relationship->order = ++$order;
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getQueryQueryset($type="default") {
		if (isset($this->_cache["QueryQueryset"]) && isset($this->_cache["QueryQueryset"][$type])) {
			$queryQueryset = $this->_cache["QueryQueryset"][$type];
		} else {
			$queryQueryset = new QueryQueryset($this->getQueryQuerysetId($type));
		}
		$this->_cache["QueryQueryset"][$type] = $queryQueryset;
		return $this->_cache["QueryQueryset"][$type];
	}
	public function getQueryQuerysetList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getQueryQuerysetIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : QueryQueryset::objects($order, "{$db->le}query_queryset{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getQueryQuerysetId($type="default") {
		return $this->getQueryQuerysetIds($type)->get(0);
	}
	public function getQueryQuerysetIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}query_queryset{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}query_queryset{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}query_queryset{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}query_queryset{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}query_queryset{$db->re} ",
			"INNER JOIN {$db->le}queryqueryset_querygroupqueryset{$db->re} ON {$db->le}queryqueryset_querygroupqueryset{$db->re}.{$db->le}query_queryset_id{$db->re}={$db->le}query_queryset{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}queryqueryset_querygroupqueryset{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}query_queryset{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}queryqueryset_querygroupqueryset{$db->re}.{$db->le}querygroup_queryset_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}queryqueryset_querygroupqueryset{$db->re}.{$db->le}queryqueryset_querygroupqueryset_type_id{$db->re}=" . $db->queryValue(QueryquerysetQuerygroupqueryset::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}queryqueryset_querygroupqueryset{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY " . alt("{$order}", "{$db->le}query_queryset{$db->re}.{$db->le}order{$db->re}") : ""),
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