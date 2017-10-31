<?php
/* Smarty version 3.1.30, created on 2017-06-12 13:41:44
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/nav.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593e2998de48a6_18757973',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd99b56bfbd8202bc08cedc78f7bbcae515d2ccfc' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/nav.html',
      1 => 1497246102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593e2998de48a6_18757973 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-sm-2">
 <ul class="nav nav-pills nav-stacked">
  <li><a href="/home.php?model=home">首页</a></li>
  <li><a href="/reception.php?model=content" >前台管理</a></li>
  <li ><a href="/student.php?model=reginfo" >学员管理</a></li>
  <li><a href="/workers.php?model=staff" >职工管理</a></li>
  <li class="active"><a href="/finance.php?model=payment" >收费管理</a></li>
  <li><a href="/vehicle.php?model=carlist" >车辆管理</a></li>
  <li ><a href="/system.php?model=account" >系统管理</a></li>
 </ul>
</div>
<?php }
}
