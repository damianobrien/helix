<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the business_comment table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the business_comment
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called BusinessCommentExtension, and should extend the BusinessCommentTable
 * class.  The custom code file should be in the helix/modules/Business folder
 * and should be called BusinessCommentExtension.php
 * 
 * Object -> BusinessComment
 */
class BusinessCommentTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $businessEntityId;
	public $commentId;
	public $businessCommentTypeId;
	public $primary;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $businessEntityId=null, $commentId=null, $businessCommentTypeId=1) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->businessEntityId = $businessEntityId;
		$this->commentId = $commentId;
		$this->businessCommentTypeId = $businessCommentTypeId;
		$this->primary = false;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}business_comment{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($businessEntityId) && isset($commentId)) {
			$condition = "{$db->le}business_entity_id{$db->re}={$db->queryValue($businessEntityId)} AND {$db->le}comment_id{$db->re}={$db->queryValue($commentId)} AND {$db->le}business_comment_type_id{$db->re}={$db->queryValue($businessCommentTypeId)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}business_comment{$db->re}.{$db->le}id{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}business_entity_id{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}comment_id{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}business_comment_type_id{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}primary{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}mdate{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}cdate{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}business_comment{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->businessEntityId = $db->record["business_entity_id"];
				$this->commentId = $db->record["comment_id"];
				$this->businessCommentTypeId = $db->record["business_comment_type_id"];
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
		$this->_initial["businessEntityId"] = $this->businessEntityId;
		$this->_initial["commentId"] = $this->commentId;
		$this->_initial["businessCommentTypeId"] = $this->businessCommentTypeId;
		$this->_initial["primary"] = $this->primary;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $businessEntityId=null, $commentId=null, $businessCommentTypeId=1) {
		$object = new BusinessComment();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}business_comment{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($businessEntityId) && isset($commentId)) {
			$condition = "{$db->le}business_entity_id{$db->re}={$db->queryValue($businessEntityId)} AND {$db->le}comment_id{$db->re}={$db->queryValue($commentId)} AND {$db->le}business_comment_type_id{$db->re}={$db->queryValue($businessCommentTypeId)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}business_comment{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}business_comment{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}business_comment{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}business_comment{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}fdate{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}tdate{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}id{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}business_entity_id{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}comment_id{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}business_comment_type_id{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}primary{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}mdate{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}cdate{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}business_comment{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}business_comment{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->businessEntityId = $db->record["business_entity_id"];
				$object->commentId = $db->record["comment_id"];
				$object->businessCommentTypeId = $db->record["business_comment_type_id"];
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
		$isDirty = $isDirty || ((int)$this->businessEntityId !== (int)$this->_initial["businessEntityId"]);
		$isDirty = $isDirty || ((int)$this->commentId !== (int)$this->_initial["commentId"]);
		$isDirty = $isDirty || ((int)$this->businessCommentTypeId !== (int)$this->_initial["businessCommentTypeId"]);
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
			"INSERT INTO {$db->le}business_comment{$db->re} (",
			"	{$db->le}business_entity_id{$db->re}, {$db->le}comment_id{$db->re}, {$db->le}business_comment_type_id{$db->re}, {$db->le}primary{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->businessEntityId)?null:(int)$this->businessEntityId) . ",",
				$db->queryValue(is_null($this->commentId)?null:(int)$this->commentId) . ",",
				$db->queryValue(is_null($this->businessCommentTypeId)?null:(int)$this->businessCommentTypeId) . ",",
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
				"UPDATE {$db->le}business_comment{$db->re} SET",
					"{$db->le}business_entity_id{$db->re}={$db->queryValue(is_null($this->businessEntityId)?null:(int)$this->businessEntityId)},",
					"{$db->le}comment_id{$db->re}={$db->queryValue(is_null($this->commentId)?null:(int)$this->commentId)},",
					"{$db->le}business_comment_type_id{$db->re}={$db->queryValue(is_null($this->businessCommentTypeId)?null:(int)$this->businessCommentTypeId)},",
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
		$record = BusinessComment::select($db->encapsulate("business_comment") . ".mdate as fdate,null as tdate,{$db->encapsulate("business_comment")}.*",null,$db->encapsulate("business_comment").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}business_comment{$dbLog->re} (",
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
				"FROM {$dbLog->le}business_comment{$dbLog->re}",
				"WHERE {$dbLog->le}business_comment{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}business_comment{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("business_comment") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($businessId=null, $commentId=null, $type=null) {
		$db = Database::getInstance();
		$conditions = array();
		if (isset($businessId)) {
			$conditions[] = "{$db->le}business_entity_id{$db->re}={$db->queryValue($businessId)}";
		}
		if (isset($commentId)) {
			$conditions[] = "{$db->le}comment_id{$db->re}={$db->queryValue($commentId)}";
		}
		if (isset($type)) {
			$conditions[] = "{$db->le}business_comment_type_id{$db->re}=" . $db->queryValue(self::typeId($type));
		}
		$condition = count($conditions)===0 ? "" : " WHERE " . implode(" AND ", $conditions);
		$query = "UPDATE " . $db->encapsulate("business_comment") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}business_comment{$db->le}",

			"WHERE {$db->le}business_comment{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return BusinessComment::select("{$db->le}business_comment{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (BusinessComment::select("{$db->le}business_comment{$db->re}.{$db->le}id{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}business_entity_id{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}comment_id{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}business_comment_type_id{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}primary{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}mdate{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}cdate{$db->re}, {$db->le}business_comment{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new BusinessComment();
				$object->id = $record["id"];
				$object->businessEntityId = $record["business_entity_id"];
				$object->commentId = $record["comment_id"];
				$object->businessCommentTypeId = $record["business_comment_type_id"];
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
		return BusinessComment::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "BusinessComment Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new BusinessCommentType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new BusinessCommentType($this->businessCommentTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new BusinessCommentType(null, $type);
		$this->businessCommentTypeId = $type->id;
		return $this->businessCommentTypeId;
	}

	public function getBusinesscommentResource($resourceId, $type="default") {
		return new BusinesscommentResource(null, $this->id, $resourceId, BusinesscommentResource::typeId($type));
	}

	public function getBusiness() {
		return new Business($this->businessEntityId);
	}

	public function setBusiness(Business $business) {
		if ($business->id>0) {
			$this->businessEntityId = $business->id;
		}
	}

	public function getComment() {
		return new Comment($this->commentId);
	}

	public function setComment(Comment $comment) {
		if ($comment->id>0) {
			$this->commentId = $comment->id;
		}
	}

	public function getBusinessCommentType() {
		return new BusinessCommentType($this->businessCommentTypeId);
	}

	public function setBusinessCommentType(BusinessCommentType $businessCommentType) {
		if ($businessCommentType->id>0) {
			$this->businessCommentTypeId = $businessCommentType->id;
		}
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
			$relationship = $this->getBusinesscommentResource($id, $type);
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
			return BusinesscommentResource::deleteAll($this->id, null, $type);
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
				$relationship = $this->getBusinesscommentResource($id, $type);
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
			"INNER JOIN {$db->le}businesscomment_resource{$db->re} ON {$db->le}businesscomment_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->le}resource{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}businesscomment_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}businesscomment_resource{$db->re}.{$db->le}business_comment_id{$db->re}={$db->queryValue($this->id)} ",
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

}
?>