<?php
/* Smarty version 3.1.30, created on 2017-06-10 21:17:44
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/sidebar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593bf1788767f3_11875823',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81267499d55c266155058c46cde27dd16951efba' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/sidebar.html',
      1 => 1497100659,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593bf1788767f3_11875823 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-sm-2 border-blue1">
    <h3>财务管理</h3>
    <ul class="nav nav-pills nav-stacked ">
        <li ><a href="/finance.php?model=payment">入学缴费</a></li>
        <li ><a href="/finance.php?model=test">考试缴费</a></li>
        <li ><a href="/finance.php?model=dropout">退学退费</a></li>
        <li ><a href="/finance.php?model=chargeType">费用管理</a></li>
        <li ><a href="/finance.php?model=voucher">票据管理</a></li>
    </ul>
</div><?php }
}
