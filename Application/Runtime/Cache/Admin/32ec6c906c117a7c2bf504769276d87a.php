<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="keywords" content="scclui框架">
    <meta name="description" content="scclui为轻量级的网站后台管理系统模版。">
    <title>登录</title>
    
    <link rel="stylesheet" href="/Public/Admin/layui/css/layui.css">
    <link rel="stylesheet" href="/Public/Admin/css/sccl.css">
    
  </head>
  
  <body class="login-bg">
    <div class="login-box">
        <header>
            <h1>框架后台管理系统</h1>
        </header>
        <div class="login-main">
            <!-- <?php echo U('Admin/Index/home');?> -->
            <form action="#" class="layui-form" method="post">
                <input name="__RequestVerificationToken" type="hidden" value="">                
                <div class="layui-form-item">
                    <label class="login-icon">
                        <i class="layui-icon"></i>
                    </label>
                    <input type="text" name="userName" lay-verify="userName" autocomplete="off" placeholder="这里输入登录名" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <label class="login-icon">
                        <i class="layui-icon"></i>
                    </label>
                    <input type="password" name="password" lay-verify="password" autocomplete="off" placeholder="这里输入密码" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <div class="pull-left login-remember">
                        <label>记住帐号？</label>

                        <input type="checkbox" name="rememberMe" value="true" lay-skin="switch" title="记住帐号"><div class="layui-unselect layui-form-switch"><i></i></div>
                    </div>
                    <div class="pull-right">
                        <button class="layui-btn layui-btn-primary" lay-submit="" lay-filter="login">
                            <i class="layui-icon"></i> 登录
                        </button>
                    </div>
                    <div class="clear"></div>
                </div>
            </form>        
        </div>
        <footer>
            <p>xuan © www.mycodes.net</p>
        </footer>
    </div>
    <script src="/Public/Admin/layui/layui.js"></script>
    <script>
        layui.use(['layer', 'form'], function () {
            var layer = layui.layer,
                $ = layui.jquery,
                form = layui.form();

            form.verify({
                userName: function (value) {
                    if (value === '')
                        return '请输入用户名';
                },
                password: function (value) {
                    if (value === '')
                        return '请输入密码';
                }
            });
        });

        /*function submit($,params){
            $.post('/manage/login',params , function (res) {
                if (!res.success) {
                    if (res.data !== undefined)
                        errorCount = res.data.errorCount
                    layer.msg(res.message,{icon:2});
                }else
                {
                    layer.msg(res.message,{icon:1},function(index){
                        layer.close(index);
                        location.href='/manage';
                    });
                }
            }, 'json');
        }*/
    </script>
  </body>
</html>