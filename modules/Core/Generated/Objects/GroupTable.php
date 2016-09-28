<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the group table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the group
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called GroupExtension, and should extend the GroupTable
 * class.  The custom code file should be in the helix/modules/Core folder
 * and should be called GroupExtension.php
 * 
 * Object -> Group
 */
class GroupTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $name;
	public $description;
	public $groupTypeId;
	public $createdById;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $name=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = $name;
		$this->description = null;
		$this->groupTypeId = null;
		$this->createdById = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}group{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}group{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}group{$db->re}.{$db->le}id{$db->re}, {$db->le}group{$db->re}.{$db->le}name{$db->re}, {$db->le}group{$db->re}.{$db->le}description{$db->re}, {$db->le}group{$db->re}.{$db->le}group_type_id{$db->re}, {$db->le}group{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}group{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}group{$db->re}.{$db->le}mdate{$db->re}, {$db->le}group{$db->re}.{$db->le}cdate{$db->re}, {$db->le}group{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}group{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->description = $db->record["description"];
				$this->groupTypeId = $db->record["group_type_id"];
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
		$this->_initial["description"] = $this->description;
		$this->_initial["groupTypeId"] = $this->groupTypeId;
		$this->_initial["createdById"] = $this->createdById;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $name=null) {
		$object = new Group();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}group{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		} else if (isset($name)) {
			$condition = "{$db->le}group{$db->re}.{$db->le}name{$db->re}={$db->queryValue($name)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}group{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}group{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}group{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}group{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}group{$db->re}.{$db->le}fdate{$db->re}, {$db->le}group{$db->re}.{$db->le}tdate{$db->re}, {$db->le}group{$db->re}.{$db->le}id{$db->re}, {$db->le}group{$db->re}.{$db->le}name{$db->re}, {$db->le}group{$db->re}.{$db->le}description{$db->re}, {$db->le}group{$db->re}.{$db->le}group_type_id{$db->re}, {$db->le}group{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}group{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}group{$db->re}.{$db->le}mdate{$db->re}, {$db->le}group{$db->re}.{$db->le}cdate{$db->re}, {$db->le}group{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}group{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}group{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->description = $db->record["description"];
				$object->groupTypeId = $db->record["group_type_id"];
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
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
		$isDirty = $isDirty || ((int)$this->groupTypeId !== (int)$this->_initial["groupTypeId"]);
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
			"INSERT INTO {$db->le}group{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}description{$db->re}, {$db->le}group_type_id{$db->re}, {$db->le}created_by_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue(is_null($this->groupTypeId)?null:(int)$this->groupTypeId) . ",",
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
				"UPDATE {$db->le}group{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}group_type_id{$db->re}={$db->queryValue(is_null($this->groupTypeId)?null:(int)$this->groupTypeId)},",
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
		$record = Group::select($db->encapsulate("group") . ".mdate as fdate,null as tdate,{$db->encapsulate("group")}.*",null,$db->encapsulate("group").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}group{$dbLog->re} (",
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
				"FROM {$dbLog->le}group{$dbLog->re}",
				"WHERE {$dbLog->le}group{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}group{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("group") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("group") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}group{$db->le}",
			"LEFT JOIN {$db->le}group_type{$db->re} ON {$db->le}group{$db->re}.{$db->le}group_type_id{$db->re}={$db->le}group_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}group{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Group::select("{$db->le}group{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Group::select("{$db->le}group{$db->re}.{$db->le}id{$db->re}, {$db->le}group{$db->re}.{$db->le}name{$db->re}, {$db->le}group{$db->re}.{$db->le}description{$db->re}, {$db->le}group{$db->re}.{$db->le}group_type_id{$db->re}, {$db->le}group{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}group{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}group{$db->re}.{$db->le}mdate{$db->re}, {$db->le}group{$db->re}.{$db->le}cdate{$db->re}, {$db->le}group{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Group();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->description = $record["description"];
				$object->groupTypeId = $record["group_type_id"];
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
			$clauses[] = "group.name LIKE '%{$keyword}%' OR group.description LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Group::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Group Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new GroupType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new GroupType($this->groupTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new GroupType(null, $type);
		$this->groupTypeId = $type->id;
		return $this->groupTypeId;
	}

	public function getBusinessGroup($businessId, $type="default") {
		return new BusinessGroup(null, $businessId, $this->id, BusinessGroup::typeId($type));
	}

	public function getGroupOrgposition($orgpositionId, $type="default") {
		return new GroupOrgposition(null, $this->id, $orgpositionId, GroupOrgposition::typeId($type));
	}

	public function getContentGroup($contentId, $type="default") {
		return new ContentGroup(null, $contentId, $this->id, ContentGroup::typeId($type));
	}

	public function getContactGroup($contactId, $type="default") {
		return new ContactGroup(null, $contactId, $this->id, ContactGroup::typeId($type));
	}

	public function getGroupResource($resourceId, $type="default") {
		return new GroupResource(null, $this->id, $resourceId, GroupResource::typeId($type));
	}

	public function getGroupUser($userId, $type="default") {
		return new GroupUser(null, $this->id, $userId, GroupUser::typeId($type));
	}

	public function getGroupType() {
		return new GroupType($this->groupTypeId);
	}

	public function setGroupType(GroupType $groupType) {
		if ($groupType->id>0) {
			$this->groupTypeId = $groupType->id;
		}
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
			$relationship = $this->getBusinessGroup($id, $type);
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
			return BusinessGroup::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getBusinessGroup($id, $type);
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
			"INNER JOIN {$db->le}business_group{$db->re} ON {$db->le}business_group{$db->re}.{$db->le}business_entity_id{$db->re}={$db->le}business{$db->re}.{$db->le}entity_id{$db->re} ",
			"	AND {$db->le}business_group{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}business_group{$db->re}.{$db->le}group_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}business_group{$db->re}.{$db->le}business_group_type_id{$db->re}=" . $db->queryValue(BusinessGroup::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}business_group{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getContactGroup($id, $type);
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
			return ContactGroup::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getContactGroup($id, $type);
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
			"INNER JOIN {$db->le}contact_group{$db->re} ON {$db->le}contact_group{$db->re}.{$db->le}contact_person_entity_id{$db->re}={$db->le}contact{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}contact_group{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contact{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}contact_group{$db->re}.{$db->le}group_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}contact_group{$db->re}.{$db->le}contact_group_type_id{$db->re}=" . $db->queryValue(ContactGroup::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}contact_group{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getContentGroup($id, $type);
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
			return ContentGroup::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getContentGroup($id, $type);
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
			"INNER JOIN {$db->le}content_group{$db->re} ON {$db->le}content_group{$db->re}.{$db->le}content_id{$db->re}={$db->le}content{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}content_group{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content_group{$db->re}.{$db->le}group_id{$db->re}={$db->queryValue($this->id)} ",
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

	public function setOrgposition($orgposition=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeOrgpositionList($type);
		$this->addOrgposition($orgposition, $type);
		return $this;
	}
	public function removeOrgposition($orgposition, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($orgposition) ? $orgposition : array($orgposition);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getGroupOrgposition($id, $type);
			if ($deleteObject) {
				$relationship->getOrgposition()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeOrgpositionList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return GroupOrgposition::deleteAll($this->id, null, $type);
		}
	}
	public function addOrgposition($orgposition=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($orgposition)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($orgposition) ? $orgposition : array($orgposition);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getGroupOrgposition($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getOrgposition($type="default") {
		if (isset($this->_cache["Orgposition"]) && isset($this->_cache["Orgposition"][$type])) {
			$orgposition = $this->_cache["Orgposition"][$type];
		} else {
			$orgposition = new Orgposition($this->getOrgpositionId($type));
		}
		$this->_cache["Orgposition"][$type] = $orgposition;
		return $this->_cache["Orgposition"][$type];
	}
	public function getOrgpositionList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getOrgpositionIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Orgposition::objects($order, "{$db->le}orgposition{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getOrgpositionId($type="default") {
		return $this->getOrgpositionIds($type)->get(0);
	}
	public function getOrgpositionIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}orgposition{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}orgposition{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}orgposition{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}orgposition{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}orgposition{$db->re} ",
			"INNER JOIN {$db->le}group_orgposition{$db->re} ON {$db->le}group_orgposition{$db->re}.{$db->le}orgposition_id{$db->re}={$db->le}orgposition{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}group_orgposition{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}orgposition{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}group_orgposition{$db->re}.{$db->le}group_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}group_orgposition{$db->re}.{$db->le}group_orgposition_type_id{$db->re}=" . $db->queryValue(GroupOrgposition::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}group_orgposition{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getGroupResource($id, $type);
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
			return GroupResource::deleteAll($this->id, null, $type);
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
				$relationship = $this->getGroupResource($id, $type);
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
			"INNER JOIN {$db->le}group_resource{$db->re} ON {$db->le}group_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->le}resource{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}group_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}group_resource{$db->re}.{$db->le}group_id{$db->re}={$db->queryValue($this->id)} ",
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
			$relationship = $this->getGroupUser($id, $type);
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
			return GroupUser::deleteAll($this->id, null, $type);
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
				$relationship = $this->getGroupUser($id, $type);
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
			"INNER JOIN {$db->le}group_user{$db->re} ON {$db->le}group_user{$db->re}.{$db->le}user_person_entity_id{$db->re}={$db->le}user{$db->re}.{$db->le}person_entity_id{$db->re} ",
			"	AND {$db->le}group_user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}user{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}group_user{$db->re}.{$db->le}group_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}group_user{$db->re}.{$db->le}group_user_type_id{$db->re}=" . $db->queryValue(GroupUser::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}group_user{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
		$relationships = GroupGroup::objects(null, "{$db->le}child_group_id{$db->re}='{$this->id}' AND {$db->le}group_group_type_id{$db->re}='" . GroupGroup::typeId($type) . "'");
		return ($relationships->count()===1) ? $relationships->get(0)->getParent() : new Group();
	}

	public function getChildIds() {
		$db = Database::getInstance();
		return GroupGroup::select("group_group.child_group_id", "{$db->le}order{$db->re} ASC", "group_group.parent_group_id={$this->id}");
	}

	public function getChildren() {
		return $this->hasChildren() ? Group::objects(null, "group.id IN (" . $this->getChildIds()->join(",") . ")") : new Collection();
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
		return GroupGroup::select("group_group.child_group_id", "{$db->le}order{$db->re} ASC", "group_group.child_group_id<>'{$this->id}' AND group_group.parent_group_id=" . $db->queryValue($this->getParent()->id));
	}

	public function getSiblings() {
		return $this->hasSiblings() ? Group::objects(null, "group.id IN (" . $this->getSiblingIds()->join(",") . ")") : new Collection();
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