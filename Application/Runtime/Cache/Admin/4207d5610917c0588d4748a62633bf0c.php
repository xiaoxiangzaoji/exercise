<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <script src="/Public/jquery-3.2.1.min.js"></script>  
    <link rel="stylesheet" href="/Public/Admin/bootstrap/css/bootstrap.min.css" />
    <style type="text/css">
        #div1{width:100%;height:70%;background:rgba(255, 0, 165, 0.05);}
    </style>
</head>
<script type="text/javascript">
    $(document).ready(function() {

        $('#goodsname').focus(function () {
            $('#sign').css("display", 'none');
            $('#goodsname').css("background-color", "#FFFFCC");
        })
        $('#price').focus(function () {
            $('#signs').css("display", 'none');
            $('#price').css("background-color", "#FFFFCC");
        })
        $('#goodsname').blur(function () {
            var gn = $('#goodsname').val();
            if (!gn) {
                $('#sign').text('不能为空');
                $('#sign').css("color", 'red');
                $('#sign').css("border", '0');
                $('#sign').css("display", 'inline');
            }
            $('#goodsname').css("background-color", "#FFFFFF");
        })
        $('#price').blur(function () {
            var gns = $('#price').val();
            if (!gns) {
                $('#signs').text('不能为空');
                $('#signs').css("color", 'red');
                $('#signs').css("border", '0');
                $('#signs').css("display", 'inline');
                $('#price').css("background-color", "#FFFFFF");
                return;
            }
            // alert(888);
            if(isNaN(gns)){
                $('#signs').text('价格必须是数字');
                $('#signs').css("color", 'red');
                $('#signs').css("border", '0');
                $('#signs').css("display", 'inline');
                $('#price').css("background-color", "#FFFFFF");
            }    
        })
        $('#submit').click(function(){
            var name = $("#goodsname").val();
            var price = $("#price").val();
            var goodsinfo = $("#goodsinfo").val();
            if(!name||!price||!goodsinfo){
                alert("请填写完整");
                window.location.reload();
                return;
            };
        })
    });
</script>
<body>
<div id="div1">
    <form method="post" class="form-horizontal" enctype="multipart/form-data" >
        <div class="control-group">
            <label class="control-label">商品名称</label>
            <div class="controls">
                <input type="text" name="goodname" id="goodsname" on><div id="sign" style="display:none;"></div>
            </div>
        </div>
        <div class="control-group">
            <laabel class="control-label">所属类别</laabel>
            <div class="controls">
                <select name="level" id="level" >
                    <option value="0" >选择分类</option>
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
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">是否上架</label>
            <div class="controls">
                <input type="radio" name="ison" value="1">是
                <input type="radio" name="ison" value="0">否
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">商品价格</label>
            <div class="controls">
                <input type="text" name="price" id="price"><div id="signs" style="display:none;"></div>
               
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">商品详情</label>
            <div class="controls">
                <textarea rows="3" style="width:400px;height: 200px;" name="goodsinfo" id="goodsinfo"></textarea>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">商品图片</label>
            <div class="controls">

               <input type="file"  name="goods[]" style="width:72px;"/>
               <input type="file"  name="goods[]" style="width:72px;"/>
               <input type="file"  name="goods[]" style="width:72px;"/>

            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <input type="submit" value="提交" id="submit" style="width:60px;height:30px;background:rgba(103, 175, 109, 0);">
            </div>
        </div>

    </form>
</div>
</body>
</html>