<?php
/* Smarty version 3.1.30, created on 2017-06-20 16:00:14
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/Achievementmanagement.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5948d60e2c23a4_96480694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '156aab1efb5dbe9aa04c31c7cb266485140909a2' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/Achievementmanagement.html',
      1 => 1497945110,
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
function content_5948d60e2c23a4_96480694 (Smarty_Internal_Template $_smarty_tpl) {
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
