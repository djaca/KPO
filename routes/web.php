<?php

Route::group(['middleware' => 'taxpayer'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('items', 'ItemsController')->except(['index', 'show']);

});

Route::resource('taxpayers', 'TaxpayersController')->except(['show']);
