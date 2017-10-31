<?php
/* Smarty version 3.1.30, created on 2017-10-17 14:18:29
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/student/achievement.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e5a0b51b5da9_73690941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6c000032a4688840f1688c00b27649a4db01c71' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/student/achievement.html',
      1 => 1508221104,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e5a0b51b5da9_73690941 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-sm-8" id="app">
    <div class="regform">
        <h3><strong>成绩查询</strong></h3>

        <form class="form-inline regform" role="form" action="" method="post" id="studentfind">
            <div class="form-group">
                <label for="national_id">身份证号</label>

                <input type="text" class="form-control" name="national_id" placeholder="" v-model="find.national_id">
                <label for="student_id">学号</label>

                <input type="text" class="form-control" name="student_id" placeholder="" v-model="find.student_id">



            </div>

            <div class="form-group">
                <label for="coach">教练</label>

                <select name="coach" class="form-control" v-model="find.coach_id">
                    <option v-for="coach in coachlist.data" v-bind:value="coach.id">{{coach.name}}</option>
                </select>


                <button type="button" class="btn btn-success" v-on:click="findlist">查询</button>

            </div>

        </form>

        <div class="regform">
            <table class="table table-bordered table-hover ">
                <thead>
                    <td>学号</td>
                    <td>姓名</td>
                    <td>考驾类型</td>
                    <td>证件号码</td>
                    <td>科一成绩</td>
                    <td>通过时间</td>
                    <td>科二成绩</td>
                    <td>通过时间</td>
                    <td>科三成绩</td>
                    <td>通过时间</td>
                    <td>科四成绩</td>
                    <td>通过时间</td>
                    <td>操作</td>
                </thead>
                <tbody>
                    <tr v-for="item in applists.job.data">
                        <td v-text="item.student_id"></td>
                        <td v-text="item.name"></td>
                        <td v-text="item.vehicle_type"></td>
                        <td v-text="item.national_id"></td>
                        <td v-text="item.subjectone_ac_num.point"></td>
                        <td v-text="item.subjectOneAdoptTime"></td>
                        <td v-text="item.subjectwo_ac_num.point"></td>
                        <td v-text="item.subjectOneAdoptTime"></td>
                        <td v-text="item.subjecthree_ac_num.point"></td>
                        <td v-text="item.subjectOneAdoptTime"></td>
                        <td v-text="item.subjecfour_ac_num.point"></td>
                        <td v-text="item.subjectOneAdoptTime"></td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" v-on:click="ResultInput(item)">成绩录入</button>
                        <!--<a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal" v-on:click="getInfo(item)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp补考申请</a>-->
                        </td>
                    </tr>

                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <li @click="pageMinus(applists.job.pageIndex,gotoJob)"><a href="#">上一页</a></li>
                    <li v-for="(item,index) in applists.job.pageAll" v-bind:class="{ 'active': applists.job.pageIndex == index}" @click="gotoJob(index)"><a href="#">{{index+1}} <span class="sr-only"></span></a></li>
                    <li @click="pagePlus(applists.job.pageIndex,gotoJob)"><a href="#">下一页</a></li>
                </ul>
            </nav>
        </div>
    </div>



    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title " id="myModaLabel">成绩录入</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="resultinoutform">
                        <table class="table table-bordered table-responsive" class="col-sm-offset-1 col-sm-10">
                            <tr>
                                <td class="col-sm-4">身份证号</td>
                                <td class="col-sm-6">
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control noempty" id="student_id" name="student_id" placeholder="" v-model="appinfo.national_id">

                                    </div>
                                    <div class="col-sm-2"><button type="button" class="btn btn-default" @click="nameFilter">查询</button></div>
                                </td>

                            </tr>
                            <tr>
                                <td class="col-sm-4">姓名</td>
                                <td class="col-sm-6">  {{appinfo.name}}</td>
                            </tr>
                            <tr>
                                <td class="col-sm-4">身份证号码</td>
                                <td class="col-sm-6">  {{appinfo.national_id}}</td>
                            </tr>
                            <tr>
                                <td class="col-sm-4">考试科目</td>
                                <td class="col-sm-6">  {{appinfo.ch_name}}</td>
                            </tr>
                            <tr>
                                <td class="col-sm-4">成绩</td>
                                <td class="col-sm-6">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control noempty" id="ac_num" name="ac_num" placeholder="成绩" v-model.lazy="appinfo.ac_num">

                                    </div>
                                </td>
                            </tr>
                        </table>
                        <!--<div class="form-group">-->
                        <!--<label for="student_id" class="col-sm-3 control-label">学号</label>-->
                        <!--<div class="col-sm-6">-->
                        <!--<input type="text" class="form-control noempty" id="student_id" name="student_id"-->
                        <!--placeholder="" v-model="appinfo.student_id" >-->

                        <!--</div>-->
                        <!--<div class="col-sm-2"><button type="button" class="btn btn-default" @click="nameFilter">查询</button></div>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--<label for="" class="col-sm-3 control-label"></label>-->
                        <!--<div class="col-sm-6">-->
                        <!--<p class="form-control-static" v-text=""> {{appinfo.name}}</p>-->
                        <!--</div>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--<label for="" class="col-sm-3 control-label">身份证号码</label>-->
                        <!--<div class="col-sm-6">-->
                        <!--<p class="form-control-static" v-text=""> {{appinfo.national_id}}</p>-->
                        <!--</div>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                        <!--<label for="" class="col-sm-3 control-label">考试科目</label>-->
                        <!--<div class="col-sm-6">-->
                        <!--<p class="form-control-static" v-text=""> {{appinfo.subject_name}}</p>-->
                        <!--</div>-->
                        <!--</div>-->


                        <!--&lt;!&ndash;<div class="form-group">&ndash;&gt;-->
                        <!--&lt;!&ndash;<label for="testtime" class="col-sm-2 control-label">考试时间</label>&ndash;&gt;-->
                        <!--&lt;!&ndash;<div class="col-sm-6 ">&ndash;&gt;-->
                        <!--&lt;!&ndash;<input type="text" class="form-control findtime noempty" id="testtime" name="testtime">&ndash;&gt;-->
                        <!--&lt;!&ndash;<span id="coachhelp" class="help-block hidden">时间不能为空</span>&ndash;&gt;-->
                        <!--&lt;!&ndash;</div>&ndash;&gt;-->
                        <!--&lt;!&ndash;</div>&ndash;&gt;-->

                        <!--<div class="form-group">-->
                        <!--<label for="score" class="col-sm-3 control-label">成绩</label>-->
                        <!--<div class="col-sm-6">-->
                        <!--<input type="text" class="form-control noempty" id="score" name="score" placeholder="成绩" v-model.lazy="appinfo.ac_num">-->
                        <!--<span id="coachhelp" class="help-block hidden">成绩不能为空</span>-->
                        <!--</div>-->
                        <!--</div>-->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="delstudent" form="resultinoutform" v-on:click.prevent="subform">提交</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="messageModel" tabindex="-1" role="dialog" aria-labelledby="myModal1Label" aria-hidden="true">
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
</div><?php }
}
