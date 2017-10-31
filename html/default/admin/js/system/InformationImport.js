var app=new Vue({
    el:"#app",
    data:{
        upfile:'',
        formfilter:true,
        message: '',
    },
    methods:{
        subform:function(){
            var _self=this;
            var formData = new FormData();
            formData.append("upfile",_self.upfile);
            $.ajax({
                url : '/admin/InformationImport.php',
                type : 'POST',
                data : formData,
                dataType: "json",
// 告诉jQuery不要去处理发送的数据
                processData : false,
// 告诉jQuery不要去设置Content-Type请求头
                contentType : false,
                beforeSend:function(){
                    console.log("正在进行，请稍候");
                },
                success: function(data) {
                    if (data.status == 1) {
                        _self.message = data.msg;
                        $('#messageModel').modal('show');
                    } else {
                        _self.message = data.msg;
                        $('#messageModel').modal('show');

                    }
                },
                error : function(responseStr) {
                    console.log("error");
                }
            });

        },
        onFileChange:function (e) {
            var files = e.target.files;
            if (!files.length || files[0].size==0) {
                return;
            }
            var vm = this;
            var fileType=files[0].name.substring(files[0].name.lastIndexOf(".")+1).toLowerCase();
            if(fileType !="xls" ){
                vm.message = '请选择xls格式文件上传！';
                $('#messageModel').modal('show');
                e.target.value="";
                return;
            }
            vm.upfile=files[0];

        },
    }
})