<?php

use App\Http\Livewire\PacketType\PacketTypeComponent;
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
    $route->get('/', function () {
        return view('admin.index');
    })->name('dashboard');

    $route->get('/packet/type', PacketTypeComponent::class)->name('packet.type');
});
