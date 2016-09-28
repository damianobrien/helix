<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the entity table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the entity
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called EntityExtension, and should extend the EntityTable
 * class.  The custom code file should be in the helix/modules/Core folder
 * and should be called EntityExtension.php
 * 
 * Object -> Entity
 */
class EntityTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $description;
	public $entityTypeId;
	public $createdById;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->description = null;
		$this->entityTypeId = null;
		$this->createdById = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}entity{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}entity{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}entity{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}entity{$db->re}.{$db->le}mdate{$db->re}, {$db->le}entity{$db->re}.{$db->le}cdate{$db->re}, {$db->le}entity{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}entity{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->description = $db->record["description"];
				$this->entityTypeId = $db->record["entity_type_id"];
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
		$this->_initial["description"] = $this->description;
		$this->_initial["entityTypeId"] = $this->entityTypeId;
		$this->_initial["createdById"] = $this->createdById;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Entity();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}entity{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}entity{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}entity{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}entity{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}entity{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}entity{$db->re}.{$db->le}fdate{$db->re}, {$db->le}entity{$db->re}.{$db->le}tdate{$db->re}, {$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}entity{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}entity{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}entity{$db->re}.{$db->le}mdate{$db->re}, {$db->le}entity{$db->re}.{$db->le}cdate{$db->re}, {$db->le}entity{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}entity{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}entity{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->description = $db->record["description"];
				$object->entityTypeId = $db->record["entity_type_id"];
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
		$isDirty = $isDirty || ((string)$this->description !== (string)$this->_initial["description"]);
		$isDirty = $isDirty || ((int)$this->entityTypeId !== (int)$this->_initial["entityTypeId"]);
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
			"INSERT INTO {$db->le}entity{$db->re} (",
			"	{$db->le}description{$db->re}, {$db->le}entity_type_id{$db->re}, {$db->le}created_by_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->description) . ",",
				$db->queryValue(is_null($this->entityTypeId)?null:(int)$this->entityTypeId) . ",",
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
				"UPDATE {$db->le}entity{$db->re} SET",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}entity_type_id{$db->re}={$db->queryValue(is_null($this->entityTypeId)?null:(int)$this->entityTypeId)},",
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
		$record = Entity::select($db->encapsulate("entity") . ".mdate as fdate,null as tdate,{$db->encapsulate("entity")}.*",null,$db->encapsulate("entity").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}entity{$dbLog->re} (",
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
				"FROM {$dbLog->le}entity{$dbLog->re}",
				"WHERE {$dbLog->le}entity{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}entity{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("entity") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("entity") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}entity{$db->le}",
			"LEFT JOIN {$db->le}entity_type{$db->re} ON {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}={$db->le}entity_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}entity{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Entity::select("{$db->le}entity{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Entity::select("{$db->le}entity{$db->re}.{$db->le}id{$db->re}, {$db->le}entity{$db->re}.{$db->le}description{$db->re}, {$db->le}entity{$db->re}.{$db->le}entity_type_id{$db->re}, {$db->le}entity{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}entity{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}entity{$db->re}.{$db->le}mdate{$db->re}, {$db->le}entity{$db->re}.{$db->le}cdate{$db->re}, {$db->le}entity{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Entity();
				$object->id = $record["id"];
				$object->description = $record["description"];
				$object->entityTypeId = $record["entity_type_id"];
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
			$clauses[] = "entity.description LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Entity::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Entity Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new EntityType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new EntityType($this->entityTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new EntityType(null, $type);
		$this->entityTypeId = $type->id;
		return $this->entityTypeId;
	}

	public function getEntityOrgchart($orgchartId, $type="default") {
		return new EntityOrgchart(null, $this->id, $orgchartId, EntityOrgchart::typeId($type));
	}

	public function getEntityOrgposition($orgpositionId, $type="default") {
		return new EntityOrgposition(null, $this->id, $orgpositionId, EntityOrgposition::typeId($type));
	}

	public function getEntityEvent($eventId, $type="default") {
		return new EntityEvent(null, $this->id, $eventId, EntityEvent::typeId($type));
	}

	public function getEntityOrder($orderId, $type="default") {
		return new EntityOrder(null, $this->id, $orderId, EntityOrder::typeId($type));
	}

	public function getEntityPayment($paymentId, $type="default") {
		return new EntityPayment(null, $this->id, $paymentId, EntityPayment::typeId($type));
	}

	public function getEntityPaymentaccount($paymentaccountId, $type="default") {
		return new EntityPaymentaccount(null, $this->id, $paymentaccountId, EntityPaymentaccount::typeId($type));
	}

	public function getAddressEntity($addressId, $type="default") {
		return new AddressEntity(null, $addressId, $this->id, AddressEntity::typeId($type));
	}

	public function getEmailEntity($emailId, $type="default") {
		return new EmailEntity(null, $emailId, $this->id, EmailEntity::typeId($type));
	}

	public function getEntityMenu($menuId, $type="default") {
		return new EntityMenu(null, $this->id, $menuId, EntityMenu::typeId($type));
	}

	public function getEntityPhone($phoneId, $type="default") {
		return new EntityPhone(null, $this->id, $phoneId, EntityPhone::typeId($type));
	}

	public function getEntityResource($resourceId, $type="default") {
		return new EntityResource(null, $this->id, $resourceId, EntityResource::typeId($type));
	}

	public function getEntityUrl($urlId, $type="default") {
		return new EntityUrl(null, $this->id, $urlId, EntityUrl::typeId($type));
	}

	public function getDocumentEntity($documentId, $type="default") {
		return new DocumentEntity(null, $documentId, $this->id, DocumentEntity::typeId($type));
	}

	public function getEntityProjectentity($projectentityId, $type="default") {
		return new EntityProjectentity(null, $this->id, $projectentityId, EntityProjectentity::typeId($type));
	}

	public function getEntityTask($taskId, $type="default") {
		return new EntityTask(null, $this->id, $taskId, EntityTask::typeId($type));
	}

	public function getEntityType() {
		return new EntityType($this->entityTypeId);
	}

	public function setEntityType(EntityType $entityType) {
		if ($entityType->id>0) {
			$this->entityTypeId = $entityType->id;
		}
	}

	public function setAddress($address=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeAddressList($type);
		$this->addAddress($address, $type);
		return $this;
	}
	public function removeAddress($address, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($address) ? $address : array($address);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getAddressEntity($id, $type);
			if ($deleteObject) {
				$relationship->getAddress()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeAddressList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return AddressEntity::deleteAll(null, $this->id, $type);
		}
	}
	public function addAddress($address=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($address)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($address) ? $address : array($address);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getAddressEntity($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getAddress($type="default") {
		if (isset($this->_cache["Address"]) && isset($this->_cache["Address"][$type])) {
			$address = $this->_cache["Address"][$type];
		} else {
			$address = new Address($this->getAddressId($type));
		}
		$this->_cache["Address"][$type] = $address;
		return $this->_cache["Address"][$type];
	}
	public function getAddressList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getAddressIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Address::objects($order, "{$db->le}address{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getAddressId($type="default") {
		return $this->getAddressIds($type)->get(0);
	}
	public function getAddressIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}address{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}address{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}address{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}address{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}address{$db->re} ",
			"INNER JOIN {$db->le}address_entity{$db->re} ON {$db->le}address_entity{$db->re}.{$db->le}address_id{$db->re}={$db->le}address{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}address_entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}address{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}address_entity{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}address_entity{$db->re}.{$db->le}address_entity_type_id{$db->re}=" . $db->queryValue(AddressEntity::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}address_entity{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getDocumentEntity($id, $type);
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
			return DocumentEntity::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getDocumentEntity($id, $type);
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
			"INNER JOIN {$db->le}document_entity{$db->re} ON {$db->le}document_entity{$db->re}.{$db->le}document_id{$db->re}={$db->le}document{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}document_entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}document{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}document_entity{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($this->id)} ",
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

	public function setEmail($email=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeEmailList($type);
		$email = is_object($email) || is_int($email) ? $email : $this->getEmail($type, true)->setValue($email);
		$this->addEmail($email, $type);
		return $this;
	}
	public function removeEmail($email, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($email) ? $email : array($email);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEmailEntity($id, $type);
			if ($deleteObject) {
				$relationship->getEmail()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeEmailList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EmailEntity::deleteAll(null, $this->id, $type);
		}
	}
	public function addEmail($email=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($email)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($email) ? $email : array($email);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEmailEntity($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getEmail($type="default", $getAsObject=false) {
		if (isset($this->_cache["Email"]) && isset($this->_cache["Email"][$type])) {
			$email = $this->_cache["Email"][$type];
		} else {
			$email = new Email($this->getEmailId($type));
		}
		$this->_cache["Email"][$type] = $email;
		return $getAsObject ? $this->_cache["Email"][$type] : $this->_cache["Email"][$type]->value;
	}
	public function getEmailList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getEmailIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Email::objects($order, "{$db->le}email{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getEmailId($type="default") {
		return $this->getEmailIds($type)->get(0);
	}
	public function getEmailIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}email{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}email{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}email{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}email{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}email{$db->re} ",
			"INNER JOIN {$db->le}email_entity{$db->re} ON {$db->le}email_entity{$db->re}.{$db->le}email_id{$db->re}={$db->le}email{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}email_entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}email{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}email_entity{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}email_entity{$db->re}.{$db->le}email_entity_type_id{$db->re}=" . $db->queryValue(EmailEntity::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}email_entity{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setEvent($event=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeEventList($type);
		$this->addEvent($event, $type);
		return $this;
	}
	public function removeEvent($event, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($event) ? $event : array($event);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEntityEvent($id, $type);
			if ($deleteObject) {
				$relationship->getEvent()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeEventList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EntityEvent::deleteAll($this->id, null, $type);
		}
	}
	public function addEvent($event=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($event)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($event) ? $event : array($event);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEntityEvent($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getEvent($type="default") {
		if (isset($this->_cache["Event"]) && isset($this->_cache["Event"][$type])) {
			$event = $this->_cache["Event"][$type];
		} else {
			$event = new Event($this->getEventId($type));
		}
		$this->_cache["Event"][$type] = $event;
		return $this->_cache["Event"][$type];
	}
	public function getEventList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getEventIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Event::objects($order, "{$db->le}event{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getEventId($type="default") {
		return $this->getEventIds($type)->get(0);
	}
	public function getEventIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}event{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}event{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}event{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}event{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}event{$db->re} ",
			"INNER JOIN {$db->le}entity_event{$db->re} ON {$db->le}entity_event{$db->re}.{$db->le}event_id{$db->re}={$db->le}event{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_event{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}event{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_event{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_event{$db->re}.{$db->le}entity_event_type_id{$db->re}=" . $db->queryValue(EntityEvent::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_event{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setMenu($menu=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeMenuList($type);
		$this->addMenu($menu, $type);
		return $this;
	}
	public function removeMenu($menu, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($menu) ? $menu : array($menu);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEntityMenu($id, $type);
			if ($deleteObject) {
				$relationship->getMenu()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeMenuList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EntityMenu::deleteAll($this->id, null, $type);
		}
	}
	public function addMenu($menu=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($menu)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($menu) ? $menu : array($menu);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEntityMenu($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getMenu($type="default") {
		if (isset($this->_cache["Menu"]) && isset($this->_cache["Menu"][$type])) {
			$menu = $this->_cache["Menu"][$type];
		} else {
			$menu = new Menu($this->getMenuId($type));
		}
		$this->_cache["Menu"][$type] = $menu;
		return $this->_cache["Menu"][$type];
	}
	public function getMenuList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getMenuIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Menu::objects($order, "{$db->le}menu{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getMenuId($type="default") {
		return $this->getMenuIds($type)->get(0);
	}
	public function getMenuIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}menu{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}menu{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}menu{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}menu{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}menu{$db->re} ",
			"INNER JOIN {$db->le}entity_menu{$db->re} ON {$db->le}entity_menu{$db->re}.{$db->le}menu_id{$db->re}={$db->le}menu{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_menu{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}menu{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_menu{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_menu{$db->re}.{$db->le}entity_menu_type_id{$db->re}=" . $db->queryValue(EntityMenu::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_menu{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setOrder($order=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeOrderList($type);
		$this->addOrder($order, $type);
		return $this;
	}
	public function removeOrder($order, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($order) ? $order : array($order);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEntityOrder($id, $type);
			if ($deleteObject) {
				$relationship->getOrder()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeOrderList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EntityOrder::deleteAll($this->id, null, $type);
		}
	}
	public function addOrder($order=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($order)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($order) ? $order : array($order);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEntityOrder($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getOrder($type="default") {
		if (isset($this->_cache["Order"]) && isset($this->_cache["Order"][$type])) {
			$order = $this->_cache["Order"][$type];
		} else {
			$order = new Order($this->getOrderId($type));
		}
		$this->_cache["Order"][$type] = $order;
		return $this->_cache["Order"][$type];
	}
	public function getOrderList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getOrderIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Order::objects($order, "{$db->le}order{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getOrderId($type="default") {
		return $this->getOrderIds($type)->get(0);
	}
	public function getOrderIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}order{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}order{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}order{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}order{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}order{$db->re} ",
			"INNER JOIN {$db->le}entity_order{$db->re} ON {$db->le}entity_order{$db->re}.{$db->le}order_id{$db->re}={$db->le}order{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_order{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}order{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_order{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_order{$db->re}.{$db->le}entity_order_type_id{$db->re}=" . $db->queryValue(EntityOrder::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_order{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getEntityOrgchart($id, $type);
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
			return EntityOrgchart::deleteAll($this->id, null, $type);
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
				$relationship = $this->getEntityOrgchart($id, $type);
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
			"INNER JOIN {$db->le}entity_orgchart{$db->re} ON {$db->le}entity_orgchart{$db->re}.{$db->le}orgchart_id{$db->re}={$db->le}orgchart{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_orgchart{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}orgchart{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_orgchart{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_orgchart{$db->re}.{$db->le}entity_orgchart_type_id{$db->re}=" . $db->queryValue(EntityOrgchart::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_orgchart{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getEntityOrgposition($id, $type);
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
			return EntityOrgposition::deleteAll($this->id, null, $type);
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
				$relationship = $this->getEntityOrgposition($id, $type);
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
			"INNER JOIN {$db->le}entity_orgposition{$db->re} ON {$db->le}entity_orgposition{$db->re}.{$db->le}orgposition_id{$db->re}={$db->le}orgposition{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_orgposition{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}orgposition{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_orgposition{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($this->id)} ",
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

	public function setPayment($payment=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removePaymentList($type);
		$this->addPayment($payment, $type);
		return $this;
	}
	public function removePayment($payment, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($payment) ? $payment : array($payment);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEntityPayment($id, $type);
			if ($deleteObject) {
				$relationship->getPayment()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removePaymentList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EntityPayment::deleteAll($this->id, null, $type);
		}
	}
	public function addPayment($payment=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($payment)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($payment) ? $payment : array($payment);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEntityPayment($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getPayment($type="default") {
		if (isset($this->_cache["Payment"]) && isset($this->_cache["Payment"][$type])) {
			$payment = $this->_cache["Payment"][$type];
		} else {
			$payment = new Payment($this->getPaymentId($type));
		}
		$this->_cache["Payment"][$type] = $payment;
		return $this->_cache["Payment"][$type];
	}
	public function getPaymentList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getPaymentIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Payment::objects($order, "{$db->le}payment{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getPaymentId($type="default") {
		return $this->getPaymentIds($type)->get(0);
	}
	public function getPaymentIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}payment{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}payment{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}payment{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}payment{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}payment{$db->re} ",
			"INNER JOIN {$db->le}entity_payment{$db->re} ON {$db->le}entity_payment{$db->re}.{$db->le}payment_id{$db->re}={$db->le}payment{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_payment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}payment{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_payment{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_payment{$db->re}.{$db->le}entity_payment_type_id{$db->re}=" . $db->queryValue(EntityPayment::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_payment{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setPaymentaccount($paymentaccount=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removePaymentaccountList($type);
		$this->addPaymentaccount($paymentaccount, $type);
		return $this;
	}
	public function removePaymentaccount($paymentaccount, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($paymentaccount) ? $paymentaccount : array($paymentaccount);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEntityPaymentaccount($id, $type);
			if ($deleteObject) {
				$relationship->getPaymentaccount()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removePaymentaccountList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EntityPaymentaccount::deleteAll(null, $this->id, $type);
		}
	}
	public function addPaymentaccount($paymentaccount=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($paymentaccount)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($paymentaccount) ? $paymentaccount : array($paymentaccount);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEntityPaymentaccount($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getPaymentaccount($type="default") {
		if (isset($this->_cache["Paymentaccount"]) && isset($this->_cache["Paymentaccount"][$type])) {
			$paymentaccount = $this->_cache["Paymentaccount"][$type];
		} else {
			$paymentaccount = new Paymentaccount($this->getPaymentaccountId($type));
		}
		$this->_cache["Paymentaccount"][$type] = $paymentaccount;
		return $this->_cache["Paymentaccount"][$type];
	}
	public function getPaymentaccountList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getPaymentaccountIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Paymentaccount::objects($order, "{$db->le}paymentaccount{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getPaymentaccountId($type="default") {
		return $this->getPaymentaccountIds($type)->get(0);
	}
	public function getPaymentaccountIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}paymentaccount{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}paymentaccount{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}paymentaccount{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}paymentaccount{$db->re} ",
			"INNER JOIN {$db->le}entity_paymentaccount{$db->re} ON {$db->le}entity_paymentaccount{$db->re}.{$db->le}paymentaccount_id{$db->re}={$db->le}paymentaccount{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_paymentaccount{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}paymentaccount{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_paymentaccount{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_paymentaccount{$db->re}.{$db->le}entity_paymentaccount_type_id{$db->re}=" . $db->queryValue(EntityPaymentaccount::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_paymentaccount{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setPhone($phone=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removePhoneList($type);
		$this->addPhone($phone, $type);
		return $this;
	}
	public function removePhone($phone, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($phone) ? $phone : array($phone);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getEntityPhone($id, $type);
			if ($deleteObject) {
				$relationship->getPhone()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removePhoneList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return EntityPhone::deleteAll($this->id, null, $type);
		}
	}
	public function addPhone($phone=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($phone)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($phone) ? $phone : array($phone);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getEntityPhone($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getPhone($type="default") {
		if (isset($this->_cache["Phone"]) && isset($this->_cache["Phone"][$type])) {
			$phone = $this->_cache["Phone"][$type];
		} else {
			$phone = new Phone($this->getPhoneId($type));
		}
		$this->_cache["Phone"][$type] = $phone;
		return $this->_cache["Phone"][$type];
	}
	public function getPhoneList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getPhoneIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Phone::objects($order, "{$db->le}phone{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getPhoneId($type="default") {
		return $this->getPhoneIds($type)->get(0);
	}
	public function getPhoneIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}phone{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}phone{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}phone{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}phone{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}phone{$db->re} ",
			"INNER JOIN {$db->le}entity_phone{$db->re} ON {$db->le}entity_phone{$db->re}.{$db->le}phone_id{$db->re}={$db->le}phone{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_phone{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}phone{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_phone{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_phone{$db->re}.{$db->le}entity_phone_type_id{$db->re}=" . $db->queryValue(EntityPhone::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_phone{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getEntityProjectentity($id, $type);
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
			return EntityProjectentity::deleteAll($this->id, null, $type);
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
				$relationship = $this->getEntityProjectentity($id, $type);
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
			"INNER JOIN {$db->le}entity_projectentity{$db->re} ON {$db->le}entity_projectentity{$db->re}.{$db->le}projectentity_id{$db->re}={$db->le}projectentity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_projectentity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}projectentity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_projectentity{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_projectentity{$db->re}.{$db->le}entity_projectentity_type_id{$db->re}=" . $db->queryValue(EntityProjectentity::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_projectentity{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getEntityResource($id, $type);
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
			return EntityResource::deleteAll($this->id, null, $type);
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
				$relationship = $this->getEntityResource($id, $type);
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
			"INNER JOIN {$db->le}entity_resource{$db->re} ON {$db->le}entity_resource{$db->re}.{$db->le}resource_id{$db->re}={$db->le}resource{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_resource{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($this->id)} ",
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
			$relationship = $this->getEntityTask($id, $type);
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
			return EntityTask::deleteAll($this->id, null, $type);
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
				$relationship = $this->getEntityTask($id, $type);
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
			"INNER JOIN {$db->le}entity_task{$db->re} ON {$db->le}entity_task{$db->re}.{$db->le}task_id{$db->re}={$db->le}task{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}task{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_task{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_task{$db->re}.{$db->le}entity_task_type_id{$db->re}=" . $db->queryValue(EntityTask::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_task{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getEntityUrl($id, $type);
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
			return EntityUrl::deleteAll($this->id, null, $type);
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
				$relationship = $this->getEntityUrl($id, $type);
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
			"INNER JOIN {$db->le}entity_url{$db->re} ON {$db->le}entity_url{$db->re}.{$db->le}url_id{$db->re}={$db->le}url{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_url{$db->re}.{$db->le}entity_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}entity_url{$db->re}.{$db->le}entity_url_type_id{$db->re}=" . $db->queryValue(EntityUrl::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}entity_url{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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