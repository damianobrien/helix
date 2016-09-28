<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the queryset table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the queryset
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called QuerysetExtension, and should extend the QuerysetTable
 * class.  The custom code file should be in the helix/modules/Form folder
 * and should be called QuerysetExtension.php
 * 
 * Object -> Queryset
 */
class QuerysetTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $name;
	public $description;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = null;
		$this->description = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}queryset{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}queryset{$db->re}.{$db->le}id{$db->re}, {$db->le}queryset{$db->re}.{$db->le}name{$db->re}, {$db->le}queryset{$db->re}.{$db->le}description{$db->re}, {$db->le}queryset{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}queryset{$db->re}.{$db->le}mdate{$db->re}, {$db->le}queryset{$db->re}.{$db->le}cdate{$db->re}, {$db->le}queryset{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}queryset{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->description = $db->record["description"];
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
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Queryset();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}queryset{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}queryset{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}queryset{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}queryset{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}queryset{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}queryset{$db->re}.{$db->le}fdate{$db->re}, {$db->le}queryset{$db->re}.{$db->le}tdate{$db->re}, {$db->le}queryset{$db->re}.{$db->le}id{$db->re}, {$db->le}queryset{$db->re}.{$db->le}name{$db->re}, {$db->le}queryset{$db->re}.{$db->le}description{$db->re}, {$db->le}queryset{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}queryset{$db->re}.{$db->le}mdate{$db->re}, {$db->le}queryset{$db->re}.{$db->le}cdate{$db->re}, {$db->le}queryset{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}queryset{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}queryset{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->description = $db->record["description"];
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
			"INSERT INTO {$db->le}queryset{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}description{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->description) . ",",
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
				"UPDATE {$db->le}queryset{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
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
		$record = Queryset::select($db->encapsulate("queryset") . ".mdate as fdate,null as tdate,{$db->encapsulate("queryset")}.*",null,$db->encapsulate("queryset").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}queryset{$dbLog->re} (",
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
				"FROM {$dbLog->le}queryset{$dbLog->re}",
				"WHERE {$dbLog->le}queryset{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}queryset{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("queryset") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("queryset") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}queryset{$db->le}",

			"WHERE {$db->le}queryset{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Queryset::select("{$db->le}queryset{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Queryset::select("{$db->le}queryset{$db->re}.{$db->le}id{$db->re}, {$db->le}queryset{$db->re}.{$db->le}name{$db->re}, {$db->le}queryset{$db->re}.{$db->le}description{$db->re}, {$db->le}queryset{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}queryset{$db->re}.{$db->le}mdate{$db->re}, {$db->le}queryset{$db->re}.{$db->le}cdate{$db->re}, {$db->le}queryset{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Queryset();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->description = $record["description"];
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
			$clauses[] = "queryset.name LIKE '%{$keyword}%' OR queryset.description LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Queryset::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Queryset Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getQueryQueryset($queryId, $type="default") {
		return new QueryQueryset(null, $queryId, $this->id, QueryQueryset::typeId($type));
	}

	public function getQuerygroupQueryset($querygroupId, $type="default") {
		return new QuerygroupQueryset(null, $querygroupId, $this->id, QuerygroupQueryset::typeId($type));
	}

	public function getQuerysetUser($userId, $type="default") {
		return new QuerysetUser(null, $this->id, $userId, QuerysetUser::typeId($type));
	}


	public function setQuery($query=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeQueryList($type);
		$this->addQuery($query, $type);
		return $this;
	}
	public function removeQuery($query, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($query) ? $query : array($query);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getQueryQueryset($id, $type);
			if ($deleteObject) {
				$relationship->getQuery()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeQueryList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return QueryQueryset::deleteAll(null, $this->id, $type);
		}
	}
	public function addQuery($query=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($query)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($query) ? $query : array($query);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getQueryQueryset($id, $type);
				$relationship->order = ++$order;
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getQuery($type="default") {
		if (isset($this->_cache["Query"]) && isset($this->_cache["Query"][$type])) {
			$query = $this->_cache["Query"][$type];
		} else {
			$query = new Query($this->getQueryId($type));
		}
		$this->_cache["Query"][$type] = $query;
		return $this->_cache["Query"][$type];
	}
	public function getQueryList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getQueryIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Query::objects($order, "{$db->le}query{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getQueryId($type="default") {
		return $this->getQueryIds($type)->get(0);
	}
	public function getQueryIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}query{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}query{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}query{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}query{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}query{$db->re} ",
			"INNER JOIN {$db->le}query_queryset{$db->re} ON {$db->le}query_queryset{$db->re}.{$db->le}query_id{$db->re}={$db->le}query{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}query_queryset{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}query{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}query_queryset{$db->re}.{$db->le}queryset_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}query_queryset{$db->re}.{$db->le}query_queryset_type_id{$db->re}=" . $db->queryValue(QueryQueryset::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}query_queryset{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setQuerygroup($querygroup=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeQuerygroupList($type);
		$this->addQuerygroup($querygroup, $type);
		return $this;
	}
	public function removeQuerygroup($querygroup, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($querygroup) ? $querygroup : array($querygroup);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getQuerygroupQueryset($id, $type);
			if ($deleteObject) {
				$relationship->getQuerygroup()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeQuerygroupList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return QuerygroupQueryset::deleteAll(null, $this->id, $type);
		}
	}
	public function addQuerygroup($querygroup=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($querygroup)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($querygroup) ? $querygroup : array($querygroup);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getQuerygroupQueryset($id, $type);
				$relationship->order = ++$order;
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getQuerygroup($type="default") {
		if (isset($this->_cache["Querygroup"]) && isset($this->_cache["Querygroup"][$type])) {
			$querygroup = $this->_cache["Querygroup"][$type];
		} else {
			$querygroup = new Querygroup($this->getQuerygroupId($type));
		}
		$this->_cache["Querygroup"][$type] = $querygroup;
		return $this->_cache["Querygroup"][$type];
	}
	public function getQuerygroupList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getQuerygroupIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Querygroup::objects($order, "{$db->le}querygroup{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getQuerygroupId($type="default") {
		return $this->getQuerygroupIds($type)->get(0);
	}
	public function getQuerygroupIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}querygroup{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}querygroup{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}querygroup{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}querygroup{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}querygroup{$db->re} ",
			"INNER JOIN {$db->le}querygroup_queryset{$db->re} ON {$db->le}querygroup_queryset{$db->re}.{$db->le}querygroup_id{$db->re}={$db->le}querygroup{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}querygroup_queryset{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}querygroup{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}querygroup_queryset{$db->re}.{$db->le}queryset_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}querygroup_queryset{$db->re}.{$db->le}querygroup_queryset_type_id{$db->re}=" . $db->queryValue(QuerygroupQueryset::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}querygroup_queryset{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setUser($user=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeUserList($type);
		$this->addUser($user, $type);
		return $this;
	}
	public function removeUser($user, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($user) ? $user : array($user);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getQuerysetUser($id, $type);
			if ($deleteObject) {
				$relationship->getUser()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeUserList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return QuerysetUser::deleteAll($this->id, null, $type);
		}
	}
	public function addUser($user=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($user)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($user) ? $user : array($user);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getQuerysetUser($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getUser($type="default") {
		if (isset($this->_cache["User"]) && isset($this->_cache["User"][$type])) {
			$user = $this->_cache["User"][$type];
		} else {
			$user = new User($this->getUserId($type));
		}
		$this->_cache["User"][$type] = $user;
		return $this->_cache["User"][$type];
	}
	public function getUserList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getUserIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : User::objects($order, "{$db->le}user{$db->le}.{$db->re}person_entity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getUserId($type="default") {
		return $this->getUserIds($type)->get(0);
	}
	public function getUserIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}user{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}user{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}user{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}user{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"FROM {$db->le}user{$db->re} ",
			"INNER JOIN {$db->le}queryset_user{$db->re} ON {$db->le}queryset_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->le}user{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}queryset_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}queryset_user{$db->re}.{$db->le}queryset_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}queryset_user{$db->re}.{$db->le}queryset_user_type_id{$db->re}=" . $db->queryValue(QuerysetUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}queryset_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

}
?>