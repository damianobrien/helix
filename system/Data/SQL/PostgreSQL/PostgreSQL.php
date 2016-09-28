<?php
class PostgreSQL extends Database {

    private $insertedId=0;
	
	public function __construct($host=null, $username=null, $password=null, $database=null, $port=null) {
		global $config;

        $this->le = '"';
        $this->re = '"';

        $this->host = alt($host, $config["postgres_host"]);
        $this->username = alt($username, $config["postgres_user"]);
        $this->password = alt($password, $config["postgres_password"]);
        $this->database = alt($database, $config["postgres_database"]);
        $this->port = alt($port, $config["postgres_port"], 5432);
	}
	
	public function getAffectedRows() {
	}
	
	public function getNumRows() {
		if (isset($this->result)) {
            return pg_num_rows($this->result);
        } else {
            return false;
        }
	}
	
	public function getTotalRows() {
		/*$total=null;
        $query = implode(NL, array(
            "select FOUND_ROWS() as total"
        ));
        //debug($query);
        $this->query($query);
        while ($this->getRecord()) {
            $total = $this->record["total"];
        }*/
        return $this->record["FOUND_ROWS"];
	}

	public function getRecord($associative=true) {
		$this->record = is_resource($this->result) ? $associative?pg_fetch_assoc($this->result):pg_fetch_row($this->result) : null;
        return $this->record;
	}

	public function getClientInfo() {
	}
	
	public function getClientVersion() {
	}
	
	public function getConnectionStats() {
	}
	
	public function getConnectErrno() {
        return $this->connection->connect_errno;
    }

    public function getConnectError() {
        return $this->connection->connect_error;
    }
	
	public function getErrno() {
	}
	
	public function getError() {
	}
	
	public function getFieldCount() {
	}
	
	public function getHostInfo() {
	}
	
	public function getProtocolVersion() {
	}
	
	public function getServerInfo() {
	}
	
	public function getServerVersion() {
	}
	
	public function getInfo() {
	}
	
	public function getInsertedID() {
        if (isset($this->result)) {
            //return pg_last_oid($this->result);
            return $this->insertedId;
        } else {
            return false;
        }
	}
	
	public function getSQLState() {
	}
	
	public function getWarnings() {
	}
	
	public function getWarningCount() {
	}

	public function getCharset() {
	}

	public function getStatus() {
	}

	public function getCollation() {
	}
	
	public function getDatabase() {
		return $this->database;
	}
	
	public function getDatabases() {
        $databases = array();
        $errno = $this->connect();
        $query = "SELECT d.datname as {$this->le}name{$this->re}
            FROM pg_catalog.pg_database d
            LEFT JOIN pg_catalog.pg_user u ON d.datdba = u.usesysid
            ORDER BY 1;";

        if (isset($errno) && $errno > 0) {
            debug("PostgreSQL Connection Error: {$errno}: Query not executed: " . NL . $query,"error.log");
        } else {
            $this->result = @pg_query($this->connection, $query);
            if (!$this->result) {
                //$msg = "PostgreSQL Error: {$this->connection->error}" . NL . $query;
                $msg = "PostgreSQL Error: {$php_errormsg}" . NL . $query;
                debug($query . NL,"error.log");
                debug($msg,"error.log");
                throw new Exception ('POSTGRESQL: Failed to list databases');
            } else {
                while ($this->getRecord()) {
                    $databases[] = $this->record["name"];
                }
            }
        }
        return new Collection($databases);
	}
	
	public function getFunctions($database=null) {
		
	}
	
	public function getStoredProcedures($database=null) {
	}
	
	public function getTables($search=null, $database=null) {
	}
	
	public function getTriggers($database=null) {
	}
	
	public function getViews($database=null) {
	}
	
	public function changeUser($username, $password, $database=null) {
	}
	
	public function changeDatabase($database) {
        $this->database = isset($database) ? $database : $this->database;
        //reset the connection
        $this->connection = null;
        $this->connect(null, null, null, $this->database);
        Database::$instances["postgresql"] = $this;
        return $this;
	}
	
	public function changeCharset($charset) {
	}
	
	public function connect($host=null, $username=null, $password=null, $database=null, $port=null){
		$host = alt($host, $this->host);
		$username = alt($username, $this->username);
		$password = alt($password, $this->password);
		$database = alt($database, $this->database);
		$dbstring="";
		if(!is_null($database) && $database<>"") $dbstring = " dbname=$database";
		$port = alt($port, $this->port);
		$this->connection = pg_connect("host=$host user=$username password=$password port=$port $dbstring") or die ("Could not connect to server\n");
	}
	
	public function close() {
		$this->connection->close();
	}
	
	public function query($query) {
		$errno = $this->connect();
        $this->insertedId = 0;
        if (isset($errno) && $errno > 0) {
            debug("PostgreSQL Connection Error: {$errno}: Query not executed: " . NL . $query,"error.log");
        } else {
            $this->result = @pg_query($this->connection, $query);
            if(stripos($query, "insert")===0){
                //$this->insertedId = pg_last_oid($this->result);
                $insert_query = @pg_query("SELECT lastval();");
                $insert_row = @pg_fetch_row($insert_query);
                $this->insertedId = $insert_row[0];
            }

            if (!$this->result) {
				//$msg = "PostgreSQL Error: {$this->connection->error}" . NL . $query;
				$msg = "PostgreSQL Error: {$php_errormsg}" . NL . $query;
                debug($query . NL,"error.log");
                debug($msg,"error.log");
                throw new Exception ($php_errormsg);
			}
        }
	}
	
	public function commit() {
	}
	
	public function rollback() {
	}
	
	public function queryValue($value, $emptyStringAsNull = true) { 
		return is_null($value) || ($emptyStringAsNull && strlen($value) === 0) ? "NULL" : "'{$this->escape($value)}'";
	}
	
	public function escape($string) {
		return pg_escape_string($string);
	}
	
	public function encapsulate($string) {
		return $this->le . $string . $this->re;
	}
	
	public function createDatabase($database, $overwrite=false, array $options=null) {
		$errno = $this->connect();
		$query = "CREATE DATABASE {$this->le}{$database}{$this->re};";
        if (isset($errno) && $errno > 0) {
            debug("PostgreSQL Connection Error: {$errno}: Query not executed: " . NL . $query,"error.log");
        } else {
            $this->result = @pg_query($this->connection, $query);
            if (!$this->result) {
				//$msg = "PostgreSQL Error: {$this->connection->error}" . NL . $query;
				$msg = "PostgreSQL Error: {$php_errormsg}" . NL . $query;
                debug($query . NL,"error.log");
                debug($msg,"error.log");
                throw new Exception ('POSTGRESQL: Failed to create database');
			}
        }
	}
	
	public function dropDatabase($database) {
	}
	
	public function createTable($table, $properties, $enforceConstraints=true, $database=null) {
	}
	
	public function dropTable($table, $enforceConstraints=true, $database=null) {
	}
	
	public function truncateTable($table, $enforceConstraints=true) {
	}
	
	public function emptyDatabase($enforceConstraints=true) {
	}
	
	public function truncateDatabase($enforceConstraints=true) {
	}

    public static function dateFormatString($value,$format) {
        return ("to_char({$value},'{$format}')");
    }

    public static function limitOffsetString($limit,$offset) {
        return ("LIMIT {$limit} OFFSET {$offset}");
    }

    public static function foundRowsString() {
        return "count(*) OVER() AS FOUND_ROWS, ";
    }
}