<?php
/* Smarty version 3.1.30, created on 2017-07-11 12:15:01
  from "/home/wwwroot/jiaxiao/public_html/html/default/complaints.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596450c5046b54_57231323',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2144de52af81332214339036d890bcb935ae33c2' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/complaints.html',
      1 => 1499746489,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:top.html' => 1,
    'file:footer.html' => 1,
  ),
),false)) {
function content_596450c5046b54_57231323 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div id="app">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 clearfix">
                <header class="clearfix">
                    <nav class="navbar navbar-weixin-nav navbar-fixed-top" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <span class="navbar-brand weixin-nav-a text-center">投诉中心</span>
                            </div>

                        </div>
                    </nav>
                </header>
                <form class="formreg">
                    <h3 class="text-center">请在下方填写投诉详情</h3>
                    <div class="form-group">

                        <textarea class="form-control" rows="32" v-model="appinfo.remake"></textarea>
                    </div>
                    <button type="button" class="btn btn-danger center-block">提交投诉</button>
                </form>
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
                    <div class="modal-body" v-text="message"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
    var app=new Vue({
        data: {
            appinfo: {
                remake:'',
            },
            message:'',
            formfiter:true,
        },
        filters:{

        },
        computed: {

        },
        mounted: function () {
            this.$nextTick(function () {

            })
        },
        methods:{
            subform: function () {
                var dataobj = {
                    model: "complaints",
                    action: "insert",
                    data: this.appinfo,
                };
                var _self=this;
                if (this.appinfo.remake!='') {
                    $.ajax({
                        url: 'complaints',
                        type: "post",
                        data: dataobj,
                        dataType: "json",
                        success: function (request, status) {
                                _self.message = request.code;
                                $('#messageModel').modal('show');
                        }
                    });
                }else{
                    _self.message = '投诉内容不能为空';
                    $('#messageModel').modal('show');
                }
            },
        }
    })
<?php echo '</script'; ?>
>







<?php $_smarty_tpl->_subTemplateRender("file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
