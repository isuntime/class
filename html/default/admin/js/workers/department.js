var app = new Vue({
    el: "#app",
    data: {
        applists: {},
        appinfo: {},
        formfiter:true,
        message:'',
        formactive: 'inster',
    },
    filters: {

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
                data: {model: "department",action:"list"},
                dataType: "json",
                success: function (request, status) {
                    _self.applists = request.data;
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
        subform: function () {
            var dataobj = {
                model: "department",
                action: this.formaction,
                data: this.appinfo,
            };
            var _self=this;
            if (forminspect('departmentinfo',dataobj.data) == true && this.formfiter==true) {
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
    }

})