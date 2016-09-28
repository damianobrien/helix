<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the query table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the query
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called QueryExtension, and should extend the QueryTable
 * class.  The custom code file should be in the helix/modules/Form folder
 * and should be called QueryExtension.php
 * 
 * Object -> Query
 */
class QueryTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $prompt;
	public $queryTypeId;
	public $description;
	public $comment;
	public $text;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->prompt = null;
		$this->queryTypeId = null;
		$this->description = null;
		$this->comment = null;
		$this->text = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}query{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}query{$db->re}.{$db->le}id{$db->re}, {$db->le}query{$db->re}.{$db->le}prompt{$db->re}, {$db->le}query{$db->re}.{$db->le}query_type_id{$db->re}, {$db->le}query{$db->re}.{$db->le}description{$db->re}, {$db->le}query{$db->re}.{$db->le}comment{$db->re}, {$db->le}query{$db->re}.{$db->le}text{$db->re}, {$db->le}query{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}query{$db->re}.{$db->le}mdate{$db->re}, {$db->le}query{$db->re}.{$db->le}cdate{$db->re}, {$db->le}query{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}query{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->prompt = $db->record["prompt"];
				$this->queryTypeId = $db->record["query_type_id"];
				$this->description = $db->record["description"];
				$this->comment = $db->record["comment"];
				$this->text = $db->record["text"];
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["prompt"] = $this->prompt;
		$this->_initial["queryTypeId"] = $this->queryTypeId;
		$this->_initial["description"] = $this->description;
		$this->_initial["comment"] = $this->comment;
		$this->_initial["text"] = $this->text;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Query();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}query{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}query{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}query{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}query{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}query{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}query{$db->re}.{$db->le}fdate{$db->re}, {$db->le}query{$db->re}.{$db->le}tdate{$db->re}, {$db->le}query{$db->re}.{$db->le}id{$db->re}, {$db->le}query{$db->re}.{$db->le}prompt{$db->re}, {$db->le}query{$db->re}.{$db->le}query_type_id{$db->re}, {$db->le}query{$db->re}.{$db->le}description{$db->re}, {$db->le}query{$db->re}.{$db->le}comment{$db->re}, {$db->le}query{$db->re}.{$db->le}text{$db->re}, {$db->le}query{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}query{$db->re}.{$db->le}mdate{$db->re}, {$db->le}query{$db->re}.{$db->le}cdate{$db->re}, {$db->le}query{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}query{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}query{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->prompt = $db->record["prompt"];
				$object->queryTypeId = $db->record["query_type_id"];
				$object->description = $db->record["description"];
				$object->comment = $db->record["comment"];
				$object->text = $db->record["text"];
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
		$isDirty = $isDirty || ((string)$this->prompt !== (string)$this->_initial["prompt"]);
		$isDirty = $isDirty || ((int)$this->queryTypeId !== (int)$this->_initial["queryTypeId"]);
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
		$isDirty = $isDirty || ((int)$this->comment !== (int)$this->_initial["comment"]);
		$isDirty = $isDirty || ((int)$this->text !== (int)$this->_initial["text"]);
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
			"INSERT INTO {$db->le}query{$db->re} (",
			"	{$db->le}prompt{$db->re}, {$db->le}query_type_id{$db->re}, {$db->le}description{$db->re}, {$db->le}comment{$db->re}, {$db->le}text{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->prompt) . ",",
				$db->queryValue(is_null($this->queryTypeId)?null:(int)$this->queryTypeId) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue(is_null($this->comment)?null:(int)$this->comment) . ",",
				$db->queryValue(is_null($this->text)?null:(int)$this->text) . ",",
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
				"UPDATE {$db->le}query{$db->re} SET",
					"{$db->le}prompt{$db->re}={$db->queryValue($this->prompt)},",
					"{$db->le}query_type_id{$db->re}={$db->queryValue(is_null($this->queryTypeId)?null:(int)$this->queryTypeId)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}comment{$db->re}={$db->queryValue(is_null($this->comment)?null:(int)$this->comment)},",
					"{$db->le}text{$db->re}={$db->queryValue(is_null($this->text)?null:(int)$this->text)},",
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
		$record = Query::select($db->encapsulate("query") . ".mdate as fdate,null as tdate,{$db->encapsulate("query")}.*",null,$db->encapsulate("query").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}query{$dbLog->re} (",
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
				"FROM {$dbLog->le}query{$dbLog->re}",
				"WHERE {$dbLog->le}query{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}query{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("query") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("query") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}query{$db->le}",
			"LEFT JOIN {$db->le}query_type{$db->re} ON {$db->le}query{$db->re}.{$db->le}query_type_id{$db->re}={$db->le}query_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}query{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Query::select("{$db->le}query{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Query::select("{$db->le}query{$db->re}.{$db->le}id{$db->re}, {$db->le}query{$db->re}.{$db->le}prompt{$db->re}, {$db->le}query{$db->re}.{$db->le}query_type_id{$db->re}, {$db->le}query{$db->re}.{$db->le}description{$db->re}, {$db->le}query{$db->re}.{$db->le}comment{$db->re}, {$db->le}query{$db->re}.{$db->le}text{$db->re}, {$db->le}query{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}query{$db->re}.{$db->le}mdate{$db->re}, {$db->le}query{$db->re}.{$db->le}cdate{$db->re}, {$db->le}query{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Query();
				$object->id = $record["id"];
				$object->prompt = $record["prompt"];
				$object->queryTypeId = $record["query_type_id"];
				$object->description = $record["description"];
				$object->comment = $record["comment"];
				$object->text = $record["text"];
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
			$clauses[] = "query.prompt LIKE '%{$keyword}%' OR query.description LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Query::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Query Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new QueryType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new QueryType($this->queryTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new QueryType(null, $type);
		$this->queryTypeId = $type->id;
		return $this->queryTypeId;
	}

	public function getOptionsetQuery($optionsetId, $type="default") {
		return new OptionsetQuery(null, $optionsetId, $this->id, OptionsetQuery::typeId($type));
	}

	public function getQueryQueryset($querysetId, $type="default") {
		return new QueryQueryset(null, $this->id, $querysetId, QueryQueryset::typeId($type));
	}

	public function getQueryType() {
		return new QueryType($this->queryTypeId);
	}

	public function setQueryType(QueryType $queryType) {
		if ($queryType->id>0) {
			$this->queryTypeId = $queryType->id;
		}
	}

	public function setOptionset($optionset=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeOptionsetList($type);
		$this->addOptionset($optionset, $type);
		return $this;
	}
	public function removeOptionset($optionset, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($optionset) ? $optionset : array($optionset);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getOptionsetQuery($id, $type);
			if ($deleteObject) {
				$relationship->getOptionset()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeOptionsetList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return OptionsetQuery::deleteAll(null, $this->id, $type);
		}
	}
	public function addOptionset($optionset=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($optionset)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($optionset) ? $optionset : array($optionset);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getOptionsetQuery($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getOptionset($type="default") {
		if (isset($this->_cache["Optionset"]) && isset($this->_cache["Optionset"][$type])) {
			$optionset = $this->_cache["Optionset"][$type];
		} else {
			$optionset = new Optionset($this->getOptionsetId($type));
		}
		$this->_cache["Optionset"][$type] = $optionset;
		return $this->_cache["Optionset"][$type];
	}
	public function getOptionsetList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getOptionsetIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Optionset::objects($order, "{$db->le}optionset{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getOptionsetId($type="default") {
		return $this->getOptionsetIds($type)->get(0);
	}
	public function getOptionsetIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}optionset{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}optionset{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}optionset{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}optionset{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}optionset{$db->re} ",
			"INNER JOIN {$db->le}optionset_query{$db->re} ON {$db->le}optionset_query{$db->re}.{$db->le}optionset_id{$db->re}={$db->le}optionset{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}optionset_query{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}optionset{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}optionset_query{$db->re}.{$db->le}query_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}optionset_query{$db->re}.{$db->le}optionset_query_type_id{$db->re}=" . $db->queryValue(OptionsetQuery::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}optionset_query{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getQueryQueryset($id, $type);
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
			return QueryQueryset::deleteAll($this->id, null, $type);
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
				$relationship = $this->getQueryQueryset($id, $type);
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
			"INNER JOIN {$db->le}query_queryset{$db->re} ON {$db->le}query_queryset{$db->re}.{$db->le}queryset_id{$db->re}={$db->le}queryset{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}query_queryset{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}queryset{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}query_queryset{$db->re}.{$db->le}query_id{$db->re}={$db->queryValue($this->id)} ",
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

}
?>