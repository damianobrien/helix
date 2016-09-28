<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the querygroup table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the querygroup
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called QuerygroupExtension, and should extend the QuerygroupTable
 * class.  The custom code file should be in the helix/modules/Form folder
 * and should be called QuerygroupExtension.php
 * 
 * Object -> Querygroup
 */
class QuerygroupTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $name;
	public $description;
	public $header;
	public $footer;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $name=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = $name;
		$this->description = null;
		$this->header = null;
		$this->footer = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}querygroup{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}querygroup{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}querygroup{$db->re}.{$db->le}id{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}name{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}description{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}header{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}footer{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}mdate{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}cdate{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}querygroup{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->description = $db->record["description"];
				$this->header = $db->record["header"];
				$this->footer = $db->record["footer"];
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
		$this->_initial["header"] = $this->header;
		$this->_initial["footer"] = $this->footer;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $name=null) {
		$object = new Querygroup();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}querygroup{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}querygroup{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}querygroup{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}querygroup{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}querygroup{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}querygroup{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}fdate{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}tdate{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}id{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}name{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}description{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}header{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}footer{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}mdate{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}cdate{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}querygroup{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}querygroup{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->description = $db->record["description"];
				$object->header = $db->record["header"];
				$object->footer = $db->record["footer"];
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
		$isDirty = $isDirty || ((string)$this->header !== (string)$this->_initial["header"]);
		$isDirty = $isDirty || ((string)$this->footer !== (string)$this->_initial["footer"]);
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
			"INSERT INTO {$db->le}querygroup{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}description{$db->re}, {$db->le}header{$db->re}, {$db->le}footer{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue($this->header) . ",",
				$db->queryValue($this->footer) . ",",
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
				"UPDATE {$db->le}querygroup{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}header{$db->re}={$db->queryValue($this->header)},",
					"{$db->le}footer{$db->re}={$db->queryValue($this->footer)},",
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
		$record = Querygroup::select($db->encapsulate("querygroup") . ".mdate as fdate,null as tdate,{$db->encapsulate("querygroup")}.*",null,$db->encapsulate("querygroup").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}querygroup{$dbLog->re} (",
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
				"FROM {$dbLog->le}querygroup{$dbLog->re}",
				"WHERE {$dbLog->le}querygroup{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}querygroup{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("querygroup") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("querygroup") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}querygroup{$db->le}",

			"WHERE {$db->le}querygroup{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Querygroup::select("{$db->le}querygroup{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Querygroup::select("{$db->le}querygroup{$db->re}.{$db->le}id{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}name{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}description{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}header{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}footer{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}mdate{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}cdate{$db->re}, {$db->le}querygroup{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Querygroup();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->description = $record["description"];
				$object->header = $record["header"];
				$object->footer = $record["footer"];
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
			$clauses[] = "querygroup.name LIKE '%{$keyword}%' OR querygroup.description LIKE '%{$keyword}%' OR querygroup.header LIKE '%{$keyword}%' OR querygroup.footer LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Querygroup::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Querygroup Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getQuerygroupQueryset($querysetId, $type="default") {
		return new QuerygroupQueryset(null, $this->id, $querysetId, QuerygroupQueryset::typeId($type));
	}


	public function setQueryset($queryset=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeQuerysetList($type);
		$this->addQueryset($queryset, $type);
		return $this;
	}
	public function removeQueryset($queryset, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($queryset) ? $queryset : array($queryset);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getQuerygroupQueryset($id, $type);
			if ($deleteObject) {
				$relationship->getQueryset()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeQuerysetList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return QuerygroupQueryset::deleteAll($this->id, null, $type);
		}
	}
	public function addQueryset($queryset=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($queryset)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($queryset) ? $queryset : array($queryset);
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
	public function getQueryset($type="default") {
		if (isset($this->_cache["Queryset"]) && isset($this->_cache["Queryset"][$type])) {
			$queryset = $this->_cache["Queryset"][$type];
		} else {
			$queryset = new Queryset($this->getQuerysetId($type));
		}
		$this->_cache["Queryset"][$type] = $queryset;
		return $this->_cache["Queryset"][$type];
	}
	public function getQuerysetList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getQuerysetIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Queryset::objects($order, "{$db->le}queryset{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getQuerysetId($type="default") {
		return $this->getQuerysetIds($type)->get(0);
	}
	public function getQuerysetIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}queryset{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}queryset{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}queryset{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}queryset{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}queryset{$db->re} ",
			"INNER JOIN {$db->le}querygroup_queryset{$db->re} ON {$db->le}querygroup_queryset{$db->re}.{$db->le}queryset_id{$db->re}={$db->le}queryset{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}querygroup_queryset{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}queryset{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}querygroup_queryset{$db->re}.{$db->le}querygroup_id{$db->re}={$db->queryValue($this->id)} ",
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

}
?>