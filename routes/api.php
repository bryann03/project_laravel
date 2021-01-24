<?php

use App\Http\Controllers\Api\FunkoCollectionController;
use App\Http\Controllers\Api\FunkoController;
use Illuminate\Http\Request;

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

//PARA LARAVEL 8* LAS RUTAS SON ASÍ
Route::resource('funkos', FunkoController::class);
Route::resource('funkos_collection', FunkoCollectionController::class);
