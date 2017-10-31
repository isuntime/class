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
        appinfo: {
            student_id: '',
            subject: {
                subjectname: '',
                ch_name:''
            },
            testtime: '',

        },
        appinfo1:{

        },
        formfiter: true,
        subjectlist: '',
        message: '',
        formaction: "insert",
        find:{
            student_id:'',
            national_id:'',
            starttime:'',
            lasttime:'',
            coach_id:'',
            studystate:'',
        },
    },
    filters: {
        pay_mentfilter: function(value) {
            if (value == 1) {
                return "已交费";
            } else {
                return "未交费";
            }
        },
        stateText: function (value) {
            if (value == true) {
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
        }
    },
    computed: {
        studentSex:function(){
            if(this.appinfo.sex==1){
                return "男";
            }else{
                return "女";
            }
        }
    },
    mounted: function() {
        this.$nextTick(function() {
            // DOM 现在更新了
            // `this` 绑定到当前实例
            this.getList();

        });
    },
    methods: {
        getList: function () {
            var _self = this;
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: {model: "coach",action:"list"},
                dataType: "json",
                success: function (request, status) {
                    _self.coachlist = request.data;
                }
            });

            $.ajax({
                url: comUrl.student,
                type: "post",
                data: {model: "information", action: "list"},
                dataType: "json",
                success: function (request, status) {
                    _self.applists.job = request.data;
                }
            });
        },
        getInfo: function (worker) {
            this.appinfo = worker;
            // this.formaction = 'edit';
        },
        findlist: function () {
            var dataobj = {
                model: "information",
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
                        starttime:'',
                        lasttime:'',
                        coach_id:''
                    }
                }
            });
        },
        subform: function() {
            var _self = this;
            if (this.formfiter == false) {
                _self.message = '学员已经申请考试';
                $('#messageModel').modal('show');
                return;
            } else {
                this.gettime();
                var dataobj = {
                    model: "retest",
                    action: this.formaction,
                    data: {
                        student_id: this.appinfo.student_id,
                        subjecttype: this.appinfo.subject.subject_id,
                        testtime: this.appinfo.testtime,
                        pay_state: '0',
                        order_id: '',
                        money: this.appinfo.subject.subject_price,
                        subjecttype_name: this.appinfo.subject.subjectname,
                    },
                    where: { student_id: this.appinfo.student_id },
                };
                if (this.formfiter == true && forminspect('retestform',dataobj.data) == true) {
                    if (this.formaction == 'edit') {
                        dataobj.where = { id: this.appinfo.id };
                    }
                    $.ajax({
                        url: comUrl.student,
                        type: "post",
                        data: dataobj,
                        dataType: "json",
                        success: function(request) {
                            if (request.status == 1) {
                                _self.message = request.msg;
                                _self.formfiter=false;
                                $('#messageModel').modal('show');
                                $('#myModal').modal('hide');
                                // _self.nameFilter();
                            } else {
                                _self.message = request.msg;
                                $('#messageModel').modal('show');
                                
                            }

                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            _self.message = '提交失败，请再次尝试';
                            $('#messageModel').modal('show');
                        }
                    });

                }
            }

        },
        getbksqlist:function(item){
            this.getInfo(item);
            this.nameFilter();
        },
        getbksqlist1:function (item) {

            var _self = this;
            var dataobj = {
                model: "retest",
                action: 'testlog', //补考记录用testlog
                where: { national_id: item.national_id }
            };
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function(data) {
                    if (data.status == 1) {
                        _self.formfiter = true;
                        _self.appinfo1 = data.data;
                    } else {
                        _self.message = data.msg;
                        _self.formfiter = false;
                        _self.appinfo1 = data.data;
                        $('#messageModel').modal('show');
                    }

                }
            });
        },
        nameFilter: function() {
            var _self = this;
            var dataobj = {
                model: "retest",
                action: 'check', //补考记录用testlog
                where: { national_id: this.appinfo.national_id }
            };
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function(data) {
                    if (data.status == 1) {
                        _self.formfiter = true;
                        _self.appinfo = data.data;
                    } else {
                        _self.message = data.msg;
                        _self.formfiter = false;
                        _self.appinfo = data.data;
                        $('#messageModel').modal('show');
                    }

                }
            });
        },
        gettime: function() {
            this.$set(this.appinfo, 'testtime', $("#testtime").val());
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

    },

});
