<?php echo $header; ?>
<?php
require(APP . 'config/vevedbconfig.php');
$isPersonal = empty($_POST['personal']) ? false : true;

// Connect
$con = mysqli_connect($db_host, $db_user, $db_pass);
mysqli_select_db($con, $db_name);
mysqli_query($con, "set character set 'utf8mb4'");

if ($isPersonal)
{
    $query = "SELECT InsertTime, Comment, RoleDBID, WorldID, MailDBID, MailType, SendTime, ValidTime, Title_CH, Content_CH, Title_EN, Content_EN, Title_VI, Content_VI, GiftBoxID, MoneyType, MoneyCount from _sys_sendmaillog_personal";
}
else
{
    $query = "SELECT InsertTime, Comment, WorldID, CreateRoleTime_Begin, CreateRoleTime_End, MailDBID, MailType, SendTime, ValidTime, Title_CH, Content_CH, Title_EN, Content_EN, Title_VI, Content_VI, GiftBoxID, MoneyType, MoneyCount from _sys_sendmaillog_global";
}

$result = mysqli_query($con, $query)
    or die ('Error in query');

if ($isPersonal)
{
    if(mysqli_num_rows($result)) {
		echo '<table cellpadding="15" cellspacing="0" class="db-table" border="1">';
		echo '<tr align="left"><th style="min-width:150px">新增時間</th><th>備註</th><th>RoleDBID</th><th style="min-width:100px">世界編號</th><th style="min-width:100px">信件編號</th><th style="min-width:100px">信件類型</th>'
                . '<th style="min-width:150px">有效開始日期</th><th style="min-width:150px">有效結束日期</th><th style="min-width:150px">標題(繁中)</th><th style="min-width:200px">內文(繁中)</th>'
                . '<th style="min-width:150px">標題(英)</th><th style="min-width:200px">內文(英)</th><th style="min-width:150px">標題(越)</th><th style="min-width:200px">內文(越)</th>'
                . '<th style="min-width:100px">禮包編號</th><th style="min-width:100px">貨幣類型</th><th style="min-width:100px">貨幣數量</th></tr>';
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
}
else
{
    if(mysqli_num_rows($result)) {
		echo '<table cellpadding="15" cellspacing="0" class="db-table" border="1">';
		echo '<tr align="left"><th style="min-width:150px">新增時間</th><th style="min-width:100px">備註</th><th style="min-width:100px">世界編號</th><th style="min-width:150px">創角起始日期</th><th style="min-width:150px">創角結束日期</th>'
                . '<th style="min-width:100px">信件編號</th><th style="min-width:100px">信件類型</th><th style="min-width:150px">有效開始日期</th><th style="min-width:150px">有效結束日期</th>'
                . '<th style="min-width:150px">標題(繁中)</th><th style="min-width:200px">內文(繁中)</th><th style="min-width:150px">標題(英)</th><th style="min-width:200px">內文(英)</th><th style="min-width:150px">標題(越)</th><th style="min-width:200px">內文(越)</th>'
                . '<th style="min-width:100px">禮包編號</th><th style="min-width:100px">貨幣類型</th><th style="min-width:100px">貨幣數量</th></tr>';
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
}
	
?>
<?php echo $footer; ?>