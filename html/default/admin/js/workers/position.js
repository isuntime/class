var app = new Vue({
    el: "#app",
    data: {
        applists: {},
        appinfo: {},
        departmentList: {},
        positionList:'',
        formfiter:true,
        message:'',
        find: {
            department_id:'',
        },
        formactive: 'insert',
    },
    filters: {
        stateText: function (value) {
            if (value == 1) {
                return "";
            } else {
                return "";
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
    methods: {
        getList: function () {
            var _self = this;
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: {model: "position", action: "all"},
                dataType: "json",
                success: function (request, status) {
                    _self.applists = request.data;
                }
            });
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: {model: "department",action:'list'},
                dataType: "json",
                success: function (data) {
                    _self.departmentList = data.data;
                }
            });

        },
        getInfo: function (worker) {
            this.appinfo = worker;
            this.formaction = 'edit';
        },
        clearEditApp: function () {
            this.formaction = "insert";
            if (this.appinfo) {
                this.appinfo = {};
            }
        },
        findlist: function () {
            var dataobj = {
                model: "position",
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
                    _self.applists=request.data;
                    _self.find={
                        department_id:'',
                    }
                }
            });
        },
        subform: function () {
            var dataobj = {
                model: "position",
                action: this.formaction,
                data: {
                    department_id:this.appinfo.department_id,
                    position_name:this.appinfo.position_name,
                },
            };

            var _self=this;
            if (forminspect('positioninfo',dataobj.data) == true && this.formfiter==true) {
                if (this.formaction=='edit'){
                    dataobj.where={
                        id:this.appinfo.id,
                    };
                }
                $.ajax({
                    url: comUrl.workers,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (request, status) {
                        if (request.status==1){
                            _self.message = '提交成功';
                            $('#messageModel').modal('show');
                            // alert(request.state=='true');
                            $('#myModal').modal('hide');
                            _self.getList();
                        }else{
                            _self.message = '提交失败，请再次尝试';
                            $('#messageModel').modal('show');
                            _self.getList();
                        }

                    },error:function (XMLHttpRequest, textStatus, errorThrown) {
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
                    carstate: !this.appinfo.carstate,
                },

            };
            if (this.formaction=='edit'){
                dataobj.where={
                    id:this.appinfo.id,
                };
            }
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
        setPosition:function () {
            var _self=this;
            if(this.find.department_id){
                $.ajax({
                    url: comUrl.public,
                    type: "post",
                    data: {model: "position",where:{department_id:_self.find.department_id}},
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
    }

})