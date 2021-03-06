<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the url table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the url
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called UrlExtension, and should extend the UrlTable
 * class.  The custom code file should be in the helix/modules/Core folder
 * and should be called UrlExtension.php
 * 
 * Object -> Url
 */
class UrlTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $value;
	public $createdById;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null, $value=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->value = $value;
		$this->createdById = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}url{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}url{$db->re}.{$db->le}id{$db->re}, {$db->le}url{$db->re}.{$db->le}value{$db->re}, {$db->le}url{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}url{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}url{$db->re}.{$db->le}mdate{$db->re}, {$db->le}url{$db->re}.{$db->le}cdate{$db->re}, {$db->le}url{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}url{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->value = $db->record["value"];
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
		$this->_initial["value"] = $this->value;
		$this->_initial["createdById"] = $this->createdById;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Url();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}url{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}url{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}url{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}url{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}url{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}url{$db->re}.{$db->le}fdate{$db->re}, {$db->le}url{$db->re}.{$db->le}tdate{$db->re}, {$db->le}url{$db->re}.{$db->le}id{$db->re}, {$db->le}url{$db->re}.{$db->le}value{$db->re}, {$db->le}url{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}url{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}url{$db->re}.{$db->le}mdate{$db->re}, {$db->le}url{$db->re}.{$db->le}cdate{$db->re}, {$db->le}url{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}url{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}url{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->value = $db->record["value"];
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
		$isDirty = $isDirty || ((string)$this->value !== (string)$this->_initial["value"]);
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
			"INSERT INTO {$db->le}url{$db->re} (",
			"	{$db->le}value{$db->re}, {$db->le}created_by_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->value) . ",",
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
				"UPDATE {$db->le}url{$db->re} SET",
					"{$db->le}value{$db->re}={$db->queryValue($this->value)},",
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
		$record = Url::select($db->encapsulate("url") . ".mdate as fdate,null as tdate,{$db->encapsulate("url")}.*",null,$db->encapsulate("url").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}url{$dbLog->re} (",
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
				"FROM {$dbLog->le}url{$dbLog->re}",
				"WHERE {$dbLog->le}url{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}url{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("url") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("url") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}url{$db->le}",

			"WHERE {$db->le}url{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Url::select("{$db->le}url{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Url::select("{$db->le}url{$db->re}.{$db->le}id{$db->re}, {$db->le}url{$db->re}.{$db->le}value{$db->re}, {$db->le}url{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}url{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}url{$db->re}.{$db->le}mdate{$db->re}, {$db->le}url{$db->re}.{$db->le}cdate{$db->re}, {$db->le}url{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Url();
				$object->id = $record["id"];
				$object->value = $record["value"];
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
			$clauses[] = "url.value LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Url::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return $this->value;
	}

	public function string() {
		return $this->__toString();
	}


	public function getAssetUrl($assetId, $type="default") {
		return new AssetUrl(null, $assetId, $this->id, AssetUrl::typeId($type));
	}

	public function getContentUrl($contentId, $type="default") {
		return new ContentUrl(null, $contentId, $this->id, ContentUrl::typeId($type));
	}

	public function getEventUrl($eventId, $type="default") {
		return new EventUrl(null, $eventId, $this->id, EventUrl::typeId($type));
	}

	public function getEntityUrl($entityId, $type="default") {
		return new EntityUrl(null, $entityId, $this->id, EntityUrl::typeId($type));
	}

	public function getResourceUrl($resourceId, $type="default") {
		return new ResourceUrl(null, $resourceId, $this->id, ResourceUrl::typeId($type));
	}

	public function getDocumentUrl($documentId, $type="default") {
		return new DocumentUrl(null, $documentId, $this->id, DocumentUrl::typeId($type));
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
			$relationship = $this->getAssetUrl($id, $type);
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
			return AssetUrl::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getAssetUrl($id, $type);
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
			"INNER JOIN {$db->le}asset_url{$db->re} ON {$db->le}asset_url{$db->re}.{$db->le}asset_id{$db->re}={$db->le}asset{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}asset_url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}asset_url{$db->re}.{$db->le}url_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}asset_url{$db->re}.{$db->le}asset_url_type_id{$db->re}=" . $db->queryValue(AssetUrl::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}asset_url{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getContentUrl($id, $type);
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
			return ContentUrl::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getContentUrl($id, $type);
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
			"INNER JOIN {$db->le}content_url{$db->re} ON {$db->le}content_url{$db->re}.{$db->le}content_id{$db->re}={$db->le}content{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}content_url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content_url{$db->re}.{$db->le}url_id{$db->re}={$db->queryValue($this->id)} ",
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
			$relationship = $this->getDocumentUrl($id, $type);
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
			return DocumentUrl::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getDocumentUrl($id, $type);
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
			"INNER JOIN {$db->le}document_url{$db->re} ON {$db->le}document_url{$db->re}.{$db->le}document_id{$db->re}={$db->le}document{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}document_url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}document{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}document_url{$db->re}.{$db->le}url_id{$db->re}={$db->queryValue($this->id)} ",
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
			$relationship = $this->getEntityUrl($id, $type);
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
			return EntityUrl::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getEntityUrl($id, $type);
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
			"INNER JOIN {$db->le}entity_url{$db->re} ON {$db->le}entity_url{$db->re}.{$db->le}entity_id{$db->re}={$db->le}entity{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}entity_url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}entity_url{$db->re}.{$db->le}url_id{$db->re}={$db->queryValue($this->id)} ",
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
			$relationship = $this->getEventUrl($id, $type);
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
			return EventUrl::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getEventUrl($id, $type);
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
			"INNER JOIN {$db->le}event_url{$db->re} ON {$db->le}event_url{$db->re}.{$db->le}event_id{$db->re}={$db->le}event{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}event_url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}event{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}event_url{$db->re}.{$db->le}url_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}event_url{$db->re}.{$db->le}event_url_type_id{$db->re}=" . $db->queryValue(EventUrl::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}event_url{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getResourceUrl($id, $type);
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
			return ResourceUrl::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getResourceUrl($id, $type);
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
			"INNER JOIN {$db->le}resource_url{$db->re} ON {$db->le}resource_url{$db->re}.{$db->le}resource_id{$db->re}={$db->le}resource{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}resource_url{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}resource{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}resource_url{$db->re}.{$db->le}url_id{$db->re}={$db->queryValue($this->id)} ",
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