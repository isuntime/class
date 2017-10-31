var app = new Vue({
        el: "#app",
        data: {
            applist:{
                data:'',
                data:'',
                pageAll:1,
                pageIndex:0
            },
            appinfo: {
                user_info:{national_id: '',},
                remake: '',
            },
            stuinfostate:false,
            message: '',
            formfiter: true,
            formaction: 'insert',
            req_state:1,
            agree:true,
        },
    filters:{
        studentSex:function(value){
            if(value==1){
                return "男";
            }else if(value==2){
                return "女";
            }
        },
        comState:function (value) {
            if(value==true){
                return "已处理";
            }else {
                return "未处理";
            }
        }
    },
        computed: {

        }
        ,
        mounted: function () {
            this.$nextTick(function () {
                this.getList();
            })
        },
    watch:{
            req_state:function () {
                this.getList();
            }
    },
        methods: {
            getInfo: function (worker) {
                this.appinfo = worker;
                this.formaction = 'edit';
            },
            getList: function () {
                var dataobj = {
                    model: "dropout",
                    action: "list",
                };
                if(this.req_state==2){
                    dataobj.where={
                        req_state:1,
                    }
                }else if(this.req_state==3){
                    dataobj.where={
                        req_state:0,
                    }
                }
                var _self = this;
                $.ajax({
                    url: comUrl.student,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (request) {
                        _self.applist = request;
                    }
                });

            }
            ,
            subform: function () {
                var dataobj = {
                    model: "dropout",
                    action: "insert",
                    data: {
                        national_id: this.appinfo.user_info.national_id,
                        remake: this.appinfo.remake,
                    },
                };
                var _self = this;
                if (forminspect('dropoutform', dataobj.data) == true && this.formfiter == true) {
                    $.ajax({
                        url: comUrl.student,
                        type: "post",
                        data: dataobj,
                        dataType: "json",
                        success: function (data) {
                            if (datastatus == true) {
                                _self.message = data.msg;
                                _self.formfiter = false;
                                $('#messageModel').modal('show');
                                $('#myModal').modal('hide');
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
//                检查dropoutList是否有重复
                if(this.appinfo.user_info.national_id==''||this.appinfo.user_info.national_id==null){
                    return;
                }
                var _self = this;
                var dataobj = {
                    model: "dropout",
                    action: 'check',
                    where: {
                        national_id: this.appinfo.user_info.national_id,
                        studystate:1
                    }
                };
                $.ajax({
                    url: comUrl.student,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (request) {
                        if (requeststatus == false) {
                            _self.message = request.msg;
                            $('#messageModel').modal('show');
                            _self.formfiter = false;
                            _self.appinfo = request.data;
                        } else if (requeststatus == true) {
                            _self.formfiter = true;
                            _self.appinfo = request.data;
                            _self.stuinfostate=true;

                        }

                    }
                });
            },
            setState: function (item,code) {

                var dataobj = {
                    model: "dropout",
                    action: "edit",
                    data: {
                        req_state: code,
                    },
                    where:{
                        student_id:item.student_id,
                    }
                };
                var _self=this;
                $.ajax({
                    url: comUrl.student,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (request, status) {
                        $('#setState').modal('hide');
                        _self.getList();
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
                    model: "dropout",
                    action: "list",
                    pageIndex: this.applist.pageIndex,
                };
                if(this.req_state==2){
                    dataobj.where={
                        req_state:1,
                    }
                }else if(this.req_state==3){
                    dataobj.where={
                        req_state:0,
                    }
                }
                var _self=this;
                $.ajax({
                    url: comUrl.student,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (request) {
                        _self.applist= request;
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
;