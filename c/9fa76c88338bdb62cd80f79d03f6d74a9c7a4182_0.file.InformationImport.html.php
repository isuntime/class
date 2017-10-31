<?php
/* Smarty version 3.1.30, created on 2017-10-17 12:08:12
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/system/InformationImport.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e5822cb0e258_30369096',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fa76c88338bdb62cd80f79d03f6d74a9c7a4182' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/system/InformationImport.html',
      1 => 1507945178,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_59e5822cb0e258_30369096 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">系统管理</a></li>
    <li class="active">信息管理</li>
</ol>

<div class="col-sm-8" id="app">
    <div class="regform">

        <form class="form-horizontal regform"  id="infoform">


            <div class="form-group">
                <label for="" class="col-sm-2 control-label">导入学员信息</label>
                <div class="col-sm-10">
                    <p class="form-control-static">请先点击下载标准Excel文件按格式填写信息以后上传</p>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-sm-2 control-label">选择文件</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="file" name="file" style="border: none;" @change="onFileChange">
                </div>
            </div>

            <div class="form-group">
                <label for="" class="control-label col-sm-offset-2">
                    <button type="button" class="btn btn-danger" @click="subform"><span class="glyphicon glyphicon-arrow-up"></span>&nbsp;导入
                    </button>
                    <button type="button" class="btn btn-primary"><a class="btn-primary" href="http://bzrdjx.com/student_info.zip"><span class="glyphicon glyphicon-arrow-down"></span>&nbsp;下载标准Excel文件</a>
                    </button>
                </label>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">注意事项</label>
                <div class="col-sm-10">
                    <p class="form-control-static text-danger">请严格按照标准格式填写内容：否责将导致数据库出现严重错误！！</p>
                </div>
            </div>


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


<?php echo '<script'; ?>
 src="../html/default/admin/js/system/InformationImport.js">
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
