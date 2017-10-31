<?php
/* Smarty version 3.1.30, created on 2017-07-05 15:10:52
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/paytable.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595c90fc957659_78892005',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed2f2774d7572ac6e6a7393099964216e68cfe08' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/paytable.html',
      1 => 1499221131,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/finance/comPay.html' => 1,
  ),
),false)) {
function content_595c90fc957659_78892005 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-sm-8" id="app">
    <div class="regform clearfix">
        <h1>未缴费学生列表</h1>
        <table class="table table-bordered table-hover table-responsive" >
            <thead>

            <th >学号</th>
            <th >姓名</th>
            <th >准驾类型</th>
            <th>缴费状态</th>
            <th>操作</th>
            </thead>
            <tbody>
            <tr v-for="item in applists.job.data">
                <td>{{item.student_id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.vehicle_type_name}}</td>
                <td>{{item.pay_state|stateFilter}}</td>
                <td>
                    <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal" v-on:click="getInfo(item)"><span
                            class="glyphicon glyphicon-pencil"
                            aria-hidden="true"></span>&nbsp;缴费</a>
                    <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal1" v-on:click="getInfo(item)"><span
                            class="glyphicon glyphicon-remove"
                            aria-hidden="true"></span>&nbsp;删除</a>
                </td>
            </tr>

            </tbody>
        </table>
        <nav>
            <ul class="pagination">
                <li  @click="pageMinus(applists.job.pageIndex,gotoJob)" ><a href="#">上一页</a></li>
                <li v-for="(item,index) in applists.job.pageAll" v-bind:class="{ 'active': applists.job.pageIndex == index}" @click="gotoJob(index)"><a href="#">{{index+1}} <span class="sr-only"></span></a></li>
                <li @click="pagePlus(applists.job.pageIndex,gotoJob)"><a href="#" >下一页</a></li>
            </ul>
        </nav>

    </div>
    <div class="regform clearfix">
        <h1>已缴费学生列表</h1>
        <table class="table table-bordered table-hover table-responsive" >
            <thead>
            <th>勾选打印</th>
            <th >学号</th>
            <th >姓名</th>
            <th >准驾类型</th>
            </thead>
            <tbody>
            <tr v-for="item in applists.djob.data">
                <td><input type="checkbox" v-model="printCar" v-bind:value="item.student_id" ></td>
                <td>{{item.student_id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.vehicle_type_name}}</td>
            </tr>

            </tbody>
        </table>
        <a href="#" class="btn btn-danger " v-on:click="PrintVoucherinfo"><span
                class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;打印学生证</a>
        <nav>
            <ul class="pagination">
                <li  @click="pageMinus(applists.djob.pageIndex,gotoDjob) " ><a >上一页</a></li>
                <li v-for="(item,index) in applists.djob.pageAll" v-bind:class="{ 'active': applists.djob.pageIndex == index}" @click="gotoDjob(index)"><a >{{index+1}} <span class="sr-only"></span></a></li>
                <li @click="pagePlus(applists.djob.pageIndex,gotoDjob)"><a >下一页</a></li>
            </ul>
        </nav>

    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 800px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="exampleModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <?php $_smarty_tpl->_subTemplateRender("file:admin/finance/comPay.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" @click.prevent="subform">缴费</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="messageModel" tabindex="-1" role="dialog" aria-labelledby="messageModelLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="messageModelLabel"></h4>
                </div>
                <div class="modal-body" v-text="message"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">确认删除？<span id="stname"></span></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="delstudent" v-on:click="setState">提交更改</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" >关闭</button>

                </div>
            </div>
        </div>
    </div>
</div><?php }
}
