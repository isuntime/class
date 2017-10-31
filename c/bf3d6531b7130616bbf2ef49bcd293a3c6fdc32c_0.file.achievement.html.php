<?php
/* Smarty version 3.1.30, created on 2017-06-20 15:56:19
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/home/achievement.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5948d523e1db39_27169628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf3d6531b7130616bbf2ef49bcd293a3c6fdc32c' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/home/achievement.html',
      1 => 1497944490,
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
function content_5948d523e1db39_27169628 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">首页</a></li>
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
