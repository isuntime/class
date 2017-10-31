var app = new Vue({
    el: '#app',
    data: {
        applist: '',
        appinfo: {
            fileName: '',
            c_time: '',
            fileSize: '',
        },
        message: '',
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
    mounted: function () {
        this.$nextTick(function () {
            // DOM 现在更新了
            // `this` 绑定到当前实例
            this.getList();
        });
    },
    methods: {
        getInfo: function (item) {
            this.appinfo = item;
        },
        getList: function () {
            var _self = this;
            $.ajax({
                url: comUrl.system,
                type: "post",
                data: { model: "backupmanager"},
                dataType: "json",
                success: function (request, status) {
                    _self.applist = request.data;
                }
            })
        },
        recovery:function () {
            var _self = this;
            $.ajax({
                url: comUrl.system,
                type: "post",
                data: { model: "backupmanager", action: "recovery" ,where:this.appinfo.fileNmae},
                dataType: "json",
                success: function(data) {
                    if (data.status == 1) {
                        _self.message = data.msg;
                        $('#messageModel').modal('show');
                    } else {
                        _self.message = data.msg;
                        $('#messageModel').modal('show');

                    }
                }
            })
        },
        backups:function () {
            var _self = this;
            $.ajax({
                url: comUrl.system,
                type: "post",
                data: { model: "backupmanager", action: "backups" },
                dataType: "json",
                success: function(data) {
                    if (data.status == 1) {
                        _self.message = data.msg;
                        $('#messageModel').modal('show');
                    } else {
                        _self.message = data.msg;
                        $('#messageModel').modal('show');

                    }
                    _self.getList();
                }
            })
        }

    },
});