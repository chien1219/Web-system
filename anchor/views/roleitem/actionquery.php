<?php echo $header; ?>
<?php
require(APP . 'config/vevedbconfig.php');

if (empty($_POST['starttime']) && empty($_POST['endtime']))
{
    echo '<header class="wrap">請輸入日期條件</header>';
    echo '<script>setTimeout("history.go(-1); location.reload();", 500); </script>';
    return;
}
$starttime = $_POST['starttime'] == '' ? '2018-1-1' : $_POST['starttime'];
$endtime = $_POST['endtime'] == '' ? date('Y-m-d') : $_POST['endtime'];

// Connect
$con = mysqli_connect($db_host, $db_user, $db_pass);
mysqli_select_db($con, $db_name);
mysqli_query($con, "set character set 'utf8'");//utf-8 讀中文
 
    $query = "SELECT * FROM $db_name.role_item WHERE `EventTime` BETWEEN '$starttime' and '$endtime'";
        
    $result = mysqli_query($con, $query)
        or die ('Error in query');
	if(mysqli_num_rows($result)) {
		echo '<table cellpadding="15" cellspacing="0" class="db-table" border="1">';
		echo '<tr align="left"><th>WorldID</th><th>RoleDBID</th><th>RoleName</th><th>AccountDBID</th><th>AccountName</th><th style="min-width:180px">EventTime</th><th>EventType</th>'
                . '<th style="min-width:150px">EventName</th><th>FromID</th><th>RelateID</th><th>Pos</th><th>TmpID</th><th style="min-width:180px">CreateTime</th><th>Count</th></tr>';
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
            echo '<header class="wrap">No Data!</header>';
        }
?>
<?php echo $footer; ?>