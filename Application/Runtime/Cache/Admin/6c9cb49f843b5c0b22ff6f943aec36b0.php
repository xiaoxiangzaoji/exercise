<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>多级联动</title>
	 <script src="/Public/jquery-3.2.1.min.js"></script>  
</head>
<body>
<script>
function Changepro(){
    $.ajax({
        type:"post",
        url:"<?php echo U('Admin/Good/goodslist');?>",
        data:'pro_id='+$('#pro').val(),
        dataType:"json",
        success:function(data){
            console.log(data);
            $('#city').html(data);
        }
    });
}
function Changecity(){
    $.ajax({
        type:"post",
        url:"<?php echo U('Admin/Good/goodslist');?>",
        data:'city_id='+$('#city').val(),
        dataType:"json",
        success:function(data){
            console.log(data);
            $('#area').html(data);
        }
    });
}
</script>
<!-- 省份 -->
    <select name="pro" id="pro" onChange="Changepro();">
    	<option>--请选择省市-</option>
    	<?php foreach ($region as $key => $value): ?>	
        	<option value="<?php echo ($value['provinceid']); ?>"><?php echo ($value['province']); ?></option>
        <?php endforeach ?>
    </select>
<!-- 城市 -->
    <select name="city" id="city" onChange="Changecity();">
    	<option>--请选择市区--</option>
    </select>
<!-- 区县 -->
    <select name="area" id="area">
        <option>请选择区域</option>
    </select>
</body>
</html>