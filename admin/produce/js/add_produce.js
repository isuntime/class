$(document).ready(function() {
    $("#tm_1").click(function() { close_all("0"); });
    $("#tm_2").click(function() { close_all("1"); });
    $("#tm_3").click(function() { close_all("2"); });
    $("#tm_4").click(function() { close_all("3"); });
    $("#p_state").click(function() {
        $(this).children("#son").fadeIn(50).css({ "display": "inline-block" });
        $("#son").mouseleave(function() { $(this).fadeOut(50); });
    });
    $("#son li").each(function(num) {
        $(this).click(function() {
            switch (num) {
                case 0:
                    a_s("state", "yes");
                    break;
                case 1:
                    a_s("state", "no");
                    break;
            }
        });
    });
});
console.log({"msg":"login","state":"ok"});
function close_all(id) {
    if (id == false) { id = "0"; }
    $("#my_m").children("li").each(function(total) {
        if (id == total) {
            $(this).children("m_c").css('display', 'inline-block');
            $(this).children("m_t").css({ "background": "#ff0040" });
        } else {
            $(this).children("m_c").fadeOut(50);
            $(this).children("m_t").css({ "background": "#b9b9b9" });
        }
    });
}
//ok get random_id
function get_r_id() {
    var p_r_id = $("#p_r_id").val();
    if (p_r_id) {
        return p_r_id;
    } else {
        alert("error !");
        return false;
    }
}

function a_s(value, vals = false) {
    switch (value) {
        case "name":
            var p_id = get_r_id();
            var val = $("#" + value).val();
            var a_n = "produce_" + value;
            data = ipt_val(a_n, val, p_id, function(data) {
                console.log(data);
            });
            break;
        case "price":
            var p_id = get_r_id();
            var val = $("#" + value).val();
            var a_n = "produce_" + value;
            data = ipt_val(a_n, val, p_id, function(data) {
                console.log(data);
            });
            break;
        case "state":
            var p_id = get_r_id();
            var val = vals;
            var a_n = value;
            data = ipt_val(a_n, val, p_id, function(data) {
                console.log(data);
                if (data.state == "ok") {
                    $("#p_s_value").text(val);
                } else {
                    alert(data.msg);
                }
            });
            break;
    }
}

function ipt_val(a_n, val, p_id, callback = false) {
    $.ajax({
        type: 'post',
        url: 'produce/produces.ajax.php',
        data: {
            action: 'up_produce_value',
            a_n: a_n,
            v_s: val,
            p_id: p_id,
        },
        success: function(data) {
            callback(data);
        },
        dataType: 'json',
    });
}

function im_del(id) {
    var p_id = get_r_id();
    var del_id = id;
    del_pho(p_id, del_id);
}

function del_pho(p_id, del_id) {
    $.ajax({
        type: 'post',
        url: "produce/produces.ajax.php",
        data: {
            action: 'del_imager',
            del_id: del_id,
            p_id: p_id,
        },
        success: function(data) {
            $("#im_v").empty();
            $("#im_v").append(data);
        },
        dataType: 'html',
    });
}
//choose produce att list
function cpcl(r_id) {
    //console.log(r_id);
    $.ajax({
        type: "post",
        url: "produce/produces.ajax.php",
        data: {
            action: 'cpcv',
            r_id: r_id,
        },
        success: function(data) {
            //callback(data);
            $("#" + r_id).empty();
            $("#" + r_id).append(data);
            $("#" + r_id).fadeIn(50).css({ "display": "inline-block", "background": "#dddddd", "z-index": "9999" });
            $("#" + r_id).live("mouseleave", function() { $(this).hide(); });
        },
        dataType: 'html',
    });
}

function cpal(r_id) {
    //console.log(r_id);
    $.ajax({
        type: "post",
        url: "produce/produces.ajax.php",
        data: {
            action: 'cpav',
            r_id: r_id,
        },
        success: function(data) {
            //callback(data);
            $("#r_" + r_id).empty();
            $("#r_" + r_id).append(data);
            $("#r_" + r_id).fadeIn(50).css({ "display": "inline-block", "background": "#dddddd", "z-index": "9999" });
            $("#r_" + r_id).live("mouseleave", function() { $(this).hide(); });
        },
        dataType: 'html',
    });
}

function cpcv_up(str) {
    var data = str.split("|");
    var r_id = data[0];
    var s_id = data[1];
    var p_id = get_r_id();
    send_v_up(p_id, r_id, s_id, "cpcv_up", function(data) {
        $("#" + data.s_id).val(data.value);
        $("#" + data.r_id).hide(50);
    });
}

function cpav_up(str) {
    var data = str.split("|");
    var r_id = data[0];
    var s_id = data[1];
    var p_id = get_r_id();
    send_v_up(p_id, r_id, s_id, "cpav_up", function(data) {
        $("#" + data.r_id).val(data.value);
        $("#r_" + data.r_id).hide(50);
    });
}

function send_v_up(p_id, r_id, s_id, action, callback) {
    $.ajax({
        type: 'post',
        url: 'produce/produces.ajax.php',
        data: {
            action: action,
            s_id: s_id,
            r_id: r_id,
            p_id: p_id,
        },
        success: function(data) { callback(data); },
        dataType: 'json',
    });
}
