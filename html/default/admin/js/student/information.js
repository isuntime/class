var app = new Vue({
    el:"#app",
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
        appinfo:{},
        coachlist:{},
        vehicle_typelist: {},
        message: '',
        find:{
            student_id:'',
            national_id:'',
            starttime:'',
            lasttime:'',
            coach_id:'',
            studystate:'',
        },
        formactive: 'inster',
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
    methods: {
        getList: function () {
            var _self = this;
            $.ajax({
                url: comUrl.workers,
                type: "post",
                data: {model: "coach",action:"list"},
                dataType: "json",
                success: function (request, status) {
                    _self.coachlist = request.data;
                }
            });

            $.ajax({
                url: comUrl.student,
                type: "post",
                data: {model: "information", action: "list"},
                dataType: "json",
                success: function (request, status) {
                    _self.applists.job = request.data;
                }
            });
        },
        getInfo: function (worker) {
            this.appinfo = worker;
            this.formaction = 'edit';
        },
        findlist: function () {
            var dataobj = {
                model: "information",
                action: "find",
                where: this.find,
            };
            var _self=this;
            $.ajax({
                url: comUrl.student,
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
        find_graduation:function () {
            this.$set(this.find,'studystate',0);
            this.findlist();
        },
        subform: function () {
            var dataobj = {
                model: "information",
                action: this.formaction,
                data: this.appinfo,
            };
            var _self = this;
            if(this.formaction=='edit'){
                dataobj.where={
                    student_id:this.appinfo.student_id,
                }
            }
            if (forminspect('studentinfo',dataobj.data) == true) {
                $.ajax({
                    url: comUrl.student,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function(request) {
                        if (request.status == 1) {
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
        toNext: function () {
            window.location.href = "home.php?model=student_pay";

        },
        onFileChange: function (e) {
            var files = e.target.files;
            if (!files.length) return;
            var vm = this;
            var reader = new window.FileReader();
            reader.readAsDataURL(files[0]);
            reader.onload = function (e) {
                vm.appinfo.studentphoto = e.target.result;
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
        statejudge:function (value) {
            if (value == true) {
                return "通过";
            } else {
                return "未通过";
            }
        },
        PrintVoucherinfo: function () {
            Preview1Print(CreateContract,this.appinfo);
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
                model: "information",
                action: "list",
                pageIndex: this.applists.job.pageIndex,

            };
            var _self=this;
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    _self.applists .job= request.data;
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
                model: "information",
                action: "list",
                where:{user_state:0},
                pageIndex: this.applists.djob.pageIndex,

            };
            var _self=this;
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    _self.applists .djob= request.data;
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
        hetonprint:function (item) {
            this.getInfo(item);
              var  LODOP=getLodop();
              var url=comUrl.prints+'?model=prints&action=hongtongprint&student_id='+this.appinfo.student_id;
              console.log(url);
                LODOP.PRINT_INIT("打印合同");
                LODOP.ADD_PRINT_URL(30,20,746,"95%",url);
                LODOP.SET_PRINT_STYLEA(0,"HOrient",3);
                LODOP.SET_PRINT_STYLEA(0,"VOrient",3);
//		LODOP.SET_SHOW_MODE("MESSAGE_GETING_URL",""); //该语句隐藏进度条或修改提示信息
//		LODOP.SET_SHOW_MODE("MESSAGE_PARSING_URL","");//该语句隐藏进度条或修改提示信息
                LODOP.PREVIEW();


            // window.open(comUrl.student+'?model=information&action=hongtongprint&student_id='+this.appinfo.student_id, '_blank')
        }
    }

})