<?php
class MySQL extends Database
{

    public function __construct($host = null, $username = null, $password = null, $database = null, $port = null)
    {
        global $config;

        $this->le = "`";
        $this->re = "`";

        $this->host = alt($host, $config["mysql_host"]);
        $this->username = alt($username, $config["mysql_user"]);
        $this->password = alt($password, $config["mysql_password"]);
        $this->database = alt($database, $config["mysql_database"]);
        $this->port = alt($port, $config["mysql_port"], 3306);
    }

    public function getAffectedRows()
    {
    }

    public function getNumRows()
    {
        if (isset($this->result)) {
            return $this->result->num_rows;
        } else {
            return false;
        }
    }

    public function getTotalRows()
    {
        $total=null;
        $query = implode(NL, array(
            "select FOUND_ROWS() as total"
        ));
        //debug($query);
        $this->query($query);
        while ($this->getRecord()) {
            $total = $this->record["total"];
        }
        return $total;
    }

    public function getRecord($associative = true)
    {
        $format = $associative ? MYSQLI_ASSOC : MYSQLI_NUM;
        $this->record = is_object($this->result) ? $this->result->fetch_array($format) : null;
        return $this->record;
    }

    public function getClientInfo()
    {
    }

    public function getClientVersion()
    {
    }

    public function getConnectionStats()
    {
    }

    public function getConnectErrno()
    {
        return $this->connection->connect_errno;
    }

    public function getConnectError()
    {
        return $this->connection->connect_error;
    }

    public function getErrno()
    {
    }

    public function getError()
    {
    }

    public function getFieldCount()
    {
    }

    public function getHostInfo()
    {
    }

    public function getProtocolVersion()
    {
    }

    public function getServerInfo()
    {
    }

    public function getServerVersion()
    {
    }

    public function getInfo()
    {
    }

    public function getInsertedID()
    {
        return $this->connection->insert_id;
    }

    public function getSQLState()
    {
    }

    public function getWarnings()
    {
    }

    public function getWarningCount()
    {
    }

    public function getCharset()
    {
    }

    public function getStatus()
    {
    }

    public function getCollation()
    {
    }

    public function getDatabase()
    {
        return $this->database;
    }

    public function getDatabases()
    {
    }

    public function getFunctions($database = null)
    {
        $functions = array();
        $database = isset($database) ? $database : $this->database;
        $query = "SHOW FUNCTION STATUS WHERE Db='{$database}'";
        $this->query($query);
        while ($this->getRecord()) {
            $functions[] = $this->record["Name"];
        }
        $functions = array_unique($functions);
        sort($functions);
        return $functions;
    }

    public function getStoredProcedures($database = null)
    {
        $database = isset($database) ? $database : $this->database;
    }

    public function getTables($search = null, $database = null)
    {
        $tables = array();
        $database = isset($database) ? $database : $this->database;
        $query = "SHOW FULL TABLES WHERE Table_type='BASE TABLE'" . (isset($search) ? " AND Tables_in_{$database} LIKE '%{$search}%'" : "");
        $this->query($query);
        while ($this->getRecord(false)) {
            $tables[] = $this->record[0];
        }
        $tables = array_unique($tables);
        sort($tables);
        return $tables;
    }

    public function getTriggers($database = null)
    {
        $database = isset($database) ? $database : $this->database;
    }

    public function getViews($database = null)
    {
        $database = isset($database) ? $database : $this->database;
    }

    public function changeUser($username, $password, $database = null)
    {
        $database = isset($database) ? $database : $this->database;
        //reset the connection
        $this->connection = null;
        $this->connect(null, $username, $password, $database);
        return $this;
    }

    public function changeDatabase($database)
    {
        $this->database = isset($database) ? $database : $this->database;
        //reset the connection
        $this->connection = null;
        $this->connect(null, null, null, $this->database);
        return $this;
    }

    public function changeCharset($charset)
    {
        //reset the connection
        $this->connection = null;
        $this->connect();
        $this->connection->set_charset($charset);
    }

    public function connect($host = null, $username = null, $password = null, $database = null, $port = null)
    {
        if (isset($this->connection)) {
            $error = null;
        } else {
            $host = alt($host, $this->host);
            $username = alt($username, $this->username);
            $password = alt($password, $this->password);
            $database = alt($database, $this->database);
            $port = alt($port, $this->port);
            $this->connection = new mysqli($host, $username, $password, $database, $port);
            $error = $this->getConnectErrno();
        }
        return $error;
    }

    public function close()
    {
        $this->connection->close();
    }

    public function query($query)
    {
        $errno = $this->connect();
        if (isset($errno) && $errno > 0) {
            debug("MySQL Connection Error: {$errno}: Query not executed: " . NL . $query);
        } else {
            $this->result = $this->connection->query($query);
            if ($this->result === false) {
                $msg = "MySQL Error: {$this->connection->error}" . NL . $query;
                debug($msg);
                throw new Exception($msg, mysql_errno());
            }
            // debug(NL . "********************************************" . NL . $query . NL . "MySQL Error: " . $this->connection->error . NL . "********************************************");
        }
    }

    public function commit()
    {
    }

    public function rollback()
    {
    }

    public function queryValue($value, $emptyStringAsNull = true)
    {
        return is_null($value) || ($emptyStringAsNull && strlen($value) === 0) ? "NULL" : "'{$this->escape($value)}'";
    }

    public function escape($string)
    {
        $this->connect();
        return $this->connection->real_escape_string($string);
    }

    public function encapsulate($string)
    {
        return $this->le . $string . $this->re;
    }

    public function createDatabase($database, $overwrite = false, array $options = null)
    {
        $query = "CREATE DATABASE";
        $query .= $overwrite ? " IF NOT EXISTS" : "";
        $query .= " {$this->encapsulate($database)}";
        if (isset($options)) {
            $query .= isset($options["charset"]) ? " DEFAULT CHARACTER SET = {$options["charset"]}" : "";
            $query .= isset($options["collation"]) ? " DEFAULT COLLATE = {$options["collation"]}" : "";
        }
        $status = $this->query($query);
        return $status;
    }

    public function dropDatabase($database)
    {
        $query = "DROP DATABASE IF EXISTS " . $this->encapsulate($database);
        $status = $this->query($query);
        return $status;
    }

    public function createTable($table, $properties, $enforceConstraints = true, $database = null)
    {
    }

    public function dropTable($table, $enforceConstraints = true, $database = null)
    {
    }

    public function truncateTable($table, $enforceConstraints = true)
    {
    }

    public function emptyDatabase($enforceConstraints = true)
    {
    }

    public function truncateDatabase($enforceConstraints = true)
    {
    }

    public static function dateFormatString($value,$format) {
        return ("DATE_FORMAT({$value},'{$format}')");
    }

    public static function limitOffsetString($limit,$offset) {
        return ("LIMIT {$offset},{$limit}");
    }

    public static function foundRowsString() {
        return " SQL_CALC_FOUND_ROWS ";
    }

}

?>
