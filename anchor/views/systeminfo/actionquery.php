<?php echo $header; ?>
<?php
require(APP . 'config/vevedbconfig.php');

// Connect
$con = mysqli_connect($db_host, $db_user, $db_pass);
mysqli_select_db($con, $db_name);
 mysqli_query($con, "set character set 'utf8mb4'");//utf-8 讀中文
 
    $query = "SELECT * FROM $db_name._sys_systeminfo";
    
    $result = mysqli_query($con, $query)
        or die ('Error in query');

	if(mysqli_num_rows($result)) {
		echo '<table cellpadding="15" cellspacing="0" class="db-table" border="1">';
		echo '<tr align="left"><th>CombatThemeDBID</th><th>CombatThemeTmpDBID</th><th>CombatThemeStartTime</th><th>CombatRevengeDBID</th></tr>';
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