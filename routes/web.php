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

//Common/General Routes Started
Route::get('/logout', 'PagesController@logout_function')->name('logout_function');


/*Authentication Routes Started*/
Route::get('/', 'AuthenticationController@login_index')->name('login_index');
Route::post('/login', 'AuthenticationController@login_post')->name('login_post');
Route::get('/register', 'AuthenticationController@register_index')->name('register_index');
Route::post('/register', 'AuthenticationController@register_post')->name('register_post');
/*Authentication Routes Ended*/

//Common/General Routes Started


/*Admin Routes Started*/
Route::group(['prefix' => 'admin' ,  'middleware' => 'is-admin'], function () {	

	Route::get('/', 'Admin\AdminController@index')->name('admin_index');
	Route::get('admin_logout', 'Admin\AdminController@admin_logout')->name('admin_logout');

//Users CRUD Routes Started
	Route::get('users', 'Admin\AdminController@users')->name('users');
	Route::get('user/create', 'Admin\AdminController@create')->name('create_user');
	Route::post('user/store', 'Admin\AdminController@store')->name('store_user');
	Route::get('user/{id}/edit', 'Admin\AdminController@user_edit')->name('user_edit');
	Route::post('update_user/{id}',['as'=>'update_user','uses'=>'Admin\AdminController@update']);
	Route::post('user/password_update/{id}', 'Admin\AdminController@update_password')->name('update_password');
	Route::get('user/delete/{id}', 'Admin\AdminController@destroy')->name('delete_user');
	Route::get('user/{id}', 'Admin\AdminController@user_view')->name('user');
//Users CRUD Routes Ended

	//Admin activate/deactivate Users
	Route::get('/activate_user/{id}/', ["as" => "activate-user","uses" => "Admin\AdminController@activate_user"]);
	Route::get('/deactivate_user/{id}/', ["as" => "deactivate-user", "uses" => "Admin\AdminController@deactivate_user"]);
	//Admin activate/deactivate Users

	//Admin Uploading ProfilePicture
	Route::post('ImageUpload',['as'=>'ImageUpload','uses'=>'Admin\AdminController@ImageUpload']);
	//Admin Uploading ProfilePicture

	//Admin Removing ProfilePicture
	Route::get('/remove_picture_admin/{user_id}','Admin\AdminController@remove_picture_admin')->name('remove_picture_admin');
	//Admin Removing ProfilePicture

});

/*Admin Routes Ended*/


/*Employee Routes Started*/
Route::group(['prefix' => 'employee' ,  'middleware' => 'is-employee'], function () {	

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'Employee\EmployeeController@dashboard')->name('dashboard');
Route::get('/customer_support', 'Employee\EmployeeController@customer_support')->name('customer_support');
Route::get('/history', 'Employee\EmployeeController@history')->name('history');

Route::get('/invited_candidates', 'Employee\EmployeeController@invited_candidates')->name('invited_candidates');
Route::get('/library_public_questions', 'Employee\EmployeeController@library_public_questions')->name('library_public_questions');
Route::get('/preview_test', 'Employee\EmployeeController@preview_test')->name('preview_test');
Route::get('/preview_test_questions', 'Employee\EmployeeController@preview_test_questions')->name('preview_test_questions');
Route::get('/public_preview', 'Employee\EmployeeController@public_preview')->name('public_preview');
Route::get('/view', 'Employee\EmployeeController@manage_test_view')->name('manage_test_view');
Route::get('/change_password', 'Employee\EmployeeController@change_password')->name('change_password');
Route::get('/general_setting', 'Employee\EmployeeController@general_setting')->name('general_setting');
Route::get('/setting_info', 'Employee\EmployeeController@setting_info')->name('setting_info');

//Employee Company Routes Started
Route::post('/post_general_setting','Employee\CompanyController@post_general_setting')->name('post_general_setting');
Route::post('/post_contact_details','Employee\CompanyController@post_contact_details')->name('post_contact_details');
Route::post('/test_completion_mail','Employee\CompanyController@test_completion_mail')->name('test_completion_mail');
Route::post('/test_completion_mail','Employee\CompanyController@test_completion_mail')->name('test_completion_mail');
//Employee Company Routes Ended

//Employee Test Template Routes Started
Route::post('/create_test_template','Employee\TemplatesController@create_test_template')->name('create_test_template');
Route::get('/host_text/{id}', 'Employee\TemplatesController@host_text')->name('host_text');
//Employee Test Template Routes Ended

});
/*Employee Routes Ended*/
