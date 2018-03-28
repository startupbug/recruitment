<?php

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



// Auth::routes();

/*Authentication Routes Started*/
Route::get('/', 'AuthenticationController@login_index')->name('login_index');
Route::get('/register', 'AuthenticationController@register_index')->name('register_index');
Route::post('/register', 'AuthenticationController@register_post')->name('register_post');
Route::post('/login', 'AuthenticationController@login_post')->name('login_post');
/*Authentication Routes Ended*/

/*Admin Routes Started*/
Route::group(['prefix' => 'admin' ,  'middleware' => 'is-admin'], function () {	

	Route::get('index', 'AdminController@index')->name('admin_index');
	Route::get('admin_logout', 'AdminController@admin_logout')->name('admin_logout');

//Users CRUD Routes Started
	Route::get('users', 'AdminController@users')->name('users');
	Route::get('user/create', 'AdminController@create')->name('create_user');
	Route::post('user/store', 'AdminController@store')->name('store_user');
	Route::get('user/{id}/edit', 'AdminController@user_edit')->name('user_edit');
	Route::post('update_user/{id}',['as'=>'update_user','uses'=>'AdminController@update']);
	Route::post('user/password_update/{id}', 'AdminController@update_password')->name('update_password');
	Route::get('user/delete/{id}', 'AdminController@destroy')->name('delete_user');
	Route::get('user/{id}', 'AdminController@user_view')->name('user');
//Users CRUD Routes Ended

	//Admin activate/deactivate Users
	Route::get('/activate_user/{id}/', ["as" => "activate-user","uses" => "AdminController@activate_user"]);
	Route::get('/deactivate_user/{id}/', ["as" => "deactivate-user", "uses" => "AdminController@deactivate_user"]);
	//Admin activate/deactivate Users

	//Admin Uploading ProfilePicture
	Route::post('ImageUpload',['as'=>'ImageUpload','uses'=>'AdminController@ImageUpload']);
	//Admin Uploading ProfilePicture

	//Admin Removing ProfilePicture
	Route::get('/remove_picture_admin/{user_id}','AdminController@remove_picture_admin')->name('remove_picture_admin');
	//Admin Removing ProfilePicture


});

/*Admin Routes Ended*/

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('/dashboard/customer_support', 'DashboardController@customer_support')->name('customer_support');
Route::get('/dashboard/history', 'DashboardController@history')->name('history');
Route::get('/dashboard/host_text', 'DashboardController@host_text')->name('host_text');
Route::get('/dashboard/invited_candidates', 'DashboardController@invited_candidates')->name('invited_candidates');
Route::get('/dashboard/library_public_questions', 'DashboardController@library_public_questions')->name('library_public_questions');
Route::get('/dashboard/preview_test', 'DashboardController@preview_test')->name('preview_test');
Route::get('/dashboard/preview_test_questions', 'DashboardController@preview_test_questions')->name('preview_test_questions');
Route::get('/dashboard/public_preview', 'DashboardController@public_preview')->name('public_preview');
Route::get('/dashboard/view', 'DashboardController@view')->name('view');
Route::get('/dashboard/change_password', 'DashboardController@change_password')->name('change_password');
Route::get('/dashboard/general_setting', 'DashboardController@general_setting')->name('general_setting');
Route::get('/dashboard/setting_info', 'DashboardController@setting_info')->name('setting_info');


