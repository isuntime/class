var app = new Vue({
    el: '#app',
    data: {
        applist: '',
        appinfo:{
            username: '',
            pwd: '',
            userinfo_id: '',
            department_id: '',
            position_id: '',
            rule_id: '',
            user_state: '',
            c_time: '',
        },
        formfiter:true,
        namelist:'',
        rulelist:'',
        departmentList:'',
        positionList:'',
        message:'',
        findinfo:{
            username:'',
            department_id:'',
            position_id:'',
        },
        formaction:"insert",
    },
    filters: {
        stateText: function (value) {
            if (value == 1) {
                return "启用";
            }else{
                return "禁用"
            }
        },
    },
    mounted:function () {
        this.$nextTick(function () {
            // DOM 现在更新了
            // `this` 绑定到当前实例
            this.getList();
        });
    },
    methods: {
        getInfo: function (item) {
            for(var x in item){
                this.appinfo[x]=item[x];
            }
            this.formaction = "edit";
            var _self=this;

        },
        getList:function () {
            var _self = this;
            $.ajax({
                url: comUrl.system,
                type: "post",
                data: {model: "account", action: "list"},
                dataType: "json",
                success: function (request, status) {
                    _self.applist = request.data;
                }
            });
            $.ajax({
                url: comUrl.public,
                type: "post",
                data: {model: "department"},
                dataType: "json",
                success: function (request, status) {
                    _self.departmentList = request.data;
                }
            });
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: {model: "position", action: "all"},
                dataType: "json",
                success: function (request, status) {
                    _self.positionList = request.data;
                }
            });
            $.ajax({
                url: comUrl.public,
                type: "post",
                data: {model: "rule"},
                dataType: "json",
                success: function (request, status) {
                    _self.rulelist = request.data;
                }
            });
            _self.setWorkerName();
        },
        subform: function () {
            var dataobj = {
                model: "account",
                action: this.formaction,
                data: {
                    username: this.appinfo.username,
                    pwd: this.appinfo.pwd,
                    userinfo_id: this.appinfo.userinfo_id,
                    department_id: this.appinfo.department_id,
                    position_id: this.appinfo.position_id,
                    rule_id: this.appinfo.rule_id,
                    user_state: this.appinfo.user_state,
                    c_time:this.appinfo.c_time
                },
            };
            var _self=this;
            if (forminspect('userinfo',dataobj.data) == true && this.formfiter==true) {
                if (this.formaction=='edit'){
                    delete dataobj.data.c_time;
                    dataobj.where={
                        id:this.appinfo.id,
                    };
                }
                $.ajax({
                    url: comUrl.system,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (request, status) {
                        if (request.status==1){
                            _self.message = '提交成功';
                            $('#messageModel').modal('show');
                            $('#myModal').modal('hide');
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
        clearEditApp: function () {
            this.formaction = "insert";
            for(var x in this.appinfo){
//                            console.log(x);
                this.appinfo[x]='';
            }
        },
        setPosition:function () {
            var _self=this;
            if(this.findinfo.department_id){
                $.ajax({
                    url: comUrl.public,
                    type: "post",
                    data: {model: "position",where:{department_id:_self.findinfo.department_id}},
                    dataType: "json",
                    success: function (request, status) {
                        _self.positionList = request.data;
                    }
                });
            }
        },
        setAppPosition:function () {
            var _self=this;
            if(this.appinfo.department_id){
                $.ajax({
                    url: comUrl.public,
                    type: "post",
                    data: {model: "position",where:{department_id:_self.appinfo.department_id}},
                    dataType: "json",
                    success: function (request, status) {
                        _self.positionList = request.data;
                    }
                });
            }
        },
        setWorkerName:function () {
            var _self=this;
            if(this.appinfo.position_id){
                $.ajax({
                    url: comUrl.public,
                    type: "post",
                    data: {model: "userinfo",where:{position_id:_self.appinfo.position_id}},
                    dataType: "json",
                    success: function (request, status) {
                        _self.namelist = request.data;
                    }
                });
            }else{
                $.ajax({
                url: comUrl.public,
                type: "post",
                data: {model: "userinfo"},
                dataType: "json",
                success: function (request, status) {
                    _self.namelist = request.data;
                }
            });
            }


        },
        findlist:function () {
            var _self=this;
            var dataobj = {
                model: "account",
                action: "list",
                where: {
                    username:this.findinfo.username,
                    department_id:this.findinfo.department_id,
                    position_id:this.findinfo.position_id,
                }
            };
//                console.log(dataobj.where);
            $.ajax({
                url: comUrl.system,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    _self.applist=request.data;
                    for(var x in _self.findinfo){
//                            console.log(x);
                        _self.findinfo[x]='';
                    }
                }
            });
        },
        setState: function () {
            var dataobj = {
                model: "account",
                action: this.formaction,
                data: {
                    user_state: 0,
                },
                where:{
                    id: this.appinfo.id,
                }
            };
            var _self=this;
            $.ajax({
                url: comUrl.system,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    if (request.status==1) {
                        _self.message = '提交成功';
                        $('#messageModel').modal('show');
                        $('#myModal2').modal('hide');
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
        usernameFilter:function () {
            var _self=this;
            var dataobj = {
                model: "account",
                action: 'list',
                where:{
                    username: this.appinfo.username,
                }
            };
            $.ajax({
                url: comUrl.system,
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
        nameFilter:function () {
            var _self=this;
            var dataobj = {
                model: "account",
                action: 'list',
                where:{
                    userinfo_id: this.appinfo.userinfo_id,
                }
            };
            $.ajax({
                url: comUrl.system,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    if (request.data!=null){
                        _self.message='该工作人员已有账号';
                        $('#messageModel').modal('show');
                        _self.formfiter=false;
                    }

                }
            });
        }
    },

});