<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo __('global.manage'); ?><?php echo Config::meta('sitename'); ?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo asset('anchor/views/assets/img/V.png'); ?>"/>

    <script src="<?php echo asset('anchor/views/assets/js/zepto.js'); ?>"></script>

    <link rel="stylesheet" href="<?php echo asset('anchor/views/assets/css/admin.min.css'); ?>">

    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=600">
  </head>
  <body class="<?php echo Auth::guest() ? 'login' : 'admin'; ?> <?php echo str_replace('_', '-',
      Config::app('language')); ?>">

      <?php echo Notify::read(); ?>

    <header class="top">
      <div class="wrap">
          <?php if (Auth::user()): ?>
            <nav>
              <ul>
                <li class="logo">
                    <?php
                    $page = in_array(Config::meta('dashboard_page'), ['panel', 'pages', 'posts'])
                        ? Config::meta('dashboard_page') : 'panel';
                    ?>
                  <a href="<?php echo Uri::to('admin/' . $page); ?>">VEVE Query</a>
                </li>

                  <?php
                  $table = Base::table('users');
                  $id = auth::get_id();
                  
                  $sql = "SELECT `function` FROM $table WHERE `id` = '$id'";
                  $function = DB::ask_result($sql, 'function');
                  
                  if ($function == 'sendmail')
                  {
                      $menu = ['MailLog', 'SendMail', 'Users'];
                  }
                  else
                  {
                      $sql = "SELECT `db` FROM $table WHERE `id` = '$id'";
                      $db = DB::ask_result($sql, 'db');
                  
                      if ($db == 'gamedb')
                      {
                          $menu = ['Roledata', 'GoddessData', 'Imagedata', 'CombatThemeScore', 'SystemInfo', 'Users'];
                      }
                      else if($db == 'logdb')
                      {
                          $menu = ['Revenge', 'RoleItem', 'RoleItemMallMoney', 'Users'];
                      }
                       else if($db == 'accountdb')
                      {
                          $menu = ['PlayerInfo'];
                      }
                  }                  
                  
                  ?>
                  <?php foreach ($menu as $url): ?>
                    <li <?php if (strpos(Uri::current(), $url) !== false) {
                        echo 'class="active"';
                    } ?>>
                        <a href="<?php echo Uri::to('admin/' . strtolower($url)); ?>">
                          <?php echo $url; ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
              </ul>
            </nav>

              <?php echo Html::link('admin/logout', __('global.logout'), ['class' => 'btn']); ?>

              <?php $home = Registry::get('home_page'); ?>

          <?php else: ?>
            <aside class="logo">
              <a href="<?php echo Uri::to('admin/login'); ?>">Veve DB</a>
            </aside>
          <?php endif; ?>
      </div>
    </header>
