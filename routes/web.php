<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\DeliveryType\DeliveryType;
use App\Http\Livewire\PacketCategory\PacketCategory;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'verified'], function ($route) {
    $route->get('/', function () {
        return view('home');
    });
});

Route::group(['middleware' => ['verified', 'role:admin'], 'as' => 'admin.', 'prefix' => 'dashboard'], function ($route) {
    $route->get('/', Dashboard::class)->name('dashboard');

    $route->get('/packet-category', PacketCategory::class)->name('packet_category');
    $route->get('/delivery-type', DeliveryType::class)->name('delivery_type');
});
