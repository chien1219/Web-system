<?php echo $header; ?>

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

    <select name="db" style="margin-top: 10px" onchange="location.reload()">
        <option value="">資料庫</option>
        <option value="<?php \System\database::$db = 'gamedb'; echo \System\database::$db;?>">GameDB</option>
        <option value="<?php \System\database::$db = 'logdb'; echo \System\database::$db;?>">LogDB</option>
    </select>
    
  </section>

<?php echo $footer; ?>
