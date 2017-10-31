<?php
/* Smarty version 3.1.30, created on 2017-10-17 10:36:28
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e56cac14c0d7_10494797',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86570fa258b250b02068646f0ee4fca01543c817' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/login.html',
      1 => 1507945177,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e56cac14c0d7_10494797 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title>信息管理中心后台</title>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="../html/default/bootstrap/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="../html/default/bootstrap/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="../html/default/admin/css/login.css">
    <link rel="stylesheet" href="../html/default/bootstrap/datetime/css/bootstrap-datetimepicker.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php echo '<script'; ?>
 src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <?php echo '<script'; ?>
 src="../html/default/bootstrap/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../html/default/js/vue.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../html/default/bootstrap/datetime/js/bootstrap-datetimepicker.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../html/default/bootstrap/datetime/js/locales/bootstrap-datetimepicker.zh-CN.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="../html/default/admin/js/c.js"><?php echo '</script'; ?>
>
</head>
<body>
<div class="container-fluid" id="app">
    <div class="row">
        <img src="../html/default/admin/img/timg.jpg" alt="" class="col-sm-12 hidden-xs" style="padding: 0;height: 100%;" id="timg">
        <div id="main" class="center-block col-sm-4 col-sm-offset-4 col-xs-12">
            <div>
                <h1 class="center-block text-center"><strong>荣达驾校信息管理系统</strong></h1>
                <h2 class="center-block text-center text-success">登录验证</h2>
            </div>
            <div class=" clearfix ">
                <form class="form-horizontal" id="logininfo">
                    <div class="form-group">
                        <label for="username" class="col-sm-3 control-label">用户名：</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control noempty" name="username" id="username" placeholder="用户名" v-model="appinfo.username" v-on:change="usernameFilter">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pwd" class="col-sm-3 control-label">密码：</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control noempty" name="pwd" id="pwd" placeholder="密码" v-model="appinfo.pwd">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="yzm" class="col-sm-3 control-label">验证码：</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control noempty" name="yzm" id="yzm" placeholder="验证码" v-model="appinfo.yzm">
                        </div>
                        <div class="col-sm-3">

                                <img class="form-control" src="index.php?model=imager" alt="ymz" id="getimg" @click="getimg" style="padding: 0;">

                        </div>
                    </div>
                    <div class="form-group">

                        <button type="button" class="btn btn-primary btn-bg col-sm-4 col-sm-offset-4" v-on:click.prevent="subform">登录</button>

                    </div>
                </form>


            </div>

        </div>
    </div>
    <div class="modal fade" id="messageModel" tabindex="-1" role="dialog" aria-labelledby="messageModelLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="messageModelLabel"></h4>
                </div>
                <div class="modal-body" v-text="message"></span></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
>
    var app = new Vue({
        el: '#app',
        data: {
            appinfo: {
                username: '',
                pwd: '',
                yzm: '',
            },
            formfiter: true,
            message: '',
        },
        filters: {},
        mounted: function () {
        },
        methods: {
            subform: function () {
                var dataobj = {
                    model: "login",
                    action: 'check',
                    data: this.appinfo,
                };
                var _self = this;
                if (forminspect('logininfo') == true && this.formfiter == true) {
                    $.ajax({
                        url: comUrl.index,
                        type: "post",
                        data: dataobj,
                        dataType: "json",
                        success: function (request, status) {
                            switch (request.code){
                                case "1":
                                    _self.message = request.message;
                                    $('#messageModel').modal('show');
                                    window.location.href="http://bzrdjx.com/home.php?model=reginfo";
                                    __self.getimg();
                                    break;
                                case "0":
                                    _self.message = request.message;
                                    $('#messageModel').modal('show');
                                    _self.getimg();
                                    break;
                            }

                        }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                            _self.message = '提交失败，请再次尝试';
                            $('#messageModel').modal('show');
                        }
                    });

                }
            },
            usernameFilter: function () {

                var dataobj = {
                    model: "login",
                    action: 'checkusername',
                    where: {
                        username: this.appinfo.username,
                    }
                };
                var _self = this;
                $.ajax({
                    url: comUrl.index,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (data) {
                        switch(data.user_state){
                            case '0':
                                _self.message = '该用户已被禁用';
                                $('#messageModel').modal('show');
                                _self.formfiter = false;
                            break;
                            case '1':
                                _self.formfiter = true;
                            break;
                            case "2":
                                _self.message = 'unknown error !';
                                $('#messageModel').modal('show');
                                _self.formfiter = false;
                            break;
                        }

                    }
                });
            },
            getimg: function () {
                $("#getimg").attr("src","index.php?model=imager");
//                http://bzrdjx.com/index.php?model=imager
            }
        }
    });
    $(window).resize(function () {          //当浏览器大小变化时

        $("#timg").height($(document.body).outerHeight(true)); //浏览器时下窗口文档body的总高度 包括border padding margin
    });
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
