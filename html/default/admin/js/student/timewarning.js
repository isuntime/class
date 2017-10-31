var app = new Vue({
    el:"#app",
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
            student_id:'',
            name:'',
            coach:'',
            phone:'',
            reg_time:'',
            deadline:'',
            subjectOneState:'',
            subjectTwoState:'',
            subjectThreeState:'',
            subjectFourState:'',
        },
        message: '',
        find:{
            student_id:'',
            national_id:'',
            starttime:'',
            lasttime:'',
            coach_id:''
        },
        formactive: 'inster',
    },
    filters: {
        stateText: function (value) {
            if (value == 1) {
                return "在职";
            } else {
                return "离职";
            }
        },
        vipFileter:function (value) {
            if(value=="1"){
                return '通过';
            }else{
                return '未通过';
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
                url: comUrl.student,
                type: "post",
                data: {model: "timewarning", action: "list"},
                dataType: "json",
                success: function (request) {
                    _self.applists.job = request.data;
                }
            });

        },
        getInfo: function (worker) {
            this.appinfo = worker;
            this.formaction = 'edit';
        },
        findlist: function () {
            var dataobj = {
                model: "coach",
                action: "edit",
                where: this.find,
            };
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    $('#myModal1').modal('hide');
                    _self.applists.job = request.data;
                }
            });
        },
        subform: function () {
            var dataobj = {
                model: "carlist",
                action: this.formaction,
                data: this.appinfo,
            };
            var _self = this;
            if (forminspect('regform',dataobj.data) == true) {
                $.ajax({
                    url: comUrl.student,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function(data) {
                        if (data.status == 1) {
                            _self.message = data.msg;
                            _self.formfiter=false;
                            $('#messageModel').modal('show');
                            $('#myModal').modal('hide');
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
                model: "staff",
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
        gotoJob:function (index) {
            if(index<0){
                this.applists.job.pageIndex=0;
            }else if(index>=(this.applists.job.pageAll)){
                this.applists.job.pageIndex=this.applists.job.pageAll-1;
            }else{
                this.applists.job.pageIndex=index;
            }

            var dataobj = {
                model: "timewarning",
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
                model: "timewarning",
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

})