<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::impersonate();

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/async', 'App\Http\Controllers\CommandController@runCommand');

Route::group(['namespace' => 'App\Http\Controllers\Profile'], function (){
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::put('/profile/update/profile/{id}', 'ProfileController@updateProfile')->name('profile.update.profile');
	Route::put('/profile/update/password/{id}', 'ProfileController@updatePassword')->name('profile.update.password');
	Route::put('/profile/update/avatar/{id}', 'ProfileController@updateAvatar')->name('profile.update.avatar');
});

Route::group(['namespace' => 'App\Http\Controllers\Error'], function (){
	Route::get('/unauthorized', 'ErrorController@unauthorized')->name('unauthorized');
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

Route::group(['namespace' => 'App\Http\Controllers\Material'], function (){
	Route::get('/material', 'MaterialController@index')->name('material');
	Route::get('/material/create', 'MaterialController@create')->name('material.create');
	Route::post('/material/store', 'MaterialController@store')->name('material.store');
	Route::get('/material/edit/{id}', 'MaterialController@edit')->name('material.edit');
	Route::put('/material/update/{id}', 'MaterialController@update')->name('material.update');
	Route::get('/material/show/{id}', 'MaterialController@show')->name('material.show');
	Route::get('/material/destroy/{id}', 'MaterialController@destroy')->name('material.destroy');
});

Route::group(['namespace' => 'App\Http\Controllers\AskingJob'], function (){
	Route::get('/asking-job', 'AskingJobController@index')->name('asking-job');
	Route::get('/asking-job/create', 'AskingJobController@create')->name('asking-job.create');
	Route::post('/asking-job/store', 'AskingJobController@store')->name('asking-job.store');
	Route::get('/asking-job/edit/{id}', 'AskingJobController@edit')->name('asking-job.edit');
	Route::put('/asking-job/update/{id}', 'AskingJobController@update')->name('asking-job.update');
	Route::get('/asking-job/show/{id}', 'AskingJobController@show')->name('asking-job.show');
	Route::get('/asking-job/destroy/{id}', 'AskingJobController@destroy')->name('asking-job.destroy');
});