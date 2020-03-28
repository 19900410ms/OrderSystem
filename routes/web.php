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
    Route::get('/category/meat', 'MenuController@meat')->name('menu.meat');
    Route::get('/category/fish', 'MenuController@fish')->name('menu.fish');
    Route::get('/category/salada', 'MenuController@salada')->name('menu.salada');
    Route::get('/category/drink', 'MenuController@drink')->name('menu.drink');
    Route::get('/category/sweet', 'MenuController@sweet')->name('menu.sweet');
    Route::get('/category/other', 'MenuController@other')->name('menu.other');
});

Route::group(['prefix' => 'order' ,'middleware' => 'auth'], function() {
    Route::get('index', 'OrderController@index')->name('order.index');
    Route::post('store/{menu_id}/menu', 'OrderController@store')->name('order.store');
    Route::post('update/{id}', 'OrderController@update')->name('order.update');
    Route::post('destroy/{id}', 'OrderController@destroy')->name('order.destroy');
});

Route::group(['prefix' => 'check' ,'middleware' => 'auth'], function() {
    Route::get('index', 'CheckController@index')->name('check.index');
    Route::post('store', 'CheckController@store')->name('check.store');
    Route::get('show/{id}', 'CheckController@show')->name('check.show');
    Route::post('update/{id}', 'CheckController@update')->name('check.update');
    Route::post('destroy/{id}', 'CheckController@destroy')->name('check.destroy');
});