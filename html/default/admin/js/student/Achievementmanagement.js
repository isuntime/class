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
            subjecttype:"",
            ac_num:'',
        },
        textTime:'',
        coachlist:{},
        message: '',
        find:{
            student_id:'',
            national_id:'',
            coach_id:''
        },
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
                data: {model: "Achievementmanagement", action: "list"},
                dataType: "json",
                success: function (request) {
                    _self.applists.job = request.data;
                }
            });
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: {model: "coach",action:"list"},
                dataType: "json",
                success: function (request) {
                    _self.coachlist = request.data;
                }
            });

        },
        getInfo: function (item) {
            this.appinfo = item;
            this.formaction = 'edit';
        },
        findlist: function () {
            var dataobj = {
                model: "Achievementmanagement",
                action: "find",
                where: this.find,
            };
            var _self=this;
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    _self.applists.job=request.data;
                    _self.find={
                        student_id:'',
                        national_id:'',
                        coach_id:''
                    }
                }
            });
        },
        clearEditApp: function () {
            this.formaction = "inster";
            if (this.appinfo) {
                this.appinfo = {};
            }
        },
        subform: function () {
            var dataobj = {
                model: "Achievementmanagement",
                action: "edit",
                data: {
                    total:this.appinfo.total,
                    subject_name:this.appinfo.subject_name,
                    ac_num:this.appinfo.ac_num,
                    order_id:this.appinfo.order_id,
                },
                where:{
                    student_id:this.appinfo.student_id,
                }
            };

            if (this.formaction == 'edit') {
                dataobj.where={
                    student_id:this.appinfo.student_id,
                }
            }

            if (forminspect('resultinoutform',dataobj.data) == true) {
                var _self = this;
                $.ajax({
                    url: comUrl.student,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (request) {
                        if (request.status ==1){
                            _self.message = request.msg;
                            _self.formfiter=false;
                            $('#messageModel').modal('show');
                            $('#myModal').modal('hide');
                        }else if (request.status ==0){
                            _self.message = request.msg;
                            $('#messageModel').modal('show');
                        }
                        _self.getList();
                    },error:function (XMLHttpRequest, textStatus, errorThrown) {
                        _self.message = '提交失败，请再次尝试';
                        $('#myModal1').modal('show');
                    }
                });

            }
        },
        setState: function () {
            var dataobj = {
                model: "resultInput",
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

        ResultInput:function (item) {
            var _self=this;
            var dataobj = {
                model: "Achievementmanagement",
                action: 'check',
                where:{
                    national_id: item.national_id,
                    // subjecttype:this.appinfo.subjecttype,
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
                        _self.formfiter = false;
                        _self.appinfo=request.data.data;
                    } else if(request.status ==0){
                        _self.formfiter = true;
                        _self.appinfo=request.data.data;
                    }

                }
            });
        },
        nameFilter:function () {
            var _self=this;
            var dataobj = {
                model: "Achievementmanagement",
                action: 'check',
                where:{
                    national_id: this.appinfo.national_id,
                    // subjecttype:this.appinfo.subjecttype,
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
                        _self.formfiter = false;
                        _self.appinfo=request.data.data;
                    } else if(request.status ==0){
                        _self.formfiter = true;
                        _self.appinfo=request.data.data;
                    }

                }
            });
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
                model: "Achievementmanagement",
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
                model: "Achievementmanagement",
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

