<?php
/* Smarty version 3.1.30, created on 2017-07-04 14:14:42
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/voucher.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595b325222dbb5_50814461',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e27c7e96257980df1f9335506b291556db2b6c6' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/voucher.html',
      1 => 1499147777,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_595b325222dbb5_50814461 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">收费管理</a></li>
    <li class="active">票据管理</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">


        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;录入</a>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#voucherlist"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;票据导入</a>
        <table class="table table-bordered table-hover">

            <thead>
            <tr>
                <th>编号</th>
                <th>学员姓名</th>
                <th>金额</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in applists.job.data">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.pay}}</td>
                <td>
                    <a href="#" class="btn btn-danger "   v-on:click="PrintVoucherinfo(item)" ><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;打印</a>
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
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="exampleModalLabel">票据录入</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal"  id="voucherinfo">

                        <div class="form-group">
                            <label for="voucher_id" class="col-sm-2 control-label">票据编号</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control noempty" id="voucher_id" name="voucher_id"
                                       placeholder=""><span  class="help-block hidden">不能为空</span>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="student_id" class="col-sm-2 control-label">学号</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control noempty" id="student_id" name="student_id"
                                       placeholder="" ><span  class="help-block hidden">不能为空</span>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="sumMoney" class="col-sm-2 control-label">费用金额</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control noempty" id="sumMoney" name="sumMoney"
                                       placeholder="" ><span  class="help-block hidden">不能为空</span>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" form="voucherinfo"@click.prevent="subform">提交</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>

                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="voucherlist" tabindex="-1" role="dialog" aria-labelledby="voucherlist1">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="voucherlist2">新增票据</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="voucherlistinfo">

                        <div class="form-group">
                            <label for="voucher_id" class="col-sm-3 control-label">起始票据编号</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control noempty" id="voucherStartnum" name="voucherStartnum"
                                       placeholder="" v-model="voucherlist.voucherStartnum"><span  class="help-block hidden">不能为空</span>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="voucher_id" class="col-sm-3 control-label">连续票据张数</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control noempty" id="vouchercontinuitynumber" name="vouchercontinuitynumber"
                                       placeholder="" value="10" v-model="voucherlist.vouchercontinuitynumber"><span  class="help-block hidden">不能为空</span>
                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" form="voucherlistinfo" @click="subvoucherform">提交</button>
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

















</div>
<?php echo '<script'; ?>
 src="../html/default/js/LodopFuncs.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../html/default/admin/js/finance/voucher.js">


<?php echo '</script'; ?>
>


<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
