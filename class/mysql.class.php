<?php
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
		$this->select_db(); 
		$this->query("SET NAMES '".$this->charset."'");
		//if(DEBUG)echo '<script>alert("DBinitOK")</script>';
	}

/**
 * 连数据库
 */
	function connect($dbhost = "", $dbuser = "", $dbpw = ""){
		$dbhost	= $dbhost? $dbhost : $this->dbhost;
		$dbuser	= $dbuser? $dbuser: $this->dbuser;
		$dbpw =	$dbpw? $dbpw: $this->dbpw;
		if(!$link = mysql_connect($dbhost, $dbuser , $dbpw)){
			$this->halt("服务器连接错误.");
		}
		return $link;
	}

/**
 * 选db
 */
	function select_db($dbname = ""){
		$dbname = $dbname? $dbname: $this->dbname;
		return mysql_select_db(DATEBASE);
	}

/**
 * 查询
 */
	function query($sql = ""){
		$query = mysql_query($sql, $this->links);
		$this->rs = $query;
		 if(!$query){
		 	$this->halt('服务器查询错误!');
		 }
		return $query;
	}

/**
 * 数据库结果集转化成数组	
 */
	function fetch_array($rs = "", $result_type = MYSQL_ASSOC){
		$rs = $rs? $rs: $this->rs;
		return mysql_fetch_array($rs, $result_type);
	}

/**
 * 记录数
 */
	function num_rows($rs = ""){	
		$rs = $rs? $rs: $this->rs;
		return mysql_num_rows($rs);
	}

/**
 * [insert_id 返回数据库结果集的插入id]
 */
	function insert_id(){	
			return  mysql_insert_id();
		}

/**
 * [close 关闭数据库连接]
 */
	function close($links){
			return mysql_close($this->links);
		}


}//endClass
?>

