<?php
/* Smarty version 3.1.30, created on 2017-06-20 16:01:51
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/graduation.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5948d66f818855_40112844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76999b0c96a1d7f3697c693a6aabc3b00053e891' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/graduation.html',
      1 => 1497944964,
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
function content_5948d66f818855_40112844 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">学员管理</a></li>
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
