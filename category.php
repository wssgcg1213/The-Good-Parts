<?php 
	include_once("header.php");
	$category = $_GET['c'] ? (string)$_GET['c'] : "";
	$page_title = $category;
?>

<div id="main">
	<ul id="post_ul">
	<?=$bRess->get_post_cell($bRess->get_term_post("category", $category))?>
	</ul>
</div>

<?php include_once("footer.php"); ?>