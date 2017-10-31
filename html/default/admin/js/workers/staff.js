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
        appinfo: {},
        departmentList: {},
        positionList:'',
        formfiter:true,
        message:'',
        find: {
            // worker_id: '',
            department_id: '',
            position_id: '',
        },
        formactive: 'insert',
    },
    filters: {
        stateText: function (value) {
            if (value == 1) {
                return "在职";
            } else {
                return "离职";
            }
        },
        sexText:function (value) {
            if (value == 1||value=='1') {
                return "男";
            } else {
                return "女";
            }
        }

    },
    computed: {
    },
    mounted: function () {
        this.$nextTick(function () {
            this.getList();
        });
    },
    methods: {
        getList: function () {
            var _self = this;
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: {model: "staff", action: "list",where:{user_state:1}},
                dataType: "json",
                success: function (request, status) {
                    _self.applists.job= request.data
                }
            });
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: {model: "staff", action: "list",where:{user_state:0}},
                dataType: "json",
                success: function (request, status) {
                    _self.applists.djob= request.data
                }
            });
            $.ajax({
                url: comUrl.public,
                type: "post",
                data: {model: "department"},
                dataType: "json",
                success: function (request, status) {
                    _self.departmentList= request.data
                }
            });

        },
        getInfo: function (worker) {

            for (var x in worker) {

                this.appinfo[x] = worker[x];
            }
            this.formaction = 'edit';
            var _self = this;
            $.ajax({
                url: comUrl.public,
                type: "post",
                data: {model: "position", where: {department_id: _self.appinfo.department_id}},
                dataType: "json",
                success: function (request, status) {
                    _self.positionList= request.data
                }
            });
        },
        clearEditApp: function () {
            this.formaction = "insert";
            if (this.appinfo) {
                this.appinfo = {
                    name: '',
                    sex: 1,
                    worker_id: '',
                    national_id: '',
                    national: '',
                    adress: '',
                    phone: '',
                    department_id: '',
                    position_id: '',
                    user_state:1,
                };
            }
        },
        findlist: function () {
            var dataobj = {
                model: "staff",
                action: "search",
                where: this.find,
            };
            var _self = this;
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    _self.applists.job= request.data
                    _self.find = {
                        // worker_id: '',
                        department_id: '',
                        position_id: '',
                    };
                    // _self.positionList='';
                }
            });
        },

        subform: function () {
            var dataobj = {
                model: "staff",
                action: this.formaction,
                data: {
                    name: this.appinfo.name,
                    sex: this.appinfo.sex,
                    worker_id: '',
                    national_id: this.appinfo.national_id,
                    national: this.appinfo.national,
                    adress: this.appinfo.adress,
                    phone: this.appinfo.phone,
                    department_id: this.appinfo.department_id,
                    position_id: this.appinfo.position_id,
                    user_state:this.appinfo.user_state,
                },
            };

            var _self = this;
            if (forminspect('workerinfo', dataobj.data) == true && this.formfiter == true) {
                if (this.formaction == 'edit') {
                    delete dataobj.data.worker_id;
                    dataobj.where = {
                        id: this.appinfo.id,
                    };
                }
                $.ajax({
                    url: comUrl.workers,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (request, status) {
                        if (request.status==1) {
                            _self.message = '提交成功';
                            $('#messageModel').modal('show');
                            $('#myModal').modal('hide');
                            _self.getList();
                        } else {
                            _self.message = '提交失败，请再次尝试';
                            $('#messageModel').modal('show');
                            _self.getList();
                        }

                    }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                        _self.message = '提交失败，请再次尝试';
                        $('#messageModel').modal('show');
                    }
                });

            }
        },
        setState: function () {
            var dataobj = {
                model: "staff",
                action: "edit",
                data: {

                    id: this.appinfo.id,
                    carstate: 0,
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
        setPosition: function () {
            var _self = this;
            if (this.find.department_id) {
                $.ajax({
                    url: comUrl.public,
                    type: "post",
                    data: {model: "position", where: {department_id: _self.find.department_id}},
                    dataType: "json",
                    success: function (request, status) {
                        _self.positionList= request.data
                    }
                });
            }
        },
        setAppPosition: function () {
            var _self = this;
            if (this.appinfo.department_id) {
                $.ajax({
                    url: comUrl.public,
                    type: "post",
                    data: {model: "position", where: {department_id: _self.appinfo.department_id}},
                    dataType: "json",
                    success: function (request, status) {
                        _self.positionList= request.data
                    }
                });
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
                model: "staff",
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
                    _self.applists .job= request.data
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
                model: "staff",
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
                    _self.applists .djob= request.data
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