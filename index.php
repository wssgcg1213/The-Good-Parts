<?php
include_once("header.php");
$page_title = $bRess->site["title"];
?>
<div id="main">
	<ul id="post_ul">
		<?=$bRess->get_all_post()?>
	</ul>
</div>
<div id="more"><span>More...</span></div>
<script src="js/scroll.js"></script>
<?php include_once("footer.php");?>
