<?php echo $header; ?>

<header class="wrap">
<form action="<?php echo Uri::to('admin/roleitem/actionquery'); ?>" method="POST" align="start" style="margin-top:20px">
尋找 RoleItem:<br />
開始日期:
<input type="datetime-local" name="starttime" min="2018-01-01T00:00" max="2099-12-31T23:59" placeholder="Start Time" style="margin-top:10px; margin-left:5px; margin-right: 20px">
結束日期:
<input type="datetime-local" name="endtime" min="2018-01-01T00:00" max="2099-12-31T23:59" placeholder="Start Time" style="margin-top:10px; margin-left:5px">
<br />
<input type="text" name="tmpid" placeholder="TmpID" style="margin-top:10px">
<input type="text" name="eventtype" placeholder="Event Type" style="margin-top:10px; margin-left: 30px">
</br>

<input type="submit" name="submit" value="Query"  style="margin-top:10px">
<input type="reset" value="Reset" style="margin-left: 10px">
</form>
</body>
</html>
</header>

<?php echo $footer; ?>
