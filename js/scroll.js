var ajaxState = true;

(function(){
	/**
	 * [loadPosts 加载文章]
	 * @param  {[type]} lis [文章ID]
	 * @return {[type]}     [void]
	 */
	var loadPosts = function (lis) {
		if(ajaxState == false){
			document.addEvent("scroll", scrollmore); //解锁
			return;
		};
		if($("more"))
		$("more").innerHTML = "<span>Loading...!!!</span>";

		var ajax = new Ajax();
		var loadCallback = function(res){
			res = JSON.parse(res);
			if(res.status == -1){
				$("more").innerHTML = "<span>已经到底了!</span>";
				ajaxState = false;
			}else if(res.status == 1){
				var li = d.createElement("li");
				li.className = "posts";
				li.id = "post_" + res.id;

					var title = d.createElement("div");
						var a = d.createElement("a");
						a.href =  res.id;
						a.innerHTML = res.title;
						title.appendChild(a);
					title.className = "post_title";

					var content = d.createElement("div");
					content.className = "post_content";
					content.innerHTML = res.content;

					var info = d.createElement("div");
						info.className = "info";
						var postInfo = d.createElement("div");
						postInfo.className = "postinfo";
						postInfo.innerHTML = "&#xe08a;:" + res.author + "&nbsp;&#xe014;:" + res.date + "&nbsp;&#xe076;:" + res.category + "&nbsp;&#xe090;:" + res.tags;

						var commentInfo = d.createElement("div");
						commentInfo.className = "commentinfo";
						commentInfo.innerHTML = "&#xe000;:" + '<a href="' + res.id + "#comments" + '"><span class="ds-thread-count" data-thread-key="' + res.id + '" data-count-type="comments"></span></a>';
					info.appendChild(postInfo);
					info.appendChild(commentInfo);
				li.appendChild(title);
				li.appendChild(content);
				li.appendChild(info);
				$("post_ul").appendChild(li);
				title.addEvent('click', function(ev){loading(ev.srcElement)}, false);
				var duoshuoQuery = {short_name:"thegp"};
				(function() {
    				var ds = document.createElement('script');
    				ds.type = 'text/javascript';ds.async = true;
    				ds.src = 'http://static.duoshuo.com/embed.js';
    				ds.charset = 'UTF-8';
    				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
    				var posts = document.getElementsByClassName("posts");
    				var comments = document.getElementsByClassName("ds-thread-count");
    				for(i = 0, length = posts.length; i < length; i++){
    					if(comments[i].innerHTML == ""){
    					comments[i].innerHTML = "暂无评论.";    			
    					}
    				}
				})();
				if($("more"))
				$("more").innerHTML = "<span>More...</span>";
			}
			
			if(document.addEventListener){
				document.addEventListener("scroll", scrollmore, false); //解锁
			}else{
				document.attachEvent("scroll", scrollmore, false); //解锁
			}
			
		}
		ajax.get("ajax.php?lis="+lis, loadCallback);
	}

	var more = function(){
		var newestId = d.getElementsByClassName("posts").length;
		loadPosts(newestId+1);
	};

	var scrollmore = function(){
		if(_reachBottom()){
			if(document.removeEventListener){
				document.removeEventListener("scroll", scrollmore); //上锁
			}else{
				document.detachEvent("scroll", scrollmore);  //上锁
			};
			
			more();
			// var newestId = d.getElementsByClassName("posts").length;
			// if(newestId >= 5){
			// 	//超过6个li时滚动ajax停止
			// 	document.removeEventListener("scroll", scrollmore, false);
			// }
		};
		if(document.body.scrollTop != 0){
			$("header").style.height = "46px";
			$("introduce").style.top = "106px";
			$("header").style.opacity = 0.7;
		}else{
			$("header").style.height = "90px";
			$("introduce").style.top = "150px";
			$("header").style.opacity = 1;
		};
	};


	$("more").addEvent("click", more, false);
	document.addEventListener("scroll", scrollmore, false);

})();
