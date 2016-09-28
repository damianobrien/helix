<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the hitqualification table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the hitqualification
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called HitqualificationExtension, and should extend the HitqualificationTable
 * class.  The custom code file should be in the helix/modules/AWS folder
 * and should be called HitqualificationExtension.php
 * 
 * Object -> Hitqualification
 */
class HitqualificationTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $qualificationtypeid;
	public $granttime;
	public $integervalue;
	public $countryId;
	public $hitqualificationstatusId;
	public $requiredtopreview;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->qualificationtypeid = null;
		$this->granttime = null;
		$this->integervalue = null;
		$this->countryId = null;
		$this->hitqualificationstatusId = null;
		$this->requiredtopreview = false;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}hitqualification{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}hitqualification{$db->re}.{$db->le}id{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}qualificationtypeid{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}granttime{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}integervalue{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}country_id{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}hitqualificationstatus_id{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}requiredtopreview{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}mdate{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}cdate{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}hitqualification{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->qualificationtypeid = $db->record["qualificationtypeid"];
				$this->granttime = is_null(($db->record["granttime"]))?null:new Date($db->record["granttime"]);
				$this->integervalue = $db->record["integervalue"];
				$this->countryId = $db->record["country_id"];
				$this->hitqualificationstatusId = $db->record["hitqualificationstatus_id"];
				$this->requiredtopreview = $db->record["requiredtopreview"];
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["qualificationtypeid"] = $this->qualificationtypeid;
		$this->_initial["granttime"] = $this->granttime;
		$this->_initial["integervalue"] = $this->integervalue;
		$this->_initial["countryId"] = $this->countryId;
		$this->_initial["hitqualificationstatusId"] = $this->hitqualificationstatusId;
		$this->_initial["requiredtopreview"] = $this->requiredtopreview;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Hitqualification();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}hitqualification{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}hitqualification{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}hitqualification{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}hitqualification{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}hitqualification{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}fdate{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}tdate{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}id{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}qualificationtypeid{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}granttime{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}integervalue{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}country_id{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}hitqualificationstatus_id{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}requiredtopreview{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}mdate{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}cdate{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}hitqualification{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}hitqualification{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->qualificationtypeid = $db->record["qualificationtypeid"];
				$object->granttime = is_null(($db->record["granttime"]))?null:new Date($db->record["granttime"]);
				$object->integervalue = $db->record["integervalue"];
				$object->countryId = $db->record["country_id"];
				$object->hitqualificationstatusId = $db->record["hitqualificationstatus_id"];
				$object->requiredtopreview = $db->record["requiredtopreview"];
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
		$isDirty = $isDirty || ((string)$this->qualificationtypeid !== (string)$this->_initial["qualificationtypeid"]);
		$isDirty = $isDirty || ((string)$this->granttime != (string)$this->_initial["granttime"]);
		$isDirty = $isDirty || ((string)$this->integervalue !== (string)$this->_initial["integervalue"]);
		$isDirty = $isDirty || ((int)$this->countryId !== (int)$this->_initial["countryId"]);
		$isDirty = $isDirty || ((int)$this->hitqualificationstatusId !== (int)$this->_initial["hitqualificationstatusId"]);
		$isDirty = $isDirty || ((int)$this->requiredtopreview !== (int)$this->_initial["requiredtopreview"]);
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
			"INSERT INTO {$db->le}hitqualification{$db->re} (",
			"	{$db->le}qualificationtypeid{$db->re}, {$db->le}granttime{$db->re}, {$db->le}integervalue{$db->re}, {$db->le}country_id{$db->re}, {$db->le}hitqualificationstatus_id{$db->re}, {$db->le}requiredtopreview{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->qualificationtypeid) . ",",
				$db->queryValue($this->granttime) . ",",
				$db->queryValue($this->integervalue) . ",",
				$db->queryValue(is_null($this->countryId)?null:(int)$this->countryId) . ",",
				$db->queryValue(is_null($this->hitqualificationstatusId)?null:(int)$this->hitqualificationstatusId) . ",",
				$db->queryValue(is_null($this->requiredtopreview)?null:(int)$this->requiredtopreview) . ",",
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
				"UPDATE {$db->le}hitqualification{$db->re} SET",
					"{$db->le}qualificationtypeid{$db->re}={$db->queryValue($this->qualificationtypeid)},",
					"{$db->le}granttime{$db->re}={$db->queryValue($this->granttime)},",
					"{$db->le}integervalue{$db->re}={$db->queryValue($this->integervalue)},",
					"{$db->le}country_id{$db->re}={$db->queryValue(is_null($this->countryId)?null:(int)$this->countryId)},",
					"{$db->le}hitqualificationstatus_id{$db->re}={$db->queryValue(is_null($this->hitqualificationstatusId)?null:(int)$this->hitqualificationstatusId)},",
					"{$db->le}requiredtopreview{$db->re}={$db->queryValue(is_null($this->requiredtopreview)?null:(int)$this->requiredtopreview)},",
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
		$record = Hitqualification::select($db->encapsulate("hitqualification") . ".mdate as fdate,null as tdate,{$db->encapsulate("hitqualification")}.*",null,$db->encapsulate("hitqualification").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}hitqualification{$dbLog->re} (",
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
				"FROM {$dbLog->le}hitqualification{$dbLog->re}",
				"WHERE {$dbLog->le}hitqualification{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}hitqualification{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("hitqualification") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("hitqualification") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}hitqualification{$db->le}",
			"LEFT JOIN {$db->le}country{$db->re} ON {$db->le}hitqualification{$db->re}.{$db->le}country_id{$db->re}={$db->le}country{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}hitqualificationstatus{$db->re} ON {$db->le}hitqualification{$db->re}.{$db->le}hitqualificationstatus_id{$db->re}={$db->le}hitqualificationstatus{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}hitqualification{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Hitqualification::select("{$db->le}hitqualification{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Hitqualification::select("{$db->le}hitqualification{$db->re}.{$db->le}id{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}qualificationtypeid{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}granttime{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}integervalue{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}country_id{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}hitqualificationstatus_id{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}requiredtopreview{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}mdate{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}cdate{$db->re}, {$db->le}hitqualification{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Hitqualification();
				$object->id = $record["id"];
				$object->qualificationtypeid = $record["qualificationtypeid"];
				$object->granttime = is_null(($record["granttime"]))?null:new Date($record["granttime"]);
				$object->integervalue = $record["integervalue"];
				$object->countryId = $record["country_id"];
				$object->hitqualificationstatusId = $record["hitqualificationstatus_id"];
				$object->requiredtopreview = $record["requiredtopreview"];
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
			$clauses[] = "hitqualification.qualificationtypeid LIKE '%{$keyword}%' OR hitqualification.integervalue LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Hitqualification::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Hitqualification Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getHitHitqualification($hitId, $type="default") {
		return new HitHitqualification(null, $hitId, $this->id, HitHitqualification::typeId($type));
	}

	public function getHitqualificationHittemplate($hittemplateId, $type="default") {
		return new HitqualificationHittemplate(null, $this->id, $hittemplateId, HitqualificationHittemplate::typeId($type));
	}

	public function getCountry() {
		return new Country($this->countryId);
	}

	public function setCountry(Country $country) {
		if ($country->id>0) {
			$this->countryId = $country->id;
		}
	}

	public function getHitqualificationstatus() {
		return new Hitqualificationstatus($this->hitqualificationstatusId);
	}

	public function setHitqualificationstatus(Hitqualificationstatus $hitqualificationstatus) {
		if ($hitqualificationstatus->id>0) {
			$this->hitqualificationstatusId = $hitqualificationstatus->id;
		}
	}

	public function setHit($hit=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeHitList($type);
		$this->addHit($hit, $type);
		return $this;
	}
	public function removeHit($hit, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($hit) ? $hit : array($hit);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getHitHitqualification($id, $type);
			if ($deleteObject) {
				$relationship->getHit()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeHitList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return HitHitqualification::deleteAll(null, $this->id, $type);
		}
	}
	public function addHit($hit=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($hit)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($hit) ? $hit : array($hit);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getHitHitqualification($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getHit($type="default") {
		if (isset($this->_cache["Hit"]) && isset($this->_cache["Hit"][$type])) {
			$hit = $this->_cache["Hit"][$type];
		} else {
			$hit = new Hit($this->getHitId($type));
		}
		$this->_cache["Hit"][$type] = $hit;
		return $this->_cache["Hit"][$type];
	}
	public function getHitList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getHitIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Hit::objects($order, "{$db->le}hit{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getHitId($type="default") {
		return $this->getHitIds($type)->get(0);
	}
	public function getHitIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}hit{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}hit{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}hit{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}hit{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}hit{$db->re} ",
			"INNER JOIN {$db->le}hit_hitqualification{$db->re} ON {$db->le}hit_hitqualification{$db->re}.{$db->le}hit_id{$db->re}={$db->le}hit{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}hit_hitqualification{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hit{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hit_hitqualification{$db->re}.{$db->le}hitqualification_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}hit_hitqualification{$db->re}.{$db->le}hit_hitqualification_type_id{$db->re}=" . $db->queryValue(HitHitqualification::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}hit_hitqualification{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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

	public function setHittemplate($hittemplate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeHittemplateList($type);
		$this->addHittemplate($hittemplate, $type);
		return $this;
	}
	public function removeHittemplate($hittemplate, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($hittemplate) ? $hittemplate : array($hittemplate);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getHitqualificationHittemplate($id, $type);
			if ($deleteObject) {
				$relationship->getHittemplate()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeHittemplateList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return HitqualificationHittemplate::deleteAll($this->id, null, $type);
		}
	}
	public function addHittemplate($hittemplate=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($hittemplate)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($hittemplate) ? $hittemplate : array($hittemplate);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getHitqualificationHittemplate($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getHittemplate($type="default") {
		if (isset($this->_cache["Hittemplate"]) && isset($this->_cache["Hittemplate"][$type])) {
			$hittemplate = $this->_cache["Hittemplate"][$type];
		} else {
			$hittemplate = new Hittemplate($this->getHittemplateId($type));
		}
		$this->_cache["Hittemplate"][$type] = $hittemplate;
		return $this->_cache["Hittemplate"][$type];
	}
	public function getHittemplateList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getHittemplateIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Hittemplate::objects($order, "{$db->le}hittemplate{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getHittemplateId($type="default") {
		return $this->getHittemplateIds($type)->get(0);
	}
	public function getHittemplateIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}hittemplate{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}hittemplate{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}hittemplate{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}hittemplate{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}hittemplate{$db->re} ",
			"INNER JOIN {$db->le}hitqualification_hittemplate{$db->re} ON {$db->le}hitqualification_hittemplate{$db->re}.{$db->le}hittemplate_id{$db->re}={$db->le}hittemplate{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}hitqualification_hittemplate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hittemplate{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}hitqualification_hittemplate{$db->re}.{$db->le}hitqualification_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}hitqualification_hittemplate{$db->re}.{$db->le}hitqualification_hittemplate_type_id{$db->re}=" . $db->queryValue(HitqualificationHittemplate::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}hitqualification_hittemplate{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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