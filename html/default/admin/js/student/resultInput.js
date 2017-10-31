var app = new Vue({
    el: '#app',
    data: {
        appinfo:{
            student_id: '',
            subjectType: '',
            testtime:'',
        },
        formfiter:true,
        subjectlist:'',
        message:'',
        formaction:"insert",
    },
    filters: {

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
//                this.appinfo = item;
            this.appinfo.student_id=item.student_id,
                this.appinfo.subjecttype=item.subjecttype,
                this.appinfo.subjecttype=item.stime,
                this.formaction = "edit";
        },
        getList:function () {
            var _self = this;
            $.ajax({
                url: comUrl.public,
                type: "post",
                data: {model: "subjectlist", action: "list"},
                dataType: "json",
                success: function (request, status) {
                    _self.subjectlist = request.data;
                }
            });
        },
        subform: function () {
            this.gettime();
            var dataobj = {
                model: "account",
                action: this.formaction,
                data:this.appinfo,
            };
            var _self=this;
            if (forminspect('resultinoutform',dataobj.data) == true && this.formfiter==true) {
                if (this.formaction=='edit'){
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
            var _self=this;
            $.ajax({
                url: comUrl.public,
                type: "post",
                data: {model: "userinfo",where:{isuse:0}},
                dataType: "json",
                success: function (request, status) {
                    _self.namelist = request.data;
                }
            });
        },
        findlist:function () {
            var _self=this;
            var dataobj = {
                model: "account",
                action: "list",
                where: this.findinfo,
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
                    c_state: 0,
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
                    if (request.status == 1) {
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
        nameFilter:function () {
            var _self=this;
            var dataobj = {
                model: "account",
                action: 'list',
                where:{
                    student_id: this.appinfo.student_id,
                    subjecttype:this.appinfo.subjecttype,
                }
            };
            $.ajax({
                url: comUrl.system,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    if (request.status == 1) {
                        _self.message = request.msg;
                        $('#messageModel').modal('show');
                        _self.formfiter = true;
                        _self.appinfo=request.data;
                    } else if(request.status ==0){
                        _self.formfiter = false;
                        _self.appinfo=request.data;
                    }

                }
            });
        },
        gettime:function(){
            this.$set(this.appinfo,'testtime',$("#testtime").val());
        }
    },

});