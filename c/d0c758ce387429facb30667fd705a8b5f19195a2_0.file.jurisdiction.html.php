<?php
/* Smarty version 3.1.30, created on 2017-10-20 15:46:40
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/system/jurisdiction.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e9a9e09ed331_67100313',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0c758ce387429facb30667fd705a8b5f19195a2' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/system/jurisdiction.html',
      1 => 1507794195,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_59e9a9e09ed331_67100313 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">系统管理</a></li>
    <li class="active">权限管理</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">
        <h3><strong>角色信息</strong></h3>


        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" @click="clearEditApp">新增
        </button>


        <div class="regform">
            <table class="table table-bordered table-hover ">
                <thead>
                    <td>角色名</td>
                    <td>创建时间</td>
                    <td>修改时间</td>
                    <td>备注</td>
                    <td>状态</td>
                    <td>操作</td>
                </thead>

                <tbody>
                    <tr v-for="rule in applist">
                        <td class="hidden" v-text="rule.id"></td>
                        <td v-text="rule.rule_name"></td>
                        <td v-text="rule.c_time"></td>
                        <td v-text="rule.m_time"></td>
                        <td v-text="rule.remake"></td>
                        <td >{{rule.rule_state|stateText}}</td>
                        <td>
                            <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal" v-on:click="getInfo(rule)"><span
                                class="glyphicon glyphicon-pencil"
                                aria-hidden="true"></span>&nbsp;修改</a>
                            <a href="#" class="btn btn-warning " data-toggle="modal" data-target="#myModal2" v-on:click="getJurisdiction(rule)"><span
                                class="glyphicon glyphicon-wrench"
                                aria-hidden="true"></span>&nbsp;分配权限</a>
                            <!--<a href="#" class="btn btn-danger " data-toggle="modal" data-target="#myModal1" v-on:click="getInfo(rule)"><span-->
                                <!--class="glyphicon glyphicon-remove"-->
                                <!--aria-hidden="true"></span>&nbsp;禁用</a>-->
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="exampleModalLabel">角色信息</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="userinfo">

                        <div class="form-group">
                            <label for="rolename" class="col-sm-2 control-label">角色名</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control noempty" id="rolename" name="rolename" v-model="appinfo.rule_name" v-on:change="ruleFilter">
                                <span
                                    id="rolehelp" class="help-block hidden">不能为空</span>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="c_time" class="col-sm-2 control-label">创建时间</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="c_time" disabled v-model="appinfo.c_time">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="m_time" class="col-sm-2 control-label">修改时间</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="m_time" disabled v-model="appinfo.m_time">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="remake" class="col-sm-2 control-label">备注</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="3" id="remake" name="remake" v-model="appinfo.remake"></textarea>
                                <span id="remakehelp" class="help-block hidden">不能为空</span>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="rolestate" class="col-sm-2 control-label">状态</label>
                            <div class="col-sm-10">
                                <select name="rolestate" id="rolestate" class="form-control noempty" v-model="appinfo.rule_state">
                                    <option value="1" selected>启用</option>
                                    <option value="0">禁用</option>
                                </select>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" form="userinfo" v-on:click="subform">提交</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2Label">
        <div class="modal-dialog" role="document" style="width:1100px">
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="exampleModal2Label">权限分配</h4>
                </div>
                <div class="modal-body">
                    <form class="form-inline" id="permissionAssignment">
                        <table class="table table-bordered table-responsive" v-for="ruleJur in jurisdictionList" style="width:80%;margin: auto">
                            <caption v-text="ruleJur.c_name" class="warning h1 text-center text-primary">Monthly savings</caption>
                           <tbody>
                           <tr v-for="subcul in ruleJur.data">
                               <td  v-text="subcul.c_name" class="col-sm-5">

                               </td>
                               <td>
                                   <label class="text-warning">
                                       <input type="checkbox"  v-model="subcul.cview.state"  v-bind:value="subcul.cview.cjtable" > 查看
                                   </label>
                                   <label class="text-success">
                                       <input type="checkbox"  v-model="subcul.cedit.state" v-bind:value="subcul.cedit.cjtable" > 修改
                                   </label>
                                   
                               </td>
                           </tr>
                           </tbody>


                        </table>

                        <!--动态生成栏目及子菜单-->
                        <!--<div class="form-group" v-for="ruleJur in jurisdictionList" style="border: 2px solid #f0ffff;">-->

                                <!--<label for="rolename" v-text="ruleJur.c_name" class="control-label"></label>-->
                                    <!--<div  v-for="subcul in ruleJur.data">-->
                                        <!--<p v-text="subcul.c_name" class="form-control-static text-primary"></p>-->
                                        <!--<label class="checkbox-inline text-warning">-->
                                            <!--<input type="checkbox"  v-model="subcul.cview.state"  v-bind:value="subcul.cview.cjtable" > 查看-->
                                        <!--</label>-->
                                        <!--<label class="checkbox-inline text-success">-->
                                            <!--<input type="checkbox"  v-model="subcul.cedit.state" v-bind:value="subcul.cedit.cjtable" > 修改-->
                                        <!--</label>-->
                                    <!--</div>-->
                            <!--</div>-->



                        <!--</div>-->

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" form="permissionAssignment" v-on:click="subJur">提交</button>
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
                <div class="modal-body">确认禁用该角色</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" v-on:click="setState">提交更改</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="messageModel" tabindex="-1" role="dialog" aria-labelledby="messageModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="messageModelLabel"></h4>
                </div>
                <div class="modal-body" v-text="message">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>

</div>

<?php echo '<script'; ?>
 src="../html/default/admin/js/system/jurisdiction.js">
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
