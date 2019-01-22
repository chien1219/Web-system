<?php echo $header; ?>
<?php
require(APP . 'config/vevedbconfig.php');
$accountDBID = $_POST['accountDBID'];
$accountName = $_POST['accountName'];
$supportCode = $_POST['supportCode'];

// Connect
$con = mysqli_connect($db_host, $db_user, $db_pass);
mysqli_select_db($con, $db_name);
 mysqli_query($con, "set character set 'utf8mb4'");
 
    $query = "SELECT * FROM $db_name.player_info_new WHERE 1=1";
    $query = $accountDBID == '' ? $query : $query . " and AccountDBID = $accountDBID";
    $query = $accountName == '' ? $query : $query . " and AccountName = '$accountName'";
    $query = $supportCode == '' ? $query : $query . " and SupportCode = '$supportCode'";   
        
    $result = mysqli_query($con, $query)
        or die ('Error in query');
	if(mysqli_num_rows($result)) {
		echo '<table cellpadding="15" cellspacing="0" class="db-table" border="1">';
		echo '<tr align="left"><th>AccountDBID</th><th>AccountName</th><th>OpenIDType</th><th>OpenID</th>'
                . '<th>SupportCode</th><th>Password</th><th>WorldID</th><th>AccountType</th>'
                . '<th>State</th><th>LoginState</th><th>Point</th><th>PointSum</th><th>GameServerID</th></tr>';
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
            echo 'No Data!';
        }
?>
<?php echo $footer; ?>