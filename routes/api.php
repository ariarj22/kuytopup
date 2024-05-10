<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [GameController::class, 'index_f']);
Route::get('/{nickname}', [ProductController::class, 'getProduct_f']);

// login
Route::post('/register', [AuthController::class, 'Register']);
Route::post('/login', [AuthController::class, 'Login']);
Route::get('/user_{id}', [AuthController::class, 'getUser']);

// order
Route::post('/order', [ProductController::class, 'order_f']);
Route::get('/bayar_{id}', [ProductController::class, 'bayar_f']);
Route::put('/edit_{id}', [ProductController::class, 'ubah_f']);
Route::delete('/delete_{id}', [ProductController::class, 'cancel_f']);
Route::get('/history_{id}', [ProductController::class, 'histori']);