<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/Public/Admin/bootstrap/css/bootstrap.min.css" />
	<script src="/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<table class="table table-bordered">
	  <caption>会员信息表</caption>
	  <thead>
	    <tr class="success">
<style>
li{list-style:none;float:left;margin-left:20px;}
.hwh-page-info a{color: #CCC;}
.hwh-page-info a em{font-style: normal;margin: 0 2px;}
</style>
	      <th style="text-align:center;">id</th>
	      <th style="text-align:center;">会员名</th>
	      <th style="text-align:center;">登录次数</th>
	      <th style="text-align:center;">最后登录</th>
	      <th style="text-align:center;">账户余额</th>
	      <th style="text-align:center;">会员级别</th>
	      <th style="text-align:center;">登录</th>
	      <th style="text-align:center;">操作</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach ($list as $key => $val): ?>
	    <tr class="success">
	      <td style="text-align:center;"><?php echo ($val["id"]); ?></td>
	      <td style="text-align:center;"><?php echo ($val["merber_name"]); ?></td>
	      <td style="text-align:center;"><?php echo ($val["login_number"]); ?></td>
	      <td style="text-align:center;"><?php echo ($val["last_login_ip"]); ?>
  		  </td>
  		  <td style="text-align:center;"><?php echo ($val["balance"]); ?></td>
  		  <td style="text-align:center;"><?php echo ($val["sort"]); ?></td>
  		  <td style="text-align:center;">
  		  	<?php echo $val['is_login']=1?允许:禁止;?>		
		  </td>
  		  <td style="text-align:center;"><a href="#"><i class=" icon-pencil"></i></a>|<a href="#"><i class="icon-trash"></i></a></td>
	    </tr>
	    <?php endforeach; ?>
	  </tbody>
	</table>
	 <?php echo $page_show; ?>
</body>
</html>