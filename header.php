<?php
error_reporting(E_ALL & ~E_NOTICE);
include_once("class/bRess.class.php");
include_once("function.php");
$bRess = new bRess();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$bRess->site['title']?>|<?=$bRess->site['subtitle']?></title>
	<meta charset="utf-8" />
	<meta description="author" content="<?=$bRess->site['subtitle']?>" />
	<meta property="og:image" content="image/icon.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="favicon.ico"/>
	<script src="js/ajax.js"></script>
	<script src="js/common.js"></script>
</head>
<body>
	<div id="flow" class="flow"></div>
	<div id="loginForm">
		<span id="close"></span>
		<div class="loginTitle">LOGIN</div>
		<div class="loginMain">
			<form action="login.php" method="post">
				<input type="text" name="username" placeholder="输入用户名" />
				<input type="password" name="pwd" placeholder="输入密码" />
			</form>
		</div>
		<div class="loginbtns">
			<a class="btn" id="loginbtn" href="##">登录</a>
		</div>
	</div>
	<div class="blackbar mobile-hide">
		<div id="introduce">
			<ul>
				<li>一个</li>
				<li>热爱互联网</li>
				<li>热爱学习互联网</li>
				<li>热爱玩耍互联网</li>
				<li>的骚年</li>
			</ul>
		</div>
	</div>
	<div id="header">
		<div class="row">
			<div id="logo" class="floatleft">
				<a href="<?=$bRess->get_option('remote_path');?>"><h1><?=$bRess->site['title']?></h1></a>
				<h2><?=$bRess->site['subtitle']?></h2>
			</div>
			<div id="nav">
				<ul>
				  <div class="nav_cate mobile-hide">
					<li>分类:</li>
				<?php
					/**
					 * category
					 */
					$bRess->mysql->query("SELECT * FROM `B_category`");
					$cate_num = $bRess->mysql->num_rows();
					 for($i = 0; $i < $cate_num; $i++){
					 	$cate = $bRess->mysql->fetch_array();
					 	echo '<a id="category_'.$i.'" href="'.$cate['category_name'].'"><li>'.$cate['category_name'].'</li></a>';
					 }
					echo "<li>|</li>";
					echo "</div>";//mobile hide;
					 /**
					  * 登录行为
					  */
					 if(!isset($_SESSION['username'])){
					 	echo '<a id="login" href="##"><li>登录</li></a>';
					 }else{
					 	echo '<a id="username" href="##"><li>'.$_SESSION['username'].'</li></a>';
					 	echo '<a id="loginOut" href="##"><li>注销</li></a>';
					 }
				?>
				</ul>
			</div>
		</div>
	</div>
	<div id="wrap">
<!-- end header.php -->