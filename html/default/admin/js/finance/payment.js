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
            accreditation: "",
            datum: {money: "", state: true, d_state: true},
            d_state: true,
            money: "",
            state: true,
            id: "",
            insurance: {money: "", state: false, d_state: false},
            d_state: false,
            money: "200",
            state: false,
            isDiscount: {money: "", state: true, d_state: true},
            d_state: true,
            money: "",
            state: true,
            isvip: "",
            name: "",
            nation: {nation_id: null, name: "汉族", d_state: false},
            d_state: false,
            name: "",
            nation_id: null,
            space: "",
            state: "true",
            student_id: "",
            total: 401,
            traffic: {money: "", state: true, d_state: true},
            d_state: true,
            money: "",
            state: true,
            train: "",
            vehicle_type: "",
            vehicle_type_name: "",
        },
        nationalState: true,
        nationalList: '',
        formfiter: true,
        formaction: 'edit',
        message: '',
        printCar:[],
        printCar1:{},
        find:{
            student_id:'',
            national_id:'',
            starttime:'',
            lasttime:'',
            coach_id:'',
            studystate:'',
        },
        c_number:''
    },
    filters: {
        stateFilter: function (value) {
            if (true == value) {
                return "已经缴费";
            } else if (false == value) {
                return "等待缴费";
            }
        }
    },
    computed: {
        // a computed getter
        sumMoney1: function () {
            // `this` points to the vm instance
            var money = parseInt(this.appinfo.train) + parseInt(this.appinfo.accreditation) + parseInt(this.appinfo.space);
            if (this.appinfo.datum.state) {
                money += parseInt(this.appinfo.datum.money);
            }
            if (this.appinfo.traffic.state) {
                money += parseInt(this.appinfo.traffic.money);
            }
            if (this.appinfo.insurance.state) {
                money += parseInt(this.appinfo.insurance.money);
            }
            this.appinfo.sumMoney = money;
            return money;
        }
    },
    mounted: function () {
        this.$nextTick(function () {
            // DOM 现在更新了
            // `this` 绑定到当前实例
            this.getList();
        });
    },
    watch:{
        printCar:function () {

            if(this.printCar.length>4){
                this.message="最多只能选择4个学员打印";
                $('#messageModel').modal('show');
                this.printCar.pop();
            }
        },
    },
    methods: {
        getList: function () {
            var _self = this;
            var dataobj = {
                model: "payment",
                action: 'nation',
            };
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    _self.nationalList = request;
                }
            });
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: {model: "payment", action: "list",where:{pay_state:0}},
                dataType: "json",
                success: function (request, status) {
                    _self.applists.job = request.data;
                }
            });
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: {model: "payment", action: "list",where:{pay_state:1}},
                dataType: "json",
                success: function (request, status) {
                    _self.applists.djob = request.data;
                }
            });
        },
        getInfo: function (worker) {
            this.appinfo.student_id = worker.student_id;
            // this.formaction = 'insert';
            this.nameFilter();
        },
        findlist: function () {
            var dataobj = {
                model: "payment",
                action: "list",
                where: this.find,
            };
            var _self=this;
            $.ajax({
                url: comUrl.finance,
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
        subform: function () {
            var dataobj = {
                model: "payment",
                action: this.formaction,
                data: this.appinfo,
            };
            var _self = this;
            if (forminspect('paymentform', dataobj.data) == true && this.formfiter == true) {
                if (this.formaction == 'edit') {
                    dataobj.where = {
                        student_id: this.appinfo.student_id,
                    };
                }
                $.ajax({
                    url: comUrl.finance,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (data) {
                        if (data.status == 1) {
                            _self.c_number=data.data.c_number;
                            _self.message = data.msg;
                            _self.formfiter = false;
                            $('#PrintmessageModel').modal('show');
                            $('#myModal').modal('hide');
                            setTimeout(function () {
                                CreateReceipts(data.data);
                            },2000);

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
        },
        PrintVoucherinfo:function () {
            var dataobj = {
                model: "payment",
                action: "makeSure",
                where:{
                    student_id:this.appinfo.student_id,
                    order_id:this.appinfo.order_id,
                    c_number:this.c_number
                }
            };
            var _self=this;
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request, status) {
                    if (request.status == 1) {
                        _self.message = request.msg;
                        $('#PrintmessageModel').modal('hide');
                        _self.formfiter=false;
                        _self.getList();
                    }
                }
            });

        },
        nameFilter: function () {
            var _self = this;
            var dataobj = {
                model: "payment",
                action: 'find',
                where: {
                    student_id: this.appinfo.student_id,
                }
            };
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    if (request.status == 1) {
                        _self.message = request.msg;
                        // $('#messageModel').modal('show');
                        _self.formfiter = true;
                        _self.appinfo = request.data;
                    } else if (request.status == 0) {
                        _self.formfiter = false;
                        _self.appinfo = request.data;

                    }
                    _self.nationalState = request.data.state;

                }
            });
        },
        isDiscount: function () {

            this.sumMoney();

        },
        sumMoney: function () {


            var dataobj = {
                model: "payment",
                action: 'total',
                data: {
                    student_id: this.appinfo.student_id,
                    datum: this.appinfo.datum,
                    traffic: this.appinfo.traffic,
                    insurance: this.appinfo.insurance,
                    isDiscount: this.appinfo.isDiscount,
                    nation: this.appinfo.nation,
                },
            };
            var _self = this;
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (data) {
                    _self.appinfo = data;

                }
            });

        },
        setState: function () {
            var dataobj = {
                model: "information",
                action: "delete",
                where:{
                    student_id: this.appinfo.student_id,
                }


            };
            var _self=this;
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (data) {
                    if (data.status == 1) {
                        _self.message = data.msg;
                        _self.formfiter = false;
                        $('#messageModel').modal('show');
                        $('#myModal1').modal('hide');
                        _self.getList();
                    } else {
                        _self.message = data.msg;
                        $('#messageModel').modal('show');

                    }
                }
            });
        },

        PrintVoucherinfoStudent: function () {
            var dataobj = {
                model: "payment",
                action: "print_obj",
                where:this.printCar,
                // where:{
                //     student_id: this.appinfo.student_id,
                //     order_id: this.appinfo.order_id,
                // }
            };
            var _self=this;
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    if (request.status==1){
                        _self.printCar1.info=request.data;
                        setTimeout(function () {
                            Preview1Print(CreateStudentCard,_self.printCar1);
                        },2000);

                    }

                }
            });

        },
        getnation: function (item) {
            app.$set(this.appinfo.nation,'nation_id',item.id);
            app.$set(this.appinfo.nation,'name',item.nation);
            // this.appinfo.nation.nation_id = item.id;
            // this.appinfo.nation.name = item.nation;
            $('#nationModel').modal('hide');
            this.sumMoney();
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
                model: "payment",
                action: "list",
                where:{pay_state:0},
                pageIndex: this.applists.job.pageIndex,

            };
            var _self=this;
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    _self.applists .job = request.data;
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
                model: "payment",
                action: "list",
                where:{pay_state:1},
                pageIndex: this.applists.djob.pageIndex,

            };
            var _self=this;
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    _self.applists .djob = request.data;
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