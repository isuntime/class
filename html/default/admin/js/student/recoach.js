var app = new Vue({
    el: "#app",
    data: {
        applist: '',
        appinfo: {
            student_id: '',
            name: "",
            national_id: '',
            subjectType_name: '',
            coach_id: '',
            car_id: '',
            remake: '',
        },
        carlist: '',
        coachlist: '',
        message: '',
        formfiter: true,
        formaction :'insert',
},
        filters: {
            c_stateFilter:function (value) {
                if(true==value){
                    return "已经处理";
                }else if(false==value){
                    return "等待处理";
                }
            },
            s_stateFilter:function (value) {
                if(true==value){
                    return "同意";
                }else if(false==value){
                    return "退回";
                }
            },

        },
computed: {
}
,
mounted: function () {
    this.$nextTick(function () {
        this.getList();
    })
}
,
methods: {
    getInfo: function (worker) {
        this.appinfo = worker;
        this.formaction = 'edit';
    },
    getList: function () {
        var _self = this;
        $.ajax({
            url: comUrl.student,
            type: "post",
            data: {
                model: 'recoach',
                action: 'list',
            },
            dataType: "json",
            success: function (request) {
                _self.applist = request.data;
            }
        });

    },
    subform: function () {
        var dataobj = {
            model: "recoach",
            action: "insert",
            data: this.appinfo,
            where:{
                student_id:this.appinfo.student_id,
            }
        };
        var _self = this;
        if (forminspect('recoachform', dataobj.data) == true && this.formfiter == true) {
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (data) {
                    if (data.status == 1) {
                        _self.message = data.msg;
                        _self.formfiter=false;
                        $('#messageModel').modal('show');
                        $('#myModal').modal('hide');
                        _self.nameFilter();
                        _self.getList();
                    } else {
                        _self.message = data.msg;
                        $('#messageModel').modal('show');

                    }

                }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                    _self.message = '提交失败，请再次尝试';
                    $('#messageModel').modal('show');
                }
            });

        }
    }
    ,
    nameFilter: function () {
//                检查申请是否有重复
        var _self = this;
        var dataobj = {
            model: "recoach",
            action: 'check',
            where: {
                national_id: this.appinfo.national_id,
                // c_state:0,
            }
        };
        $.ajax({
            url: comUrl.student,
            type: "post",
            data: dataobj,
            dataType: "json",
            success: function (request) {
                if (request.status == 1) {
                    _self.message = request.msg;
                    $('#messageModel').modal('show');
                    _self.formfiter = true;
                    _self.appinfo = request.data.data;
                    _self.coachlist = request.data.coach;
                    _self.carlist = request.data.carinfo;
                } else if (request.status == 0) {
                    _self.formfiter = false;
                    _self.appinfo = request.data.data;
                    _self.coachlist = request.data.coach;
                    _self.carlist = request.data.carinfo;
                }

            }
        });
    }
    ,
    setCar_id: function () {
        var _self = this;
        var dataobj = {
            model: "recoach",
            action: 'carinfo',
            where: {
                coach_id: this.appinfo.coach_id,
                // c_state:0,
            }
        };
        if (this.appinfo.coach_id) {
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    _self.carlist = request.data;


                }
            });
        }
    },
    setState: function (item, state) {
        this.appinfo = item;
        var _self = this;
        var dataobj = {
            model: "recoach",
            action: 'setState',
            data: {
                c_state: state,
                order_id:this.appinfo.order_id
            },
            where: {
                student_id: this.appinfo.student_id,
                // c_state:0,
            }
        };
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    _self.message = request.msg;
                    $('#messageModel').modal('show');
                    _self.getList();
                }
            });
    },
    showremake:function (item) {
        this.message=item.remake;
        $('#messageModel').modal('show');
    }
}

})
;