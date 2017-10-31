var app = new Vue({
    el: "#app",
    data: {
        applists: {
            job:{
                data:'',
                pageAll:1,
                pageIndex:0
            },
        },
        appinfo: {
            plate_number: '',
            brand: '',
            Engine_number: '',
            Frame_number: '',
            car_type: '',
            Vehicle_type: '',
            taxiregtime: '',
            Annual_examination_time: '',
            two_guaranteed_time: '',
            Cylinder_detection_time: '',
            Insurance_period: '',
            Insurance_number: '',
            Insurance_company: '',
            coach_id: '',
            InstallChronograph: '',
            remark: '',
            carstate: '',
        },
        coachlist: {},
        Vehicle_typeList: {},
        find:{
            plate_number: '',
            car_type: '',
            Vehicle_type: '',
            lasttime:'',
            Annual_examination_time: '',
            Insurance_number: '',
            coach_id: '',
            carstate:"",
        },
        aboutinfo:{
            isAbout:false,
            abouttime:"",
        },
        message:"",
        formactive: 'inster',
    },
    filters: {
        stateText:function (value) {
            if (value==1){
                return "合格";
            }else if (value==0){
                return "不合格";
            }
        }
    },
    computed: {},
    mounted: function () {
        this.$nextTick(function () {
            this.getList();
        })
    },
    methods: {
        getList: function () {
            var _self = this;
            $.ajax({
                url: comUrl.vehicle,
                type: "post",
                data: {model: "carlist", action: "list"},
                dataType: "json",
                success: function (request, status) {
                    _self.applists.job = request.data;
                }
            });
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: {model: "coach",action:"list"},
                dataType: "json",
                success: function (request, status) {
                    _self.coachlist = request.data.data;
                }
            });
            $.ajax({
                url: comUrl.vehicle,
                type: "post",
                data: {model: "carlist", action: "typeList"},
                dataType: "json",
                success: function (data) {
                    _self.Vehicle_typeList= data.data;
                }
            })
        },
        getInfo: function (car) {
            this.appinfo = car;
            this.formaction = 'edit';
        },
        clearEditApp: function () {
            this.formaction = "insert";
            if (this.appinfo) {
                this.appinfo = {};
            }
        },
        findlist:function () {
            this.findtime('Annual_examination_time');
            this.findtime('lasttime');
            var _self=this;
            var dataobj = {
                model: "carlist",
                action: "search",
                where: this.find,

            };
            $.ajax({
                url: comUrl.vehicle,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (data) {
                    _self.applists.job=data.data;
                    _self.find={
                        plate_number: '',
                        car_type: '',
                        Vehicle_type: '',
                        lasttime:'',
                        Annual_examination_time: '',
                        Insurance_number: '',
                        coach_id: '',
                        carstate:'',
                    }
                }
            });
        },
        subform: function () {
            this.apptime("taxiregtime","taxiregtime");
            this.apptime("Annual_examination_time1","Annual_examination_time");
            this.apptime("two_guaranteed_time","two_guaranteed_time");
            this.apptime("Cylinder_detection_time","Cylinder_detection_time");
            var dataobj = {
                model: "carlist",
                action: this.formaction,
                data: this.appinfo,
            };

            if (forminspect('carinfo',dataobj.data) == true) {
                if (this.formaction == 'edit') {
                    dataobj.where={
                        id: this.appinfo.id,
                    }
                };
                var _self=this;
                $.ajax({
                    url: comUrl.vehicle,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function(data) {
                        if (data.status==1) {
                            _self.message = data.msg;
                            $('#messageModel').modal('show');
                            $('#isAbout').modal('hide');
                            _self.getList();
                        } else {
                            _self.message = data.msg;
                            $('#messageModel').modal('show');

                        }

                    },
                });


        }
        },
        setState: function () {
            var dataobj = {
                model: "carlist",
                action: "edit",
                data: {
                    id: this.appinfo.id,
                    carstate: 0,
                },
            };
            var _self=this;
            $.ajax({
                url: comUrl.vehicle,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function(data) {
                    if (data.status==1) {
                        _self.message = data.msg;
                        $('#messageModel').modal('show');
                        $('#isAbout').modal('hide');
                        _self.getList();
                    } else {
                        _self.message = data.msg;
                        $('#messageModel').modal('show');

                    }

                },
            });
        },
        subabout: function () {
            var dataobj = {
                model: "carlist",
                action: "edit",
                data: this.aboutinfo,
                where:{
                    id:this.appinfo.id,
                }
            };
            var _self=this;
            $.ajax({
                url: comUrl.vehicle,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function(data) {
                    if (data.status==1) {
                        _self.message = data.msg;
                        $('#messageModel').modal('show');
                        $('#isAbout').modal('hide');
                    } else {
                        _self.message = data.msg;
                        $('#messageModel').modal('show');

                    }

                },
            });
        },
        findtime:function(id){
            var jid="#"+id;
            this.$set(this.find,id,$(jid).val());
        },
        apptime:function(id,col){
            var jid="#"+id;
            this.$set(this.appinfo,col,$(jid).val());
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
                model: "carlist",
                action: "list",
                pageIndex: this.applists.job.pageIndex,

            };
            var _self=this;
            $.ajax({
                url: comUrl.vehicle,
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
                model: "carlist",
                action: "list",
                where:{user_state:0},
                pageIndex: this.applists.djob.pageIndex,

            };
            var _self=this;
            $.ajax({
                url: comUrl.vehicle,
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

})