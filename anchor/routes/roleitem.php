<?php
Route::collection(['before' => 'auth,install_exists'], function () {
    /**
     * List query
     */
    Route::post('admin/roleitem/actionquery', function ($id = 1) {

        $vars['token'] = Csrf::token();
       
        return View::create('roleitem/actionquery', $vars)
                   ->partial('header', 'partials/header')
                   ->partial('footer', 'partials/footer');
    });

});
