<?php
/* Smarty version 3.1.30, created on 2017-10-17 10:47:48
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/student/information.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e56f544960e3_89752421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efcf4274e5665ae2125dd52656e436bae43bc558' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/student/information.html',
      1 => 1507987205,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/student/studentinfo.html' => 1,
    'file:admin/student/PrintVoucher.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_59e56f544960e3_89752421 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">学员管理</a></li>
    <li class="active">学员信息</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">
        <h3><strong>学员信息</strong></h3>

        <form class="form-horizontal regform" role="form" action="" method="post"
              id="studentfind">
            <div class="form-group">
                <label for="national_id" class="col-sm-2 control-label">身份证号</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="national_id" name="national_id" placeholder="" v-model="find.national_id">
                </div>
                <label for="student_id" class="col-sm-2 control-label">学号</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="student_id" name="student_id" placeholder="" v-model="find.student_id">
                </div>

            </div>

            <!--<div class="form-group">-->
                <!--<label for="starttime" class="col-sm-2 control-label">入学时间</label>-->
                <!--<div class="col-sm-4">-->
                    <!--<input type="text" class="form-control findtime col-sm-4" id="starttime" name="starttime" v-model="find.starttime">-->
                <!--</div>-->
                <!--<label for="lasttime" class="col-sm-2 control-label">至</label>-->
                <!--<div class="col-sm-4">-->
                    <!--<input type="text" class="form-control findtime col-sm-4" id="lasttime" name="lasttime" v-model="find.lasttime">-->
                <!--</div>-->
            <!--</div>-->
            <div class="form-group">
                <label for="coachname" class="col-sm-2 control-label">教练</label>
                <div class="col-sm-4">
                    <select name="coach" id="coach" class="form-control" v-model="find.coach_id">
                        <option v-for="coach in coachlist.data" v-bind:value="coach.id">{{coach.name}}</option>
                    </select>
                </div>
                <div class="">
                    <button type="button" class="btn btn-success" v-on:click="findlist">查询</button>
                    <button type="button" class="btn btn-info" v-on:click="find_graduation">查询结业学员</button>
                    <!--<button type="button" class="btn btn-success" v-on:click="findlist">查询退学学员</button>-->
                </div>
            </div>

        </form>

        <div class="regform">
            <table class="table table-bordered table-hover table-responsive" >
                <thead>
                <th >学号</th>
                <th >姓名</th>
                <td>教练名称</td>
                <td>考驾类型</td>
                <th >证件号码</th>
                <th >注册时间</th>
                <th >科一状态</th>
                <th >科二状态</th>
                <th >科三状态</th>
                <th >科四状态</th>
                <th >操作</th>
                </thead>
                <tbody>
                <tr v-for="item in applists.job.data">
                    <td>{{item.student_id}}</td>
                    <td>{{item.name}}</td>
                    <td>{{item.coach_name}}</td>
                    <td>{{item.vehicle_type}}</td>
                    <td>{{item.national_id}}</td>
                    <td>{{item.reg_time}}</td>
                    <td>{{item.subjectOneState | stateText}}</td>
                    <td>{{item.subjectTwoState | stateText}}</td>
                    <td>{{item.subjectThreeState | stateText}}</td>
                    <td>{{item.subjectFourState | stateText}}</td>
                    <td>
                        <a href="#" class="btn btn-info " data-toggle="modal" data-target="#myModal2" v-on:click="getInfo(item)"><span
                                class="glyphicon glyphicon-pencil"
                                aria-hidden="true"></span>&nbsp;详情</a>
                        <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal" v-on:click="getInfo(item)"><span
                                class="glyphicon glyphicon-pencil"
                                aria-hidden="true"></span>&nbsp;修改</a>
                        <a href="#" class="btn btn-danger "   v-on:click="hetonprint(item)"><span
                                class="glyphicon glyphicon-print"
                                aria-hidden="true" v-on:click="hetonprint(item)"></span>&nbsp;打印合同</a>
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
    <?php $_smarty_tpl->_subTemplateRender("file:admin/student/studentinfo.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                <p class="form-control-static border" v-text="appinfo.name"></p>
                            </div>
                            <label for="student_id" class="col-sm-2 control-label">学号</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.student_id"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">是否vip</label>
                            <div class="col-sm-4">
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="1" name="vip"  v-model="appinfo.isvip" disabled> 是
                                    </label>
                                    <label>
                                        <input type="radio" value="0" name="vip" checked="checked" v-model="appinfo.isvip" disabled> 否
                                    </label>
                                </div>
                            </div>
                            <label for="sex" class="col-sm-2 control-label" >性别</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="studentSex"></p>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="nationality" class="col-sm-2 control-label" >国籍</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.nationality"></p>
                            </div>
                            <label for="CertificateType" class="col-sm-2 control-label" >证件类型</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" >居民身份证</p>
                                <!--<input type="text" class="form-control noempty" id="CertificateType" name="certificatetype" disabled  placeholder="居民身份证" value="居民身份证" v-model="appinfo.certificatetype">-->
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="national_id2" class="col-sm-2 control-label" >身份证号</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.national_id"></p>
                            </div>
                            <label for="nation" class="col-sm-2 control-label">民族</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.nation"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="postalcode" class="col-sm-2 control-label">邮编</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.postalcode"></p>
                            </div>
                            <label for="address" class="col-sm-2 control-label">邮寄地址</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.address"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="birthday" class="col-sm-2 control-label">出生日期</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.birthday"></p>
                            </div>
                            <label for="tel" class="col-sm-2 control-label">固定电话</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.tel"></p>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="phone" class="col-sm-2 control-label">手机号码</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.phone"></p>
                            </div>
                            <label for="email" class="col-sm-2 control-label">邮箱</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.email"></p>
                            </div>
                        </div>


                        <div class="form-group">
                            <label  class="col-sm-2 control-label">准驾车型</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.vehicle_type"></p>
                            </div>
                            <label for="" class="col-sm-2 control-label">教练</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.coach_name"></p>
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
                                <p class="form-control-static border" v-text="statejudge(appinfo.subjectOneState)"></p>
                            </div>
                            <label for="subjectOneAdoptTime" class="col-sm-2 control-label">通过时间</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.subjectOneAdoptTime"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subjectTwoState" class="col-sm-2 control-label">科目二状态</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="statejudge(appinfo.subjectTwoState)"></p>
                            </div>
                            <label for="subjectTwoAdoptTime" class="col-sm-2 control-label">通过时间</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.subjectTwoAdoptTime"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subjectThreeState" class="col-sm-2 control-label">科目三状态</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="statejudge(appinfo.subjectThreeState)"></p>

                            </div>
                            <label for="subjectThreeAdoptTime" class="col-sm-2 control-label">通过时间</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.subjectThreeAdoptTime"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subjectFourState" class="col-sm-2 control-label">科目四状态</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="statejudge(appinfo.subjectFourState)"></p>
                            </div>
                            <label for="subjectFourAdoptTime" class="col-sm-2 control-label">通过时间</label>
                            <div class="col-sm-4">
                                <p class="form-control-static border" v-text="appinfo.subjectFourAdoptTime"></p>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">确认删除该学员？<span id="stname"></span></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="delstudent" v-on:click="setState">提交更改</button>
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
                <div class="modal-body" v-text="message"></div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-primary" id="delstudent" v-on:click="toNext">下一步</button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>

    <?php $_smarty_tpl->_subTemplateRender("file:admin/student/PrintVoucher.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


</div>

<?php echo '<script'; ?>
 src="../html/default/js/LodopFuncs.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="../html/default/admin/js/student/information.js">

<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
