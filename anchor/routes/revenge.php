<?php

Route::collection(['before' => 'auth,install_exists'], function () {
    /**
     * List query
     */
    Route::post('admin/revenge/actionquery', function ($id = 1) {

        $vars['token'] = Csrf::token();
       
        return View::create('revenge/actionquery', $vars)
                   ->partial('header', 'partials/header')
                   ->partial('footer', 'partials/footer');
    });

});
