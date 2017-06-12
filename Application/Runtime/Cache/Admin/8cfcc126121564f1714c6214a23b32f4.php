<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/Public/Admin/bootstrap/css/bootstrap.min.css" />
</head>
<body>
	<!-- <table class="table table-bordered">
		<tr >
			<th>id</th>
			<th>分类名称</th>
			<th>父级分类</th>
			<th>操作</th>
		</tr>
		<?php foreach ($list as $key => $value): ?>
		<tr class="success">
			<td><?php echo ($value["id"]); ?></td>
			<td><?php echo ($value["level_name"]); ?></td>
			<td><?php echo ($value["parent_id"]); ?></td>
			<td>删除修改</td>
		</tr>
		<?php endforeach ?>
	</table> -->
	
				<select name="parent_id" id="level">
					<?php foreach ($list as $key => $value): ?>
					<option value=http://www.ithao123.cn/"0">顶级分类
						<!-- <?php echo ($val['html']); echo ($val["cat_name"]); ?> -->
						<option value="<?php echo ($value["html"]); ?>"><?php echo ($value["level_name"]); ?></option>
					<?php endforeach ?>
				</select>
	<button>添加分类</button>
</body>
</html>