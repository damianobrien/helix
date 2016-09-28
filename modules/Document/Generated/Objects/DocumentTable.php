<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the document table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the document
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called DocumentExtension, and should extend the DocumentTable
 * class.  The custom code file should be in the helix/modules/Document folder
 * and should be called DocumentExtension.php
 * 
 * Object -> Document
 */
class DocumentTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $title;
	public $description;
	public $summary;
	public $code;
	public $revision;
	public $documentTypeId;
	public $documentstatusId;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->title = null;
		$this->description = null;
		$this->summary = null;
		$this->code = null;
		$this->revision = null;
		$this->documentTypeId = null;
		$this->documentstatusId = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}document{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}document{$db->re}.{$db->le}id{$db->re}, {$db->le}document{$db->re}.{$db->le}title{$db->re}, {$db->le}document{$db->re}.{$db->le}description{$db->re}, {$db->le}document{$db->re}.{$db->le}summary{$db->re}, {$db->le}document{$db->re}.{$db->le}code{$db->re}, {$db->le}document{$db->re}.{$db->le}revision{$db->re}, {$db->le}document{$db->re}.{$db->le}document_type_id{$db->re}, {$db->le}document{$db->re}.{$db->le}documentstatus_id{$db->re}, {$db->le}document{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}document{$db->re}.{$db->le}mdate{$db->re}, {$db->le}document{$db->re}.{$db->le}cdate{$db->re}, {$db->le}document{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}document{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->title = $db->record["title"];
				$this->description = $db->record["description"];
				$this->summary = $db->record["summary"];
				$this->code = $db->record["code"];
				$this->revision = $db->record["revision"];
				$this->documentTypeId = $db->record["document_type_id"];
				$this->documentstatusId = $db->record["documentstatus_id"];
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["title"] = $this->title;
		$this->_initial["description"] = $this->description;
		$this->_initial["summary"] = $this->summary;
		$this->_initial["code"] = $this->code;
		$this->_initial["revision"] = $this->revision;
		$this->_initial["documentTypeId"] = $this->documentTypeId;
		$this->_initial["documentstatusId"] = $this->documentstatusId;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Document();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}document{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}document{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}document{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}document{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}document{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}document{$db->re}.{$db->le}fdate{$db->re}, {$db->le}document{$db->re}.{$db->le}tdate{$db->re}, {$db->le}document{$db->re}.{$db->le}id{$db->re}, {$db->le}document{$db->re}.{$db->le}title{$db->re}, {$db->le}document{$db->re}.{$db->le}description{$db->re}, {$db->le}document{$db->re}.{$db->le}summary{$db->re}, {$db->le}document{$db->re}.{$db->le}code{$db->re}, {$db->le}document{$db->re}.{$db->le}revision{$db->re}, {$db->le}document{$db->re}.{$db->le}document_type_id{$db->re}, {$db->le}document{$db->re}.{$db->le}documentstatus_id{$db->re}, {$db->le}document{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}document{$db->re}.{$db->le}mdate{$db->re}, {$db->le}document{$db->re}.{$db->le}cdate{$db->re}, {$db->le}document{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}document{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}document{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->title = $db->record["title"];
				$object->description = $db->record["description"];
				$object->summary = $db->record["summary"];
				$object->code = $db->record["code"];
				$object->revision = $db->record["revision"];
				$object->documentTypeId = $db->record["document_type_id"];
				$object->documentstatusId = $db->record["documentstatus_id"];
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
		$isDirty = $isDirty || ((string)$this->title !== (string)$this->_initial["title"]);
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
		$isDirty = $isDirty || ((string)$this->summary !== (string)$this->_initial["summary"]);
		$isDirty = $isDirty || ((string)$this->code !== (string)$this->_initial["code"]);
		$isDirty = $isDirty || ((string)$this->revision !== (string)$this->_initial["revision"]);
		$isDirty = $isDirty || ((int)$this->documentTypeId !== (int)$this->_initial["documentTypeId"]);
		$isDirty = $isDirty || ((int)$this->documentstatusId !== (int)$this->_initial["documentstatusId"]);
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
			"INSERT INTO {$db->le}document{$db->re} (",
			"	{$db->le}title{$db->re}, {$db->le}description{$db->re}, {$db->le}summary{$db->re}, {$db->le}code{$db->re}, {$db->le}revision{$db->re}, {$db->le}document_type_id{$db->re}, {$db->le}documentstatus_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->title) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue($this->summary) . ",",
				$db->queryValue($this->code) . ",",
				$db->queryValue($this->revision) . ",",
				$db->queryValue(is_null($this->documentTypeId)?null:(int)$this->documentTypeId) . ",",
				$db->queryValue(is_null($this->documentstatusId)?null:(int)$this->documentstatusId) . ",",
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
				"UPDATE {$db->le}document{$db->re} SET",
					"{$db->le}title{$db->re}={$db->queryValue($this->title)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}summary{$db->re}={$db->queryValue($this->summary)},",
					"{$db->le}code{$db->re}={$db->queryValue($this->code)},",
					"{$db->le}revision{$db->re}={$db->queryValue($this->revision)},",
					"{$db->le}document_type_id{$db->re}={$db->queryValue(is_null($this->documentTypeId)?null:(int)$this->documentTypeId)},",
					"{$db->le}documentstatus_id{$db->re}={$db->queryValue(is_null($this->documentstatusId)?null:(int)$this->documentstatusId)},",
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
		$record = Document::select($db->encapsulate("document") . ".mdate as fdate,null as tdate,{$db->encapsulate("document")}.*",null,$db->encapsulate("document").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}document{$dbLog->re} (",
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
				"FROM {$dbLog->le}document{$dbLog->re}",
				"WHERE {$dbLog->le}document{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}document{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("document") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("document") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}document{$db->le}",
			"LEFT JOIN {$db->le}document_type{$db->re} ON {$db->le}document{$db->re}.{$db->le}document_type_id{$db->re}={$db->le}document_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}documentstatus{$db->re} ON {$db->le}document{$db->re}.{$db->le}documentstatus_id{$db->re}={$db->le}documentstatus{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}document{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Document::select("{$db->le}document{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Document::select("{$db->le}document{$db->re}.{$db->le}id{$db->re}, {$db->le}document{$db->re}.{$db->le}title{$db->re}, {$db->le}document{$db->re}.{$db->le}description{$db->re}, {$db->le}document{$db->re}.{$db->le}summary{$db->re}, {$db->le}document{$db->re}.{$db->le}code{$db->re}, {$db->le}document{$db->re}.{$db->le}revision{$db->re}, {$db->le}document{$db->re}.{$db->le}document_type_id{$db->re}, {$db->le}document{$db->re}.{$db->le}documentstatus_id{$db->re}, {$db->le}document{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}document{$db->re}.{$db->le}mdate{$db->re}, {$db->le}document{$db->re}.{$db->le}cdate{$db->re}, {$db->le}document{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Document();
				$object->id = $record["id"];
				$object->title = $record["title"];
				$object->description = $record["description"];
				$object->summary = $record["summary"];
				$object->code = $record["code"];
				$object->revision = $record["revision"];
				$object->documentTypeId = $record["document_type_id"];
				$object->documentstatusId = $record["documentstatus_id"];
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
			$clauses[] = "document.title LIKE '%{$keyword}%' OR document.description LIKE '%{$keyword}%' OR document.summary LIKE '%{$keyword}%' OR document.code LIKE '%{$keyword}%' OR document.revision LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Document::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Document Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new DocumentType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new DocumentType($this->documentTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new DocumentType(null, $type);
		$this->documentTypeId = $type->id;
		return $this->documentTypeId;
	}

	public function getCommentDocument($commentId, $type="default") {
		return new CommentDocument(null, $commentId, $this->id, CommentDocument::typeId($type));
	}

	public function getDocumentDocumentdate($documentdateId, $type="default") {
		return new DocumentDocumentdate(null, $this->id, $documentdateId, DocumentDocumentdate::typeId($type));
	}

	public function getDocumentEntity($entityId, $type="default") {
		return new DocumentEntity(null, $this->id, $entityId, DocumentEntity::typeId($type));
	}

	public function getDocumentResource($resourceId, $type="default") {
		return new DocumentResource(null, $this->id, $resourceId, DocumentResource::typeId($type));
	}

	public function getDocumentUrl($urlId, $type="default") {
		return new DocumentUrl(null, $this->id, $urlId, DocumentUrl::typeId($type));
	}

	public function getDocumentTask($taskId, $type="default") {
		return new DocumentTask(null, $this->id, $taskId, DocumentTask::typeId($type));
	}

	public function getDocumentType() {
		return new DocumentType($this->documentTypeId);
	}

	public function setDocumentType(DocumentType $documentType) {
		if ($documentType->id>0) {
			$this->documentTypeId = $documentType->id;
		}
	}

	public function getDocumentstatus() {
		return new Documentstatus($this->documentstatusId);
	}

	public function setDocumentstatus(Documentstatus $documentstatus) {
		if ($documentstatus->id>0) {
			$this->documentstatusId = $documentstatus->id;
		}
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
			$relationship = $this->getCommentDocument($id, $type);
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
			return CommentDocument::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getCommentDocument($id, $type);
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
			"INNER JOIN {$db->le}comment_document{$db->re} ON {$db->le}comment_document{$db->re}.{$db->le}comment_id{$db->re}={$db->le}comment{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}comment_document{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment_document{$db->re}.{$db->le}document_id{$db->re}={$db->queryValue($this->id)} ",
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

	public function setDocumentdate($documentdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeDocumentdateList($type);
		$this->addDocumentdate($documentdate, $type);
		return $this;
	}
	public function removeDocumentdate($documentdate, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($documentdate) ? $documentdate : array($documentdate);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getDocumentDocumentdate($id, $type);
			if ($deleteObject) {
				$relationship->getDocumentdate()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeDocumentdateList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return DocumentDocumentdate::deleteAll($this->id, null, $type);
		}
	}
	public function addDocumentdate($documentdate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($documentdate)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($documentdate) ? $documentdate : array($documentdate);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getDocumentDocumentdate($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getDocumentdate($type="default") {
		if (isset($this->_cache["Documentdate"]) && isset($this->_cache["Documentdate"][$type])) {
			$documentdate = $this->_cache["Documentdate"][$type];
		} else {
			$documentdate = new Documentdate($this->getDocumentdateId($type));
		}
		$this->_cache["Documentdate"][$type] = $documentdate;
		return $this->_cache["Documentdate"][$type];
	}
	public function getDocumentdateList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getDocumentdateIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Documentdate::objects($order, "{$db->le}documentdate{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getDocumentdateId($type="default") {
		return $this->getDocumentdateIds($type)->get(0);
	}
	public function getDocumentdateIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}documentdate{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}documentdate{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}documentdate{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}documentdate{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}documentdate{$db->re} ",
			"INNER JOIN {$db->le}document_documentdate{$db->re} ON {$db->le}document_documentdate{$db->re}.{$db->le}documentdate_id{$db->re}={$db->le}documentdate{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}document_documentdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}documentdate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}document_documentdate{$db->re}.{$db->le}document_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}document_documentdate{$db->re}.{$db->le}document_documentdate_type_id{$db->re}=" . $db->queryValue(DocumentDocumentdate::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}document_documentdate{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setEntity($entity=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeEntityList($type);
		$this->addEntity($entity, $type);
		return $this;
	}
	public function removeEntity($entity, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($entity) ? $entity : array($entity);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getDocumentEntity($id, $type);
			if ($deleteObject) {
				$relationship->getEntity()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeEntityList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return DocumentEntity::deleteAll($this->id, null, $type);
		}
	}
	public function addEntity($entity=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($entity)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($entity) ? $entity : array($entity);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getDocumentEntity($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getEntity($type="default") {
		if (isset($this->_cache["Entity"]) && isset($this->_cache["Entity"][$type])) {
			$entity = $this->_cache["Entity"][$type];
		} else {
			$entity = new Entity($this->getEntityId($type));
		}
		$this->_cache["Entity"][$type] = $entity;
		return $this->_cache["Entity"][$type];
	}
	public function getEntityList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getEntityIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Entity::objects($order, "{$db->le}entity{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getEntityId($type="default") {
		return $this->getEntityIds($type)->get(0);
	}
	public function getEntityIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}entity{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}entity{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}entity{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}entity{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}entity{$db->re} ",
			"INNER JOIN {$db->le}document_entity{$db->re} ON {$db->le}document_entity{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}document_entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}document_entity{$db->re}.{$db->le}document_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}document_entity{$db->re}.{$db->le}document_entity_type_id{$db->re}=" . $db->queryValue(DocumentEntity::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}document_entity{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getDocumentResource($id, $type);
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
			return DocumentResource::deleteAll($this->id, null, $type);
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
				$relationship = $this->getDocumentResource($id, $type);
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
			"INNER JOIN {$db->le}document_resource{$db->re} ON {$db->le}document_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->le}resource{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}document_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}document_resource{$db->re}.{$db->le}document_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}document_resource{$db->re}.{$db->le}document_resource_type_id{$db->re}=" . $db->queryValue(DocumentResource::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}document_resource{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getDocumentTask($id, $type);
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
			return DocumentTask::deleteAll($this->id, null, $type);
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
				$relationship = $this->getDocumentTask($id, $type);
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
			"INNER JOIN {$db->le}document_task{$db->re} ON {$db->le}document_task{$db->re}.{$db->le}task_id{$db->re}={$db->le}task{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}document_task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}document_task{$db->re}.{$db->le}document_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}document_task{$db->re}.{$db->le}document_task_type_id{$db->re}=" . $db->queryValue(DocumentTask::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}document_task{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getDocumentUrl($id, $type);
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
			return DocumentUrl::deleteAll($this->id, null, $type);
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
				$relationship = $this->getDocumentUrl($id, $type);
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
			"INNER JOIN {$db->le}document_url{$db->re} ON {$db->le}document_url{$db->re}.{$db->le}url_id{$db->re}={$db->le}url{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}document_url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}document_url{$db->re}.{$db->le}document_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}document_url{$db->re}.{$db->le}document_url_type_id{$db->re}=" . $db->queryValue(DocumentUrl::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}document_url{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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