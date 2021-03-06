<?php
/* Smarty version 3.1.30, created on 2017-10-17 10:40:44
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/finance/comPay.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e56dac1e4951_94173726',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca67eca00ab0588ddd906eaa8a21d6005cdc2aae' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/finance/comPay.html',
      1 => 1508051810,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e56dac1e4951_94173726 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form class="form-horizontal" id="paymentform">
    <h1 class="center-block text-center">学员缴费</h1>

    <div class="form-group">
        <label for="student_id" class="col-sm-3 control-label">学号</label>
        <div class="col-sm-6">
            <input type="text" class="form-control noempty" id="student_id" name="student_id"
                   placeholder="学号" v-model="appinfo.student_id" @change="nameFilter" disabled>
            <span id="sidhelp" class="help-block hidden">不能为空</span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">准驾车型</label>
        <div class="col-sm-6">
            <p class="form-control-static col-sm-4" v-text="appinfo.vehicle_type_name"></p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">基本费用</label>
        <div class="col-sm-6">
            <p class="form-control-static col-sm-4" v-text="">培训费: {{appinfo.train}}元</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">代收费用</label>
        <div class="col-sm-6">
            <p class="form-control-static col-sm-4" v-text="">制证费: {{appinfo.accreditation}}元</p>
            <p class="form-control-static col-sm-4" v-text="">场地费: {{appinfo.space}}元</p>
        </div>
    </div>
    <template v-if="nationalState">
        <div class="form-group">
            <label class="col-sm-3 control-label">请选择民族</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" data-toggle="modal" data-target="#nationModel"
                       v-model="appinfo.nation.name">
                <span id="helpBlock2" class="text-danger">如果选择非汉语版资料就不要选择下方资料费</span>
            </div>
        </div>
    </template>
    <div class="form-group">
        <label class="col-sm-3 control-label">可选费用</label>
        <div class="col-sm-6">
            <div class="checkbox">
                <label for="datum">
                    <input type="checkbox" name="datum" id="datum" v-model="appinfo.datum.state"
                           v-bind:value="appinfo.datum.money" @change="sumMoney"
                           v-bind:disabled="appinfo.datum.d_state"> 资料费: {{appinfo.datum.money}}元
                </label>


                <label for="traffic">
                    <input type="checkbox" id="traffic" name="traffic" v-model="appinfo.traffic.state"
                           v-bind:value="appinfo.traffic.money" @change="sumMoney"
                           v-bind:disabled="appinfo.traffic.d_state"> 交通费: {{appinfo.traffic.money}}元
                </label>
                <label for="insurance">
                    <input type="checkbox" id="insurance"  name="insurance"v-model="appinfo.insurance.state"
                           v-bind:value="appinfo.insurance.money" @change="sumMoney"
                           v-bind:disabled="appinfo.insurance.d_state"> 保险费: {{appinfo.insurance.money}}元

                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">是否优惠</label>
        <div class="col-sm-6">
            <div class="radio">
                <label>
                    <input type="radio" name="isD" value="true" v-model="appinfo.isDiscount.state" @change="sumMoney"
                           v-bind:disabled="appinfo.isDiscount.d_state"> 是
                </label>
                <label>
                    <input type="radio" name="isD" value="false" v-model="appinfo.isDiscount.state" @change="sumMoney"
                           v-bind:disabled="appinfo.isDiscount.d_state"> 否
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="sumMoney" class="col-sm-3 control-label">总计</label>
        <div class="col-sm-6">
            <input type="text" class="form-control noempty" id="sumMoney" name="sumMoney"
                   placeholder="" v-model="appinfo.total" disabled>
        </div>
    </div>

    <!--<div class="form-group">-->
    <!--<div class="col-sm-offset-3 col-sm-9">-->
    <!--<button type="button" class="btn btn-primary" @click="subform">缴费</button>-->
    <!--</div>-->
    <!--</div>-->
</form>


<div class="modal fade" id="nationModel" tabindex="-1" role="dialog" aria-labelledby="messageModelLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" aria-hidden="true" onclick="$('#nationModel').modal('hide');">×</button>
                <h4 class="modal-title" id="">请选择民族</h4>
            </div>
            <div class="modal-body clearfix">
                <ul class="list-inline">
                    <li class="col-sm-3" v-for="nation in nationalList" @click="getnation(nation)">{{nation.nation}}
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="$('#nationModel').modal('hide');">关闭</button>

            </div>
        </div>
    </div>
</div>




<?php }
}
