<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the topic table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the topic
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called TopicExtension, and should extend the TopicTable
 * class.  The custom code file should be in the helix/modules/Forum folder
 * and should be called TopicExtension.php
 * 
 * Object -> Topic
 */
class TopicTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $name;
	public $description;
	public $views;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $name=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = $name;
		$this->description = null;
		$this->views = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}topic{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}topic{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}topic{$db->re}.{$db->le}id{$db->re}, {$db->le}topic{$db->re}.{$db->le}name{$db->re}, {$db->le}topic{$db->re}.{$db->le}description{$db->re}, {$db->le}topic{$db->re}.{$db->le}views{$db->re}, {$db->le}topic{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}topic{$db->re}.{$db->le}mdate{$db->re}, {$db->le}topic{$db->re}.{$db->le}cdate{$db->re}, {$db->le}topic{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}topic{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->description = $db->record["description"];
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
		$this->_initial["name"] = $this->name;
		$this->_initial["description"] = $this->description;
		$this->_initial["views"] = $this->views;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $name=null) {
		$object = new Topic();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}topic{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}topic{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}topic{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}topic{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}topic{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}topic{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}topic{$db->re}.{$db->le}fdate{$db->re}, {$db->le}topic{$db->re}.{$db->le}tdate{$db->re}, {$db->le}topic{$db->re}.{$db->le}id{$db->re}, {$db->le}topic{$db->re}.{$db->le}name{$db->re}, {$db->le}topic{$db->re}.{$db->le}description{$db->re}, {$db->le}topic{$db->re}.{$db->le}views{$db->re}, {$db->le}topic{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}topic{$db->re}.{$db->le}mdate{$db->re}, {$db->le}topic{$db->re}.{$db->le}cdate{$db->re}, {$db->le}topic{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}topic{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}topic{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->description = $db->record["description"];
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
		$isDirty = $isDirty || ((string)$this->name !== (string)$this->_initial["name"]);
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
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
			"INSERT INTO {$db->le}topic{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}description{$db->re}, {$db->le}views{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->description) . ",",
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
				"UPDATE {$db->le}topic{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
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
		$record = Topic::select($db->encapsulate("topic") . ".mdate as fdate,null as tdate,{$db->encapsulate("topic")}.*",null,$db->encapsulate("topic").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}topic{$dbLog->re} (",
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
				"FROM {$dbLog->le}topic{$dbLog->re}",
				"WHERE {$dbLog->le}topic{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}topic{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("topic") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("topic") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}topic{$db->le}",

			"WHERE {$db->le}topic{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Topic::select("{$db->le}topic{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Topic::select("{$db->le}topic{$db->re}.{$db->le}id{$db->re}, {$db->le}topic{$db->re}.{$db->le}name{$db->re}, {$db->le}topic{$db->re}.{$db->le}description{$db->re}, {$db->le}topic{$db->re}.{$db->le}views{$db->re}, {$db->le}topic{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}topic{$db->re}.{$db->le}mdate{$db->re}, {$db->le}topic{$db->re}.{$db->le}cdate{$db->re}, {$db->le}topic{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Topic();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->description = $record["description"];
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
			$clauses[] = "topic.name LIKE '%{$keyword}%' OR topic.description LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Topic::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Topic Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getBoardTopic($boardId, $type="default") {
		return new BoardTopic(null, $boardId, $this->id, BoardTopic::typeId($type));
	}

	public function getPostTopic($postId, $type="default") {
		return new PostTopic(null, $postId, $this->id, PostTopic::typeId($type));
	}


	public function setBoard($board=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeBoardList($type);
		$this->addBoard($board, $type);
		return $this;
	}
	public function removeBoard($board, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($board) ? $board : array($board);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getBoardTopic($id, $type);
			if ($deleteObject) {
				$relationship->getBoard()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeBoardList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return BoardTopic::deleteAll(null, $this->id, $type);
		}
	}
	public function addBoard($board=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($board)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($board) ? $board : array($board);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getBoardTopic($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getBoard($type="default") {
		if (isset($this->_cache["Board"]) && isset($this->_cache["Board"][$type])) {
			$board = $this->_cache["Board"][$type];
		} else {
			$board = new Board($this->getBoardId($type));
		}
		$this->_cache["Board"][$type] = $board;
		return $this->_cache["Board"][$type];
	}
	public function getBoardList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getBoardIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Board::objects($order, "{$db->le}board{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getBoardId($type="default") {
		return $this->getBoardIds($type)->get(0);
	}
	public function getBoardIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}board{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}board{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}board{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}board{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}board{$db->re} ",
			"INNER JOIN {$db->le}board_topic{$db->re} ON {$db->le}board_topic{$db->re}.{$db->le}board_id{$db->re}={$db->le}board{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}board_topic{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}board{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}board_topic{$db->re}.{$db->le}topic_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}board_topic{$db->re}.{$db->le}board_topic_type_id{$db->re}=" . $db->queryValue(BoardTopic::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}board_topic{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setPost($post=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removePostList($type);
		$this->addPost($post, $type);
		return $this;
	}
	public function removePost($post, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($post) ? $post : array($post);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getPostTopic($id, $type);
			if ($deleteObject) {
				$relationship->getPost()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removePostList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return PostTopic::deleteAll(null, $this->id, $type);
		}
	}
	public function addPost($post=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($post)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($post) ? $post : array($post);
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
	public function getPost($type="default") {
		if (isset($this->_cache["Post"]) && isset($this->_cache["Post"][$type])) {
			$post = $this->_cache["Post"][$type];
		} else {
			$post = new Post($this->getPostId($type));
		}
		$this->_cache["Post"][$type] = $post;
		return $this->_cache["Post"][$type];
	}
	public function getPostList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getPostIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Post::objects($order, "{$db->le}post{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getPostId($type="default") {
		return $this->getPostIds($type)->get(0);
	}
	public function getPostIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}post{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}post{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}post{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}post{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}post{$db->re} ",
			"INNER JOIN {$db->le}post_topic{$db->re} ON {$db->le}post_topic{$db->re}.{$db->le}post_id{$db->re}={$db->le}post{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}post_topic{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}post{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}post_topic{$db->re}.{$db->le}topic_id{$db->re}={$db->queryValue($this->id)} ",
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

}
?>