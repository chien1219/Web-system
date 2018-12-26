<?php echo $header; ?>

<header class="wrap">
<form action="<?php echo Uri::to('admin/maillog/actionquery'); ?>" method="POST" align="start" style="margin-top:20px">
信件紀錄查詢:<br />
<input type="submit" value="個人信件" name="personal"  style="margin-top:10px">
<input type="submit" value="全域信件" name="global" style="margin-left: 10px">
</form>
</header>

<?php echo $footer; ?>
