<?php
/* Smarty version 3.1.30, created on 2017-06-20 16:01:45
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/retest.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5948d669ccbd46_49042404',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '210b0778e730d4b646350986c10edf391c969007' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/retest.html',
      1 => 1497945134,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/student/comTest.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_5948d669ccbd46_49042404 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">学员管理</a></li>
    <li class="active">考试申请</li>
</ol>
<div class="col-sm-8" id="app">
<?php $_smarty_tpl->_subTemplateRender("file:admin/student/comTest.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<?php echo '<script'; ?>
 src="../html/default/admin/js/student/retest.js">

<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
