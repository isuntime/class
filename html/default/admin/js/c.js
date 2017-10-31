$(function(){

    $("#loginOut").click(function () {
        $.post("index.php?model=logout",function(msg){
            window.location.href="http://bzrdjx.com/";
            }
        );
    });
    setSidebar();
    setInterval(setSidebar,3000);
    $.sidebarMenu($('.sidebar-menu'));

});
$(document).keydown(function(event){
    switch(event.keyCode){
        case 13:return false;
    }
});

//必须带有name  传入dataobj.data
function forminspect(id,dataobj) {
    var group=$("#"+id).find("input.noempty");
    // alert(group);

    // alert( group.eq(0).parents(".form-group").html());
    var len = group.length;
    var state = false;
    // console.log(len);
    for (var i = 0; i < len; i++) {
        // alert(group.eq(i).attr('name'));
        // if(group.eq(i).attr('name')==sex){
        //     continue;
        // }
        name = group.eq(i).attr('name');
        // alert(i+','+name);
        if (name != "" && name != undefined) {
            group.eq(i).parents("td").removeClass("danger");
            group.eq(i).parents(".form-group").removeClass("has-error");
            //检查元素值是否为空
            state = formcheck(name,dataobj);


        }
        if (state == false) {

                group.eq(i).parents("td").addClass("danger");
                group.eq(i).parents(".form-group").addClass("has-error");
            

            return state;
        }

    }
    return state;
}
function formcheck(name,dataobj) {
    for(var x in dataobj){
        // alert(x+' ,'+name);
        if(x==name){
            if(dataobj[x]==''||dataobj[x]===undefined){
                return false;
            }

        }
    }
    return true;
}


var comUrl = {
    index:"index.php",
    finance: "finance.php",
    home: "home.php",
    reception: "reception.php",
    student: "student.php",
    system: "system.php",
    vehicle: "vehicle.php",
    workers: "workers.php",
    public: "public.php",
    prints:"prints.php",
    
}


function ajaxData(url, dataObj) {
    var req;
    $.ajax({
        url: url, type: "post", data:dataObj, dataType: "json",async:false,success: function (request, status) {

            req=request;
        }

    });

    return req;
}

function applist(selectid, requestlist) {
    var requestlist = requestlist;
    if (selectid != null && selectid != undefined) {
        var id = "#" + selectid;
        // console.log(id);
        $(id).empty().removeClass("hidden");


        for (var i = 0; i < requestlist.length; i++) {

            // console.log(requestlist[i].id);
            var li = '<option value="' + requestlist[i].id + '">' + requestlist[i].name + '</option>';

            $(id).append(li);

        }
    }

}

function setSidebar() {
    setTimeout(function () {
        if($(".main-sidebar").height()<$("body"). outerHeight(true) || $(".p-sidebar").height()<$("body"). outerHeight(true)){
            $(".main-sidebar").height($("body"). outerHeight(true));
            // alert( $(".treeview-menu").height());
            $(".treeview-menu").height($(".main-sidebar").height()-20);
        }

    },500);

}

//打印函数

function Preview1Print(style,obj) {
    style(obj);
    LODOP.PREVIEW();
}


//学生证样式
function CreateStudentCard(obj) {
    // alert(obj.info[0].name);
    LODOP=getLodop();
    // LODOP.PRINT_INITA("1.01mm","1.01mm","297mm","210mm","打印学生证");
    LODOP.PRINT_INIT("打印学生证");
    LODOP.SET_PRINT_PAGESIZE(1,"2970","2100","打印学生证");
    LODOP.SET_PRINT_STYLE("FontColor","#0000FF");
    LODOP.ADD_PRINT_RECT(5,9,541,381,0,1);
    LODOP.ADD_PRINT_LINE(47,9,48,550,0,1);
    LODOP.ADD_PRINT_LINE(83,11,84,386,0,1);
    LODOP.ADD_PRINT_LINE(138,9,139,385,0,1);
    LODOP.ADD_PRINT_LINE(190,101,238,102,0,1);
    LODOP.ADD_PRINT_LINE(190,9,191,385,0,1);
    LODOP.ADD_PRINT_LINE(325,9,326,549,0,1);
    LODOP.ADD_PRINT_LINE(363,9,364,550,0,1);
    LODOP.ADD_PRINT_LINE(47,385,237,386,0,1);
    LODOP.ADD_PRINT_LINE(238,9,237,550,0,1);
    LODOP.ADD_PRINT_LINE(284,11,283,551,0,1);
    LODOP.ADD_PRINT_TEXT(18,179,182,33,"博州荣达驾训学员证");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",14);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#E61A1A");
    LODOP.ADD_PRINT_TEXT(56,50,333,30,"驾校联系电话：        2288019");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(117,21,100,20,"学员姓名：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(168,21,100,20,"身份证号：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_LINE(189,101,83,102,0,1);
    LODOP.ADD_PRINT_LINE(238,203,190,204,0,1);
    LODOP.ADD_PRINT_LINE(238,295,190,296,0,1);
    LODOP.ADD_PRINT_LINE(323,203,237,204,0,1);
    LODOP.ADD_PRINT_LINE(364,156,325,157,0,1);
    LODOP.ADD_PRINT_LINE(364,427,325,428,0,1);
    LODOP.ADD_PRINT_TEXT(214,23,100,20,"性别：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(215,212,100,20,"车型：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(258,22,100,20,"联系电话：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(300,23,100,20,"学号：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(335,21,100,20,"理论时间：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(336,317,100,20,"术科时间：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_LINE(364,295,325,296,0,1);
    LODOP.ADD_PRINT_RECT(5,569,541,381,0,1);
    LODOP.ADD_PRINT_LINE(47,569,48,1110,0,1);
    LODOP.ADD_PRINT_LINE(83,571,84,946,0,1);
    LODOP.ADD_PRINT_LINE(138,569,139,945,0,1);
    LODOP.ADD_PRINT_LINE(190,661,238,662,0,1);
    LODOP.ADD_PRINT_LINE(190,569,191,945,0,1);
    LODOP.ADD_PRINT_LINE(325,569,326,1109,0,1);
    LODOP.ADD_PRINT_LINE(363,569,364,1110,0,1);
    LODOP.ADD_PRINT_LINE(47,945,237,946,0,1);
    LODOP.ADD_PRINT_LINE(238,569,237,1110,0,1);
    LODOP.ADD_PRINT_LINE(284,571,283,1111,0,1);
    LODOP.ADD_PRINT_TEXT(18,739,182,33,"博州荣达驾训学员证");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",14);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#E61A1A");
    LODOP.ADD_PRINT_TEXT(56,610,333,30,"驾校联系电话：        2288019");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(117,581,100,20,"学员姓名：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(168,581,100,20,"身份证号：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_LINE(189,661,83,662,0,1);
    LODOP.ADD_PRINT_LINE(238,763,190,764,0,1);
    LODOP.ADD_PRINT_LINE(238,855,190,856,0,1);
    LODOP.ADD_PRINT_LINE(323,763,237,764,0,1);
    LODOP.ADD_PRINT_LINE(364,716,325,717,0,1);
    LODOP.ADD_PRINT_LINE(364,987,325,988,0,1);
    LODOP.ADD_PRINT_TEXT(214,583,100,20,"性别：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(215,772,100,20,"车型：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(258,582,100,20,"联系电话：\r\n");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(300,583,100,20,"学号：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(335,581,100,20,"理论时间：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(336,877,100,20,"术科时间：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_LINE(364,855,325,856,0,1);
    LODOP.ADD_PRINT_RECT(399,9,541,381,0,1);
    LODOP.ADD_PRINT_LINE(441,9,442,550,0,1);
    LODOP.ADD_PRINT_LINE(477,11,478,386,0,1);
    LODOP.ADD_PRINT_LINE(532,9,533,385,0,1);
    LODOP.ADD_PRINT_LINE(584,101,632,102,0,1);
    LODOP.ADD_PRINT_LINE(584,9,585,385,0,1);
    LODOP.ADD_PRINT_LINE(719,9,720,549,0,1);
    LODOP.ADD_PRINT_LINE(757,9,758,550,0,1);
    LODOP.ADD_PRINT_LINE(441,385,631,386,0,1);
    LODOP.ADD_PRINT_LINE(632,9,631,550,0,1);
    LODOP.ADD_PRINT_LINE(678,11,677,551,0,1);
    LODOP.ADD_PRINT_TEXT(412,179,182,33,"博州荣达驾训学员证");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",14);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#E61A1A");
    LODOP.ADD_PRINT_TEXT(450,50,333,30,"驾校联系电话：        2288019");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(511,21,100,20,"学员姓名：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(562,21,100,20,"身份证号：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_LINE(583,101,477,102,0,1);
    LODOP.ADD_PRINT_LINE(632,203,584,204,0,1);
    LODOP.ADD_PRINT_LINE(632,295,584,296,0,1);
    LODOP.ADD_PRINT_LINE(717,203,631,204,0,1);
    LODOP.ADD_PRINT_LINE(758,156,719,157,0,1);
    LODOP.ADD_PRINT_LINE(758,427,719,428,0,1);
    LODOP.ADD_PRINT_TEXT(608,23,100,20,"性别：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(609,212,100,20,"车型：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(652,22,100,20,"联系电话：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(694,23,100,20,"学号：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(729,21,100,20,"理论时间：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(730,317,100,20,"术科时间：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_LINE(758,295,719,296,0,1);
    LODOP.ADD_PRINT_RECT(399,569,541,381,0,1);
    LODOP.ADD_PRINT_LINE(441,569,442,1110,0,1);
    LODOP.ADD_PRINT_LINE(477,571,478,946,0,1);
    LODOP.ADD_PRINT_LINE(532,569,533,945,0,1);
    LODOP.ADD_PRINT_LINE(584,661,632,662,0,1);
    LODOP.ADD_PRINT_LINE(584,569,585,945,0,1);
    LODOP.ADD_PRINT_LINE(719,569,720,1109,0,1);
    LODOP.ADD_PRINT_LINE(757,569,758,1110,0,1);
    LODOP.ADD_PRINT_LINE(441,945,631,946,0,1);
    LODOP.ADD_PRINT_LINE(632,569,631,1110,0,1);
    LODOP.ADD_PRINT_LINE(678,571,677,1111,0,1);
    LODOP.ADD_PRINT_TEXT(412,739,182,33,"博州荣达驾训学员证");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",14);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#E61A1A");
    LODOP.ADD_PRINT_TEXT(450,610,333,30,"驾校联系电话：        2288019");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(511,581,100,20,"学员姓名：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(562,581,100,20,"身份证号：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_LINE(583,661,477,662,0,1);
    LODOP.ADD_PRINT_LINE(632,763,584,764,0,1);
    LODOP.ADD_PRINT_LINE(632,855,584,856,0,1);
    LODOP.ADD_PRINT_LINE(717,763,631,764,0,1);
    LODOP.ADD_PRINT_LINE(758,716,719,717,0,1);
    LODOP.ADD_PRINT_LINE(758,987,719,988,0,1);
    LODOP.ADD_PRINT_TEXT(608,583,100,20,"性别：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(609,772,100,20,"车型：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(652,582,100,20,"联系电话：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(694,583,100,20,"学号：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(729,581,100,20,"理论时间：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(730,877,100,20,"术科时间：");
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_LINE(758,855,719,856,0,1);
    LODOP.ADD_PRINT_IMAGE(443,388,157,186,"<img src='../obj.info[0].studentphoto' style='position:relative;top:-28px; left: -79px;'/> ");
    LODOP.ADD_PRINT_IMAGE(442,949,157,186,"<img src='../obj.info[1].studentphoto' style='position:relative;top:-28px; left: -79px;'/>");
    LODOP.ADD_PRINT_IMAGE(48,387,157,186,"<img src='../obj.info[2].studentphoto' style='position:relative;top:-28px; left: -79px;'/>");
    LODOP.ADD_PRINT_IMAGE(48,946,157,186,"<img src='../obj.info[3].studentphoto' style='position:relative;top:-28px; left: -79px;'/>");
    LODOP.ADD_PRINT_TEXT(118,115,100,20,obj.info[0].name);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(169,113,100,20,obj.info[0].national_id);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(215,105,100,20,obj.info[0].sex);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(217,300,100,20,obj.info[0].vehicle_type_name);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(259,209,100,20,obj.info[0].phone);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(300,209,100,20,obj.info[0].student_id);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(341,162,100,20,obj.info[0].reg_time);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",10);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(341,721,100,20,obj.info[1].reg_time);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",10);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(300,768,100,20,obj.info[1].student_id);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(259,768,100,20,obj.info[1].phone);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(217,859,100,20,obj.info[1].vehicle_type_name);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(215,664,100,20,obj.info[1].sex);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(169,672,100,20,obj.info[1].national_id);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(118,674,100,20,obj.info[1].name);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(735,161,100,20,obj.info[2].reg_time);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",10);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(694,208,100,20,obj.info[2].student_id);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(653,208,100,20,obj.info[2].phone);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(611,299,100,20,obj.info[2].vehicle_type_name);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(609,104,100,20,obj.info[2].sex);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(563,112,100,20,obj.info[2].national_id);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(512,114,100,20,obj.info[2].name);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(735,723,100,20,obj.info[3].reg_time);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",10);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(694,770,100,20,obj.info[3].student_id);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(653,770,100,20,obj.info[3].phone);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(611,861,100,20,obj.info[3].vehicle_type_name);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(609,666,100,20,obj.info[3].sex);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(563,674,100,20,obj.info[3].national_id);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");
    LODOP.ADD_PRINT_TEXT(512,676,100,20,obj.info[3].name);
    LODOP.SET_PRINT_STYLEA(0,"FontName","微软雅黑");
    LODOP.SET_PRINT_STYLEA(0,"FontSize",11);
    LODOP.SET_PRINT_STYLEA(0,"FontColor","#000000");


}



//票据样式

function CreateReceipts(obj) {
    LODOP=getLodop();
    LODOP.ADD_PRINT_SETUP_BKIMG("<img src='../html/default/admin/img/fapiao.jpg'/>");
    LODOP.SET_SHOW_MODE("BKIMG_WIDTH","241.34mm");
    LODOP.SET_SHOW_MODE("BKIMG_HEIGHT","139.7mm");
    LODOP.SET_SHOW_MODE("BKIMG_PRINT",true);
    LODOP.SET_PRINT_STYLE("FontColor","#0000FF");
    LODOP.ADD_PRINT_TEXT(129,220,100,20,obj.name);
    LODOP.SET_PRINT_STYLEA(0,"FontSize",10);
    LODOP.SET_PRINT_STYLEA(0,"ContentVName",obj.name);
    LODOP.SET_PRINT_STYLEA(0,"ContentVName",obj.ch_money);
    LODOP.ADD_PRINT_TEXT(392,545,100,20,obj.ch_money);
    LODOP.SET_PRINT_STYLEA(0,"FontSize",13);
    LODOP.ADD_PRINT_TEXT(203,91,100,20,obj.ch_service);
    LODOP.SET_PRINT_STYLEA(0,"FontSize",12);

    LODOP.PRINT_INITA(10,10,762,533,"打印票据");
    LODOP.ADD_PRINT_SETUP_BKIMG("<img src='../html/default/admin/img/fapiao.jpg'/>");
    LODOP.SET_SHOW_MODE("BKIMG_WIDTH",794);
    LODOP.SET_SHOW_MODE("BKIMG_HEIGHT",506);
    LODOP.SET_SHOW_MODE("BKIMG_IN_PREVIEW",true);
    LODOP.SET_PRINT_STYLE("FontColor","#0000FF");
    LODOP.ADD_PRINT_TEXT(101,151,100,20,obj.name);
    LODOP.ADD_PRINT_TEXT(133,229,100,20,obj.name);
    LODOP.ADD_PRINT_TEXT(207,105,100,20,obj.ch_name);
    LODOP.ADD_PRINT_TEXT(208,227,100,20,obj.Briefly);
    LODOP.ADD_PRINT_TEXT(210,517,100,20,obj.ch_money);
    LODOP.ADD_PRINT_TEXT(407,224,100,20,obj.daxie);
    LODOP.ADD_PRINT_TEXT(406,557,100,20,obj.ch_money);
    LODOP.ADD_PRINT_TEXT(101,331,59,20,obj.year);
    LODOP.ADD_PRINT_TEXT(102,407,33,20,obj.month);
    LODOP.ADD_PRINT_TEXT(102,455,37,20,obj.day);
    LODOP.PREVIEW();
    // LODOP.PRINT();
}


