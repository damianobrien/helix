<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the menu table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the menu
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called MenuExtension, and should extend the MenuTable
 * class.  The custom code file should be in the helix/modules/Core folder
 * and should be called MenuExtension.php
 * 
 * Object -> Menu
 */
class MenuTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $name;
	public $description;
	public $path;
	public $queryString;
	public $popup;
	public $createdById;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->name = null;
		$this->description = null;
		$this->path = null;
		$this->queryString = null;
		$this->popup = false;
		$this->createdById = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}menu{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}menu{$db->re}.{$db->le}id{$db->re}, {$db->le}menu{$db->re}.{$db->le}name{$db->re}, {$db->le}menu{$db->re}.{$db->le}description{$db->re}, {$db->le}menu{$db->re}.{$db->le}path{$db->re}, {$db->le}menu{$db->re}.{$db->le}query_string{$db->re}, {$db->le}menu{$db->re}.{$db->le}popup{$db->re}, {$db->le}menu{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}menu{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}menu{$db->re}.{$db->le}mdate{$db->re}, {$db->le}menu{$db->re}.{$db->le}cdate{$db->re}, {$db->le}menu{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}menu{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->name = $db->record["name"];
				$this->description = $db->record["description"];
				$this->path = $db->record["path"];
				$this->queryString = $db->record["query_string"];
				$this->popup = $db->record["popup"];
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
		$this->_initial["path"] = $this->path;
		$this->_initial["queryString"] = $this->queryString;
		$this->_initial["popup"] = $this->popup;
		$this->_initial["createdById"] = $this->createdById;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Menu();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}menu{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}menu{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}menu{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}menu{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}menu{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}menu{$db->re}.{$db->le}fdate{$db->re}, {$db->le}menu{$db->re}.{$db->le}tdate{$db->re}, {$db->le}menu{$db->re}.{$db->le}id{$db->re}, {$db->le}menu{$db->re}.{$db->le}name{$db->re}, {$db->le}menu{$db->re}.{$db->le}description{$db->re}, {$db->le}menu{$db->re}.{$db->le}path{$db->re}, {$db->le}menu{$db->re}.{$db->le}query_string{$db->re}, {$db->le}menu{$db->re}.{$db->le}popup{$db->re}, {$db->le}menu{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}menu{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}menu{$db->re}.{$db->le}mdate{$db->re}, {$db->le}menu{$db->re}.{$db->le}cdate{$db->re}, {$db->le}menu{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}menu{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}menu{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->name = $db->record["name"];
				$object->description = $db->record["description"];
				$object->path = $db->record["path"];
				$object->queryString = $db->record["query_string"];
				$object->popup = $db->record["popup"];
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
		$isDirty = $isDirty || ((string)$this->path !== (string)$this->_initial["path"]);
		$isDirty = $isDirty || ((string)$this->queryString !== (string)$this->_initial["queryString"]);
		$isDirty = $isDirty || ((int)$this->popup !== (int)$this->_initial["popup"]);
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
			"INSERT INTO {$db->le}menu{$db->re} (",
			"	{$db->le}name{$db->re}, {$db->le}description{$db->re}, {$db->le}path{$db->re}, {$db->le}query_string{$db->re}, {$db->le}popup{$db->re}, {$db->le}created_by_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->name) . ",",
				$db->queryValue($this->description) . ",",
				$db->queryValue($this->path) . ",",
				$db->queryValue($this->queryString) . ",",
				$db->queryValue(is_null($this->popup)?null:(int)$this->popup) . ",",
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
				"UPDATE {$db->le}menu{$db->re} SET",
					"{$db->le}name{$db->re}={$db->queryValue($this->name)},",
					"{$db->le}description{$db->re}={$db->queryValue($this->description)},",
					"{$db->le}path{$db->re}={$db->queryValue($this->path)},",
					"{$db->le}query_string{$db->re}={$db->queryValue($this->queryString)},",
					"{$db->le}popup{$db->re}={$db->queryValue(is_null($this->popup)?null:(int)$this->popup)},",
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
		$record = Menu::select($db->encapsulate("menu") . ".mdate as fdate,null as tdate,{$db->encapsulate("menu")}.*",null,$db->encapsulate("menu").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}menu{$dbLog->re} (",
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
				"FROM {$dbLog->le}menu{$dbLog->re}",
				"WHERE {$dbLog->le}menu{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}menu{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("menu") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("menu") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}menu{$db->le}",

			"WHERE {$db->le}menu{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Menu::select("{$db->le}menu{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Menu::select("{$db->le}menu{$db->re}.{$db->le}id{$db->re}, {$db->le}menu{$db->re}.{$db->le}name{$db->re}, {$db->le}menu{$db->re}.{$db->le}description{$db->re}, {$db->le}menu{$db->re}.{$db->le}path{$db->re}, {$db->le}menu{$db->re}.{$db->le}query_string{$db->re}, {$db->le}menu{$db->re}.{$db->le}popup{$db->re}, {$db->le}menu{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}menu{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}menu{$db->re}.{$db->le}mdate{$db->re}, {$db->le}menu{$db->re}.{$db->le}cdate{$db->re}, {$db->le}menu{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Menu();
				$object->id = $record["id"];
				$object->name = $record["name"];
				$object->description = $record["description"];
				$object->path = $record["path"];
				$object->queryString = $record["query_string"];
				$object->popup = $record["popup"];
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
			$clauses[] = "menu.name LIKE '%{$keyword}%' OR menu.description LIKE '%{$keyword}%' OR menu.path LIKE '%{$keyword}%' OR menu.query_string LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Menu::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Menu Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getEntityMenu($entityId, $type="default") {
		return new EntityMenu(null, $entityId, $this->id, EntityMenu::typeId($type));
	}

	public function getMenuPage($pageId, $type="default") {
		return new MenuPage(null, $this->id, $pageId, MenuPage::typeId($type));
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
			$relationship = $this->getEntityMenu($id, $type);
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
			return EntityMenu::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getEntityMenu($id, $type);
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
			"INNER JOIN {$db->le}entity_menu{$db->re} ON {$db->le}entity_menu{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_menu{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_menu{$db->re}.{$db->le}menu_id{$db->re}={$db->queryValue($this->id)} ",
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
			$relationship = $this->getMenuPage($id, $type);
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
			return MenuPage::deleteAll($this->id, null, $type);
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
				$relationship = $this->getMenuPage($id, $type);
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
			"INNER JOIN {$db->le}menu_page{$db->re} ON {$db->le}menu_page{$db->re}.{$db->le}page_id{$db->re}={$db->le}page{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}menu_page{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}page{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}menu_page{$db->re}.{$db->le}menu_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}menu_page{$db->re}.{$db->le}menu_page_type_id{$db->re}=" . $db->queryValue(MenuPage::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}menu_page{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
		$relationships = MenuMenu::objects(null, "{$db->le}child_menu_id{$db->re}='{$this->id}' AND {$db->le}menu_menu_type_id{$db->re}='" . MenuMenu::typeId($type) . "'");
		return ($relationships->count()===1) ? $relationships->get(0)->getParent() : new Menu();
	}

	public function getChildIds() {
		$db = Database::getInstance();
		return MenuMenu::select("menu_menu.child_menu_id", "{$db->le}order{$db->re} ASC", "menu_menu.parent_menu_id={$this->id}");
	}

	public function getChildren() {
		return $this->hasChildren() ? Menu::objects(null, "menu.id IN (" . $this->getChildIds()->join(",") . ")") : new Collection();
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
		return MenuMenu::select("menu_menu.child_menu_id", "{$db->le}order{$db->re} ASC", "menu_menu.child_menu_id<>'{$this->id}' AND menu_menu.parent_menu_id=" . $db->queryValue($this->getParent()->id));
	}

	public function getSiblings() {
		return $this->hasSiblings() ? Menu::objects(null, "menu.id IN (" . $this->getSiblingIds()->join(",") . ")") : new Collection();
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