<?php
/* Smarty version 3.1.30, created on 2017-05-29 14:33:52
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/home/home.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_592bc0d0673e15_97365749',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf2b1410cb5cc8eb8b4b49336afa242eb3df04d3' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/home/home.html',
      1 => 1494938127,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/home/nav.html' => 1,
    'file:admin/home/sidebar.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_592bc0d0673e15_97365749 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:admin/home/nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:admin/home/sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="col-sm-9">
    <div class="col-sm-10">

        <p class="pull-right">你有待处理的事务:<span class="badge">42</span></p>
        <table class="table table-bordered table-hover  table-condensed">
            <thead class=>
            <td>事务类型</td>
            <td>创建时间</td>
            <td>截止时间</td>
            <td>详情</td>
            <td>操作</td>
            </thead>
            <tr>
                <td class="active col-sm-2">退学申请</td>
                <td class="success col-sm-2">2017-4-10</td>
                <td class="warning col-sm-2">2017-4-17</td>
                <td class="info col-sm-4">学员的增多对驾校的管理也是一种挑战</td>
                <td class="danger col-sm-2">
                    <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;退回</a>
                    <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;通过</a>
                </td>
            </tr>


            <tr>
                <td class="active col-sm-2">退学申请</td>
                <td class="success col-sm-2">2017-4-10</td>
                <td class="warning col-sm-2">2017-4-17</td>
                <td class="info col-sm-4">学员的增多对驾校的管理也是一种挑战</td>
                <td class="danger col-sm-2">
                    <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;退回</a>
                    <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;通过</a>
                </td>
            </tr><tr>
            <td class="active col-sm-2">退学申请</td>
            <td class="success col-sm-2">2017-4-10</td>
            <td class="warning col-sm-2">2017-4-17</td>
            <td class="info col-sm-4">学员的增多对驾校的管理也是一种挑战</td>
            <td class="danger col-sm-2">
                <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;退回</a>
                <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;通过</a>
            </td>
        </tr><tr>
            <td class="active col-sm-2">退学申请</td>
            <td class="success col-sm-2">2017-4-10</td>
            <td class="warning col-sm-2">2017-4-17</td>
            <td class="info col-sm-4">学员的增多对驾校的管理也是一种挑战</td>
            <td class="danger col-sm-2">
                <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;退回</a>
                <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;通过</a>
            </td>
        </tr><tr>
            <td class="active col-sm-2">退学申请</td>
            <td class="success col-sm-2">2017-4-10</td>
            <td class="warning col-sm-2">2017-4-17</td>
            <td class="info col-sm-4">学员的增多对驾校的管理也是一种挑战</td>
            <td class="danger col-sm-2">
                <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;退回</a>
                <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;通过</a>
            </td>
        </tr><tr>
            <td class="active col-sm-2">退学申请</td>
            <td class="success col-sm-2">2017-4-10</td>
            <td class="warning col-sm-2">2017-4-17</td>
            <td class="info col-sm-4">学员的增多对驾校的管理也是一种挑战</td>
            <td class="danger col-sm-2">
                <a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;退回</a>
                <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;通过</a>
            </td>
        </tr>
        </table>
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
