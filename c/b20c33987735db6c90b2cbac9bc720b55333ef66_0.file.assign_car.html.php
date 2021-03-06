<?php
/* Smarty version 3.1.30, created on 2017-06-13 14:20:56
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/assign_car.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593f84488f2980_87702662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b20c33987735db6c90b2cbac9bc720b55333ef66' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/assign_car.html',
      1 => 1497333390,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_593f84488f2980_87702662 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-sm-8 col-sm-offset-3" id="app">
    <div class="regform">
        <div class="col-sm-8">
            <form class="form-horizontal"  id="distributioncar">
                <h1 class="center-block text-center">分车管理</h1>
                <div class="form-group">
                    <label for="student_id" class="col-sm-2 control-label">学号</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control noempty" id="student_id" name="student_id"
                               placeholder="学号" v-model="appinfo.student_id"><span id="namehelp" class="help-block hidden">学号不能为空</span>
                    </div>

                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">科目</label>
                    <div class="col-sm-6">
                        <select name="coach" id="coach" class="form-control" v-model="appinfo.subjecttype">
                            <option v-for="subject in subjectlist" v-bind:value="subject.id">{{subject.name}}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="coachname" class="col-sm-2 control-label">教练</label>
                    <div class="col-sm-6">
                        <select name="coach" id="coach" class="form-control" v-model="appinfo.coach_id" @change="setCarPlate">
                            <option v-for="coach in coachlist" v-bind:value="coach.id">{{coach.name}}</option>
                        </select>
                        <span id="coachhelp" class="help-block hidden">教练不能为空</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="coachcar_id" class="col-sm-2 control-label">车辆编号</label>
                    <div class="col-sm-6">
                        <select name="coach" id="coach" class="form-control" v-model="appinfo.car_id">
                            <option v-for="car in carlist" v-bind:value="car.id">{{car.name}}</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </form>

        </div>
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
</div>
<?php }
}
