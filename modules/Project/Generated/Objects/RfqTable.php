<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the rfq table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the rfq
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called RfqExtension, and should extend the RfqTable
 * class.  The custom code file should be in the helix/modules/Project folder
 * and should be called RfqExtension.php
 * 
 * Object -> Projectentity -> Rfq
 */
class RfqTable extends Projectentity {
	public $logSequence;
	public $fdate;
	public $tdate;

	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $name=null, $code=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = $name;
		$this->code = $code;
		$this->description = null;
		$this->projectentitystatusId = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}rfq{$db->re}.{$db->le}projectentity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}projectentity{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		} else if (isset($code)) {
			$condition = "{$db->le}projectentity{$db->re}.{$db->le}code{$db->re}={$db->queryValue($code)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}projectentity{$db->re}.{$db->le}id{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}name{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}code{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}description{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}projectentitystatus_id{$db->re}, {$db->le}rfq{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}rfq{$db->re}.{$db->le}mdate{$db->re}, {$db->le}rfq{$db->re}.{$db->le}cdate{$db->re}, {$db->le}rfq{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}rfq{$db->re}",
			"INNER JOIN {$db->le}projectentity{$db->re} ON {$db->le}rfq{$db->re}.{$db->le}projectentity_id{$db->re}={$db->le}projectentity{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->code = $db->record["code"];
				$this->description = $db->record["description"];
				$this->projectentitystatusId = $db->record["projectentitystatus_id"];
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
		$this->_initial["code"] = $this->code;
		$this->_initial["description"] = $this->description;
		$this->_initial["projectentitystatusId"] = $this->projectentitystatusId;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $name=null, $code=null) {
		$object = new Rfq();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}rfq{$db->re}.{$db->le}projectentity_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}projectentity{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		} else if (isset($code)) {
			$condition = "{$db->le}projectentity{$db->re}.{$db->le}code{$db->re}={$db->queryValue($code)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}rfq{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}rfq{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}rfq{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}projectentity{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}projectentity{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}projectentity{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}rfq{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}rfq{$db->re}.{$db->le}fdate{$db->re}, {$db->le}rfq{$db->re}.{$db->le}tdate{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}id{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}name{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}code{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}description{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}projectentitystatus_id{$db->re}, {$db->le}rfq{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}rfq{$db->re}.{$db->le}mdate{$db->re}, {$db->le}rfq{$db->re}.{$db->le}cdate{$db->re}, {$db->le}rfq{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}rfq{$db->re}",
			"INNER JOIN {$db->le}projectentity{$db->re} ON {$db->le}rfq{$db->re}.{$db->le}projectentity_id{$db->re}={$db->le}projectentity{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$query .= "ORDER BY {$db->le}rfq{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->code = $db->record["code"];
				$object->description = $db->record["description"];
				$object->projectentitystatusId = $db->record["projectentitystatus_id"];
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
		$isDirty = $isDirty || ((string)$this->code !== (string)$this->_initial["code"]);
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
		$isDirty = $isDirty || ((int)$this->projectentitystatusId !== (int)$this->_initial["projectentitystatusId"]);
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
			"INSERT INTO {$db->le}rfq{$db->re} (",
			"	{$db->le}projectentity_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->id)?null:(int)$this->id) . ",",
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
				"UPDATE {$db->le}rfq{$db->re} SET",
					"{$db->le}updated_by_id{$db->re}={$db->queryValue((int)$session->getUserId())},",
					"{$db->le}mdate{$db->re}={$db->queryValue(timestamp())},",
					"{$db->le}deleted{$db->re}={$db->queryValue(is_null($this->deleted)?null:(int)$this->deleted)}",
				"WHERE projectentity_id={$db->queryValue((int)$this->id)}"
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
		$record = Rfq::select($db->encapsulate("rfq") . ".mdate as fdate,null as tdate,{$db->encapsulate("rfq")}.*",null,$db->encapsulate("rfq").".projectentity_id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}rfq{$dbLog->re} (",
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
				"FROM {$dbLog->le}rfq{$dbLog->re}",
				"WHERE {$dbLog->le}rfq{$dbLog->re}.{$dbLog->le}projectentity_id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}rfq{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("rfq") . " WHERE projectentity_id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("rfq") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}rfq{$db->le}",
			"INNER JOIN {$db->le}projectentity{$db->re} ON {$db->le}rfq{$db->re}.{$db->le}projectentity_id{$db->re}={$db->le}projectentity{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}projectentitystatus{$db->re} ON {$db->le}projectentity{$db->re}.{$db->le}projectentitystatus_id{$db->re}={$db->le}projectentitystatus{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}rfq{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Rfq::select("{$db->le}rfq{$db->le}.projectentity_id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Rfq::select("{$db->le}projectentity{$db->re}.{$db->le}id{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}name{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}code{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}description{$db->re}, {$db->le}projectentity{$db->re}.{$db->le}projectentitystatus_id{$db->re}, {$db->le}rfq{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}rfq{$db->re}.{$db->le}mdate{$db->re}, {$db->le}rfq{$db->re}.{$db->le}cdate{$db->re}, {$db->le}rfq{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Rfq();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->code = $record["code"];
				$object->description = $record["description"];
				$object->projectentitystatusId = $record["projectentitystatus_id"];
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
			$clauses[] = "projectentity.name LIKE '%{$keyword}%' OR projectentity.code LIKE '%{$keyword}%' OR projectentity.description LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Rfq::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Rfq Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}



	public function getProjectentity() {
		return new Projectentity($this->id);
	}


}
?>