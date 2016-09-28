<?php
class GeneratorPage extends Layout {
	
	public function initialize() {
		parent::initialize();
		$this->title = "Class Generator";
	}
	
	public function runGenerator() {
		$start = microtime(true);
        HelixGenerator::generate(req("site"),explode(",",req("modules")));
		$this->data["generator"]["duration"] = ceil(microtime(true) - $start) . " Seconds";
		$this->data["generator"]["tables"] = count(HelixGenerator::$tables);
		$this->data["generator"]["classes"] = count(HelixGenerator::$classes);
		$this->data["generator"]["lines"] = HelixGenerator::$linesOfCode;
		print_r($this->data);
	}
	
	public function runExtJsGenerator() {
		$start = microtime(true);
		ExtJsGenerator::generate(req("site"));
		$this->data["generator"]["duration"] = ceil(microtime(true) - $start) . " Seconds";
		$this->data["generator"]["tables"] = count(Generator::$tables);
		$this->data["generator"]["classes"] = count(Generator::$classes);
		$this->data["generator"]["lines"] = Generator::$linesOfCode;
		print_r($this->data);
	}
	
}
?>