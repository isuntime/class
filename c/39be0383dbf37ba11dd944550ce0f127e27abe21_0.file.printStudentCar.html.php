<?php
/* Smarty version 3.1.30, created on 2017-06-18 11:53:50
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/printStudentCar.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5945f94ec80d91_88113049',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39be0383dbf37ba11dd944550ce0f127e27abe21' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/printStudentCar.html',
      1 => 1497758027,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5945f94ec80d91_88113049 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="modal fade" id="PrintVoucher" tabindex="-1" role="dialog" aria-labelledby="PrintVoucherLabel">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="PrintVoucherLabel">打印学生证</h4>
            </div>
            <div class="modal-body">
                <div id="PrintInfo">
                        <table class="table table-bordered table-condensed">
                            <caption>
                                博州荣达驾训学员证
                            </caption>
                            <tbody>
                            <tr>
                            <td class="col-sm-3">驾校联系电话：</td>
                            <td class="col-sm-3">2288019</td>
                            <td  colspan="5" rowspan="3"><img src="" alt=""></td>
                            </tr>
                            <tr></tr>
                            <tr>
                            <td>学员姓名：</td>
                            <td></td>

                            </tr>
                            <tr></tr>
                            <tr>
                            <td>身份证号：</td>
                            <td></td>

                            </tr>
                            <tr></tr>
                            <tr>
                            <td>性别：</td>
                            <td></td>
                            <td class="col-sm-3">车型：</td>
                            <td></td>

                            </tr>
                            <tr>
                            <td>联系电话：</td>
                            <td></td>
                            <td>学号：</td>
                            <td></td>
                            </tr>
                            <tr>
                            <td>理论时间：</td>
                            <td></td>
                            <td>术科时间：</td>
                            <td></td>
                            </tr>
                            </tbody>
                        </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"  onclick="pubprint()">打印</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>

            </div>
        </div>
    </div>

</div><?php }
}
