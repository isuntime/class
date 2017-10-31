<?php
/* Smarty version 3.1.30, created on 2017-10-17 10:47:48
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/student/studentinfo.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e56f544c7391_87822216',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '075a8c2228172e43400829f175b9441809017c68' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/student/studentinfo.html',
      1 => 1507794194,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e56f544c7391_87822216 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:800px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel">学员信息</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="studentinfo">

                    <div class="form-group">
                        <label for="studentname" class="col-sm-2 control-label">姓名</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="studentname" name="name"
                                   placeholder="学员姓名" v-model="appinfo.name"><span id="namehelp" class="help-block hidden">姓名不能为空</span>
                        </div>
                        <label for="student_id" class="col-sm-2 control-label">学号</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="student_id" name="student_id"
                                   placeholder="学号" v-model="appinfo.student_id" disabled>
                            <span id="sidhelp" class="help-block hidden">学号不能为空</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">是否vip</label>
                        <div class="col-sm-4">
                            <div class="radio">
                                <label>
                                    <input type="radio" value="1" name="vip"  v-model="appinfo.isvip"> 是
                                </label>
                                <label>
                                    <input type="radio" value="0" name="vip" checked="checked" v-model="appinfo.isvip"> 否
                                </label>
                            </div>
                        </div>
                        <label for="sex" class="col-sm-2 control-label" >性别</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="sex" name="sex" placeholder="性别" v-model="studentSex" disabled>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="nationality" class="col-sm-2 control-label" >国籍</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="nationality" name="nationality" disabled placeholder="国籍" value="中国" v-model="appinfo.nationality">
                        </div>
                        <label for="CertificateType" class="col-sm-2 control-label" >证件类型</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="CertificateType" name="certificatetype" disabled  placeholder="居民身份证" value="居民身份证" v-model="appinfo.certificatetype">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="national_id2" class="col-sm-2 control-label" >身份证号</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="national_id2" name="national_id" disabled  placeholder="身份证号" v-model="appinfo.national_id">
                        </div>
                        <label for="nation" class="col-sm-2 control-label">民族</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="nation" name="nation" disabled  placeholder="民族"  v-model="appinfo.nation">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="postalcode" class="col-sm-2 control-label">邮编</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="postalcode" name="postalcode" value="833400" placeholder="邮编"  v-model="appinfo.postalcode">
                            <span id="postalcodehelp" class="help-block hidden">邮编不能为空</span>
                        </div>
                        <label for="address" class="col-sm-2 control-label">邮寄地址</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty" id="address" name="address" placeholder="邮寄住址"  v-model="appinfo.address">
                            <span id="addresshelp" class="help-block hidden">地址不能为空</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="birthday" class="col-sm-2 control-label">出生日期</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control noempty findtime" id="birthday" name="birthday"  disabled  placeholder="出生日期"  v-model="appinfo.birthday">
                            <span id="birthdayhelp" class="help-block hidden">生日不能为空</span>
                        </div>
                        <label for="tel" class="col-sm-2 control-label">固定电话</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="tel" name="tel" placeholder="固定电话" v-model="appinfo.tel">
                            <span id="telhelp" class="help-block hidden">固定电话不能为空</span>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="phone" class="col-sm-2 control-label">手机号码</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control  noempty" id="phone" name="phone" placeholder="手机号码" v-model="appinfo.phone">
                            <span id="phonehelp" class="help-block hidden">手机号码不能为空</span>
                        </div>
                        <label for="email" class="col-sm-2 control-label">邮箱</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="email" name="email" placeholder="邮箱" v-model="appinfo.email">
                            <span id="emhelp" class="help-block hidden">邮箱不能为空</span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label  class="col-sm-2 control-label">准驾车型</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control"  disabled   v-model="appinfo.vehicle_type">
                        </div>
                        <label for="" class="col-sm-2 control-label">教练</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control"  disabled   v-model="appinfo.coach_name">
                        </div>
                    </div>

                    <!--<div class="form-group">-->
                        <!--<label for="regtime" class="col-sm-2 control-label">入学时间</label>-->
                        <!--<div class="col-sm-10">-->
                            <!--<input type="text" class="form-control findtime" id="regtime" name="regtime"  disabled  v-model="appinfo.reg_time">-->
                        <!--</div>-->
                    <!--</div>-->

                    <div class="form-group">
                        <label for="subjectOneState" class="col-sm-2 control-label">科目一状态</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control " id="subjectOneState" name="subjectOneState" placeholder="" disabled v-model="statejudge(appinfo.subjectOneState)">
                        </div>
                        <label for="subjectOneAdoptTime" class="col-sm-2 control-label">通过时间</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control findtime" id="subjectOneAdoptTime" name="subjectOneAdoptTime" disabled v-model="appinfo.subjectOneAdoptTime">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subjectTwoState" class="col-sm-2 control-label">科目二状态</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control " id="subjectTwoState" name="subjectTwoState" placeholder="" disabled v-model="statejudge(appinfo.subjectTwoState)">

                        </div>
                        <label for="subjectTwoAdoptTime" class="col-sm-2 control-label">通过时间</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control findtime" id="subjectTwoAdoptTime" name="subjectTwoAdoptTime" disabled v-model="appinfo.subjectTwoAdoptTime">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subjectThreeState" class="col-sm-2 control-label">科目三状态</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control " id="subjectThreeState" name="subjectThreeState" placeholder="" disabled v-model="statejudge(appinfo.subjectThreeState)">

                        </div>
                        <label for="subjectThreeAdoptTime" class="col-sm-2 control-label">通过时间</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control findtime" id="subjectThreeAdoptTime" name="subjectThreeAdoptTime" disabled v-model="appinfo.subjectThreeAdoptTime">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subjectFourState" class="col-sm-2 control-label">科目四状态</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="subjectFourState" name="subjectFourState" placeholder="" disabled v-model="statejudge(appinfo.subjectFourState)">

                        </div>
                        <label for="subjectFourAdoptTime" class="col-sm-2 control-label">通过时间</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control findtime" id="subjectFourAdoptTime" name="subjectFourAdoptTime" disabled v-model="appinfo.subjectFourAdoptTime">
                        </div>
                    </div>
                  
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" form="studentinfo" v-on:click.prevent="subform">提交</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>

            </div>
        </div>
    </div>
</div><?php }
}
