<?php

Route::get('/', function () {
    return view('auth.login');
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
    Route::post('store/{menu_id}/menu', 'OrderController@store')->name('order.store');
    Route::post('destroy/{id}', 'OrderController@destroy')->name('order.destroy');
});