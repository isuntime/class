var app = new Vue({
    el: "#app",
    data: {
        applist:{},
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
        appinfo: {
            national_id:'',
            vehicle_type:'',
            vehicle_type_id:'',
            remake:'',
        },
        pay_state:0,
        paydata:{

        },
        vehicle_typelist:'',
        messages:'',
        formfiter:true,
    },
    filters: {
        stateText: function (value) {
            if (value == 1) {
                return "通过";
            } else {
                return "未通过";
            }
        },
        vipFileter:function (value) {
            if(value==1){
                return '是';
            }else{
                return '否';
            }
        },
        studentSex:function(value){
            if(value==1){
                return "男";
            }else{
                return "女";
            }
        },
        certificatetype:function (value) {
            if(value==2){
                return "身份证";
            }else{
                return "其他证件";
            }
        }
    },
    computed: {
        chajia:function () {
            if(this.paydata.pay_state==0){
                this.paydata.ac_num=this.paydata.n_total
            }else {
                this.paydata.ac_num=this.paydata.n_total-this.paydata.total;
            }
        }
    },
    watch:{
        pay_state:function () {
            this.getList();
        }
    },
    mounted: function () {
        this.$nextTick(function () {
            this.getList();
        })
    },
    methods:{
        getList: function () {
            var _self = this;
            $.ajax({
                url: comUrl.public,
                type: "post",
                data: {model: "vehicle_type", action: "list"},
                dataType: "json",
                success: function (request, status) {
                    _self.vehicle_typelist = request.data;
                }
            });
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: {
                    model: 'vehicletype',
                    action: 'list',
                    where:{
                        pay_state:this.pay_state
                    }
                },
                dataType: "json",
                success: function (request) {
                    _self.applists.job = request.data;
                }
            });
        },
        subform: function () {
            // alert(1);
            if(!this.appinfo.new_vehicle_type){
                // alert(2);
                this.messages ='请选择新准驾类型';
                $('#messageModel').modal('show');
                this.formfiter==false;
                return '';
            }
            // alert(3);
                this.formfiter==true;
                var dataobj = {
                    model: "vehicletype",
                    action:'note',
                    data: this.appinfo,
                };


            var _self=this;
            if (forminspect('recarform',dataobj.data) == true&&this.formfiter==true) {
                // alert(4);
                $.ajax({
                    url: comUrl.student,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function(request) {
                        if(request.status ==1){
                            _self.paydata = request.data;
                            //alert(_self.paydata.person.0);

                            $('#payModal').modal('show');
                        }else if(request.status ==0){
                            _self.messages =request.msg;
                            $('#messageModel').modal('show');

                        }

                    }
                });

            }
        },
        paySub: function () {
            var dataobj = {
                model: "vehicletype",
                action:'change_type',
                data: this.paydata,
            };
            var _self=this;
            if (forminspect('recarform',dataobj.data) == true&&this.formfiter==true) {
                $.ajax({
                    url: comUrl.student,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function(request) {
                        if(request.status ==1){
                            _self.messages = request.msg;

                            $('#messageModel').modal('show');
                            $('#myModal').modal('hide');
                            _self.getList();
                        }else if(request.status ==0){
                            _self.messages =request.msg;
                            $('#messageModel').modal('show');

                        }

                    }
                });

            }
        },

        nameFilter:function () {
//                检查申请是否有重复
            var _self=this;
            var dataobj = {
                model: "vehicletype",
                action: 'check',
                where:{
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
                        _self.messages = request.msg;
                        $('#messageModel').modal('show');
                        _self.formfiter = true;
                        _self.appinfo=request.data;
                    } else if(request.status ==0){
                        _self.formfiter = false;
                        for(var x in _self.appinfo){
                            _self.appinfo[x]='';

                        }
                    }

                }
            });
        },
        showremake:function (item) {
            this.messages=item.remake;
            $('#messageModel').modal('show');
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
                model: "information",
                action: "list",
                pageIndex: this.applists.job.pageIndex,

            };
            var _self=this;
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    _self.applists .job= request.data;
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
                model: "information",
                action: "list",
                where:{user_state:0},
                pageIndex: this.applists.djob.pageIndex,

            };
            var _self=this;
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    _self.applists .djob= request.data;
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
    }

});