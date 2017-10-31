<?php
/* Smarty version 3.1.30, created on 2017-07-12 09:54:08
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/comGraduation.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5965814032d7c1_13249106',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5a4ded3a769126f37c94bd76916d720bbc1d84ac' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/comGraduation.html',
      1 => 1499824421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/student/setState.html' => 1,
  ),
),false)) {
function content_5965814032d7c1_13249106 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="regform">
    <select name="" id="" style="height: 34px;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555555;background-color: #ffffff;background-image: none;border: 1px solid #cccccc;border-radius: 4px;" v-model="req_state">
        <option value="1">未处理</option>
        <option value="2">已同意</option>
        <option value="3">已退回</option>
    </select>
    <a class="btn btn-success"  data-toggle="modal" data-target="#myModal" v-on:click="clearEditApp">结业申请</a>
    <table class="table table-bordered table-hover ">
        <thead>
        <td>学号</td>
        <td>姓名</td>
        <td>教练</td>
        <td>操作</td>
        </thead>
        <tbody>
        <tr v-for="item in applist.data">
            <td>{{item.student_id}}</td>
            <td>{{item.name}}</td>
            <td>{{item.coach_name}}</td>
            <td>

                <a href="#" class="btn btn-success " data-toggle="modal" data-target="#setState" v-on:click="getInfo(item)"><span class="glyphicon glyphicon-pencil"
                                                                                                                                 aria-hidden="true"></span>&nbsp同意结业</a>
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
