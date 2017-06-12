<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/Public/Admin/bootstrap/css/bootstrap.min.css" />
	<script src="/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
	<script src="/Public/jquery-3.2.1.min.js"></script>
</head>
<style>
	ul{list-style: none;}
	li{float:left;margin-left: 20px;}
</style>
<script type="text/javascript">
function del_level(obj,id){
	var confirm_ = confirm('你确定删除这条数据吗？');
	 if(confirm_){
	 	$.get("index.php?s=/Admin/Member/del_level&id="+id,function(data,status){
			if(data=2){
				$(obj).parent().parent().remove();
			}else{
				alert('删除失败');
			}
		});
	}
}
//显示表单
$(document).ready(function(){

	$("#adds").click(function(){
	  $("#form1").toggle();
	});

    $("#sub").click(function(){
        var str = $('#level').val();
        var str1 = $('#money').val();
        if (str == ''&&str1 =='') {
            alert('不能为空');
            return false;
        }
        $.ajax({
            type:'post',
            url:'index.php?m=Admin&c=Member&a=add_level',
            data:{'level':str,'money':str1},
            cache:false,
            dataType:'json',
            success:function(data){
                console.log(data);
				window.location.reload();
                return;
            }
        });
    });

    //全选
    $("#selectAll").click(function(){
        $("input[name='level']").attr("checked","true");
    });
    //全不选
    $("#unSelect").click(function(){
        $("input[name='level']").removeAttr("checked");
    });
});


//选中所选的删除
function del_() {
  var ids = '';
  $("#sc").each(function() {
    if ($(this).is(':checked')) {
      ids += ',' + $(this).val(); //逐个获取id
    }
  });
  ids = ids.substring(1); // 对id进行处理，去除第一个逗号
  if (ids.length == 0) {
    alert('请选择要删除的选项');
  } else {
    if (confirm("确定删除？删除后将无法恢复。")) {
      url = "action=del_call_record&ids=" + ids;
      $.ajax({
        type: "post",
        url: "send.php",
        data: url,
        success: function(json) {
          if (parseInt(json.counts) > 0) {
            alert(json.des);
            location.reload();
          } else {
            alert(json.des);
          }
        },
        error: function(XMLHttpRequest, textStatus) {
          alert("页面请求错误，请检查重试或联系管理员！\n" + textStatus);
        }
      });
    }
  }
}

</script>
<body>
	<table class="table table-bordered">
	  <caption>会员等级表</caption>
	  <thead>
	    <tr class="success">
	      <th style="text-align:center;width: 2%;">选中</th>
	      <th style="text-align:center;width: 15%;">id</th>
	      <th style="text-align:center;width: 30%;">会员名</th>
	      <th style="text-align:center;width: 30%;">充值的等级</th>
	      <th style="text-align:center;">操作</th>
	    </tr>
	  </thead>
	  <tbody>

	  	<?php foreach ($result as $key => $val): ?>
	    <tr class="success">
	      <td style="text-align:center;"><input type="checkbox" name="level" value="level[]"/></td>
	      <td style="text-align:center;" ><?php echo ($val["id"]); ?></td>
	      <td style="text-align:center;"><?php echo ($val["sort"]); ?></td>
	      <td style="text-align:center;"><?php echo ($val["need_money"]); ?></td>
	      <td style="text-align:center;"><i class=" icon-pencil" ></i>|<i class="icon-trash" onclick="del_level(this,<?php echo ($val["id"]); ?>)"></i></td>
	    </tr>
	    <?php endforeach; ?>
	  </tbody>
	</table>
	<ul>
		<li><input type="button" value="全选" class="btn" id="selectAll" /></li>
		<li><input type="button" value="全不选" class="btn" id="unSelect" /></li>
		<li width="180">
 			<a href="javascript:void(0);" rel="external nofollow" onclick="del_()" id="sc" title="删除选定数据"><button class="btn btn-warning" type="button">删除</button></a>
		</li> 
		<li><button class="btn btn-info" type="button" id="adds">添加级别</button></li>
		<li style="display:none;" id="form1">
			<div style="background:#a7bf8b;border-radius:10px;">
				<form id="form2">
				  <fieldset>
				   <div><label style="float:left;">级别名称</label></div>
				    <input type="text" placeholder="请填写" name="level" id="level"><br/>
				    <div><label style="float:left;">累计充值</label></div>
				    <input type="text" placeholder="请填写" name="money" id="money"><br/>
                      <input type="button" id="sub" value="确定">
				  </fieldset>
				</form>
			</div>
		</li>
	</ul>
</body>
</html>