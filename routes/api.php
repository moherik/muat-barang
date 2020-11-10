<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DeliveryController;
use App\Http\Controllers\Api\DeliveryTypeController;
use App\Http\Controllers\Api\OrderController;
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

Route::group(['prefix' => 'auth'], function ($route) {
    $route->post('/login', [AuthController::class, 'login']);
    $route->post('/phone', [AuthController::class, 'phone']);
});

Route::group(['middleware' => 'auth:sanctum'], function ($route) {
    $route->get('/user', [AuthController::class, 'user']);

    $route->group(['prefix' => 'orders'], function ($route) {
        $route->get('/', [OrderController::class, 'index']);
        $route->post('/', [OrderController::class, 'store']);
        $route->get('/{id}', [OrderController::class, 'show']);
    });

    $route->group(['prefix' => 'deliveries'], function ($route) {
        $route->get('/{orderId}', [DeliveryController::class, 'orderDelivery']);
    });
});

Route::get('/packet-categories', PacketCategoryController::class);
Route::get('/delivery-types', DeliveryTypeController::class);
