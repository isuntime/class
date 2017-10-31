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
            national_id:'',
            remake:'',
        },
        message:'',
        formfiter:true,
        formaction : "insert",
        agree:true,
        req_state:1,
    },
    filters: {
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
    methods:{
        getInfo: function (item) {
               this.appinfo = item;
//             this.appinfo.student_id=item.student_id;
            this.formaction = "edit";

        },
        getList:function () {
            var _self = this;
            var dataobj = {
                model: "graduation",
                action: "list",
                where:{}
            };
            switch(Number(this.req_state))
            {
                case 2:

                    dataobj.where={
                        req_state:1
                    };
                    break;
                case 3:
                    dataobj.where={
                        req_state:0
                    };
                    break;
                case 4:
                    dataobj.where={
                        grad_type:1
                    };
                    break;
                case 5:
                    dataobj.where={
                        grad_type:2
                    };
                    break;
                case 6:
                    dataobj.where={
                        grad_type:3
                    };
                    break;
            }

            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    _self.applist = request.data;
                }
            });
        },
        subform: function () {
            var dataobj = {
                model: "graduation",
                action: "insert",
                data: this.appinfo,
            };
            var _self=this;
            if (forminspect('graduationform',dataobj.data) == true && this.formfiter==true) {
                $.ajax({
                    url: comUrl.student,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function(request) {
                        if (request.status==1) {
                            _self.message = request.msg;
                            _self.formfiter=false;
                            $('#messageModel').modal('show');
                            $('#myModal').modal('hide');
                            _self.getList();
                        } else {
                            _self.message = request.msg;
                            $('#messageModel').modal('show');

                        }

                    }
                });

            }
        },
        nameFilter:function () {
//                检查学员是否达到毕业条件 4科目考完
            var _self=this;
            var dataobj = {
                model: "graduation",
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
                    if (request.status==1) {
                        _self.message = request.msg;
                        // $('#messageModel').modal('show');
                        _self.formfiter = true;
                        _self.appinfo=request.data;
                    } else if(request.status==0){
                        _self.formfiter = false;
                        _self.message = request.msg;
                        _self.appinfo=request.data;
                    }

                }
            });
        },
        clearEditApp: function () {
            this.formaction = "insert";
            for(var x in this.appinfo){
//                            console.log(x);
                this.appinfo[x]='';
            }
        },
        setState: function () {
            var regstate=1;
            if(this.agree=="false"){
                regstate=0;
            }
            var dataobj = {
                model: "graduation",
                action: "edit",
                data: {
                    req_state: regstate,
                },
                where:{
                    student_id:this.appinfo.student_id,
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
                model: "graduation",
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
                    _self.applist= request.data;
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