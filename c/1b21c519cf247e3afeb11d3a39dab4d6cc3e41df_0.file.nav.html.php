<?php
/* Smarty version 3.1.30, created on 2017-05-29 14:22:47
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/reception/nav.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_592bbe37ee1547_44505653',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b21c519cf247e3afeb11d3a39dab4d6cc3e41df' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/reception/nav.html',
      1 => 1495428894,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_592bbe37ee1547_44505653 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ul class="nav nav-pills nav-justified">
    <li><a href="/home.php?model=home">首页</a></li>
    <li class="active"><a href="/reception.php?model=content" >前台管理</a></li>
    <li ><a href="/student.php?model=reginfo" >学员管理</a></li>
    <li><a href="/workers.php?model=staff" >职工管理</a></li>
    <li><a href="/finance.php?model=payment" >收费管理</a></li>
    <li><a href="/vehicle.php?model=carlist" >车辆管理</a></li>
    <li ><a href="/system.php?model=account" >系统管理</a></li>
</ul><?php }
}
