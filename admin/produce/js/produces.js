$(document).ready(function() {
    $("#service_menu li").each(function(index) {
        $(this).mouseover(function() {
            $(this).children("#menu_title").css({ "background-color": "#dddddd", "color": "#444444" });
            $(this).children(".change_value").slideDown(100).css("display", "inline-block");
        });
        $(this).mouseleave(function() {
            $(this).children("#menu_title").css({
                "background": "#ffffff",
                "color": "#444444",
                "border": "1px solid #dfdfdf"
            });
            $(this).children(".change_value").slideUp(50);
        });
    });
});

function add_produce(str) {
    layer.open({
        type: 2,
        title: "添加产品",
        fix: false,
        shadeClose: true,
        maxmin: true,
        area: ["1100px", "680px"],
        content: ["produces.php?action=add_produce&l_random_id=" + str, "yes"],
    });
}

function edit_class(str) {
    layer.open({
        type: 2,
        title: "edit_class",
        fix: false,
        shadeClose: true,
        maxmin: true,
        area: ["1100px", "680px"],
        content: ["produces.php?action=class_edit&l_random_id=" + str, "yes"],
    });
}

function edit_att(str) {
    layer.open({
        type: 2,
        title: "edit_att",
        fix: false,
        shadeClose: true,
        maxmin: true,
        area: ["1100px", "680px"],
        content: ["produces.php?action=att_edit&l_random_id=" + str, "yes"]
    });
}
//show_produce_edit
function S_P_E(str) {
    layer.open({
        type: 2,
        title: "修改产品",
        fix: false,
        shadeClose: true,
        maxmin: true,
        area: ["1100px", "680px"],
        content: ["produces.php?action=produce_edit&l_random_id=" + str, "no"]
    });
}
var xhr;

function change_edit(str) {
    var array_send = str.split("|");
    if (array_send[0] != "") {
        $.ajax({
            type: 'post',
            url: 'ajax/security.ajax.php?action=changge_att_xx',
            data: { att_random_id: array_send[0], services: array_send[1] },
            success: function(data) {
                $("#" + array_send[1]).html(data);
                $("#inputs_" + array_send[0]).focus();
            },
            dataType: 'html'
        });
    }
}

function change_mysave(str) {
    var array_send = str.split("|");
    var myvalue = $("#inputs_" + array_send[0]).val();
    if (myvalue != "") {
        $.ajax({
            type: 'post',
            url: 'ajax/security.ajax.php?action=changge_att_xx_save',
            data: { att_random_id: array_send[0], send_value: myvalue },
            success: function(data) {
                $("#" + array_send[1]).empty();
                $("#" + array_send[0]).html(data);
            },
            dataType: 'html'
        });
    }
}
