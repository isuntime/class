<?php
/* Smarty version 3.1.30, created on 2017-06-21 13:51:29
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/reception/content.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_594a0961dd7815_02622891',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f8c854255ec716d5cdd2694429e63398a94c2902' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/reception/content.html',
      1 => 1498024275,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/reception/article.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_594a0961dd7815_02622891 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">前台管理</a></li>
    <li class="active">内容管理</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform clearfix">
        <a href="http://lexun.date/admin/adminIndex.php?model=reception&submodel=addarticle" class="btn btn-success" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;新增</a>
        <table class="table table-bordered table-hover">

            <thead>
            <tr> <h3 class="text-center">文章列表</h3></tr>

            <tr>
                <th>标题</th>
                <th>所属栏目</th>
                <th>发布时间</th>
                <th>修改时间</th>
                <th>发布人</th>
                <th>修改人</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>大大</td>
                <td>驾校介绍</td>
                <td>2017-04-05</td>
                <td>2017-04-05</td>
                <td>大大</td>
                <td>大大</td>
                <td>
                    <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;修改</a>
                    <a href="#" class="btn btn-danger " data-toggle="modal" data-target="#myModal1" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;删除</a>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="exampleModalLabel">文章详情</h4>
                </div>
                <div class="modal-body">
                    <?php $_smarty_tpl->_subTemplateRender("file:admin/reception/article.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="articleinfo">提交</button>
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
                    <h4 class="modal-title" id="myModal1Label"></h4>
                </div>
                <div class="modal-body">确认删除？<span id="stname"></span></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="delstudent">提交更改</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" >关闭</button>

                </div>
            </div>
        </div>
    </div>
</div>



<?php echo '<script'; ?>
>
    var app = new Vue({
        el:"#app",
        data: {
            applist:{},
            appinfo:{},
            textTime:'',
            subjectlist: {},
            coachlist:{},
            message: '',
            find:{
                student_id:'',
                national_id:'',
                coach_id:''
            },
            formactive: 'inster',
        },
        computed: {
        },
        watch:{

        },
        mounted: function () {
            this.$nextTick(function () {
                this.getList();
            })
        },
        methods: {
            getList: function () {
                var _self = this;
                $.ajax({
                    url: comUrl.student,
                    type: "post",
                    data: {model: "student", action: "list"},
                    dataType: "json",
                    success: function (request, status) {
                        _self.applist = request;
                    }
                });
                $.ajax({
                    url: comUrl.public,
                    type: "post",
                    data: {model: "subjectlist", action: "list"},
                    dataType: "json",
                    success: function (request, status) {
                        _self.subjectlist = request;
                    }
                });
                $.ajax({
                    url: comUrl.public,
                    type: "post",
                    data: {model: "coach", action: "list"},
                    dataType: "json",
                    success: function (request, status) {
                        _self.coachlist = request;
                    }
                });

            },
            getInfo: function (item) {
                this.appinfo = item;
                this.formaction = 'edit';
            },
            findlist: function () {
                var dataobj = {
                    model: "coach",
                    action: "edit",
                    where: this.find,
                };
                $.ajax({
                    url: comUrl.student,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (request, status) {
                        $('#myModal1').modal('hide');
                        this.getList();
                    }
                });
            },
            clearEditApp: function () {
                this.formaction = "inster";
                if (this.appinfo) {
                    this.appinfo = {};
                }
            },
            subform: function () {
                var t=$("#testtime").val();
                var dataobj = {
                    model: "resultInput",
                    action: this.formaction,
                    data: {
                        student_id:this.appinfo.student_id,
                        subjectType:this.appinfo.subjectType,
                        ac_num:this.appinfo.ac_num,
                        test_time:t
                    }
                };

                if (this.formaction == 'edit') {
                    dataobjwhere={
                        id: this.appinfo.id
                    }
                }

                if (forminspect('resultinoutform') == true) {
                    var _self = this;
                    $.ajax({
                        url: comUrl.student,
                        type: "post",
                        data: dataobj,
                        dataType: "json",
                        success: function (request, status) {
                            _self.message = '提交成功,点击下一步';
                            $('#myModal1').modal('show');
                            _self.getList();
                        },error:function (XMLHttpRequest, textStatus, errorThrown) {
                            _self.message = '提交失败，请再次尝试';
                            $('#myModal1').modal('show');
                        }
                    });

                }
            },
            toNext: function () {
                $('#myModal1').modal('hidden');


            },
            onFileChange: function (e) {
                var files = e.target.files;
                if (!files.length) return;
                var vm = this;
                var reader = new window.FileReader();
                reader.readAsDataURL(files[0]);
                reader.onload = function (e) {
                    vm.appinfo.studentphoto = e.target.result;
                }

            },
            setState: function () {
                var dataobj = {
                    model: "resultInput",
                    action: "edit",
                    data: {
                        id: this.appinfo.id,
                        carstate: !this.appinfo.carstate,
                    },
                };
                $.ajax({
                    url: comUrl.workers,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (request, status) {
                        $('#myModal1').modal('hide');
                        this.getList();
                    }
                });
            },
        }

    });

<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
