<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the video table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the video
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called VideoExtension, and should extend the VideoTable
 * class.  The custom code file should be in the helix/modules/Video folder
 * and should be called VideoExtension.php
 * 
 * Object -> Resource -> Video
 */
class VideoTable extends Resource {
	public $logSequence;
	public $fdate;
	public $tdate;

	public $videoTypeId;
	public $duration;
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
		$this->videoTypeId = null;
		$this->duration = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}video{$db->re}.{$db->le}resource_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($hash)) {
			$condition = "{$db->le}resource{$db->re}.{$db->le}hash{$db->re}={$db->queryValue($hash)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}resource{$db->re}.{$db->le}id{$db->re}, {$db->le}resource{$db->re}.{$db->le}name{$db->re}, {$db->le}resource{$db->re}.{$db->le}hash{$db->re}, {$db->le}resource{$db->re}.{$db->le}folder{$db->re}, {$db->le}resource{$db->re}.{$db->le}description{$db->re}, {$db->le}resource{$db->re}.{$db->le}bytes{$db->re}, {$db->le}resource{$db->re}.{$db->le}mime_type{$db->re}, {$db->le}resource{$db->re}.{$db->le}meta{$db->re}, {$db->le}resource{$db->re}.{$db->le}resource_type_id{$db->re}, {$db->le}resource{$db->re}.{$db->le}expirationdate{$db->re}, {$db->le}resource{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}video{$db->re}.{$db->le}video_type_id{$db->re}, {$db->le}video{$db->re}.{$db->le}duration{$db->re}, {$db->le}video{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}video{$db->re}.{$db->le}mdate{$db->re}, {$db->le}video{$db->re}.{$db->le}cdate{$db->re}, {$db->le}video{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}video{$db->re}",
			"INNER JOIN {$db->le}resource{$db->re} ON {$db->le}video{$db->re}.{$db->le}resource_id{$db->re}={$db->le}resource{$db->re}.{$db->le}id{$db->re} AND {$condition}"
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
				$this->videoTypeId = $db->record["video_type_id"];
				$this->duration = $db->record["duration"];
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
		$this->_initial["videoTypeId"] = $this->videoTypeId;
		$this->_initial["duration"] = $this->duration;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null, $hash=null) {
		$object = new Video();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}video{$db->re}.{$db->le}resource_id{$db->re}={$db->queryValue($id)}";
		} else if (isset($hash)) {
			$condition = "{$db->le}resource{$db->re}.{$db->le}hash{$db->re}={$db->queryValue($hash)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}video{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}video{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}video{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}resource{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}resource{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}resource{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}video{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}video{$db->re}.{$db->le}fdate{$db->re}, {$db->le}video{$db->re}.{$db->le}tdate{$db->re}, {$db->le}resource{$db->re}.{$db->le}id{$db->re}, {$db->le}resource{$db->re}.{$db->le}name{$db->re}, {$db->le}resource{$db->re}.{$db->le}hash{$db->re}, {$db->le}resource{$db->re}.{$db->le}folder{$db->re}, {$db->le}resource{$db->re}.{$db->le}description{$db->re}, {$db->le}resource{$db->re}.{$db->le}bytes{$db->re}, {$db->le}resource{$db->re}.{$db->le}mime_type{$db->re}, {$db->le}resource{$db->re}.{$db->le}meta{$db->re}, {$db->le}resource{$db->re}.{$db->le}resource_type_id{$db->re}, {$db->le}resource{$db->re}.{$db->le}expirationdate{$db->re}, {$db->le}resource{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}video{$db->re}.{$db->le}video_type_id{$db->re}, {$db->le}video{$db->re}.{$db->le}duration{$db->re}, {$db->le}video{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}video{$db->re}.{$db->le}mdate{$db->re}, {$db->le}video{$db->re}.{$db->le}cdate{$db->re}, {$db->le}video{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}video{$db->re}",
			"INNER JOIN {$db->le}resource{$db->re} ON {$db->le}video{$db->re}.{$db->le}resource_id{$db->re}={$db->le}resource{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$query .= "ORDER BY {$db->le}video{$db->re}.log_sequence desc limit 1";
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
				$object->videoTypeId = $db->record["video_type_id"];
				$object->duration = $db->record["duration"];
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
		$isDirty = $isDirty || ((int)$this->videoTypeId !== (int)$this->_initial["videoTypeId"]);
		$isDirty = $isDirty || ((float)$this->duration !== (float)$this->_initial["duration"]);
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

	public function insert($insertParent=true) {
		if (isset($this->_snapshot)) {return false;}
		global $session, $config;

		$db = Database::getInstance();
		if ($insertParent) {
			parent::insert();
		}
		$query = implode(NL, array(
			"INSERT INTO {$db->le}video{$db->re} (",
			"	{$db->le}resource_id{$db->re}, {$db->le}video_type_id{$db->re}, {$db->le}duration{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->id)?null:(int)$this->id) . ",",
				$db->queryValue(is_null($this->videoTypeId)?null:(int)$this->videoTypeId) . ",",
				$db->queryValue($this->duration) . ",",
				$db->queryValue((int)$session->getUserId()) . ",",
				$db->queryValue(timestamp()) . ",",
				$db->queryValue(timestamp()) . ",",
				$db->queryValue(is_null($this->deleted)?null:(int)$this->deleted),
			")"
		));
		$status = $db->query($query);

		if ($config["enable_database_log"]) {
			$this->log();
		}

		return $status;
	}

	public function update() {
		if (isset($this->_snapshot)) {return false;}
		global $session, $config;

		parent::update();
		if ($this->isDirty()) {
			$db = Database::getInstance();
			$query = implode(NL, array(
				"UPDATE {$db->le}video{$db->re} SET",
					"{$db->le}video_type_id{$db->re}={$db->queryValue(is_null($this->videoTypeId)?null:(int)$this->videoTypeId)},",
					"{$db->le}duration{$db->re}={$db->queryValue($this->duration)},",
					"{$db->le}updated_by_id{$db->re}={$db->queryValue((int)$session->getUserId())},",
					"{$db->le}mdate{$db->re}={$db->queryValue(timestamp())},",
					"{$db->le}deleted{$db->re}={$db->queryValue(is_null($this->deleted)?null:(int)$this->deleted)}",
				"WHERE resource_id={$db->queryValue((int)$this->id)}"
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
		$record = Video::select($db->encapsulate("video") . ".mdate as fdate,null as tdate,{$db->encapsulate("video")}.*",null,$db->encapsulate("video").".resource_id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}video{$dbLog->re} (",
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
				"FROM {$dbLog->le}video{$dbLog->re}",
				"WHERE {$dbLog->le}video{$dbLog->re}.{$dbLog->le}resource_id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}video{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("video") . " WHERE resource_id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("video") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}video{$db->le}",
			"INNER JOIN {$db->le}resource{$db->re} ON {$db->le}video{$db->re}.{$db->le}resource_id{$db->re}={$db->le}resource{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}video_type{$db->re} ON {$db->le}video{$db->re}.{$db->le}video_type_id{$db->re}={$db->le}video_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}resource_type{$db->re} ON {$db->le}resource{$db->re}.{$db->le}resource_type_id{$db->re}={$db->le}resource_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}video{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Video::select("{$db->le}video{$db->le}.resource_id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Video::select("{$db->le}resource{$db->re}.{$db->le}id{$db->re}, {$db->le}resource{$db->re}.{$db->le}name{$db->re}, {$db->le}resource{$db->re}.{$db->le}hash{$db->re}, {$db->le}resource{$db->re}.{$db->le}folder{$db->re}, {$db->le}resource{$db->re}.{$db->le}description{$db->re}, {$db->le}resource{$db->re}.{$db->le}bytes{$db->re}, {$db->le}resource{$db->re}.{$db->le}mime_type{$db->re}, {$db->le}resource{$db->re}.{$db->le}meta{$db->re}, {$db->le}resource{$db->re}.{$db->le}resource_type_id{$db->re}, {$db->le}resource{$db->re}.{$db->le}expirationdate{$db->re}, {$db->le}resource{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}video{$db->re}.{$db->le}video_type_id{$db->re}, {$db->le}video{$db->re}.{$db->le}duration{$db->re}, {$db->le}video{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}video{$db->re}.{$db->le}mdate{$db->re}, {$db->le}video{$db->re}.{$db->le}cdate{$db->re}, {$db->le}video{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Video();
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
				$object->videoTypeId = $record["video_type_id"];
				$object->duration = $record["duration"];
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
		return Video::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Video Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new VideoType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new VideoType($this->videoTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new VideoType(null, $type);
		$this->videoTypeId = $type->id;
		return $this->videoTypeId;
	}


	public function getResource() {
		return new Resource($this->id);
	}

	public function getVideoType() {
		return new VideoType($this->videoTypeId);
	}

	public function setVideoType(VideoType $videoType) {
		if ($videoType->id>0) {
			$this->videoTypeId = $videoType->id;
		}
	}


	public function getParent($type="default") {
		$db = Database::getInstance();
		$relationships = VideoVideo::objects(null, "{$db->le}child_video_id{$db->re}='{$this->id}' AND {$db->le}video_video_type_id{$db->re}='" . VideoVideo::typeId($type) . "'");
		return ($relationships->count()===1) ? $relationships->get(0)->getParent() : new Video();
	}

	public function getChildIds() {
		$db = Database::getInstance();
		return VideoVideo::select("video_video.child_video_id", "{$db->le}order{$db->re} ASC", "video_video.parent_video_id={$this->id}");
	}

	public function getChildren() {
		return $this->hasChildren() ? Video::objects(null, "video.resource_id IN (" . $this->getChildIds()->join(",") . ")") : new Collection();
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
		return VideoVideo::select("video_video.child_video_id", "{$db->le}order{$db->re} ASC", "video_video.child_video_id<>'{$this->id}' AND video_video.parent_video_id=" . $db->queryValue($this->getParent()->id));
	}

	public function getSiblings() {
		return $this->hasSiblings() ? Video::objects(null, "video.resource_id IN (" . $this->getSiblingIds()->join(",") . ")") : new Collection();
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