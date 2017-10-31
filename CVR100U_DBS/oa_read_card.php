<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-12-30
 * Time: ÏÂÎç2:05
 */
//class CVR_IDCard{
//    private $object_tag="<OBJECT  classid='clsid:10946843-7507-44FE-ACE8-2B3483D179B7' id='CVR_IDCard' name='CVR_IDCard' width='0' height='0'  ></OBJECT>";
//    public $name;
//    public $sex;
//    public s
//    function __construct()	{
//    }
//}
?>
<OBJECT  classid="clsid:10946843-7507-44FE-ACE8-2B3483D179B7"
         id="CVR_IDCard" name="CVR_IDCard" width="0" height="0"  >
</OBJECT>

<script language="javascript" type ="text/javascript">
//    $(document).ready(function() {
//        var t=setTimeout("alert('5 seconds!')",5000);
        var tmp=setInterval("read_card()", 5000);
        function ClearForm() {
            document.all['CVR_Name'].value = "";
            document.all['CVR_Sex'].value = "";
            document.all['CVR_Nation'].value = "";
            document.all['CVR_Born'].value = "";
            document.all['CVR_Address'].value = "";
            document.all['CVR_CardNo'].value = "";
            document.all['CVR_IssuedAt'].value = "";
            document.all['CVR_EffectedDate'].value = "";
            document.all['CVR_ExpiredDate'].value = "";
            document.all['CVR_SAMID'].value = "";
            document.all['CVR_Pic'].src = "";
            document.all['CVR_Picture'].value = "";
            document.all['CVR_PictureLen'].value = "";
            document.all['CVR_PFMSG'].value = "";
            return true;
        }
        function read_card(){
            var CVR_IDCard = document.getElementById("CVR_IDCard");
            var strReadResult = CVR_IDCard.ReadCard();
            if(strReadResult == "0" && document.all['CVR_CardNo'].value != CVR_IDCard.CardNo)
            {
                ClearForm();
                document.all['CVR_Name'].value = CVR_IDCard.Name;
                document.all['CVR_Sex'].value = CVR_IDCard.Sex;
                document.all['CVR_Nation'].value = CVR_IDCard.Nation;
                document.all['CVR_Born'].value = CVR_IDCard.Born;
                document.all['CVR_Address'].value = CVR_IDCard.Address;
                document.all['CVR_CardNo'].value = CVR_IDCard.CardNo;
                document.all['CVR_IssuedAt'].value = CVR_IDCard.IssuedAt;
                document.all['CVR_EffectedDate'].value = CVR_IDCard.EffectedDate;
                document.all['CVR_ExpiredDate'].value = CVR_IDCard.ExpiredDate;
                document.all['CVR_SAMID'].value = CVR_IDCard.SAMID;
                document.all['CVR_Pic'].src ='data:image/jpeg;base64,'+ CVR_IDCard.Picture;
                document.all['CVR_Picture'].value = CVR_IDCard.Picture;
                document.all['CVR_PictureLen'].value = CVR_IDCard.PictureLen
                document.all['CVR_PFMSG'].value = CVR_IDCard.PFMsg;
                document.all['sfzhm'].value =document.all['CVR_CardNo'].value;
                document.all['sfzhm'].focus();
                $("#sfzhm").keyup();

            }else if(strReadResult != "0"){
                ClearForm();

            }
        }

//    });
</script>
<input type="hidden" id="CVR_Name" name="CVR_Name">
<input type="hidden" id="CVR_Pic" name="CVR_Pic">
<input type="hidden" id="CVR_Sex" name="CVR_Sex">
<input type="hidden" id="CVR_Nation" name="CVR_Nation">
<input type="hidden" id="CVR_Born" name="CVR_Born">
<input type="hidden" id="CVR_Address" name="CVR_Address">
<input type="hidden" id="CVR_CardNo" name="CVR_CardNo">
<input type="hidden" id="CVR_IssuedAt" name="CVR_IssuedAt">
<input type="hidden" id="CVR_EffectedDate" name="CVR_EffectedDate">
<input type="hidden" id="CVR_ExpiredDate" name="CVR_ExpiredDate">
<input type="hidden" id="CVR_SAMID" name="CVR_SAMID">
<input type="hidden" id="CVR_Picture" name="CVR_Picture">
<input type="hidden" id="CVR_PictureLen" name="CVR_PictureLen">
<input type="hidden" id="CVR_PFMSG" name="CVR_PFMSG">
