<?php
class bRess{
	public $mysql;
	public $site = array();
	public $post = array();
	var $p;

	function __construct(){
		$this->init();
		$this->mysql->query("SELECT * FROM `B_option` WHERE `option_name`='site_title'");
		$_temp = $this->mysql->fetch_array();
		$this->site['title'] = $_temp['option_value'];
		$this->mysql->query("SELECT * FROM `B_option` WHERE `option_name`='site_subtitle'");
		$_temp = $this->mysql->fetch_array();
		$this->site['subtitle'] = $_temp['option_value'];
	}

	function init(){
		session_start();
		include_once("config.php");
		include_once("mysql.class.php");
		$this->mysql = new mysql();
	}

	function get_title(){
		return $this->site['title'];
	}

	function get_post($p = 1){
		$pid = isset($_GET['p']) ? (int)$_GET['p'] : $p;
		$this->mysql->query("SELECT * FROM `B_posts` WHERE `post_id`=$pid");
		if($_result = $this->mysql->fetch_array()){
			$this->post['id'] = $pid;
			$this->post['title'] = $_result['post_title'] ? $_result['post_title'] : "Untitled";
			$this->post['author'] = $_result['post_author'] ? $_result['post_author'] : "Unauthored";
			$this->post['content'] = $_result['post_content'] ? $_result['post_content'] : "NOcontent";
			$this->post['date'] = $_result['post_date'] ? $_result['post_date'] : time();
			$this->post['category'] = $_result['category'] ? $_result['category'] : "";
			$this->post['tags'] = $_result["tags"] ? $_result['tags'] : "";
			$this->post['comments'] = $_result["comments"] ? $_result['comments'] : 0;
		}else{
			header("location: 404.php");
		}
		return $this->post;
	}

	function get_option($option_name){
		$this->mysql->query("SELECT * FROM `B_option` WHERE `option_name`='".$option_name."'");
		$_result = $this->mysql->fetch_array();
		return $_result['option_value'];
	}

	function get_all_post($limit = 3){
		$limit = intval(trim($limit));
		$sql = "SELECT * FROM `B_posts` ORDER BY `post_id` DESC LIMIT ".$limit;
		$this->mysql->query($sql);
		$limax = $this->mysql->num_rows() > $limit ? $limit : $this->mysql->num_rows();
		$_posts = array();
		for($i = 0; $i < $limax; $i++){
			$post = $this->mysql->fetch_array();
			array_push($_posts, $post['post_id']);
		}
		return $this->get_post_cell($_posts);
	}

	function get_term_post($term_type = "category", $term_name = ""){
		$term_name = $term_name ? (string)$term_name : "";
		$sql = "SELECT object_id FROM B_term_relationships AS tr INNER JOIN  `B_term` AS t ON t.term_id = tr.term_taxonomy_id INNER JOIN B_term_taxonomy AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id WHERE tt.taxonomy =  '".$term_type."' AND t.term_name =  '".$term_name."'";
		//echo $sql;
		$posts = array();
		$this->mysql->query($sql);
		while($_temp = $this->mysql->fetch_array("",MYSQL_NUM)){
			array_push($posts, $_temp[0]);
		}
		return $posts;
	}

	function cate_prase($category){
	    $category = strtolower(trim($category));
	    return "<a href='".$category."'>".$category."</a>";
	}
	
	function tag_prase($tags){
	    $tags = strtolower(trim($tags));
	    $tag_array = explode("|", $tags);
	    $tag_length = count($tag_array);
	    $return = '';
	    for($i = 0; $i < $tag_length; $i++){
	        if($i == $tag_length-1){
	            $return.= "<a href='".$tag_array[$i]."'>".$tag_array[$i]."</a>";
	        }else{
	            $return.= "<a href='".$tag_array[$i]."'>".$tag_array[$i]."、</a>";
	        }
	    }
	    return $return;
	}
	
	function get_post_cell($post_id){
	
	    if(is_int($post_id)){
	        return $this->get_li_cell($post_id, true);
	    }
	    if(is_array($post_id)){
	        $_posts = '';
	        foreach ($post_id as $key => $pid) {
	            $_posts .= $this->get_li_cell($pid);
	        } 
	        return $_posts;
	    }
	}
	
	function get_li_cell($pid, $is_post = false){
		$index_content_length = $this->get_option('index_content_length');
	    $this->get_post($pid);
	    $first_letter = mb_substr($this->post['title'], 0, 1, 'utf-8');
	    $title = str_replace_once($first_letter, "<span>".$first_letter."</span>", $this->post['title']);
	
	    $li = '<li class="posts" id="post_'.$this->post['id'].'">';
	    if(!$is_post){
	        $li .= '<div class="post_title"><a href="'.$this->post['id'].'">'.$title.'</a></div>';
	        $li .= '<div class="post_content">'.cut_str($this->post['content'],$index_content_length, $bRess->post['id']).'</div>';
	    }else{
	        $li .= '<div class="post_title">'.$title.'</div>';
	        $li .= '<div class="post_content">'.$this->post['content'].'</div>';
	    }

	    $li .= '<div class="info">';
	    $li .= '<div class="postinfo">&#xe08a;：'.$this->post['author'].'&nbsp;&#xe014;：'.$this->post['date'].'&nbsp;&#xe076;：'.$this->cate_prase($this->post['category']).'&nbsp;&#xe090;：'.$this->tag_prase($this->post['tags']).'</div>';
	    $li .= '<div class="commentinfo" >&#xe000;：<a href="'.$this->post['id'].'#comments"><span class="ds-thread-count" data-thread-key="'.$this->post['id'].'" data-count-type="comments"></span></a></div>';
	    $li .= '</div></li>';
	
	    if($is_post){
	        echo $li;
	        return $this->post['title'];
	    }else{
	        return $li;
	    }
	}





}

?>