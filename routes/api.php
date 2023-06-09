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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->middleware('jwt.auth')->group(function(){
    Route::apiResource('produto', 'App\Http\Controllers\ProdutoController');
    Route::post('reset', 'App\Http\Controllers\AuthController@reset');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
});

Route::post('login', 'App\Http\Controllers\AuthController@login');