<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DeliveryTypeController;
use App\Http\Controllers\Api\PacketCategoryController;
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

Route::group(['middleware' => 'auth:sanctum'], function ($route) {
    $route->get('/user', [AuthController::class, 'user']);

    $route->get('/packet-category', [PacketCategoryController::class, 'index']);
    $route->get('/delivery-type', [DeliveryTypeController::class, 'index']);
});

Route::group(['prefix' => 'auth'], function ($route) {
    $route->post('/login', [AuthController::class, 'login']);
    $route->post('/phone', [AuthController::class, 'phone']);
});
