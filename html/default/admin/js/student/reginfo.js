var app = new Vue({
    el: "#app",
    data: {
        appinfo: {
            name:'',
            sex:0,
            nationality:"中国",
            certificatetype:'居民身份证',
            national_id:'',
            nation:'',
            postalcod:'833400',
            address:'',
            birthday:'',
            studentphoto:'',
            tel:'',
            phone:'',
            email:'',
            vehicle_type:'3',
            class_type:'1',
            recommend:'',
            reg_time:'',
        },
        departmentList:'',
        dep_id:'',
        worklist: {},

        vehicle_typelist:{},
        messages:'',
        formaction: 'insert',
    },
    computed: {
        Sex:function(){
            if (this.appinfo.sex==1 || this.appinfo.sex=='1'){
                return '男';
            }else if(this.appinfo.sex==0 || this.appinfo.sex=='0'){
                return '女';
            }else{
                return '女';
            }
        }
    },
    mounted: function () {
        this.$nextTick(function () {
            this.getList();
        })
    },
    methods:{
        getList: function () {
            var _self = this;
            $.ajax({
                url: comUrl.public,
                type: "post",
                data: {model: "vehicle_type", action: "list"},
                dataType: "json",
                success: function (request, status) {
                    _self.vehicle_typelist = request.data;
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
        },
        subform: function () {
            var dataobj = {
                model: "reginfo",
                action: this.formaction,
                data: {
                    name:this.appinfo.name,
                    student_id:'',
                    reg_time:'',
                    nationality:this.appinfo.nationality,
                    certificatetype:this.appinfo.certificatetype,
                    national_id:this.appinfo.national_id,
                    nation:this.appinfo.nation,
                    studentphoto:this.appinfo.studentphoto,
                    postalcode:this.appinfo.postalcode,
                    birthday:this.appinfo.birthday,
                    tel:this.appinfo.tel,
                    phone:this.appinfo.phone,
                    email:this.appinfo.email,
                    vehicle_type:this.appinfo.vehicle_type,
                    class_type:this.appinfo.class_type,
                    recommend:this.appinfo.recommend,
                    address:this.appinfo.address
                },
            };
            var _self=this;
            if (forminspect('regform',dataobj.data) == true) {
                dataobj.data['sex']=this.appinfo.sex,
                $.ajax({
                    url: comUrl.student,
                    type: "post",
                    data: dataobj,
                    dataType: "json",
                    success: function (request) {
                        if(request.status ==1){
                            _self.messages = request.msg;

                            $('#messageModel').modal('show');
                            $('#myModal').modal('hide');
                            _self.getList();
                        }else if(request.status ==0){
                            _self.messages =request.msg;
                            $('#messageModel').modal('show');

                        }

                    },error:function (XMLHttpRequest, textStatus, errorThrown) {
                        _self.message = '提交失败，请再次尝试';
                        $('#messageModel').modal('show');
                    }
                });

            }
        },
        onFileChange:function (e) {
            var files = e.target.files;
            if (!files.length) return;
            var vm = this;
            var reader = new window.FileReader();
            reader.readAsDataURL(files[0]);
            reader.onload = function (e) {
                vm.appinfo.studentphoto=e.target.result;
            }

        },
        setworker:function () {
            var _self=this;
            if(this.dep_id){
                $.ajax({
                    url: comUrl.public,
                    type: "post",
                    data: {model: "workers",where:{department_id:_self.dep_id}},
                    dataType: "json",
                    success: function (request) {
                        _self.worklist = request.data;
                    }
                });
            }
        },
        savePhoto:function (){
            webcam.capture();
        },
        nameFilter:function () {
//                检查学员是否达到毕业条件 4科目考完
            var _self=this;
            var dataobj = {
                model: "reginfo",
                action: 'check',
                where:{
                    national_id: this.appinfo.national_id,
                }
            };
            $.ajax({
                url: comUrl.student,
                type: "post",
                data: dataobj,
                dataType: "json",
                success: function (request) {
                    if (request.status == 1) {
                        _self.message = request.msg;
                        $('#messageModel').modal('show');
                        _self.formfiter = true;
                        _self.appinfo=request.data;
                    } else if(request.status == 0){
                        _self.formfiter = false;
                        _self.appinfo=request.data;
                    }

                }
            });
        },
        readStudentCard:function () {
            var CertCtl = document.getElementById("CertCtl");
            var result = CertCtl.connect();
            result = CertCtl.readCert();
            // alert(result);
            var resultObj = toJson(result);
            if (resultObj.resultFlag == 0) {
                app.$set(this.appinfo,'name',resultObj.resultContent.partyName);
                app.$set(this.appinfo,'sex',resultObj.resultContent.gender);
                // console.log(this.appinfo.sex+'|'+resultObj.resultContent.gender);
                app.$set(this.appinfo,'national_id',resultObj.resultContent.certNumber);
                app.$set(this.appinfo,'nation',resultObj.resultContent.nation);
                app.$set(this.appinfo,'birthday',resultObj.resultContent.bornDay);
                app.$set(this.appinfo,'address',resultObj.resultContent.certAddress);
            }else{
                this.messages = "读卡失败";
                $('#messageModel').modal('show');
            }
        },

    }

});

function toJson(str)
{
    //var obj = JSON.parse(str);
    //return obj;
    return eval('('+str+')');
}