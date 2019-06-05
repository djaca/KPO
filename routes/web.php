<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('taxpayers', 'TaxpayersController')->except(['show']);
