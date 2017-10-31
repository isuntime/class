<?php
/* Smarty version 3.1.30, created on 2017-10-17 12:06:21
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/workers/coach.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e581bdf410b0_02227939',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9a66a06a1d8562e84e6da0446e3cbb01141d0c6' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/workers/coach.html',
      1 => 1507794197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
  ),
),false)) {
function content_59e581bdf410b0_02227939 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">职工管理</a></li>
    <li class="active">教练管理</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">
        <h3><strong>教练信息</strong></h3>

        <form class="form-horizontal regform" role="form" action="" method="post" id="findform">
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">准驾车型</label>
                <div class="col-sm-4">
                    <select name="" id="" class="form-control" v-model="find.vehicle_type">
                        <option v-for="(type,index) in vehicle_typelist" v-bind:value="type.id">{{type.vehicle_type_name}}</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">是否vip</label>
                <div class="col-sm-4">
                <select name="" id="" class="form-control" v-model="find.isvip">
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2">
                    <button type="button" class="btn btn-success" v-on:click="findlist">查询</button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" v-on:click="clearEditApp">新增</button>
                </div>

            </div>
        </form>

        <div class="regform">
            <h3>在职教练</h3>
            <table class="table table-bordered table-hover ">
                <thead>
                <td>员工编号</td>
                <td>姓名</td>
                <td>教学车型</td>
                <td>vip教练组</td>
                <td>状态</td>
                <td>操作</td>
                </thead>
                <tbody>
                <tr v-for="item in applists.job.data">
                    <td>{{item.worker_id}}</td>
                    <td>{{item.name}}</td>
                    <td>{{item.vehicle_type_name}}</td>
                    <td>{{item.isvip|vipFileter}}</td>
                    <td>{{item.c_state|stateText}}</td>
                    <td>
                        <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal" v-on:click="getInfo(item)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;修改</a>
                        <!--<a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal1"  v-on:click="getInfo(item)"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;禁用</a>-->
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
    <div class="regform">
        <h3>离职教练</h3>
        <table class="table table-bordered table-hover ">
            <thead>
            <td>员工编号</td>
            <td>姓名</td>
            <td>教学车型</td>
            <td>vip教练组</td>
            <td>状态</td>
            <td>操作</td>
            </thead>
            <tbody>
            <tr v-for="item in applists.djob.data">
                <td>{{item.worker_id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.vehicle_type_name}}</td>
                <td>{{item.isvip|vipFileter}}</td>
                <td>{{item.c_state|stateText}}</td>
                <td>
                    <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal" v-on:click="getInfo(item)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;修改</a>
                    <!--<a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal1"  v-on:click="getInfo(item)"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;禁用</a>-->
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="exampleModalLabel">教练信息</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal"  id="workerinfo">

                        <div class="form-group">
                            <label for="workername" class="col-sm-2 control-label">员工编号</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control noempty" id="workername" name="workername"
                                       v-model="appinfo.worker_id" @change="nameFilter"><span id="namehelp" class="help-block hidden">不能为空</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">准驾车型</label>
                            <div class="col-sm-10">
                                <div class="checkbox" >
                                    <select name="" id="" class="form-control" v-model="appinfo.vehicle_type">
                                        <option v-for="(type,index) in vehicle_typelist" v-bind:value="type.id">{{type.vehicle_type_name}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">是否vip</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="1" name="vip" v-model="appinfo.isvip"> 是
                                    </label>
                                    <label>
                                        <input type="radio" value="0" name="vip" checked="checked" v-model="appinfo.isvip"> 否
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">状态</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="1" name="c_state"  v-model="appinfo.c_state"> 在职
                                    </label>
                                    <label>
                                        <input type="radio" value="0" name="c_state" checked="checked" v-model="appinfo.c_state"> 离职
                                    </label>
                                </div>
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

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">确认禁用？<span id="stname"></span></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="delstudent" v-on:click="setState">提交更改</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" >关闭</button>

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
 src="../html/default/admin/js/workers/coach.js">

<?php echo '</script'; ?>
>
<?php }
}
