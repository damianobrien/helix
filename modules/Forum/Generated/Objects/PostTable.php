<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the post table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the post
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called PostExtension, and should extend the PostTable
 * class.  The custom code file should be in the helix/modules/Forum folder
 * and should be called PostExtension.php
 * 
 * Object -> Post
 */
class PostTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $postTypeId;
	public $content;
	public $views;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->postTypeId = null;
		$this->content = null;
		$this->views = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}post{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}post{$db->re}.{$db->le}id{$db->re}, {$db->le}post{$db->re}.{$db->le}post_type_id{$db->re}, {$db->le}post{$db->re}.{$db->le}content{$db->re}, {$db->le}post{$db->re}.{$db->le}views{$db->re}, {$db->le}post{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}post{$db->re}.{$db->le}mdate{$db->re}, {$db->le}post{$db->re}.{$db->le}cdate{$db->re}, {$db->le}post{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}post{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->postTypeId = $db->record["post_type_id"];
				$this->content = $db->record["content"];
				$this->views = $db->record["views"];
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["postTypeId"] = $this->postTypeId;
		$this->_initial["content"] = $this->content;
		$this->_initial["views"] = $this->views;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Post();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}post{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}post{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}post{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}post{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}post{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}post{$db->re}.{$db->le}fdate{$db->re}, {$db->le}post{$db->re}.{$db->le}tdate{$db->re}, {$db->le}post{$db->re}.{$db->le}id{$db->re}, {$db->le}post{$db->re}.{$db->le}post_type_id{$db->re}, {$db->le}post{$db->re}.{$db->le}content{$db->re}, {$db->le}post{$db->re}.{$db->le}views{$db->re}, {$db->le}post{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}post{$db->re}.{$db->le}mdate{$db->re}, {$db->le}post{$db->re}.{$db->le}cdate{$db->re}, {$db->le}post{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}post{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}post{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->postTypeId = $db->record["post_type_id"];
				$object->content = $db->record["content"];
				$object->views = $db->record["views"];
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
		$isDirty = $isDirty || ((int)$this->postTypeId !== (int)$this->_initial["postTypeId"]);
		$isDirty = $isDirty || ((string)$this->content !== (string)$this->_initial["content"]);
		$isDirty = $isDirty || ((int)$this->views !== (int)$this->_initial["views"]);
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
			"INSERT INTO {$db->le}post{$db->re} (",
			"	{$db->le}post_type_id{$db->re}, {$db->le}content{$db->re}, {$db->le}views{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->postTypeId)?null:(int)$this->postTypeId) . ",",
				$db->queryValue($this->content) . ",",
				$db->queryValue(is_null($this->views)?null:(int)$this->views) . ",",
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
				"UPDATE {$db->le}post{$db->re} SET",
					"{$db->le}post_type_id{$db->re}={$db->queryValue(is_null($this->postTypeId)?null:(int)$this->postTypeId)},",
					"{$db->le}content{$db->re}={$db->queryValue($this->content)},",
					"{$db->le}views{$db->re}={$db->queryValue(is_null($this->views)?null:(int)$this->views)},",
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
		$record = Post::select($db->encapsulate("post") . ".mdate as fdate,null as tdate,{$db->encapsulate("post")}.*",null,$db->encapsulate("post").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}post{$dbLog->re} (",
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
				"FROM {$dbLog->le}post{$dbLog->re}",
				"WHERE {$dbLog->le}post{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}post{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("post") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("post") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}post{$db->le}",
			"LEFT JOIN {$db->le}post_type{$db->re} ON {$db->le}post{$db->re}.{$db->le}post_type_id{$db->re}={$db->le}post_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}post{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Post::select("{$db->le}post{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Post::select("{$db->le}post{$db->re}.{$db->le}id{$db->re}, {$db->le}post{$db->re}.{$db->le}post_type_id{$db->re}, {$db->le}post{$db->re}.{$db->le}content{$db->re}, {$db->le}post{$db->re}.{$db->le}views{$db->re}, {$db->le}post{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}post{$db->re}.{$db->le}mdate{$db->re}, {$db->le}post{$db->re}.{$db->le}cdate{$db->re}, {$db->le}post{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Post();
				$object->id = $record["id"];
				$object->postTypeId = $record["post_type_id"];
				$object->content = $record["content"];
				$object->views = $record["views"];
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
			$clauses[] = "post.content LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Post::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Post Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new PostType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new PostType($this->postTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new PostType(null, $type);
		$this->postTypeId = $type->id;
		return $this->postTypeId;
	}

	public function getPostTopic($topicId, $type="default") {
		return new PostTopic(null, $this->id, $topicId, PostTopic::typeId($type));
	}

	public function getPostUser($userId, $type="default") {
		return new PostUser(null, $this->id, $userId, PostUser::typeId($type));
	}

	public function getPostType() {
		return new PostType($this->postTypeId);
	}

	public function setPostType(PostType $postType) {
		if ($postType->id>0) {
			$this->postTypeId = $postType->id;
		}
	}

	public function setTopic($topic=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeTopicList($type);
		$this->addTopic($topic, $type);
		return $this;
	}
	public function removeTopic($topic, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($topic) ? $topic : array($topic);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getPostTopic($id, $type);
			if ($deleteObject) {
				$relationship->getTopic()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeTopicList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return PostTopic::deleteAll($this->id, null, $type);
		}
	}
	public function addTopic($topic=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($topic)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($topic) ? $topic : array($topic);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getPostTopic($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getTopic($type="default") {
		if (isset($this->_cache["Topic"]) && isset($this->_cache["Topic"][$type])) {
			$topic = $this->_cache["Topic"][$type];
		} else {
			$topic = new Topic($this->getTopicId($type));
		}
		$this->_cache["Topic"][$type] = $topic;
		return $this->_cache["Topic"][$type];
	}
	public function getTopicList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getTopicIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Topic::objects($order, "{$db->le}topic{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getTopicId($type="default") {
		return $this->getTopicIds($type)->get(0);
	}
	public function getTopicIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}topic{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}topic{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}topic{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}topic{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}topic{$db->re} ",
			"INNER JOIN {$db->le}post_topic{$db->re} ON {$db->le}post_topic{$db->re}.{$db->le}topic_id{$db->re}={$db->le}topic{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}post_topic{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}topic{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}post_topic{$db->re}.{$db->le}post_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}post_topic{$db->re}.{$db->le}post_topic_type_id{$db->re}=" . $db->queryValue(PostTopic::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}post_topic{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getPostUser($id, $type);
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
			return PostUser::deleteAll($this->id, null, $type);
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
				$relationship = $this->getPostUser($id, $type);
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
			"INNER JOIN {$db->le}post_user{$db->re} ON {$db->le}post_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->le}user{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}post_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}post_user{$db->re}.{$db->le}post_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}post_user{$db->re}.{$db->le}post_user_type_id{$db->re}=" . $db->queryValue(PostUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}post_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function getParent($type="default") {
		$db = Database::getInstance();
		$relationships = PostPost::objects(null, "{$db->le}child_post_id{$db->re}='{$this->id}' AND {$db->le}post_post_type_id{$db->re}='" . PostPost::typeId($type) . "'");
		return ($relationships->count()===1) ? $relationships->get(0)->getParent() : new Post();
	}

	public function getChildIds() {
		$db = Database::getInstance();
		return PostPost::select("post_post.child_post_id", "{$db->le}order{$db->re} ASC", "post_post.parent_post_id={$this->id}");
	}

	public function getChildren() {
		return $this->hasChildren() ? Post::objects(null, "post.id IN (" . $this->getChildIds()->join(",") . ")") : new Collection();
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
		return PostPost::select("post_post.child_post_id", "{$db->le}order{$db->re} ASC", "post_post.child_post_id<>'{$this->id}' AND post_post.parent_post_id=" . $db->queryValue($this->getParent()->id));
	}

	public function getSiblings() {
		return $this->hasSiblings() ? Post::objects(null, "post.id IN (" . $this->getSiblingIds()->join(",") . ")") : new Collection();
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