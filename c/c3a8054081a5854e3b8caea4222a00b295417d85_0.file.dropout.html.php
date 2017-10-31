<?php
/* Smarty version 3.1.30, created on 2017-07-13 16:48:13
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/dropout.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596733cd888c51_51258283',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c3a8054081a5854e3b8caea4222a00b295417d85' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/dropout.html',
      1 => 1499824434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/student/comStudent.html' => 1,
    'file:admin/student/setState.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_596733cd888c51_51258283 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <?php $_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">学员管理</a></li>
    <li class="active">退学申请</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform clearfix">
        <div class="col-sm-8">

            <form class="form-horizontal" id="dropoutform">
                <h1 class="center-block text-center">退学申请</h1>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">身份证号码</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control  noempty" id="national_id" name="national_id"
                               v-model="appinfo.user_info.national_id">
                    </div>
                    <div class="col-sm-2"><button type="button" class="btn btn-default" @click="nameFilter">查询</button></div>

                </div>
                <template v-if="stuinfostate">
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">学员信息</label>
                        <div class="col-sm-8">
                            <?php $_smarty_tpl->_subTemplateRender("file:admin/student/comStudent.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                        </div>

                    </div>
                </template>

                <div class="form-group">
                    <label for="reason" class="col-sm-3 control-label">退学事由</label>
                    <div class="col-sm-6">
                        <textarea class="form-control noempty" rows="3" id="reason" name="reason" v-model="appinfo.remake"></textarea>

                        <span id="reasonhelp" class="help-block hidden">事由不能为空</span>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="button" class="btn btn-primary" @click.prevent="subform">提交</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div class="regform">
        <select name="" id="" style="height: 34px;padding: 6px 12px;font-size: 14px;line-height: 1.42857143;color: #555555;background-color: #ffffff;background-image: none;border: 1px solid #cccccc;border-radius: 4px;" v-model="req_state">
            <option value="1">未处理</option>
            <option value="2">已同意</option>
            <option value="3">已退回</option>
        </select>
        <table class="table table-bordered table-hover table-responsive" >
            <thead>

            <th >学号</th>
            <th >姓名</th>
            <th >退学事由</th>
            <th >处理状态</th>
            <th >操作</th>
            </thead>
            <tbody>
            <tr v-for="item in applist.data">
                <td>{{item.student_id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.remake}}</td>
                <td>{{item.com_state|comState}}</td>
                <td>
                    <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal1" v-on:click="setState(item,1)"><span
                            class="glyphicon glyphicon-pencil"
                            aria-hidden="true"></span>&nbsp;同意</a>
                    <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal1" v-on:click="setState(item,0)"><span
                            class="glyphicon glyphicon-remove"
                            aria-hidden="true"></span>&nbsp;退回</a>
                </td>
            </tr>

            </tbody>
        </table>
        <nav>
            <ul class="pagination">
                <li  @click="pageMinus(applist.pageIndex,gotoDjob)" ><a href="#">上一页</a></li>
                <li v-for="(item,index) in applist.pageAll" v-bind:class="{ 'active': applist.pageIndex == index}" @click="gotoDjob(index)"><a href="#">{{index+1}} <span class="sr-only"></span></a></li>
                <li @click="pagePlus(applist.pageIndex,gotoDjob)"><a href="#" >下一页</a></li>
            </ul>
        </nav>
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
                    <!--<button type="button" class="btn btn-primary" id="delstudent" v-on:click="toNext">下一步</button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>

    <?php $_smarty_tpl->_subTemplateRender("file:admin/student/setState.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>


<?php echo '<script'; ?>
 src="../html/default/admin/js/student/dropout.js">
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>




<?php }
}
