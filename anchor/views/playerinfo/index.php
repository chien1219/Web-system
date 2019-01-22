<?php echo $header; ?>

<header class="wrap">
<form action="<?php echo Uri::to('admin/playerinfo/actionquery'); ?>" method="POST" align="start" style="margin-top:20px">
尋找帳號資料:<br />
<input type="text" name="accountDBID" placeholder="AccountDBID" style="margin-top:5px">
<input type="text" name="accountName" placeholder="AccountName" style="margin-top:5px; margin-left: 10px">
<input type="text" name="supportCode" placeholder="SupportCode" style="margin-top:5px; margin-left: 10px">
<br />
<input type="submit" name="submit" value="Query"  style="margin-top:10px">
<input type="reset" value="Reset" style="margin-left: 10px">
</form>
</body>
</html>
</header>

<?php echo $footer; ?>
