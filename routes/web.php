<?php

use App\Http\Livewire\Dashboard;
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

Route::group(['middleware' => 'verified', 'as' => 'admin.'], function ($route) {
    $route->get('/', Dashboard::class)->name('dashboard');

    $route->get('/packet/category', PacketCategory::class)->name('packet.category');
});
