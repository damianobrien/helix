<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the post_user table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the post_user
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called PostUserExtension, and should extend the PostUserTable
 * class.  The custom code file should be in the helix/modules/Forum folder
 * and should be called PostUserExtension.php
 * 
 * Object -> PostUser
 */
class PostUserTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $postId;
	public $userPersonEntityId;
	public $postUserTypeId;
	public $primary;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $postId=null, $userPersonEntityId=null, $postUserTypeId=1) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->postId = $postId;
		$this->userPersonEntityId = $userPersonEntityId;
		$this->postUserTypeId = $postUserTypeId;
		$this->primary = false;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}post_user{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($postId) && isset($userPersonEntityId)) {
			$condition = "{$db->le}post_id{$db->re}={$db->queryValue($postId)} AND {$db->le}user_person_entity_id{$db->re}={$db->queryValue($userPersonEntityId)} AND {$db->le}post_user_type_id{$db->re}={$db->queryValue($postUserTypeId)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}post_user{$db->re}.{$db->le}id{$db->re}, {$db->le}post_user{$db->re}.{$db->le}post_id{$db->re}, {$db->le}post_user{$db->re}.{$db->le}user_person_entity_id{$db->re}, {$db->le}post_user{$db->re}.{$db->le}post_user_type_id{$db->re}, {$db->le}post_user{$db->re}.{$db->le}primary{$db->re}, {$db->le}post_user{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}post_user{$db->re}.{$db->le}mdate{$db->re}, {$db->le}post_user{$db->re}.{$db->le}cdate{$db->re}, {$db->le}post_user{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}post_user{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->postId = $db->record["post_id"];
				$this->userPersonEntityId = $db->record["user_person_entity_id"];
				$this->postUserTypeId = $db->record["post_user_type_id"];
				$this->primary = $db->record["primary"];
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["postId"] = $this->postId;
		$this->_initial["userPersonEntityId"] = $this->userPersonEntityId;
		$this->_initial["postUserTypeId"] = $this->postUserTypeId;
		$this->_initial["primary"] = $this->primary;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $postId=null, $userPersonEntityId=null, $postUserTypeId=1) {
		$object = new PostUser();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}post_user{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($postId) && isset($userPersonEntityId)) {
			$condition = "{$db->le}post_id{$db->re}={$db->queryValue($postId)} AND {$db->le}user_person_entity_id{$db->re}={$db->queryValue($userPersonEntityId)} AND {$db->le}post_user_type_id{$db->re}={$db->queryValue($postUserTypeId)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}post_user{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}post_user{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}post_user{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}post_user{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}post_user{$db->re}.{$db->le}fdate{$db->re}, {$db->le}post_user{$db->re}.{$db->le}tdate{$db->re}, {$db->le}post_user{$db->re}.{$db->le}id{$db->re}, {$db->le}post_user{$db->re}.{$db->le}post_id{$db->re}, {$db->le}post_user{$db->re}.{$db->le}user_person_entity_id{$db->re}, {$db->le}post_user{$db->re}.{$db->le}post_user_type_id{$db->re}, {$db->le}post_user{$db->re}.{$db->le}primary{$db->re}, {$db->le}post_user{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}post_user{$db->re}.{$db->le}mdate{$db->re}, {$db->le}post_user{$db->re}.{$db->le}cdate{$db->re}, {$db->le}post_user{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}post_user{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}post_user{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->postId = $db->record["post_id"];
				$object->userPersonEntityId = $db->record["user_person_entity_id"];
				$object->postUserTypeId = $db->record["post_user_type_id"];
				$object->primary = $db->record["primary"];
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
		$isDirty = $isDirty || ((int)$this->postId !== (int)$this->_initial["postId"]);
		$isDirty = $isDirty || ((int)$this->userPersonEntityId !== (int)$this->_initial["userPersonEntityId"]);
		$isDirty = $isDirty || ((int)$this->postUserTypeId !== (int)$this->_initial["postUserTypeId"]);
		$isDirty = $isDirty || ((int)$this->primary !== (int)$this->_initial["primary"]);
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
			"INSERT INTO {$db->le}post_user{$db->re} (",
			"	{$db->le}post_id{$db->re}, {$db->le}user_person_entity_id{$db->re}, {$db->le}post_user_type_id{$db->re}, {$db->le}primary{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->postId)?null:(int)$this->postId) . ",",
				$db->queryValue(is_null($this->userPersonEntityId)?null:(int)$this->userPersonEntityId) . ",",
				$db->queryValue(is_null($this->postUserTypeId)?null:(int)$this->postUserTypeId) . ",",
				$db->queryValue(is_null($this->primary)?null:(int)$this->primary) . ",",
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
				"UPDATE {$db->le}post_user{$db->re} SET",
					"{$db->le}post_id{$db->re}={$db->queryValue(is_null($this->postId)?null:(int)$this->postId)},",
					"{$db->le}user_person_entity_id{$db->re}={$db->queryValue(is_null($this->userPersonEntityId)?null:(int)$this->userPersonEntityId)},",
					"{$db->le}post_user_type_id{$db->re}={$db->queryValue(is_null($this->postUserTypeId)?null:(int)$this->postUserTypeId)},",
					"{$db->le}primary{$db->re}={$db->queryValue(is_null($this->primary)?null:(int)$this->primary)},",
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
		$record = PostUser::select($db->encapsulate("post_user") . ".mdate as fdate,null as tdate,{$db->encapsulate("post_user")}.*",null,$db->encapsulate("post_user").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}post_user{$dbLog->re} (",
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
				"FROM {$dbLog->le}post_user{$dbLog->re}",
				"WHERE {$dbLog->le}post_user{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}post_user{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("post_user") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($postId=null, $userId=null, $type=null) {
		$db = Database::getInstance();
		$conditions = array();
		if (isset($postId)) {
			$conditions[] = "{$db->le}post_id{$db->re}={$db->queryValue($postId)}";
		}
		if (isset($userId)) {
			$conditions[] = "{$db->le}user_person_entity_id{$db->re}={$db->queryValue($userId)}";
		}
		if (isset($type)) {
			$conditions[] = "{$db->le}post_user_type_id{$db->re}=" . $db->queryValue(self::typeId($type));
		}
		$condition = count($conditions)===0 ? "" : " WHERE " . implode(" AND ", $conditions);
		$query = "UPDATE " . $db->encapsulate("post_user") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}post_user{$db->le}",

			"WHERE {$db->le}post_user{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return PostUser::select("{$db->le}post_user{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (PostUser::select("{$db->le}post_user{$db->re}.{$db->le}id{$db->re}, {$db->le}post_user{$db->re}.{$db->le}post_id{$db->re}, {$db->le}post_user{$db->re}.{$db->le}user_person_entity_id{$db->re}, {$db->le}post_user{$db->re}.{$db->le}post_user_type_id{$db->re}, {$db->le}post_user{$db->re}.{$db->le}primary{$db->re}, {$db->le}post_user{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}post_user{$db->re}.{$db->le}mdate{$db->re}, {$db->le}post_user{$db->re}.{$db->le}cdate{$db->re}, {$db->le}post_user{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new PostUser();
				$object->id = $record["id"];
				$object->postId = $record["post_id"];
				$object->userPersonEntityId = $record["user_person_entity_id"];
				$object->postUserTypeId = $record["post_user_type_id"];
				$object->primary = $record["primary"];
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
		return PostUser::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "PostUser Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new PostUserType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new PostUserType($this->postUserTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new PostUserType(null, $type);
		$this->postUserTypeId = $type->id;
		return $this->postUserTypeId;
	}


	public function getPost() {
		return new Post($this->postId);
	}

	public function setPost(Post $post) {
		if ($post->id>0) {
			$this->postId = $post->id;
		}
	}

	public function getUser() {
		return new User($this->userPersonEntityId);
	}

	public function setUser(User $user) {
		if ($user->id>0) {
			$this->userPersonEntityId = $user->id;
		}
	}

	public function getPostUserType() {
		return new PostUserType($this->postUserTypeId);
	}

	public function setPostUserType(PostUserType $postUserType) {
		if ($postUserType->id>0) {
			$this->postUserTypeId = $postUserType->id;
		}
	}


}
?>