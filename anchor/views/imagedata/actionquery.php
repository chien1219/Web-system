<?php echo $header; ?>
<?php
require(APP . 'config/vevedbconfig.php');
$imagedbid = $_POST['imageDBID'];
$goddessdbid = $_POST['goddessDBID'];
$imagepubid = $_POST['imagePubID'];
$starttime = $_POST['starttime'] == '' ? '2018-1-1' : $_POST['starttime'];
$endtime = $_POST['endtime'] == '' ? date('Y-m-d') : $_POST['endtime'];

// Connect
$con = mysqli_connect($db_host, $db_user, $db_pass);
mysqli_select_db($con, $db_name);
 mysqli_query($con, "set character set 'utf8mb4'");//utf-8 讀中文
 
    $query = "SELECT * FROM $db_name._sys_imagedata WHERE `CreateTime` BETWEEN '$starttime' and '$endtime'";
    $query = $imagedbid == '' ? $query : $query . " and ImageDBID = $imagedbid";
    $query = $goddessdbid == '' ? $query : $query . " and GoddessDBID = $goddessdbid";
    $query = $imagepubid == '' ? $query : $query . " and ImagePublicID = '$imagepubid'";    
    
    $result = mysqli_query($con, $query)
        or die ('Error in query');

	if(mysqli_num_rows($result)) {
		echo '<table cellpadding="15" cellspacing="0" class="db-table" border="1">';
		echo '<tr align="left"><th>ImageDBID</th><th>ImagePublicID</th><th>ImageDescription</th><th>ImageRatio</th><th>GoddessDBID</th><th style="min-width:180px">CreateTime</th>'
                        . '<th>WinCount</th><th>LostCount</th><th>TotalWinCount</th><th>TotalLostCount</th><th>Durability</th><th>CommentCount</th></tr>';
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