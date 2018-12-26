<?php echo $header; ?>

<header class="wrap">
<div style="margin-top:10px">
信件寄送:<br />
<input type="button" onclick="addPersonal();" value="個人" style="width: 80px; margin-top: 10px" name="type"  style="margin-top:10px">
<input type="button" onclick="addGlobal();" value="全域" style="width: 80px; margin-left: 20px" name="type" style="margin-left: 10px">
</div>

<div id="insertform"></div>    
</header>
<?php echo $footer; ?>

<script lang="JavaScript">
function addPersonal(){
   delLast();
   var str="<form action=\"<?php echo Uri::to('admin/sendmail/actionpersonal'); ?>\" method=\"POST\" align=\"start\" style=\"margin-top:20px\">"
          +"<div id='inputfield'>"
          +"★ 標題最多一百字，內文與備註最多五百字。</br></br>"
          +"<span style=\"font-weight:bold;\">"  //粗體
          +"角色編號<input type=\"text\" name=\"RoleDBID\" placeholder=\"收件者RoleDBID，多組請以空格分開\" style=\" margin-left:50px; width:842px\"></br>"
          +"有效開始日期<input type=\"datetime-local\" name=\"SendTime\" value=\"2099-12-31T23:59\" style=\"margin-top:5px; margin-left:20px; margin-right:20px; width: 355px\">"
          +"有效結束日期<input type=\"datetime-local\" name=\"ValidTime\" value=\"2099-12-31T23:59\" style=\"margin-top:5px; margin-left:20px; width:355px\"></br>"
          +"信件類型<input type=\"text\" name=\"MailType\" placeholder=\"0=公告, 10=一般補償, 11=IAP補償, 20=一般獎勵\" style=\"margin-top:5px; margin-left:50px; margin-right:20px; width:355px\">"
          +"禮包編號<input type=\"text\" name=\"GiftBoxID\" placeholder=\"禮包編號 (無請留空)\" style=\"margin-left:52px; margin-top:5px; width:355px;\">"
          // 中文
          +"信件標題<input type=\"text\" name=\"Title_CH\" placeholder=\"繁中\" maxlength=\"100\" style=\"margin-top:10px; margin-left:50px; width:842px\">"
          +"<div style=\"float:left; margin-top:10px\">信件內容</div><textarea name=\"Content_CH\" placeholder=\"繁中\" maxlength=\"500\" style=\"margin-top:5px; margin-left:50px; width:842px; height:200px\"></textarea>"
          // 英文
          +"信件標題<input type=\"text\" name=\"Title_EN\" placeholder=\"英文\" maxlength=\"100\" style=\"margin-top:10px; margin-left:50px; width:842px\">"
          +"<div style=\"float:left; margin-top:10px\">信件內容</div><textarea name=\"Content_EN\" placeholder=\"英文\" maxlength=\"500\" style=\"margin-top:5px; margin-left:50px; width:842px; height:200px\"></textarea>"
          // 越南
          +"信件標題<input type=\"text\" name=\"Title_VI\" placeholder=\"越南語\" maxlength=\"100\" style=\"margin-top:10px; margin-left:50px; width:842px\">"
          +"<div style=\"float:left; margin-top:10px\">信件內容</div><textarea name=\"Content_VI\" placeholder=\"越南語\" maxlength=\"500\" style=\"margin-top:5px; margin-left:50px; width:842px; height:200px\"></textarea>"
          +"<div style=\"float:left; margin-top:10px\">信件備註</div><textarea name=\"Comment\" placeholder=\"\" maxlength=\"500\" style=\"margin-top:5px; margin-left:50px; width:842px; height:150px\"></textarea>"
          +"<input type=\"reset\" value=\"重置\" style=\"margin-left:110px; margin-top: 10px; width:100px\">"
          +"<input type=\"submit\" name=\"submit\" value=\"確認發送\" style=\"margin-left:642px; width:100px; background:#FFFACD\">"
          +"</div>"
          +"</form>";
   document.all["insertform"].insertAdjacentHTML("BeforeEnd",str);
}
//(WorldID,CreateRoleTime_Begin,CreateRoleTime_End,MailDBID,MailType,SendTime,ValidTime,Title_CH,Title_EN,Content_CH,Content_EN,GiftBoxID) 
function addGlobal(){
   delLast();
   var str="<form action=\"<?php echo Uri::to('admin/sendmail/actionglobal'); ?>\" method=\"POST\" align=\"start\" style=\"margin-top:20px\">"
          +"<div id='inputfield'>"
          +"★ 標題最多一百字，內文與備註最多五百字。</br></br>"
          +"<span style=\"font-weight:bold;\">"  //粗體
          +"信件編號<input type=\"text\" name=\"MailDBID\" placeholder=\"0~639，不可留空或跳號\" style=\" margin-left:50px; width:842px\"></br>"
          +"創角起始日期<input type=\"datetime-local\" name=\"CreateRoleTime_Begin\" value=\"2000-01-01T00:00\" style=\"margin-top:5px; margin-left:20px; margin-right:20px; width: 355px\">"
          +"創角結束日期<input type=\"datetime-local\" name=\"CreateRoleTime_End\" value=\"2099-12-31T23:59\" style=\"margin-top:5px; margin-left:20px; width:355px\"></br>"
          +"有效開始日期<input type=\"datetime-local\" name=\"SendTime\" value=\"2099-12-31T23:59\" style=\"margin-top:5px; margin-left:20px; margin-right:20px; width: 355px\">"
          +"有效結束日期<input type=\"datetime-local\" name=\"ValidTime\" value=\"2099-12-31T23:59\" style=\"margin-top:5px; margin-left:20px; width:355px\"></br>"
          +"信件類型<input type=\"text\" name=\"MailType\" placeholder=\"0=公告, 10=一般補償, 11=IAP補償, 20=一般獎勵\" style=\"margin-top:5px; margin-left:50px; margin-right:20px; width:355px\">"
          +"禮包編號<input type=\"text\" name=\"GiftBoxID\" placeholder=\"禮包編號 (無請留空)\" style=\"margin-left:52px; margin-top:5px; width:355px;\">"
          // 中文
          +"信件標題<input type=\"text\" name=\"Title_CH\" placeholder=\"繁中\" maxlength=\"100\" style=\"margin-top:10px; margin-left:50px; width:842px\">"
          +"<div style=\"float:left; margin-top:10px\">信件內容</div><textarea name=\"Content_CH\" placeholder=\"繁中\" maxlength=\"500\" style=\"margin-top:5px; margin-left:50px; width:842px; height:200px\"></textarea>"
          // 英文
          +"信件標題<input type=\"text\" name=\"Title_EN\" placeholder=\"英文\" maxlength=\"100\" style=\"margin-top:10px; margin-left:50px; width:842px\">"
          +"<div style=\"float:left; margin-top:10px\">信件內容</div><textarea name=\"Content_EN\" placeholder=\"英文\" maxlength=\"500\" style=\"margin-top:5px; margin-left:50px; width:842px; height:200px\"></textarea>"
          // 越南
          +"信件標題<input type=\"text\" name=\"Title_VI\" placeholder=\"越南語\" maxlength=\"100\" style=\"margin-top:10px; margin-left:50px; width:842px\">"
          +"<div style=\"float:left; margin-top:10px\">信件內容</div><textarea name=\"Content_VI\" placeholder=\"越南語\" maxlength=\"500\" style=\"margin-top:5px; margin-left:50px; width:842px; height:200px\"></textarea>"
          +"<div style=\"float:left; margin-top:10px\">信件備註</div><textarea name=\"Comment\" placeholder=\"\" maxlength=\"500\" style=\"margin-top:5px; margin-left:50px; width:842px; height:150px\"></textarea>"
          +"<input type=\"reset\" value=\"重置\" style=\"margin-left:110px; margin-top: 10px; width:100px\">"
          +"<input type=\"submit\" name=\"submit\" value=\"確認發送\" style=\"margin-left:642px; width:100px; background:#FFFACD\">"
          +"</div>"
          +"</form>";
   document.all["insertform"].insertAdjacentHTML("BeforeEnd",str);
}

function delLast(){
    if(document.all["inputfield"])
    {
        eval("document.all[\"inputfield\"]").outerHTML = "";
    }
}
</script>