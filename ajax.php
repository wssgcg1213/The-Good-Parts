<?php

/* **************************** */
/* 用来AJAX获取数据库中的POSTS记录 */
/* **************************** */

error_reporting(E_ALL & ~E_NOTICE);
include_once("class/config.php");
include_once("class/bRess.class.php");
include_once("class/mysql.class.php");
include_once("function.php");
$bRess = new bRess;
$index_content_length = $bRess->get_option("index_content_length");
//$remote_path = $bRess->get_option("remote_path");
header("Content-Type:text/html;charset=utf-8");
	
	$json_post = array();
	if(!isset($_GET['lis'])){
		$json_post['status'] = -1;
		die(json_encode($json_post));
	}

	$lis = intval($_GET['lis']);
	$mysql = new mysql();
	$mysql->query('SELECT * FROM `B_posts`');
	$num = $mysql->num_rows();
	$id = $num - $lis +1;
	if($num < $lis){
		$json_post['status'] = -1;
		die(json_encode($json_post));
	};
	//$mysql->query('SELECT * FROM `B_posts` WHERE `post_id`= '.$id);
	$arr = $bRess->get_post($id);
		$first_letter = mb_substr($arr['title'], 0, 1, 'utf-8');
	$json_post['status'] = 1;
	$json_post["index_content_length"] = $index_content_length;
	$json_post['id'] = $arr['id'];
	$json_post['title'] = str_replace_once($first_letter, "<span>".$first_letter."</span>", $arr['title']);
	$json_post['content'] = cut_str($arr['content'], $index_content_length, $arr['id']);
	$json_post['author'] = $arr['author'];
	$json_post['date'] = $arr['date'];
	$json_post['category'] = $bRess->cate_prase($arr['category']);
	$json_post['tags'] = $bRess->tag_prase($arr['tags']);
	$json_post['remote_path'] = $remote_path;
	echo json_encode($json_post);
?>