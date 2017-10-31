<?php
/* Smarty version 3.1.30, created on 2017-06-20 15:58:41
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/reginfo.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5948d5b151e2a5_91784497',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f26ceea000123e3bca6ae3e5b1f19716a6a531a' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/reginfo.html',
      1 => 1497944921,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/student/regstudent.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_5948d5b151e2a5_91784497 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">学员管理</a></li>
    <li class="active">学员注册</li>
</ol>
<?php $_smarty_tpl->_subTemplateRender("file:admin/student/regstudent.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
 src="../html/default/admin/js/student/reginfo.js">

<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
