<?php
/* Smarty version 3.1.30, created on 2017-09-29 13:34:37
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/recoach.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59cddb6da20683_15256597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3edb60a1bb56acdb196d92c22d4827ef9dc2a1fc' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/recoach.html',
      1 => 1506663274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_59cddb6da20683_15256597 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">学员管理</a></li>
    <li class="active">选择或更换教练</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">
        <div class="col-sm-8">

            <form class="form-horizontal"  id="recoachform" >
                <h1 class="center-block text-center">选择或更换教练</h1>
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
                    <label for="coachname" class="col-sm-4 control-label">当前科目</label>
                    <div class="col-sm-6">
                        <p class="form-control-static col-sm-4 border" v-text="appinfo.subjectType_name.ch_name"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">教练</label>
                    <div class="col-sm-6">
                        <select name="coach" id="coach" class="form-control" v-model="appinfo.coach_id" @change="setCar_id">
                            <option v-for="coach in coachlist" v-bind:value="coach.coach_id">{{coach.coach_name}}</option>
                        </select>
                        <span id="coachhelp" class="help-block hidden">教练不能为空</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4 control-label">车牌号</label>
                    <div class="col-sm-6">
                    <select name="coach" id="coach" class="form-control" v-model="appinfo.car_id">
                        <option v-for="car in carlist" v-bind:value="car.car_id">{{car.plate_number}}</option>
                    </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="reason" class="col-sm-4 control-label">更换事由</label>
                    <div class="col-sm-6">
                        <textarea class="form-control  noempty" rows="3" id="reason" name="reason" v-model="appinfo.remake"></textarea>

                        <span id="reasonhelp" class="help-block hidden">事由不能为空</span>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-10">
                        <button type="button" class="btn btn-primary" v-on:click.prevent="subform">提交</button>
                    </div>
                </div>
            </form>
        </div>
        <table class="table table-bordered table-hover table-responsive" >
            <thead>

            <th >学号</th>
            <th >姓名</th>
            <th>原教练</th>
            <th>原车辆编号</th>
            <th>新教练</th>
            <th>新车辆编号</th>
            <th>申请时间</th>
            <!--<th >处理状态</th>-->
            <th >操作</th>
            </thead>
            <tbody>
            <tr v-for="item in applist">
                <td>{{item.student_id}}</td>
                <td>{{item.student_name}}</td>
                <td>{{item.coach_name}}</td>
                <td>{{item.car_id}}</td>
                <td>{{item.assing_coach_name}}</td>
                <td>{{item.assing_car_id}}</td>
                <td>{{item.assing_time}}</td>
                <!--<td>{{item.c_state|c_stateFilter}}</td>-->
                <td>
                    <a href="#" class="btn btn-info " data-toggle="modal" data-target="#myModal1" v-on:click="showremake(item)"><span
                            class="glyphicon glyphicon-menu-hamburger"
                            aria-hidden="true"></span>&nbsp;事由详情</a>
                    <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal1" v-on:click="setState(item,1)"><span
                            class="glyphicon glyphicon-pencil"
                            aria-hidden="true"></span>&nbsp;同意</a>
                    <a href="#" class="btn btn-danger " data-toggle="modal" data-target="#myModal1" v-on:click="setState(item,0)"><span
                            class="glyphicon glyphicon-remove"
                            aria-hidden="true"></span>&nbsp;退回</a>
                </td>
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
                <div class="modal-body" ><span v-text="message"></span></div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-primary" id="delstudent" v-on:click="toNext">下一步</button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 src="../html/default/admin/js/student/recoach.js">
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php }
}
