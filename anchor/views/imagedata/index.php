<?php echo $header; ?>

<header class="wrap">
<form action="<?php echo Uri::to('admin/imagedata/actionquery'); ?>" method="POST" align="start" style="margin-top:20px">
尋找 ImageData:<br />
<input type="text" name="imageDBID" placeholder="ImageDBID" style="margin-top:5px">
<input type="text" name="imagePubID" placeholder="Image PublicID" style="margin-top:5px; margin-left: 15px">
<input type="text" name="goddessDBID" placeholder="GoddessDBID" style="margin-top:5px; margin-left: 15px">
<br />
開始日期:
<input type="datetime-local" name="starttime" min="2018-01-01T00:00" max="2099-12-31T23:59" placeholder="Start Time" style="margin-top:10px; margin-left:5px; margin-right: 20px">
結束日期:
<input type="datetime-local" name="endtime" min="2018-01-01T00:00" max="2099-12-31T23:59" placeholder="Start Time" style="margin-top:10px; margin-left:5px">
<br />
<input type="submit" name="submit" value="Query"  style="margin-top:20px">
<input type="reset" value="Reset" style="margin-left: 10px">
</form>
</body>
</html>
</header>

<?php echo $footer; ?>
