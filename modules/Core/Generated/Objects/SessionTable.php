<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the session table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the session
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called SessionExtension, and should extend the SessionTable
 * class.  The custom code file should be in the helix/modules/Core folder
 * and should be called SessionExtension.php
 * 
 * Object -> Session
 */
class SessionTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $hash;
	public $data;
	public $ip;
	public $requestId;
	public $requestNumber;
	public $createdById;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $hash=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->hash = isset($hash) ? $hash : uniqid();
		$this->data = null;
		$this->ip = null;
		$this->requestId = null;
		$this->requestNumber = null;
		$this->createdById = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}session{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($hash)) {
			$condition = "{$db->le}session{$db->re}.{$db->le}hash{$db->re}={$db->queryValue($hash)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}session{$db->re}.{$db->le}id{$db->re}, {$db->le}session{$db->re}.{$db->le}hash{$db->re}, {$db->le}session{$db->re}.{$db->le}data{$db->re}, {$db->le}session{$db->re}.{$db->le}ip{$db->re}, {$db->le}session{$db->re}.{$db->le}request_id{$db->re}, {$db->le}session{$db->re}.{$db->le}request_number{$db->re}, {$db->le}session{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}session{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}session{$db->re}.{$db->le}mdate{$db->re}, {$db->le}session{$db->re}.{$db->le}cdate{$db->re}, {$db->le}session{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}session{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->hash = $db->record["hash"];
				$this->data = $db->record["data"];
				$this->ip = $db->record["ip"];
				$this->requestId = $db->record["request_id"];
				$this->requestNumber = $db->record["request_number"];
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
		$this->_initial["hash"] = $this->hash;
		$this->_initial["data"] = $this->data;
		$this->_initial["ip"] = $this->ip;
		$this->_initial["requestId"] = $this->requestId;
		$this->_initial["requestNumber"] = $this->requestNumber;
		$this->_initial["createdById"] = $this->createdById;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $hash=null) {
		$object = new Session();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}session{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($hash)) {
			$condition = "{$db->le}session{$db->re}.{$db->le}hash{$db->re}={$db->queryValue($hash)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}session{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}session{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}session{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}session{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}session{$db->re}.{$db->le}fdate{$db->re}, {$db->le}session{$db->re}.{$db->le}tdate{$db->re}, {$db->le}session{$db->re}.{$db->le}id{$db->re}, {$db->le}session{$db->re}.{$db->le}hash{$db->re}, {$db->le}session{$db->re}.{$db->le}data{$db->re}, {$db->le}session{$db->re}.{$db->le}ip{$db->re}, {$db->le}session{$db->re}.{$db->le}request_id{$db->re}, {$db->le}session{$db->re}.{$db->le}request_number{$db->re}, {$db->le}session{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}session{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}session{$db->re}.{$db->le}mdate{$db->re}, {$db->le}session{$db->re}.{$db->le}cdate{$db->re}, {$db->le}session{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}session{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}session{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->hash = $db->record["hash"];
				$object->data = $db->record["data"];
				$object->ip = $db->record["ip"];
				$object->requestId = $db->record["request_id"];
				$object->requestNumber = $db->record["request_number"];
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
		$isDirty = $isDirty || ((string)$this->hash !== (string)$this->_initial["hash"]);
		$isDirty = $isDirty || ((string)$this->data !== (string)$this->_initial["data"]);
		$isDirty = $isDirty || ((string)$this->ip !== (string)$this->_initial["ip"]);
		$isDirty = $isDirty || ((string)$this->requestId !== (string)$this->_initial["requestId"]);
		$isDirty = $isDirty || ((int)$this->requestNumber !== (int)$this->_initial["requestNumber"]);
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
			"INSERT INTO {$db->le}session{$db->re} (",
			"	{$db->le}hash{$db->re}, {$db->le}data{$db->re}, {$db->le}ip{$db->re}, {$db->le}request_id{$db->re}, {$db->le}request_number{$db->re}, {$db->le}created_by_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->hash) . ",",
				$db->queryValue($this->data) . ",",
				$db->queryValue($this->ip) . ",",
				$db->queryValue($this->requestId) . ",",
				$db->queryValue(is_null($this->requestNumber)?null:(int)$this->requestNumber) . ",",
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
				"UPDATE {$db->le}session{$db->re} SET",
					"{$db->le}hash{$db->re}={$db->queryValue($this->hash)},",
					"{$db->le}data{$db->re}={$db->queryValue($this->data)},",
					"{$db->le}ip{$db->re}={$db->queryValue($this->ip)},",
					"{$db->le}request_id{$db->re}={$db->queryValue($this->requestId)},",
					"{$db->le}request_number{$db->re}={$db->queryValue(is_null($this->requestNumber)?null:(int)$this->requestNumber)},",
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
		$record = Session::select($db->encapsulate("session") . ".mdate as fdate,null as tdate,{$db->encapsulate("session")}.*",null,$db->encapsulate("session").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}session{$dbLog->re} (",
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
				"FROM {$dbLog->le}session{$dbLog->re}",
				"WHERE {$dbLog->le}session{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}session{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("session") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("session") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}session{$db->le}",

			"WHERE {$db->le}session{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Session::select("{$db->le}session{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Session::select("{$db->le}session{$db->re}.{$db->le}id{$db->re}, {$db->le}session{$db->re}.{$db->le}hash{$db->re}, {$db->le}session{$db->re}.{$db->le}data{$db->re}, {$db->le}session{$db->re}.{$db->le}ip{$db->re}, {$db->le}session{$db->re}.{$db->le}request_id{$db->re}, {$db->le}session{$db->re}.{$db->le}request_number{$db->re}, {$db->le}session{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}session{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}session{$db->re}.{$db->le}mdate{$db->re}, {$db->le}session{$db->re}.{$db->le}cdate{$db->re}, {$db->le}session{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Session();
				$object->id = $record["id"];
				$object->hash = $record["hash"];
				$object->data = $record["data"];
				$object->ip = $record["ip"];
				$object->requestId = $record["request_id"];
				$object->requestNumber = $record["request_number"];
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
			$clauses[] = "session.hash LIKE '%{$keyword}%' OR session.data LIKE '%{$keyword}%' OR session.ip LIKE '%{$keyword}%' OR session.request_id LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Session::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Session Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getSessionUser($userId, $type="default") {
		return new SessionUser(null, $this->id, $userId, SessionUser::typeId($type));
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
			$relationship = $this->getSessionUser($id, $type);
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
			return SessionUser::deleteAll($this->id, null, $type);
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
				$relationship = $this->getSessionUser($id, $type);
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
			"INNER JOIN {$db->le}session_user{$db->re} ON {$db->le}session_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->le}user{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}session_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}session_user{$db->re}.{$db->le}session_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}session_user{$db->re}.{$db->le}session_user_type_id{$db->re}=" . $db->queryValue(SessionUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}session_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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