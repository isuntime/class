<?php
/* Smarty version 3.1.30, created on 2017-06-07 16:40:53
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/student/resultInput.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5937bc15914644_33202077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3c691d80b90d6d57f6f83053a882dfe612eb2033' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/student/resultInput.html',
      1 => 1496824715,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/student/nav.html' => 1,
    'file:admin/student/sidebar.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_5937bc15914644_33202077 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:admin/student/nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:admin/student/sidebar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="col-sm-9" id="app">
    <div class="regform">
        <div class="col-sm-8">

            <form class="form-horizontal"  id="resultinoutform">
                <h1 class="center-block text-center">成绩录入</h1>
                <div class="form-group">
                    <label for="student_id" class="col-sm-2 control-label">学号</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control noempty" id="student_id" name="student_id"
                               placeholder="" v-model="appinfo.student_id" @change="nameFilter"><span id="namehelp" class="help-block hidden">学号不能为空</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">考试科目</label>
                    <div class="col-sm-6">
                        <select name="coach" id="coach" class="form-control" v-model="appinfo.subjecttype" @change="nameFilter">
                            <option v-for="subject in subjectlist" v-bind:value="subject.id">{{subject.name}}</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="testtime" class="col-sm-2 control-label">考试时间</label>
                    <div class="col-sm-6 ">
                        <input type="text" class="form-control findtime noempty" id="testtime" name="testtime">
                        <span id="coachhelp" class="help-block hidden">时间不能为空</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="score" class="col-sm-2 control-label">成绩</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control noempty" id="score" name="score" placeholder="成绩" v-model.lazy="appinfo.ac_num">
                        <span id="coachhelp" class="help-block hidden">成绩不能为空</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-primary" v-on:click="subform">提交</button>
                    </div>
                </div>
            </form>
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

<?php echo '<script'; ?>
 >

<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
