$(document).ready(function() {
    $("#li_title_0").click(function() {
        $(this).children(".li_title").css({ "background": "#ff0040" });
        $(this).children(".li_content").css('display', 'inline-block');
        $("#li_title_1").children(".li_content").fadeOut(50);
        $("#li_title_2").children(".li_content").fadeOut(50);
        $("#li_title_3").children(".li_content").fadeOut(50);
    });

    $("#li_title_0").children(".li_title").mouseover(function() {
        $(this).css({ "background": "#ff0040" });
    });
    $("#li_title_0").mouseleave(function() {
        $(this).children(".li_title").css({ "background": "#b9b9b9" });
    });
    //第二个
    $("#li_title_1").click(function() {
        $(this).children(".li_title").css({ "background": "#ff0040" });
        $(this).children(".li_content").css('display', 'inline-block');
        $("#li_title_0").children(".li_content").fadeOut(50);
        $("#li_title_2").children(".li_content").fadeOut(50);
        $("#li_title_3").children(".li_content").fadeOut(50);
    });

    $("#li_title_1").children(".li_title").mouseover(function() {
        $(this).css({ "background": "#ff0040" });
    });
    $("#li_title_1").mouseleave(function() {
        $(this).children(".li_title").css({ "background": "#b9b9b9" });
    });
    //第三个
    $("#li_title_2").click(function() {
        $(this).children(".li_title").css({ "background": "#ff0040" });
        $(this).children(".li_content").css('display', 'inline-block');
        $("#li_title_0").children(".li_content").fadeOut(50);
        $("#li_title_1").children(".li_content").fadeOut(50);
        $("#li_title_3").children(".li_content").fadeOut(50);
    });

    $("#li_title_2").children(".li_title").mouseover(function() {
        $(this).css({ "background": "#ff0040" });
    });
    $("#li_title_2").mouseleave(function() {
        $(this).children(".li_title").css({ "background": "#b9b9b9" });
    });
    //第四个
    $("#li_title_3").click(function() {
        $(this).children(".li_title").css({ "background": "#ff0040" });
        $(this).children(".li_content").css('display', 'inline-block');
        $("#li_title_0").children(".li_content").fadeOut(50);
        $("#li_title_1").children(".li_content").fadeOut(50);
        $("#li_title_2").children(".li_content").fadeOut(50);
    });

    $("#li_title_3").children(".li_title").mouseover(function() {
        $(this).css({ "background": "#ff0040" });
    });
    $("#li_title_3").mouseleave(function() {
        $(this).children(".li_title").css({ "background": "#b9b9b9" });
    });

    $("#produce_state_change").click(function() {
        $("#produce_state_change_ul").fadeIn(50).css({ "display": "inline-block" });

        $("#produce_state_change_ul li").each(function(index) {
            $(this).click(function() {
                switch (index) {
                    case 0:
                        var new_value = "ok";
                        break;
                    case 1:
                        var new_value = "no";
                        break;
                }
                $("#produce_state_change").text(new_value);
                $("#produce_state_change_ul").fadeOut(50);
                var produce_random_id = $("#produce_info_random_id").val();
                $.ajax({
                    type: 'post',
                    url: 'ajax/produce.ajax.php?action=auto_save_produce_input_value',
                    data: {
                        input_name: "state",
                        input_value: new_value,
                        produce_random_id: produce_random_id
                    },
                    success: function(response) {},
                    dataType: 'html',
                });
            });
        });
        $("#produce_state_change_ul").mouseleave(function() {
            $("#produce_state_change_ul").fadeOut(50);
        });
    });




});
//auto_save_produce_input_value
function A_S_P_I_V(str) {
    var input_value = $("#" + str).val();
    var produce_random_id = $("#produce_info_random_id").val();
    $.ajax({
        type: 'post',
        url: 'ajax/produce.ajax.php?action=auto_save_produce_input_value',
        data: {
            input_name: str,
            input_value: input_value,
            produce_random_id: produce_random_id
        },
        success: function(response) {
            //alert(response);
        },
        dataType: 'html',

    });
}

function p_disp_att_value_input(str) {
    var str;
    $("#p_disp_att_value_input_add" + str).css({ "display": "inline-block" });
    $("#p_disp_att_value_input_add" + str).mouseleave(function() {
        $(this).fadeOut(50);
    });

}

function p_change_att_input(str) {
    var new_array = str.split("|");
    var value_id = new_array[1];
    var att_random_id = new_array[0];
    var att_value = $("#p_att_value" + value_id).text();
    var produce_random_id = $("#produce_info_random_id").val();
    $("#prodece_p_att_input" + att_random_id).val(att_value);
    $.ajax({
        type: 'post',
        url: 'ajax/produce.ajax.php?action=save_to_p_att_table',
        data: {
            att_xx_id: value_id,
            att_random_id: att_random_id,
            produce_random_id: produce_random_id
        },
        success: function(response) {},
        dataType: 'html',
    });
    $("#p_disp_att_value_input_add" + att_random_id).fadeOut(50);
}

function disp_att_value_input(str) {
    $.ajax({
        type: "post",
        data: {
            send_content: str,
            s_type: "random_id",
        },
        url: "ajax/security.ajax.php?action=produce_send_input",
        success: function(data) {
            $("#disp_att_value_input_add" + str).empty();
            $("#disp_att_value_input_add" + str).append(data);
            $("#disp_att_value_input_add" + str).css({ "display": "inline-block", "background": "#dddddd", "z-index": "1000" });
            $("#disp_att_value_input_add" + str).live("mouseleave", function() { $(this).hide(); });
        },
        dataType: 'html',
    });
}

function change_att_input(str) {
    var new_array = str.split("|");
    //子类的random
    var att_random_id = new_array[0];
    //子类的子类属性	
    var att_xx_system_id = new_array[1];

    var att_xx_value = $("#" + att_xx_system_id).text();
    $("#prodece_c_att_input" + att_random_id).val(att_xx_value);
    $("#disp_att_value_input_add" + att_random_id).hide();

    //获取产品RANDOM
    var produce_random_id = $("#produce_info_random_id").val();
    //alert(att_xx_system_id+att_random_id+produce_random_id);
    //当这这里选择完以后九开始使用ajax 保存数据
    $.ajax({
        type: 'post',
        url: 'ajax/produce.ajax.php?action=save_to_class_table',
        data: {
            att_xx_id: att_xx_system_id,
            att_random_id: att_random_id,
            produce_random_id: produce_random_id
        },
        success: function(response) {},
        dataType: 'html',
    });

}

function del_imager(str) {
    var del_id = str;
    layer.confirm('删除之前请确认咯！？', { btn: ['确定删除', '我很惆怅'] },
        function() {
            $.ajax({
                type: 'post',
                url: "ajax/produce.ajax.php?action=del_imager",
                data: { del_id: del_id },
                success: function(response, status, xhr) {
                    $("#imager_view_s").empty();
                    $("#imager_view_s").append(response);
                    layer.msg('删除已经成功咯，你没有后悔吧！嘻嘻！', { icon: 1 });

                },
                dataType: 'html',
            });
        },
        function() {
            layer.msg('删除已经取消咯，你是一个让人惆怅的人！', { icon: 1 });
        }
    );
}
