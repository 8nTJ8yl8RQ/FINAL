<?php
class MySQL {


private $result = NULL;
//public $result = NULL;

//private $link = NULL;
public $link = NULL;

private $host = NULL;
private $user = NULL;
private $password = NULL;
private $database = NULL;
 

// connect to MySQL

public function __construct($hst, $usr, $pass, $db){	
	$this->host = $hst;
	$this->user = $usr;
	$this->password = $pass;
	$this->database = $db;
}
//disable auto connect

public function connect(){
	if (FALSE === ($this->link = mysql_connect($this->host, $this->user, $this->password))) {
		throw new Exception('Error : '. mysql_errno(). ': ' . mysql_error(),0);
	}

	//select database to connect
	if (!mysql_select_db($this->database, $this->link)) {
		throw new Exception( 'Error : ' . mysql_errno($link) . ': ' . mysql_error($link),1);
	}
	
} 

// perform query

public function query($query){
	if (is_string($query) AND !empty($query)) {
		if (FALSE === ($this->result = mysql_query( $query ))) {
			throw new Exception('Error performing query ' . $query . ' Error message :' .mysql_error($this->link), 2);
		}
	}
}

public function get_result() {
	return $this->result;
}

// fetch row from result set
public function fetch() {
	if (FALSE === ($row = mysql_fetch_assoc($this->result))) {
		mysql_free_result($this->result);
		return FALSE;
		
	}
	return $row;
}

// get insertion ID

public function getInsertID() {
	return mysql_insert_id($this->link);
}

// count rows in result set

public function countRows(){
	if ($this->result !== NULL) {
		return mysql_num_rows($this->result);
	}
}

// implement destructor to close the database connection

public function close() {
	mysql_close($this->link);
}

function __destruct() {
	
//	mysql_close($this->link);
}

}

?>
