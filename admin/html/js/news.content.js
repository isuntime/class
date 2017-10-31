//  $(document).ready(
//  	function(){
//  		UE.getEditor('intros',{initialFrameHeight:440,initialFrameWidth:950});
// 		console.log("load");
// 	}
// );
layui.use('layedit', function(){
  var layedit = layui.layedit;
 var index = layedit.build('demo', {
    //hideTool: ['image']
    uploadImage: {
      url: '/upload/test/'
      ,type: 'post'
    }
    ,tool: ['strong','italic','underline','del','|','left','center','right','|','link','unlink','|','face',]
    ,height: 300
  });
});
function show_input(str){
	var value=$("#"+str).text();
	if(value!=null){
		$("#editer").children("#et").empty();
		$("#editer").children("#ec").empty();
		$("#editer").children("#et").append('<input id=\'i_'+str+'\'value=\''+value+'\' class=\'ipt\'/>');
		$("#i_"+str).focus();
		console.log(str);
		console.log(value);
	}
}
function hidden_input(str){
	var val_id=$("#i_"+str).val();
	console.log(val_id);
}