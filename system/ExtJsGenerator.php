<?php
class ExtJsGenerator extends Generator {

	public static function generate($site=null) {
		self::$site = $site;
		self::$tables = array();
		self::$classes = array();
		self::$linesOfCode = 0;
		
		debug("Making temp folder...");
		self::makeFolder(Helix::$path . "/temp");
		
		debug("Importing module schema definition files...");
		self::importModules();
		
		if (isset($site) && strlen($site)>0) {
			debug("Importing site schema definition file for: {$site}...");
			self::importSite($site);
		}
		
		debug("Parsing schema definition files...");
		self::parseTables();
		self::parseTablesAgain();
		
		debug("Writing model files...");
		self::writeModels();
		
		debug("Writing node model files...");
		self::writeNodeModels();
		
		debug("Writing store files...");
		self::writeStores();
		
		debug("Writing tree store files...");
		self::writeTreeStores();
		
		debug("Writing service file...");
		self::writeServices();
		
		debug("Writing view/list files...");
		self::writeViewList();
		
		debug("Writing view/tree files...");
		self::writeViewTree();
		
		debug("Writing controller files...");
		self::writeControllers();

		debug("ExtJS Generator Done: " . count(self::$tables) . " tables generated");
	}
	
	public static function importModules() {
		foreach (glob(Helix::$path . "/modules/*/Config/*.schema.json") as $path) {
			$module = basename(dirname(dirname($path)));
			self::importJSON($path, $module, null);
		}
	}
	
	public static function importSite($site) {
		$path = dirname(dirname(realpath("."))) . "/{$site}/library/Config/{$site}.schema.json";
		self::importJSON($path, null, $site);
	}
	
	public static function writeModels() {
		$i = 0;
		$extJsFolder = Helix::$path . "/temp/ExtJs/Helix";
		self::makeFolder($extJsFolder);
		$text = implode(NL,array(
			"/**",
			" * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator",
			"**/",
			"Ext.Loader.setConfig({enabled:true});",
			""
		));
		//file_put_contents("{$extJsFolder}/helix-all.js", $text);//wipe the file
			
		foreach (self::$tables as $tablename=>$table) {
			debug("[" . String::lpad(++$i, 3, 0) . "] Writing models for: {$tablename}" . (isset($table["linked"]) ? " [" . implode(", ", array_keys($table["linked"])) . "]" : ""));
			$text = implode(NL, array(
			"Ext.define('Helix.model.".ucwords($table["class"])."', {",
			"     extend: '".($table["is_child"] ? "Helix.model.".ucwords(self::$tables[$table["parent"]]["class"]) : "Ext.data.Model")."',",
			"     fields: [",
			self::defineFields($table),
			"     ],",
			"     config: {",
			//self::defineConfigProperties($table),
			"     },",
			"     hasMany:[",
			self::defineHasMany($table),
			"     ],",
			"     belongsTo:{",
			"     }//,",
			"     //constructor: function(config) {",
			"     //      this.initConfig(config);",
			"     //      return this;",
			"     //}",
			"});",
			"",
			));
			self::makeFolder($extJsFolder."/model");
			file_put_contents("{$extJsFolder}/model/"."{$table["class"]}.js", $text);
			//file_put_contents("{$extJsFolder}/helix-all.js", $text, FILE_APPEND);
			self::$linesOfCode += count(explode(NL, $text));
		}
	}
	
	public static function writeNodeModels() {
		$i = 0;
		$extJsFolder = Helix::$path . "/temp/ExtJs/Helix";
		self::makeFolder($extJsFolder);
		$text = implode(NL,array(
			"/**",
			" * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator",
			"**/",
			"Ext.Loader.setConfig({enabled:true});",
			""
		));
		//file_put_contents("{$extJsFolder}/helix-all.js", $text);//wipe the file
			
		foreach (self::$tables as $tablename=>$table) {
			debug("[" . String::lpad(++$i, 3, 0) . "] Writing node models for: {$tablename}" . (isset($table["linked"]) ? " [" . implode(", ", array_keys($table["linked"])) . "]" : ""));
			$text = implode(NL, array(
			"Ext.define('Helix.model.".ucwords($table["class"])."Node', {",
			"     extend: '".($table["is_child"] ? "Helix.model.".ucwords(self::$tables[$table["parent"]]["class"]."Node") : "Ext.data.Model")."',",
			"     fields: [",
			self::defineFields($table),
			"        'text',",
			"        'leaf',",
			"        'expanded'",
			"     ]",
			"});",
			"",
			));
			self::makeFolder($extJsFolder."/model");
			file_put_contents("{$extJsFolder}/model/"."{$table["class"]}Node.js", $text);
			//file_put_contents("{$extJsFolder}/helix-all.js", $text, FILE_APPEND);
			self::$linesOfCode += count(explode(NL, $text));
		}
	}
	
	private static function defineConfigProperties($table) {
		$lines = array();
		
		foreach ($table["nice_columns"] as $colname=>$column) {
			//if ($colname==="id" && $table["is_child"]) {continue;}
			if ($colname==="id") {continue;}
			if ($table["is_column_extension"] && $colname==="value") {
				$default = "\$value";
			} else {
				$type = is_array($column["type"]) ? $column["type"][0] : $column["type"];
				$d = $column["default"];
				if (isset($column["references"]) && self::$tables[$column["references"][0]]["is_lookup"]) {
					$d = 1;
				} else if ($type==="tinyint" || $type==="bit") {
					$d = $d===0 ? false : true;
				}
				$default = json_encode($d);
			}
			$lines[] = TAB . TAB . "{$column["property"]}:{type:'{$column["js_type"]}',default:" . (preg_match('/^date|time|timestamp|datetime|year$/i',$type) ? "new Date()" : $default) . "}";
		}
		
		return implode(NL.",", $lines);
	}
	
	private static function defineHasMany($table) {
		$lines = array();
		
		if (isset($table["linked"])) {
			foreach ($table["linked"] as $linktable=>$linked) {
				ksort($table["linked"]);
				if ($table["name"]===$linktable) {continue;}
				$link = self::$tables[$linktable];
				$rel = self::$tables[$linked["relationship"]["table"]];
				$lines[] = TAB . TAB . "'{$link["class"]}'";
			}
		}
		return implode(NL.",", $lines);
	}
	
	private static function defineFields($table) {
		$lines = array();
		
		foreach ($table["nice_columns"] as $colname=>$column) {
			//if ($colname==="id") {continue;}
			$lines[] = TAB . TAB . "'{$column["property"]}'";
		}
		
		return implode(NL.",", $lines);
	}
	
	private static function defineColumnHeader($table) {
		$lines = array();
		
		foreach ($table["nice_collapsed_columns"] as $colname=>$column) {
			if ($colname==="id") {continue;}
			$lines[] = TAB . TAB . TAB . "{header: '{$column["property"]}',  dataIndex: '{$column["property"]}',  flex: 1}";
		}
		
		return implode(NL.",", $lines);
	}
	
	public static function getJsType($type) {
		
		$type = is_array($type) ? $type[0] : $type;
		if (preg_match('/^bit|tinyint$/i',$type)>0) {
			return "boolean";
		} else if (preg_match('/^smallint|mediumint|int|integer|bigint$/i',$type)>0) {
			return "number";
		} else if (preg_match('/^real|double|float|decimal|numeric$/i',$type)>0) {
			return "number";
		} else {
			return "string";
		}
	}
	
	public static function writeStores(){
			
		$extJsFolder = Helix::$path . "/temp/ExtJs/Helix";
		self::makeFolder($extJsFolder."/store");
		foreach (self::$tables as $tablename=>$table) {
			debug("[" . String::lpad(++$i, 3, 0) . "] Writing stores for: {$tablename}");
			$text = implode(NL, array(
				"Ext.define('Helix.store.".ucwords($table["class"])."', {",
				"     extend: 'Ext.data.Store',",
				"     model: 'Helix.model.".ucwords($table["class"])."',",
				"     autoLoad: true,",
				"     proxy: {",
				"          type: 'ajax',",
				"          api: {",
				"               create: WEBROOT + '_services/".strtolower($table["class"])."/create{$table["class"]}',",
				"               read: WEBROOT + '_services/".strtolower($table["class"])."/read{$table["class"]}',",
				"               update: WEBROOT + '_services/".strtolower($table["class"])."/update{$table["class"]}',",
				"               destroy: WEBROOT + '_services/".strtolower($table["class"])."/destroy{$table["class"]}'",
				"     },",
				"     reader: {",
				"          root: 'data',",
				"          type: 'json',",
				"          successProperty: 'success'",
				"     }",
			"}",
			"});"));
			
			file_put_contents("{$extJsFolder}/store/".ucwords($table["class"]).".js", $text);
			self::$linesOfCode += count(explode(NL, $text));
		}
		return;
	}
	
	public static function writeTreeStores(){
			
		$extJsFolder = Helix::$path . "/temp/ExtJs/Helix";
		self::makeFolder($extJsFolder."/store");
		foreach (self::$tables as $tablename=>$table) {
			debug("[" . String::lpad(++$i, 3, 0) . "] Writing tree stores for: {$tablename}");
			$text = implode(NL, array(
				"Ext.define('Helix.store.".ucwords($table["class"])."Tree', {",
				"     extend: 'Ext.data.TreeStore',",
				"     model: 'Helix.model.".ucwords($table["class"])."Node',",
				"     autoLoad: false,",
				"     proxy: {",
				"          type: 'ajax',",
				"          url : WEBROOT + '_services/".strtolower($table["class"])."/get{$table["class"]}TreeStore',",
				"		   reader: {",
				"		   root: 'data',",
				"          	    type: 'json',",
				"               successProperty: 'success'",
				"          }",
				"     },",
				"root: {",
				"	text: 'Tree',",
				"	id: 'root',",
				"	expanded: false",
				"}",
			"});"));
			
			file_put_contents("{$extJsFolder}/store/".ucwords($table["class"])."Tree.js", $text);
			self::$linesOfCode += count(explode(NL, $text));
		}
		return;
	}
	
	public static function writeControllers(){
		$extJsFolder = Helix::$path . "/temp/ExtJs/Helix";
		self::makeFolder($extJsFolder."/controller");
		foreach (self::$tables as $tablename=>$table) {
			debug("[" . String::lpad(++$i, 3, 0) . "] Writing stores for: {$tablename}");
			$text = implode(NL, array(
			"Ext.define('Helix.controller.".ucwords($table["class"])."', {",
			"	extend: 'Ext.app.Controller',",
			"	stores: ['".ucwords($table["class"])."','".ucwords($table["class"])."Tree'],",
			"	models: ['".ucwords($table["class"])."'],",
			"",
			"	views: [",
			"		'".strtolower($table["class"]).".List',",
			"		'".strtolower($table["class"]).".Tree'",
			"	],",
			"",
			"	init: function() {",
			"		this.control({",
			"			'viewport > ".strtolower($table["class"])."list': {",
			"				itemdblclick: this.edit".ucwords($table["class"])."",
			"			}",
			"		});",
			"	},",
			"",
			"	edit".ucwords($table["class"]).": function(grid, record) {",
			"		console.log('Double clicked on ' + record.get('firstName'));",
			"	}",
			"});"));
			file_put_contents("{$extJsFolder}/controller/".ucwords($table["class"]).".js", $text);
			self::$linesOfCode += count(explode(NL, $text));
		}
	}
	
	public static function writeViewList(){
			
		$extJsFolder = Helix::$path . "/temp/ExtJs/Helix";
		self::makeFolder($extJsFolder."/view");
			
		foreach (self::$tables as $tablename=>$table) {
			debug("[" . String::lpad(++$i, 3, 0) . "] Writing grid view for: {$tablename}");
			$text = implode(NL, array(
			"Ext.define('Helix.view.".strtolower($table["class"]).".List' ,{",
			"	extend: 'Ext.grid.Panel',",
			"	alias : 'widget.".strtolower($table["class"])."list',",
			"	store: '".ucwords($table["class"])."',",
			"",
			"	title : 'All ".ucwords($table["class"])." Objects',",
			"",
			"	initComponent: function() {",
			"		this.columns = [",
			self::defineColumnHeader($table),
			"		];",
			"",
			"		this.callParent(arguments);",
			"	}",
			"});"));
			self::makeFolder($extJsFolder."/view/".strtolower($table["class"]));
			file_put_contents("{$extJsFolder}/view/".strtolower($table["class"])."/List.js", $text);
			self::$linesOfCode += count(explode(NL, $text));
		}
		return;
	}
	
	public static function writeViewTree(){
			
		$extJsFolder = Helix::$path . "/temp/ExtJs/Helix";
		self::makeFolder($extJsFolder."/view");
			
		foreach (self::$tables as $tablename=>$table) {
			debug("[" . String::lpad(++$i, 3, 0) . "] Writing tree view for: {$tablename}");
			$text = implode(NL, array(
			"Ext.define('Helix.view.".strtolower($table["class"]).".Tree' ,{",
			"	extend: 'Ext.tree.Panel',",
			"	alias : 'widget.".strtolower($table["class"])."tree',",
			"	store: '".ucwords($table["class"])."Tree',",
			"	title : 'All ".ucwords($table["class"])." Objects'",
			"});"
			));
			self::makeFolder($extJsFolder."/view/".strtolower($table["class"]));
			file_put_contents("{$extJsFolder}/view/".strtolower($table["class"])."/Tree.js", $text);
			self::$linesOfCode += count(explode(NL, $text));
		}
		return;
	}
	
	
	public static function writeServices() {
		$i = 0;
		$extJsFolder = Helix::$path . "/temp/ExtJs";
		
		$extJsFolder .= "/services";
		self::makeFolder($extJsFolder);
			
		foreach (self::$tables as $tablename=>$table) {
			self::makeFolder($extJsFolder."/".strtolower($table["class"]));
			$generatedServiceFile = ucwords($table["class"])."Service.php";
			
			debug("[" . String::lpad(++$i, 3, 0) . "] Writing service functions for: {$tablename}" . (isset($table["linked"]) ? " [" . implode(", ", array_keys($table["linked"])) . "]" : ""));
			$text = implode(NL, array(
				self::generateStoreService($table),
			));
			file_put_contents($extJsFolder."/".strtolower($table["class"])."/{$generatedServiceFile}", $text);
		}
		self::$linesOfCode += count(explode(NL, $text));
	}
	
	public static function generateStoreService($table){
		$lines = array(
		"<?php",
		"/**",
		" * DO NOT EDIT -- This is an auto-generated class from the Helix Class Generator",
		"**/",
		"class ".ucwords($table["class"])."Service extends Service {",
		"",
		self::generateCreateFunction($table),
		"",
		self::generateReadFunction($table),
		"",
		self::generateUpdateFunction($table),
		"",
		self::generateDestroyFunction($table),
		"",
		"public function get{$table["class"]}TreeStore() {",
		"	\$objects = array();",
		"	foreach ({$table["class"]}::objects(null, null, alt(val(Request::\$data, \"limit\"), 25), alt(val(Request::\$data, \"start\"), 0)) as \$o) {",
		"		\$objects[] = array(",
				self::setReadValues($table),
		"		          \"text\"=>alt(\$o->name,\$o->description,\$o->id),",
		"		          \"leaf\"=>true,",
		"		          \"expanded\"=>false,",
		"		);",
		"	}",
		"	return \$objects;",
		"}",
		"",
		"}".NL."?>"
		);
		return implode(NL,$lines);
	}

	public static function generateCreateFunction($table){
		$lines = array(
		"public function create{$table["class"]}() {",
		"     \$params = json_decode(Request::\$input);",
		"     if(\$params->id>0) {",
		"          \$o = new {$table["class"]}();",
					self::setCreateValues($table),
		"          \$o->save();",
		"     }",
		"}"
		);
		return implode(NL,$lines);
	}
	
	public static function generateReadFunction($table){
		$lines = array(
		"public function read{$table["class"]}() {",
		"	\$objects = array();",
		"	foreach ({$table["class"]}::objects(null, null, alt(val(Request::\$data, \"limit\"), 25), alt(val(Request::\$data, \"start\"), 0)) as \$o) {",
		"		\$objects[] = array(",
				self::setReadValues($table),
		"		);",
		"	}",
		"	\$store = array(\"data\"=>\$objects);",
		"	return \$store;",
		"}"
		);
		return implode(NL,$lines);
	}
	
	public static function generateUpdateFunction($table){
		$lines = array(
		"public function update{$table["class"]}() {",
		"     \$params = json_decode(Request::\$input);",
		"     if(\$params->id>0) {",
		"          \$o = new {$table["class"]}(\$params->id);",
					self::setUpdateValues($table),
		"          \$o->save();",
		"     }",
		"}"
		);
		return implode(NL,$lines);
	}
	
	public static function generateDestroyFunction($table){
		$lines = array(
		"public function destroy{$table["class"]}() {",
		"     \$params = json_decode(Request::\$input);",
		"     if(\$params->id>0) {",
		"          \$o = new {$table["class"]}(\$params->id);",
		"          \$o->delete();",
		"     }",
		"}"
		);
		return implode(NL,$lines);
	}
	
	protected static function setCreateValues($table) {
		$lines = array();
		
		foreach ($table["nice_collapsed_columns"] as $colname=>$column) {
			if($column["property"]==="id"){continue;}
			$lines[] = TAB . TAB . TAB . TAB . "\$o->{$column["property"]}=\$params->{$column["property"]};";
		}
		
		return implode(NL, $lines);
	}
	
	protected static function setReadValues($table) {
		$lines = array();
		
		foreach ($table["nice_collapsed_columns"] as $colname=>$column) {
			$lines[] = TAB . TAB . TAB . TAB . "\"{$column["property"]}\"=>\$o->{$column["property"]},";
		}
		
		return implode(NL, $lines);
	}
	protected static function setUpdateValues($table) {
		$lines = array();
		
		foreach ($table["nice_collapsed_columns"] as $colname=>$column) {
			if($column["property"]==="id"){continue;}
			$lines[] = TAB . TAB . TAB . TAB . "\$o->{$column["property"]}=\$params->{$column["property"]};";
		}
		
		return implode(NL, $lines);
	}
	
	
}
?>
