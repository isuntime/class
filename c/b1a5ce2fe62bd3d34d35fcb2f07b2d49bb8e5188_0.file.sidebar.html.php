<?php
/* Smarty version 3.1.30, created on 2017-06-10 22:31:17
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/sidebar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593c02b5715896_64987740',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1a5ce2fe62bd3d34d35fcb2f07b2d49bb8e5188' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/sidebar.html',
      1 => 1497105063,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593c02b5715896_64987740 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-sm-2">
    <h3>学员管理</h3>
    <ul class="nav nav-pills nav-stacked" id="sidebar">
        <li ><a href="student.php?model=reginfo">报名申请</a></li>
        <li ><a href="student.php?model=information">学员信息</a></li>
        <!--<li ><a href="student.php?model=resultInput">成绩录入</a></li>-->
        <li ><a href="student.php?model=Achievementmanagement">成绩管理</a></li>
        <li ><a href="student.php?model=retest">考试申请</a></li>
        <li ><a href="student.php?model=timewarning">学员时间预警</a></li>
        <li ><a href="student.php?model=recoach">更换教练</a></li>
        <li ><a href="student.php?model=vehicletype">更换准驾类型</a></li>
        <li ><a href="student.php?model=distributecar">分车管理</a></li>
        <li ><a href="student.php?model=assumpsitcar">约车管理</a></li>
        <li ><a href="student.php?model=graduation">结业管理</a></li>
        <li ><a href="student.php?model=feedback">投诉反馈</a></li>
        <li ><a href="student.php?model=dropout">退学申请</a></li>
    </ul>
</div>
<?php }
}
