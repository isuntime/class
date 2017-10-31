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

function get_r_id() {
    var r_id = $("#r_id").val();
    if (r_id) {
        return r_id;
    } else {
        alert("error !");
        return false;
    }
}

function ad_new_class() {
    var values = $("#ipt").val();
    if (values == "") {
        $("#ipt").focus();
    } else {
        var rand_id = get_r_id();
        //alert(values+rand_id);
        $.ajax({
            type: 'post',
            url: "produce/produces.ajax.php",
            data: {
                action: 'ad_new_class',
                r_id: rand_id,
                value: values,
            },
            success: function(data) {
                $("#class_list").empty();
                $("#class_list").append(data);
            },
            dataType: 'html',
        });
    }
}

function c_t(r_id) {
    var r_id;
    var c_id = get_r_id();
    $.ajax({
        type: 'post',
        url: "produce/produces.ajax.php",
        data: {
            action: 'get_a_s',
            r_id: r_id,
            c_id: c_id,
        },
        success: function(data) {
            $("#" + c_id).empty();
            $("#" + c_id).append(data).fadeIn(1000);
            $("#ipt").focus();
        },
        dataType: 'html',
    });
}

function e_s(str) {
    var a_d = str.split("|");
    var values = $("#e_s").val();
    //alert(a_d[1]+"||"+values);
    if (values == "") {
        $("#e_s").focus();
    } else {
        $.ajax({
            type: 'post',
            url: "produce/produces.ajax.php",
            data: {
                action: 'edit_service',
                r_id: a_d[1],
                value: values,
            },
            success: function(data) {
                $("#" + a_d[1]).children("#father").empty();
                $("#" + a_d[1]).children("#father").append(data);
            },
            dataType: 'html',
        });
    }
}

function a_v(str) {
    var a_d = str.split("|");
    var values = $("#a_v").val();
    if (values == "") {
        $("#a_v").focus();
    } else {
        $.ajax({
            type: 'post',
            url: "produce/produces.ajax.php",
            data: {
                action: 'children_value',
                r_id: a_d[1],
                value: values,
            },
            success: function(data) {
                $("#" + a_d[1]).children("#son").empty();
                $("#" + a_d[1]).children("#son").append(data);
                $("#a_v").focus();
            },
            dataType: 'html',
        });
    }
}

function c_e(str) {
    var a_d = str.split("|");
    if (a_d[0] != "") {
        var c_id = get_r_id();
        $.ajax({
            type: 'post',
            url: 'produce/produces.ajax.php',
            data: {
                action: 'get_children_value',
                r_id: a_d[1],
                s_id: a_d[0],
            },
            success: function(data) {
                $("#" + c_id).empty();
                $("#" + c_id).append(data);
            },
            dataType: 'html',
        });
    }
}

function c_e_s(str) {
    var a_d = str.split("|");
    var r_id = a_d[1];
    var values = $("#c_e").val();
    if (a_d[0] != "") {
        var c_id = get_r_id();
        $.ajax({
            type: 'post',
            url: 'produce/produces.ajax.php',
            data: {
                action: 'edit_children_value',
                value: values,
                s_id: a_d[0],
                r_id: r_id,
            },
            success: function(data) {
                $("#" + r_id).children("#son").empty();
                $("#" + r_id).children("#son").append(data);
            },
            dataType: 'html',
        });
    }
}

function c_e_d(str) {
    var a_d = str.split("|");
    var r_id = a_d[1];
    var values = $("#c_e").val();
    if (a_d[0] != "") {
        var c_id = get_r_id();
        $.ajax({
            type: 'post',
            url: 'produce/produces.ajax.php',
            data: {
                action: 'del_children_value',
                s_id: a_d[0],
                r_id: r_id,
            },
            success: function(data) {
                $("#" + r_id).children("#son").empty();
                $("#" + r_id).children("#son").append(data);
            },
            dataType: 'html',
        });
    }
}

function b_k() {
    var r_id = get_r_id();
    $.ajax({
        type: 'post',
        url: 'produce/produces.ajax.php',
        data: {
            action: 'ad_b_c',
        },
        success: function(data) {
            $("#" + r_id).empty();
            $("#" + r_id).append(data);
        },
        dataType: 'html',
    });
}

function d_c(r_id) {
    $.ajax({
        type: 'post',
        url: 'produce/produces.ajax.php',
        data: {
            action: 'delete_class_att',
            c_id: c_id = get_r_id(),
            r_id: r_id,
        },
        success: function(data) {
            $("#class_list").empty();
            $("#class_list").append(data);
        },
        dataType: 'html',
    });
}
