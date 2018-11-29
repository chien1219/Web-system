<?php echo $header;?>

  <section class="wrap">
    <h1><?php echo __('VEVE Database Query System', 'Welcome'); ?></h1>
    </br>
    <p><?php echo __('查詢時間的輸入格式 :&emsp;<font color="blue">20180101</font>',
            'message'); ?></p>
    <p><?php echo __('若要查詢所有資料，在條件位留空。',
            'message'); ?></p>
    <br/>
    <p><?php echo __('選擇欲查詢之資料庫: ',
            'database'); ?></p>

    <form action="<?php echo Uri::to('admin/panel_update'); ?>" method="POST">
    <select name="db" style="margin-top: 10px" onchange="">
        <option value="gamedb">GameDB</option>
        <option value="logdb">LogDB</option>
    </select>
        <input type="submit" name="submit" style="margin-top: 10px; margin-left: 20px;"/>
    </form>
    
  </section>

<?php echo $footer; ?>
