<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the article table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the article
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called ArticleExtension, and should extend the ArticleTable
 * class.  The custom code file should be in the helix/modules/CMS folder
 * and should be called ArticleExtension.php
 * 
 * Object -> Content -> Article
 */
class ArticleTable extends Content {
	public $logSequence;
	public $fdate;
	public $tdate;

	public $articleTypeId;
	public $title;
	public $sticky;
	public $top;
	public $articlestatusId;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->data = null;
		$this->summary = null;
		$this->contentTypeId = null;
		$this->articleTypeId = null;
		$this->title = null;
		$this->sticky = false;
		$this->top = false;
		$this->articlestatusId = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}article{$db->re}.{$db->le}content_id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}content{$db->re}.{$db->le}id{$db->re}, {$db->le}content{$db->re}.{$db->le}data{$db->re}, {$db->le}content{$db->re}.{$db->le}summary{$db->re}, {$db->le}content{$db->re}.{$db->le}content_type_id{$db->re}, {$db->le}article{$db->re}.{$db->le}article_type_id{$db->re}, {$db->le}article{$db->re}.{$db->le}title{$db->re}, {$db->le}article{$db->re}.{$db->le}sticky{$db->re}, {$db->le}article{$db->re}.{$db->le}top{$db->re}, {$db->le}article{$db->re}.{$db->le}articlestatus_id{$db->re}, {$db->le}article{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}article{$db->re}.{$db->le}mdate{$db->re}, {$db->le}article{$db->re}.{$db->le}cdate{$db->re}, {$db->le}article{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}article{$db->re}",
			"INNER JOIN {$db->le}content{$db->re} ON {$db->le}article{$db->re}.{$db->le}content_id{$db->re}={$db->le}content{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->data = $db->record["data"];
				$this->summary = $db->record["summary"];
				$this->contentTypeId = $db->record["content_type_id"];
				$this->articleTypeId = $db->record["article_type_id"];
				$this->title = $db->record["title"];
				$this->sticky = $db->record["sticky"];
				$this->top = $db->record["top"];
				$this->articlestatusId = $db->record["articlestatus_id"];
				$this->updatedById = $db->record["updated_by_id"];
				$this->mdate = is_null(($db->record["mdate"]))?null:new Date($db->record["mdate"]);
				$this->cdate = is_null(($db->record["cdate"]))?null:new Date($db->record["cdate"]);
				$this->deleted = $db->record["deleted"];
			} else {
				$this->id = null;
			}
		}

		$this->_initial["id"] = $this->id;
		$this->_initial["data"] = $this->data;
		$this->_initial["summary"] = $this->summary;
		$this->_initial["contentTypeId"] = $this->contentTypeId;
		$this->_initial["articleTypeId"] = $this->articleTypeId;
		$this->_initial["title"] = $this->title;
		$this->_initial["sticky"] = $this->sticky;
		$this->_initial["top"] = $this->top;
		$this->_initial["articlestatusId"] = $this->articlestatusId;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Article();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}article{$db->re}.{$db->le}content_id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}article{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}article{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}article{$db->re}.{$db->le}tdate{$db->re}) ";
			$condition .= " AND ({$db->le}content{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}content{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}content{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}article{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}article{$db->re}.{$db->le}fdate{$db->re}, {$db->le}article{$db->re}.{$db->le}tdate{$db->re}, {$db->le}content{$db->re}.{$db->le}id{$db->re}, {$db->le}content{$db->re}.{$db->le}data{$db->re}, {$db->le}content{$db->re}.{$db->le}summary{$db->re}, {$db->le}content{$db->re}.{$db->le}content_type_id{$db->re}, {$db->le}article{$db->re}.{$db->le}article_type_id{$db->re}, {$db->le}article{$db->re}.{$db->le}title{$db->re}, {$db->le}article{$db->re}.{$db->le}sticky{$db->re}, {$db->le}article{$db->re}.{$db->le}top{$db->re}, {$db->le}article{$db->re}.{$db->le}articlestatus_id{$db->re}, {$db->le}article{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}article{$db->re}.{$db->le}mdate{$db->re}, {$db->le}article{$db->re}.{$db->le}cdate{$db->re}, {$db->le}article{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}article{$db->re}",
			"INNER JOIN {$db->le}content{$db->re} ON {$db->le}article{$db->re}.{$db->le}content_id{$db->re}={$db->le}content{$db->re}.{$db->le}id{$db->re} AND {$condition}"
			));

			$query .= "ORDER BY {$db->le}article{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->data = $db->record["data"];
				$object->summary = $db->record["summary"];
				$object->contentTypeId = $db->record["content_type_id"];
				$object->articleTypeId = $db->record["article_type_id"];
				$object->title = $db->record["title"];
				$object->sticky = $db->record["sticky"];
				$object->top = $db->record["top"];
				$object->articlestatusId = $db->record["articlestatus_id"];
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
		$isDirty = $isDirty || ((string)$this->data !== (string)$this->_initial["data"]);
		$isDirty = $isDirty || ((string)$this->summary !== (string)$this->_initial["summary"]);
		$isDirty = $isDirty || ((int)$this->contentTypeId !== (int)$this->_initial["contentTypeId"]);
		$isDirty = $isDirty || ((int)$this->articleTypeId !== (int)$this->_initial["articleTypeId"]);
		$isDirty = $isDirty || ((string)$this->title !== (string)$this->_initial["title"]);
		$isDirty = $isDirty || ((int)$this->sticky !== (int)$this->_initial["sticky"]);
		$isDirty = $isDirty || ((int)$this->top !== (int)$this->_initial["top"]);
		$isDirty = $isDirty || ((int)$this->articlestatusId !== (int)$this->_initial["articlestatusId"]);
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
			"INSERT INTO {$db->le}article{$db->re} (",
			"	{$db->le}content_id{$db->re}, {$db->le}article_type_id{$db->re}, {$db->le}title{$db->re}, {$db->le}sticky{$db->re}, {$db->le}top{$db->re}, {$db->le}articlestatus_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue(is_null($this->id)?null:(int)$this->id) . ",",
				$db->queryValue(is_null($this->articleTypeId)?null:(int)$this->articleTypeId) . ",",
				$db->queryValue($this->title) . ",",
				$db->queryValue(is_null($this->sticky)?null:(int)$this->sticky) . ",",
				$db->queryValue(is_null($this->top)?null:(int)$this->top) . ",",
				$db->queryValue(is_null($this->articlestatusId)?null:(int)$this->articlestatusId) . ",",
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
				"UPDATE {$db->le}article{$db->re} SET",
					"{$db->le}article_type_id{$db->re}={$db->queryValue(is_null($this->articleTypeId)?null:(int)$this->articleTypeId)},",
					"{$db->le}title{$db->re}={$db->queryValue($this->title)},",
					"{$db->le}sticky{$db->re}={$db->queryValue(is_null($this->sticky)?null:(int)$this->sticky)},",
					"{$db->le}top{$db->re}={$db->queryValue(is_null($this->top)?null:(int)$this->top)},",
					"{$db->le}articlestatus_id{$db->re}={$db->queryValue(is_null($this->articlestatusId)?null:(int)$this->articlestatusId)},",
					"{$db->le}updated_by_id{$db->re}={$db->queryValue((int)$session->getUserId())},",
					"{$db->le}mdate{$db->re}={$db->queryValue(timestamp())},",
					"{$db->le}deleted{$db->re}={$db->queryValue(is_null($this->deleted)?null:(int)$this->deleted)}",
				"WHERE content_id={$db->queryValue((int)$this->id)}"
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
		$record = Article::select($db->encapsulate("article") . ".mdate as fdate,null as tdate,{$db->encapsulate("article")}.*",null,$db->encapsulate("article").".content_id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}article{$dbLog->re} (",
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
				"FROM {$dbLog->le}article{$dbLog->re}",
				"WHERE {$dbLog->le}article{$dbLog->re}.{$dbLog->le}content_id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}article{$dbLog->re}",
					"SET {$dbLog->le}tdate{$dbLog->re}={$record["mdate"]}",
					"where log_sequence={$updateSequence}"
				));
				$dbLog->query($query);
			}
		}
		$db->changeDatabase($database);
		return $status;
	}

	public function getInherited() {
		$this->get();
	}

	public function addSibling($object) {
		if (isset($this->_snapshot)) {return false;}
		if (method_exists($object, "getInherited") && is_null($object->id) && $object->getInherited()->getClass()===$this->getInherited()->getClass()) {
			$object->id = $this->id;
			return $object->insert(false);
		} else {
			return false;
		}
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
		$query = "DELETE FROM " . $db->encapsulate("article") . " WHERE content_id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("article") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}article{$db->le}",
			"INNER JOIN {$db->le}content{$db->re} ON {$db->le}article{$db->re}.{$db->le}content_id{$db->re}={$db->le}content{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}article_type{$db->re} ON {$db->le}article{$db->re}.{$db->le}article_type_id{$db->re}={$db->le}article_type{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}articlestatus{$db->re} ON {$db->le}article{$db->re}.{$db->le}articlestatus_id{$db->re}={$db->le}articlestatus{$db->re}.{$db->le}id{$db->re}",
			"LEFT JOIN {$db->le}content_type{$db->re} ON {$db->le}content{$db->re}.{$db->le}content_type_id{$db->re}={$db->le}content_type{$db->re}.{$db->le}id{$db->re}",
			"WHERE {$db->le}article{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Article::select("{$db->le}article{$db->le}.content_id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Article::select("{$db->le}content{$db->re}.{$db->le}id{$db->re}, {$db->le}content{$db->re}.{$db->le}data{$db->re}, {$db->le}content{$db->re}.{$db->le}summary{$db->re}, {$db->le}content{$db->re}.{$db->le}content_type_id{$db->re}, {$db->le}article{$db->re}.{$db->le}article_type_id{$db->re}, {$db->le}article{$db->re}.{$db->le}title{$db->re}, {$db->le}article{$db->re}.{$db->le}sticky{$db->re}, {$db->le}article{$db->re}.{$db->le}top{$db->re}, {$db->le}article{$db->re}.{$db->le}articlestatus_id{$db->re}, {$db->le}article{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}article{$db->re}.{$db->le}mdate{$db->re}, {$db->le}article{$db->re}.{$db->le}cdate{$db->re}, {$db->le}article{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Article();
				$object->id = $record["id"];
				$object->data = $record["data"];
				$object->summary = $record["summary"];
				$object->contentTypeId = $record["content_type_id"];
				$object->articleTypeId = $record["article_type_id"];
				$object->title = $record["title"];
				$object->sticky = $record["sticky"];
				$object->top = $record["top"];
				$object->articlestatusId = $record["articlestatus_id"];
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
			$clauses[] = "content.data LIKE '%{$keyword}%' OR content.summary LIKE '%{$keyword}%' OR article.title LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Article::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Article Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}

	public static function typeId($type) {
		$type = new ArticleType(null, $type);
		return alt($type->id, 0);
	}

	public function getType() {
		$type = new ArticleType($this->articleTypeId);
		return $type->name;
	}

	public function setType($type) {
		if (isset($this->_snapshot)) {return false;}
		$type = new ArticleType(null, $type);
		$this->articleTypeId = $type->id;
		return $this->articleTypeId;
	}

	public function getArticlePage($pageId, $type="default") {
		return new ArticlePage(null, $this->id, $pageId, ArticlePage::typeId($type));
	}

	public function getContent() {
		return new Content($this->id);
	}

	public function getArticleType() {
		return new ArticleType($this->articleTypeId);
	}

	public function setArticleType(ArticleType $articleType) {
		if ($articleType->id>0) {
			$this->articleTypeId = $articleType->id;
		}
	}

	public function getArticlestatus() {
		return new Articlestatus($this->articlestatusId);
	}

	public function setArticlestatus(Articlestatus $articlestatus) {
		if ($articlestatus->id>0) {
			$this->articlestatusId = $articlestatus->id;
		}
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
			$relationship = $this->getArticlePage($id, $type);
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
			return ArticlePage::deleteAll($this->id, null, $type);
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
				$relationship = $this->getArticlePage($id, $type);
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
			"INNER JOIN {$db->le}article_page{$db->re} ON {$db->le}article_page{$db->re}.{$db->le}page_id{$db->re}={$db->le}page{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}article_page{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}page{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}article_page{$db->re}.{$db->le}article_content_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}article_page{$db->re}.{$db->le}article_page_type_id{$db->re}=" . $db->queryValue(ArticlePage::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}article_page{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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