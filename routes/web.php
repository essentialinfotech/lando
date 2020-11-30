<?php

use Illuminate\Support\Facades\Route;


//Route for fronpage
Route::get('/','FrontController@index')->name('Front.index');


//Route for Admin view
Route::get('/admin','AdminController@index')->name('admin.index');

//Route for Logo
Route::get('/admin/logo','LogoController@index')->name('admin.logo');
Route::post('/admin/logo/store','LogoController@store')->name('logo.store');
Route::get('/admin/logo/destroy/{id}','LogoController@destroy')->name('logo.destroy');
Route::post('/admin/logo/update/{id}','LogoController@update')->name('logo.update');

//Route for Menu
Route::get('/admin/menu','MenuController@index')->name('admin.menu');
Route::post('/admin/menu/store','MenuController@store')->name('menu.store');
Route::get('/admin/menu/destroy/{id}','MenuController@destroy')->name('menu.destroy');
Route::post('/admin/menu/update/{id}','MenuController@update')->name('menu.update');

//Route for First Section
Route::get('/admin/section1','BodyController@index')->name('admin.body');
Route::post('/admin/section1/store','BodyController@store')->name('section1.store');
Route::get('/admin/section1/destroy/{id}','BodyController@destroy')->name('section1.destroy');
Route::post('/admin/section1/update/{id}','BodyController@update')->name('section1.update');
Route::post('/admin/section1/useremail','AdminController@store')->name('email.store');