<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

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

// login, logout, and register
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
});

Route::post('/login', [AuthController::class, 'Login']);
Route::post('/register', [AuthController::class, 'Register']);
Route::get('/logout', [AuthController::class, 'Logout']);

// protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/', [GameController::class, 'index']);
    Route::get('/history', [ProductController::class, 'histori']);
    Route::get('/{nickname}', [ProductController::class, 'getProduct_f']);
    Route::post('/pembayaran', [ProductController::class, 'order']);
    Route::get('/pembayaran/{id}', [ProductController::class, 'bayar'])->name('pembayaran');
    Route::get('/pembayaran/{id}/edit', [ProductController::class, 'formUbah']);
    Route::put('/pembayaran/{id}/edit/submit', [ProductController::class, 'ubah'])->name('ubah');
    Route::delete('/pembayaran/{id}/cancel', [ProductController::class, 'cancel']);
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});
