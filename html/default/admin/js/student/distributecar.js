var app = new Vue({
    el: "#app",
    data: {
        appinfo: {
            student_id:'',
            subjecttype:'',
            coach_id:'',
            car_id:''
        },
        coachlist:'',
        subjectlist:'',
        carlist:'',
        message:'',
        formfiter:true,
    },
    computed: {
    },
    mounted: function () {
        this.$nextTick(function () {
            this.getList();
        })
    },
    methods:{
        getList:function () {
            var _self = this;
            $.ajax({
                url: comUrl.public,
                type: "post",
                data: {model: "rule"},
                dataType: "json",
                success: function (request, status) {
                    _self.applist = request;
                }
            });
            $.ajax({
                url: comUrl.public,
                type: "post",
                data: {model: "coach"},
                dataType: "json",
                success: function (request, status) {
                    _self.coachlist = request;
                }
            });
            $.ajax({
                url: comUrl.public,
                type: "post",
                data: {model: "department"},
                dataType: "json",
                success: function (request, status) {
                    _self.subjectlist = request;
                }
            });

        },
        setCarPlate:function () {
            var _self=this;
            if(this.findinfo.department_id){
                $.ajax({
                    url: comUrl.public,
                    type: "post",
                    data: {model: "rule",where:{id:this.appinfo.coach_id}},
                    dataType: "json",
                    success: function (request, status) {
                        _self.carlist = request;
                    }
                });
            }},
        subform:function(){
            var dataobj = {
                model: "dropout",
                action: "insert",
                data: this.appinfo,
            };
            var _self=this;
            if (forminspect('distributioncar',dataobj.data) == true&&this.formfiter==true) {
                $.ajax({
                    url: comUrl.student,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (request, status) {
                        if(request){
                            _self.message = '提交成功,点击下一步';
                            $('#messageModel').modal('show');
                            $('#myModal').modal('hide');
                        }else{
                            _self.message = '提交失败，请再次尝试';
                            $('#messageModel').modal('show');
                        }

                    },error:function (XMLHttpRequest, textStatus, errorThrown) {
                        _self.message = '提交失败，请再次尝试';
                        $('#messageModel').modal('show');
                    }
                });

            }
        },
        nameFilter:function () {
//                检查dropoutList是否有重复
            var _self=this;
            var dataobj = {
                model: "account",
                action: 'list',
                where:{
                    student_id: this.appinfo.student_id,
                    c_state:0,
                }
            };
            $.ajax({
                url: comUrl.system,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    if (requeststatus == false) {
                        _self.message = request.msg;
                        $('#messageModel').modal('show');
                        _self.formfiter = false;
                        _self.appinfo=request.data;
                    } else if(requeststateus ==true){
                        _self.formfiter = true;
                        _self.appinfo=request.data;
                    }

                }
            });
        },
    }

});