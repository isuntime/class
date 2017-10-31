var app = new Vue({
    el:"#app",
    data: {
        applist:{},
        appinfo:{
            student_id:'',
            remake:'',
            backmake:'',
            backer_id:'',
            c_state:'',
        },
        message: '',
        formactive: 'inster',
    },
    computed: {
    },
    watch:{

    },
    mounted: function () {
        this.$nextTick(function () {
            this.getList();
        })
    },
    methods: {
        getList: function () {
            var _self = this;
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: {model: "feedback", action: "list"},
                dataType: "json",
                success: function (request, status) {
                    _self.applist = request.data;
                }
            });
        },
        getInfo: function (item) {
            this.appinfo = item;
            this.formaction = 'edit';
        },
        subform: function () {
            var dataobj = {
                model: "resultInput",
                action: this.formaction,
                data: {
                    backmake:this.appinfo.backmake,
                }
            };

            if (this.formaction == 'edit') {
                dataobj.where={
                    id: this.appinfo.id,
                }
            }
            var _self = this;
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    if(request.status==1){
                        _self.message = '提交成功,点击下一步';
                        $('#messageModel').modal('show');
                        $('#myModal').modal('hide');
                    }else{
                        _self.message = '提交失败，请再次尝试';
                        $('#messageModel').modal('show');
                    }
                },error:function (XMLHttpRequest, textStatus, errorThrown) {
                    _self.message = '提交失败，请再次尝试';
                    $('#myModal2').modal('show');
                }
            });


        },
        setState: function () {
            var regstate=1;
            if(this.agree==false){
                regstate=0;
            }
            var dataobj = {
                model: "graduationform",
                action: "edit",
                data: {
                    req_state: regstate,
                },
                where:{
                    student_id:this.appinfo.student_id,
                }
            };
            var _self=this;
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    $('#myModal1').modal('hide');
                    _self.getList();
                }
            });
        },
    }

});