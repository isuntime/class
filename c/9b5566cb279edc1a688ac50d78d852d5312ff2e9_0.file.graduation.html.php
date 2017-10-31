<?php
/* Smarty version 3.1.30, created on 2017-10-17 10:49:47
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/home/graduation.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e56fcbc43a76_56194393',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b5566cb279edc1a688ac50d78d852d5312ff2e9' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/home/graduation.html',
      1 => 1507794178,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/student/comGraduation.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_59e56fcbc43a76_56194393 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">首页</a></li>
    <li class="active">结业管理</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">
        <div class="col-sm-8">
            <?php $_smarty_tpl->_subTemplateRender("file:admin/student/comGraduation.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


        </div>
    </div>
</div>
<?php echo '<script'; ?>
 src="../html/default/admin/js/student/graduation.js">
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
