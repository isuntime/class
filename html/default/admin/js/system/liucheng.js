var app = new Vue({
    el: '#app',
    data: {
        applist: '',
        appinfo: {
            rule_name: '',
            remake: '',
            rule_state: '',
        },
        ruleJurList:'',
        jurisdictionList:'',
        formfiter: true,
        message: '',
        formaction: "insert",
    },
    filters: {},
    mounted: function () {
        this.$nextTick(function () {
            this.showList();
        });
    },
    methods: {
        getInfo: function (item) {
            this.appinfo = item;
			this.formaction = "edit";
        },
        getJurisdiction: function (item) {
            this.appinfo = item;
            this.formaction = "edit";
            var _self=this;
            //获取角色权限信息
            $.ajax({
                url: comUrl.system,
                type: "post",
                data: { model: "jurisdiction", action: "update" ,where:{id:this.appinfo.id}},
                dataType: "json",
                success: function (request, status) {
                    _self.jurisdictionList = request.data;
                }
            });
        },
        subJur:function () {
            var dataobj = {
                model: "jurisdiction",
                action: 'edrule',
                data: this.jurisdictionList,
            };
            var _self = this;
            dataobj.where = {
                id: this.appinfo.id,
            };

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

                }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                    _self.message = '提交失败，请再次尝试';
                    $('#messageModel').modal('show');
                }
            });

        },
        //获取控制流程的详细列表
        showList: function () {
            var _self = this;
            $.ajax({
                url: comUrl.system,
                type: "post",
                data: { model: "liucheng", action: "create"},
                dataType: "json",
                success: function (data){
                    _self.applist = data.data;
                }
            })
        },
        clearEditApp: function () {
            this.formaction = "insert";
            for (var x in this.appinfo) {
                //                            console.log(x);
                this.appinfo[x] = '';
            }
        },
        subform: function () {
            var dataobj = {
                model: "jurisdiction",
                action: this.formaction,
                data: {
                    rule_name: this.appinfo.rule_name,
                    remake: this.appinfo.remake,
                    rule_state: this.appinfo.rule_state,
                },
            };
            var _self = this;
            if (forminspect('userinfo',dataobj.data) == true && this.formfiter == true) {
                if (this.formaction == 'edit') {
                    dataobj.where = {
                        id: this.appinfo.id,
                    };
                }
                $.ajax({
                    url: comUrl.system,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (request, status) {
                        if (request.status==1) {
                            _self.message = '提交成功';
                            $('#messageModel').modal('show');
                            $('#myModal').modal('hide');
                            _self.getList();
                        }else{
                            _self.message = '提交失败，请再次尝试';
                            $('#messageModel').modal('show');
                        }

                    }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                        _self.message = '提交失败，请再次尝试';
                        $('#messageModel').modal('show');
                    }
                });

            }
        },
        setState: function () {
            var dataobj = {
                model: "jurisdiction",
                action: this.formaction,
                data: {
                    rule_state: 0,
                },
                where: {
                    id: this.appinfo.id,
                }
            };
            var _self = this;
            $.ajax({
                url: comUrl.system,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    _self.message = '修改成功';
                    $('#myModal1').modal('hide');
                    $('#messageModel').modal('show');
                    _self.getList();
                }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                    _self.message = '修改失败，请再次尝试';
                    $('#messageModel').modal('show');
                }
            });
        },
        ruleFilter: function () {
            var _self = this;
            var dataobj = {
                model: "jurisdiction",
                action: 'list',
                where: {
                    rule_name: this.appinfo.rule_name,
                }
            };
            $.ajax({
                url: comUrl.system,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    if (request.data != null) {
                        _self.message = '已有角色';
                        $('#messageModel').modal('show');
                        _self.formfiter = false;
                    }else{
                        _self.formfiter = true;
                    }

                }
            });
        },


    },
});