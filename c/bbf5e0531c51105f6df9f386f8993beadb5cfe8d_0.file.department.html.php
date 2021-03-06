<?php
/* Smarty version 3.1.30, created on 2017-10-17 12:06:24
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/workers/department.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e581c05e8e52_32348302',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bbf5e0531c51105f6df9f386f8993beadb5cfe8d' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/workers/department.html',
      1 => 1507794198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
  ),
),false)) {
function content_59e581c05e8e52_32348302 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">职工管理</a></li>
    <li class="active">部门管理</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">
        <h3><strong>部门信息</strong></h3>
        <button class="btn btn-success" data-toggle="modal" data-target="#myModal" v-on:click="clearEditApp"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;新增</button>
        <div class="regform">
            <table class="table table-bordered table-hover ">
                <thead>
                <td>部门名称</td>
                <td>操作</td>
                </thead>
                <tbody>
                <tr v-for="dep in applists">
                    <td>{{dep.department_name}}</td>
                    <td>
                        <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal" v-on:click="getInfo(dep)"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;修改</a>

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
                    <h4 class="modal-title text-center" id="exampleModalLabel">部门信息</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="departmentinfo">

                        <div class="form-group">
                            <label for="department1" class="col-sm-2 control-label">部门名称</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control noempty" id="department1" v-model="appinfo.department_name">
                                <span class="help-block hidden">不能为空</span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" form="departmentinfo" v-on:click="subform">提交</button>
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
                    <button type="button" class="btn btn-primary" id="delstudent" v-on:click="setState">提交更改</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" >关闭</button>

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
</div>



<?php echo '<script'; ?>
 src="../html/default/admin/js/workers/department.js">

<?php echo '</script'; ?>
>
<?php }
}
