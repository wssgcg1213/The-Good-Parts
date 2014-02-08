-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 02 月 08 日 20:21
-- 服务器版本: 5.1.63
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `treefore_bblog`
--

-- --------------------------------------------------------

--
-- 表的结构 `B_category`
--

CREATE TABLE `B_category` (
  `category_name` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `B_category`
--

INSERT INTO `B_category` VALUES('Life', 1);
INSERT INTO `B_category` VALUES('Code', 2);

-- --------------------------------------------------------

--
-- 表的结构 `B_comments`
--

CREATE TABLE `B_comments` (
  `cid` int(6) NOT NULL AUTO_INCREMENT,
  `comment_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `under` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `B_comments`
--


-- --------------------------------------------------------

--
-- 表的结构 `B_option`
--

CREATE TABLE `B_option` (
  `option_id` int(11) NOT NULL,
  `option_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `option_value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `B_option`
--

INSERT INTO `B_option` VALUES(1, 'site_title', 'The Good Parts');
INSERT INTO `B_option` VALUES(2, 'site_subtitle', 'B1ackRainFlake');
INSERT INTO `B_option` VALUES(3, 'limax_default', '3');
INSERT INTO `B_option` VALUES(4, 'index_content_length', '800');
INSERT INTO `B_option` VALUES(5, 'remote_path', 'http://gp.treeforests.com/');

-- --------------------------------------------------------

--
-- 表的结构 `B_posts`
--

CREATE TABLE `B_posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_content` text,
  `post_author` text NOT NULL,
  `post_author_id` int(11) NOT NULL,
  `post_date` datetime NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `comments` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `B_posts`
--

INSERT INTO `B_posts` VALUES(1, '第一篇文章', '熬夜还真是不好.<br>\n好吧,花了几天时间来搞这个东西<br>\n样子算是出来了.<br>\n至于名字叫什么也无所谓,就随便取了个名字方便写目录名...<br>\n\n话说弄完的时候还是挺有成就感的<br>\n那么这次新尝试的东西有...<br>\n<br>\n	<em>{LESS}</em><br>\n	<em>响应式(不知道这个算不算....)</em><br>\n	<em>各种animation</em><br>\n	<em>纯手工后台(PHP+MYSQL....下次改用node.js试试)</em><br>\n<br>\n不管了好饿啊<br>\n去吃饭了....<br>\n	\n\n', 'wssgcg1213', 1, '2013-12-07 15:54:24', 'life', 'life|night', 0);
INSERT INTO `B_posts` VALUES(2, '这是第二篇', '无关痛痒的第二篇.\n<img src="http://wssgcg1213.qiniudn.com/P_002.jpg"/>', 'wssgcg1213', 1, '2013-12-07 15:54:27', 'life', 'life', 0);
INSERT INTO `B_posts` VALUES(3, 'Ajax 测试', '没什么好打的,测试ajax<br>\r\n顺便写了一个js的AJAX库<br>\r\n→_→<br>\r\n<pre>\r\nfunction Ajax() {\r\n    "use strict";\r\n    var aja = {};\r\n    aja.tarUrl = '''';\r\n    aja.postString = '''';\r\n    aja.createAjax = function () {\r\n        var xmlhttp;\r\n        if (window.XMLHttpRequest) {                      // code for IE7+, Firefox, Chrome, Opera, Safari\r\n            xmlhttp = new XMLHttpRequest();\r\n        } else {                                            // code for IE6, IE5\r\n            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");\r\n        }\r\n        return xmlhttp;\r\n    }\r\n\r\n    aja.xhr = aja.createAjax();\r\n    aja.processHandler = function () {\r\n        if(aja.xhr.readyState == 4) {\r\n            if(aja.xhr.status == 200) {\r\n                aja.resultHandler(aja.xhr.responseText);\r\n            }\r\n        }\r\n    }\r\n\r\n    aja.get = function (tarUrl, callbackHandler) {\r\n        aja.tarUrl = tarUrl;\r\n        aja.resultHandler = callbackHandler;\r\n        aja.xhr.onreadystatechange = aja.processHandler;\r\n        aja.xhr.open(''get'', aja.tarUrl, true);\r\n        aja.xhr.send();\r\n\r\n    }\r\n\r\n    aja.post = function (tarUrl, postString, callbackHandler) {\r\n        aja.tarUrl = tarUrl;\r\n        aja.postString = postString;\r\n        aja.resultHandler = callbackHandler;\r\n        aja.xhr.onreadystatechange = aja.processHandler;\r\n        aja.xhr.open(''post'', aja.tarUrl, true);\r\n        aja.xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");\r\n        aja.xhr.send(aja.postString);\r\n    }\r\n    return aja;\r\n}\r\n</pre>\r\n<br>', 'wssgcg1213', 1, '2013-12-09 18:25:06', 'code', 'code|life', 0);
INSERT INTO `B_posts` VALUES(4, '光电对体院篮球赛', '才输了20分,挺好的.....<br>\r\n没想到咱学院还是挺强的嘛<br>\r\n(至少干掉了人口比我们多的那几个学院)<br>\r\n<br>', 'wssgcg1213', 1, '2013-12-09 19:14:23', 'life', 'life', 0);
INSERT INTO `B_posts` VALUES(5, 'Keyframes小记', 'css3keyframes<br>\r\n名字跟FLASH的关键帧挺像,功能其实嘛也是差不多滴→_→<br>\r\n<br>\r\n相关的私有属性:<br>\r\n@-webkit-keyframes<br>\r\n@-moz-keyframes<br>\r\n@-o-keyframes<br>\r\n<br>\r\n注意点:<br>\r\n#IE10+呵呵<br>\r\n#有些浏览器只识别放在css末尾的keyframes<br>\r\n#Mac下的safari7貌似识别不带webkit前缀的写法<br>\r\n#小米内置浏览器(webkit)不支持类似如下写法:<br>\r\n>>>0%{width:10%}<br>\r\n>>>100%{width:100px}<br>\r\n-----<br>', 'wssgcg1213', 1, '2013-12-16 00:22:15', 'code', '前端|全端|code', 0);
INSERT INTO `B_posts` VALUES(6, '一个前端渣渣的小小结', '<h1>A Summary</h1>\r\n<h2 class="hr">0x00</h2>\r\n<p>大学也已经过去一个学期了，其实生活本来也就那么平淡无奇，直到在红岩遇到那么一帮逗逼←_←</p>\r\n<p>say how，本来也是想着认识大神的心态来的网校，嘛,的确也是认识了很多能力很强的人(太多懒得写你们名字了0.0)</p>\r\n<h2 class="hr">0x01</h2>\r\n<p>原来很早就接触互联网的东西，初三毕业就觉得自己建个网站还挺有意思的，于是就开始傻瓜建站，刚开始也是什么都不懂,还是冲动下买了域名和服务器，几个月时间泡在电脑面前从早坐到半夜，虽然那个时候的激情到现在也早不回来了,不过回忆还是蛮不错的> <。由于接触最早的是wordpress，所以html/css+php也还算是看过一些，不过没有系统地学的关系,各方面都是个半吊子,这也算是''全端''了，实现过很多看上去很绚的东西(CSS3/HTML5)，也差不多是在那个时候对>>>前端<<<产生了一种特殊的感情⊙▽⊙</p>\r\n<h2 class="hr">0x02</h2>\r\n<p>高三暂停了一年←_←毕业之后，一时热血做了<a href="http://class10.treeforests.com/">http://class10.treeforests.com/</a> 这个班级通讯录，大概从这里才开始系统地学习php&w3c标准的东西，也应该差不多是在这个时候知道了重邮还有一个叫红岩网校的东西←_←</p>\r\n<h2 class="hr">0x03</h2>\r\n<p>算了懒得讲历史了</p>\r\n<p>红岩对我来说意义还是比较大的</p>\r\n<p>至少对于我在这个学校，这个我并不喜欢的专业之上</p>\r\n<p>令我有了一个值得追求的东西</p>\r\n<p>进入红岩之后，我也是有了一个环境，逼自己去学更多的东西，想想学了点什么</p>\r\n<p>算是略系统地看了W3C标准</p>\r\n<ul>\r\n	<li>(X)HTML(3/5)</li>\r\n	<li>CSS(3)</li>\r\n	<li>++{LESS}</li>\r\n	<li>JavaScript(ECMA5)</li>\r\n	<li>++Sea.js(了解了它的模块加载机制)</li>\r\n	<li>++jQuery(之前略微看过一点它的$和anime，不怎么熟)</li>\r\n	<li>++Prototype.js(只是了解，对很多方法进行了封装，用时还是要查手册)</li>\r\n	<li>++了解Ajax机制(封装了一个简陋的类)</li>\r\n	<li>什么什么什么还有什么忘记了</li>\r\n	<li>webstorm，enmet，jsdoc注释，js_namespace习惯</li>\r\n	<li>还有很多前端框架等等等等</li>\r\n</ul>+\r\n<p>对了，还写了一些东西…</p>\r\n<p>--------</p>\r\n<p></p>\r\n\r\n<p><a href="http://test.treeforests.com/">http://test.treeforests.com/</a>\r\n在暑假边学边仿的一个wordpress主题，感觉提升很大(好不好看就由看官决定了- -！)</p>\r\n\r\n<p><a href="http://treeforests.sinaapp.com/">http://treeforests.sinaapp.com/</a>\r\n刚开学那会用新浪api做的自制版新浪微博(我喜欢我的小尾巴)</p>\r\n\r\n<p><a href="http://sms.treeforests.com/">http://sms.treeforests.com/</a>\r\n很邪恶的东西←_←自己玩</p>\r\n\r\n<p><a href="http://gp.treeforests.com/">http://gp.treeforests.com/</a>\r\n热血上头，花了两个通宵做的php+mysql+手工前端的博客。也就你现在看到的这个东西- -...\r\n准备寒假作业就玩这个了，给它加上很多功能，做成一个类似typecho的轻型博客程序⊙ω⊙</p>\r\n\r\n<p><a href="http://test.treeforests.com/superman/">http://test.treeforests.com/superman/</a>\r\n一个帮别人做的小游戏，调bug花了很久。</p>\r\n\r\n<p><a href="http://test.treeforests.com/homework/music/">http://test.treeforests.com/homework/music/</a>\r\nMusuc播放器，我最喜欢的←_←，因为每个元素都是1px地调位置，感觉还是挺好看的，差不多能以假乱真吧哈哈哈！</p>\r\n\r\n\r\n<h2 class="hr">0x04</h2>\r\n<p>寒假回去感觉有很多东西需要提升，自己太弱了，这点在做东西的时候感觉尤为深。什么时候能够不依赖搜索引擎，手工完成一个大型项目的开发，我也算是在这一方面达到自己的目标了。</p>\r\n<ul>\r\n	<li>+好好地把JS权威指南看完</li>\r\n	<li>+看css权威指南</li>\r\n	<li>+响应式布局</li>\r\n	<li>+html5 api应用实践</li>\r\n	<li>+多了解一些js库</li>\r\n	<li>+完成一个project(也就是gp了)</li>\r\n</ul>\r\n<p>EOF.</p>', 'wssgcg1213', 1, '2013-12-28 17:50:22', 'life', '前端|全端', 0);
INSERT INTO `B_posts` VALUES(7, 'Apache的Mod_Rewrite模块做伪静态笔记', '<pre>\r\n<IfModule mod_rewrite.c>\r\nRewriteEngine On\r\nRewriteBase /\r\nRewriteRule ^index\\.php$ - [L]\r\nRewriteCond %{REQUEST_FILENAME} !-f\r\nRewriteCond %{REQUEST_FILENAME} !-d\r\nRewriteRule ^index\\.html$    index\\.php [L]\r\n#RewriteRule post\\.php\\?p=([0-9]+) 	$1\\.html [R=301]\r\nRewriteRule ^([\\w]+)\\.html$		post\\.php\\?p\\=$1 [L]\r\nRewriteRule ^([\\w]+)$	$1\\.html  [L,R=301]\r\nErrorDocument 404 /404.php\r\n</IfModule>\r\n</pre>\r\n<p>RewriteEngine On	表示开启重写模块</p>\r\n<p>RewriteBase /		设置作用域</p>\r\n<p>RewriteCond		是一个filter,符合条件的uri才会应用规则</p>\r\n<p>RewriteRule [正则匹配URI] [重写URI地址,$N表示后向引用] [flags,逗号分割,L:结束;NC:不区分大小写;R=301:301重定向]</p>', 'wssgcg1213', 1, '2014-01-23 22:29:17', 'code', 'apache|伪静态', 0);
INSERT INTO `B_posts` VALUES(8, '挖了个小坑→_→B_vote', '搞了个通用的投票系统<br>\r\n什么!果然取名最麻烦了><干脆就叫B_vote好了...<br>\r\n主要就是解决各种刷票问题→_→(求破解)<br>\r\n前端用了bootstrap3.0.3(果然框架就是好看,兼容性都不用调,方便啊)<br>\r\n后台还是老掉牙php+mysql(臣妾不会其它的呀)<br>\r\n各种代码互嵌 混乱不堪(能用就好→_→)<br>\r\n防刷票采用 验证码+cookie+session+mysql记录IP的方式(大概我已经想到破解方法了,要是能够得到M.A.C地址就棒了,可是HTTP1.1都不带这个TvT)<br>\r\n先挂个测试站上去hiahia   <a href="http://test.treeforests.com/vote/">http://test.treeforests.com/vote/</a>\r\n<br><br>', 'wssgcg1213', 1, '2014-01-24 01:45:43', 'code', 'vote|php|mysql', 0);
INSERT INTO `B_posts` VALUES(9, 'Regular Expressions', 'OH NO 又给自己埋了一个大坑,不过亚马逊的速度不得不赞一个,全国不管在哪都这么快~正则表达式到了还是慢慢学> < <br>\r\n已经好久没看JS权威指南了, 枉我这么重把它从CQ拖过来, 那么就明天开始啃书把(→_→如何如何) <br>\r\n\r\n<a href="http://wssgcg1213.qiniudn.com/IMG_20140124_170423.jpg-800"><img src="http://wssgcg1213.qiniudn.com/IMG_20140124_170423.jpg-800"></a>', 'wssgcg1213', 1, '2014-01-24 18:58:13', 'code', '前端|全端|正则', 0);
INSERT INTO `B_posts` VALUES(10, '一下午写了个CoverFlow', '<p>https://github.com/wssgcg1213/Coverflow</p>\r\n<p><a href="https://github.com/wssgcg1213/Coverflow" alt="Fork Me At GitHub">Fork Me At GitHub</a></p>\r\n<p><a href="http://test.treeforests.com/coverflow">DEMO</a></p>\r\n\r\n<p>A beautiful gallery modelled after Apple&#39;s CoverFlow.<br>Built on Flat-UI based on Bootstraps<br>Built on slimbox2 based on jQuery (1.8.3)<br>Using js(jQ)/HTML5/CSS3  </p>\r\n</blockquote>\r\n<p><img src="http://wssgcg1213.qiniudn.com/QQ20140204-1.png" alt="Screenhot"></p>\r\n<h2 id="display-5-images">Display 5 Images</h2>\r\n<blockquote>\r\n<p>width: 730px;\r\nheight: 480px;</p>', 'wssgcg1213', 1, '2014-02-04 20:29:29', 'code', '前端,coverflow,js,jQ', 0);

-- --------------------------------------------------------

--
-- 表的结构 `B_term`
--

CREATE TABLE `B_term` (
  `term_id` int(10) NOT NULL,
  `term_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `term_slug` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `term_name` (`term_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `B_term`
--

INSERT INTO `B_term` VALUES(1, 'Code', 'code');
INSERT INTO `B_term` VALUES(2, '前端', '%e5%89%8d%e7%ab%af');
INSERT INTO `B_term` VALUES(3, 'Life', 'life');
INSERT INTO `B_term` VALUES(4, '全端', '%E5%85%A8%E7%AB%AF');
INSERT INTO `B_term` VALUES(5, '正则', '%E6%AD%A3%E5%88%99');
INSERT INTO `B_term` VALUES(6, 'vote', 'vote');
INSERT INTO `B_term` VALUES(7, 'php', 'php');
INSERT INTO `B_term` VALUES(8, 'mysql', 'mysql');

-- --------------------------------------------------------

--
-- 表的结构 `B_term_relationships`
--

CREATE TABLE `B_term_relationships` (
  `object_id` int(10) unsigned NOT NULL,
  `term_taxonomy_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`object_id`,`term_taxonomy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `B_term_relationships`
--

INSERT INTO `B_term_relationships` VALUES(6, 3);
INSERT INTO `B_term_relationships` VALUES(8, 1);
INSERT INTO `B_term_relationships` VALUES(8, 6);
INSERT INTO `B_term_relationships` VALUES(8, 7);
INSERT INTO `B_term_relationships` VALUES(8, 8);
INSERT INTO `B_term_relationships` VALUES(9, 1);
INSERT INTO `B_term_relationships` VALUES(9, 2);
INSERT INTO `B_term_relationships` VALUES(9, 4);
INSERT INTO `B_term_relationships` VALUES(9, 5);
INSERT INTO `B_term_relationships` VALUES(9, 6);

-- --------------------------------------------------------

--
-- 表的结构 `B_term_taxonomy`
--

CREATE TABLE `B_term_taxonomy` (
  `term_taxonomy_id` int(10) unsigned NOT NULL,
  `term_id` int(10) unsigned NOT NULL,
  `taxonomy` varchar(200) CHARACTER SET latin1 NOT NULL,
  `count` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id` (`term_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `B_term_taxonomy`
--

INSERT INTO `B_term_taxonomy` VALUES(1, 1, 'category', 1);
INSERT INTO `B_term_taxonomy` VALUES(2, 2, 'tag', 1);
INSERT INTO `B_term_taxonomy` VALUES(3, 3, 'category', 1);
INSERT INTO `B_term_taxonomy` VALUES(4, 4, 'tag', 1);
INSERT INTO `B_term_taxonomy` VALUES(5, 5, 'tag', 1);
INSERT INTO `B_term_taxonomy` VALUES(6, 6, 'tag', 2);
INSERT INTO `B_term_taxonomy` VALUES(7, 7, 'tag', 1);
INSERT INTO `B_term_taxonomy` VALUES(8, 8, 'tag', 1);

-- --------------------------------------------------------

--
-- 表的结构 `B_user`
--

CREATE TABLE `B_user` (
  `username` varchar(20) DEFAULT NULL,
  `password` text NOT NULL,
  `authority` int(1) DEFAULT NULL,
  `UID` int(5) NOT NULL,
  `regtime` datetime NOT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `posts` int(11) DEFAULT '0',
  `comments` int(11) DEFAULT '0',
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 导出表中的数据 `B_user`
--

INSERT INTO `B_user` VALUES('username', '__md5edPassWorD__', 6, 1, '2013-12-07 00:12:03', '2013-12-07 00:12:07', 1, 0);
