var app = new Vue({
    el: '#app',
    data: {
        applists: {
            job:{
                data:'',
                pageAll:1,
                pageIndex:0
            },
            djob:{
                data:'',
                pageAll:1,
                pageIndex:0
            }
        },
        appinfo:{
            student_id: '',
            vehicle_type_name: '',
            subject: '',
            test: '',
            sumMoney:'',
            pay_state:'',
        },

        formaction : 'edit',
        formfiter:true,
        message:'',
        c_number:''
    },
    filters: {
        stateFilter:function (value) {
            if(true==value){
                return "已经缴费";
            }else if(false==value){
                return "等待缴费";
            }
        }
    },
    computed: {

    },
    mounted:function () {
        this.$nextTick(function () {
            // DOM 现在更新了
            // `this` 绑定到当前实例
           this.getList();
        });
    },
    methods: {
        getList: function () {
            var _self = this;
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: {model: "test", action: "list",where:{pay_state:0}},
                dataType: "json",
                success: function (request, status) {
                    _self.applists.job = request.data;
                }
            });
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: {model: "test", action: "list",where:{pay_state:1}},
                dataType: "json",
                success: function (request, status) {
                    _self.applists.djob = request.data;
                }
            });

        },
        getInfo: function (worker) {
            this.appinfo = worker;
            // this.formaction = 'insert';
        },
        subform: function () {
            this.appinfo.state=true;
            var dataobj = {
                model: "test",
                action: this.formaction,
                data: this.appinfo,
            };
            var _self=this;
            if (this.formfiter==true) {
                if (this.formaction=='edit'){
                    dataobj.where={
                        order_id:this.appinfo.student_id,
                    };
                }
                $.ajax({
                    url: comUrl.finance,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (request, status) {
                        if (request.status==1){

                            _self.message = request.msg;
                            $('#messageModel').modal('show');
                            $('#myModal').modal('hide');
                            _self.formfiter=false;
                            _self.getList();
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
        setState: function () {
            var dataobj = {
                model: "test",
                action: this.formaction,
                data: {
                    pay_state: 1,
                    pay_time:"",
                },
                where:{
                    student_id:this.appinfo.student_id,
                    order_id:this.appinfo.order_id,
                }
            };
            var _self=this;
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    if (request.status == 1) {
                        _self.c_number=request.data.c_number;
                        _self.message = request.msg;
                        $('#PrintmessageModel').modal('show');
                        $('#myModal').modal('hide');
                        setTimeout(function () {
                            CreateReceipts(request.data);
                        },2000);
                        _self.formfiter=false;
                        _self.getList();
                    }else{
                        _self.message = '提交失败，请再次尝试';
                        $('#messageModel').modal('show');
                    }
                },error:function (XMLHttpRequest, textStatus, errorThrown) {
                    _self.message = '修改失败，请再次尝试';
                    $('#messageModel').modal('show');
                }
            });
        },
        PrintVoucherinfo:function () {
            var dataobj = {
                model: "test",
                action: "makeSure",
                where:{
                    student_id:this.appinfo.student_id,
                    order_id:this.appinfo.order_id,
                    c_number:this.c_number
                }
            };
            var _self=this;
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    if (request.status == 1) {
                        _self.message = request.msg;
                        $('#PrintmessageModel').modal('hide');
                        _self.formfiter=false;
                        _self.getList();
                    }
                }
            });

        },
        gotoJob:function (index) {
            if(index<0){
                this.applists.job.pageIndex=0;
            }else if(index>=(this.applists.job.pageAll)){
                this.applists.job.pageIndex=this.applists.job.pageAll-1;
            }else{
                this.applists.job.pageIndex=index;
            }

            var dataobj = {
                model: "test",
                action: "list",
                where:{pay_state:0},
                pageIndex: this.applists.job.pageIndex,

            };
            var _self=this;
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    _self.applists .job = request.data;
                }
            });
        },
        gotoDjob:function (index) {
            if(index<0){
                this.applists.djob.pageIndex=0;
            }else if(index>=this.applists.djob.pageAll){
                this.applists.djob.pageIndex=this.applists.djob.pageAll-1;
            }else{
                this.applists.djob.pageIndex=index;

            }
            var dataobj = {
                model: "test",
                action: "list",
                where:{pay_state:1},
                pageIndex: this.applists.djob.pageIndex,

            };
            var _self=this;
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    _self.applists .djob = request.data;
                }
            });
        },
        pageMinus:function (page,fun) {
            var index=page-1;
            fun(index);
        },
        pagePlus:function (page,fun) {
            var index=page+1;
            fun(index);
        },

    },

});