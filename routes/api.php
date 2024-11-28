<?php

use App\Http\Controllers\Api\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [LoginController::class, 'login'])->name('api.login');
//Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('api.logout');
//Route::post('/introductions', [AuthController::class, 'introductions'])->middleware('auth:api')->name(
//    'api.introductions'
//);
//Route::get('/registerInfo', [AuthController::class, 'registerInfo']);

Route::group([
    'namespace' => 'Api',
    'middleware' => ['auth:api']
], function () {

});
