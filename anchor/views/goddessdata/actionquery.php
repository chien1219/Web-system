<?php echo $header; ?>
<?php
require(APP . 'config/vevedbconfig.php');
$query = $_POST['query'];

// Connect
$con = mysqli_connect($db_host, $db_user, $db_pass);
mysqli_select_db($con, $db_name);
 mysqli_query($con, "set character set 'utf8'");//utf-8 讀中文
 
if ($query == '')
{
    $query = "SELECT * FROM $db_name._sys_goddess";
}
else
{
    $query = "SELECT * FROM $db_name._sys_goddess WHERE GoddessDBID = '$query'";
}
 
    $result = mysqli_query($con, $query)
        or die ('Error in query');

	if(mysqli_num_rows($result)) {
		echo '<table cellpadding="10" cellspacing="0" class="db-table" >';
		echo '<tr align="left"><th>GoddessDBID</th><th>GoddessName</th><th>RoleName</th><th>AccountType</th><th>AccountDBID</th><th>AccountName<th>OpenIDType</th><th>OpenID</th>'
                . '<th>CreatTime</th><th>LastLoginTime</th><th>LastLogoutTime</th><th>LastDailyResetTime</th><th>EpCD</th><th>OptionFlag</th><th>ItemMallPointP</th>'
                        . '<th>ItemMallPoingPSum</th><th>ItemMallPointG</th><th>ItemMallPointGSum</th><th>Gold</th><th>GameLv</th><th>GameExp</th><th>GoddessDBID</th><th>Ep</th>'
                        . '<th>GuardGoddessDBID_1</th><th>GuardGoddessDBID_2</th><th>GuardGoddessDBID_3</th><th>ImagePublicID_1</th><th>ImagePublicID_2</th>'
                        . '<th>ImagePublicID_3</th><th>ImagePublicID_4</th><th>ImagePublicID_5</th>'
                        . '<th>LanguageType</th><th>Platform</th><th>UserGuideFlag1</th><th>UserGuideFlag2</th></tr>';
		while($row2 = mysqli_fetch_row($result)) {
			echo '<tr>';
			foreach($row2 as $key=>$value) {
				echo '<td>',$value,'</td>';
			}
			echo '</tr>';
		}
		echo '</table><br />';
	}
    
?>
<?php echo $footer; ?>