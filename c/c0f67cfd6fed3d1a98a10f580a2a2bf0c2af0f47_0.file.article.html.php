<?php
/* Smarty version 3.1.30, created on 2017-06-08 14:32:30
  from "/home/wwwroot/jiaxiao/public_html/html/default/admin/reception/article.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5938ef7e7c88c2_27146531',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0f67cfd6fed3d1a98a10f580a2a2bf0c2af0f47' => 
    array (
      0 => '/home/wwwroot/jiaxiao/public_html/html/default/admin/reception/article.html',
      1 => 1496903391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5938ef7e7c88c2_27146531 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!--http://fex.baidu.com/ueditor/#start-toolbar  富文本编辑器文档地址-->

<form class="form-horizontal regform"  id="articleinfo">

    <div class="form-group">
        <label for="title" class="col-sm-2 control-label">标题</label>
        <div class="col-sm-10">
            <input type="text" class="form-control noempty" id="title" name="title"
                   placeholder=""><span  class="help-block hidden">不能为空</span>
        </div>

    </div>

    <div class="form-group">
        <label for="" class="col-sm-2 control-label">所属栏目</label>
        <div class="col-sm-10">
            <select name="colunm" id="colunm" class="form-control">
                <option value="1" selected>dad</option>
                <option value="2" >x</option>
                <option value="3" >可xx用</option>
                <option value="4" >考xxx费用</option>
                <option value="5" >退学xxx退费</option>
                <option value="6" >其他xxx费用</option>
            </select>
        </div>
    </div>

    <div class="form-group">

        <!-- 加载编辑器的容器 -->
        <div class="col-sm-10 col-sm-offset-2">
            <?php echo '<script'; ?>
 id="container" name="content" type="text/plain" >

            <?php echo '</script'; ?>
>
        </div>

        <link href="../html/default/umeditor/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
        <?php echo '<script'; ?>
 type="text/javascript" src="../html/default/umeditor/third-party/template.min.js"><?php echo '</script'; ?>
>
        <!-- 配置文件 -->
        <?php echo '<script'; ?>
 type="text/javascript" src="../html/default/umeditor/ueditor.config.js"><?php echo '</script'; ?>
>
        <!-- 编辑器源码文件 -->
        <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="../html/default/umeditor/ueditor.all.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="../html/default/umeditor/lang/zh-cn/zh-cn.js"><?php echo '</script'; ?>
>
        <!-- 实例化编辑器 -->
        <?php echo '<script'; ?>
 type="text/javascript">
            var ue = UE.getEditor('container');
        <?php echo '</script'; ?>
>


    </div>




    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">提交</button>
        </div>
    </div>

</form><?php }
}
