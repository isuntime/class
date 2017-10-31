<?php
/* Smarty version 3.1.30, created on 2017-06-13 14:23:19
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/home/assign_car.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_593f84d746f5e3_43438929',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e2326e2bb68ecb75840096c35f27260d70f675e3' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/home/assign_car.html',
      1 => 1497333115,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/student/assign_car.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_593f84d746f5e3_43438929 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="col-sm-8 col-sm-offset-3" id="app">
    <div class="regform">
        <div class="col-sm-8">
            <?php $_smarty_tpl->_subTemplateRender("file:admin/student/assign_car.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
