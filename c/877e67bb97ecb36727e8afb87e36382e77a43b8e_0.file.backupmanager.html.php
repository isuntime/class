<?php
/* Smarty version 3.1.30, created on 2017-06-28 14:30:36
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/system/backupmanager.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59534d0c292952_10648458',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '877e67bb97ecb36727e8afb87e36382e77a43b8e' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/system/backupmanager.html',
      1 => 1498631433,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_59534d0c292952_10648458 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">系统管理</a></li>
    <li class="active">备份管理</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">

        <form  id="sqlform">

            <div class="form-group clearfix">
                <div class="pull-right">
                    <button type="button" class="btn btn-primary" @click="backups"><span class="glyphicon glyphicon-refresh"></span>&nbsp;一键备份
                    </button>
                </div>


            </div>
            <table class="table table-bordered table-hover">
                <thead>
                <h3 class="text-center bg-info">数据库备份记录</h3>
                </thead>
                <tbody>
                <tr>
                    <td>文件名</td>
                    <td>创建时间</td>
                    <td>大小</td>
                    <td>操作</td>
                </tr>
                <tr v-for="item in applist">
                    <td v-text="item.fileName"></td>
                    <td v-text="item.c_time"></td>
                    <td v-text="item.fileSize"></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" @click="getInfo(item)"><span class="glyphicon glyphicon-plus" ></span>&nbsp;导入
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-trash" ></span>&nbsp;删除
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>


        </form>
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

<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">确认导入？</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="delstudent" @click="recovery">提交</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" >关闭</button>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModal2Label"></h4>
            </div>
            <div class="modal-body">确认删除？<span id="stname"></span></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="delstudent1">提交更改</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" >关闭</button>

            </div>
        </div>
    </div>
</div>



<?php echo '<script'; ?>
 src="../html/default/admin/js/system/backupmanager.js">
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
