<?php
/* Smarty version 3.1.30, created on 2017-10-17 10:40:52
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/student/Achievementmanagement.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e56db4a52074_93898438',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f5f2b2bc25db3c98c3fa3fef8b265a963ad78e4' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/student/Achievementmanagement.html',
      1 => 1507794191,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/student/achievement.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_59e56db4a52074_93898438 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">学员管理</a></li>
    <li class="active">成绩管理</li>
</ol>
<?php $_smarty_tpl->_subTemplateRender("file:admin/student/achievement.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
 src="../html/default/admin/js/student/Achievementmanagement.js">


<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
