<?php

Route::collection(['before' => 'auth,install_exists'], function () {
    /**
     * List query
     */
    Route::post('admin/roleitemmallmoney/actionquery', function ($id = 1) {

        $vars['token'] = Csrf::token();
       
        return View::create('roleitemmallmoney/actionquery', $vars)
                   ->partial('header', 'partials/header')
                   ->partial('footer', 'partials/footer');
    });

});
