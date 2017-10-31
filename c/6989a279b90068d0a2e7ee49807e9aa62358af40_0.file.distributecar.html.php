<?php
/* Smarty version 3.1.30, created on 2017-06-13 20:13:59
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/distributecar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593fd7075e7d97_23394755',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6989a279b90068d0a2e7ee49807e9aa62358af40' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/distributecar.html',
      1 => 1497356030,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/student/assign_car.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_593fd7075e7d97_23394755 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb col-sm-offset-2">
    <li><a href="#">学员管理</a></li>
    <li class="active">分车管理</li>
</ol>

            <?php $_smarty_tpl->_subTemplateRender("file:admin/student/assign_car.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php echo '<script'; ?>
 src="../html/default/admin/js/student/distributecar.js">
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>






<?php }
}
