<?php

use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\HomeController;
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
Route::middleware(['admin'])->group(function () {
    Route::get('/lien-he', function () {
        return view('client.pages.contact');
    });
});

Route::get('/dangnhap', function () {
    return view('admin.dashboard');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});


Route::get('/', [HomeController::class, 'index'])->name('home');




Route::get('/dang-nhap', [AuthController::class, 'DangNhap'])->name('dang-nhap');
Route::post('/post-dang-nhap', [AuthController::class, 'postDangNhap'])->name('post-dang-nhap');
Route::get('/dang-ky', [AuthController::class, 'DangKy'])->name('dang-ky');
Route::post('/post-dang-ky', [AuthController::class, 'postDangKy'])->name('post-dang-ky');
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::post('/logouts', [AuthController::class, 'logouts'])->name('logouts');



// Route::get('/dang-ky', function () {
//     return view('client.auth.register');
// });
