<?php
/* Smarty version 3.1.30, created on 2017-10-17 10:51:21
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/workers/staff.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e5702936e130_36693541',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b0d4d03101ec9c8c18b2e836fd0772515cbc2972' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/workers/staff.html',
      1 => 1507996685,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_59e5702936e130_36693541 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">职工管理</a></li>
    <li class="active">员工管理</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">
        <h3><strong>员工信息</strong></h3>

        <!--<form class="form-inline regform" role="form" action="" method="post" id="findform">-->
            <!--&lt;!&ndash;<div class="form-group">&ndash;&gt;-->
            <!--&lt;!&ndash;<label for="student_id">员工编号</label>&ndash;&gt;-->
            <!--&lt;!&ndash;<input type="text" class="form-control" id="student_id" placeholder="" v-model="find.worker_id">&ndash;&gt;-->
            <!--&lt;!&ndash;</div>&ndash;&gt;-->
            <!--<div class="form-group">-->
                <!--<label for="department">部门</label>-->
                <!--<select name="department" id="department" class="form-control noempty" v-model="find.department_id"-->
                        <!--v-on:change="setPosition">-->
                    <!--<option v-for="(dep,index) in departmentList" v-bind:value="dep.id">{{dep.department_name}}</option>-->
                <!--</select>-->
            <!--</div>-->
            <!--<div class="form-group">-->
                <!--<label for="position">职位</label>-->

                <!--<select name="position" id="position" class="form-control noempty" v-model="find.position_id">-->
                    <!--<option v-for="(pos, index) in positionList" v-bind:value="pos.id">{{pos.position_name}}</option>-->
                <!--</select>-->
            <!--</div>-->
            <!--&lt;!&ndash;<div class="form-group">&ndash;&gt;-->
            <!--&lt;!&ndash;<label for="starttime">入职时间</label>&ndash;&gt;-->
            <!--&lt;!&ndash;<input type="text" class="form-control findtime" id="starttime" v-model="find.regtime">&ndash;&gt;-->
            <!--&lt;!&ndash;</div>&ndash;&gt;-->
            <!--&lt;!&ndash;<div class="form-group">&ndash;&gt;-->
            <!--&lt;!&ndash;<label for="lasttime">至</label>&ndash;&gt;-->
            <!--&lt;!&ndash;<input type="text" class="form-control findtime" id="lasttime" v-model="find.lasttime">&ndash;&gt;-->
            <!--&lt;!&ndash;</div>&ndash;&gt;-->

            <!--<button type="button" class="btn btn-success" v-on:click="findlist">查询</button>-->
            <!--<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"-->
                    <!--v-on:click="clearEditApp">新增-->
            <!--</button>-->
        <!--</form>-->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" v-on:click="clearEditApp">新增
            </button>
        <div class="regform">
            <h3>在职员工</h3>
            <table class="table table-bordered table-hover ">
                <thead>
                <!--<td>员工编号</td>-->
                <td>姓名</td>
                <td>性别</td>
                <td>电话</td>
                <td>地址</td>
                <td>身份证</td>
                <td>入职时间</td>
                <td>部门</td>
                <td>职位</td>
                <!--<td>在职状态</td>-->
                <td>操作</td>
                </thead>
                <tbody>
                <tr v-for="worker in applists.job.data">
                    <!--<td v-text="worker.worker_id"></td>-->
                    <td v-text="worker.name"></td>
                    <td >{{worker.sex|sexText}}</td>
                    <td v-text="worker.phone"></td>
                    <td v-text="worker.adress"></td>
                    <td v-text="worker.national_id"></td>
                    <td v-text="worker.regtime"></td>
                    <td v-text="worker.department_name"></td>
                    <td v-text="worker.position_name"></td>
                    <!--<td>{{worker.user_state|stateText}}</td>-->
                    <td>
                        <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal"
                           v-on:click="getInfo(worker)"><span class="glyphicon glyphicon-pencil"
                                                              aria-hidden="true"></span>&nbsp;修改</a>
                        <!--<a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal1"-->
                        <!--v-on:click="getInfo(worker)"><span class="glyphicon glyphicon-remove"-->
                        <!--aria-hidden="true"></span>&nbsp;离职</a>-->
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
        <h3>离职员工</h3>
        <table class="table table-bordered table-hover ">
            <thead>
            <!--<td>员工编号</td>-->
            <td>姓名</td>
            <td>性别</td>
            <td>电话</td>
            <td>地址</td>
            <td>身份证</td>
            <td>入职时间</td>
            <td>部门</td>
            <td>职位</td>
            <!--<td>在职状态</td>-->
            <td>操作</td>
            </thead>
            <tbody>
            <tr v-for="worker in applists.djob.data">
                <!--<td v-text="worker.worker_id"></td>-->
                <td v-text="worker.name"></td>
                <td >{{worker.sex|sexText}}</td>
                <td v-text="worker.phone"></td>
                <td v-text="worker.adress"></td>
                <td v-text="worker.national_id"></td>
                <td v-text="worker.regtime"></td>
                <td v-text="worker.department_name"></td>
                <td v-text="worker.position_name"></td>
                <!--<td>{{worker.user_state|stateText}}</td>-->
                <td>
                    <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal"
                       v-on:click="getInfo(worker)"><span class="glyphicon glyphicon-pencil"
                                                          aria-hidden="true"></span>&nbsp;修改</a>
                    <!--<a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal1"-->
                    <!--v-on:click="getInfo(worker)"><span class="glyphicon glyphicon-remove"-->
                    <!--aria-hidden="true"></span>&nbsp;离职</a>-->
                </td>
            </tr>

            </tbody>
        </table>

        <nav>
            <ul class="pagination">
                <li  @click="pageMinus(applists.djob.pageIndex,gotoDjob) " ><a >上一页</a></li>
                <li v-for="(item,index) in applists.djob.pageAll" v-bind:class="{ 'active': applists.djob.pageIndex == index}" @click="gotoDjob(index)"><a >{{index+1}} <span class="sr-only"></span></a></li>
                <li @click="pagePlus(applists.djob.pageIndex,gotoDjob)"><a >下一页</a></li>
            </ul>
        </nav>
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="exampleModalLabel">员工信息</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="workerinfo">

                        <div class="form-group">
                            <label for="workername" class="col-sm-2 control-label">姓名</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control noempty" id="workername" name="workername"
                                       v-model="appinfo.name"><span id="namehelp"
                                                                    class="help-block hidden">姓名不能为空</span>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="sex" class="col-sm-2 control-label">性别</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="sex" name="sex" v-model="appinfo.sex">
                                    <option value="1">男</option>
                                    <option value="2">女</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="national_id" class="col-sm-2 control-label">身份证号</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control noempty" id="national_id" name="national_id"
                                       placeholder="身份证号" v-model="appinfo.national_id">
                            </div>

                        </div>


                        <div class="form-group">
                            <label for="nation" class="col-sm-2 control-label">民族</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control noempty" id="nation" name="nation"
                                       placeholder="民族" v-model="appinfo.national">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">家庭地址</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control noempty" id="address" name="address"
                                       placeholder="家庭住址" v-model="appinfo.adress">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="tel" class="col-sm-2 control-label">电话</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control noempty " id="tel" name="tel" placeholder="电话"
                                       v-model="appinfo.phone">
                                <span id="telhelp" class="help-block hidden">电话不能为空</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">部门</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="department" v-model="appinfo.department_id"
                                        v-on:change="setAppPosition">
                                    <option v-for="(dep,index) in departmentList" v-bind:value="dep.id">
                                        {{dep.department_name}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="position1" class="col-sm-2 control-label">职位</label>
                            <div class="col-sm-10">
                                <select name="position1" id="position1" class="form-control noempty"
                                        v-model="appinfo.position_id">
                                    <option v-for="(pos, index) in positionList" v-bind:value="pos.id">
                                        {{pos.position_name}}
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="userstate" class="col-sm-2 control-label">员工状态</label>
                            <div class="col-sm-10">
                                <select name="userstate" id="userstate" class="form-control noempty"
                                        v-model="appinfo.user_state">
                                    <option value="1">在职</option>
                                    <option value="0">离职</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="regtime" class="col-sm-2 control-label">入职时间</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control findtime " id="regtime" disabled
                                       v-model="appinfo.regtime">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="outtime" class="col-sm-2 control-label">离职时间</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control findtime" id="outtime" v-model="appinfo.outtime"
                                       disabled>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" form="workerinfo" v-on:click="subform">提交</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1Label"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">确认删除？<span id="stname"></span></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="delstudent" v-on:click="setState">提交更改</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="messageModel" tabindex="-1" role="dialog" aria-labelledby="messageModelLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="messageModelLabel"></h4>
                </div>
                <div class="modal-body" v-text="message"></span></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>

</div>


<?php echo '<script'; ?>
 src="../html/default/admin/js/workers/staff.js">

<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
