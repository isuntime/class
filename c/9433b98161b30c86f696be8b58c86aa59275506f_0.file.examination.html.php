<?php
/* Smarty version 3.1.30, created on 2017-06-20 15:53:10
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/home/examination.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5948d466e29ed6_04840847',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9433b98161b30c86f696be8b58c86aa59275506f' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/home/examination.html',
      1 => 1497944542,
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
function content_5948d466e29ed6_04840847 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">首页</a></li>
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
