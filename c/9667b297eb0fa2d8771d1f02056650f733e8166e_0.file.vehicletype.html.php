<?php
/* Smarty version 3.1.30, created on 2017-10-21 22:18:01
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/student/vehicletype.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59eb57194bd966_15677533',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9667b297eb0fa2d8771d1f02056650f733e8166e' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/student/vehicletype.html',
      1 => 1508595452,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_59eb57194bd966_15677533 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">学员管理</a></li>
    <li class="active">更换准驾类型</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">
        <div class="col-sm-6">

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
                                <input name='new_vehicle_type' type="radio" v-bind:value="type.id" v-model="appinfo.new_vehicle_type" :disabled="appinfo.vehicle_type_id==type.id">{{type.vehicle_type_name}}&nbsp;
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
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="button" class="btn btn-primary" v-on:click.prevent="subform">提交</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-6">
            <select name="" id="" style="height: 34px;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555555;background-color: #ffffff;background-image: none;border: 1px solid #cccccc;border-radius: 4px;" v-model="pay_state">
                <option value="0">未处理</option>
                <option value="1">已处理</option>
            </select>
            <table class="table table-bordered table-hover table-responsive" >
                <thead>

                <th >学号</th>
                <th >姓名</th>
                <th >证件号码</th>
                <th>原准驾类型</th>
                <th>新准驾类型</th>
                <th>相关费用</th>
                <th>申请时间</th>
                <!--<th >处理状态</th>-->
                <th >操作</th>
                </thead>
                <tbody>
                <tr v-for="item in applists.job.data">
                    <td>{{item.student_id}}</td>
                    <td>{{item.student_name}}</td>
                    <td>{{item.national_id}}</td>
                    <td>{{item.old_vehicle}}</td>
                    <td>{{item.now_vehicle}}</td>
                    <td>￥: {{item.ac_num}}.00</td>
                    <td>{{item.c_time}}</td>
                    <!--<td>{{item.c_state|c_stateFilter}}</td>-->
                    <td>
                        <a href="#" class="btn btn-info " data-toggle="modal" data-target="#myModal1" v-on:click="showremake(item)"><span
                                class="glyphicon glyphicon-menu-hamburger"
                                aria-hidden="true"></span>&nbsp;事由详情</a>
                        <!--<a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal1" v-on:click="setState(item,1)"><span-->
                                <!--class="glyphicon glyphicon-pencil"-->
                                <!--aria-hidden="true"></span>&nbsp;同意</a>-->
                        <!--<a href="#" class="btn btn-danger " data-toggle="modal" data-target="#myModal1" v-on:click="setState(item,0)"><span-->
                                <!--class="glyphicon glyphicon-remove"-->
                                <!--aria-hidden="true"></span>&nbsp;退回</a>-->
                    </td>
                </tr>

                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <li  @click="pageMinus(applists.job.pageIndex,gotoJob)" ><a href="#">上一页</a></li>
                    <li v-for="(item,index) in applists.job.pageAll" v-bind:class="{ 'active': applists.job.pageIndex == index}" @click="gotoJob(index)"><a href="#">{{index+1}} <span class="sr-only"></span></a></li>
                    <li @click="pagePlus(applists.job.pageIndex,gotoJob)"><a href="#" >下一页</a></li>
                </ul>
            </nav>
        </div>
    </div>



    <div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="width:900px;">
                <div class="modal-header bg-blue">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title " id="myModaLabel">费用统计</h3>
                </div>
                <div class="modal-body">
                    <form action="" id="resultinoutform" class="form-horizontal">
                        <table class="table table-bordered table-responsive" class="col-sm-offset-1 col-sm-10" style="width:100%;table-layout:fixed">

                            <tr>
                                <td class="col-sm-3">姓名</td>
                                <td class="col-sm-3">{{paydata.name}}</td>
                                <td class="col-sm-3">性别</td>
                                <td class="col-sm-3">{{paydata.sex|studentSex}}</td>
                                <td class="col-sm-3">联系电话</td>
                                <td class="col-sm-3">{{paydata.tel}}</td>
                            </tr>
                            <tr>
                                <td class="col-sm-3">证件类型</td>
                                <td class="col-sm-3">{{paydata.certificatetype|certificatetype}}</td>
                                <td class="col-sm-3">身份证号码</td>
                                <td class="col-sm-3">{{paydata.national_id}}</td>
                                <td class="col-sm-3">通讯地址</td>
                                <td class="col-sm-3" style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;">{{paydata.address}}</td>
                            </tr>
                            <tr style="background-color: #DADADA;border-bottom:solid 2px #090909;">
                                <td class="col-sm-3">当前准驾类型</td>
                                <td class="col-sm-3">{{paydata.vehicle_type}}</td>
                                <td class="col-sm-3">变更准驾类型</td>
                                <td class="col-sm-3">{{paydata.n_type_name}}</td>
                                <td class="col-sm-3"></td>
                                <td class="col-sm-3"></td>
                            </tr>
                            <tr style="background-color: #E6E6E6;">
                                <td class="col-sm-3">场地费用</td>
                                <td class="col-sm-3">￥:{{paydata.space}}.00</td>
                                <td class="col-sm-3">交通费用</td>
                                <td class="col-sm-3">￥:{{paydata.traffic}}.00</td>
                                <td class="col-sm-3">保险费用</td>
                                <td class="col-sm-3">￥:{{paydata.insurance}}.00</td>
                                
                            </tr>
                            <tr style="background-color: #E6E6E6;">
                                <td class="col-sm-3">制证费用</td>
                                <td class="col-sm-3">￥:{{paydata.accreditation}}.00</td>
                                <td class="col-sm-3">资料费用</td>
                                <td class="col-sm-3">￥:{{paydata.datum}}.00</td>
                                <td class="col-sm-3">培训费用</td>
                                <td class="col-sm-3">￥:{{paydata.train}}.00</td>
                            </tr>
                            <tr style="background-color: #E6E6E6;">
                                <td class="col-sm-3">折扣优惠</td>
                                <td class="col-sm-3">￥:{{paydata.isDiscount}}.00</td>
                                <td class="col-sm-3">支付状态</td>
                                <td class="col-sm-3">{{paydata.pay_state|vipFileter}}</td>
                                <td class="col-sm-3">支付金额</td>
                                <td class="col-sm-3">￥:{{paydata.total}}.00</td>
                            </tr>

                            <tr style="background-color: #DADADA;">
                                <td class="col-sm-3">场地费用</td>
                                <td class="col-sm-3">￥:{{paydata.n_space}}.00</td>
                                <td class="col-sm-3">交通费用</td>
                                <td class="col-sm-3">￥:{{paydata.n_traffic}}.00</td>
                                <td class="col-sm-3">保险费用</td>
                                <td class="col-sm-3">￥:{{paydata.n_insurance}}.00</td>>
                            </tr>
                            <tr style="background-color: #DADADA;">
                                <td class="col-sm-3">制证费用</td>
                                <td class="col-sm-3">￥:{{paydata.n_accreditation}}.00</td>
                                <td class="col-sm-3">资料费用</td>
                                <td class="col-sm-3">￥:{{paydata.n_datum}}.00</td>
                                <td class="col-sm-3">培训费用</td>
                                <td class="col-sm-3">￥:{{paydata.n_train}}.00</td>>
                            </tr>
                            <tr style="background-color: #DADADA;">
                                <td class="col-sm-3">优惠折扣</td>
                                <td class="col-sm-3">￥:{{paydata.n_isDiscount_money}}.00</td>
                                <td class="col-sm-3"></td>
                                <td class="col-sm-3"></td>
                                <td class="col-sm-3">所需费用</td>
                                <td class="col-sm-3">￥:{{paydata.n_total}}.00</td>>
                            </tr>
                            <tr class="danger">
                                <td class="col-sm-4">补缴金额</td>
                                <td class="col-sm-6">
                                    <div>
                                        <input type="text" class="form-control noempty" id="ac_num" name="ac_num" placeholder="" :value="chajia" v-model="paydata.ac_num">

                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="delstudent" form="resultinoutform" v-on:click.prevent="paySub">提交</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
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
                <div class="modal-body" v-text="messages"></div>
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
