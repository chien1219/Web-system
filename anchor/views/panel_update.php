<?php
    $db = empty($_POST['db']) ? '' : $_POST['db'];
    $server = empty($_POST['server']) ? '': $_POST['server'];
    $table = Base::table('users');
    $id = auth::get_id();
    
    if ($db != '')
    {
        $sql = "UPDATE $table SET `db` = '$db' WHERE `id` = '$id'";
    }
    if ($server != '')
    {
        $sql = "UPDATE $table SET `server` = '$server' WHERE `id` = '$id'";
    }

    DB::ask($sql);
         
    echo '<script>history.go(-1); location.reload()</script>';
    ?>
    