<?php echo $header; ?>

<header class="wrap">
<form action="<?php echo Uri::to('admin/combatthemescore/actionquery'); ?>" method="POST" align="start" style="margin-top:20px">
尋找 CombatThemeScore:<br />
<input type="text" name="combatthemeDBID" placeholder="CombatThemeDBID" style="margin-top:5px">
<input type="text" name="goddessDBID" placeholder="GoddessDBID" style="margin-top:5px; margin-left: 10px">
<br />
<input type="submit" name="submit" value="Query"  style="margin-top:10px">
<input type="reset" value="Reset" style="margin-left: 10px">
</form>
</body>
</html>
</header>

<?php echo $footer; ?>
