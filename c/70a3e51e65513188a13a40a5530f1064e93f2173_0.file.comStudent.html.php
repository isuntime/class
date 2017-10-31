<?php
/* Smarty version 3.1.30, created on 2017-06-25 14:14:15
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/comStudent.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_594f54b7935631_01704175',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70a3e51e65513188a13a40a5530f1064e93f2173' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/comStudent.html',
      1 => 1498371248,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_594f54b7935631_01704175 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table class="table table-bordered table-responsive" class="col-sm-offset-1 col-sm-10">
    <tr>
        <td>姓名</td>
        <td>{{appinfo.user_info.name}}</td>
        <td>学号</td>
        <td>{{appinfo.user_info.student_id}}</td>
        <td rowspan="3"><img v-bind:src="appinfo.user_info.studentphoto" class="" alt="" id="pic" name="pic"
                             placeholder="照片"></td>
    </tr>
    <tr>
        <td>性别</td>
        <td>{{appinfo.user_info.sex | studentSex}}</td>
        <td>电话</td>
        <td>{{appinfo.user_info.phone}}</td>
    </tr>
    <tr>
        <td>准驾类型</td>
        <td>{{appinfo.user_info.vehicle_type}}</td>
        <td>入学时间</td>
        <td>{{appinfo.user_info.reg_time}}</td>
    </tr>
</table>
<table class="table table-bordered table-responsive" class="col-sm-offset-1 col-sm-10">
    <tr>
        <td>培训费</td>
        <td>{{appinfo.pay_info.train}}</td>
        <td>制证费</td>
        <td>{{appinfo.pay_info.accreditation}}</td>
        <td>场地费</td>
        <td>{{appinfo.pay_info.space}}</td>
    </tr>
    <tr>

        <td>资料费</td>
        <td>{{appinfo.pay_info.datum}}</td>
        <td>交通费</td>
        <td>{{appinfo.pay_info.traffic}}</td>
        <td>保险费</td>
        <td>{{appinfo.pay_info.insurance}}</td>
    </tr>
    <tr>
        <td>缴费时间</td>
        <td>{{appinfo.pay_info.ctime}}</td>
        <td>总计</td>
        <td colspan="3">{{appinfo.pay_info.total}}</td>
    </tr>
</table>
<table class="table table-bordered table-responsive" class="col-sm-offset-1 col-sm-10">
    <caption>教练变更记录</caption>
    <th>原教练</th>
    <th>原车辆编号</th>
    <th>新教练</th>
    <th>新车辆编号</th>
    <th>申请时间</th>
    </thead>
    <tbody>
    <tr v-for="item in appinfo.coach_list">
        <td>{{item.coach_name}}</td>
        <td>{{item.car_id}}</td>
        <td>{{item.assing_coach_name}}</td>
        <td>{{item.assing_car_id}}</td>
        <td>{{item.assing_time}}</td>
    </tr>
    </tbody>
</table>
<table class="table table-bordered table-responsive" class="col-sm-offset-1 col-sm-10">
    <caption>科目考试缴费记录</caption>
    <thead>
    <th >科目</th>
    <th>缴费金额</th>
    <th >考试时间</th>
    </thead>
    <tbody>
    <tr v-for="item in appinfo.achie_list">
        <td>{{item.subjectType}}</td>
        <td>{{item.ac_num}}</td>
        <td>{{item.test_time}}</td>
    </tr>

    </tbody>
</table>
<?php }
}
