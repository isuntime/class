﻿<OBJECT  classid="clsid:10946843-7507-44FE-ACE8-2B3483D179B7"
	  id="CVR_IDCard" name="CVR_IDCard" width="0" height="0"  >
</OBJECT>

			<script language="javascript" type ="text/javascript">

function Button1_onclick() {
                    var CVR_IDCard = document.getElementById("CVR_IDCard");					
					var strReadResult = CVR_IDCard.ReadCard();
					if(strReadResult == "0")
					{
ClearForm();
					      document.all['Name'].value = CVR_IDCard.Name;  
                          document.all['Sex'].value = CVR_IDCard.Sex;    
                          document.all['Nation'].value = CVR_IDCard.Nation; 
                          document.all['Born'].value = CVR_IDCard.Born;     
                          document.all['Address'].value = CVR_IDCard.Address; 
                          document.all['CardNo'].value = CVR_IDCard.CardNo; 
                          document.all['IssuedAt'].value = CVR_IDCard.IssuedAt;  
                          document.all['EffectedDate'].value = CVR_IDCard.EffectedDate;  
                          document.all['ExpiredDate'].value = CVR_IDCard.ExpiredDate;
                          document.all['SAMID'].value = CVR_IDCard.SAMID;
                          document.all['pic'].src ='data:image/jpeg;base64,'+ CVR_IDCard.Picture;
                          document.all['Picture'].value = CVR_IDCard.Picture;  
                          document.all['PictureLen'].value = CVR_IDCard.PictureLen  
                          document.all['PFMSG'].value = CVR_IDCard.PFMsg;
                      }
                      else
                      {
                        ClearForm();
                        alert(strReadResult);
                      }

}

					</script>
<form>
<table
        style="width: 638px; height: 273px; border-top-style: groove; border-right-style: groove; border-left-style: groove; background-color: transparent; border-bottom-style: groove;" 
        align="center">
         <tr>
             <td class="style2">
                 姓名：</td>
             <td style="text-align: left" colspan="3">
                 <input id="Text1" type="text" style="width: 155px" name="Name" /></td>
             <td style="width: 138px; text-align: left;" rowspan="3">
                 <img  src="" style="width: 91px; height: 108px" name="pic"/></td>
         </tr>
         <tr>
             <td class="style2">
                 性别：</td>
             <td class="style1">
                 <input id="Text2" type="text" name="Sex" 
                     style="width: 59px; margin-left: 0px;" /></td>
             <td style="width: 58px">
                 民族：</td>
             <td style="width: 59px">
                 <input id="Text3" type="text" name="Nation" style="width: 94px" align="left" /></td>
         </tr>
         <tr>
             <td class="style2">
                 出生日期：</td>
             <td style="text-align: left;" colspan="3">
                 <input id="Text4" type="text" style="width: 151px" name="Born" /></td>
         </tr>
         <tr>
             <td class="style2">
                 地址：</td>
             <td colspan="4" style="text-align: left">
                 <input id="Text5" style="width: 505px" type="text" name="Address" /></td>
         </tr>
         <tr>
             <td class="style2">
                 身份号码：</td>
             <td colspan="4" style="text-align: left">
                 <input id="Text6" style="width: 506px" type="text" name="CardNo" /></td>
         </tr>
         <tr>
             <td class="style2">
                 签发机关：</td>
             <td colspan="4" style="text-align: left">
                 <input id="Text7" style="width: 505px" type="text" name="IssuedAt" /></td>
         </tr>
         <tr>
             <td class="style2">
                 有效期限：</td>
             <td colspan="4" style="text-align: left">
                 <input id="Text8" style="width: 163px" type="text" name="EffectedDate" />至<input id="Text10" style="width: 163px" type="text" name="ExpiredDate" /></td>
         </tr>
         <tr>
             <td style="text-align: left;" class="style2">
                 模块号码：</td>
             <td colspan="4" style="text-align: left">
                 <input id="Text9" style="width: 506px" type="text" name="SAMID" /></td>
         </tr>
         <tr>
             <td style="text-align: left; " class="style3">
                 照片编码：</td>
             <td colspan="4" style="text-align: left; height: 136px;">
                 <textarea id="TextArea1" name="Picture" style="width: 509px; height: 115px"></textarea></td>
         </tr>
         <tr>
             <td style="text-align: left" class="style2">
                 编码长度：</td>
             <td colspan="4" style="text-align: left">
                 <input id="Text11" style="width: 508px" type="text" name="PictureLen"/></td>
         </tr>
         <tr>
             <td style="text-align: left" class="style2">
                 指纹信息：</td>
             <td colspan="4" style="text-align: left">
                 <input id="Text12" style="width: 508px" type="text" name="PFMSG"/></td>
         </tr>
     </table>
						
										
			
    </form>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<input id="Button1" type="button" value="读   卡" onclick="return Button1_onclick()" />


</body>
</html>
