<?php echo $header; ?>
<?php
require(APP . 'config/vevedbconfig.php');
$createroletimebegin = $_POST['CreateRoleTime_Begin'] == '' ? '2000-01-01 00:00:00' : $_POST['CreateRoleTime_Begin'];
$createroletimeend = $_POST['CreateRoleTime_End'] == '' ? '2099-12-31 23:59:59' : $_POST['CreateRoleTime_End'];
$maildbid = $_POST['MailDBID'];
$sendtime = $_POST['SendTime'] == '' ? '2099-12-31 23:59:59' : $_POST['SendTime'];
$validtime = $_POST['ValidTime'] == '' ? '2099-12-31 23:59:59' : $_POST['ValidTime'];
$mailtype = $_POST['MailType'];
$giftboxid = $_POST['GiftBoxID'] == '' ? '-1' : $_POST['GiftBoxID'];
$titleCH = $_POST['Title_CH'];
$contentCH = $_POST['Content_CH'];
$titleEN = $_POST['Title_EN'];
$contentEN = $_POST['Content_EN'];
$titleVI = $_POST['Title_VI'];
$contentVI = $_POST['Content_VI'];

$comment = $_POST['Comment'];
date_default_timezone_set("Asia/Taipei");
$inserttime = date('Y-m-d H:i:s');

// Connect
$con = mysqli_connect($db_host, $db_user, $db_pass);
mysqli_select_db($con, $db_name);
mysqli_query($con, "SET NAMES utf8");

$query = "Insert Into _sys_sendmail_global (CreateRoleTime_Begin, CreateRoleTime_End, MailDBID, MailType, SendTime,ValidTime,Title_CH,Content_CH, Title_EN ,Content_EN, Title_VI,Content_VI, GiftBoxID)"
        . "Values('$createroletimebegin', '$createroletimeend', $maildbid, $mailtype, '$sendtime', '$validtime', '$titleCH', '$contentCH', '$titleEN', '$contentEN', '$titleVI', '$contentVI', $giftboxid)";

$result = mysqli_query($con, $query)
    or die ('Error in send mail');

$query = "Insert Into _sys_sendmaillog_global (CreateRoleTime_Begin, CreateRoleTime_End, MailDBID, MailType, SendTime,ValidTime,Title_CH,Content_CH, Title_EN ,Content_EN, Title_VI,Content_VI, GiftBoxID, InsertTime, Comment) "
        . "Values('$createroletimebegin', '$createroletimeend', $maildbid, $mailtype, '$sendtime', '$validtime', '$titleCH', '$contentCH', '$titleEN', '$contentEN', '$titleVI', '$contentVI', $giftboxid, '$inserttime', '$comment')";

$result = mysqli_query($con, $query)
    or die ('Error in log mail');


echo "<script>alert('寄件成功!');</script>";
echo '<script>history.go(-1); location.reload()</script>';
?>
<?php echo $footer; ?>