<?php

use App\Http\Controllers\Api\AskingJob\AskingJobController;
use App\Http\Controllers\Api\ELab\ElabCodeController;
use App\Http\Controllers\Api\Material\MaterialController;
use App\Http\Controllers\Api\Patient\PatientController;
use App\Http\Controllers\Api\Profile\ProfileController;
use App\Http\Controllers\Api\User\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'Api',
    'middleware' => 'ensure.email'
], function () {
    Route::group(['prefix' => 'patients', 'middleware' => 'dentist.email'], function () {
        Route::get('', [PatientController::class, 'index']);
        Route::get('/{id}', [PatientController::class, 'show']);
        Route::post('', [PatientController::class, 'store']);
        Route::put('/{id}', [PatientController::class, 'update']);
        Route::delete('/{id}', [PatientController::class, 'destroy']);
    });

    Route::group(['prefix' => 'laboratories'], function () {
        Route::get('', [ElabCodeController::class, 'index']);
        Route::get('/{id}', [ElabCodeController::class, 'show']);
        Route::post('/elab-code', [ElabCodeController::class, 'store']);
        Route::put('/{id}', [ElabCodeController::class, 'update']);
        Route::delete('/{id}', [ElabCodeController::class, 'destroy']);
    });

    Route::group(['prefix' => 'asking-jobs'], function () {
        Route::get('', [AskingJobController::class, 'index']);
        Route::get('/{id}', [AskingJobController::class, 'show']);
        Route::post('', [AskingJobController::class, 'store']);
        Route::post('/{id}', [AskingJobController::class, 'update']);
        Route::delete('/{id}', [AskingJobController::class, 'destroy']);
    });

    Route::group(['prefix' => 'materials'], function () {
        Route::get('/by-user', [MaterialController::class, 'getByUser']);
        Route::post('', [MaterialController::class, 'store']);
        Route::put('/{id}', [MaterialController::class, 'update']);
        Route::delete('/{id}', [MaterialController::class, 'destroy']);
    });

    Route::group(['prefix' => 'users', 'middleware' => 'lab.email'], function () {
        Route::get('', [UserController::class, 'index']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::post('', [UserController::class, 'store']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });

    Route::group(['prefix' => 'profiles'], function () {
        Route::get('', [ProfileController::class, 'index']);
        Route::put('', [ProfileController::class, 'updateProfile']);
    });
});
Route::group([
    'namespace' => 'Api'
], function () {
    Route::get('materials/all', [MaterialController::class, 'index']);
});
