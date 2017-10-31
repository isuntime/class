<?php
/* Smarty version 3.1.30, created on 2017-06-25 14:36:54
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/feedback.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_594f5a06cfc410_29862081',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c983ef6d6196c0f7d1a3e30ca92f222ffe55d8be' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/feedback.html',
      1 => 1498372507,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_594f5a06cfc410_29862081 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">学员管理</a></li>
    <li class="active">投诉反馈</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">
        <div class="regform">
            <table class="table table-bordered table-hover ">
                <thead>
                <td>学号</td>
                <td>姓名</td>
                <td>投诉时间</td>
                <td>过期时间</td>
                <td>操作</td>
                </thead>
                <tbody>
                <tr v-for="item in applist">
                    <td>{{item.student_id}}</td>
                    <td>{{item.name}}</td>
                    <td>{{item.c_time}}</td>
                    <td class="danger text-danger">{{item.c_time}}</td>
                    <td>
                        <a href="#" class="btn btn-danger " data-toggle="modal" data-target="#myModal"@click="getInfo(item)"><span class="glyphicon glyphicon-th-list"
                                                                                                             aria-hidden="true"></span>&nbsp;详情</a>
                        <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal1"@click="getInfo(item)"><span class="glyphicon glyphicon-pencil"
                                                                                                               aria-hidden="true"></span>&nbsp;回复</a>
                        <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal2" @click="getInfo(item)"><span class="glyphicon glyphicon-remove"
                                                                                                                aria-hidden="true"></span>&nbsp;删除</a>
                    </td>
                </tr>

                </tbody>
            </table>

        </div>


    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">详情信息</h4>
                </div>
                <div class="modal-body"><span id="stname">{{appinfo.remake}}</span></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" >关闭</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1Label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModal1">回复信息</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="feedbackinfo">



                        <div class="form-group">
                            <label for="reply" class="col-sm-2 control-label" >回复</label>
                            <div class="col-sm-8">
                                <textarea class="form-control noempty" rows="3" id="reply" name="reply" v-model="appinfo.backmake"></textarea>

                                <span id="replyhelp" class="help-block hidden">回复不能为空</span>
                            </div>

                        </div>




                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" form="feedbackinfo" @click.prevent="subform">提交</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>

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
                <div class="modal-body">确认退回？<span id="stname"></span></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="delstudent" @click="setState">提交更改</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" >关闭</button>

                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="messageModel" tabindex="-1" role="dialog" aria-labelledby="myModal1Label"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body" v-text="message"></div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-primary" id="delstudent" v-on:click="toNext">确定</button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>
</div>



<?php echo '<script'; ?>
 src="../html/default/admin/js/student/feedback.js">
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<?php }
}
