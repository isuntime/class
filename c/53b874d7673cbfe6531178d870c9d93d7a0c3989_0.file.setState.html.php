<?php
/* Smarty version 3.1.30, created on 2017-06-25 14:36:53
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/setState.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_594f5a057450f0_07569961',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53b874d7673cbfe6531178d870c9d93d7a0c3989' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/setState.html',
      1 => 1498372497,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_594f5a057450f0_07569961 (Smarty_Internal_Template $_smarty_tpl) {
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
