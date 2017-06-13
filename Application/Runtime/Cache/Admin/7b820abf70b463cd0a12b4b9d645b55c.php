<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title></title>
	<link rel="stylesheet" href="/Public/Admin/bootstrap/css/bootstrap.min.css" />
	<script src="/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
	<script src="/Public/jquery-3.2.1.min.js"></script>
<style>
	li{list-style:none;float:left;margin-left:20px;}
	.url{margin:10px;}
</style>
<script>
function del_perssion(obj,id){

	var confirm_ = confirm('你确定删除这条数据吗？');
	 if(confirm_){
	 	$.get("index.php?s=/Admin/System/del_role&id="+id,function(data,status){
			if(data=2){
				$(obj).parent().parent().remove();
			}else{
				alert('删除失败');
			}
		});
	}
}
	$(document).ready(function(){

	$("#adds").click(function(){
	  $("#form1").toggle();
	});
	$("#sub").click(function(){
        var str = $('#level').val();
        
        if (str == '') {
            alert('不能为空');
            return false;
        }
        $.ajax({
            type:'post',
            url:'index.php?m=Admin&c=System&a=add_role',
            data:{'permission':str},
            cache:false,
            dataType:'json',
            success:function(data){
                console.log(data);
				window.location.reload();
                return;
            }
        });
    });
});
</script>
</head>
<body>
	<table class="table table-bordered">
		<tr>
			<th>ID</th><th>管理员级别</th><th>权限分配</th><th>操作</th>
		</tr>
		<?php foreach ($list as $key => $value): ?>
		<tr class="success">
			<td><?php echo ($value["id"]); ?></td>
			<td><?php echo ($value["role_name"]); ?></td>
			<td><a href="<?php echo U('Admin/System/distribute',array('id'=>$value['id']));?>">分配权限</a></td>
			<td><i class=" icon-pencil" ></i>|<i class="icon-trash" onclick="del_perssion(this,<?php echo ($value["id"]); ?>)"></i></td>
		</tr>
		<?php endforeach ?>
	</table>
	<ul>
		<li><button class="btn btn-primary" type="button" id="adds">添加管理员级别</button></li>
		<li style="display:none;" id="form1">
			<div style="background:#a7bf8b;border-radius:10px;">
				<form id="form2">
				  <fieldset>
				   <div class="url">
					   	<label style="float:left;">管理员级别:</label>
					    <input type="text" placeholder="请填写" name="permission" id="level">
				    </div>
                    <input type="button" id="sub" value="确定">
				  </fieldset>
				</form>
			</div>
		</li>
	</ul>
</body>
</html>