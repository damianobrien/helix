<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the content table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the content
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called ContentExtension, and should extend the ContentTable
 * class.  The custom code file should be in the helix/modules/CMS folder
 * and should be called ContentExtension.php
 * 
 * Object -> Content
 */
class ContentTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $data;
	public $summary;
	public $contentTypeId;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->data = null;
		$this->summary = null;
		$this->contentTypeId = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}content{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}content{$db->re}.{$db->le}id{$db->re}, {$db->le}content{$db->re}.{$db->le}data{$db->re}, {$db->le}content{$db->re}.{$db->le}summary{$db->re}, {$db->le}content{$db->re}.{$db->le}content_type_id{$db->re}, {$db->le}content{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}content{$db->re}.{$db->le}mdate{$db->re}, {$db->le}content{$db->re}.{$db->le}cdate{$db->re}, {$db->le}content{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}content{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->data = $db->record["data"];
				$this->summary = $db->record["summary"];
				$this->contentTypeId = $db->record["content_type_id"];
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["data"] = $this->data;
		$this->_initial["summary"] = $this->summary;
		$this->_initial["contentTypeId"] = $this->contentTypeId;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Content();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}content{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}content{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}content{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}content{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}content{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}content{$db->re}.{$db->le}fdate{$db->re}, {$db->le}content{$db->re}.{$db->le}tdate{$db->re}, {$db->le}content{$db->re}.{$db->le}id{$db->re}, {$db->le}content{$db->re}.{$db->le}data{$db->re}, {$db->le}content{$db->re}.{$db->le}summary{$db->re}, {$db->le}content{$db->re}.{$db->le}content_type_id{$db->re}, {$db->le}content{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}content{$db->re}.{$db->le}mdate{$db->re}, {$db->le}content{$db->re}.{$db->le}cdate{$db->re}, {$db->le}content{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}content{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}content{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->data = $db->record["data"];
				$object->summary = $db->record["summary"];
				$object->contentTypeId = $db->record["content_type_id"];
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
		$isDirty = $isDirty || ((string)$this->data !== (string)$this->_initial["data"]);
		$isDirty = $isDirty || ((string)$this->summary !== (string)$this->_initial["summary"]);
		$isDirty = $isDirty || ((int)$this->contentTypeId !== (int)$this->_initial["contentTypeId"]);
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
			"INSERT INTO {$db->le}content{$db->re} (",
			"	{$db->le}data{$db->re}, {$db->le}summary{$db->re}, {$db->le}content_type_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->data) . ",",
				$db->queryValue($this->summary) . ",",
				$db->queryValue(is_null($this->contentTypeId)?null:(int)$this->contentTypeId) . ",",
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
				"UPDATE {$db->le}content{$db->re} SET",
					"{$db->le}data{$db->re}={$db->queryValue($this->data)},",
					"{$db->le}summary{$db->re}={$db->queryValue($this->summary)},",
					"{$db->le}content_type_id{$db->re}={$db->queryValue(is_null($this->contentTypeId)?null:(int)$this->contentTypeId)},",
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
		$record = Content::select($db->encapsulate("content") . ".mdate as fdate,null as tdate,{$db->encapsulate("content")}.*",null,$db->encapsulate("content").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}content{$dbLog->re} (",
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
				"FROM {$dbLog->le}content{$dbLog->re}",
				"WHERE {$dbLog->le}content{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}content{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("content") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("content") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}content{$db->le}",
			"LEFT JOIN {$db->le}content_type{$db->re} ON {$db->le}content{$db->re}.{$db->le}content_type_id{$db->re}={$db->le}content_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}content{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Content::select("{$db->le}content{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Content::select("{$db->le}content{$db->re}.{$db->le}id{$db->re}, {$db->le}content{$db->re}.{$db->le}data{$db->re}, {$db->le}content{$db->re}.{$db->le}summary{$db->re}, {$db->le}content{$db->re}.{$db->le}content_type_id{$db->re}, {$db->le}content{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}content{$db->re}.{$db->le}mdate{$db->re}, {$db->le}content{$db->re}.{$db->le}cdate{$db->re}, {$db->le}content{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Content();
				$object->id = $record["id"];
				$object->data = $record["data"];
				$object->summary = $record["summary"];
				$object->contentTypeId = $record["content_type_id"];
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
			$clauses[] = "content.data LIKE '%{$keyword}%' OR content.summary LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Content::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Content Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new ContentType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new ContentType($this->contentTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new ContentType(null, $type);
		$this->contentTypeId = $type->id;
		return $this->contentTypeId;
	}

	public function getCategoryContent($categoryId, $type="default") {
		return new CategoryContent(null, $categoryId, $this->id, CategoryContent::typeId($type));
	}

	public function getCommentContent($commentId, $type="default") {
		return new CommentContent(null, $commentId, $this->id, CommentContent::typeId($type));
	}

	public function getContentContentdate($contentdateId, $type="default") {
		return new ContentContentdate(null, $this->id, $contentdateId, ContentContentdate::typeId($type));
	}

	public function getContentGroup($groupId, $type="default") {
		return new ContentGroup(null, $this->id, $groupId, ContentGroup::typeId($type));
	}

	public function getContentPage($pageId, $type="default") {
		return new ContentPage(null, $this->id, $pageId, ContentPage::typeId($type));
	}

	public function getContentResource($resourceId, $type="default") {
		return new ContentResource(null, $this->id, $resourceId, ContentResource::typeId($type));
	}

	public function getContentTag($tagId, $type="default") {
		return new ContentTag(null, $this->id, $tagId, ContentTag::typeId($type));
	}

	public function getContentUrl($urlId, $type="default") {
		return new ContentUrl(null, $this->id, $urlId, ContentUrl::typeId($type));
	}

	public function getContentUser($userId, $type="default") {
		return new ContentUser(null, $this->id, $userId, ContentUser::typeId($type));
	}

	public function getContentType() {
		return new ContentType($this->contentTypeId);
	}

	public function setContentType(ContentType $contentType) {
		if ($contentType->id>0) {
			$this->contentTypeId = $contentType->id;
		}
	}

	public function setCategory($category=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeCategoryList($type);
		$this->addCategory($category, $type);
		return $this;
	}
	public function removeCategory($category, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($category) ? $category : array($category);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getCategoryContent($id, $type);
			if ($deleteObject) {
				$relationship->getCategory()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeCategoryList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return CategoryContent::deleteAll(null, $this->id, $type);
		}
	}
	public function addCategory($category=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($category)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($category) ? $category : array($category);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getCategoryContent($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getCategory($type="default") {
		if (isset($this->_cache["Category"]) && isset($this->_cache["Category"][$type])) {
			$category = $this->_cache["Category"][$type];
		} else {
			$category = new Category($this->getCategoryId($type));
		}
		$this->_cache["Category"][$type] = $category;
		return $this->_cache["Category"][$type];
	}
	public function getCategoryList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getCategoryIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Category::objects($order, "{$db->le}category{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getCategoryId($type="default") {
		return $this->getCategoryIds($type)->get(0);
	}
	public function getCategoryIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}category{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}category{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}category{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}category{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}category{$db->re} ",
			"INNER JOIN {$db->le}category_content{$db->re} ON {$db->le}category_content{$db->re}.{$db->le}category_id{$db->re}={$db->le}category{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}category_content{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}category{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}category_content{$db->re}.{$db->le}content_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}category_content{$db->re}.{$db->le}category_content_type_id{$db->re}=" . $db->queryValue(CategoryContent::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}category_content{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setComment($comment=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeCommentList($type);
		$this->addComment($comment, $type);
		return $this;
	}
	public function removeComment($comment, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($comment) ? $comment : array($comment);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getCommentContent($id, $type);
			if ($deleteObject) {
				$relationship->getComment()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeCommentList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return CommentContent::deleteAll(null, $this->id, $type);
		}
	}
	public function addComment($comment=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($comment)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($comment) ? $comment : array($comment);
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
	public function getComment($type="default") {
		if (isset($this->_cache["Comment"]) && isset($this->_cache["Comment"][$type])) {
			$comment = $this->_cache["Comment"][$type];
		} else {
			$comment = new Comment($this->getCommentId($type));
		}
		$this->_cache["Comment"][$type] = $comment;
		return $this->_cache["Comment"][$type];
	}
	public function getCommentList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getCommentIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Comment::objects($order, "{$db->le}comment{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getCommentId($type="default") {
		return $this->getCommentIds($type)->get(0);
	}
	public function getCommentIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}comment{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}comment{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}comment{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}comment{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}comment{$db->re} ",
			"INNER JOIN {$db->le}comment_content{$db->re} ON {$db->le}comment_content{$db->re}.{$db->le}comment_id{$db->re}={$db->le}comment{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}comment_content{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment_content{$db->re}.{$db->le}content_id{$db->re}={$db->queryValue($this->id)} ",
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

	public function setContentdate($contentdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeContentdateList($type);
		$this->addContentdate($contentdate, $type);
		return $this;
	}
	public function removeContentdate($contentdate, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($contentdate) ? $contentdate : array($contentdate);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getContentContentdate($id, $type);
			if ($deleteObject) {
				$relationship->getContentdate()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeContentdateList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ContentContentdate::deleteAll($this->id, null, $type);
		}
	}
	public function addContentdate($contentdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($contentdate)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($contentdate) ? $contentdate : array($contentdate);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getContentContentdate($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getContentdate($type="default") {
		if (isset($this->_cache["Contentdate"]) && isset($this->_cache["Contentdate"][$type])) {
			$contentdate = $this->_cache["Contentdate"][$type];
		} else {
			$contentdate = new Contentdate($this->getContentdateId($type));
		}
		$this->_cache["Contentdate"][$type] = $contentdate;
		return $this->_cache["Contentdate"][$type];
	}
	public function getContentdateList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getContentdateIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Contentdate::objects($order, "{$db->le}contentdate{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getContentdateId($type="default") {
		return $this->getContentdateIds($type)->get(0);
	}
	public function getContentdateIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}contentdate{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}contentdate{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}contentdate{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}contentdate{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}contentdate{$db->re} ",
			"INNER JOIN {$db->le}content_contentdate{$db->re} ON {$db->le}content_contentdate{$db->re}.{$db->le}contentdate_id{$db->re}={$db->le}contentdate{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}content_contentdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contentdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content_contentdate{$db->re}.{$db->le}content_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}content_contentdate{$db->re}.{$db->le}content_contentdate_type_id{$db->re}=" . $db->queryValue(ContentContentdate::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}content_contentdate{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setGroup($group=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeGroupList($type);
		$this->addGroup($group, $type);
		return $this;
	}
	public function removeGroup($group, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($group) ? $group : array($group);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getContentGroup($id, $type);
			if ($deleteObject) {
				$relationship->getGroup()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeGroupList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ContentGroup::deleteAll($this->id, null, $type);
		}
	}
	public function addGroup($group=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($group)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($group) ? $group : array($group);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getContentGroup($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getGroup($type="default") {
		if (isset($this->_cache["Group"]) && isset($this->_cache["Group"][$type])) {
			$group = $this->_cache["Group"][$type];
		} else {
			$group = new Group($this->getGroupId($type));
		}
		$this->_cache["Group"][$type] = $group;
		return $this->_cache["Group"][$type];
	}
	public function getGroupList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getGroupIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Group::objects($order, "{$db->le}group{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getGroupId($type="default") {
		return $this->getGroupIds($type)->get(0);
	}
	public function getGroupIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}group{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}group{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}group{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}group{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}group{$db->re} ",
			"INNER JOIN {$db->le}content_group{$db->re} ON {$db->le}content_group{$db->re}.{$db->le}group_id{$db->re}={$db->le}group{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}content_group{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}group{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content_group{$db->re}.{$db->le}content_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}content_group{$db->re}.{$db->le}content_group_type_id{$db->re}=" . $db->queryValue(ContentGroup::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}content_group{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setPage($page=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removePageList($type);
		$this->addPage($page, $type);
		return $this;
	}
	public function removePage($page, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($page) ? $page : array($page);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getContentPage($id, $type);
			if ($deleteObject) {
				$relationship->getPage()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removePageList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ContentPage::deleteAll($this->id, null, $type);
		}
	}
	public function addPage($page=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($page)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($page) ? $page : array($page);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getContentPage($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getPage($type="default") {
		if (isset($this->_cache["Page"]) && isset($this->_cache["Page"][$type])) {
			$page = $this->_cache["Page"][$type];
		} else {
			$page = new Page($this->getPageId($type));
		}
		$this->_cache["Page"][$type] = $page;
		return $this->_cache["Page"][$type];
	}
	public function getPageList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getPageIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Page::objects($order, "{$db->le}page{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getPageId($type="default") {
		return $this->getPageIds($type)->get(0);
	}
	public function getPageIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}page{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}page{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}page{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}page{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}page{$db->re} ",
			"INNER JOIN {$db->le}content_page{$db->re} ON {$db->le}content_page{$db->re}.{$db->le}page_id{$db->re}={$db->le}page{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}content_page{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}page{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content_page{$db->re}.{$db->le}content_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}content_page{$db->re}.{$db->le}content_page_type_id{$db->re}=" . $db->queryValue(ContentPage::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}content_page{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setResource($resource=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeResourceList($type);
		$this->addResource($resource, $type);
		return $this;
	}
	public function removeResource($resource, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($resource) ? $resource : array($resource);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getContentResource($id, $type);
			if ($deleteObject) {
				$relationship->getResource()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeResourceList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ContentResource::deleteAll($this->id, null, $type);
		}
	}
	public function addResource($resource=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($resource)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($resource) ? $resource : array($resource);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getContentResource($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getResource($type="default") {
		if (isset($this->_cache["Resource"]) && isset($this->_cache["Resource"][$type])) {
			$resource = $this->_cache["Resource"][$type];
		} else {
			$resource = new Resource($this->getResourceId($type));
		}
		$this->_cache["Resource"][$type] = $resource;
		return $this->_cache["Resource"][$type];
	}
	public function getResourceList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getResourceIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Resource::objects($order, "{$db->le}resource{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getResourceId($type="default") {
		return $this->getResourceIds($type)->get(0);
	}
	public function getResourceIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}resource{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}resource{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}resource{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}resource{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}resource{$db->re} ",
			"INNER JOIN {$db->le}content_resource{$db->re} ON {$db->le}content_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->le}resource{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}content_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content_resource{$db->re}.{$db->le}content_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}content_resource{$db->re}.{$db->le}content_resource_type_id{$db->re}=" . $db->queryValue(ContentResource::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}content_resource{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setTag($tag=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeTagList($type);
		$this->addTag($tag, $type);
		return $this;
	}
	public function removeTag($tag, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($tag) ? $tag : array($tag);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getContentTag($id, $type);
			if ($deleteObject) {
				$relationship->getTag()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeTagList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ContentTag::deleteAll($this->id, null, $type);
		}
	}
	public function addTag($tag=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($tag)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($tag) ? $tag : array($tag);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getContentTag($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getTag($type="default") {
		if (isset($this->_cache["Tag"]) && isset($this->_cache["Tag"][$type])) {
			$tag = $this->_cache["Tag"][$type];
		} else {
			$tag = new Tag($this->getTagId($type));
		}
		$this->_cache["Tag"][$type] = $tag;
		return $this->_cache["Tag"][$type];
	}
	public function getTagList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getTagIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Tag::objects($order, "{$db->le}tag{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getTagId($type="default") {
		return $this->getTagIds($type)->get(0);
	}
	public function getTagIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}tag{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}tag{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}tag{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}tag{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}tag{$db->re} ",
			"INNER JOIN {$db->le}content_tag{$db->re} ON {$db->le}content_tag{$db->re}.{$db->le}tag_id{$db->re}={$db->le}tag{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}content_tag{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}tag{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content_tag{$db->re}.{$db->le}content_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}content_tag{$db->re}.{$db->le}content_tag_type_id{$db->re}=" . $db->queryValue(ContentTag::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}content_tag{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setUrl($url=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeUrlList($type);
		$url = is_object($url) || is_int($url) ? $url : $this->getUrl($type, true)->setValue($url);
		$this->addUrl($url, $type);
		return $this;
	}
	public function removeUrl($url, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($url) ? $url : array($url);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getContentUrl($id, $type);
			if ($deleteObject) {
				$relationship->getUrl()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeUrlList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ContentUrl::deleteAll($this->id, null, $type);
		}
	}
	public function addUrl($url=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($url)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($url) ? $url : array($url);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getContentUrl($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getUrl($type="default", $getAsObject=false) {
		if (isset($this->_cache["Url"]) && isset($this->_cache["Url"][$type])) {
			$url = $this->_cache["Url"][$type];
		} else {
			$url = new Url($this->getUrlId($type));
		}
		$this->_cache["Url"][$type] = $url;
		return $getAsObject ? $this->_cache["Url"][$type] : $this->_cache["Url"][$type]->value;
	}
	public function getUrlList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getUrlIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Url::objects($order, "{$db->le}url{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getUrlId($type="default") {
		return $this->getUrlIds($type)->get(0);
	}
	public function getUrlIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}url{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}url{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}url{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}url{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}url{$db->re} ",
			"INNER JOIN {$db->le}content_url{$db->re} ON {$db->le}content_url{$db->re}.{$db->le}url_id{$db->re}={$db->le}url{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}content_url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content_url{$db->re}.{$db->le}content_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}content_url{$db->re}.{$db->le}content_url_type_id{$db->re}=" . $db->queryValue(ContentUrl::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}content_url{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getContentUser($id, $type);
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
			return ContentUser::deleteAll($this->id, null, $type);
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
				$relationship = $this->getContentUser($id, $type);
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
			"INNER JOIN {$db->le}content_user{$db->re} ON {$db->le}content_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->le}user{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}content_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content_user{$db->re}.{$db->le}content_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}content_user{$db->re}.{$db->le}content_user_type_id{$db->re}=" . $db->queryValue(ContentUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}content_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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