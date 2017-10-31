<?php
/* Smarty version 3.1.30, created on 2017-05-28 22:46:12
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/system/sidebar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_592ae2b43fdd57_20809579',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7fb47223a4fee10fe683a58fdb015d32238e2fa3' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/system/sidebar.html',
      1 => 1495518673,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_592ae2b43fdd57_20809579 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-sm-2">
    <h3>系统管理</h3>
    <ul class="nav nav-pills nav-stacked">
        <li ><a href="system.php?model=account">账户管理</a></li>
        <li ><a href="system.php?model=jurisdiction">权限管理</a></li>
        <li ><a href="system.php?model=system">系统设置</a></li>
        <li ><a href="system.php?model=backupmanager">备份管理</a></li>
        <li ><a href="system.php?model=InformationImport">信息管理</a></li>
    </ul>
</div><?php }
}
