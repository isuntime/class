<?php
/* Smarty version 3.1.30, created on 2017-10-23 12:42:49
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/student/comGraduation.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59ed73497fe2a9_38721616',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86590aed202a9c703bb10649aec82febe4fc8715' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/student/comGraduation.html',
      1 => 1508733733,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/student/setState.html' => 1,
  ),
),false)) {
function content_59ed73497fe2a9_38721616 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="regform">
    <select name="" id="" style="height: 34px;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555555;background-color: #ffffff;background-image: none;border: 1px solid #cccccc;border-radius: 4px;" v-model="req_state">
        <option value="1">未处理</option>
        <option value="2">已同意</option>
        <option value="3">已退回</option>
        <option value="4">正常结业</option>
        <option value="5">非正常结业</option>
        <option value="6">退学</option>
    </select>
    <a class="btn btn-success"  data-toggle="modal" data-target="#myModal" v-on:click="clearEditApp">结业申请</a>
    <table class="table table-bordered table-hover ">
        <thead>
        <th >学号</th>
        <th >姓名</th>
        <th >联系电话</th>
        <td>教练名称</td>
        <td>考驾类型</td>
        <th >证件号码</th>
        <th >注册时间</th>
        <th >科一状态</th>
        <th >科二状态</th>
        <th >科三状态</th>
        <th >科四状态</th>
        <td>操作</td>
        </thead>
        <tbody>
        <tr v-for="item in applist.data">
            <td>{{item.student_id}}</td>
            <td>{{item.name}}</td>
            <td>{{item.phone}}</td>
            <td>{{item.coach_name}}</td>
            <td>{{item.vehicle_type}}</td>
            <td>{{item.national_id}}</td>
            <td>{{item.reg_time}}</td>
            <td>{{item.subjectOneState | stateText}}</td>
            <td>{{item.subjectTwoState | stateText}}</td>
            <td>{{item.subjectThreeState | stateText}}</td>
            <td>{{item.subjectFourState | stateText}}</td>
            <td>
                <!--<a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal" v-on:click="getInfo(item)"><span class="glyphicon glyphicon-pencil"-->
                                                                                                                                  <!--aria-hidden="true"></span>&nbsp结业申请</a>-->
                <a href="#" class="btn btn-success " data-toggle="modal" data-target="#setState" v-on:click="getInfo(item)"><span class="glyphicon glyphicon-pencil"
                                                                                                                                 aria-hidden="true"></span>&nbsp审核操作</a>
            </td>
        </tr>

        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            <li  @click="pageMinus(applist.pageIndex,gotoDjob)" ><a href="#">上一页</a></li>
            <li v-for="(item,index) in applist.pageAll" v-bind:class="{ 'active': applist.pageIndex == index}" @click="gotoDjob(index)"><a href="#">{{index+1}} <span class="sr-only"></span></a></li>
            <li @click="pagePlus(applist.pageIndex,gotoDjob)"><a href="#" >下一页</a></li>
        </ul>
    </nav>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"  id="graduationform" >
                    <h1 class="center-block text-center">结业管理</h1>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">身份证号码</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control  noempty" id="national_id" name="national_id"
                                   v-model="appinfo.national_id">
                        </div>
                        <div class="col-sm-2"><button type="button" class="btn btn-default" @click="nameFilter">查询</button></div>

                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">学员信息</label>
                        <div class="col-sm-6">
                            <span class="form-control-static col-sm-4 border" style=" word-wrap:break-word; word-break:normal;" v-text="message"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">结业类型</label>
                        <div class="col-sm-6">
                            <select name="class_type" id="class_type" class="form-control " v-model="appinfo.class_type">
                                <option value="1">
                                    正常结业
                                </option>
                                <option value="2">
                                    非正常结业
                                </option>
                                <option value="3">
                                    中途退学
                                </option>
                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="reason" class="col-sm-3 control-label">备注</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" rows="3" id="reason" name="remake" v-model="appinfo.remake"></textarea>

                        </div>
                    </div>



                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" v-on:click.prevent="subform">提交</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" >关闭</button>

            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:admin/student/setState.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


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
<?php }
}
