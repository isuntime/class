<?php
/* Smarty version 3.1.30, created on 2017-06-20 16:02:08
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/test.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5948d6803ed003_41280131',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5d854dc150c648217b17b23ccdf116d42dee617' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/test.html',
      1 => 1497944515,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/finance/comTest.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_5948d6803ed003_41280131 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">收费管理</a></li>
    <li class="active">考试缴费</li>
</ol>
<?php $_smarty_tpl->_subTemplateRender("file:admin/finance/comTest.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
 src="../html/default/admin/js/finance/test.js">


<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
