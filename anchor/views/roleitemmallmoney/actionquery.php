<?php echo $header; ?>
<?php
require(APP . 'config/vevedbconfig.php');
$query = $_POST['query'];
$starttime = $_POST['starttime'] == '' ? '2018-1-1' : $_POST['starttime'];
$endtime = $_POST['endtime'] == '' ? date('Y-m-d') : $_POST['endtime'];

// Connect
$con = mysqli_connect($db_host, $db_user, $db_pass);
mysqli_select_db($con, $db_name);
 mysqli_query($con, "set character set 'utf8'");//utf-8 讀中文
 
    $query = $query == '' 
            ? "SELECT * FROM $db_name.role_itemmallmoney WHERE `EventTime` BETWEEN '$starttime' and '$endtime'" 
            : "SELECT * FROM $db_name.role_itemmallmoney WHERE roleDBID = '$query' and `EventTime` BETWEEN '$starttime' and '$endtime'";
        
    $result = mysqli_query($con, $query)
        or die ('Error in query');
	if(mysqli_num_rows($result)) {
		echo '<table cellpadding="15" cellspacing="0" class="db-table" border="1">';
		echo '<tr align="left"><th>WorldID</th><th>RoleDBID</th><th style="min-width:150px">RoleName</th><th>AccountDBID</th><th>AccountName</th><th style="min-width:180px">EventTime</th><th>EventType</th>'
                . '<th style="min-width:150px">EventName</th><th>FromID</th><th>RelateID</th><th>AddValue</th><th>FinalValueP</th><th>FinalValueG</th></tr>';
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