<?php
/* Smarty version 3.1.30, created on 2017-10-17 10:39:31
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/finance/chargeType.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e56d63566e83_50569003',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67224a264969dd030892245af6e52af153274e59' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/finance/chargeType.html',
      1 => 1507794175,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_59e56d63566e83_50569003 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">收费管理</a></li>
    <li class="active">费用管理</li>
</ol>


<div class="col-sm-8" id="app">

    <div class="regform clearfix">
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal" @click="clearEditApp"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;新增收费类型</a>

        <table class="table table-bordered table-hover">

            <thead>
            <tr> <h3 class="text-center">收费类型</h3></tr>

            <tr>
                <th>车型</th>
                <th>培训费</th>
                <th>制证费</th>
                <th>场地费</th>
                <th>资料费</th>
                <th>交通费</th>
                <th>保险费</th>
                <th>科目一</th>
                <th>科目二</th>
                <th>科目三</th>
                <th>科目四</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in stulist">
                <td>{{item.vehicle_type_name}}</td>
                <td>{{item.train}}</td>
                <td>{{item.	accreditation}}</td>
                <td>{{item.space}}</td>
                <td>{{item.datum}}</td>
                <td>{{item.traffic}}</td>
                <td>{{item.insurance}}</td>
                <td>{{item.subjectOne}}</td>
                <td>{{item.subjectTwo}}</td>
                <td>{{item.subjectThree}}</td>
                <td>{{item.subjectFour}}</td>
                <td>
                    <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal" @click="getStu(item)"><span class="glyphicon glyphicon-pencil"
                                                                                                          aria-hidden="true"></span>&nbsp;修改</a>
                </td>
            </tr>

            </tbody>
        </table>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:800px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="exampleModalLabel">收费信息</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="chargeinfo1">

                        <div class="form-group">
                            <label for="Vehicle_type" class="col-sm-2 control-label">准驾类型</label>
                            <div class="col-sm-10">
                                <input type="text" id="vehicle_type_name" class="form-control noempty" v-model="stuinfo.vehicle_type_name">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">培训费</label>
                            <div class="col-sm-4">
                                <input type="text" id="train" class="form-control noempty" v-model="stuinfo.train"><span class="help-block hidden">不能为空</span>
                            </div>
                            <label for="" class="col-sm-2 control-label">制证费</label>
                            <div class="col-sm-4">
                                <input type="text" id="accreditation" class="form-control noempty" v-model="stuinfo.accreditation"><span class="help-block hidden">不能为空</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">场地费</label>
                            <div class="col-sm-4">
                                <input type="text" id="space" class="form-control noempty" v-model="stuinfo.space"><span class="help-block hidden">不能为空</span>
                            </div>
                            <label for="" class="col-sm-2 control-label">资料费</label>
                            <div class="col-sm-4">
                                <input type="text" id="datum" class="form-control noempty" placeholder="汉语教材" v-model="stuinfo.datum"><span class="help-block hidden">不能为空</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label  class="col-sm-2 control-label">是否可选</label>
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="datum" value="true" v-model="stuinfo.datum_state"  > 是
                                    </label>
                                    <label>
                                        <input type="radio" name="datum" value="false" v-model="stuinfo.datum_state"  > 否
                                    </label>
                                </div>
                            </div>
                            <label  class="col-sm-2 control-label">非汉语资料</label>
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="nation" value="true" v-model="stuinfo.nation_state"  > 是
                                    </label>
                                    <label>
                                        <input type="radio" name="nation" value="false" v-model="stuinfo.nation_state"  > 否
                                    </label>
                                </div>
                            </div>
                        </div>

                        <template v-if="stuinfo.nation_state">
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">请选择民族</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" data-toggle="modal" data-target="#nationModel" v-model="stuinfo.nation.name">
                                </div>
                                <label for="" class="col-sm-2 control-label">民族资料费</label>
                                <div class="col-sm-4">
                                    <input type="text" id="nation" class="form-control noempty"  v-model="stuinfo.nation.money"><span class="help-block hidden">不能为空</span>
                                </div>
                            </div>
                        </template>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">交通费</label>
                            <div class="col-sm-4">
                                <input type="text" id="traffic" class="form-control noempty" v-model="stuinfo.traffic"><span class="help-block hidden">不能为空</span>
                            </div>
                            <label  class="col-sm-2 control-label">是否可选</label>
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label>
                                        <input type="radio"  name="traffic" value="true" v-model="stuinfo.traffic_state"  > 是
                                    </label>
                                    <label>
                                        <input type="radio" name="traffic"  value="false" v-model="stuinfo.traffic_state"  > 否
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">保险费</label>
                            <div class="col-sm-4">
                                <input type="text" id="insurance" class="form-control noempty" v-model="stuinfo.insurance"><span class="help-block hidden">不能为空</span>
                            </div>
                            <label  class="col-sm-2 control-label">是否可选</label>
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label>
                                        <input type="radio"  name="insurance" value="true" v-model="stuinfo.insurance_state"  > 是
                                    </label>
                                    <label>
                                        <input type="radio"  name="insurance" value="false" v-model="stuinfo.insurance_state"  > 否
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">优惠价格</label>
                            <div class="col-sm-4">
                                <input type="text" id="isDiscount_money" class="form-control noempty" v-model="stuinfo.isDiscount_money"><span class="help-block hidden">不能为空</span>
                            </div>
                            <label  class="col-sm-2 control-label">是否可选</label>
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label>
                                        <input type="radio"  name="isDiscount" value="true" v-model="stuinfo.isDiscount"  > 是
                                    </label>
                                    <label>
                                        <input type="radio"  name="isDiscount" value="false" v-model="stuinfo.isDiscount"  > 否
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">科目一考试</label>
                            <div class="col-sm-4">
                                <input type="text" id="subjectOne" class="form-control noempty" v-model="stuinfo.subjectOne"><span class="help-block hidden">不能为空</span>
                            </div>
                            <label for="" class="col-sm-2 control-label">科目二约车</label>
                            <div class="col-sm-4">
                                <input type="text" id="subjectTwo" class="form-control noempty" v-model="stuinfo.twoAboutPay"><span class="help-block hidden">不能为空</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">科目二考试</label>
                            <div class="col-sm-4">
                                <input type="text" id="subjectTwo" class="form-control noempty" v-model="stuinfo.subjectTwo"><span class="help-block hidden">不能为空</span>
                            </div>
                            <label for="" class="col-sm-2 control-label">科目三约车</label>
                            <div class="col-sm-4">
                                <input type="text" id="subjectTwo" class="form-control noempty" v-model="stuinfo.threeAboutPay"><span class="help-block hidden">不能为空</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">科目三考试</label>
                            <div class="col-sm-4">
                                <input type="text" id="subjectThree" class="form-control noempty" v-model="stuinfo.subjectThree"><span class="help-block hidden">不能为空</span>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">科目四考试</label>
                            <div class="col-sm-4">
                                <input type="text" id="subjectFour" class="form-control noempty" v-model="stuinfo.subjectFour"><span class="help-block hidden">不能为空</span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click.prevent="substuform">提交</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>

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
                <div class="modal-body" v-text="message"></div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-primary" id="delstudent" v-on:click="toNext">下一步</button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="nationModel" tabindex="-1" role="dialog" aria-labelledby="messageModelLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="">请选择民族</h4>
                </div>
                <div class="modal-body clearfix" >
                    <ul class="list-inline">
                        <li class="col-sm-3" v-for="nation in nationalList" @click="getnation(nation)">{{nation.nation}}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 src="../html/default/admin/js/finance/chargeType.js">
<?php echo '</script'; ?>
>




<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
