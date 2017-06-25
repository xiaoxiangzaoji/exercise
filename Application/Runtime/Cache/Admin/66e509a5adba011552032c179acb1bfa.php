<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/Public/Admin/bootstrap/css/bootstrap.min.css" />
	<script src="/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
	<style>
	#info{margin-left: 4%;}
	</style>
</head>
<body>
	<div id="info">
		<p>个人中心</p>
		<form action="" method="post">
			<div class="input-prepend">
			  <span class="add-on">姓名</span>
			  <input class="span2" id="prependedInput" type="text" placeholder="Username" value="<?php echo ($result[username]); ?>">
			</div><br/>
			<div class="input-prepend">
			  <span class="add-on">密码</span>
			  <input class="span2" id="prependedInput" type="password" placeholder="Password" value="<?php echo ($result[password]); ?>">
			</div>
			<div class="input-prepend">
				<button class="btn btn-primary" type="button" onClick=window.location.href="<?php echo U('Admin/Login/alterpassword');?>";>修改密码</button>
			</div><br/>

			<div class="input-prepend">
			  <span class="add-on">邮箱</span>
			  <input class="span2" id="prependedInput" type="text" placeholder="Email" value="<?php echo ($result[email]); ?>">
			</div><br/>
			<div class="input-prepend">
			  	<p class="add-on" style="margin-top:30px;float:left;">头像</p>
			  	<div id="preview" style="float:left;height:70px;">
			  		<img src="<?php echo ($result[headimg]); ?>" class="img-circle" style="max-width: 30%;margin-left: 12%;width:146px;height:85px;">
			  	<button class="btn btn-primary" type="button" style="margin: 20px 25px;" onClick=window.location.href="<?php echo U('Admin/Login/alterheadimg');?>";>修改头像</button>
				</div>
				
			</div>
		</form>
	</div>
</body>
</html>