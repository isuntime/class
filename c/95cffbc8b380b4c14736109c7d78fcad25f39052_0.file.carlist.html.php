<?php
/* Smarty version 3.1.30, created on 2017-07-04 13:52:28
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/vehicle/carlist.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_595b2d1cba71e0_37578282',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95cffbc8b380b4c14736109c7d78fcad25f39052' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/vehicle/carlist.html',
      1 => 1499147542,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/top.html' => 1,
    'file:admin/vehicle/carinfo.html' => 1,
    'file:admin/footer.html' => 1,
  ),
),false)) {
function content_595b2d1cba71e0_37578282 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<ol class="breadcrumb" id="breadcrumb">
    <li><a href="#">车辆管理</a></li>
    <li class="active">车辆信息</li>
</ol>
<div class="col-sm-8" id="app">
    <div class="regform">
        <h3><strong>车辆信息</strong></h3>

        <form class="form-horizontal regform" role="form" action="" method="post"
              id="findform">
            <div class="form-group">
                <label for="platenumber" class="col-sm-2 control-label">车牌号</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="platenumber" name="platenumber" placeholder="" v-model="find.plate_number">
                </div>
                <label for="carType" class="col-sm-2 control-label">车型</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="carType" name="carType" placeholder="" v-model="find.car_type">
                </div>
            </div>

            <div class="form-group">
                <label for="vehicletype" class="col-sm-2 control-label">类型</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="vehicletype" name="vehicletype" placeholder="" v-model="find.Vehicle_type">
                </div>
                <label for="InsuranceName" class="col-sm-2 control-label">保险编号</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="InsuranceName" name="InsuranceName" placeholder="" v-model="find.Insurance_number">
                </div>
            </div>

            <div class="form-group">
                <label for="coachname" class="col-sm-2 control-label">教练</label>
                <div class="col-sm-4">
                    <select name="coach" id="coach" class="form-control" v-model="find.coach_id">
                        <option v-for="coach in coachlist" v-bind:value="coach.id">{{coach.name}}</option>
                    </select>
                </div>
                <label for="" class="col-sm-2 control-label">是否合格</label>
                <div class="col-sm-4">
                    <select name="" id="" class="form-control" v-model="find.carstate">
                        <option value="1">合格</option>
                        <option value="0">不合格</option>
                    </select>
                </div>
            </div>

                <!--<div class="form-group">-->
                    <!--<label for="annualverification" class="col-sm-2 control-label">年审时间</label>-->
                    <!--<div class="col-sm-4">-->
                        <!--<input type="text" class="form-control findtime" id="Annual_examination_time" name="annualverification"-->
                                <!--&gt;-->
                    <!--</div>-->
                <!--</div>-->

                <!--<div class="form-group">-->
                    <!--<label for="lasttime" class="col-sm-2 control-label">至</label>-->
                    <!--<div class="col-sm-4">-->
                        <!--<input type="text" class="form-control findtime" id="lasttime" name="lasttime" >-->
                    <!--</div>-->
                <!--</div>-->
                <div class="form-group">
                    <div class="col-sm-offset-2">
                        <button type="button" class="btn btn-success" v-on:click="findlist">查询</button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" v-on:click="clearEditApp">新增
                        </button>
                    </div>
                </div>

        </form>

        <div class="regform">
            <table class="table table-bordered table-hover ">
                <thead>
                <td>车牌号</td>
                <td>车型</td>
                <td>车辆类型</td>
                <td>年审时间</td>
                <td>保险编号</td>
                <td>合格状态</td>
                <td>操作</td>
                </thead>
                <tbody>
                <tr v-for="car in applists.job.data">
                    <td v-text="car.plate_number"></td>
                    <td v-text="car.brand"></td>
                    <td v-text="car.car_type"></td>
                    <td v-text="car.Annual_examination_time"></td>
                    <td v-text="car.Insurance_number"></td>
                    <td >{{car.carstate | stateText}}</td>
                    <td>
                        <a href="#" class="btn btn-success " data-toggle="modal" data-target="#myModal" v-on:click="getInfo(car)"><span
                                class="glyphicon glyphicon-pencil"
                                aria-hidden="true"></span>&nbsp;修改</a>
                        <a href="#" class="btn btn-danger " data-toggle="modal" data-target="#isAbout" v-on:click="getInfo(car)"><span
                                class="glyphicon glyphicon-check" aria-hidden="true"></span>&nbsp;可否约车</a>
                        <!--<a href="#" class="btn btn-danger " data-toggle="modal" data-target="#myModal1" v-on:click="getInfo(car)"><span-->
                                <!--class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;删除</a>-->

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
    </div>
    <div class="modal fade" id="isAbout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="exampleisAbout"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="isAboutinfo">
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">是否可约</label>
                            <div class="col-sm-9">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="isD" value="true" v-model="aboutinfo.isAbout" > 是
                                    </label>
                                    <label>
                                        <input type="radio" name="isD"  value="false" v-model="aboutinfo.isAbout" > 否
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">约车时长</label>
                            <div class="col-sm-8">
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="60" name="timelen" checked="checked" v-model="aboutinfo.abouttime">1小时
                                    </label>
                                    <label>
                                        <input type="radio" value="120" name="timelen" v-model="aboutinfo.abouttime"> 2小时
                                    </label>
                                    <label>
                                        <input type="radio" value="180" name="timelen" v-model="aboutinfo.abouttime"> 3小时
                                    </label>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" form="carinfo"  v-on:click.prevent="subabout">提交</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>

                </div>
            </div>
        </div>
    </div>

    <?php $_smarty_tpl->_subTemplateRender("file:admin/vehicle/carinfo.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1Label"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">确认删除？<span id="stname"></span></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="delstudent" v-on:click="setState">提交更改</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

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


<?php echo '<script'; ?>
 src="../html/default/admin/js/vehicle/carlist.js">

<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:admin/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
