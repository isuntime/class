<?php
/* Smarty version 3.1.30, created on 2017-10-17 10:39:27
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/finance/comTest.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e56d5f0b4820_69622780',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44beceb1755cdbe2db81054138c96544c0569112' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/finance/comTest.html',
      1 => 1508196624,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e56d5f0b4820_69622780 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="col-sm-8" id="app">
    <div class="regform clearfix">
        <h1>未缴费学生列表</h1>
        <table class="table table-bordered table-hover table-responsive" >
            <thead>

            <th >学号</th>
            <th >姓名</th>
            <th >准驾类型</th>
            <th >科目</th>
            <th>缴费状态</th>
            <th >操作</th>
            </thead>
            <tbody>
            <tr v-for="item in applists.job.data">
                <td>{{item.student_id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.vehicle_type_name}}</td>
                <td>{{item.ch_name}}</td>
                <td>{{item.pay_state|stateFilter}}</td>
                <td>
                    <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal" v-on:click="getInfo(item)"><span
                            class="glyphicon glyphicon-pencil"
                            aria-hidden="true"></span>&nbsp;缴费</a>
                    <!--<a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal1" v-on:click="getInfo(item)"><span-->
                            <!--class="glyphicon glyphicon-remove"-->
                            <!--aria-hidden="true"></span>&nbsp;删除</a>-->
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

            <th >学号</th>
            <th >姓名</th>
            <th >准驾类型</th>
            <th >科目</th>
            <th>缴费状态</th>
            <!--<th >操作</th>-->
            </thead>
            <tbody>
            <tr v-for="item in applists.djob.data">
                <td>{{item.student_id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.vehicle_type_name}}</td>
                <td>{{item.ch_name}}</td>
                <td>{{item.pay_state|stateFilter}}</td>
                <!--<td>-->
                    <!--<a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal" v-on:click="getInfo(item)"><span-->
                            <!--class="glyphicon glyphicon-pencil"-->
                            <!--aria-hidden="true"></span>&nbsp;缴费</a>-->
                    <!--&lt;!&ndash;<a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal1" v-on:click="getInfo(item)"><span&ndash;&gt;-->
                    <!--&lt;!&ndash;class="glyphicon glyphicon-remove"&ndash;&gt;-->
                    <!--&lt;!&ndash;aria-hidden="true"></span>&nbsp;删除</a>&ndash;&gt;-->
                    <!--&lt;!&ndash;</td>&ndash;&gt;-->
            </tr>

            </tbody>
        </table>
        <nav>
            <ul class="pagination">
                <li  @click="pageMinus(applists.djob.pageIndex,gotoDjob) " ><a >上一页</a></li>
                <li v-for="(item,index) in applists.djob.pageAll" v-bind:class="{ 'active': applists.djob.pageIndex == index}" @click="gotoDjob(index)"><a >{{index+1}} <span class="sr-only"></span></a></li>
                <li @click="pagePlus(applists.djob.pageIndex,gotoDjob)"><a >下一页</a></li>
            </ul>
        </nav>

    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModaLabel"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="paymentform" >
                        <h1 class="center-block text-center">考试缴费</h1>

                        <div class="form-group">
                            <label for="student_id" class="col-sm-2 control-label">学号：</label>
                            <div class="col-sm-10">
                                <p class="form-control-static" v-text="">{{appinfo.student_id}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">准驾车型：</label>
                            <div class="col-sm-10">
                                <p class="form-control-static" v-text=""> {{appinfo.vehicle_type_name}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">考试科目：</label>
                            <div class="col-sm-10">
                                <p class="form-control-static" v-text=""> {{appinfo.ch_name}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">基本费用：</label>
                            <div class="col-sm-10">
                                <div class="checkbox" >
                                    <p class="form-control-static" v-text="">考试费: {{appinfo.money}}元</p>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="sumMoney" class="col-sm-2 control-label">总计：</label>
                            <div class="col-sm-10">
                                <p class="form-control-static" v-text="">{{appinfo.money}}元</p>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="delstudent" form="paymentform" v-on:click="setState">提交</button>
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
                    <!--<button type="button" class="btn btn-primary" id="delstudent" v-on:click="toNext">下一步</button>-->
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

                </div>
            </div>
        </div>
    </div>
</div>

















<?php }
}
