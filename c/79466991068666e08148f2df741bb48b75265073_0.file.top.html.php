<?php
/* Smarty version 3.1.30, created on 2017-06-27 15:39:35
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/top.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59520bb73402d5_75918718',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79466991068666e08148f2df741bb48b75265073' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/top.html',
      1 => 1498549172,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/sidebar.html' => 1,
  ),
),false)) {
function content_59520bb73402d5_75918718 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title>信息管理中心</title>
    <link rel="stylesheet" href="../html/default/css/normalize.css">
    <link rel="stylesheet" href="../html/default/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../html/default/css/Awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../html/default/admin/css/sidebar-menu.css">
    <link rel="stylesheet" href="../html/default/admin/css/common.css">

    <!-- Bootstrap -->
    <!--<link href="../html/default/bootstrap/dist/css/bootstrap.css" rel="stylesheet">-->
    <!--<link rel="stylesheet" href="../html/default/admin/css/common.css">-->
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
    <!--<?php echo '<script'; ?>
 src="../html/default/js/layer/layer.js"><?php echo '</script'; ?>
>-->
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
    <link rel="stylesheet" href="../html/default/bootstrap/datetime/css/bootstrap-datetimepicker.min.css">
    <?php echo '<script'; ?>
 src="../html/default/bootstrap/datetime/js/locales/bootstrap-datetimepicker.zh-CN.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../html/default/admin/js/c.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../html/default/admin/js/sidebar-menu.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../html/default/js/jquery.jqprint-0.3.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="http://www.jq22.com/jquery/jquery-migrate-1.2.1.min.js"><?php echo '</script'; ?>
>
</head>
<body>
<header >
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container-fluid" >

            <div class="navbar-header">
                <p class="navbar-text">博州荣达驾校信息管理中心</p>
            </div>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <p class="navbar-text"> <?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
 / <?php echo $_smarty_tpl->tpl_vars['user']->value['department_name'];?>
 / <?php echo $_smarty_tpl->tpl_vars['user']->value['position_name'];?>
 : <?php echo $_smarty_tpl->tpl_vars['user']->value['rule_name'];?>
</p>
                        <!-- <p class="navbar-text"><?php echo $_smarty_tpl->tpl_vars['user']->value['logintime'];?>
</p> -->
                        </li>
                    <li><a href="#" class="btn btn-danger" id="loginOut">登出</a></li>
                </ul>

        </div>
    </nav>
</header>

<div class="container-fluid" style="margin-top:54px;height: 100%;" >
        <div class="row" id="right-content" style="height: 100%;">
            <?php $_smarty_tpl->_subTemplateRender("file:admin/sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
