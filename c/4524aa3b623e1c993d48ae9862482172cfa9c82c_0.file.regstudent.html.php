<?php
/* Smarty version 3.1.30, created on 2017-10-17 10:36:50
  from "/home/wwwroot/bzrdjx/public_html/html/default/admin/student/regstudent.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59e56cc287e370_51921427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4524aa3b623e1c993d48ae9862482172cfa9c82c' => 
    array (
      0 => '/home/wwwroot/bzrdjx/public_html/html/default/admin/student/regstudent.html',
      1 => 1507970585,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59e56cc287e370_51921427 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!--<OBJECT classid="clsid:10946843-7507-44FE-ACE8-2B3483D179B7"-->
        <!--id="CVR_IDCard" name="CVR_IDCard"-->
         <!--width="0" height="0"-->
        <!--&gt;-->
    <!--&lt;!&ndash;codebase="http://bzrdjx.com/CVR100U_DBS/IDCardReader.ocx#version=5.0.1.3" type="application/x-itst-activex"&ndash;&gt;-->
<!--</OBJECT>-->


<div class="col-sm-8" id="app">
    <div class="row regform">
        <object id="CertCtl" type="application/cert-reader" width="0" height="0">
            <p style="color:#FF0000;" class="col-sm-offset-1 text-danger">控件不可用，可能未正确安装控件及驱动，或者控件未启用。首次办理本业务请先下载安装相关设备驱动包和IE控件，<a href="http://bzrdjx.com/setup.rar">点此下载</a></p>
        </object>
        <!--<p class="col-sm-offset-1 text-danger" style="border-bottom: 1px solid #EEEEEE;">系统提示：<br/>-->
            <!--1 请使用360急速浏览器切换兼容模式办理本业务。该控件不支持其他浏览器。请先更新最新ie版本<a href="http://bzrdjx.com/ie.zip">点此下载</a><br/>-->
            <!--2 首次办理本业务请先下载安装相关设备驱动包和IE控件，<a href="http://bzrdjx.com/setup.rar">点此下载</a></p>-->

        <form class="form-horizontal" id="regform" enctype="multipart/form-data">

            <div class="col-sm-12 regform">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="studentname" class="col-sm-4 control-label">姓名</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control noempty" id="studentname" name="name"
                                   placeholder="学员姓名" v-model="appinfo.name"><span id="namehelp"
                                                                                   class="help-block hidden">姓名不能为空</span>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="sex" class="col-sm-4 control-label">性别</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control noempty"  name="sex" placeholder="性别"
                                    v-bind:value="Sex">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nationality" class="col-sm-4 control-label">国籍</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control noempty" id="nationality" name="nationality"
                                   placeholder="国籍" value="中国" v-model="appinfo.nationality">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="CertificateType" class="col-sm-4 control-label">证件类型</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control noempty" id="CertificateType" name="certificatetype"
                                   placeholder="居民身份证" value="居民身份证" v-model="appinfo.certificatetype">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="national_id" class="col-sm-4 control-label">身份证号</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control noempty" id="national_id" name="national_id"
                                   placeholder="身份证号" v-model="appinfo.national_id" >
                            <span id="national_idhelp" class="help-block hidden">身份证号不能为空</span>
                        </div>

                    </div>


                    <div class="form-group">
                        <label for="nation" class="col-sm-4 control-label">民族</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control noempty" id="nation" name="nation" placeholder="民族"
                                   v-model="appinfo.nation">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="postalcode" class="col-sm-4 control-label">邮编</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control noempty" id="postalcode" name="postalcode"
                                   value="833400" placeholder="邮编" v-model="appinfo.postalcode">
                            <span id="postalcodehelp" class="help-block hidden">邮编不能为空</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address" class="col-sm-4 control-label">邮寄地址</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control noempty" id="address" name="address"
                                   placeholder="邮寄住址" v-model="appinfo.address">
                            <span id="addresshelp" class="help-block hidden">地址不能为空</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="birthday" class="col-sm-4 control-label">出生日期</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control noempty" id="birthday" name="birthday"
                                   placeholder="出生日期" v-model="appinfo.birthday">
                            <span id="birthdayhelp" class="help-block hidden">生日不能为空</span>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="tel" class="col-sm-4 control-label">固定电话</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="tel" name="tel" placeholder="固定电话"
                                   v-model="appinfo.tel">
                            <span id="telhelp" class="help-block hidden">固定电话不能为空</span>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="phone" class="col-sm-4 control-label">手机号码</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control  noempty" id="phone" name="phone" placeholder="手机号码"
                                   v-model="appinfo.phone">
                            <span id="phonehelp" class="help-block hidden">手机号码不能为空</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">邮箱</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="email" name="email" placeholder="邮箱"
                                   v-model="appinfo.email">
                            <span id="emhelp" class="help-block hidden">邮箱不能为空</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">准驾车型</label>
                        <div class="col-sm-8">
                            <div class="radio">
                                <label v-for="(type,index) in vehicle_typelist" >
                                    <input type="radio" v-bind:value="type.id" v-model="appinfo.vehicle_type">{{type.vehicle_type_name}}&nbsp
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">班级类型</label>
                        <div class="col-sm-8">

                                <select name="class_type" id="class_type" class="form-control " v-model="appinfo.class_type">
                                    <option value="1">
                                        普通班
                                    </option>
                                    <option value="2">
                                        VIP
                                    </option>
                                    <option value="3">
                                        先学后付费班
                                    </option>
                                </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="coachname" class="col-sm-4 control-label">推荐人</label>
                        <div class="col-sm-4">
                            <select name="department" id="department" class="form-control " v-model="dep_id"
                                    v-on:change="setworker">
                                <option v-for="(dep,index) in departmentList" v-bind:value="dep.id">
                                    {{dep.department_name}}
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select name="coach" id="coach" class="form-control" v-model="appinfo.recommend">
                                <option v-for="work in worklist" v-bind:value="work.worker_id">{{work.name}}</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="button" class="btn btn-primary" v-on:click.prevent="subform">注册</button>
                        </div>
                    </div>
                    <!--<div class="form-group ">
                        <label for="studentphoto" class="col-sm-2 control-label">上传照片</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" name="studentphoto" id="studentphoto" v-on:change="onFileChange">
                        </div>
                    </div>-->
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="" id="yulan">
                            <img v-bind:src="appinfo.studentphoto" class="" alt="" id="pic" name="pic"
                                 placeholder="照片">
                        </div>
                        <div class="regform" style="position: relative;">
                            <!--<div class="zhunxing"></div>-->
                            <div id="webcam"></div>
                        </div>


                    </div>

                    <div class="form-group">
                        <div class=" col-sm-8">
                            <button type="button" class="btn btn-info" id="readCard" @click="readStudentCard">读取身份证</button>
                            <button type="button" class="btn btn-info" id="camphoto" v-on:click="savePhoto">拍照</button>
                        </div>
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
            <div class="modal-body" v-text="messages"></div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-primary" id="delstudent" v-on:click="toNext">下一步</button>-->
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

            </div>
        </div>
    </div>
</div>
</div>
<?php echo '<script'; ?>
 src="../html/default/admin/js/cm/jquery.webcam.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(function () {
        var pos = 0, ctx = null, saveCB, image = [];

        var canvas = document.createElement("canvas");
        canvas.setAttribute('width', 320);
        canvas.setAttribute('height', 240);
//    	$("#yulan").append(canvas);
        if (canvas.toDataURL) {
            ctx = canvas.getContext("2d");

            image = ctx.getImageData(0, 0, 320, 240);

            saveCB = function (data) {
                var col = data.split(";");
                var img = image;
                for (var i = 0; i < 320; i++) {
                    var tmp = parseInt(col[i]);
                    img.data[pos + 0] = (tmp >> 16) & 0xff;
                    img.data[pos + 1] = (tmp >> 8) & 0xff;
                    img.data[pos + 2] = tmp & 0xff;
                    img.data[pos + 3] = 0xff;
                    pos += 4;
                }

                if (pos >= 4 * 320 * 240) {
                    ctx.putImageData(img, 0, 0);
                    $("#pic").attr('alt', '照片上传中请等待');
                    $.post("/admin/photos.php", {type: "data", image: canvas.toDataURL("image/png")}, function (data) {
                        $("#pic").attr('alt', '');
                        app.$set(app.appinfo, 'studentphoto', data);
                    });
                    pos = 0;
                }

            };

        } else {

            saveCB = function (data) {
                image.push(data);

                pos += 4 * 320;

                if (pos >= 4 * 320 * 240) {
                    $("#pic").attr('alt', '照片上传中请等待');
                    $.post("/admin/photos.php", {type: "pixel", image: image.join('|')}, function (data) {
                        $("#pic").attr('alt', '');
                        app.$set(app.appinfo, 'studentphoto', data);
                    });
                    pos = 0;
                }
            };
        }

        $("#webcam").webcam({

            width: 320,
            height: 240,
            mode: "callback",
            swffile: "../html/default/admin/js/cm/jscam_canvas_only.swf",

            onSave: saveCB,

            onCapture: function () {
                webcam.save();
            },

            debug: function (type, string) {
                console.log(type + ": " + string);
            }
        });

    });
<?php echo '</script'; ?>
><?php }
}
