<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/Public/Admin/bootstrap/css/bootstrap.min.css" />
	<script src="/Public/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css"  href="/Public/Admin/css/style.css"/>

</head>
<body>
<style>
	li{list-style:none;float:left;margin-left:20px;}
	a{margin-right: 0px}
</style>
<script>
//创建一个input框传id
function update(id){
	var levelid = document.createElement("input");
	levelid.type = 'text';
	levelid.id = 'level_id';
	levelid.value = id;
	levelid.style.display = 'none';
	var obj = document.getElementById('feileiming');
	obj.appendChild(levelid);
	//把分类名传过来
    $('.login').show();
}
//关闭功能
function closes(){
	$('#level_id').remove();
    $('.login').hide();
}
//删除功能
function del_goodlevel(obj,id){
	var confirm_ = confirm('你确定删除这条数据吗？');
	 if(confirm_){
	 	$.get("index.php?s=/Admin/Good/del_goodlevel&id="+id,function(data,status){
			if(data=2){
				$(obj).parent().parent().remove();
				window.location.reload();
			}else{
				alert('删除失败');
			}
		});
	}
}
//提交表单增加分类
$(document).ready(function(){
	$('#submit').click(function(){
		var str1 = $("#levels").val();
		var str = $("#levelname").val();
		if (str.length == '') {
			alert('不能为空');
			return false;
		};
		//alert(str1);
		$.ajax({
			type:'post',
			url:'index.php?m=Admin&c=Good&a=add_goodlevel',
			data:{'levelname':str,'parent_id':str1},
			dataType:'json',
			success:function(data){
				window.location.reload();
                return;
			}
		})
	});
//修改功能
	$("#updatesubmit").click(function(){
		var levelid = $("#level_id").val();
		var level = $("#levelsname").val();
		var obj = document.getElementsByName("status");
		for(var i=0; i<obj.length; i ++){
	        if(obj[i].checked){
	            var status = obj[i].value;
	        }
    	}
    	$.ajax({
    		type:'post',
    		url:'index.php?m=Admin&c=Good&a=update_level',
    		data:{'level_name':level,'status':status,'id':levelid},
    		success:function(data){
    			if (data == 2){
    				window.location.reload();
    				return;
    			};
    		}
    	})
		$('.login').hide();
	})
});
</script>
	<div class="login">
		<form  id="alterlevel">
	    <div class="login-title">修改分类<span><a href="javascript:void(0);" onclick="closes();">关闭</a></span></div>
	    <div class="login-input-content">
	        <div class="login-input">
	            <label id="feileiming">分&nbsp;类&nbsp;名：</label>
	            <input type="text" placeholder="请输入分类名"  name="level_name" id="levelsname" class="list-input"/>
	        </div>
	        <div class="login-input">
	        	<ul>
	        	<li><label>状态：</label></li>
	            <li><input type="radio" name="status" value="1" />激活</li>
	            <li><input type="radio" name="status" value="0" style="margin-left:20px;margin-top:10px;"/>禁止</li>
	           	</ul>
	        </div>
	    </div>
	    <div class="login-button"><a href="javascript:void(0);" id="updatesubmit">确定</a></div>
	    </form>
	</div>

	<table class="table table-bordered">
		<tr >
			<th>id</th>
			<th>分类名称</th>
			<th>状态</th>
			<th>操作</th>
		</tr>
		<?php foreach ($row as $key => $value): ?>
		<tr class="success">
			<td><?php echo ($value["id"]); ?></td>
			<td>
				<?php echo ($value["level_name"]); ?>
			</td>
			<td><?php echo $value['status'] == 1?激活:禁止;?></td>
			<td><i class=" icon-pencil" onclick="update(<?php echo ($value["id"]); ?>);"></i>|<i class="icon-trash" onclick="del_goodlevel(this,<?php echo ($value["id"]); ?>)"></i></td>
		</tr>
		<?php endforeach ?>
	</table>
	<?php echo $page_show; ?>
	<br />
	<hr />
	<div style="width:200px;height:160px;margin-left:20px;">
	<form id ="level">
		<label for="">上级类别:</label>
		<select name="parent_id" id="levels">
			<option value="0" >顶级分类</option>
			<?php foreach ($result as $key => $value): ?>
				<option value="<?php echo ($value["id"]); ?>">
					<?php $str = ''; ?>
					<?php for($i=0; $i< $value['level'];$i++):?>
						<?php  $str.='&nbsp;&nbsp;&nbsp;';?>
					<?php endfor; ?>
					<?php echo $str; ?>
					<?php echo ($value["level_name"]); ?></option>
			<?php endforeach ?>
		</select>
		<label for="">类别名称:</label>
		<input type="text" id="levelname" name="name"/>
		<input type="button" value="确定" id="submit"/>
	</form>
	</div>
</body>
</html>