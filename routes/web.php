<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('taxpayers', 'TaxpayersController')->except(['show']);

Route::resource('items', 'ItemsController')->except(['index', 'show'])->middleware('taxpayer');
