<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
</head>
<body>
	<form action="<?php echo U('Admin/Index/add_user');?>" method="POST">
		<input type="text" name="username" placeholder="用户名">
		<input type="password" name="pwd" placeholder="密码">
		<input type="submit" value="注册">
	</form>
</body>
</html>



<!DOCTYPE html>
<!--[if IE 8]>
		<html xmlns="http://www.w3.org/1999/xhtml" class="ie8" lang="zh-CN">
	<![endif]-->
<!--[if !(IE 8) ]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><!--<![endif]--><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>站点标题 › 登录</title>
	
	<meta name="robots" content="noindex,follow">
	</head>
	<body class="login login-action-login wp-core-ui  locale-zh-cn">
	<div id="login">
		<h1><a href="https://cn.wordpress.org/" title="基于WordPress" tabindex="-1">站点标题</a></h1>
	
<form name="loginform" id="loginform" action="http://192.168.0.88/wordpress/wp-login.php" method="post">
	<p>
		<label for="user_login">用户名<br>
		<input name="log" id="user_login" class="input" value="admin" size="20" type="text"></label>
	</p>
	<p>
		<label for="user_pass">密码<br>
		<input name="pwd" id="user_pass" class="input" value="" size="20" type="password"></label>
	</p>
		<p class="forgetmenot"><label for="rememberme"><input name="rememberme" id="rememberme" value="forever" type="checkbox"> 记住我的登录信息</label></p>
	<p class="submit">
		<input name="wp-submit" id="wp-submit" class="button button-primary button-large" value="登录" type="submit">
		<input name="redirect_to" value="http://192.168.0.88/wordpress/wp-admin/" type="hidden">
		<input name="testcookie" value="1" type="hidden">
	</p>
</form>

<p id="nav">
	<a href="http://192.168.0.88/wordpress/wp-login.php?action=lostpassword" title="找回密码">忘记密码？</a>
</p>

<script type="text/javascript">
function wp_attempt_focus(){
setTimeout( function(){ try{
d = document.getElementById('user_login');
d.focus();
d.select();
} catch(e){}
}, 200);
}

wp_attempt_focus();
if(typeof wpOnload=='function')wpOnload();
</script>

	<p id="backtoblog"><a href="http://192.168.0.88/wordpress/" title="不知道自己在哪？">← 回到站点标题</a></p>
	
	</div>

	
		<div class="clear"></div>
	
	
	<div id="xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd"></div></body></html>