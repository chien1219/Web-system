<?php echo $header; ?>

<header class="wrap">
<form action="<?php echo Uri::to('admin/systeminfo/actionquery'); ?>" method="POST" align="start" style="margin-top:20px">
尋找 SystemInfo:<br />
<input type="submit" name="submit" value="Query"  style="margin-top:10px">
</form>
</body>
</html>
</header>

<?php echo $footer; ?>
