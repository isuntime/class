<?php
/* Smarty version 3.1.30, created on 2017-10-17 10:36:50
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/home/reginfo.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e56cc283bd91_59573356',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c41b47066a6f631948394f273d0b83e39c274df' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/home/reginfo.html',
      1 => 1507794178,
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
function content_59e56cc283bd91_59573356 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">首页</a></li>
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
