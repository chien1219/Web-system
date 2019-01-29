<?php
    $db = empty($_POST['db']) ? '' : $_POST['db'];
    $server = empty($_POST['server']) ? '': $_POST['server'];
    $function = empty($_POST['function']) ? '': $_POST['function'];
    
    /* 發信測試 */
    $to = empty($_POST['to']) ? '' : $_POST['to'];
    $subject = empty($_POST['subject']) ? '': $_POST['subject'];
    $content = empty($_POST['content']) ? '': $_POST['content'];
    $headers = "From: VeveTest@gmail.com" . "\r\n";
    if (!empty($to) && !empty($subject))
    {
        mail($to, $subject, $content, $headers);
        Notify::success(__('Email Sent Succeccfully'));
    }
    /* 發信測試 */
    
    $table = Base::table('users');
    $id = auth::get_id();
    
    if ($function != '')
    {
        $sql = "UPDATE $table SET `function` = '$function' WHERE `id` = '$id'";
    }
    if ($db != '')
    {
        $sql = "UPDATE $table SET `db` = '$db' WHERE `id` = '$id'";
    }
    if ($server != '')
    {
        $sql = "UPDATE $table SET `server` = '$server' WHERE `id` = '$id'";
    }
    
    if ($function != '' || $db != '' || $server != '')
    {
        DB::ask($sql);
    }
         
    echo '<script>history.go(-1); location.reload()</script>';