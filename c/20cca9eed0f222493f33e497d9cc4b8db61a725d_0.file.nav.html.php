<?php
/* Smarty version 3.1.30, created on 2017-06-10 22:31:17
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/nav.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593c02b570b188_66844065',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20cca9eed0f222493f33e497d9cc4b8db61a725d' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/nav.html',
      1 => 1497105060,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593c02b570b188_66844065 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ul class="nav nav-pills nav-justified">
    <li><a href="/home.php?model=home">首页</a></li>
    <li><a href="/reception.php?model=content" >前台管理</a></li>
    <li class="active"><a href="/student.php?model=reginfo" >学员管理</a></li>
    <li><a href="/workers.php?model=staff" >职工管理</a></li>
    <li><a href="/finance.php?model=payment" >收费管理</a></li>
    <li><a href="/vehicle.php?model=carlist" >车辆管理</a></li>
    <li ><a href="/system.php?model=account" >系统管理</a></li>
</ul><?php }
}
