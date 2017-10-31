<?php
/* Smarty version 3.1.30, created on 2017-06-14 21:11:29
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/PrintVoucher.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59413601555510_67080178',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25b6216674a14b953acda8eacf6ee0e10c589724' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/finance/PrintVoucher.html',
      1 => 1497445881,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59413601555510_67080178 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="modal fade" id="PrintVoucher" tabindex="-1" role="dialog" aria-labelledby="PrintVoucherLabel">
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="PrintVoucherLabel">打印票据</h4>
            </div>
            <div class="modal-body">
                <div id="PrintInfo">
                        <table>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
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
