<?php
/* Smarty version 3.1.30, created on 2017-09-29 13:39:13
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/vehicletype.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59cddc81c99ae7_70986675',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce9a80a4413ba5c3564c63d789ad784e8521171c' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/vehicletype.html',
      1 => 1506663547,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_59cddc81c99ae7_70986675 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">学员管理</a></li>
    <li class="active">更换准驾类型</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">
        <div class="col-sm-8">

            <form class="form-horizontal"  id="recarform">
                <h1 class="center-block text-center">更换准驾类型</h1>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">身份证号码</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control  noempty" id="national_id" name="national_id"
                               v-model="appinfo.national_id">
                    </div>
                    <div class="col-sm-2"><button type="button" class="btn btn-default" @click="nameFilter">查询</button></div>

                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">姓名</label>
                    <div class="col-sm-6">
                        <p class="form-control-static col-sm-4 border" v-text="appinfo.name"></p>
                    </div>
                </div>

                <div class="form-group">

                <label for="" class="col-sm-3 control-label">学号</label>
                <div class="col-sm-6">
                    <p class="form-control-static col-sm-4 border" v-text="appinfo.student_id"></p>
                </div>
                </div>
                <div class="form-group">

                    <label for="" class="col-sm-3 control-label">原准驾类型</label>
                    <div class="col-sm-6">
                        <p class="form-control-static col-sm-4 border" v-text="appinfo.vehicle_type"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">更改准驾车型</label>
                    <div class="col-sm-8">
                        <div class="radio" >
                            <label v-for="(type,index) in vehicle_typelist">
                                <input type="radio" v-bind:value="type.id" v-model="appinfo.new_vehicle_type">{{type.vehicle_type_name}}&nbsp;
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="reason" class="col-sm-3 control-label">更换事由</label>
                    <div class="col-sm-6">
                        <textarea class="form-control noempty" rows="3" id="reason" name="reason" v-model="appinfo.remake"></textarea>

                        <span id="reasonhelp" class="help-block hidden">事由不能为空</span>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-primary" v-on:click.prevent="subform">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table class="table table-bordered table-hover table-responsive" >
        <thead>

        <th >学号</th>
        <th >姓名</th>
        <th>原准驾类型</th>
        <th>新准驾类型</th>
        <th>申请时间</th>
        <!--<th >处理状态</th>-->
        <th >操作</th>
        </thead>
        <tbody>
        <tr v-for="item in applist">
            <td>{{item.student_id}}</td>
            <td>{{item.student_name}}</td>
            <td>{{item.car_id}}</td>
            <td>{{item.assing_coach_name}}</td>
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
<?php echo '<script'; ?>
 src="../html/default/admin/js/student/vehicletype.js">
<?php echo '</script'; ?>
>



<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php }
}
