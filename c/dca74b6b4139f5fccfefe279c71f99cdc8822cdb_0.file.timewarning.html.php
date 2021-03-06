<?php
/* Smarty version 3.1.30, created on 2017-10-17 10:39:33
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/student/timewarning.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e56d6529a928_46741467',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dca74b6b4139f5fccfefe279c71f99cdc8822cdb' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/student/timewarning.html',
      1 => 1507794194,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_59e56d6529a928_46741467 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">学员管理</a></li>
    <li class="active">学员超时预警</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">
        <div class="regform">
            <table class="table table-bordered table-hover ">
                <thead>
                    <td>学院编号</td>
                    <td>学院姓名</td>
                    <td>联系电话</td>
                    <td>证件号码</td>
                    <td>教练名称</td>
                    <td>开始时间</td>
                    <td>科一状态</td>
                    <td>剩余天数</td>
                    <td>截止日期</td>
                    <td>科二状态</td>
                    <td>科三状态</td>
                    <td>科四状态</td>
                    
                    <td>过期时间</td>
                    <!--<td>操作</td>-->
                </thead>
                <tbody>
                    <tr v-for="item in applists.job.data">
                        <td>{{item.student_id}}</td>
                        <td>{{item.name}}</td>
                        <td>{{item.phone}}</td>
                        <td>{{item.national_id}}</td>
                        <td>{{item.coach_name}}</td>
                        <td>{{item.reg_time}}</td>
                        <td>{{item.subjectOneState | vipFileter}}</td>
                        <td>{{item.subject_one_end_days}}</td>
                        <td>{{item.subject_one_end_time}}</td>
                        <td>{{item.subjectTwoState | vipFileter}}</td>
                        <td>{{item.subjectThreeState | vipFileter}}</td>
                        <td>{{item.subjectFourState | vipFileter}}</td>
                        
                        <td>{{item.deadline}}</td>
                        <!--<td>-->
                        <!--<a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal" v-on:click="getInfo(item)"><span-->
                        <!--class="glyphicon glyphicon-pencil"-->
                        <!--aria-hidden="true"></span>&nbsp;修改</a>-->
                        <!--<a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal1" v-on:click="getInfo(item)"><span-->
                        <!--class="glyphicon glyphicon-remove"-->
                        <!--aria-hidden="true"></span>&nbsp;删除</a>-->
                        <!--</td>-->
                    </tr>
                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <li @click="pageMinus(applists.job.pageIndex,gotoJob)"><a href="#">上一页</a></li>
                    <li v-for="(item,index) in applists.job.pageAll" v-bind:class="{ 'active': applists.job.pageIndex == index}" @click="gotoJob(index)"><a href="#">{{index+1}} <span class="sr-only"></span></a></li>
                    <li @click="pagePlus(applists.job.pageIndex,gotoJob)"><a href="#">下一页</a></li>
                </ul>
            </nav>
        </div>


    </div>



    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">确认删除该学员？<span id="stname"></span></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="delstudent" v-on:click="setState">提交更改</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="messageModel" tabindex="-1" role="dialog" aria-labelledby="myModal1Label" aria-hidden="true">
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
 src="../html/default/admin/js/student/timewarning.js">
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
