<?php
/* Smarty version 3.1.30, created on 2017-10-17 10:40:44
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/home/student_pay.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e56dac1a21f8_66390538',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '621092f9a628c5e50eb88458efa96dcc3a004ffe' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/home/student_pay.html',
      1 => 1507794178,
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
function content_59e56dac1a21f8_66390538 (Smarty_Internal_Template $_smarty_tpl) {
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
