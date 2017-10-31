var app = new Vue({
    el: '#app',
    data: {
        stulist:'',
        testlist:'',
        nationalList:'',
        stuinfo:{
            vehicle_type_name: '',
            train: '',
            accreditation: '',
            space: '',
            datum:'',
            datum_state:true,
            nation_state:true,
            nation:{
                id:'',
                name:'',
                money:'',
            },
            traffic:'',
            traffic_state:true,
            insurance:'',
            insurance_state:true,
            subjectOne:'',
            subjectTwo:'',
            twoAboutPay:"",
            subjectThree:'',
            threeAboutPay:'',
            subjectFour:'',
        },
        testinfo:{

        },
        Vehicle_typeList:'',
        formaction : 'edit',
        formfiter:true,
        message:'',
    },
    filters: {

    },
    computed: {
        // a computed getter
        sumMoney1: function () {
            // `this` points to the vm instance
            var money=parseInt(this.appinfo.train)+parseInt(this.appinfo.accreditation)+parseInt(this.appinfo.space);
            if(this.appinfo.datum.state){
                money+=parseInt(this.appinfo.datum.money);
            }
            if(this.appinfo.traffic.state){
                money+=parseInt(this.appinfo.traffic.money);
            }
            if(this.appinfo.insurance.state){
                money+=parseInt(this.appinfo.insurance.money);
            }
            this.appinfo.sumMoney=money;
            return money;
        }
    },
    mounted:function () {
        this.$nextTick(function () {
            // DOM 现在更新了
            // `this` 绑定到当前实例
            this.getList();
        });
    },
    methods: {
        getList: function () {
            var _self = this;
            //从vehicle_type表获取数据
            var dataobj = {
                model: "payment",
                action: 'nation',
            };
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: {model: "chargeType", action: "list"},
                dataType: "json",
                success: function (request, status) {
                    _self.stulist = request.data;
                }
            });
            $.ajax({
                url: comUrl.finance,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    _self.nationalList=request.data;
                }
            });
        },
        getStu: function (worker) {
            this.stuinfo = worker;
            this.formaction = 'edit';
        },
        getTest: function (worker) {
            this.testinfo = worker;
            this.formaction = 'edit';
        },
        substuform: function () {
            var dataobj = {
                model: "chargeType",
                action: this.formaction,
                data: this.stuinfo,
            };
            var _self=this;
            if (forminspect('chargeinfo1',dataobj.data) == true && this.formfiter==true) {
                if (this.formaction=='edit'){
                    dataobj.where={
                        id:this.stuinfo.id,
                    };
                }
                $.ajax({
                    url: comUrl.finance,
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
            if (this.stuinfo) {
                this.stuinfo = {
                    vehicle_type_name: '',
                    train: '',
                    accreditation: '',
                    space: '',
                    datum:'',
                    datum_state:true,
                    nation_state:true,
                    nation:{
                        id:'',
                        name:'',
                        money:'',
                    },
                    traffic:'',
                    traffic_state:true,
                    insurance:'',
                    insurance_state:true,
                    subjectOne:'',
                    subjectTwo:'',
                    subjectThree:'',
                    subjectFour:'',
                };
            }
        },
        getnation:function (item) {
            this.stuinfo.nation.id=item.id;
            this.stuinfo.nation.name=item.nation;
            this.stuinfo.nation.money=item.price;
            $('#nationModel').modal('hide');
        }


    },

});