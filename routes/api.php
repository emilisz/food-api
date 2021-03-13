<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\FoodController;

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



Route::prefix('v1/foods')->group(function () {
    Route::get('', [FoodController::class, 'index']);
    Route::get('{id}', [FoodController::class, 'show']);
    Route::post('', [FoodController::class, 'store']);
    Route::put('{id}', [FoodController::class, 'update'])->name('update-food');
    Route::delete('{id}', [FoodController::class, 'destroy']);
});



