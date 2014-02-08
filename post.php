<?php 
	include_once("header.php");
	$pid = isset($_GET['p'])? (int)$_GET['p'] : 1;
?>
<div id="main">
	<ul>
		<?php $page_title = $bRess->get_post_cell($pid); ?>
	</ul>
	<div id="comments">
		<!-- Duoshuo Comment BEGIN -->
		<div class="ds-thread" data-thread-key="<?=$bRess->post['id']?>"></div>
		<!-- Duoshuo Comment END -->
	</div>
</div>
<?php include_once("footer.php"); ?>