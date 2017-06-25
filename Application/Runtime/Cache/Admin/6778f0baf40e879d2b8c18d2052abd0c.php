<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/Public/Admin/bootstrap/css/bootstrap.min.css" />
	<script src="/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
	<script src="/Public/jquery-3.2.1.min.js">></script>
</head>

<style type="text/css">
body { font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; font-size: 14px;height:100%;background:#a7bf8b;}
dl { width: 300px; }
dl,dd { margin: 0; }
dt { background-color:#41b16e;  background-repeat:no-repeat; background-position:5px 13px; font-size: 14px; padding: 5px 5px 5px 20px; margin: 2px; height:29px; line-height:28px; }
dt a { color: black; text-decoration:none; }
dd a { color: #000; }
ul{ list-style: none; padding:5px 5px 5px 20px; margin:0; }
li{ line-height:24px;}
.bg{ background-position:5px -16px;}
</style>
<!-- <script type="text/javascript" src="jquery-1.6.2.min.js"></script> -->
<script type="text/javascript">
$(document).ready(function(){
 $("dd").hide();
 $("dt a").click(function(){
 $(this).parent().toggleClass("bg");
 $(this).parent().prevAll("dt").removeClass("bg")
 $(this).parent().nextAll("dt").removeClass("bg")
 $(this).parent().next().slideToggle();
 $(this).parent().prevAll("dd").slideUp("slow");
 $(this).parent().next().nextAll("dd").slideUp("slow");
 return false;
 });
});
</script>
</head>
<body>
<dl>
 <dt><a href="#"><i class=" icon-th"></i>商品管理</a></dt>
 <dd>
 <ul>
  <li><a href="#">商品列表</a></li>
  <li><a href="<?php echo U('Admin/Good/add_goods');?>" target="main">添加新商品</a></li>
  <li><a href="<?php echo U('Admin/Good/good_level');?>" target="main">商品分类</a></li>
  <li><a href="<?php echo U('Admin/Customer/evaluate');?>" target="main">用户评论</a></li>
  <li><a href="#">商品回收站</a></li>
  <li><a href="#">库存管理</a></li>
 </ul>
 </dd>
 <dt><a href="#"><i class="  icon-list-alt"></i>订单管理</a></dt>
 <dd>
 <ul>
  <li><a href="#">订单列表</a></li>
  <li><a href="#">合并订单</a></li>
  <li><a href="#">订单打印</a></li>
  <li><a href="#">添加订单</a></li>
  <li><a href="#">发货单列表</a></li>
  <li><a href="#">换货单列表</a></li>
 </ul>
 </dd>
 <dt><a href="#"><i class=" icon-user"></i>会员管理</a></dt>
 <dd>
 <ul>
  <li><a href="<?php echo U('Admin/Member/mermber_info');?>" target="main">会员列表</a></li>
  <li><a href="<?php echo U('Admin/Member/level_list');?>" target="main">会员级别</a></li>
  <li><a href="#">积分管理</a></li>
 </ul>
 </dd>

 <dt><a href="#"><i class="  icon-cog"></i>系统设置</a></dt>
 <dd>
 <ul>
  <li><a href="#">数据备份</a></li>
  <li><a href="#">网站设计</a></li>
  <li><a href="<?php echo U('Admin/System/permission_list');?>" target="main">权限管理</a></li>
  <li><a href="<?php echo U('Admin/System/role_list');?>" target="main">角色管理</a></li>
  <li><a href="<?php echo U('Admin/System/admin_member');?>" target="main">管理员管理</a></li>
 </ul>
 </dd>
</dl>
</body>

</html>