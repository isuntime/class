<?php
/* Smarty version 3.1.30, created on 2017-10-17 12:06:21
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/workers/position.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e581bd0621e1_39485777',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64790412af1197a8c5e7473f00ecf5890abe8fbc' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/workers/position.html',
      1 => 1507794198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
  ),
),false)) {
function content_59e581bd0621e1_39485777 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">职工管理</a></li>
    <li class="active">职位管理</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">
        <h3><strong>职位信息</strong></h3>

        <form class="form-inline regform"  id="findform">

            <div class="form-group">
                <label for="department">部门</label>

                <select name="department" id="department" class="form-control " v-model="find.department_id" v-on:change="setPosition">
                    <option v-for="dep in departmentList" v-bind:value="dep.id" >{{dep.department_name}}</option>
                </select>


            </div>

            <button type="button" class="btn btn-success" v-on:click="findlist">查询</button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" v-on:click="clearEditApp">新增</button>
        </form>

        <div class="regform">
            <table class="table table-bordered table-hover ">
                <thead>
                <td>职位名称</td>
                <td>部门</td>
                <!--<td>状态</td>-->
                <td>操作</td>
                </thead>
                <tbody>
                <tr v-for="item in applists">
                    <td>{{item.position_name}}</td>
                    <td>{{item.department_name}}</td>
                    <!--<td>{{item.pstate|stateText}}</td>-->
                    <td>
                        <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal" v-on:click="getInfo(item)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;修改</a>
                        <!--<a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal1" v-on:click="getInfo(item)"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;禁用</a>-->
                    </td>
                </tr>

                </tbody>
            </table>

        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="exampleModalLabel">职位信息</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="positioninfo">




                        <div class="form-group">
                            <label for="department1" class="col-sm-2 control-label">部门</label>
                            <div class="col-sm-10">
                                <select name="department" id="department1" class="form-control noempty" v-model="appinfo.department_id" >
                                    <option v-for="(dep,index) in departmentList" v-bind:value="dep.id" >{{dep.department_name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="position1" class="col-sm-2 control-label">职位</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control noempty" id="position1" v-model="appinfo.position_name">
                            </div>
                        </div>

                        <!--<div class="form-group">-->
                            <!--<label for="pstate" class="col-sm-2 control-label">状态</label>-->
                            <!--<div class="col-sm-10">-->
                                <!--<select name="pstate" id="pstate" class="form-control" v-model="appinfo.pstate">-->
                                    <!--<option value="1" selected>启用</option>-->
                                    <!--<option value="0" >禁用</option>-->
                                <!--</select>-->
                            <!--</div>-->
                        <!--</div>-->


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" form="positioninfo" v-on:click="subform">提交</button>
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
                <div class="modal-body">确认删除？<span id="stname"></span></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" v-on:click="setState">提交更改</button>
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
 src="../html/default/admin/js/workers/position.js">

<?php echo '</script'; ?>
>

<?php }
}
