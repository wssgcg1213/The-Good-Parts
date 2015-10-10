<?php

/* ******* */
/* 处理登录 */
/* ******* */


session_start();
include_once("class/mysql.class.php");

class login{
	public $loginstat;

	function __construct(){
		if(isset($_SESSION['username'])){
			$this->loginstat = true;
			return true;
		}
		$this->loginstat = false;
		return false;
	}

	/**
	 * 登录
	 * @return [type] [description]
	 */
	function log($username, $pwd){
		if(!$username || !$pwd)return;
		$username = addslashes($username);
		$json = array();
		$mysql = new mysql();
		$md5pwd = md5($pwd); 
		$sql = "SELECT * FROM `B_user` WHERE `username`='$username' and `password`='$md5pwd'";
		$mysql->query($sql);
		if($mysql->num_rows() == 1){
			$row = $mysql->fetch_array();
			setcookie("username", $username, time()+3600); 
			setcookie("logintime", time(), time()+3600); 
			$_SESSION['username'] = $username;
			$json["code"] = 1;
			$json["info"] = "success";
			$json["user"] = $username;
			die(json_encode($json));
			//header("location:index.php");
		}elseif($mysql->num_rows() == 0){
			$json["code"] = -1;
			$json["info"] = "查无此用户";
			die(json_encode($json));
		}else{
			$json["code"] = -2;
			$json["info"] = "DB内部错误code1";
			die(json_encode($json));
		}
	}

	function logout(){
		$_SESSION = array();
		setcookie(session_name(), '', time()-3600, '/');
		setcookie("username");
		setcookie("logintime");
		session_destroy();
		header("location:index.php");
	}

}

if(isset($_GET['logOut'])){
	$login = new login();
	$login->logout();
};
$username = $_POST['username'] ? $_POST['username'] : "";
$pwd = $_POST['pwd'] ? $_POST['pwd'] : "";

$login = new login();
$login->log($username, $pwd);






