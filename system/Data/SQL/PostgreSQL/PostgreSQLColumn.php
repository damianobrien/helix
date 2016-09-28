<?php
class PostgreSQLColumn extends Object implements IColumn {
	
	public function __construct($tablename, $columnname, $database) {
		
	}
	
	public function add() {
		//DO $$ BEGIN BEGIN alter table "{$tablename}" add column {$columnname} {$type}; EXCEPTION WHEN duplicate_column THEN RAISE NOTICE 'column {$columnname} already exists in {$tablename}.'; END; END; $$;
	}
	
	public function alter() {
		
	}
	
	public function drop() {
		
	}
	
	public function isPrimary() {
		
	}
	
	public function isUnique() {
		
	}
	
	public function getCreateString() {
		
	}
	
	public function getNiceName() {
		
	}
	
	public function __toString() {
		
	}
	
}
?>
