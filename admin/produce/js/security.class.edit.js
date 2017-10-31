$(document).ready(function(){
$("#show_one").click(function(){
	$("#show_one").children("#produce_att").fadeIn(500);
	$("#show_two").children("#produce_att").fadeOut(100);
	$("#show_three").children("#produce_att").fadeOut(100);
});
$("#show_two").click(function(){
	$("#show_two").children("#produce_att").fadeIn(500);
	$("#show_one").children("#produce_att").fadeOut(100);
	$("#show_three").children("#produce_att").fadeOut(100);
	var ue = UE.getEditor('intro',{initialFrameHeight:440,initialFrameWidth:950});
	$("#show_two").children("#produce_att").mouseleave(function(){
        var uedit_value = ue.getContent()
		var class_random_id=$("#class_random_id").val();
		$.ajax({
			type:"post",
			url:"ajax/security.ajax.php?action=up_class",
            data:{input_action:"redme",
		          class_random_id:class_random_id,
			      input_value:uedit_value},
		          success:function(response,status,xhr){
					  $("#web_state").fadeIn(100);
					  $("#web_state").text("Save...");
					  $("#web_state").fadeOut(1000);     
				  },
			dataType:'html', 
		    })
	});
});
$("#show_three").click(function(){
	$("#show_three").children("#produce_att").fadeIn(500);
	$("#show_two").children("#produce_att").fadeOut(100);
	$("#show_one").children("#produce_att").fadeOut(100);
});

$("#disp_value_view").live("click",function(){
	$("#disp_list_type_xx").fadeIn(300);
	$("#disp_list_type_xx li").each(function(index){
		 $(this).click(function (){
			 switch(index){
				 case 0:
				 var select_value="all";
				 break;
				 case 1:
				 var select_value="onle";
				 break;
			 }
			 $("#disp_value_view").text($(this).text());
			 var produce_att_random_id=$("#produce_att_random_id").val();
			 $("#disp_list_type_xx").fadeOut(200);
			 //var selcet_s = $(this).text();
			 $("#P_A_l_T|"+produce_att_random_id).text($(this).text());
			 $.ajax({
                  type: 'post',
                  url: "ajax/security.ajax.php?action=up_produce_att",
                  data:{input_action:'str_type',
                        produce_att_random_id:produce_att_random_id,
                        input_value:select_value
				  },
                  success:function(response,status,xhr){
					  
                      $("#web_state").fadeIn(100);
					  $("#web_state").text("Save...");
					  document.getElementById("palt|"+produce_att_random_id).innerHTML=select_value;
					  $("#web_state").fadeOut(1000);
	    },
	    dataType:'html',
			 });
		 });
	    });
	$("#disp_list_type_xx").mouseleave(function(){$("#disp_list_type_xx").fadeOut(300);});
});
$("#auto_save_input_name").live("mouseleave",function(){
     var produce_att_random_id=$("#produce_att_random_id").val();
	 var input_values=$("#auto_save_input_name").val();
	 $("#P_A_l_V|"+produce_att_random_id).text(input_values);
			 $.ajax({
                  type: 'post',
                  url: "ajax/security.ajax.php?action=up_produce_att",
                  data:{input_action:'name',
                        produce_att_random_id:produce_att_random_id, 
                        input_value:input_values
				  },
                  success:function(response,status,xhr){
					  
                      $("#web_state").fadeIn(100);
					  $("#web_state").text("Save...");
					  document.getElementById("palv|"+produce_att_random_id).innerHTML=input_values;
					  $("#web_state").fadeOut(1000);
	              },
                  dataType:'html',
			 });
}); 
$("#insert_produce_att_submit").live("click",function(){
	var new_value=$("#insert_new_produce_att_value").val();
	var produce_att_random_id=$("#produce_att_random_id").val();
	$.ajax({
         type: 'post',
              url: "ajax/security.ajax.php?action=up_produce_att_value",
              data:{
                    produce_att_random_id:produce_att_random_id,
                    input_value:new_value
				  },
              success:function(response,status,xhr){	  
                    $("#web_state").fadeIn(100);
					$("#web_state").text("Save...");
					//alert(response);
					document.getElementById("palx|"+produce_att_random_id).innerHTML=response;
					$("#web_state").fadeOut(1000);
	
	    },
	    dataType:'html',
	}); 
	
});
$("#auto_save_att_xx_value").live("mouseleave",function(){
	var input_value=$("#auto_save_att_xx_value").val();
	var aciton_random_id=$("#produce_att_random_id").val(),att_system_id=$("#att_system_id").val();
	//alert("input_value:"+input_value+"\n action:"+aciton_random_id+"\n att_system_id:"+att_system_id);
	$.ajax({
		type:'post',
		url:"ajax/security.ajax.php?action=up_produce_att_value_xx",
		
		data:{input_value:input_value,
		      att_system_id:att_system_id,
		      aciton_random_id:aciton_random_id
			 },
		success:function(response,status,xhr){
			       $("#"+att_system_id).text(input_value);
                   $("#web_state").fadeIn(100);
				   $("#web_state").text("Save...");
				   $("#web_state").fadeOut(1000);
		},
		dataType:'html',
	});
});
$("#disp_value_views").live("click",function(){
	$("#disp_list_type_xx").fadeIn(300);
	$("#disp_list_type_xx li").each(function(index){
		 $(this).click(function (){
			 switch(index){
				 case 0:
				 var select_value="I";
				 break;
				 case 1:
				 var select_value="S";
				 break;
			 }
			 $("#disp_value_views").text($(this).text());
			 //var produce_att_random_id=$("#produce_att_random_id").val();
			 $("#disp_list_type_xx").fadeOut(200);
			 //var selcet_s = $(this).text();
			 //$("#P_A_l_T|"+produce_att_random_id).text($(this).text());
		 });
	    });
	$("#disp_list_type_xx").mouseleave(function(){$("#disp_list_type_xx").fadeOut(300);});
});
$("#insert_produce_att_add").live("click",function(){
	var class_random_id=$("#class_random_id").val();
	var new_value=$("#add_save_input_name").val();
	var select_s=$("#disp_value_views").text();
	if(new_value==""){
		layer.msg('请输入内容！');
		$("#add_save_input_name").focus();
		exit();
	}
	$.ajax({
         type: 'post',
              url: "ajax/security.ajax.php?action=produce_att_add",
              data:{
                    class_random_id:class_random_id,
					new_value:new_value,
                    select_s:select_s
				  },
              success:function(response,status,xhr){
                    $("#web_state").fadeIn(100);
					$("#web_state").text("Save...");
					$("#web_state").fadeOut(1000);
					$(".left_view").empty();
					$(".left_view").append(response);
	
	    },
	    dataType:'html',
	}); 
	
});
});
function up_class(str){
	var array_send=str.split("|");
	var input_action=array_send[0], class_random_id=array_send[1];
	var input_value=$("#class_"+input_action).val();
	
 	switch(input_action){
		case "name":
		parent.$('#class_name_'+class_random_id).text(input_value);
		parent.$('.class_name_'+class_random_id).text(input_value);
		break;
		case "keyword":
		parent.$('#class_keyword_'+class_random_id).text(input_value);
		break;
		case "description":
		parent.$('#class_description_'+class_random_id).text(input_value);
		break;
		case "linkfile":
		parent.$('#class_linkfile_'+class_random_id).text(input_value);
		break;
		
	}
		 
    $.ajax({
        type: 'post',
        url: "ajax/security.ajax.php?action=up_class",
        data:{input_action:input_action,
		      class_random_id:class_random_id,
			  input_value:input_value},
        success:function(response,status,xhr){
                    $("#web_state").fadeIn(100);
					$("#web_state").text("Save...");
					$("#web_state").fadeOut(1000);
	    },
	    dataType:'html',
   });
}
function change_att_value(str){
	var array_send=str.split("|");
	var att_system_id=array_send[0],att_random_id=array_send[1];
    $.ajax({
        type: 'post',
        url: "ajax/security.ajax.php?action=change_att_value",
        data:{att_system_id:att_system_id,
		      att_random_id:att_random_id
			  },
        success:function(response,status,xhr){
                    $("#web_state").fadeIn(100);
					$("#web_state").text("Save...");
					$("#change_att").empty();
					$("#change_att").append(response);
					$("#web_state").fadeOut(1000); 
	    },
	    dataType:'html',
   });
}
function Produce_att_view(str){
	
   $.ajax({
        type: 'post',
        url: "ajax/security.ajax.php?action=view_produce_att_value",
        data:{produce_att_random_id:str},
        success:function(response,status,xhr){
			document.getElementById("palx|"+str).innerHTML=response;
             //$("#change_att").empty();
			 //$("#change_att").append(response);
	    },
	    dataType:'html',
   });
   
   $.ajax({
        type: 'post',
        url: "ajax/security.ajax.php?action=produce_att_view",
        data:{produce_att_random_id:str},
        success:function(response,status,xhr){
             $("#change_att").empty();
			 $("#change_att").append(response);
	    },
	    dataType:'html',
   });
}

var xhr;
var mhr;
function createXMLHttpRequest(){
	if(window.ActiveXObject){
	    xhr =new ActiveXObject("Microsoft.XMLHTTP");
		mhr =new ActiveXObject("Microsoft.XMLHTTP");
	}else if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
		mhr = new XMLHttpRequest();} 
	}
function UpladFile(){
    var fileObj=document.getElementById("UpFileId").files[0];
	if(fileObj==null){
		layer.alert('你没有选择需要上传的图片！',
	   {
       skin: '0',
	   closeBtn: 0});
	   exit();
	}
    var token="lexun";
    var username="lexun";
    var FileController = 'http://img.30ke.com/upfile.inc.php';
    var form=new FormData();
    form.append("upfile",fileObj);
    form.append("token",token);
    form.append("username",username);
    createXMLHttpRequest(); 
	xhr.onreadystatechange = handleStateChange;
    xhr.open("post",FileController,true);
    xhr.send(form);
}

function handleStateChange(){
    if(xhr.readyState == 4){
        if (xhr.status == 200 || xhr.status == 0){
        $(function(){
		$.ajax({ 
            type:'post',
		    data:{token:"lexun"},
		    dataType:'json',
            url:'http://img.30ke.com/getimage.php?callback=?',
            success:function(response,status,xhr){
			     if(response.img_path){
				    var class_random_id=document.getElementById("class_random_id").value;
				    var img_path="http://img.30ke.com/"+response.img_path;
				    $.ajax({
					    type:'post',
		                data:{
							 input_action:"img_path",
		                     class_random_id:class_random_id,
			                 input_value:img_path
							},
					    url:"ajax/security.ajax.php?action=up_class",
					    success:function(responses,status,xhr){
							var imager_change="url("+img_path+")";
							$("#imager_shows").css({"backgroundImage":imager_change});
						},
		                dataType:'html',
				    });
				
			 }
			}
		});
        });
}}}






































