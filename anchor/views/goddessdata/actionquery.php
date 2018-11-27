<?php echo $header; ?>
<?php
require(APP . 'config/vevedbconfig.php');
$query = $_POST['query'];

// Connect
$con = mysqli_connect($db_host, $db_user, $db_pass);
mysqli_select_db($con, $db_name);
 mysqli_query($con, "set character set 'utf8'");//utf-8 讀中文
 
$query = $query == '' ? "SELECT * FROM $db_name._sys_goddess" : "SELECT * FROM $db_name._sys_goddess WHERE GoddessDBID = '$query'";

    $result = mysqli_query($con, $query)
        or die ('Error in query');

	if(mysqli_num_rows($result)) {
		echo '<table cellpadding="15" cellspacing="0" class="db-table" border="1">';
		echo '<tr align="left">'
                . '<th>GoddessDBID</th><th>GoddessName</th><th>RoleDBID</th><th style="min-width:500px">AboutMe</th><th>Birthday</th><th>CityTmpID</th><th>CountryTmpID</th><th>MainImageDBID</th>'
                . '<th>HP</th><th>TotalFans</th><th>WeekAddFans_0</th><th>WeekAddFans_1</th><th>WeekAddFans_2</th><th>WeekAddFans_3</th><th>WeekAddFans_4</th>'
                        . '<th>WeekAddFans_5</th><th>WeekAddFans_6</th><th>GameExp</th><th>GameLv</th><th>Win</th><th>Lose</th><th>BestWin</th><th>BestWinRate</th>'
                        . '<th>BestLv</th><th>GuardRoleDBID_1</th><th>GuardRoleDBID_2</th><th>GuardRoleDBID_3</th><th>GuardAccountName_1</th>'
                        . '<th>GuardAccountName_2</th><th>GuardAccountName_3</th><th>Email</th>'
                        . '<th>CollectionCode</th><th>AdvertisingEndTime</th><th>TodayUploadImage</th><th>GoddessPoing</th><th>LastGetSelfChannelMsgDBID</th>'
                        . '<th>State</th><th>SocialMedia</th><th>LiveID</th>'
                        . '</tr>';
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
            echo '<header class="wrap" style="margin-top:20px">No Data!</header>';
        }
    
?>
<?php echo $footer; ?>