<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登陆</title>
	<!-- <link rel="stylesheet" id="buttons-css" href="/qzas/Public/Admin/css/buttons.css" type="text/css" media="all"> -->
	<!-- <link rel="stylesheet" id="dashicons-css" href="/qzas/Public/Admin/css/dashicons.css" type="text/css" media="all"> -->
	<link rel="stylesheet" href="/qzas/Public/Admin/css/login.css" type="text/css">
</head>
<body>
	<div class="loginform">
		<form action="<?php echo U('Admin/Index/verify_user');?>" method="POST">
			用户名<br><input type="text" class="username" name="username" placeholder="用户名"><br>
			密码<br><input type="password" class="pwd" name="pwd" placeholder="密码"><br>
			<input type="submit" class="submit" value="登陆"><br>
			<!-- <a class="register" href="<?php echo U('Index/register');?>">注册</a> -->
		</form>
	</div>
<!-- 	<div id="login">
		<h1><a href="/qzas" >QZAS</a></h1>
	
		<form name="loginform" id="loginform" action="<?php echo U('Admin/Index/verify_user');?>" method="post">
			<p>
				<label for="username">用户名<br>
				<input name="username" id="username" class="input" value="admin" size="20" type="text"></label>
			</p>
			<p>
				<label for="password">密码<br>
				<input name="password" id="password" class="input" value="" size="20" type="password"></label>
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
</p> -->
<script type="text/javascript">
	// function wp_attempt_focus(){
	// 	setTimeout( function(){ 
	// 		try{
	// 			d = document.getElementById('user_login');
	// 			d.focus();
	// 			d.select();
	// 			} catch(e){}
	// 	}, 200);
	// }
	// wp_attempt_focus();
	// if(typeof wpOnload=='function')wpOnload();
</script>
</body>
</html>