<?php
/* Smarty version 3.1.30, created on 2017-10-21 22:25:13
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/vehicle/carinfo.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59eb58c9889862_71125187',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cc3f99391f4c1bdcdb793c333f0c0112df1d261e' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/vehicle/carinfo.html',
      1 => 1507794197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59eb58c9889862_71125187 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel">车辆信息</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="carinfo">

                    <div class="form-group">
                        <label for="plate_number" class="col-sm-2 control-label">车牌号</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="plate_number" name="plate_number"
                                   placeholder="" v-model="appinfo.plate_number"><span id="plate_numberhelp" class="help-block hidden">不能为空</span>
                        </div>
                        <label for="brand" class="col-sm-2 control-label">车型</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="brand" name="brand"
                                   placeholder="" v-model="appinfo.brand"><span id="brandhelp" class="help-block hidden">不能为空</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Engine_number" class="col-sm-2 control-label">发动机号</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="Engine_number" name="Engine_number"
                                   placeholder="" v-model="appinfo.Engine_number"><span id="Engine_numberhelp" class="help-block hidden">不能为空</span>
                        </div>
                        <label for="Frame_number" class="col-sm-2 control-label">车架号</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="Frame_number" name="Frame_number"
                                   placeholder="" v-model="appinfo.Frame_number"><span id="Frame_numberhelp" class="help-block hidden">不能为空</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="car_type" class="col-sm-2 control-label">车辆类型</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="car_type" name="car_type"
                                   placeholder="" v-model="appinfo.car_type"><span id="car_typehelp" class="help-block hidden">不能为空</span>
                        </div>
                        <label for="Vehicle_type" class="col-sm-2 control-label">准驾类型</label>
                        <div class="col-sm-4">
                            <select name="Vehicle_type" id="Vehicle_type" class="form-control noempty" v-model="appinfo.Vehicle_type">
                                <option v-for="vt in Vehicle_typeList" v-bind:value="vt.id" selected>{{vt.vehicle_type_name}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="regtime" class="col-sm-2 control-label">营运证注册时间</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control findtime noempty" id="taxiregtime" name="regtime" v-model="appinfo.taxiregtime">
                        </div>
                        <label for="Annual_examination_time" class="col-sm-2 control-label">年审时间</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control findtime noempty" id="Annual_examination_time1" name="Annual_examination_time" v-model="appinfo.Annual_examination_time">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="two_guaranteed_time" class="col-sm-2 control-label">二保时间</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control findtime noempty" id="two_guaranteed_time" name="two_guaranteed_time" v-model="appinfo.two_guaranteed_time">
                        </div>
                        <label for="Cylinder_detection_time" class="col-sm-2 control-label">气瓶检测时间</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control findtime noempty" id="Cylinder_detection_time" name="Cylinder_detection_time" v-model="appinfo.Cylinder_detection_time">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Insurance_period" class="col-sm-2 control-label">保险期限</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="Insurance_period" name="Insurance_period" placeholder="请填入天数" v-model="appinfo.Insurance_period">
                        </div>
                        <label for="Insurance_number" class="col-sm-2 control-label">保险编号</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="Insurance_number" name="Insurance_number"
                                   placeholder="" v-model="appinfo.Insurance_number"><span id="car_typehelp" class="help-block hidden">不能为空</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Insurance_company" class="col-sm-2 control-label">保险公司</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="Insurance_company" name="Insurance_company" v-model="appinfo.Insurance_company">
                        </div>
                        <label for="coachname1" class="col-sm-2 control-label">教练</label>
                        <div class="col-sm-4">
                            <select name="coach" id="coach" class="form-control" v-model="appinfo.coach_id">
                                <option v-for="coach in coachlist" v-bind:value="coach.id">{{coach.name}}</option>
                            </select>
                            <span id="coachhelp" class="help-block hidden">教练不能为空</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-2 control-label">是否安装计时仪</label>
                        <div class="col-sm-4">
                            <select name="InstallChronograph" id="InstallChronograph" class="form-control noempty" v-model="appinfo.InstallChronograph">
                                <option value="1" selected>是</option>
                                <option value="0" >否</option>
                            </select>
                        </div>
                        <label  class="col-sm-2 control-label">是否合格</label>
                        <div class="col-sm-4">
                            <select name="carstate" id="carstate" class="form-control noempty" v-model="appinfo.carstate">
                                <option value="1" selected>是</option>
                                <option value="0" >否</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="remark" class="col-sm-2 control-label">备注</label>
                        <div class="col-sm-6">
                            <textarea class="form-control " rows="3" id="remark" name="remark" v-model="appinfo.remark"></textarea>


                        </div>
                    </div>




                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" form="carinfo"  v-on:click="subform">提交</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>

            </div>
        </div>
    </div>
</div><?php }
}
