<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/','FontendController@index');

Route::get('/admin','AdminController@index');

//joining title slogun  
Route::get('/admin/join-title-show','JoinController@index')->name('join.index');
Route::get('/admin/join-create','JoinController@create')->name('join.create');
Route::post('/admin/join-store','JoinController@store')->name('join.store');
Route::get('/admin/join-edit/{id}','JoinController@edit')->name('join.edit');
Route::post('/admin/join-update/{id}','JoinController@update')->name('join.update');
Route::get('/admin/join-title-destroy/{id}','JoinController@destroy')->name('join.destroy');

//team title slogun

Route::get('/admin/team-title-show','TeamController@index')->name('slogun.index');
Route::get('/admin/teamtitle','TeamController@create')->name('slogun.create');
Route::post('/admin/team-store','TeamController@store')->name('slogun.store');
Route::get('/admin/team-edit/{id}','TeamController@edit')->name('slogun.edit');
Route::post('/admin/team-update/{id}','TeamController@update')->name('slogun.update');
Route::get('/admin/team-title-destroy/{id}','TeamController@destroy')->name('slogun.destroy');


//copyright
Route::get('/admin/copyright','CopyrightController@index')->name('copyright.index');
Route::get('/admin/team-copyright','CopyrightController@create')->name('copyright.create');
Route::post('/admin/copyright-store','CopyrightController@store')->name('copyright.store');
Route::get('/admin/copyright-edit/{id}','CopyrightController@edit')->name('copyright.edit');
Route::post('/admin/copyright-update/{id}','CopyrightController@update')->name('copyright.update');
Route::get('/admin/copyright-destroy/{id}','CopyrightController@destroy')->name('copyright.destroy');

//footer menu
Route::get('/admin/menu-show','MenuController@index')->name('menu.index');
Route::get('/admin/menu-create','MenuController@create')->name('menu.create');
Route::post('/admin/menu-store','MenuController@store')->name('menu.store');
Route::get('/admin/menu-edit/{id}','MenuController@edit')->name('menu.edit');
Route::post('/admin/menu-update/{id}','MenuController@update')->name('menu.update');
Route::get('/admin/menu-destroy/{id}','MenuController@destroy')->name('menu.destroy');
 
//social links
Route::get('/admin/all-social-link','SocialController@index')->name('social.index');
Route::get('/admin/social-link','SocialController@create')->name('social.create');
Route::post('/admin/social-store','SocialController@store')->name('social.store');
Route::get('/admin/social-edit/{id}','SocialController@edit')->name('social.edit');
Route::post('/admin/social-update/{id}','SocialController@update')->name('social.update');
Route::get('/admin/social-destroy/{id}','SocialController@destroy')->name('social.destroy');
 
//team members
Route::get('/admin/all-team-members','MemberController@index')->name('team.index');
Route::get('/admin/team-members','MemberController@create')->name('team.create');
Route::post('/admin/team-members-store','MemberController@store')->name('team.store');
Route::get('/admin/team-members-edit/{id}','MemberController@edit')->name('team.edit');
Route::post('/admin/team-members-update/{id}','MemberController@update')->name('team.update');
Route::get('/admin/team-members-destroy/{id}','MemberController@destroy')->name('team.destroy');
