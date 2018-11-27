<?php echo $header; ?>

<header class="wrap">
<form action="<?php echo Uri::to('admin/imagedata/actionquery'); ?>" method="POST" align="start" style="margin-top:20px">
尋找 ImageData:<br />
<input type="text" name="imageDBID" placeholder="ImageDBID" style="margin-top:5px">
<input type="text" name="imagePubID" placeholder="Image PublicID" style="margin-top:5px; margin-left: 10px">
<input type="text" name="goddessDBID" placeholder="GoddessDBID" style="margin-top:5px; margin-left: 10px">
<br />
<input type="text" name="starttime" placeholder="Start Time" style="margin-top:20px;">
<input type="text" name="endtime" placeholder="End Time" style="margin-top:20px; margin-left: 10px">
<br />
<input type="submit" name="submit" value="Query"  style="margin-top:10px">
</form>
</body>
</html>
</header>

<?php echo $footer; ?>
