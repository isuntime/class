<?php
/* Smarty version 3.1.30, created on 2017-09-26 17:10:23
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/comTest.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59ca197f7b0e52_46811970',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc97c447b9248dd81c6e0718a099bfc1f9beac97' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/comTest.html',
      1 => 1506417020,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59ca197f7b0e52_46811970 (Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="regform clearfix">
        <div class="col-sm-8">
            <form class="form-horizontal"  id="retestform">
                <h1 class="center-block text-center regform form-group">考试申请</h1>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">身份证号码</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control  noempty" id="national_id" name="national_id"
                               v-model="appinfo.national_id">
                    </div>
                    <div class="col-sm-2"><button type="button" class="btn btn-default" @click="nameFilter">查询</button></div>

                </div>

                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">姓名</label>
                    <div class="col-sm-6">
                        <p class="form-control-static col-sm-4 border" v-text="appinfo.name"></p>
                    </div>
                </div>

                <div class="form-group">

                    <label for="student_id" class="col-sm-4 control-label">学号</label>
                    <div class="col-sm-6">
                        <p class="form-control-static col-sm-4 border" v-text="appinfo.student_id"></p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">考试科目</label>
                    <div class="col-sm-6">
                        <p class="form-control-static col-sm-4 border" v-text="appinfo.subject.ch_name"></p>
                    </div>
                </div>


                <div class="form-group">
                    <label for="testtime" class="col-sm-4 control-label">考试时间</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control findtime noempty" id="testtime" name="testtime">
                        <span id="coachhelp" class="help-block hidden">时间不能为空</span>
                    </div>
                </div>


                <div class="form-group">

                    <div class="col-sm-offset-4 col-sm-2">
                        <button type="button" class="btn btn-primary" v-on:click.prevent="subform">提交</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
<div class="regform">
    <a class="btn btn-warning" href="http://bzrdjx.com/finance.php?model=test" target="_blank">立即缴费</a>
    <table class="table table-bordered table-hover ">

        <thead>
        <td>订单编号</td>
        <td>缴费金额</td>
        <td>考试时间</td>
        <td>缴费状态</td>
        <td>考试次数</td>
        </thead>
        <tbody>
        <tr v-for="item in appinfo.record" v-bind:class="{danger:!item.pay_state}">
            <td v-text="item.order_id"></td>
            <td v-text="item.money"></td>
            <td v-text="item.d_time"></td>
            <td v-text="">{{item.pay_state|pay_mentfilter}}</td>
            <td v-text="item.times"></td>
        </tr>

        </tbody>
    </table>
</div>
    <div class="modal fade" id="messageModel" tabindex="-1" role="dialog" aria-labelledby="myModal1Label"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body" v-text="message"></div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-primary" id="delstudent" v-on:click="toNext">下一步</button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>

<?php }
}
