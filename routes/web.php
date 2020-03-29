<?php

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::group(['middleware' => ['auth', 'can:admin-only']], function() {
    Route::get('menu/create', 'MenuController@create')->name('menu.create');
    Route::post('menu/store', 'MenuController@store')->name('menu.store');
    Route::get('menu/edit/{id}', 'MenuController@edit')->name('menu.edit');
    Route::post('menu/update/{id}', 'MenuController@update')->name('menu.update');
    Route::post('order/update/{id}', 'OrderController@update')->name('order.update');
    Route::post('order/destroy/{id}', 'OrderController@destroy')->name('order.destroy');
    Route::post('check/update/{id}', 'CheckController@update')->name('check.update');
    Route::post('check/destroy/{id}', 'CheckController@destroy')->name('check.destroy');
    Route::get('menu/private', 'MenuController@private')->name('menu.private');
    Route::post('menu/closed/{id}', 'MenuController@closed')->name('menu.closed');
    Route::post('menu/open/{id}', 'MenuController@open')->name('menu.open');
});

Route::group(['middleware' => ['auth', 'can:user-only']], function () {
    Route::get('menu/index', 'MenuController@index')->name('menu.index');
    Route::get('menu/show/{id}', 'MenuController@show')->name('menu.show');
    Route::get('menu/category/meat', 'MenuController@meat')->name('menu.meat');
    Route::get('menu/category/fish', 'MenuController@fish')->name('menu.fish');
    Route::get('menu/category/salada', 'MenuController@salada')->name('menu.salada');
    Route::get('menu/category/drink', 'MenuController@drink')->name('menu.drink');
    Route::get('menu/category/sweet', 'MenuController@sweet')->name('menu.sweet');
    Route::get('menu/category/other', 'MenuController@other')->name('menu.other');
    Route::get('order/index', 'OrderController@index')->name('order.index');
    Route::post('order/store/{menu_id}/menu', 'OrderController@store')->name('order.store');
    Route::get('check/index', 'CheckController@index')->name('check.index');
    Route::post('check/store', 'CheckController@store')->name('check.store');
    Route::get('check/show/{id}', 'CheckController@show')->name('check.show');
});

// Route::group(['prefix' => 'menu' ,'middleware' => 'auth'], function() {
//     Route::get('index', 'MenuController@index')->name('menu.index');
//     Route::get('create', 'MenuController@create')->name('menu.create');
//     Route::post('store', 'MenuController@store')->name('menu.store');
//     Route::get('show/{id}', 'MenuController@show')->name('menu.show');
//     Route::get('edit/{id}', 'MenuController@edit')->name('menu.edit');
//     Route::post('update/{id}', 'MenuController@update')->name('menu.update');
//     Route::post('destroy/{id}', 'MenuController@destroy')->name('menu.destroy');
//     Route::get('/category/meat', 'MenuController@meat')->name('menu.meat');
//     Route::get('/category/fish', 'MenuController@fish')->name('menu.fish');
//     Route::get('/category/salada', 'MenuController@salada')->name('menu.salada');
//     Route::get('/category/drink', 'MenuController@drink')->name('menu.drink');
//     Route::get('/category/sweet', 'MenuController@sweet')->name('menu.sweet');
//     Route::get('/category/other', 'MenuController@other')->name('menu.other');
// });

// Route::group(['prefix' => 'order' ,'middleware' => 'auth'], function() {
//     Route::get('index', 'OrderController@index')->name('order.index');
//     Route::post('store/{menu_id}/menu', 'OrderController@store')->name('order.store');
//     Route::post('update/{id}', 'OrderController@update')->name('order.update');
//     Route::post('destroy/{id}', 'OrderController@destroy')->name('order.destroy');
// });

// Route::group(['prefix' => 'check' ,'middleware' => 'auth'], function() {
//     Route::get('index', 'CheckController@index')->name('check.index');
//     Route::post('store', 'CheckController@store')->name('check.store');
//     Route::get('show/{id}', 'CheckController@show')->name('check.show');
//     Route::post('update/{id}', 'CheckController@update')->name('check.update');
//     Route::post('destroy/{id}', 'CheckController@destroy')->name('check.destroy');
// });