<?php
/* Smarty version 3.1.30, created on 2017-06-03 11:25:00
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/workers/sidebar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59322c0cb70f13_50454814',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e87f00995beb26ca46f37d108b4394bbf3e4364d' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/workers/sidebar.html',
      1 => 1496460293,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59322c0cb70f13_50454814 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-sm-2">
    <h3>员工管理</h3>
    <ul class="nav nav-pills nav-stacked">
        <li ><a href="workers.php?model=staff">员工管理</a></li>
        <li ><a href="workers.php?model=department">部门管理</a></li>
        <li ><a href="workers.php?model=position">职位管理</a></li>
        <!--<li ><a href="workers.php?model=report">工作汇报</a></li>-->
        <li ><a href="workers.php?model=coach">教练管理</a></li>

    </ul>
</div><?php }
}
