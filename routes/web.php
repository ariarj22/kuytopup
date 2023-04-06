<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [GameController::class, 'index']);

Route::get('/search', [GameController::class, 'search']);

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/cariorder', function () {
    return view('cariorder');
});

Route::get('/{nickname}', [ProductController::class, 'getProduct']);

Route::post('/pembayaran', [ProductController::class, 'order']);

Route::get('/pembayaran/{id}', [ProductController::class, 'bayar'])->name('pembayaran');

Route::get('/pembayaran/{id}/edit', [ProductController::class, 'formUbah']);

Route::put('/pembayaran/{id}/edit/submit', [ProductController::class, 'ubah'])->name('ubah');
