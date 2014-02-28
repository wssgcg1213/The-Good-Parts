<?php
error_reporting(E_ALL & ~E_NOTICE);
include_once("config.php");
/**
 * mysql类
 * date:2013年12月07日
 * 
 */
define("DEBUG", true); //调试模式

class mysql{
	private $dbhost = SERVER;
	private $dbuser = USERNAME;
	private $dbpw = PASSWORD;
	public $dbname = DATEBASE;
	public $charset = CHARSET;
	public $rs;			//数据库结果
	private $links;			//数据库链接

/**
 * 错误处理
 */
	function halt($message = ""){
		echo mysql_error();
		echo mysql_errno();
		echo $message;
		echo $this->links->connect_error;
		die();
	}

/**
 * dbINIT
 */
	function __construct($dbhost = "", $dbuser = "", $dbpw = "", $dbname = ""){
		$this->dbhost = $dbhost? $dbhost: $this->dbhost;
		$this->dbuser = $dbuser? $dbuser: $this->dbuser;
		$this->dbpw = $dbpw? $dbpw: $this->dbpw;
		$this->dbname = $dbname? $dbname: $this->dbname;
		$this->links = $this->connect();
		$this->select_db($dbname);
		$this->links->set_charset($this->charset);
		//if(DEBUG)echo '<script>alert("DBinitOK")</script>';
	}

/**
 * 连数据库
 */
	function connect($dbhost = "", $dbuser = "", $dbpw = ""){
		$dbhost	= $dbhost? $dbhost : $this->dbhost;
		$dbuser	= $dbuser? $dbuser: $this->dbuser;
		$dbpw =	$dbpw? $dbpw: $this->dbpw;
		if(!$link = new mysqli($dbhost, $dbuser, $dbpw)){
			$this->halt("服务器连接错误.");
		}
		return $link;
	}

/**
 * 选db
 */
	function select_db($dbname = ""){
		$dbname = $dbname? $dbname: $this->dbname;
		return $this->links->select_db($dbname);
	}

/**
 * 查询
 */
	function query($sql = ""){
		$query = $this->links->query($sql);
		$this->rs = $query;
		 if($this->links->connect_error){
		 	$this->halt('服务器查询错误!');
		 }
		return $query;
	}

/**
 * 数据库结果集转化成数组	
 */
	function fetch_array($rs = "", $result_type = MYSQL_ASSOC){
		$rs = $rs? $rs: $this->rs;
		if($result_type == MYSQL_ASSOC){
			return $rs->fetch_assoc();
		}else{
			return $rs->fetch_array();
		}
	}

/**
 * 记录数
 */
	function num_rows($rs = ""){	
		$rs = $rs? $rs: $this->rs;
		return $this->rs->num_rows;
	}


/**
 * [close 关闭数据库连接]
 */
	function close($links){
		return $this->links->free();
	}


}//endClass
?>

