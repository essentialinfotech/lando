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


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home','HomeController@index');
Route::get('/','FrontendController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Add Work Section
Route::get('/addwork', 'AddWorkController@index');
Route::post('/add_work_post','AddWorkController@add_work_post');
Route::get('/work_active/{work_id}','AddWorkController@work_active');
Route::get('/view_work/{work_id}','AddWorkController@view_work');
Route::get('/delete_work/{work_id}','AddWorkController@delete_work');
// Add Second Section
Route::get('/add_second_work','SecoundSectionController@index');
Route::post('/second_work_post','SecoundSectionController@second_work_post');
Route::get('/sec_work_active/{sec_work_id}','SecoundSectionController@sec_work_active');
Route::get('/sec_view_work/{sec_work_id}','SecoundSectionController@sec_view_work');
Route::get('/sec_delete_work/{sec_work_id}','SecoundSectionController@sec_delete_work');
//First Section Image
Route::get('/add_first_image','FirstSectionController@add_first_image');
Route::post('/first_image_post','FirstSectionController@first_image_post');
Route::get('/image_active/{image_id}','FirstSectionController@image_active');
Route::get('/image_delete/{image_id}','FirstSectionController@image_delete');
Route::get('/edit_image/{image_id}','FirstSectionController@edit_image');
Route::post('/edit_image_post','FirstSectionController@edit_image_post');

//First Section Description
Route::get('/add_description','FirstPartDesController@add_description');
Route::post('/add_description_post','FirstPartDesController@add_description_post');
Route::get('/desc_active/{desc_id}','FirstPartDesController@desc_active');
Route::get('/desc_trash/{desc_id}','FirstPartDesController@desc_trash');
Route::get('/desc_edit/{desc_id}','FirstPartDesController@desc_edit');
Route::post('/edit_description_post','FirstPartDesController@edit_description_post');
//2nd Section Image
Route::get('/add_second_image','SecondSectionPartController@add_second_image');
Route::post('/second_image_post','SecondSectionPartController@second_image_post');
Route::get('/second_image_active/{image_id}','SecondSectionPartController@second_image_active');
Route::get('/second_image_delete/{image_id}','SecondSectionPartController@second_image_delete');
Route::get('/second_edit_image/{image_id}','SecondSectionPartController@second_edit_image');
Route::post('/second_edit_image_post','SecondSectionPartController@second_edit_image_post');

// //2nd Section Description
Route::get('/add_sec_description','SecondPartDescController@add_sec_description');
Route::post('/add_sec_description_post','SecondPartDescController@add_sec_description_post');
Route::get('/sec_desc_active/{desc_id}','SecondPartDescController@sec_desc_active');
Route::get('/sec_desc_trash/{desc_id}','SecondPartDescController@sec_desc_trash');
Route::get('/sec_desc_edit/{desc_id}','SecondPartDescController@sec_desc_edit');
Route::post('/sec_edit_description_post','SecondPartDescController@sec_edit_description_post');




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

