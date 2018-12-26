<?php echo $header; ?>
<?php
require(APP . 'config/vevedbconfig.php');
$roledbidpost = $_POST['RoleDBID'];
$mailtype = $_POST['MailType'];
$sendtime = $_POST['SendTime'];
$validtime = $_POST['ValidTime'];
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

$sendtime = new DateTime($sendtime);
$sendtime = $sendtime->format('Y-m-d H:i:s');
$validtime = new DateTime($validtime);
$validtime = $validtime->format('Y-m-d H:i:s');
// Connect
$con = mysqli_connect($db_host, $db_user, $db_pass);
mysqli_select_db($con, $db_name);
mysqli_query($con, "SET NAMES utf8");
  
$roledbids = explode(" ", $roledbidpost);
foreach($roledbids as $roledbid)
{    
    //(RoleDBID,WorldID,MailType,SendTime,ValidTime,Title_CH,Title_EN,Content_CH,Content_EN,GiftBoxID)
    $query = "Insert Into _sys_sendmail_personal (RoleDBID,WorldID,MailType,SendTime,ValidTime,Title_CH,Content_CH, Title_EN ,Content_EN, Title_VI,Content_VI, GiftBoxID) "
        . "Values($roledbid, 1, $mailtype, '$sendtime', '$validtime', '$titleCH', '$contentCH', '$titleEN', '$contentEN', '$titleVI', '$contentVI', $giftboxid)";

    $result = mysqli_query($con, $query)
        or die ('Error in send mail');
    
    // 紀錄MailDBID並存入logDB以維持一致
    $query = "SELECT MailDBID FROM _sys_sendmail_personal ORDER BY MailDBID DESC LIMIT 1";
    $result = mysqli_query($con, $query)
        or die ('Error in get MailDBID return');
    $row = mysqli_fetch_row($result);

    $query = "Insert Into _sys_sendmaillog_personal (MailDBID, RoleDBID,WorldID,MailType,SendTime,ValidTime,Title_CH,Content_CH, Title_EN ,Content_EN, Title_VI,Content_VI, GiftBoxID, Comment, InsertTime) "
        . "Values($row[0], $roledbid, 1, $mailtype, '$sendtime', '$validtime', '$titleCH', '$contentCH', '$titleEN', '$contentEN', '$titleVI', '$contentVI', $giftboxid, '$comment', '$inserttime')";

    $result = mysqli_query($con, $query)
        or die ('Error in log mail');
}

echo "<script>alert('寄件成功!');</script>";
echo '<script>history.go(-1); location.reload()</script>';
?>
<?php echo $footer; ?>