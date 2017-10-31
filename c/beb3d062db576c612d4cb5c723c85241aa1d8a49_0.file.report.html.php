<?php
/* Smarty version 3.1.30, created on 2017-06-03 11:24:01
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/workers/report.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59322bd15c4a48_21298490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'beb3d062db576c612d4cb5c723c85241aa1d8a49' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/workers/report.html',
      1 => 1496460237,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/workers/nav.html' => 1,
    'file:admin/workers/sidebar.html' => 1,
  ),
),false)) {
function content_59322bd15c4a48_21298490 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:admin/workers/nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:admin/workers/sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="col-sm-9" id="app">
    <div class="regform">

        <form class="form-horizontal regform" role="form" id="findform">
            <h1 class="center-block text-center">工作汇报</h1>
            <div class="form-group">
                <label class="col-sm-2 control-label">标题</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control  noempty" id="student_id" name="student_id"
                           v-model="report.title"><span id="namehelp" class="help-block hidden">不能为空</span>
                </div>

            </div>

            <div class="form-group">
                <label for="coachname" class="col-sm-2 control-label">收件人</label>
                <div class="col-sm-6">
                    <select class="form-control hidden" v-model="report.toworker">
                        <option v-for="worker in workerlist" v-bind="worker.id">{{worker.name}}</option>
                    </select>
                    <span id="coachhelp" class="help-block hidden">不能为空</span>
                </div>
            </div>

            <div class="form-group">
                <label for="reason" class="col-sm-2 control-label">详情</label>
                <div class="col-sm-6">
                    <textarea class="form-control  noempty" rows="3" id="reason" name="reason" v-model="report.content"></textarea>

                    <span id="reasonhelp" class="help-block hidden">不能为空</span>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-primary" v-on:click="subform">提交</button>
                </div>
            </div>
        </form>
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
 src="../html/default/admin/js/workers/report.js">

<?php echo '</script'; ?>
>

<?php }
}
