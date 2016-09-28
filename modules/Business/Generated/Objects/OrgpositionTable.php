<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the orgposition table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the orgposition
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called OrgpositionExtension, and should extend the OrgpositionTable
 * class.  The custom code file should be in the helix/modules/Business folder
 * and should be called OrgpositionExtension.php
 * 
 * Object -> Orgposition
 */
class OrgpositionTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $name;
	public $description;
	public $orgpositionTypeId;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = null;
		$this->description = null;
		$this->orgpositionTypeId = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}orgposition{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}orgposition{$db->re}.{$db->le}id{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}name{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}description{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}orgposition_type_id{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}mdate{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}cdate{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}orgposition{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->description = $db->record["description"];
				$this->orgpositionTypeId = $db->record["orgposition_type_id"];
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
		$this->_initial["orgpositionTypeId"] = $this->orgpositionTypeId;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Orgposition();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}orgposition{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}orgposition{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}orgposition{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}orgposition{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}orgposition{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}fdate{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}tdate{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}id{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}name{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}description{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}orgposition_type_id{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}mdate{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}cdate{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}orgposition{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}orgposition{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->description = $db->record["description"];
				$object->orgpositionTypeId = $db->record["orgposition_type_id"];
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
		$isDirty = $isDirty || ((int)$this->orgpositionTypeId !== (int)$this->_initial["orgpositionTypeId"]);
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
			"INSERT INTO {$db->le}orgposition{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}description{$db->re}, {$db->le}orgposition_type_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue(is_null($this->orgpositionTypeId)?null:(int)$this->orgpositionTypeId) . ",",
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
				"UPDATE {$db->le}orgposition{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}orgposition_type_id{$db->re}={$db->queryValue(is_null($this->orgpositionTypeId)?null:(int)$this->orgpositionTypeId)},",
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
		$record = Orgposition::select($db->encapsulate("orgposition") . ".mdate as fdate,null as tdate,{$db->encapsulate("orgposition")}.*",null,$db->encapsulate("orgposition").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}orgposition{$dbLog->re} (",
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
				"FROM {$dbLog->le}orgposition{$dbLog->re}",
				"WHERE {$dbLog->le}orgposition{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}orgposition{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("orgposition") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("orgposition") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}orgposition{$db->le}",
			"LEFT JOIN {$db->le}orgposition_type{$db->re} ON {$db->le}orgposition{$db->re}.{$db->le}orgposition_type_id{$db->re}={$db->le}orgposition_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}orgposition{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Orgposition::select("{$db->le}orgposition{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Orgposition::select("{$db->le}orgposition{$db->re}.{$db->le}id{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}name{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}description{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}orgposition_type_id{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}mdate{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}cdate{$db->re}, {$db->le}orgposition{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Orgposition();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->description = $record["description"];
				$object->orgpositionTypeId = $record["orgposition_type_id"];
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
			$clauses[] = "orgposition.name LIKE '%{$keyword}%' OR orgposition.description LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Orgposition::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Orgposition Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new OrgpositionType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new OrgpositionType($this->orgpositionTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new OrgpositionType(null, $type);
		$this->orgpositionTypeId = $type->id;
		return $this->orgpositionTypeId;
	}

	public function getEntityOrgposition($entityId, $type="default") {
		return new EntityOrgposition(null, $entityId, $this->id, EntityOrgposition::typeId($type));
	}

	public function getGroupOrgposition($groupId, $type="default") {
		return new GroupOrgposition(null, $groupId, $this->id, GroupOrgposition::typeId($type));
	}

	public function getOrgchartOrgposition($orgchartId, $type="default") {
		return new OrgchartOrgposition(null, $orgchartId, $this->id, OrgchartOrgposition::typeId($type));
	}

	public function getOrgpositionProject($projectId, $type="default") {
		return new OrgpositionProject(null, $this->id, $projectId, OrgpositionProject::typeId($type));
	}

	public function getOrgpositionTask($taskId, $type="default") {
		return new OrgpositionTask(null, $this->id, $taskId, OrgpositionTask::typeId($type));
	}

	public function getOrgpositionType() {
		return new OrgpositionType($this->orgpositionTypeId);
	}

	public function setOrgpositionType(OrgpositionType $orgpositionType) {
		if ($orgpositionType->id>0) {
			$this->orgpositionTypeId = $orgpositionType->id;
		}
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
			$relationship = $this->getEntityOrgposition($id, $type);
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
			return EntityOrgposition::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getEntityOrgposition($id, $type);
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
			"INNER JOIN {$db->le}entity_orgposition{$db->re} ON {$db->le}entity_orgposition{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_orgposition{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_orgposition{$db->re}.{$db->le}orgposition_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_orgposition{$db->re}.{$db->le}entity_orgposition_type_id{$db->re}=" . $db->queryValue(EntityOrgposition::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_orgposition{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getGroupOrgposition($id, $type);
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
			return GroupOrgposition::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getGroupOrgposition($id, $type);
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
			"INNER JOIN {$db->le}group_orgposition{$db->re} ON {$db->le}group_orgposition{$db->re}.{$db->le}group_id{$db->re}={$db->le}group{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}group_orgposition{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}group{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}group_orgposition{$db->re}.{$db->le}orgposition_id{$db->re}={$db->queryValue($this->id)} ",
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

	public function setOrgchart($orgchart=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeOrgchartList($type);
		$this->addOrgchart($orgchart, $type);
		return $this;
	}
	public function removeOrgchart($orgchart, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($orgchart) ? $orgchart : array($orgchart);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getOrgchartOrgposition($id, $type);
			if ($deleteObject) {
				$relationship->getOrgchart()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeOrgchartList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return OrgchartOrgposition::deleteAll(null, $this->id, $type);
		}
	}
	public function addOrgchart($orgchart=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($orgchart)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($orgchart) ? $orgchart : array($orgchart);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getOrgchartOrgposition($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getOrgchart($type="default") {
		if (isset($this->_cache["Orgchart"]) && isset($this->_cache["Orgchart"][$type])) {
			$orgchart = $this->_cache["Orgchart"][$type];
		} else {
			$orgchart = new Orgchart($this->getOrgchartId($type));
		}
		$this->_cache["Orgchart"][$type] = $orgchart;
		return $this->_cache["Orgchart"][$type];
	}
	public function getOrgchartList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getOrgchartIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Orgchart::objects($order, "{$db->le}orgchart{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getOrgchartId($type="default") {
		return $this->getOrgchartIds($type)->get(0);
	}
	public function getOrgchartIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}orgchart{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}orgchart{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}orgchart{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}orgchart{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}orgchart{$db->re} ",
			"INNER JOIN {$db->le}orgchart_orgposition{$db->re} ON {$db->le}orgchart_orgposition{$db->re}.{$db->le}orgchart_id{$db->re}={$db->le}orgchart{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}orgchart_orgposition{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}orgchart{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}orgchart_orgposition{$db->re}.{$db->le}orgposition_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}orgchart_orgposition{$db->re}.{$db->le}orgchart_orgposition_type_id{$db->re}=" . $db->queryValue(OrgchartOrgposition::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}orgchart_orgposition{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setProject($project=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeProjectList($type);
		$this->addProject($project, $type);
		return $this;
	}
	public function removeProject($project, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($project) ? $project : array($project);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getOrgpositionProject($id, $type);
			if ($deleteObject) {
				$relationship->getProject()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeProjectList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return OrgpositionProject::deleteAll($this->id, null, $type);
		}
	}
	public function addProject($project=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($project)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($project) ? $project : array($project);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getOrgpositionProject($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getProject($type="default") {
		if (isset($this->_cache["Project"]) && isset($this->_cache["Project"][$type])) {
			$project = $this->_cache["Project"][$type];
		} else {
			$project = new Project($this->getProjectId($type));
		}
		$this->_cache["Project"][$type] = $project;
		return $this->_cache["Project"][$type];
	}
	public function getProjectList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getProjectIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Project::objects($order, "{$db->le}project{$db->le}.{$db->re}projectentity_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getProjectId($type="default") {
		return $this->getProjectIds($type)->get(0);
	}
	public function getProjectIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}project{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}project{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}project{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}project{$db->re}.{$db->le}projectentity_id{$db->re} ",
			"FROM {$db->le}project{$db->re} ",
			"INNER JOIN {$db->le}orgposition_project{$db->re} ON {$db->le}orgposition_project{$db->re}.{$db->le}project_projectentity_id{$db->re}={$db->le}project{$db->re}.{$db->le}projectentity_id{$db->re} ",
			"	AND {$db->le}orgposition_project{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}project{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}orgposition_project{$db->re}.{$db->le}orgposition_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}orgposition_project{$db->re}.{$db->le}orgposition_project_type_id{$db->re}=" . $db->queryValue(OrgpositionProject::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}orgposition_project{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["projectentity_id"];
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
			$relationship = $this->getOrgpositionTask($id, $type);
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
			return OrgpositionTask::deleteAll($this->id, null, $type);
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
				$relationship = $this->getOrgpositionTask($id, $type);
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
			"INNER JOIN {$db->le}orgposition_task{$db->re} ON {$db->le}orgposition_task{$db->re}.{$db->le}task_id{$db->re}={$db->le}task{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}orgposition_task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}orgposition_task{$db->re}.{$db->le}orgposition_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}orgposition_task{$db->re}.{$db->le}orgposition_task_type_id{$db->re}=" . $db->queryValue(OrgpositionTask::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}orgposition_task{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function getParent($type="default") {
		$db = Database::getInstance();
		$relationships = OrgpositionOrgposition::objects(null, "{$db->le}child_orgposition_id{$db->re}='{$this->id}' AND {$db->le}orgposition_orgposition_type_id{$db->re}='" . OrgpositionOrgposition::typeId($type) . "'");
		return ($relationships->count()===1) ? $relationships->get(0)->getParent() : new Orgposition();
	}

	public function getChildIds() {
		$db = Database::getInstance();
		return OrgpositionOrgposition::select("orgposition_orgposition.child_orgposition_id", null, "orgposition_orgposition.parent_orgposition_id={$this->id}");
	}

	public function getChildren() {
		return $this->hasChildren() ? Orgposition::objects(null, "orgposition.id IN (" . $this->getChildIds()->join(",") . ")") : new Collection();
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
		return OrgpositionOrgposition::select("orgposition_orgposition.child_orgposition_id", null, "orgposition_orgposition.child_orgposition_id<>'{$this->id}' AND orgposition_orgposition.parent_orgposition_id=" . $db->queryValue($this->getParent()->id));
	}

	public function getSiblings() {
		return $this->hasSiblings() ? Orgposition::objects(null, "orgposition.id IN (" . $this->getSiblingIds()->join(",") . ")") : new Collection();
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