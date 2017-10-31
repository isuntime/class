var app = new Vue({
    el: "#app",
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
        appinfo: {
            worker_id:'',
            vehicle_type:'',
            isvip:'',
            c_state:'',
        },
        coachlist: {},
        vehicle_typelist:{},
        message:'',
        formaction: 'insert',
        formfiter:true,
        find:{
            vehicle_type:'',
            isvip:'',
            c_state:1,
        }
    },
    filters:{
        vipFileter:function (value) {
            if(value==1){
                return "是";
            }else{
                return '否';
            }
        },
        stateText:function (value) {
            if(value=='1'){
                return "在职";
            }else if (value=='0'){
                return '离职';
            }
        }
    },
    computed: {
    },
    mounted: function () {
        this.$nextTick(function () {
            this.getList();
        })
    },
    methods:{
        getInfo: function (item) {
            this.appinfo = item;
            this.formaction = "edit";
        },
        getList: function () {
            var _self = this;
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: {model: "coach", action: "list",where:{c_state:1}},
                dataType: "json",
                success: function (request, status) {
                    _self.applists.job = request.data;
                }
            });
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: {model: "coach",action:'list',where:{c_state:0}},
                dataType: "json",
                success: function (data) {
                    _self.applists.djob = data.data;
                }
            });
            $.ajax({
                url: comUrl.public,
                type: "post",
                data: {model: "vehicle_type", action: "list"},
                dataType: "json",
                success: function (request, status) {
                    _self.vehicle_typelist = request.data;
                }
            });
        },
        subform: function () {
            var dataobj = {
                model: "coach",
                action: this.formaction,
                data: {
                    worker_id:this.appinfo.worker_id,
                    vehicle_type:this.appinfo.vehicle_type,
                    c_state:this.appinfo.c_state,
                    isvip:this.appinfo.isvip
                },
                where: {
                    id: this.appinfo.id,
                }
            };
            var _self=this;
            if (forminspect('workerinfo',dataobj.data) == true && this.formfiter == true) {
                $.ajax({
                    url: comUrl.workers,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (request, status) {
                        if(request.status==1){
                            _self.message = '提交成功';
                            $('#messageModel').modal('show');
                            $('#myModal').modal('hide');
                        }else{
                            _self.message = '提交失败，请再次尝试';
                            $('#messageModel').modal('show');
                        }
                        _self.getList();

                    },error:function (XMLHttpRequest, textStatus, errorThrown) {
                        _self.message = '提交失败，请再次尝试';
                        $('#messageModel').modal('show');
                    }
                });

            }
        },
        setState: function () {
            var dataobj = {
                model: "coach",
                action: "edit",
                data: {

                    id: this.appinfo.id,
                    carstate: !this.appinfo.carstate,
                },


            };
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    $('#myModal1').modal('hide');
                    this.getList();
                }
            });
        },
        findlist: function () {
            var dataobj = {
                model: "coach",
                action: "search",
                where: this.find,
            };
            var _self=this;
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    _self.applists.job=request.data;
                    for(var x in _self.find){
//                            console.log(x);
                        _self.find[x]='';
                    }
                }
            });
        },
        nameFilter: function () {
            var _self = this;
            var dataobj = {
                model: "coach",
                action: 'check',
                where: {
                    worker_id: this.appinfo.worker_id,
                }
            };
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    if (request.status==1) {
                        _self.message = request.msg;
                        $('#messageModel').modal('show');
                        _self.formfiter = true;
                        _self.appinfo=request.data;
                    } else if(request.status==0){
                        _self.formfiter = false;
                        _self.appinfo=request.data;
                    }

                }
            });
        },
        clearEditApp: function () {
            this.formaction = "insert";
            if (this.appinfo) {
                this.appinfo = {};
            }
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
                model: "coach",
                action: "list",
                where:{user_state:1},
                pageIndex: this.applists.job.pageIndex,

            };
            var _self=this;
            $.ajax({
                url: comUrl.workers,
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
                model: "coach ",
                action: "list",
                where:{user_state:0},
                pageIndex: this.applists.djob.pageIndex,

            };
            var _self=this;
            $.ajax({
                url: comUrl.workers,
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