<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/Public/Admin/bootstrap/css/bootstrap.min.css" />
	<script src="/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
<style>
#header{background:url('/Public/Admin/image/back.jpg');height:167px;}
img{ height:80px;}
li{float:left;width:80px;height:80px;line-height: 74px;margin-left:20px;}
a{text-decoration:none;width:60px;}
</style>
</head>
<body>

	<div id="header">
		<i class=" icon-th-large" style="float:left;margin-top:30px;margin-left:20px;font-family: cursive;"></i>
		<p style="float:left;margin: 30px;">欢迎系统管理员:<?php echo ($name); ?></p>

		<ul class="nav nav-pills" style="float:left;margin-top:30px;margin-left:12%;">
		  <li><a href="#" >消息中心</a></li>
		  <li><a href="<?php echo U('Admin/Member/mermber_info');?>" target="main">会员管理</a></li>
		  <li><a href="#" >奖金管理</a></li>
		  <li><a href="#" >订单管理</a></li>
		  <li><a href="#" >产品管理</a></li>
		  
		</ul>

		<ul style="list-style:none;height:100px;margin-left: 1100px;margin-top:10px;">
		<li><img class="img-circle" src="<?php echo $result; ?>" alt="logo"/></li>
		<li>
			<span style="text-align:center;">
				<a href="<?php echo U('Admin/Login/myinfo');?>" target="main"><?php echo ($name); ?></a>
			</span></li>
		<li><a href="<?php echo U('Admin/Login/logout');?>" target='_parent'><i class=" icon-off"></i></a></li>

		</ul>
	</div>
</body>
</html>