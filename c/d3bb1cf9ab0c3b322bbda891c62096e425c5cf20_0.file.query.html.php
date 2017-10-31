<?php
/* Smarty version 3.1.30, created on 2017-07-12 09:43:01
  from "/home/wwwroot/jiaxiao/public_html/html/default/query.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59657ea546e6d6_43589893',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3bb1cf9ab0c3b322bbda891c62096e425c5cf20' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/query.html',
      1 => 1499762343,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:top.html' => 1,
    'file:footer.html' => 1,
  ),
),false)) {
function content_59657ea546e6d6_43589893 (Smarty_Internal_Template $_smarty_tpl) {
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
                                <span class="navbar-brand weixin-nav-a text-center">查询中心</span>
                            </div>

                        </div>
                    </nav>
                </header>
                <form class="formreg form-horizontal">
                    <h3 class="text-center">点击按钮分类查询</h3>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <button type="button" class="center-block btn btn-primary">考试时间查询</button>
                        </div>
                        <div class="col-xs-6">
                            <button type="button" class="center-block btn btn-success">缴费历史记录</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <button type="button" class="center-block btn btn-info">成绩查询</button>
                        </div>
                        <div class="col-xs-6">
                            <button type="button" class="center-block btn btn-warning">投诉反馈</button>
                        </div>
                    </div>
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
                    model: "query",
                    action: "check",
                    where: this.appinfo,
                };
                var _self=this;
                    $.ajax({
                        url: 'query',
                        type: "post",
                        data: dataobj,
                        dataType: "json",
                        success: function (request, status) {
                            _self.message = request.code;
                            $('#messageModel').modal('show');
                        }
                    });
            },
            setfind:function (item) {
                this.appinfo=item;
                this.subform();
            }
        }
    })
<?php echo '</script'; ?>
>





<?php $_smarty_tpl->_subTemplateRender("file:footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
