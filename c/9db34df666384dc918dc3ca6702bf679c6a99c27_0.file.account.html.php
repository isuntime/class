<?php
/* Smarty version 3.1.30, created on 2017-06-28 16:27:30
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/system/account.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59536872dd6ad0_42670172',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9db34df666384dc918dc3ca6702bf679c6a99c27' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/system/account.html',
      1 => 1498638356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_59536872dd6ad0_42670172 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">系统管理</a></li>
    <li class="active">账户管理</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">
        <h3><strong>账户信息</strong></h3>
        <form class="form-inline regform">
            <div class="form-group">
                <label for="">用户名</label>
                <input type="text" class="form-control" v-model="findinfo.username">
            </div>
            <div class="form-group">
                <label for="department">部门</label>

                    <select name="department" id="department" class="form-control noempty" v-model="findinfo.department_id" v-on:change="setPosition">
                        <option v-for="(dep,index) in departmentList" v-bind:value="dep.id" >{{dep.department_name}}</option>
                    </select>


            </div>
            <div class="form-group">
                <label for="position">职位</label>
                <select name="position" id="position" class="form-control noempty" v-model="findinfo.position_id">
                    <option v-for="(pos, index) in positionList" v-bind:value="pos.id">{{pos.position_name}}</option>
                </select>
            </div>
            
            <button type="button" class="btn btn-info" v-on:click="findlist">查询</button>
            <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#myModal" @click="clearEditApp">新增</button>
        </form>

    </div>
    <div class="regform">
        <table class="table table-bordered table-hover ">
            <thead>
            <td>用户名</td>
            <td>姓名</td>
            <td>创建时间</td>
            <td>部门</td>
            <td>职位</td>
            <td>状态</td>
            <td>操作</td>
            </thead>
            <tbody >
            <tr v-for="(user,index) in applist">
                <td class="hidden" v-text="user.id"></td>
                <td v-text="user.username"></td>
                <td v-text="user.name"></td>
                <td v-text="user.c_time"></td>
                <td v-text="user.department"></td>
                <td v-text="user.position"></td>
                <td >{{user.user_state|stateText}}</td>
                <td>
                    <a href="#" class="btn btn-info edit" data-toggle="modal" data-target="#myModal" v-on:click="getInfo(user)"><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>&nbsp;修改</a>
                    <!--<a href="#" class="btn btn-danger del" data-toggle="modal" data-target="#myModal1" v-on:click="getInfo(user)"><span class="glyphicon glyphicon-remove" aria-hidden="true" ></span>&nbsp;禁用</a>-->
                </td>
            </tr>

            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="exampleModalLabel">账户信息</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="userinfo">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">用户名</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control noempty" id="username" name="username" placeholder="" v-model="appinfo.username" v-on:change="usernameFilter">
                                <!--<span id="usernamehelp" class="help-block" v-text="message"></span>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="userpwd" class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control noempty" id="userpwd" name="userpwd" placeholder="" v-model="appinfo.pwd"><span id="namehelp" class="help-block hidden">不能为空</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="department1" class="col-sm-2 control-label">部门</label>
                            <div class="col-sm-10">
                                <select name="department1" id="department1" class="form-control noempty" v-model="appinfo.department_id" v-on:change="setAppPosition">
                                    <option v-for="(dep,index) in departmentList" v-bind:value="dep.id" >{{dep.department_name}}</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="position1" class="col-sm-2 control-label">职位</label>
                            <div class="col-sm-10">
                                <select name="position1" id="position1" class="form-control noempty" v-model="appinfo.position_id" v-on:change="setWorkerName">
                                    <option v-for="(pos, index) in positionList" v-bind:value="pos.id" >{{pos.position_name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">姓名</label>
                            <div class="col-sm-10">
                                <select name="workername" id="workername" class="form-control noempty" v-model="appinfo.userinfo_id">
                                    <option v-for="name in namelist" :value="name.id">{{name.name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">身份权限</label>
                            <div class="col-sm-10">
                                <select name="role" id="role" class="form-control noempty" v-model="appinfo.rule_id">
                                    <option v-for="rule in rulelist" :value="rule.id">{{rule.rule_name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="userstate" class="col-sm-2 control-label">用户状态</label>
                            <div class="col-sm-10">
                                <select name="userstate" id="userstate" class="form-control noempty" v-model="appinfo.user_state">
                                    <option value="1">启用</option>
                                    <option value="0">禁用</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="regtime" class="col-sm-2 control-label">创建时间</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="regtime" disabled v-model="appinfo.c_time">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" form="userinfo" v-on:click="subform">提交</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" @click="getList">取消</button>
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
                <div class="modal-body">确认禁用该账户？<span id="stname"></span></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click="setState">提交更改</button>
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
 src="../html/default/admin/js/system/account.js">
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
