var app = new Vue({
    el: '#app',
    data: {
        applist: '',
        appinfo:{
            student_id: '',
            name:'',
            national_id:'',

            subjecttype:"twoAboutPay",
            stime:'',
            timelen: '',
        },
        formfiter:true,
        coachlist:'',
        subjectlist:'',
        carlist:'',
        message:'',
        findinfo:{
            student_id:'',
            national_id:'',
            coach_id:'',
            subjectType:'',
            car_id:'',
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
//                this.appinfo = item;
            this.appinfo=item;

            this.formaction = "edit";
        },
        getList:function () {
            var _self = this;
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: {model: "rule"},
                dataType: "json",
                success: function (request, status) {
                    _self.applist = request;
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
                    url: comUrl.student,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function(data) {
                        if (datastatus == true) {
                            _self.message = data.msg;
                            _self.formfiter=false;
                            $('#messageModel').modal('show');
                            $('#myModal').modal('hide');
                            _self.nameFilter();
                        } else {
                            _self.message = data.msg;
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
                url: comUrl.student,
                type: "post",
                data: {model: "userinfo",where:{isuse:0}},
                dataType: "json",
                success: function (request, status) {
                    _self.namelist = request;
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
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    _self.applist=request;
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
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    if (request == true) {
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
        nameFilter: function () {
            var _self = this;
            var dataobj = {
                model: "assumpsitcar",
                action: 'check',
                data:{
                    subjecttype:this.appinfo.subjecttype
                },
                where: {
                    student_id: this.appinfo.student_id,
                }
            };
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    if (request.state == false) {
                        _self.message = request.msg;
                        $('#messageModel').modal('show');
                        _self.formfiter = false;
                        _self.appinfo=request;
                    } else if(request.state==true){
                        _self.formfiter = true;
                        _self.appinfo=request;
                    }

                }
            });
        },
        sumMoney: function () {


            var dataobj = {
                model: "payment",
                action: 'total',
                data:{
                    student_id:this.appinfo.student_id,
                    datum: this.appinfo.datum,
                    traffic:this.appinfo.traffic,
                    insurance:this.appinfo.insurance,
                    isDiscount:this.appinfo.isDiscount,
                    nation:this.appinfo.nation,
                },
            };
            var _self = this;
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (data) {
                    _self.appinfo=data;

                }
            });

        },
        gettime:function(){
            alert($("#stime").val());
            this.$set(this.appinfo,'stime',$("#stime").val());
        }
    },

});