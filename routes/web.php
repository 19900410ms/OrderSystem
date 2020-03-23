<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::group(['prefix' => 'menu' ,'middleware' => 'auth'], function() {
    Route::get('index', 'MenuController@index')->name('menu.index');
    Route::get('create', 'MenuController@create')->name('menu.create');
    Route::post('store', 'MenuController@store')->name('menu.store');
    Route::get('show/{id}', 'MenuController@show')->name('menu.show');
    Route::get('edit/{id}', 'MenuController@edit')->name('menu.edit');
    Route::post('update/{id}', 'MenuController@update')->name('menu.update');
    Route::post('destroy/{id}', 'MenuController@destroy')->name('menu.destroy');
});

Route::group(['prefix' => 'order' ,'middleware' => 'auth'], function() {
    Route::get('index', 'OrderController@index')->name('order.index');
    Route::get('create', 'OrderController@create')->name('order.create');
    Route::post('store', 'OrderController@store')->name('order.store');
    Route::get('show/{id}', 'OrderController@show')->name('order.show');
    Route::get('edit/{id}', 'OrderController@edit')->name('order.edit');
    Route::post('update/{id}', 'OrderController@update')->name('order.update');
    Route::post('destroy/{id}', 'OrderController@destroy')->name('order.destroy');
});