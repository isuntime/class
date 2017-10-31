<?php
/* Smarty version 3.1.30, created on 2017-10-17 12:59:19
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/adminerror.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e58e2784ec51_66585523',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58d93f872d4e20e2948339fb5a3f7380728bfb39' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/adminerror.html',
      1 => 1507794174,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e58e2784ec51_66585523 (Smarty_Internal_Template $_smarty_tpl) {
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
        <div class="col-sm-8 col-sm-offset-2">
            <h1 class="text-center">无权查看此页面，请向管理员申请权限</h1>
            <h3 class="text-center" id="jump">3秒后跳转页面</h3>
        </div>


    </div>

</div>
<?php echo '<script'; ?>
>
    var time=3;
    setInterval(function () {
        if(time<=0){
            javascript:history.go(-1);
        }else {
            $("#jump").text(time+"秒后跳转页面");
            time--;
        }

    },1000);
    setTimeout(function () {
        javascript:history.go(-1);
    },3000);


<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
