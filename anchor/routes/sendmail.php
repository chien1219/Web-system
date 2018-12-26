<?php

Route::collection(['before' => 'auth,install_exists'], function () {

    Route::post('admin/sendmail/actionpersonal', function ($id = 1) {

        $vars['token'] = Csrf::token();
       
        return View::create('sendmail/actionpersonal', $vars)
                   ->partial('header', 'partials/header')
                   ->partial('footer', 'partials/footer');
    });

    Route::post('admin/sendmail/actionglobal', function ($id = 1) {

        $vars['token'] = Csrf::token();
       
        return View::create('sendmail/actionglobal', $vars)
                   ->partial('header', 'partials/header')
                   ->partial('footer', 'partials/footer');
    });

});
