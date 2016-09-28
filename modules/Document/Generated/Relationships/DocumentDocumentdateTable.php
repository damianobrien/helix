<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the document_documentdate table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the document_documentdate
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called DocumentDocumentdateExtension, and should extend the DocumentDocumentdateTable
 * class.  The custom code file should be in the helix/modules/Document folder
 * and should be called DocumentDocumentdateExtension.php
 * 
 * Object -> DocumentDocumentdate
 */
class DocumentDocumentdateTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $documentId;
	public $documentdateId;
	public $documentDocumentdateTypeId;
	public $primary;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $documentId=null, $documentdateId=null, $documentDocumentdateTypeId=1) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->documentId = $documentId;
		$this->documentdateId = $documentdateId;
		$this->documentDocumentdateTypeId = $documentDocumentdateTypeId;
		$this->primary = false;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}document_documentdate{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($documentId) && isset($documentdateId)) {
			$condition = "{$db->le}document_id{$db->re}={$db->queryValue($documentId)} AND {$db->le}documentdate_id{$db->re}={$db->queryValue($documentdateId)} AND {$db->le}document_documentdate_type_id{$db->re}={$db->queryValue($documentDocumentdateTypeId)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}document_documentdate{$db->re}.{$db->le}id{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}document_id{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}documentdate_id{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}document_documentdate_type_id{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}primary{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}mdate{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}cdate{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}document_documentdate{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->documentId = $db->record["document_id"];
				$this->documentdateId = $db->record["documentdate_id"];
				$this->documentDocumentdateTypeId = $db->record["document_documentdate_type_id"];
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
		$this->_initial["documentId"] = $this->documentId;
		$this->_initial["documentdateId"] = $this->documentdateId;
		$this->_initial["documentDocumentdateTypeId"] = $this->documentDocumentdateTypeId;
		$this->_initial["primary"] = $this->primary;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $documentId=null, $documentdateId=null, $documentDocumentdateTypeId=1) {
		$object = new DocumentDocumentdate();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}document_documentdate{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($documentId) && isset($documentdateId)) {
			$condition = "{$db->le}document_id{$db->re}={$db->queryValue($documentId)} AND {$db->le}documentdate_id{$db->re}={$db->queryValue($documentdateId)} AND {$db->le}document_documentdate_type_id{$db->re}={$db->queryValue($documentDocumentdateTypeId)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}document_documentdate{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}document_documentdate{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}document_documentdate{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}document_documentdate{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}fdate{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}tdate{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}id{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}document_id{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}documentdate_id{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}document_documentdate_type_id{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}primary{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}mdate{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}cdate{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}document_documentdate{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}document_documentdate{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->documentId = $db->record["document_id"];
				$object->documentdateId = $db->record["documentdate_id"];
				$object->documentDocumentdateTypeId = $db->record["document_documentdate_type_id"];
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
		$isDirty = $isDirty || ((int)$this->documentId !== (int)$this->_initial["documentId"]);
		$isDirty = $isDirty || ((int)$this->documentdateId !== (int)$this->_initial["documentdateId"]);
		$isDirty = $isDirty || ((int)$this->documentDocumentdateTypeId !== (int)$this->_initial["documentDocumentdateTypeId"]);
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
			"INSERT INTO {$db->le}document_documentdate{$db->re} (",
			"	{$db->le}document_id{$db->re}, {$db->le}documentdate_id{$db->re}, {$db->le}document_documentdate_type_id{$db->re}, {$db->le}primary{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->documentId)?null:(int)$this->documentId) . ",",
				$db->queryValue(is_null($this->documentdateId)?null:(int)$this->documentdateId) . ",",
				$db->queryValue(is_null($this->documentDocumentdateTypeId)?null:(int)$this->documentDocumentdateTypeId) . ",",
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
				"UPDATE {$db->le}document_documentdate{$db->re} SET",
					"{$db->le}document_id{$db->re}={$db->queryValue(is_null($this->documentId)?null:(int)$this->documentId)},",
					"{$db->le}documentdate_id{$db->re}={$db->queryValue(is_null($this->documentdateId)?null:(int)$this->documentdateId)},",
					"{$db->le}document_documentdate_type_id{$db->re}={$db->queryValue(is_null($this->documentDocumentdateTypeId)?null:(int)$this->documentDocumentdateTypeId)},",
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
		$record = DocumentDocumentdate::select($db->encapsulate("document_documentdate") . ".mdate as fdate,null as tdate,{$db->encapsulate("document_documentdate")}.*",null,$db->encapsulate("document_documentdate").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}document_documentdate{$dbLog->re} (",
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
				"FROM {$dbLog->le}document_documentdate{$dbLog->re}",
				"WHERE {$dbLog->le}document_documentdate{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}document_documentdate{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("document_documentdate") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($documentId=null, $documentdateId=null, $type=null) {
		$db = Database::getInstance();
		$conditions = array();
		if (isset($documentId)) {
			$conditions[] = "{$db->le}document_id{$db->re}={$db->queryValue($documentId)}";
		}
		if (isset($documentdateId)) {
			$conditions[] = "{$db->le}documentdate_id{$db->re}={$db->queryValue($documentdateId)}";
		}
		if (isset($type)) {
			$conditions[] = "{$db->le}document_documentdate_type_id{$db->re}=" . $db->queryValue(self::typeId($type));
		}
		$condition = count($conditions)===0 ? "" : " WHERE " . implode(" AND ", $conditions);
		$query = "UPDATE " . $db->encapsulate("document_documentdate") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}document_documentdate{$db->le}",

			"WHERE {$db->le}document_documentdate{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return DocumentDocumentdate::select("{$db->le}document_documentdate{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (DocumentDocumentdate::select("{$db->le}document_documentdate{$db->re}.{$db->le}id{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}document_id{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}documentdate_id{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}document_documentdate_type_id{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}primary{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}mdate{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}cdate{$db->re}, {$db->le}document_documentdate{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new DocumentDocumentdate();
				$object->id = $record["id"];
				$object->documentId = $record["document_id"];
				$object->documentdateId = $record["documentdate_id"];
				$object->documentDocumentdateTypeId = $record["document_documentdate_type_id"];
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
		return DocumentDocumentdate::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "DocumentDocumentdate Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new DocumentDocumentdateType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new DocumentDocumentdateType($this->documentDocumentdateTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new DocumentDocumentdateType(null, $type);
		$this->documentDocumentdateTypeId = $type->id;
		return $this->documentDocumentdateTypeId;
	}


	public function getDocument() {
		return new Document($this->documentId);
	}

	public function setDocument(Document $document) {
		if ($document->id>0) {
			$this->documentId = $document->id;
		}
	}

	public function getDocumentdate() {
		return new Documentdate($this->documentdateId);
	}

	public function setDocumentdate(Documentdate $documentdate) {
		if ($documentdate->id>0) {
			$this->documentdateId = $documentdate->id;
		}
	}

	public function getDocumentDocumentdateType() {
		return new DocumentDocumentdateType($this->documentDocumentdateTypeId);
	}

	public function setDocumentDocumentdateType(DocumentDocumentdateType $documentDocumentdateType) {
		if ($documentDocumentdateType->id>0) {
			$this->documentDocumentdateTypeId = $documentDocumentdateType->id;
		}
	}


}
?>