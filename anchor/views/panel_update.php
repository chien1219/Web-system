<?php
    $db = $_POST['db'];
    $table = Base::table('users');
    $id = auth::get_id();
    $sql = "UPDATE $table SET `db` = '$db' WHERE `id` = '$id'";
    DB::ask($sql);
         
    echo '<script>history.go(-1); location.reload()</script>';
    ?>
    