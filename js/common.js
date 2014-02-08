//JavaScript By B1ackRainFlake

console.log("我就%c喜欢%c在这里输出点什么- -....","color:red","color:black");
console.log("觉得有什么建议的QQ:%c3631309O1...","font-size:25px");

//
//
//
//

var d = document;
function $(id){return d.getElementById(id);}

Element.prototype.addEvent = function (method, callback, isCapture) {
	isCapture = isCapture? true : false;
	if(window.addEventListener){
		return this.addEventListener(method, callback, isCapture);
	}else{
		return this.attachEvent(method, callback, isCapture);
	}
}

/**
 * [_reachBottom 判断是否到达底部]
 * @return {[blooen]}
 */
function _reachBottom(){
	var scrollTop = 0,
	    clientHeight = 0,
	    scrollHeight = 0;
	if (document.documentElement && document.documentElement.scrollTop) {
	    scrollTop = document.documentElement.scrollTop;
	} else if (document.body) {
	    scrollTop = document.body.scrollTop;
	}
	clientHeight =  document.documentElement.clientHeight;
	scrollHeight = Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
	return (scrollTop + clientHeight >= scrollHeight);
}

function loading(title){
		console.log(title);
		title.innerHTML = "<span>正</span>在使用吃奶的力气加载中→_→...";

}

try{
	setTimeout(function(){document.body.style.opacity = 1;}, 500);   //加载超过0.5秒的时候显示界面....
}catch(e){
	throw "Great,页面加载时间Less than 500ms!";
}

window.onload = function(){
	document.body.style.opacity = 1;
	
	var closeForm = function(){
		$("loginForm").style.opacity = "0";
		$("flow").style.opacity = "0";
		setTimeout(function(){$("flow").style.display = ""},400);
		setTimeout(function(){$("loginForm").style.display = "none"},400);
		setTimeout(function(){$("flow").style.opacity = ""},400);
		setTimeout(function(){flow.className = "flow";},400);
	};

	var loginSub = function(){
		var login = new Ajax();
		var loginUser = d.getElementsByName("username")[0].value;
		var loginPwd = d.getElementsByName("pwd")[0].value;
		if(!loginUser){
			alert("请输入帐号→_→!");
			return
		}else if(!loginPwd){
			alert("请输入密码→_→!");
			return
		}
		var loginCallback = function(res){
			res = JSON.parse(res);
			switch (res.code){					
				case -1:
						alert("帐号或密码错误.! - -..");
						d.getElementsByName("username")[0].value = "";
						d.getElementsByName("pwd")[0].value = "";
						break;
				case -2:
						alert("数据库出问题了.! - -..叫大神来修把..");
						location.reload();
						break;
				case 1:
						alert("Welcome back," + res.user + "!");
						location.reload();
						break;
				default:
						location.reload();
						break;
			}
		}
		login.post("login.php", "username=" + loginUser + "&pwd=" + loginPwd, loginCallback);
	};

	if($("loginbtn")){
		$("loginbtn").addEvent("click" ,function(){loginSub();} ,false);
	}
	if($("loginOut")){
		$("loginOut").addEvent("click", function(){window.location = "login.php?logOut"} ,false);
	}
	if($("login")){
		$("login").addEvent("click", function(){
			var flow = $("flow");
			var loginForm = $("loginForm");
			loginForm.style.webkitAnimation = "acceleratedReveal 1s ease";
			loginForm.style.animation = "acceleratedReveal 1s ease";
			loginForm.style.opacity = "1";
			flow.className = "flow_show";
			loginForm.style.display = "block";
			flow.style.display = "block";
		}, false);
	}
	if($("close")){
		$("close").addEvent("click" ,closeForm ,false);
	}
	if($("flow"))
	$("flow").addEvent("click" ,closeForm ,false);
}

