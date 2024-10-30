<?php

use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/admin2', function () {
    return view('admin.dashboard');
});
Route::resource('user', UserController::class);
Route::resource('tour', TourController::class);
Route::resource('coupons', CouponsController::class);


Route::get('/', function () {
    return view('client.home');
});


Route::get('/lien-he', function () {
    return view('client.pages.contact');
});

Route::get('/dang-nhap', function () {
    return view('client.auth.login');
});

Route::get('/dang-ky', function () {
    return view('client.auth.register');
});
