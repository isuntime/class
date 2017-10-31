<?php
/* Smarty version 3.1.30, created on 2017-08-11 16:49:14
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/system/liucheng.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_598d6f8a3c2bc8_40687629',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ad232a0b2566c86c7d653f9eafb17b2700b8f90' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/system/liucheng.html',
      1 => 1502441353,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_598d6f8a3c2bc8_40687629 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
	<li><a href="#">系统管理</a></li>
	<li class="active">系统设置</li>
</ol>
<div class="col-sm-8" id="app" style="padding:0px;">
	<div style="position:relative;height:auto;min-width:1143px;border:5px solid #FDEAEA;padding:10px;">
		<span>新建</span>
		<div style="position: relative;height: auto;width: 500px;">
			<ul v-for="item in applist" style="list-style: none;">
				<li><input type="checkbox" name="hoho"/></li>
				<li><span v-text="item.department_name"></span></li>
			</ul>
		</div>
	</div>
</div>
<?php echo '<script'; ?>
 src="../html/default/admin/js/system/liucheng.js" ><?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
