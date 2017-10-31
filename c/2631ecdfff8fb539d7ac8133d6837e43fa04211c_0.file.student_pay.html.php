<?php
/* Smarty version 3.1.30, created on 2017-07-05 09:41:42
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/home/student_pay.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595c43d669f872_61063294',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2631ecdfff8fb539d7ac8133d6837e43fa04211c' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/home/student_pay.html',
      1 => 1499218900,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/finance/paytable.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_595c43d669f872_61063294 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">首页</a></li>
    <li class="active">入学缴费</li>
</ol>
<?php $_smarty_tpl->_subTemplateRender("file:admin/finance/paytable.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 src="../html/default/js/LodopFuncs.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../html/default/admin/js/finance/payment.js">
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
