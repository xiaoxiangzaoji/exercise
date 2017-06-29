<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<style>
	body{background: rgb(228, 235, 233);;}
	#div1{margin-bottom: 10px;background: rgba(41, 51, 50, 0.34);}
	.s1{width:120px;}
	#d1{width:100%px;height:100%px;background-color:#F5DEB3;}
	#d2{height:30px;font-size:24px;background-color:blue;color:white;}
	#d3{padding-left:30px;}
</style>
<script src="/Public/Admin/js/jquery-1.4.3.js"></script>
<script src="/Public/Admin/js/lab2.js"></script>
<body>
<script>
$(document).ready(function(){
	$('#click1').click(function(){
		var str = $("#s2 option").map(function(){return $(this).val();}).get().join(", ");
		var str1 = $('#s4').text();

		//alert(str1);
		$.ajax({
            type:'post',
            url:'index.php?m=Admin&c=System&a=add_admin_permission',
            data:{'str':str,'str1':str1},
            cache:false,
            dataType:'json',
            success:function(data){
                console.log(data);
                $("#s2").empty();
				window.location.reload();
				
                return;
            }
        });
	});
	$('#click2').click(function(){
		var options=$("#test option:selected").val();
		var id = $('#s4').text();

		// alert(id);
		$.ajax({
			type:'post',
			url:'index.php?m=Admin&c=System&a=del_role_permission',
			data:{'permission':options,'role_id':id},
			cache:false,
			dataType:'json',
			success:function(data){
				console.log(data);
				$("#test option:selected").remove();
                return;
			}
		})
	});
})
</script>
	<div id="d1">
		<p style="display:none;" id="s4"><?php echo ($role_id); ?></p>
	<div id="d2"><?php echo ($role["role_name"]); ?></div>
	<div id="d3">
		<table cellpadding="0" cellspacing="8">
			<tr>
				<td>所有权限</td>
				<td>&nbsp;</td>
				<td>新增权限</td>
				<td>&nbsp;</td>
				<td>已经拥有的权限</td>
			</tr>
			<tr>
				<td>
					<select id="s1" name="s1" style="width:150px; height:375px;" multiple="multiple">
						<?php foreach ($list as $key => $value): ?>
							<option value="<?php echo ($value["id"]); ?>"><?php echo ($value["per_name"]); ?></option>
						<?php endforeach ?>
					</select>
				</td>
				<td>
					<p><input id="b1" type="button" class="s1" value="--&gt;" /></p>
					<p><input type="button" id="b2" class="s1" value="--&gt;&gt;" /></p>
					<p><input type="button" id="b3" class="s1" value="&lt;--" /></p>
					<p><input type="button" id="b4" class="s1" value="&lt;&lt;--" /></p>
				</td>
				<td>
					<form action="" method="post">
						<select id="s2" name="s2" style="width:150px;height:375px;" multiple="multiple">
						</select>
						<!-- <input id="click1" type="button" value="确定"> -->
					</form>
				</td>
				<td><input id="click1" type="button" value="确定"></td>
				<td>
					<form id="test">
					<select name="s3" id="s3" style="width:150px;height:375px;" multiple="multiple">
 						<?php foreach ($result as $key => $value): ?>
							<option value="<?php echo ($value["pid"]); ?>"><?php echo ($value["per_name"]); ?></option>
						<?php endforeach ?>
					</select>
					</form>
				</td>
				<td><input id="click2" type="button" value="删除"></td>
			</tr>
		</table>
	</div>
	</div>
	<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
	</div>
</body>
</html>