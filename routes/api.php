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
Route::post('/ships/get', [\App\Http\Controllers\ShipsController::class, 'index']);
Route::post('/ships/get/{id}', [\App\Http\Controllers\ShipsController::class, 'getShipById']);
Route::post('/ships/getCabins/{id}', [\App\Http\Controllers\ShipsController::class, 'getCabins']);
Route::post('/ships/getGallery/{id}', [\App\Http\Controllers\ShipsController::class, 'getGallery']);
Route::post('/ships/updateSpecifications/{id}', [\App\Http\Controllers\ShipsController::class, 'updateSpecifications']);
Route::post('/ships/updateDescription/{id}', [\App\Http\Controllers\ShipsController::class, 'updateDescription']);

Route::post('/cabins/get', [\App\Http\Controllers\CabinController::class, 'index']);
Route::post('/cabins/get/{id}', [\App\Http\Controllers\CabinController::class, 'getCabinById']);
Route::post('/cabins/update/{id}', [\App\Http\Controllers\CabinController::class, 'update']);
