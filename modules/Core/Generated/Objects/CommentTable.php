<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the comment table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the comment
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called CommentExtension, and should extend the CommentTable
 * class.  The custom code file should be in the helix/modules/Core folder
 * and should be called CommentExtension.php
 * 
 * Object -> Comment
 */
class CommentTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $subject;
	public $body;
	public $createdById;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->subject = null;
		$this->body = null;
		$this->createdById = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}comment{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}comment{$db->re}.{$db->le}id{$db->re}, {$db->le}comment{$db->re}.{$db->le}subject{$db->re}, {$db->le}comment{$db->re}.{$db->le}body{$db->re}, {$db->le}comment{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}comment{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}comment{$db->re}.{$db->le}mdate{$db->re}, {$db->le}comment{$db->re}.{$db->le}cdate{$db->re}, {$db->le}comment{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}comment{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->subject = $db->record["subject"];
				$this->body = $db->record["body"];
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
		$this->_initial["subject"] = $this->subject;
		$this->_initial["body"] = $this->body;
		$this->_initial["createdById"] = $this->createdById;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Comment();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}comment{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}comment{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}comment{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}comment{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}comment{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}comment{$db->re}.{$db->le}fdate{$db->re}, {$db->le}comment{$db->re}.{$db->le}tdate{$db->re}, {$db->le}comment{$db->re}.{$db->le}id{$db->re}, {$db->le}comment{$db->re}.{$db->le}subject{$db->re}, {$db->le}comment{$db->re}.{$db->le}body{$db->re}, {$db->le}comment{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}comment{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}comment{$db->re}.{$db->le}mdate{$db->re}, {$db->le}comment{$db->re}.{$db->le}cdate{$db->re}, {$db->le}comment{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}comment{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}comment{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->subject = $db->record["subject"];
				$object->body = $db->record["body"];
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
		$isDirty = $isDirty || ((string)$this->subject !== (string)$this->_initial["subject"]);
		$isDirty = $isDirty || ((string)$this->body !== (string)$this->_initial["body"]);
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
			"INSERT INTO {$db->le}comment{$db->re} (",
			"	{$db->le}subject{$db->re}, {$db->le}body{$db->re}, {$db->le}created_by_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->subject) . ",",
				$db->queryValue($this->body) . ",",
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
				"UPDATE {$db->le}comment{$db->re} SET",
					"{$db->le}subject{$db->re}={$db->queryValue($this->subject)},",
					"{$db->le}body{$db->re}={$db->queryValue($this->body)},",
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
		$record = Comment::select($db->encapsulate("comment") . ".mdate as fdate,null as tdate,{$db->encapsulate("comment")}.*",null,$db->encapsulate("comment").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}comment{$dbLog->re} (",
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
				"FROM {$dbLog->le}comment{$dbLog->re}",
				"WHERE {$dbLog->le}comment{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}comment{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("comment") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("comment") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}comment{$db->le}",

			"WHERE {$db->le}comment{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Comment::select("{$db->le}comment{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Comment::select("{$db->le}comment{$db->re}.{$db->le}id{$db->re}, {$db->le}comment{$db->re}.{$db->le}subject{$db->re}, {$db->le}comment{$db->re}.{$db->le}body{$db->re}, {$db->le}comment{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}comment{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}comment{$db->re}.{$db->le}mdate{$db->re}, {$db->le}comment{$db->re}.{$db->le}cdate{$db->re}, {$db->le}comment{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Comment();
				$object->id = $record["id"];
				$object->subject = $record["subject"];
				$object->body = $record["body"];
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
			$clauses[] = "comment.subject LIKE '%{$keyword}%' OR comment.body LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Comment::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Comment Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getBusinessComment($businessId, $type="default") {
		return new BusinessComment(null, $businessId, $this->id, BusinessComment::typeId($type));
	}

	public function getCommentContent($contentId, $type="default") {
		return new CommentContent(null, $this->id, $contentId, CommentContent::typeId($type));
	}

	public function getCommentContact($contactId, $type="default") {
		return new CommentContact(null, $this->id, $contactId, CommentContact::typeId($type));
	}

	public function getCommentUser($userId, $type="default") {
		return new CommentUser(null, $this->id, $userId, CommentUser::typeId($type));
	}

	public function getCommentDocument($documentId, $type="default") {
		return new CommentDocument(null, $this->id, $documentId, CommentDocument::typeId($type));
	}

	public function getCommentProjectentity($projectentityId, $type="default") {
		return new CommentProjectentity(null, $this->id, $projectentityId, CommentProjectentity::typeId($type));
	}

	public function getCommentTask($taskId, $type="default") {
		return new CommentTask(null, $this->id, $taskId, CommentTask::typeId($type));
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
			$relationship = $this->getBusinessComment($id, $type);
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
			return BusinessComment::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getBusinessComment($id, $type);
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
			"INNER JOIN {$db->le}business_comment{$db->re} ON {$db->le}business_comment{$db->re}.{$db->le}business_entity_id{$db->re}={$db->le}business{$db->re}.{$db->le}entity_id{$db->re} ",
			"	AND {$db->le}business_comment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business_comment{$db->re}.{$db->le}comment_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}business_comment{$db->re}.{$db->le}business_comment_type_id{$db->re}=" . $db->queryValue(BusinessComment::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}business_comment{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setContact($contact=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeContactList($type);
		$this->addContact($contact, $type);
		return $this;
	}
	public function removeContact($contact, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($contact) ? $contact : array($contact);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getCommentContact($id, $type);
			if ($deleteObject) {
				$relationship->getContact()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeContactList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return CommentContact::deleteAll($this->id, null, $type);
		}
	}
	public function addContact($contact=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($contact)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($contact) ? $contact : array($contact);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getCommentContact($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getContact($type="default") {
		if (isset($this->_cache["Contact"]) && isset($this->_cache["Contact"][$type])) {
			$contact = $this->_cache["Contact"][$type];
		} else {
			$contact = new Contact($this->getContactId($type));
		}
		$this->_cache["Contact"][$type] = $contact;
		return $this->_cache["Contact"][$type];
	}
	public function getContactList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getContactIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Contact::objects($order, "{$db->le}contact{$db->le}.{$db->re}person_entity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getContactId($type="default") {
		return $this->getContactIds($type)->get(0);
	}
	public function getContactIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}contact{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}contact{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}contact{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}contact{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"FROM {$db->le}contact{$db->re} ",
			"INNER JOIN {$db->le}comment_contact{$db->re} ON {$db->le}comment_contact{$db->re}.{$db->le}contact_person_entity_id{$db->re}={$db->le}contact{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}comment_contact{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contact{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment_contact{$db->re}.{$db->le}comment_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}comment_contact{$db->re}.{$db->le}comment_contact_type_id{$db->re}=" . $db->queryValue(CommentContact::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}comment_contact{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setContent($content=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeContentList($type);
		$this->addContent($content, $type);
		return $this;
	}
	public function removeContent($content, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($content) ? $content : array($content);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getCommentContent($id, $type);
			if ($deleteObject) {
				$relationship->getContent()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeContentList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return CommentContent::deleteAll($this->id, null, $type);
		}
	}
	public function addContent($content=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($content)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($content) ? $content : array($content);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getCommentContent($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getContent($type="default") {
		if (isset($this->_cache["Content"]) && isset($this->_cache["Content"][$type])) {
			$content = $this->_cache["Content"][$type];
		} else {
			$content = new Content($this->getContentId($type));
		}
		$this->_cache["Content"][$type] = $content;
		return $this->_cache["Content"][$type];
	}
	public function getContentList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getContentIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Content::objects($order, "{$db->le}content{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getContentId($type="default") {
		return $this->getContentIds($type)->get(0);
	}
	public function getContentIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}content{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}content{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}content{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}content{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}content{$db->re} ",
			"INNER JOIN {$db->le}comment_content{$db->re} ON {$db->le}comment_content{$db->re}.{$db->le}content_id{$db->re}={$db->le}content{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}comment_content{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment_content{$db->re}.{$db->le}comment_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}comment_content{$db->re}.{$db->le}comment_content_type_id{$db->re}=" . $db->queryValue(CommentContent::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}comment_content{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setDocument($document=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeDocumentList($type);
		$this->addDocument($document, $type);
		return $this;
	}
	public function removeDocument($document, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($document) ? $document : array($document);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getCommentDocument($id, $type);
			if ($deleteObject) {
				$relationship->getDocument()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeDocumentList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return CommentDocument::deleteAll($this->id, null, $type);
		}
	}
	public function addDocument($document=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($document)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($document) ? $document : array($document);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getCommentDocument($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getDocument($type="default") {
		if (isset($this->_cache["Document"]) && isset($this->_cache["Document"][$type])) {
			$document = $this->_cache["Document"][$type];
		} else {
			$document = new Document($this->getDocumentId($type));
		}
		$this->_cache["Document"][$type] = $document;
		return $this->_cache["Document"][$type];
	}
	public function getDocumentList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getDocumentIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Document::objects($order, "{$db->le}document{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getDocumentId($type="default") {
		return $this->getDocumentIds($type)->get(0);
	}
	public function getDocumentIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}document{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}document{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}document{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}document{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}document{$db->re} ",
			"INNER JOIN {$db->le}comment_document{$db->re} ON {$db->le}comment_document{$db->re}.{$db->le}document_id{$db->re}={$db->le}document{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}comment_document{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}document{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment_document{$db->re}.{$db->le}comment_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}comment_document{$db->re}.{$db->le}comment_document_type_id{$db->re}=" . $db->queryValue(CommentDocument::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}comment_document{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setProjectentity($projectentity=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeProjectentityList($type);
		$this->addProjectentity($projectentity, $type);
		return $this;
	}
	public function removeProjectentity($projectentity, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($projectentity) ? $projectentity : array($projectentity);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getCommentProjectentity($id, $type);
			if ($deleteObject) {
				$relationship->getProjectentity()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeProjectentityList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return CommentProjectentity::deleteAll($this->id, null, $type);
		}
	}
	public function addProjectentity($projectentity=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($projectentity)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($projectentity) ? $projectentity : array($projectentity);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getCommentProjectentity($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getProjectentity($type="default") {
		if (isset($this->_cache["Projectentity"]) && isset($this->_cache["Projectentity"][$type])) {
			$projectentity = $this->_cache["Projectentity"][$type];
		} else {
			$projectentity = new Projectentity($this->getProjectentityId($type));
		}
		$this->_cache["Projectentity"][$type] = $projectentity;
		return $this->_cache["Projectentity"][$type];
	}
	public function getProjectentityList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getProjectentityIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Projectentity::objects($order, "{$db->le}projectentity{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getProjectentityId($type="default") {
		return $this->getProjectentityIds($type)->get(0);
	}
	public function getProjectentityIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}projectentity{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}projectentity{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}projectentity{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}projectentity{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}projectentity{$db->re} ",
			"INNER JOIN {$db->le}comment_projectentity{$db->re} ON {$db->le}comment_projectentity{$db->re}.{$db->le}projectentity_id{$db->re}={$db->le}projectentity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}comment_projectentity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}projectentity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment_projectentity{$db->re}.{$db->le}comment_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}comment_projectentity{$db->re}.{$db->le}comment_projectentity_type_id{$db->re}=" . $db->queryValue(CommentProjectentity::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}comment_projectentity{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setTask($task=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeTaskList($type);
		$this->addTask($task, $type);
		return $this;
	}
	public function removeTask($task, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($task) ? $task : array($task);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getCommentTask($id, $type);
			if ($deleteObject) {
				$relationship->getTask()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeTaskList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return CommentTask::deleteAll($this->id, null, $type);
		}
	}
	public function addTask($task=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($task)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($task) ? $task : array($task);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getCommentTask($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getTask($type="default") {
		if (isset($this->_cache["Task"]) && isset($this->_cache["Task"][$type])) {
			$task = $this->_cache["Task"][$type];
		} else {
			$task = new Task($this->getTaskId($type));
		}
		$this->_cache["Task"][$type] = $task;
		return $this->_cache["Task"][$type];
	}
	public function getTaskList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getTaskIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Task::objects($order, "{$db->le}task{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getTaskId($type="default") {
		return $this->getTaskIds($type)->get(0);
	}
	public function getTaskIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}task{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}task{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}task{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}task{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}task{$db->re} ",
			"INNER JOIN {$db->le}comment_task{$db->re} ON {$db->le}comment_task{$db->re}.{$db->le}task_id{$db->re}={$db->le}task{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}comment_task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment_task{$db->re}.{$db->le}comment_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}comment_task{$db->re}.{$db->le}comment_task_type_id{$db->re}=" . $db->queryValue(CommentTask::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}comment_task{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getCommentUser($id, $type);
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
			return CommentUser::deleteAll($this->id, null, $type);
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
				$relationship = $this->getCommentUser($id, $type);
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
			"INNER JOIN {$db->le}comment_user{$db->re} ON {$db->le}comment_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->le}user{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}comment_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment_user{$db->re}.{$db->le}comment_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}comment_user{$db->re}.{$db->le}comment_user_type_id{$db->re}=" . $db->queryValue(CommentUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}comment_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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