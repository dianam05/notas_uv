<?php
class ntDB {

  private $db_info = array();
  private $db;
 
  public static $instance = NULL;
 
  private function __construct(array $db_info = null) {
  
    if(isset($db_info)) {
        $this->db_info = $db_info;
    }
	
	$dsn = 'mysql:dbname=' .$this->db_info['dbname']. ';host=' .$this->db_info['host'];
    $this->db = new PDO($dsn, $this->db_info['username'], $this->db_info['password'], array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
		PDO::ATTR_PERSISTENT => true
	));
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  }
 
  public static function getInstance() {
	
    if(!isset(self::$instance)) {
	
		global $hostname_conn;
		global $database_conn;
		global $username_conn;
		global $password_conn;
		
		$db_info = array(
			'host' => $hostname_conn,
			'dbname' => $database_conn,
			'username' => $username_conn,
			'password' => $password_conn
		);
		
		self::$instance = new ntDB($db_info);
    }
	
    return self::$instance->db;
  }
  
  public static function getSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
  
	if (PHP_VERSION < 6) {
		$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
	}

	$theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

	switch ($theType) {
		case "text":
			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
			break;    
		case "long":
		case "int":
			$theValue = ($theValue != "") ? intval($theValue) : "NULL";
			break;
		case "double":
			$theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
			break;
		case "date":
			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
			break;
		case "defined":
			$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
			break;
	}
	
	return $theValue;
  }
}
?>