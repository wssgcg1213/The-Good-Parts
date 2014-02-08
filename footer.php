<!-- start footer.php -->
		<div id="footer">
            <div id="footlink" class="floatleft">
                <p class="smalltext"><a href="http://test.Treeforests.com/" target="_blank">B1ackRainFlake</a>&nbsp;Design © 2013</p>
            </div>
            <div id="rightinfo" class="floatright">
                <p>Powered by PHP&nbsp;© 2013, TreeForests.</p>
            </div>
        </div><!-- end #footer -->
	</div><!--  end #wrap -->
<!-- baidu tongji -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fc52389b84eafdc8e4e43f4833138372d' type='text/javascript'%3E%3C/script%3E"));
var duoshuoQuery = {short_name:"thegp"};
(function(){
    var ds = document.createElement('script');
    ds.type = 'text/javascript';ds.async = true;
    ds.src = 'http://static.duoshuo.com/embed.js';
    ds.charset = 'UTF-8';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);

    var titles = document.getElementsByClassName('post_title');
    var comments = document.getElementsByClassName("ds-thread-count");
    var length = titles.length;
    for(var i = 0; i < length; i++){
        if(titles[0].firstChild.href){
            if(titles[i].addEventListener){
                titles[i].addEventListener('click', function (ev) {loading(ev.srcElement)}, false);
            }else{
                titles[i].attachEvent('click', function (ev) {loading(ev.srcElement)});
            }
        }
        if(comments[i].innerHTML == ""){
            comments[i].innerHTML = "暂无评论.";                
        }
    }

    document.title = "<?=$page_title?>|<?=$bRess->site['subtitle']?>";
})();
</script>
</body>
</html>
