<?php

use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// POST `api/login`
// (body: user, pass)

Route::post('/login', [LoginController::class, 'login']);

// POST `api/place-order` (headers: token)

Route::post('place-order', [OrderController::class, 'store'])->middleware('auth:sanctum');


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/products', [ProductController::class, 'index']);

Route::post('products', [ProductController::class, 'store']);