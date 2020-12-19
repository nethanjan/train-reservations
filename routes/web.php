<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\BookingController;

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

Route::get('/', 'App\Http\Controllers\HomePageController@index');

// Login Admin
Route::get('/login', 'App\Http\Controllers\LoginController@show')->name('login')->middleware('guest');
Route::post('/login', 'App\Http\Controllers\LoginController@authenticate');


// Protected Routes - allows only logged in users
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::post('/logout', 'App\Http\Controllers\LoginController@logout');
    Route::resource('dashboard/trains', TrainController::class);
});

Route::resource('trains.bookings', BookingController::class)->only([
    'create', 'show', 'store'
]);;