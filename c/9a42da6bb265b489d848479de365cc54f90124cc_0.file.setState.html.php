<?php
/* Smarty version 3.1.30, created on 2017-10-17 10:47:36
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/student/setState.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e56f48b27ef3_78990326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a42da6bb265b489d848479de365cc54f90124cc' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/student/setState.html',
      1 => 1507794194,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e56f48b27ef3_78990326 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="modal fade" id="setState" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"  id="graduationState" >
                    <h1 class="center-block text-center"></h1>
                    <div class="form-group">
                        <label for="student_id" class="col-sm-3 control-label">学号</label>
                        <div class="col-sm-6">
                            <p class="form-control-static col-sm-4 border" v-text="appinfo.student_id"></p>
                        </div>


                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">姓名</label>
                        <div class="col-sm-6">
                            <p class="form-control-static col-sm-4 border" v-text="appinfo.name"></p>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="reason" class="col-sm-3 control-label">备注</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" rows="3" id="reason" name="remake" v-model="appinfo.remake" disabled></textarea>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">是否同意</label>
                        <div class="col-sm-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="agree" value="true" v-model="agree"> 是
                                </label>
                                <label>
                                    <input type="radio" name="agree" value="false" v-model="agree" > 否
                                </label>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" v-on:click.prevent="setState">提交</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" >关闭</button>

            </div>
        </div>
    </div>
</div><?php }
}
