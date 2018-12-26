<?php

use System\autoloader;
use System\config;

/*
 * Set your applications current timezone
 */
date_default_timezone_set(Config::app('timezone', 'UTC'));

/*
 * Define the application error reporting level based on your environment
 */
switch (constant('ENV')) {
    case 'dev':
    case 'development':
    case 'local':
    case 'localhost':
        ini_set('display_errors', true);
        error_reporting(-1);
        break;

    default:
        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
}

/*
 * Set autoload directories to include your app models and libraries
 */
Autoloader::directory([
    APP . 'models',
    APP . 'libraries'
]);

/**
 * Helpers
 */
/** @noinspection PhpIncludeInspection */
require APP . 'helpers' . EXT;

/**
 * Anchor setup
 */
try {
    Anchor::setup();
} catch (Exception $e) {
    if (ini_get('display_errors') != "1") {
        echo "<h1>Something went wrong, please notify the owner of the site</h1>";
    } else {
        Errors::exception($e);
    }

    Errors::log($e);
    die();
}

/**
 * Import defined routes
 */
if (is_admin()) {
    // Set posts per page for admin
    Config::set('admin.posts_per_page', 6);

    require APP . 'routes/admin' . EXT;
    require APP . 'routes/panel' . EXT;
    require APP . 'routes/users' . EXT;
    require APP . 'routes/roledata' . EXT;
    require APP . 'routes/goddessdata' . EXT;
    require APP . 'routes/imagedata' . EXT;
    require APP . 'routes/combatthemescore' . EXT;
    require APP . 'routes/systeminfo' . EXT;
    require APP . 'routes/revenge' . EXT;
    require APP . 'routes/roleitem' . EXT;
    require APP . 'routes/roleitemmallmoney' . EXT;
    require APP . 'routes/maillog' . EXT;
    require APP . 'routes/sendmail' . EXT;
            
} else {
    require APP . 'routes/site' . EXT;
}
