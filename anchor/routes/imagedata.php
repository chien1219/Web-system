<?php

use System\config;
use System\database\query;
use System\input;
use System\route;
use System\view;

Route::collection(['before' => 'auth,install_exists'], function () {
    /**
     * List query
     */
    Route::post('admin/imagedata/actionquery', function ($id = 1) {

        $vars['token'] = Csrf::token();
       
        return View::create('imagedata/actionquery', $vars)
                   ->partial('header', 'partials/header')
                   ->partial('footer', 'partials/footer');
    });

});
