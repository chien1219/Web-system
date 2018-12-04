<?php echo $header; ?>

<header class="wrap">
<form action="<?php echo Uri::to('admin/goddessdata/actionquery'); ?>" method="POST" align="start" style="margin-top:20px">
尋找 GoddessData:<br />
<input type="text" name="query" placeholder="GoddessDBID" style="margin-top:5px">
<br />
<input type="submit" name="submit" value="Query"  style="margin-top:10px">
<input type="reset" value="Reset" style="margin-left: 10px">
</form>
</body>
</html>
</header>

<?php echo $footer; ?>
