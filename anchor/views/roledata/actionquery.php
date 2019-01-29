<?php echo $header; ?>
<?php
require(APP . 'config/vevedbconfig.php');
$query = $_POST['query'];
$starttime = $_POST['starttime'] == '' ? '2018-1-1' : $_POST['starttime'];
$endtime = $_POST['endtime'] == '' ? date('Y-m-d') : $_POST['endtime'];

// ¿é¥X¬°Excel«ö¶s
echo '<button id="btnExport" onclick="fnExcelReport();"> EXPORT </button>';

// Connect
$con = mysqli_connect($db_host, $db_user, $db_pass);
mysqli_select_db($con, $db_name);
 mysqli_query($con, "set character set 'utf8mb4'");
 
    $query = $query == '' 
            ? "SELECT * FROM rs_roledata, rs_roledataex WHERE rs_roledata.roleDBID = rs_roledataex.roleDBID and `CreateTime` BETWEEN '$starttime' and '$endtime'" 
            : "SELECT * FROM rs_roledata, rs_roledataex WHERE rs_roledata.roleDBID = '$query' and rs_roledataex.roleDBID = '$query' and `CreateTime` BETWEEN '$starttime' and '$endtime'";
        
    $result = mysqli_query($con, $query)
        or die ('Error in query');
	if(mysqli_num_rows($result)) {
		echo '<table cellpadding="15" cellspacing="0" class="db-table" border="1" id="queryTable">';
		echo '<tr align="left"><th>WorldID</th><th>RoleDBID</th><th>RoleName</th><th>AccountType</th><th>AccountDBID</th><th>AccountName</th><th>OpenIDType</th><th>OpenID</th>'
                . '<th>CreateTime</th><th>LastLoginTime</th><th>LastLogoutTime</th><th>LastDailyResetTime</th><th>EpCoolDown</th><th>OptionFlag</th><th>ItemMallPointP</th>'
                        . '<th>ItemMallPoingPSum</th><th>ItemMallPointG</th><th>ItemMallPointGSum</th><th>Gold</th><th>GameLv</th><th>GameExp</th><th>GoddessDBID</th><th>Ep</th>'
                        . '<th>GuardGoddessDBID_1</th><th>GuardGoddessDBID_2</th><th>GuardGoddessDBID_3</th><th>ImagePublicID_1</th><th>ImagePublicID_2</th>'
                        . '<th>ImagePublicID_3</th><th>ImagePublicID_4</th><th>ImagePublicID_5</th>'
                        . '<th>LanguageType</th><th>Platform</th><th>UserGuideFlag1</th><th>UserGuideFlag2</th>'
                        // rs_roledataex
                        . '<th>RoleDBID</th><th>FcmToken_Android</th><th>FcmToken_iOS</th><th>SpaceAdd_GoddessColl</th><th>LoginBonusProgress</th>'
                        . '<th>IdentityImagePID_1</th><th>IdentityImagePID_2</th><th>IdentityImagePID_3</th>'
                        . '<th>PhoneNumber</th><th>RealName</th><th>RealIDNumber</th><th>BankCode</th><th>BankACNumber</th>'
                        . '<th>CombatThemeLastDBID</th><th>CombatThemePlayableCount</th><th>CombatThemeTicketType</th><th>CombatTopPlayableCount</th>'
                        . '<th>PromoteNewGoddessDBID</th><th>PromotePotentialGoddessDBID</th><th>PromoteHighEndGoddessDBID</th>'
                        . '<th>FcmToken</th></tr>';
		while($row2 = mysqli_fetch_row($result)) {
			echo '<tr>';
			foreach($row2 as $key=>$value) {
				echo '<td>',$value,'</td>';
			}
			echo '</tr>';
		}
		echo '</table><br />';
	}
        else{
            echo '</br> No Data!';
        }
?>
<?php echo $footer; ?>

<script lang="JavaScript">
function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('queryTable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true, "Download.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
</script>