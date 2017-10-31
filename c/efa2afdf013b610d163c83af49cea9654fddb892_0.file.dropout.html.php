<?php
/* Smarty version 3.1.30, created on 2017-06-25 14:20:21
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/dropout.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_594f56259d1cc7_73466318',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'efa2afdf013b610d163c83af49cea9654fddb892' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/dropout.html',
      1 => 1498371587,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/student/comStudent.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_594f56259d1cc7_73466318 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">收费管理</a></li>
    <li class="active">退学退费</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform clearfix">
        <table class="table table-bordered table-hover">

            <thead>
            <tr> <h3 >退费列表</h3></tr>

            <tr>
                <th>学号</th>
                <th>姓名</th>
                <th>时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>rdjx201542654</td>
                <td>C1</td>
                <td>3280</td>
                <td>
                    <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil"
                                                                                                          aria-hidden="true"></span>&nbsp;退费</a>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 600px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="exampleModalLabel">退费信息</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="chargeinfo">

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">身份证号码</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control  noempty" id="national_id" name="national_id"
                                       v-model="appinfo.national_id">
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
                            <label for="chargeValue" class="col-sm-3 control-label">费用金额</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control noempty" id="chargeValue" name="chargeValue"
                                       placeholder=""><span  class="help-block hidden">不能为空</span>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" form="chargeinfo">提交</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>

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
                        <!--<button type="button" class="btn btn-primary" id="delstudent" v-on:click="toNext">下一步</button>-->
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
 src="../html/default/admin/js/finance/dropout.js">
<?php echo '</script'; ?>
>



<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
