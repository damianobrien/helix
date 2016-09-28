<?php
/**
 * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator
 * 
 * This class represents the page table in the Helix database schema.
 * Use this class to select, insert, update and delete data in the page
 * table, as well as access related data in other tables.
 * 
 * If you need to extend the functionality of this class, code should be placed in a
 * class called PageExtension, and should extend the PageTable
 * class.  The custom code file should be in the helix/modules/Core folder
 * and should be called PageExtension.php
 * 
 * Object -> Page
 */
class PageTable extends Object {
	public $logSequence;
	public $fdate;
	public $tdate;

	protected $_cache = array();
	protected $_initial = array();
	protected $_snapshot;

	public $id;
	public $path;
	public $createdById;
	public $updatedById;
	public $mdate;
	public $cdate;
	public $deleted;

	public function __construct($id=null) {
		$db = Database::getInstance();
		$this->id = $id;
		$this->path = null;
		$this->createdById = null;
		$this->updatedById = null;
		$this->mdate = new Date();
		$this->cdate = new Date();
		$this->deleted = false;

		if (isset($id)) {
			$condition = "{$db->le}page{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$query = implode(NL, array(
				"SELECT {$db->le}page{$db->re}.{$db->le}id{$db->re}, {$db->le}page{$db->re}.{$db->le}path{$db->re}, {$db->le}page{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}page{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}page{$db->re}.{$db->le}mdate{$db->re}, {$db->le}page{$db->re}.{$db->le}cdate{$db->re}, {$db->le}page{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}page{$db->re}",
				"WHERE {$condition}"
			));

			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$this->id = $db->record["id"];
				$this->path = $db->record["path"];
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
		$this->_initial["path"] = $this->path;
		$this->_initial["createdById"] = $this->createdById;
		$this->_initial["deleted"] = $this->deleted;
	}

	public static function snapshot($date, $id=null) {
		$object = new Page();
		$object->_snapshot = $date;
		$db = Database::getInstance();
		$database = $db->getDatabase();
		$db->changeDatabase($database . "_log");

		if (isset($id)) {
			$condition = "{$db->le}page{$db->re}.{$db->le}id{$db->re}={$db->queryValue($id)}";
		}

		if (isset($condition)) {
			$condition .= " AND ({$db->le}page{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}page{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}page{$db->re}.{$db->le}tdate{$db->re}) ";
			$query = implode(NL, array(
				"SELECT {$db->le}page{$db->re}.{$db->le}log_sequence{$db->re}, {$db->le}page{$db->re}.{$db->le}fdate{$db->re}, {$db->le}page{$db->re}.{$db->le}tdate{$db->re}, {$db->le}page{$db->re}.{$db->le}id{$db->re}, {$db->le}page{$db->re}.{$db->le}path{$db->re}, {$db->le}page{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}page{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}page{$db->re}.{$db->le}mdate{$db->re}, {$db->le}page{$db->re}.{$db->le}cdate{$db->re}, {$db->le}page{$db->re}.{$db->le}deleted{$db->re}",
				"FROM {$db->le}page{$db->re}",
				"WHERE {$condition}"
			));

			$query .= "ORDER BY {$db->le}page{$db->re}.log_sequence desc limit 1";
			$db->query($query);

			if ($db->getRecord() && $db->getNumRows()===1) {
				$object->logSequence = $db->record["log_sequence"];
				$object->fdate = new Date($db->record["fdate"]);
				$object->tdate = new Date($db->record["tdate"]);
				$object->id = $db->record["id"];
				$object->path = $db->record["path"];
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
		$isDirty = $isDirty || ((string)$this->path !== (string)$this->_initial["path"]);
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
			"INSERT INTO {$db->le}page{$db->re} (",
			"	{$db->le}path{$db->re}, {$db->le}created_by_id{$db->re}, {$db->le}updated_by_id{$db->re}, {$db->le}mdate{$db->re}, {$db->le}cdate{$db->re}, {$db->le}deleted{$db->re}",
			") VALUES (",
				$db->queryValue($this->path) . ",",
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
				"UPDATE {$db->le}page{$db->re} SET",
					"{$db->le}path{$db->re}={$db->queryValue($this->path)},",
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
		$record = Page::select($db->encapsulate("page") . ".mdate as fdate,null as tdate,{$db->encapsulate("page")}.*",null,$db->encapsulate("page").".id={$this->id}")->first();
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
			"INSERT INTO {$dbLog->le}page{$dbLog->re} (",
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
				"FROM {$dbLog->le}page{$dbLog->re}",
				"WHERE {$dbLog->le}page{$dbLog->re}.{$dbLog->le}id{$dbLog->re}={$this->id}",
				"	AND {$dbLog->le}log_sequence{$dbLog->re}<{$logSequence}",
				"ORDER BY {$dbLog->le}log_sequence{$dbLog->re} DESC",
				$dbLog::limitOffsetString(1,0)
			));
			$dbLog->query($query);

			if ($dbLog->getRecord()) {
				$updateSequence = (int)$dbLog->record["log_sequence"];
				$query = implode(NL, array(
					"UPDATE {$dbLog->le}page{$dbLog->re}",
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
		$query = "DELETE FROM " . $db->encapsulate("page") . " WHERE id={$db->queryValue($this->id)}";
		$status = $db->query($query);
		return $status;
	}

	public static function deleteAll($where=null) {
		$db = Database::getInstance();
		$condition = isset($where) ? "WHERE {$where}" : "";
		$query = "UPDATE " . $db->encapsulate("page") . " SET deleted=1 {$condition}";
		$status = $db->query($query);
		return $status;
	}

	public static function select($columns, $order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();

		$records = array();
		$columns = is_array($columns) ? $columns : explode(",", $columns);

		$query = implode(NL, array(
			"SELECT " . implode(",", $columns),
			"FROM {$db->le}page{$db->le}",

			"WHERE {$db->le}page{$db->re}.{$db->le}deleted{$db->re}=0" . (isset($where) ? " AND ({$where})" : ""),
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
		return Page::select("{$db->le}page{$db->le}.id", $order, $where, $limit, $offset);
	}

	public static function objects($order=null, $where=null, $limit=null, $offset=0) {
		$db = Database::getInstance();
		$objects = array();
		foreach (Page::select("{$db->le}page{$db->re}.{$db->le}id{$db->re}, {$db->le}page{$db->re}.{$db->le}path{$db->re}, {$db->le}page{$db->re}.{$db->le}created_by_id{$db->re}, {$db->le}page{$db->re}.{$db->le}updated_by_id{$db->re}, {$db->le}page{$db->re}.{$db->le}mdate{$db->re}, {$db->le}page{$db->re}.{$db->le}cdate{$db->re}, {$db->le}page{$db->re}.{$db->le}deleted{$db->re}", $order, $where, $limit, $offset) as $record) {
			$object = new Page();
				$object->id = $record["id"];
				$object->path = $record["path"];
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
			$clauses[] = "page.path LIKE '%{$keyword}%'";
		}

		$search = implode(" AND ", $clauses);
		$where = isset($where) ? "{$where} AND ({$search})" : "({$search})";
		return Page::objects($order, $where, $limit, $offset);
	}

	public function __toString() {
		return "Page Object [" . alt($this->id, "null") . "]";
	}

	public function string() {
		return $this->__toString();
	}


	public function getArticlePage($articleId, $type="default") {
		return new ArticlePage(null, $articleId, $this->id, ArticlePage::typeId($type));
	}

	public function getContentPage($contentId, $type="default") {
		return new ContentPage(null, $contentId, $this->id, ContentPage::typeId($type));
	}

	public function getMenuPage($menuId, $type="default") {
		return new MenuPage(null, $menuId, $this->id, MenuPage::typeId($type));
	}

	public function getPagePerm($permId, $type="default") {
		return new PagePerm(null, $this->id, $permId, PagePerm::typeId($type));
	}


	public function setArticle($article=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removeArticleList($type);
		$this->addArticle($article, $type);
		return $this;
	}
	public function removeArticle($article, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($article) ? $article : array($article);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getArticlePage($id, $type);
			if ($deleteObject) {
				$relationship->getArticle()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removeArticleList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return ArticlePage::deleteAll(null, $this->id, $type);
		}
	}
	public function addArticle($article=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($article)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($article) ? $article : array($article);
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
	public function getArticle($type="default") {
		if (isset($this->_cache["Article"]) && isset($this->_cache["Article"][$type])) {
			$article = $this->_cache["Article"][$type];
		} else {
			$article = new Article($this->getArticleId($type));
		}
		$this->_cache["Article"][$type] = $article;
		return $this->_cache["Article"][$type];
	}
	public function getArticleList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getArticleIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Article::objects($order, "{$db->le}article{$db->le}.{$db->re}content_id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getArticleId($type="default") {
		return $this->getArticleIds($type)->get(0);
	}
	public function getArticleIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}article{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}article{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}article{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}article{$db->re}.{$db->le}content_id{$db->re} ",
			"FROM {$db->le}article{$db->re} ",
			"INNER JOIN {$db->le}article_page{$db->re} ON {$db->le}article_page{$db->re}.{$db->le}article_content_id{$db->re}={$db->le}article{$db->re}.{$db->le}content_id{$db->re} ",
			"	AND {$db->le}article_page{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}article{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}article_page{$db->re}.{$db->le}page_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}article_page{$db->re}.{$db->le}article_page_type_id{$db->re}=" . $db->queryValue(ArticlePage::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}article_page{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
			(isset($where) ? " WHERE {$where} " : ""),
			(isset($order) ? " ORDER BY {$order}" : ""),
			(isset($limit) ? $db::limitOffsetString($limit,$offset) : "")
		));
		
		$db->query($query);
		
		while ($db->getRecord()) {
			$ids[] = $db->record["content_id"];
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
			$relationship = $this->getContentPage($id, $type);
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
			return ContentPage::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getContentPage($id, $type);
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
			"INNER JOIN {$db->le}content_page{$db->re} ON {$db->le}content_page{$db->re}.{$db->le}content_id{$db->re}={$db->le}content{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}content_page{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}content_page{$db->re}.{$db->le}page_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}content_page{$db->re}.{$db->le}content_page_type_id{$db->re}=" . $db->queryValue(ContentPage::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}content_page{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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
			$relationship = $this->getMenuPage($id, $type);
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
			return MenuPage::deleteAll(null, $this->id, $type);
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
				$relationship = $this->getMenuPage($id, $type);
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
			"INNER JOIN {$db->le}menu_page{$db->re} ON {$db->le}menu_page{$db->re}.{$db->le}menu_id{$db->re}={$db->le}menu{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}menu_page{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}menu{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}menu_page{$db->re}.{$db->le}page_id{$db->re}={$db->queryValue($this->id)} ",
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

	public function setPerm($perm=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		$this->removePermList($type);
		$this->addPerm($perm, $type);
		return $this;
	}
	public function removePerm($perm, $type="default", $deleteObject=true) {
		if (isset($this->_snapshot)) {return false;}
		$list = is_array($perm) ? $perm : array($perm);
		foreach ($list as $item) {
			$id = is_object($item) ? $item->id : $item;
			$relationship = $this->getPagePerm($id, $type);
			if ($deleteObject) {
				$relationship->getPerm()->delete();
			}
			$relationship->delete();
		}
		return $this;
	}
	public function removePermList($type=null) {
		if (isset($this->_snapshot)) {return false;}
		if ($this->id>0) {
			return PagePerm::deleteAll($this->id, null, $type);
		}
	}
	public function addPerm($perm=null, $type="default") {
		if (isset($this->_snapshot)) {return false;}
		if (isset($perm)) {
			if (!$this->id) {
				$this->save();
			}
			$list = is_array($perm) ? $perm : array($perm);
			$order = 0;
			foreach ($list as $item) {
				if (is_object($item) && !$item->id) {
					$item->save();
				}
				$id = is_object($item) ? $item->id : $item;
				$relationship = $this->getPagePerm($id, $type);
				$relationship->deleted = false;
				$relationship->save();
			}
		}
		return $this;
	}
	public function getPerm($type="default") {
		if (isset($this->_cache["Perm"]) && isset($this->_cache["Perm"][$type])) {
			$perm = $this->_cache["Perm"][$type];
		} else {
			$perm = new Perm($this->getPermId($type));
		}
		$this->_cache["Perm"][$type] = $perm;
		return $this->_cache["Perm"][$type];
	}
	public function getPermList($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = $this->getPermIds($type, $order, $where, $limit, $offset, $primary);
		$list = $ids->count()===0 ? new Collection() : Perm::objects($order, "{$db->le}perm{$db->le}.{$db->re}id{$db->re} IN (" . $ids->join(",") . ")");
		return $list;
	}
	public function getPermId($type="default") {
		return $this->getPermIds($type)->get(0);
	}
	public function getPermIds($type=null, $order=null, $where=null, $limit=null, $offset=0, $primary=false) {
		$db = Database::getInstance();
		$ids = array();
		
		if (isset($this->_snapshot)) {
			$date = $this->_snapshot;
			$condition = " {$db->le}perm{$db->re}.{$db->le}tdate{$db->re} IS NOT NULL AND {$db->le}perm{$db->re}.{$db->le}fdate{$db->re}<={$db->queryValue($date)} AND {$db->queryValue($date)}<={$db->le}perm{$db->re}.{$db->le}tdate{$db->re} ";
			$where = isset($where) ? "{$where} AND ({$condition})" : $condition;
		}
		
		$query = implode(NL, array(
			"SELECT {$db->le}perm{$db->re}.{$db->le}id{$db->re} ",
			"FROM {$db->le}perm{$db->re} ",
			"INNER JOIN {$db->le}page_perm{$db->re} ON {$db->le}page_perm{$db->re}.{$db->le}perm_id{$db->re}={$db->le}perm{$db->re}.{$db->le}id{$db->re} ",
			"	AND {$db->le}page_perm{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}perm{$db->re}.{$db->le}deleted{$db->re}=0 ",
			"	AND {$db->le}page_perm{$db->re}.{$db->le}page_id{$db->re}={$db->queryValue($this->id)} ",
			(isset($type) ? "	AND {$db->le}page_perm{$db->re}.{$db->le}page_perm_type_id{$db->re}=" . $db->queryValue(PagePerm::typeId($type)) . " " : ""),
			($primary ? "	AND {$db->le}page_perm{$db->re}.{$db->le}primary{$db->re}=1 " : ""),
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