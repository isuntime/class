<?php
/* Smarty version 3.1.30, created on 2017-07-21 10:54:31
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/sidebar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59716ce7c3f7b8_36808577',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21ab2eff580e27a8a86df31b2856107e60d5bc05' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/sidebar.html',
      1 => 1500605669,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59716ce7c3f7b8_36808577 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <aside class="main-sidebar">
        <section  class="sidebar">
            <ul class="sidebar-menu regform">
                <!--<li class="header">MAIN NAVIGATION</li>-->
                <li class="treeview">
                    <a href="#">
                        <img src="../html/default/admin/img/home.png" alt="" class="big-img center-block"> <span class="center-block text-center">首页</span> <i class="glyphicon glyphicon-menu-down pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/home.php?model=reginfo"><i class="icon-edit"></i> 学员报名</a></li>
                        <li><a href="/home.php?model=student_pay"><i class="icon-strikethrough"></i> 入学缴费</a></li>
                        <li><a href="/home.php?model=examination"><i class="icon-bookmark"></i> 考试管理</a></li>
                        <li><a href="/home.php?model=reTestPay"><i class="icon-money"></i> 考试缴费</a></li>
                        <!--<li><a href="/home.php?model=assign_car"><i class="glyphicon glyphicon-record"></i> 分车管理</a></li>-->
                        <li><a href="/home.php?model=achievement"><i class="icon-inbox"></i> 成绩管理</a></li>
                        <li><a href="/home.php?model=graduation"><i class="icon-info-sign"></i> 结业管理</a></li>
                    </ul>
                </li>
                <!--<li class="treeview">-->
                    <!--<a href="#">-->
                        <!--<img src="../html/default/admin/img/reception.png" alt="" class="big-img center-block"><span class="center-block text-center">前台管理</span> <i class="glyphicon glyphicon-menu-down"></i>-->
                    <!--</a>-->
                    <!--<ul class="treeview-menu">-->
                        <!--<li><a href="/reception.php?model=content"><i class="icon-file-alt"></i> 内容管理</a></li>-->
                        <!--<li><a href="/reception.php?model=column"><i class="icon-columns"></i> 栏目管理</a></li>-->
                        <!--<li><a href="/reception.php?model=notice"><i class="icon-picture"></i> 公告图片管理</a></li>-->
                    <!--</ul>-->
                <!--</li>-->
                <li class="treeview">
                    <a href="#">
                        <img src="../html/default/admin/img/student.png" alt="" class="big-img center-block"><span class="center-block text-center">学员管理</span> <i class="glyphicon glyphicon-menu-down pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li ><a href="student.php?model=reginfo"><i class="icon-edit"></i> 报名申请</a></li>
                        <li ><a href="student.php?model=information"><i class="icon-reorder"></i> 学员信息</a></li>
                        <li ><a href="student.php?model=Achievementmanagement"><i class="icon-inbox"></i> 成绩管理</a></li>
                        <li ><a href="student.php?model=retest"><i class="icon-bookmark"></i> 考试申请</a></li>
                        <li ><a href="student.php?model=timewarning"><i class="icon-bell-alt"></i> 学员时间预警</a></li>
                        <li ><a href="student.php?model=recoach"><i class="icon-hand-right"></i> 更换教练</a></li>
                        <li ><a href="student.php?model=vehicletype"><i class="glyphicon glyphicon-record"></i> 更换准驾类型</a></li>
                        <!--<li ><a href="student.php?model=distributecar"><i class="glyphicon glyphicon-record"></i> 分车管理</a></li>-->
                        <!--<li ><a href="student.php?model=assumpsitcar"><i class="glyphicon glyphicon-record"></i> 约车管理</a></li>-->
                        <li ><a href="student.php?model=graduation"><i class="icon-info-sign"></i> 结业管理</a></li>
                        <li ><a href="student.php?model=feedback"><i class="icon-indent-right"></i> 投诉反馈</a></li>
                        <li ><a href="student.php?model=dropout"><i class="icon-warning-sign"></i> 退学申请</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <img src="../html/default/admin/img/worker.png" alt="" class="big-img center-block"><span class="center-block text-center">职工管理</span> <i class="glyphicon glyphicon-menu-down pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li ><a href="workers.php?model=staff"><i class="icon-phone"></i> 员工管理</a></li>
                        <li ><a href="workers.php?model=department"><i class="icon-laptop"></i> 部门管理</a></li>
                        <li ><a href="workers.php?model=position"><i class="icon-group"></i> 职位管理</a></li>
                        <!--<li ><a href="workers.php?model=report">工作汇报</a></li>-->
                        <li ><a href="workers.php?model=coach"><i class="icon-user-md"></i> 教练管理</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <img src="../html/default/admin/img/pay.png" alt="" class="big-img center-block"><span class="center-block text-center">收费管理</span> <i class="glyphicon glyphicon-menu-down pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li ><a href="/finance.php?model=payment"><i class="icon-strikethrough"></i> 入学缴费</a></li>
                        <li ><a href="/finance.php?model=test"><i class="icon-money"></i> 考试缴费</a></li>
                        <li ><a href="/finance.php?model=dropout"><i class="icon-retweet"></i> 退学退费</a></li>
                        <li ><a href="/finance.php?model=chargeType"><i class="icon-cog"></i> 费用管理</a></li>
                        <li ><a href="/finance.php?model=voucher"><i class="icon-print"></i> 票据管理</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <img src="../html/default/admin/img/vehicle.png" alt="" class="big-img center-block"><span class="center-block text-center">车辆管理</span> <i class="glyphicon glyphicon-menu-down pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li ><a href="/vehicle.php?model=carlist"><i class="icon-truck"></i> 车辆信息</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <img src="../html/default/admin/img/system.png" alt="" class="big-img center-block"><span class="center-block text-center">系统管理</span> <i class="glyphicon glyphicon-menu-down pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li ><a href="system.php?model=account"><i class="icon-group"></i> 账户管理</a></li>
                        <li ><a href="system.php?model=jurisdiction"><i class="icon-sitemap"></i> 权限管理</a></li>
                        <li ><a href="system.php?model=system"><i class="icon-cog"></i> 系统设置</a></li>
                        <!--<li ><a href="system.php?model=backupmanager"><i class="icon-download-alt"></i> 备份管理</a></li>-->
                        <li ><a href="system.php?model=InformationImport"><i class="icon-arrow-down"></i> 信息管理</a></li>
                    </ul>
                </li>

            </ul>
        </section>
    </aside>
<?php }
}
