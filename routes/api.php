<?php

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

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    // Auth Module
    Route::group(['prefix' => 'auth',], function () {
        Route::controller(AuthController::class)->group(function () {
            Route::post('/register', 'register');
            Route::post('/login', 'login');
        });
    });

     // News Module
    Route::group(['prefix' => 'news',], function () {
        Route::controller(NewsController::class)->group(function () {
            Route::get('/', 'getAll');
        });
    });
});
