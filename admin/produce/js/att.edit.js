$(document).ready(function() {
    $("#show_one").click(function() {
        $("#show_one").children("#produce_att").fadeIn(500);
        $("#show_two").children("#produce_att").fadeOut(100);
        $("#show_three").children("#produce_att").fadeOut(100);
    });
    $("#show_two").click(function() {
        $("#show_two").children("#produce_att").fadeIn(500);
        $("#show_one").children("#produce_att").fadeOut(100);
        $("#show_three").children("#produce_att").fadeOut(100);
        var ue = UE.getEditor('intro', { initialFrameHeight: 440, initialFrameWidth: 950 });
        $("#show_two").children("#produce_att").mouseleave(function() {
            var value = ue.getContent();
            var r_id = $("#r_id").val();
            var actions = "redme";
            call_back_upc(actions, r_id, value);
        });
    });
    $("#show_three").click(function() {
        $("#show_three").children("#produce_att").fadeIn(500);
        $("#show_two").children("#produce_att").fadeOut(100);
        $("#show_one").children("#produce_att").fadeOut(100);
    });

    $("#disp_value_view").live("click", function() {
        $("#disp_list_type_xx").fadeIn(300);
        $("#disp_list_type_xx li").each(function(index) {
            $(this).click(function() {
                switch (index) {
                    case 0:
                        var select_value = "all";
                        break;
                    case 1:
                        var select_value = "onle";
                        break;
                }
                $("#disp_value_view").text($(this).text());
                var produce_att_random_id = $("#produce_att_random_id").val();
                $("#disp_list_type_xx").fadeOut(200);
                //var selcet_s = $(this).text();
                $("#P_A_l_T|" + produce_att_random_id).text($(this).text());
                $.ajax({
                    type: 'post',
                    url: "ajax/security.ajax.php?action=up_produce_att",
                    data: {
                        input_action: 'str_type',
                        produce_att_random_id: produce_att_random_id,
                        input_value: select_value
                    },
                    success: function(response, status, xhr) {
                        $("#web_state").fadeIn(100);
                        $("#web_state").text("Save...");
                        document.getElementById("palt|" + produce_att_random_id).innerHTML = select_value;
                        $("#web_state").fadeOut(1000);
                    },
                    dataType: 'html',
                });
            });
        });
        $("#disp_list_type_xx").mouseleave(function() {
            $("#disp_list_type_xx").fadeOut(300);
        });
    });
    $("#auto_save_input_name").live("mouseleave", function() {
        var produce_att_random_id = $("#produce_att_random_id").val();
        var input_values = $("#auto_save_input_name").val();
        $("#P_A_l_V|" + produce_att_random_id).text(input_values);
        $.ajax({
            type: 'post',
            url: "produce/produces.ajax.php",
            data: {
                action: "up_produce_att",
                i_a: 'name',
                r_id: produce_att_random_id,
                i_v: input_values
            },
            success: function(data) {
                if (data.state == "ok") {
                    $("#web_state").fadeIn(100);
                    $("#web_state").text(data.msg);
                    document.getElementById("palv|" + produce_att_random_id).innerHTML = input_values;
                    $("#web_state").fadeOut(1000);
                } else {
                    layer.alert(data.msg);
                }
            },
            dataType: 'json',
        });
    });
    $("#insert_produce_att_submit").live("click", function() {
        var new_value = $("#insert_new_produce_att_value").val();
        var produce_att_random_id = $("#produce_att_random_id").val();
        $.ajax({
            type: 'post',
            url: "produce/produces.ajax.php",
            data: {
                action: 'add_produce_att_value',
                r_id: produce_att_random_id,
                i_v: new_value
            },
            success: function(response, status, xhr) {
                $("#web_state").fadeIn(100);
                $("#web_state").text("Save...");
                document.getElementById("palx|" + produce_att_random_id).innerHTML = response;
                $("#web_state").fadeOut(1000);
            },
            dataType: 'html',
        });
    });
    $("#auto_save_att_xx_value").live("mouseleave", function() {
        var input_value = $("#auto_save_att_xx_value").val();
        var aciton_random_id = $("#produce_att_random_id").val();
        var att_system_id = $("#att_system_id").val();
        $.ajax({
            type: 'post',
            url: "produce/produces.ajax.php",
            data: {
                action: "up_produce_att_value_xx",
                i_v: input_value,
                s_id: att_system_id,
                r_id: aciton_random_id,
            },
            success: function(data) {
                if (data.state == "ok") {
                    $("#" + att_system_id).text(input_value);
                    $("#web_state").fadeIn(100);
                    $("#web_state").text("Save...");
                    $("#web_state").fadeOut(1000);
                } else {
                    layer.alert("error !");
                }
            },
            dataType: 'json',
        });
    });
    $("#disp_value_views").live("click", function() {
        $("#disp_list_type_xx").fadeIn(300);
        $("#disp_list_type_xx li").each(function(index) {
            $(this).click(function() {
                switch (index) {
                    case 0:
                        var select_value = "I";
                        break;
                    case 1:
                        var select_value = "S";
                        break;
                }
                $("#disp_value_views").text($(this).text());
                $("#disp_list_type_xx").fadeOut(200);
            });
        });
        $("#disp_list_type_xx").mouseleave(function() {
            $("#disp_list_type_xx").fadeOut(300);
        });
    });

});

function disp_list_type_over() {
    var input_value = $("#auto_save_att_xx_value").val();
    var aciton_random_id = $("#produce_att_random_id").val();
    var att_system_id = $("#att_system_id").val();
    $("#disp_list_type_xx").fadeIn(300);
    $("#disp_list_type_xx li").each(function(index) {
        $(this).click(function() {
            var data = $(this).text();
            $("#disp_list_type_xx").css({ "display": "none" });
            $("#disp_value_viewss").text($(this).text());
            disp_list_type_send(input_value, aciton_random_id, att_system_id);
        });
    });
}

function disp_list_type_send(input_value, aciton_random_id, att_system_id) {
    //str_type
    $.ajax({
        type: 'post',
        url: "produce/produces.ajax.php",
        data: {
            action: "test_class",
            input_value: input_value,
            att_system_id: att_system_id,
            aciton_random_id: aciton_random_id,
        },
        success: function(data) {
            /*			if(data.state=="ok"){
            		    	$("#"+att_system_id).text(input_value);
                           	$("#web_state").fadeIn(100);
            				$("#web_state").text("Save...");
            				$("#web_state").fadeOut(1000);
            			}else{
            				layer.alert(data);
            			}*/
            layer.alert(data);
        },
        dataType: 'json',
    });
}














// add new value
function P_A_A() {
    var class_random_id = $("#r_id").val();
    var new_value = $("#add_save_input_name").val();
    var select_s = $("#disp_value_views").text();
    if (new_value == "") {
        layer.msg('请输入内容！');
        $("#add_save_input_name").focus();
        exit();
    }
    $.ajax({
        type: 'post',
        url: "produce/produces.ajax.php",
        data: {
            action: 'add_produce_att',
            r_id: class_random_id,
            i_v: new_value,
            s_c: select_s
        },
        success: function(data) {
            $("#web_state").fadeIn(100);
            $("#web_state").text("Save...");
            $("#web_state").fadeOut(1000);
            $(".l_v").empty();
            $(".l_v").append(data);
        },
        dataType: 'html',
    });
}
// auto up menu
function up_c(action) {
    var r_id = $("#r_id").val();
    var value = $("#" + action).val();
    switch (action) {
        case "name":
            parent.$('#class_name_' + r_id).text(value);
            //parent.$('.class_name_'+class_random_id).text(input_value);
            call_back_upc("name", r_id, value);
            break;
        case "key":
            parent.$('#class_keyword_' + r_id).text(value);
            call_back_upc("keyword", r_id, value);
            break;
        case "descri":
            parent.$('#class_description_' + r_id).text(value);
            call_back_upc("description", r_id, value);
            break;
        case "link":
            parent.$('#class_linkfile_' + r_id).text(value);
            call_back_upc("linkfile", r_id, value);
            break;
    }
}

function call_back_upc(actions, r_id, value) {
    $.ajax({
        type: 'post',
        url: "produce/produces.ajax.php",
        data: {
            action: "up_class_value",
            i_a: actions,
            c_r_id: r_id,
            i_v: value,
        },
        success: function(data) {
            if (data.state == "ok") {
                $("#web_state").fadeIn(100);
                $("#web_state").text("Success !");
                $("#web_state").fadeOut(1000);
            } else {
                $("#web_state").fadeIn(100);
                $("#web_state").text("Unsuccessful!");
                $("#web_state").fadeOut(1000);
            }
            return data;
        },
        dataType: 'json',
    });
}

function ch_sta(str) {
    $("#ch_" + str).text("EDIT");
}

function ch_ste(str) {
    $("#ch_" + str).text("");
}
//change_att_value
function C_A_V(str) {
    var array_send = str.split("|");
    var att_system_id = array_send[0],
        att_random_id = array_send[1];
    $.ajax({
        type: 'post',
        url: "produce/produces.ajax.php",
        data: {
            action: "change_att_value",
            s_id: att_system_id,
            r_id: att_random_id,
        },
        success: function(data) {
            $("#web_state").fadeIn(100);
            $("#web_state").text("Save...");
            $("#change_att").empty();
            $("#change_att").append(data);
            $("#web_state").fadeOut(1000);
        },
        dataType: 'html',
    });
}
//Produce_att_view
function P_A_V(str) {
    $.ajax({
        type: 'post',
        url: "produce/produces.ajax.php",
        data: {
            action: "view_produce_att_value",
            p_a_r_id: str
        },
        success: function(data) {
            //document.getElementById("palx|"+str).innerHTML=data;
            $("#palx|" + str).empty();
            $("#palx|" + str).append(data);
        },
        dataType: 'html',
    });
    $.ajax({
        type: 'post',
        url: "produce/produces.ajax.php",
        data: {
            action: "produce_att_view",
            p_a_r_id: str,
        },
        success: function(data) {
            $("#change_att").empty();
            $("#change_att").append(data);
        },
        dataType: 'html',
    });
}
var xhr;

function createXMLHttpRequest() {
    if (window.ActiveXObject) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    } else if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
}

function ulf() {
    var fileObj = document.getElementById("UFI").files[0];
    if (fileObj == null) {
        layer.alert('你没有选择需要上传的图片！', { skin: '0', closeBtn: 0 });
        exit();
    }
    var token = "lexun";
    var username = "lexun";
    var FileController = 'http://img.30ke.com/upfile.inc.php';
    var form = new FormData();
    form.append("upfile", fileObj);
    form.append("token", token);
    form.append("username", username);
    createXMLHttpRequest();
    xhr.onreadystatechange = handleStateChange;
    xhr.open("post", FileController, true);
    xhr.send(form);
}

function handleStateChange() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200 || xhr.status == 0) {
            get_check();
        }
    }
}

function get_check() {
    $.ajax({
        type: 'post',
        data: { token: "lexun" },
        dataType: 'json',
        url: 'http://img.30ke.com/getimage.php?callback=?',
        success: function(data) {
            if (data.img_path != Null) {
                var r_id = document.getElementById("class_random_id").value;
                var i_path = "http://img.30ke.com/" + data.img_path;
                get_image(r_id, i_path);
            }
        },
    });
}

function get_image(class_random_id, input_value) {
    $.ajax({
        type: "post",
        url: "produce/produces.ajax.php",
        data: {
            action: "up_class",
            input_action: "img_path",
            class_random_id: class_random_id,
            input_value: img_path,
        },
        success: function(data) {
            var imager_change = "url(" + img_path + ")";
            $("#im_s").css({ "backgroundImage": imager_change });
        },
        dataType: 'html',
    });
}
