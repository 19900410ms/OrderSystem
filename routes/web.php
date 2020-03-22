<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::group(['prefix' => 'menus' ,'middleware' => 'auth'], function() {
    Route::get('index', 'MenuController@index')->name('menus.index');
    Route::get('create', 'MenuController@create')->name('menus.create');
    Route::post('store', 'MenuController@store')->name('menus.store');
    Route::get('show/{id}', 'MenuController@show')->name('menus.show');
    Route::get('edit/{id}', 'MenuController@edit')->name('menus.edit');
    Route::post('update/{id}', 'MenuController@update')->name('menus.update');
    Route::delete('destroy/{id}', 'MenuController@destroy')->name('menus.destroy');
});