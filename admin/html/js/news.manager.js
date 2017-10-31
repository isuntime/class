$(document).ready(function(){
	auto_send('post','news.ajax.php','allnews','ss','11','json',function(d){
		console.log(".");
		console.log("JSON xxx");
		console.log("----------------------------------");
		$("#content_list").empty();
		format_list(d);
	});
});

function format_list(d){
	for (var i=0;i<d.length;i++){
		console.log("name: "+d[i].name);
		console.log("class_rand: "+d[i].l_id);
		console.log("random_id: "+d[i].random_id);
		console.log("send_time: "+d[i].send_time);
		console.log("----------------------------------");
		$("#content_list").append('<dd class="rows" id="'+d[i].random_id+'">'+
		'	<span class="tit" onclick="show_content(\''+d[i].random_id+'\')">'+d[i].name+'</span>'+
		'	<span class="edi">删除</span>'+
		'</dd>');
	}
}
function bedit(){
	var ue = UE.getEditor('intros',{initialFrameHeight:440,initialFrameWidth:950});
}
function change_new_list(value){
	console.log("你传递的值:"+value);
	auto_send('post','news.ajax.php','new_list','l_id',value,'json',function(d){
		console.log(".");
		console.log("JSON 文章数据");
		console.log("----------------------------------");
		$("#content_list").empty();
		format_list(d);
	});
	auto_send('post','news.ajax.php','new_menu','l_id',value,'json',function(data){
		$("#c_name").text("Name : "+data.name);
		$("#c_total").text("Total : "+data.total);
		$("#c_rand").text(data.rand_id);
		$("#content_list").append("<input id='class_rand' type='hidden' value='"+data.rand_id+"'/>");
		console.log(".");
		console.log("JSON 栏目数据");
		console.log("----------------------------------");
		console.log("++name: "+data.name);
		console.log("++total: "+data.total);
		console.log("++random_id: "+data.rand_id);
		console.log("----------------------------------");
	});
}
function auto_send(t_send,t_url,t_action,t_id,t_idvalue,t_data,callback = false){
	$.ajax({
		type:t_send,
		url:t_url,
		data:{
			action:t_action,
			l_id:t_idvalue,
		},
		success:function(data){
			callback(data);
		},
		dataType:t_data,
	});
}
function show_content(rand_id){
	layui.use('layer', function(){
	var $ = layui.jquery, layer = layui.layer;});
	$.post('news.manager.php', {action:'content',id:rand_id}, function(data){
  		layer.open({
    		type:1,
    		content:data,
			area: ["1250px", "700px"],
        	title: "内容管理",
        	fix: false,
        	shadeClose: true,
        	maxmin: true,
        	//cancel: function(){UE.destroy(); },
  		});
	});
}
function send_new_file(){
	if($("#class_rand").val()){
		class_id=$("#class_rand").val();
	}else{
		class_id="fuckme";
	};
	$.post('news.manager.php', {action:'send_new_file',id:class_id}, function(data){
  		layer.open({
    		type:1,
    		content:data,
			area: ["1250px", "700px"],
        	title: "内容管理",
        	fix: false,
        	shadeClose: true,
        	maxmin: true,
  		});
	});
}