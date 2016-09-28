<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the resource table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the resource
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called ResourceExtension, and should extend the ResourceTable
 * class.  The custom code file should be in the helix/modules/Core folder
 * and should be called ResourceExtension.php
 * 
 * Object -> Resource
 */
class ResourceTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $name;
	public $hash;
	public $folder;
	public $description;
	public $bytes;
	public $mimeType;
	public $meta;
	public $resourceTypeId;
	public $expirationdate;
	public $createdById;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $hash=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = null;
		$this->hash = isset($hash) ? $hash : uniqid();
		$this->folder = null;
		$this->description = null;
		$this->bytes = null;
		$this->mimeType = null;
		$this->meta = null;
		$this->resourceTypeId = null;
		$this->expirationdate = null;
		$this->createdById = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}resource{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($hash)) {
			$condition = "{$db->le}resource{$db->re}.{$db->le}hash{$db->re}={$db->queryValue($hash)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}resource{$db->re}.{$db->le}id{$db->re}, {$db->le}resource{$db->re}.{$db->le}name{$db->re}, {$db->le}resource{$db->re}.{$db->le}hash{$db->re}, {$db->le}resource{$db->re}.{$db->le}folder{$db->re}, {$db->le}resource{$db->re}.{$db->le}description{$db->re}, {$db->le}resource{$db->re}.{$db->le}bytes{$db->re}, {$db->le}resource{$db->re}.{$db->le}mime_type{$db->re}, {$db->le}resource{$db->re}.{$db->le}meta{$db->re}, {$db->le}resource{$db->re}.{$db->le}resource_type_id{$db->re}, {$db->le}resource{$db->re}.{$db->le}expirationdate{$db->re}, {$db->le}resource{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}resource{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}resource{$db->re}.{$db->le}mdate{$db->re}, {$db->le}resource{$db->re}.{$db->le}cdate{$db->re}, {$db->le}resource{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}resource{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->hash = $db->record["hash"];
				$this->folder = $db->record["folder"];
				$this->description = $db->record["description"];
				$this->bytes = $db->record["bytes"];
				$this->mimeType = $db->record["mime_type"];
				$this->meta = $db->record["meta"];
				$this->resourceTypeId = $db->record["resource_type_id"];
				$this->expirationdate = is_null(($db->record["expirationdate"]))?null:new Date($db->record["expirationdate"]);
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
		$this->_initial["name"] = $this->name;
		$this->_initial["hash"] = $this->hash;
		$this->_initial["folder"] = $this->folder;
		$this->_initial["description"] = $this->description;
		$this->_initial["bytes"] = $this->bytes;
		$this->_initial["mimeType"] = $this->mimeType;
		$this->_initial["meta"] = $this->meta;
		$this->_initial["resourceTypeId"] = $this->resourceTypeId;
		$this->_initial["expirationdate"] = $this->expirationdate;
		$this->_initial["createdById"] = $this->createdById;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $hash=null) {
		$object = new Resource();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}resource{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($hash)) {
			$condition = "{$db->le}resource{$db->re}.{$db->le}hash{$db->re}={$db->queryValue($hash)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}resource{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}resource{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}resource{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}resource{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}resource{$db->re}.{$db->le}fdate{$db->re}, {$db->le}resource{$db->re}.{$db->le}tdate{$db->re}, {$db->le}resource{$db->re}.{$db->le}id{$db->re}, {$db->le}resource{$db->re}.{$db->le}name{$db->re}, {$db->le}resource{$db->re}.{$db->le}hash{$db->re}, {$db->le}resource{$db->re}.{$db->le}folder{$db->re}, {$db->le}resource{$db->re}.{$db->le}description{$db->re}, {$db->le}resource{$db->re}.{$db->le}bytes{$db->re}, {$db->le}resource{$db->re}.{$db->le}mime_type{$db->re}, {$db->le}resource{$db->re}.{$db->le}meta{$db->re}, {$db->le}resource{$db->re}.{$db->le}resource_type_id{$db->re}, {$db->le}resource{$db->re}.{$db->le}expirationdate{$db->re}, {$db->le}resource{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}resource{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}resource{$db->re}.{$db->le}mdate{$db->re}, {$db->le}resource{$db->re}.{$db->le}cdate{$db->re}, {$db->le}resource{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}resource{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}resource{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->hash = $db->record["hash"];
				$object->folder = $db->record["folder"];
				$object->description = $db->record["description"];
				$object->bytes = $db->record["bytes"];
				$object->mimeType = $db->record["mime_type"];
				$object->meta = $db->record["meta"];
				$object->resourceTypeId = $db->record["resource_type_id"];
				$object->expirationdate = is_null(($db->record["expirationdate"]))?null:new Date($db->record["expirationdate"]);
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
		$isDirty = $isDirty || ((string)$this->name !== (string)$this->_initial["name"]);
		$isDirty = $isDirty || ((string)$this->hash !== (string)$this->_initial["hash"]);
		$isDirty = $isDirty || ((string)$this->folder !== (string)$this->_initial["folder"]);
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
		$isDirty = $isDirty || ((int)$this->bytes !== (int)$this->_initial["bytes"]);
		$isDirty = $isDirty || ((string)$this->mimeType !== (string)$this->_initial["mimeType"]);
		$isDirty = $isDirty || ((string)$this->meta !== (string)$this->_initial["meta"]);
		$isDirty = $isDirty || ((int)$this->resourceTypeId !== (int)$this->_initial["resourceTypeId"]);
		$isDirty = $isDirty || ((string)$this->expirationdate != (string)$this->_initial["expirationdate"]);
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
			"INSERT INTO {$db->le}resource{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}hash{$db->re}, {$db->le}folder{$db->re}, {$db->le}description{$db->re}, {$db->le}bytes{$db->re}, {$db->le}mime_type{$db->re}, {$db->le}meta{$db->re}, {$db->le}resource_type_id{$db->re}, {$db->le}expirationdate{$db->re}, {$db->le}created_by_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->hash) . ",",
				$db->queryValue($this->folder) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue(is_null($this->bytes)?null:(int)$this->bytes) . ",",
				$db->queryValue($this->mimeType) . ",",
				$db->queryValue($this->meta) . ",",
				$db->queryValue(is_null($this->resourceTypeId)?null:(int)$this->resourceTypeId) . ",",
				$db->queryValue($this->expirationdate) . ",",
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
				"UPDATE {$db->le}resource{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}hash{$db->re}={$db->queryValue($this->hash)},",
					"{$db->le}folder{$db->re}={$db->queryValue($this->folder)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}bytes{$db->re}={$db->queryValue(is_null($this->bytes)?null:(int)$this->bytes)},",
					"{$db->le}mime_type{$db->re}={$db->queryValue($this->mimeType)},",
					"{$db->le}meta{$db->re}={$db->queryValue($this->meta)},",
					"{$db->le}resource_type_id{$db->re}={$db->queryValue(is_null($this->resourceTypeId)?null:(int)$this->resourceTypeId)},",
					"{$db->le}expirationdate{$db->re}={$db->queryValue($this->expirationdate)},",
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
		$record = Resource::select($db->encapsulate("resource") . ".mdate as fdate,null as tdate,{$db->encapsulate("resource")}.*",null,$db->encapsulate("resource").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}resource{$dbLog->re} (",
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
				"FROM {$dbLog->le}resource{$dbLog->re}",
				"WHERE {$dbLog->le}resource{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}resource{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("resource") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("resource") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}resource{$db->le}",
			"LEFT JOIN {$db->le}resource_type{$db->re} ON {$db->le}resource{$db->re}.{$db->le}resource_type_id{$db->re}={$db->le}resource_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}resource{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Resource::select("{$db->le}resource{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Resource::select("{$db->le}resource{$db->re}.{$db->le}id{$db->re}, {$db->le}resource{$db->re}.{$db->le}name{$db->re}, {$db->le}resource{$db->re}.{$db->le}hash{$db->re}, {$db->le}resource{$db->re}.{$db->le}folder{$db->re}, {$db->le}resource{$db->re}.{$db->le}description{$db->re}, {$db->le}resource{$db->re}.{$db->le}bytes{$db->re}, {$db->le}resource{$db->re}.{$db->le}mime_type{$db->re}, {$db->le}resource{$db->re}.{$db->le}meta{$db->re}, {$db->le}resource{$db->re}.{$db->le}resource_type_id{$db->re}, {$db->le}resource{$db->re}.{$db->le}expirationdate{$db->re}, {$db->le}resource{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}resource{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}resource{$db->re}.{$db->le}mdate{$db->re}, {$db->le}resource{$db->re}.{$db->le}cdate{$db->re}, {$db->le}resource{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Resource();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->hash = $record["hash"];
				$object->folder = $record["folder"];
				$object->description = $record["description"];
				$object->bytes = $record["bytes"];
				$object->mimeType = $record["mime_type"];
				$object->meta = $record["meta"];
				$object->resourceTypeId = $record["resource_type_id"];
				$object->expirationdate = is_null(($record["expirationdate"]))?null:new Date($record["expirationdate"]);
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
			$clauses[] = "resource.name LIKE '%{$keyword}%' OR resource.hash LIKE '%{$keyword}%' OR resource.folder LIKE '%{$keyword}%' OR resource.description LIKE '%{$keyword}%' OR resource.mime_type LIKE '%{$keyword}%' OR resource.meta LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Resource::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Resource Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new ResourceType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new ResourceType($this->resourceTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new ResourceType(null, $type);
		$this->resourceTypeId = $type->id;
		return $this->resourceTypeId;
	}

	public function getAssetResource($assetId, $type="default") {
		return new AssetResource(null, $assetId, $this->id, AssetResource::typeId($type));
	}

	public function getBusinesscommentResource($businessCommentId, $type="default") {
		return new BusinesscommentResource(null, $businessCommentId, $this->id, BusinesscommentResource::typeId($type));
	}

	public function getContentResource($contentId, $type="default") {
		return new ContentResource(null, $contentId, $this->id, ContentResource::typeId($type));
	}

	public function getResourceSaleitem($saleitemId, $type="default") {
		return new ResourceSaleitem(null, $this->id, $saleitemId, ResourceSaleitem::typeId($type));
	}

	public function getCommentcontactResource($commentContactId, $type="default") {
		return new CommentcontactResource(null, $commentContactId, $this->id, CommentcontactResource::typeId($type));
	}

	public function getContactResource($contactId, $type="default") {
		return new ContactResource(null, $contactId, $this->id, ContactResource::typeId($type));
	}

	public function getEntityResource($entityId, $type="default") {
		return new EntityResource(null, $entityId, $this->id, EntityResource::typeId($type));
	}

	public function getGroupResource($groupId, $type="default") {
		return new GroupResource(null, $groupId, $this->id, GroupResource::typeId($type));
	}

	public function getResourceUrl($urlId, $type="default") {
		return new ResourceUrl(null, $this->id, $urlId, ResourceUrl::typeId($type));
	}

	public function getDocumentResource($documentId, $type="default") {
		return new DocumentResource(null, $documentId, $this->id, DocumentResource::typeId($type));
	}

	public function getEmployeeResource($employeeId, $type="default") {
		return new EmployeeResource(null, $employeeId, $this->id, EmployeeResource::typeId($type));
	}

	public function getProjectentityResource($projectentityId, $type="default") {
		return new ProjectentityResource(null, $projectentityId, $this->id, ProjectentityResource::typeId($type));
	}

	public function getResourceType() {
		return new ResourceType($this->resourceTypeId);
	}

	public function setResourceType(ResourceType $resourceType) {
		if ($resourceType->id>0) {
			$this->resourceTypeId = $resourceType->id;
		}
	}

	public function setAsset($asset=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeAssetList($type);
		$this->addAsset($asset, $type);
		return $this;
	}
	public function removeAsset($asset, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($asset) ? $asset : array($asset);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getAssetResource($id, $type);
			if ($deleteObject) {
				$relationship->getAsset()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeAssetList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return AssetResource::deleteAll(null, $this->id, $type);
		}
	}
	public function addAsset($asset=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($asset)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($asset) ? $asset : array($asset);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getAssetResource($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getAsset($type="default") {
		if (isset($this->_cache["Asset"]) && isset($this->_cache["Asset"][$type])) {
			$asset = $this->_cache["Asset"][$type];
		} else {
			$asset = new Asset($this->getAssetId($type));
		}
		$this->_cache["Asset"][$type] = $asset;
		return $this->_cache["Asset"][$type];
	}
	public function getAssetList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getAssetIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Asset::objects($order, "{$db->le}asset{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getAssetId($type="default") {
		return $this->getAssetIds($type)->get(0);
	}
	public function getAssetIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}asset{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}asset{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}asset{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}asset{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}asset{$db->re} ",
			"INNER JOIN {$db->le}asset_resource{$db->re} ON {$db->le}asset_resource{$db->re}.{$db->le}asset_id{$db->re}={$db->le}asset{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}asset_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}asset_resource{$db->re}.{$db->le}asset_resource_type_id{$db->re}=" . $db->queryValue(AssetResource::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}asset_resource{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setBusinessComment($businessComment=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeBusinessCommentList($type);
		$this->addBusinessComment($businessComment, $type);
		return $this;
	}
	public function removeBusinessComment($businessComment, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($businessComment) ? $businessComment : array($businessComment);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getBusinesscommentResource($id, $type);
			if ($deleteObject) {
				$relationship->getBusinessComment()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeBusinessCommentList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return BusinesscommentResource::deleteAll(null, $this->id, $type);
		}
	}
	public function addBusinessComment($businessComment=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($businessComment)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($businessComment) ? $businessComment : array($businessComment);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getBusinesscommentResource($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getBusinessComment($type="default") {
		if (isset($this->_cache["BusinessComment"]) && isset($this->_cache["BusinessComment"][$type])) {
			$businessComment = $this->_cache["BusinessComment"][$type];
		} else {
			$businessComment = new BusinessComment($this->getBusinessCommentId($type));
		}
		$this->_cache["BusinessComment"][$type] = $businessComment;
		return $this->_cache["BusinessComment"][$type];
	}
	public function getBusinessCommentList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getBusinessCommentIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : BusinessComment::objects($order, "{$db->le}business_comment{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getBusinessCommentId($type="default") {
		return $this->getBusinessCommentIds($type)->get(0);
	}
	public function getBusinessCommentIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}business_comment{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}business_comment{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}business_comment{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}business_comment{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}business_comment{$db->re} ",
			"INNER JOIN {$db->le}businesscomment_resource{$db->re} ON {$db->le}businesscomment_resource{$db->re}.{$db->le}business_comment_id{$db->re}={$db->le}business_comment{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}businesscomment_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business_comment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}businesscomment_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}businesscomment_resource{$db->re}.{$db->le}businesscomment_resource_type_id{$db->re}=" . $db->queryValue(BusinesscommentResource::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}businesscomment_resource{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setCommentContact($commentContact=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeCommentContactList($type);
		$this->addCommentContact($commentContact, $type);
		return $this;
	}
	public function removeCommentContact($commentContact, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($commentContact) ? $commentContact : array($commentContact);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getCommentcontactResource($id, $type);
			if ($deleteObject) {
				$relationship->getCommentContact()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeCommentContactList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return CommentcontactResource::deleteAll(null, $this->id, $type);
		}
	}
	public function addCommentContact($commentContact=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($commentContact)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($commentContact) ? $commentContact : array($commentContact);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getCommentcontactResource($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getCommentContact($type="default") {
		if (isset($this->_cache["CommentContact"]) && isset($this->_cache["CommentContact"][$type])) {
			$commentContact = $this->_cache["CommentContact"][$type];
		} else {
			$commentContact = new CommentContact($this->getCommentContactId($type));
		}
		$this->_cache["CommentContact"][$type] = $commentContact;
		return $this->_cache["CommentContact"][$type];
	}
	public function getCommentContactList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getCommentContactIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : CommentContact::objects($order, "{$db->le}comment_contact{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getCommentContactId($type="default") {
		return $this->getCommentContactIds($type)->get(0);
	}
	public function getCommentContactIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}comment_contact{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}comment_contact{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}comment_contact{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}comment_contact{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}comment_contact{$db->re} ",
			"INNER JOIN {$db->le}commentcontact_resource{$db->re} ON {$db->le}commentcontact_resource{$db->re}.{$db->le}comment_contact_id{$db->re}={$db->le}comment_contact{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}commentcontact_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}comment_contact{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}commentcontact_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}commentcontact_resource{$db->re}.{$db->le}commentcontact_resource_type_id{$db->re}=" . $db->queryValue(CommentcontactResource::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}commentcontact_resource{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getContactResource($id, $type);
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
			return ContactResource::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getContactResource($id, $type);
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
			"INNER JOIN {$db->le}contact_resource{$db->re} ON {$db->le}contact_resource{$db->re}.{$db->le}contact_person_entity_id{$db->re}={$db->le}contact{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}contact_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contact{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contact_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}contact_resource{$db->re}.{$db->le}contact_resource_type_id{$db->re}=" . $db->queryValue(ContactResource::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}contact_resource{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getContentResource($id, $type);
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
			return ContentResource::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getContentResource($id, $type);
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
			"INNER JOIN {$db->le}content_resource{$db->re} ON {$db->le}content_resource{$db->re}.{$db->le}content_id{$db->re}={$db->le}content{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}content_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->queryValue($this->id)} ",
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
			$relationship = $this->getDocumentResource($id, $type);
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
			return DocumentResource::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getDocumentResource($id, $type);
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
			"INNER JOIN {$db->le}document_resource{$db->re} ON {$db->le}document_resource{$db->re}.{$db->le}document_id{$db->re}={$db->le}document{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}document_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}document{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}document_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->queryValue($this->id)} ",
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

	public function setEmployee($employee=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeEmployeeList($type);
		$this->addEmployee($employee, $type);
		return $this;
	}
	public function removeEmployee($employee, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($employee) ? $employee : array($employee);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEmployeeResource($id, $type);
			if ($deleteObject) {
				$relationship->getEmployee()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeEmployeeList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EmployeeResource::deleteAll(null, $this->id, $type);
		}
	}
	public function addEmployee($employee=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($employee)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($employee) ? $employee : array($employee);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEmployeeResource($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getEmployee($type="default") {
		if (isset($this->_cache["Employee"]) && isset($this->_cache["Employee"][$type])) {
			$employee = $this->_cache["Employee"][$type];
		} else {
			$employee = new Employee($this->getEmployeeId($type));
		}
		$this->_cache["Employee"][$type] = $employee;
		return $this->_cache["Employee"][$type];
	}
	public function getEmployeeList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getEmployeeIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Employee::objects($order, "{$db->le}employee{$db->le}.{$db->re}person_entity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getEmployeeId($type="default") {
		return $this->getEmployeeIds($type)->get(0);
	}
	public function getEmployeeIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}employee{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}employee{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}employee{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}employee{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"FROM {$db->le}employee{$db->re} ",
			"INNER JOIN {$db->le}employee_resource{$db->re} ON {$db->le}employee_resource{$db->re}.{$db->le}employee_person_entity_id{$db->re}={$db->le}employee{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}employee_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}employee{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}employee_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}employee_resource{$db->re}.{$db->le}employee_resource_type_id{$db->re}=" . $db->queryValue(EmployeeResource::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}employee_resource{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getEntityResource($id, $type);
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
			return EntityResource::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getEntityResource($id, $type);
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
			"INNER JOIN {$db->le}entity_resource{$db->re} ON {$db->le}entity_resource{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_resource{$db->re}.{$db->le}entity_resource_type_id{$db->re}=" . $db->queryValue(EntityResource::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_resource{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getGroupResource($id, $type);
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
			return GroupResource::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getGroupResource($id, $type);
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
			"INNER JOIN {$db->le}group_resource{$db->re} ON {$db->le}group_resource{$db->re}.{$db->le}group_id{$db->re}={$db->le}group{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}group_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}group{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}group_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}group_resource{$db->re}.{$db->le}group_resource_type_id{$db->re}=" . $db->queryValue(GroupResource::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}group_resource{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getProjectentityResource($id, $type);
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
			return ProjectentityResource::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getProjectentityResource($id, $type);
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
			"INNER JOIN {$db->le}projectentity_resource{$db->re} ON {$db->le}projectentity_resource{$db->re}.{$db->le}projectentity_id{$db->re}={$db->le}projectentity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}projectentity_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}projectentity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}projectentity_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}projectentity_resource{$db->re}.{$db->le}projectentity_resource_type_id{$db->re}=" . $db->queryValue(ProjectentityResource::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}projectentity_resource{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setSaleitem($saleitem=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeSaleitemList($type);
		$this->addSaleitem($saleitem, $type);
		return $this;
	}
	public function removeSaleitem($saleitem, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($saleitem) ? $saleitem : array($saleitem);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getResourceSaleitem($id, $type);
			if ($deleteObject) {
				$relationship->getSaleitem()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeSaleitemList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ResourceSaleitem::deleteAll($this->id, null, $type);
		}
	}
	public function addSaleitem($saleitem=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($saleitem)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($saleitem) ? $saleitem : array($saleitem);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getResourceSaleitem($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getSaleitem($type="default") {
		if (isset($this->_cache["Saleitem"]) && isset($this->_cache["Saleitem"][$type])) {
			$saleitem = $this->_cache["Saleitem"][$type];
		} else {
			$saleitem = new Saleitem($this->getSaleitemId($type));
		}
		$this->_cache["Saleitem"][$type] = $saleitem;
		return $this->_cache["Saleitem"][$type];
	}
	public function getSaleitemList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getSaleitemIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Saleitem::objects($order, "{$db->le}saleitem{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getSaleitemId($type="default") {
		return $this->getSaleitemIds($type)->get(0);
	}
	public function getSaleitemIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}saleitem{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}saleitem{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}saleitem{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}saleitem{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}saleitem{$db->re} ",
			"INNER JOIN {$db->le}resource_saleitem{$db->re} ON {$db->le}resource_saleitem{$db->re}.{$db->le}saleitem_id{$db->re}={$db->le}saleitem{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}resource_saleitem{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}saleitem{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}resource_saleitem{$db->re}.{$db->le}resource_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}resource_saleitem{$db->re}.{$db->le}resource_saleitem_type_id{$db->re}=" . $db->queryValue(ResourceSaleitem::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}resource_saleitem{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getResourceUrl($id, $type);
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
			return ResourceUrl::deleteAll($this->id, null, $type);
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
				$relationship = $this->getResourceUrl($id, $type);
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
			"INNER JOIN {$db->le}resource_url{$db->re} ON {$db->le}resource_url{$db->re}.{$db->le}url_id{$db->re}={$db->le}url{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}resource_url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}resource_url{$db->re}.{$db->le}resource_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}resource_url{$db->re}.{$db->le}resource_url_type_id{$db->re}=" . $db->queryValue(ResourceUrl::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}resource_url{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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