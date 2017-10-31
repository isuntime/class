<?php
/* Smarty version 3.1.30, created on 2017-10-17 11:25:02
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/home/reTestPay.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e5780e43d9c8_79380405',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '078ac9351c870e2fd2a21fbed38aa4547ce0e2b1' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/home/reTestPay.html',
      1 => 1507794178,
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
function content_59e5780e43d9c8_79380405 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb " id="breadcrumb">
    <li><a href="#">首页</a></li>
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
