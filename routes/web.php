<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::impersonate();

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/config', 'App\Http\Controllers\ConfigController@index')->name('config');
Route::put('/config/update/{id}', 'App\Http\Controllers\ConfigController@update')->name('config.update');
Route::post('/config/store/permission_group', 'App\Http\Controllers\ConfigController@storePermissionGroup')->name('config.store.permission_group');
Route::put('/config/update/permission_group/{id}', 'App\Http\Controllers\ConfigController@updatePermissionGroup')->name('config.update.permission_group');
Route::post('/config/store/permission', 'App\Http\Controllers\ConfigController@storePermission')->name('config.store.permission');
Route::put('/config/update/permission/{id}', 'App\Http\Controllers\ConfigController@updatePermission')->name('config.update.permission');

Route::group(['namespace' => 'App\Http\Controllers\Profile'], function (){
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::put('/profile/update/profile/{id}', 'ProfileController@updateProfile')->name('profile.update.profile');
	Route::put('/profile/update/password/{id}', 'ProfileController@updatePassword')->name('profile.update.password');
	Route::put('/profile/update/avatar/{id}', 'ProfileController@updateAvatar')->name('profile.update.avatar');
});

Route::group(['namespace' => 'App\Http\Controllers\Error'], function (){
	Route::get('/unauthorized', 'ErrorController@unauthorized')->name('unauthorized');
});

Route::group(['namespace' => 'App\Http\Controllers\User'], function (){
	//Users
	Route::get('/user', 'UserController@index')->name('user');
	// Route::get('/user/create', 'UserController@create')->name('user.create');
	// Route::post('/user/store', 'UserController@store')->name('user.store');
	// Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
	// Route::put('/user/update/{id}', 'UserController@update')->name('user.update');
	// Route::get('/user/edit/password/{id}', 'UserController@editPassword')->name('user.edit.password');
	// Route::put('/user/update/password/{id}', 'UserController@updatePassword')->name('user.update.password');
	// Route::get('/user/show/{id}', 'UserController@show')->name('user.show');
	// Route::get('/user/destroy/{id}', 'UserController@destroy')->name('user.destroy');
	// Roles
	// Route::get('/role', 'RoleController@index')->name('role');
	// Route::get('/role/create', 'RoleController@create')->name('role.create');
	// Route::post('/role/store', 'RoleController@store')->name('role.store');
	// Route::get('/role/edit/{id}', 'RoleController@edit')->name('role.edit');
	// Route::put('/role/update/{id}', 'RoleController@update')->name('role.update');
	// Route::get('/role/show/{id}', 'RoleController@show')->name('role.show');
	// Route::get('/role/destroy/{id}', 'RoleController@destroy')->name('role.destroy');
});

Route::group(['namespace' => 'App\Http\Controllers\Patient'], function (){
	Route::get('/patient', 'PatientController@index')->name('patient');
	Route::get('/patient/create', 'PatientController@create')->name('patient.create');
	Route::post('/patient/store', 'PatientController@store')->name('patient.store');
	Route::get('/patient/edit/{id}', 'PatientController@edit')->name('patient.edit');
	Route::put('/patient/update/{id}', 'PatientController@update')->name('patient.update');
	Route::get('/patient/show/{id}', 'PatientController@show')->name('patient.show');
	Route::get('/patient/destroy/{id}', 'PatientController@destroy')->name('patient.destroy');
});

Route::group(['namespace' => 'App\Http\Controllers\ElabCode'], function (){
	Route::get('/laboratory', 'ElabCodeController@index')->name('laboratory');
	Route::get('/laboratory/create', 'ElabCodeController@create')->name('laboratory.create');
	Route::get('/laboratory/edit/{id}', 'ElabCodeController@edit')->name('laboratory.edit');
	Route::put('/laboratory/update/{id}', 'ElabCodeController@update')->name('laboratory.update');
	Route::get('/laboratory/show/{id}', 'ElabCodeController@show')->name('laboratory.show');

	Route::get('/laboratory/destroy/{id}', 'ElabCodeController@destroy')->name('laboratory.destroy');
	Route::post('/elabcode/store', 'ElabCodeController@store')->name('elabcode.store');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin'], function (){
	//Users
	Route::get('/user', 'UserController@index')->name('admin.user');
	Route::get('/user/show/{id}', 'UserController@show')->name('admin.user.show');
});

Route::group(['namespace' => 'App\Http\Controllers\Setting'], function (){
	Route::get('/setting', 'ProfileController@index')->name('setting');
	Route::put('/setting/update/profile/{id}', 'ProfileController@updateProfile')->name('setting.update.profile');
	Route::put('/setting/update/password/{id}', 'ProfileController@updatePassword')->name('setting.update.password');
	Route::put('/setting/update/avatar/{id}', 'ProfileController@updateAvatar')->name('setting.update.avatar');
});