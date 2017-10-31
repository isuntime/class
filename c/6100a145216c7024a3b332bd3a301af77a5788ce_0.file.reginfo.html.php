<?php
/* Smarty version 3.1.30, created on 2017-06-20 16:07:10
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/home/reginfo.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5948d7aeb101e5_91779123',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6100a145216c7024a3b332bd3a301af77a5788ce' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/home/reginfo.html',
      1 => 1497944413,
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
function content_5948d7aeb101e5_91779123 (Smarty_Internal_Template $_smarty_tpl) {
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
