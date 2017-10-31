<?php
/* Smarty version 3.1.30, created on 2017-10-20 15:46:30
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/system/system.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e9a9d6afe937_46725288',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '142d2a45d7e598cb3dbcd7e03f5be613e19db34d' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/system/system.html',
      1 => 1507794196,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_59e9a9d6afe937_46725288 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">系统管理</a></li>
    <li class="active">系统设置</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">
        <h3><strong>系统信息</strong></h3>

        <form id="sysform" class="form-horizontal">

            <div class="form-group">
                <label for="sysinfo"  class="col-sm-2 control-label">操作系统</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control noempty" id="sysinfo"  disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="domain" class="col-sm-2 control-label">域名</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control noempty" id="domain"  disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="portNum" class="col-sm-2 control-label">端口</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control noempty" id="portNum"  disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="routePath"  class="col-sm-2 control-label">网站路径</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control noempty" id="routePath" disabled>
                </div>
            </div>



            <div class="form-group">
                <label for="theoryTime" class="col-sm-2 control-label">理论考试报警时间</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control noempty" id="theoryTime" name="theoryTime" value="30">
                </div>
                    <p class="form-control-static">天</p>
            </div>

            <div class="form-group">
                <label for="totalTime" class="col-sm-2 control-label">学员总体报警时间</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control noempty" id="totalTime" name="totalTime"  value="2">

                </div>
                <p class="form-control-static">年</p>
            </div>

                <!--<div class="form-group">-->
                    <!--<label for="" class="col-sm-2 control-label">科二约车时间</label>-->
                    <!--<div class="col-sm-2">-->
                        <!--<select  class="form-control" name="TwostartTime" id="TwostartTime" >-->
                            <!--<option value="00:00">00:00</option>-->
                            <!--<option value="01:00">01:00</option>-->
                            <!--<option value="02:00">02:00</option>-->
                            <!--<option value="03:00">03:00</option>-->
                            <!--<option value="04:00">04:00</option>-->
                            <!--<option value="05:00">05:00</option>-->
                            <!--<option value="06:00">06:00</option>-->
                            <!--<option value="07:00">07:00</option>-->
                            <!--<option value="08:00">08:00</option>-->
                            <!--<option value="09:00">09:00</option>-->
                            <!--<option value="10:00">10:00</option>-->
                            <!--<option value="11:00">11:00</option>-->
                        <!--</select>-->
                    <!--</div>-->
                    <!--<label for="" class="col-sm-1 control-label">至</label>-->
                    <!--<div class="col-sm-3">-->

                        <!--<select name="TwolastTime" id="TwolastTime"  class="form-control">-->
                            <!--<option value="12:00">12:00</option>-->
                            <!--<option value="13:00">13:00</option>-->
                            <!--<option value="14:00">14:00</option>-->
                            <!--<option value="15:00">15:00</option>-->
                            <!--<option value="16:00">16:00</option>-->
                            <!--<option value="17:00">17:00</option>-->
                            <!--<option value="18:00">18:00</option>-->
                            <!--<option value="19:00">19:00</option>-->
                            <!--<option value="20:00">20:00</option>-->
                            <!--<option value="21:00">21:00</option>-->
                            <!--<option value="22:00">22:00</option>-->
                            <!--<option value="23:00">23:00</option>-->
                        <!--</select>-->
                    <!--</div>-->

                <!--</div>-->
            <!--<div class="form-group">-->
                <!--<label for="totalTime" class="col-sm-2 control-label">科三约车时间</label>-->
                <!--<div class="col-sm-2">-->
                    <!--<select name="ThreestartTime" id="ThreestartTime"  class="form-control">-->
                        <!--<option value="00:00">00:00</option>-->
                        <!--<option value="01:00">01:00</option>-->
                        <!--<option value="02:00">02:00</option>-->
                        <!--<option value="03:00">03:00</option>-->
                        <!--<option value="04:00">04:00</option>-->
                        <!--<option value="05:00">05:00</option>-->
                        <!--<option value="06:00">06:00</option>-->
                        <!--<option value="07:00">07:00</option>-->
                        <!--<option value="08:00">08:00</option>-->
                        <!--<option value="09:00">09:00</option>-->
                        <!--<option value="10:00">10:00</option>-->
                        <!--<option value="11:00">11:00</option>-->
                    <!--</select>-->
                <!--</div>-->
                    <!--<label for="" class="col-sm-1 control-label">至</label>-->
                <!--<div class="col-sm-3">-->

                    <!--<select name="ThreelastTime" id="ThreelastTime"  class="form-control">-->
                        <!--<option value="12:00">12:00</option>-->
                        <!--<option value="13:00">13:00</option>-->
                        <!--<option value="14:00">14:00</option>-->
                        <!--<option value="15:00">15:00</option>-->
                        <!--<option value="16:00">16:00</option>-->
                        <!--<option value="17:00">17:00</option>-->
                        <!--<option value="18:00">18:00</option>-->
                        <!--<option value="19:00">19:00</option>-->
                        <!--<option value="20:00">20:00</option>-->
                        <!--<option value="21:00">21:00</option>-->
                        <!--<option value="22:00">22:00</option>-->
                        <!--<option value="23:00">23:00</option>-->
                    <!--</select>-->
                <!--</div>-->

            <!--</div>-->






            <div class="form-group">

                    <button type="button" class="btn btn-primary col-sm-offset-2">更改</button>

            </div>
        </form>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
