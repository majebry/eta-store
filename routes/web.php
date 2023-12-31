<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'index']);

Route::get('create-product', [ProductController::class, 'create'])->middleware('auth');

Route::post('store-product', [ProductController::class, 'store'])->middleware('auth');

Route::get('show-product/{key}', [ProductController::class, 'show']);

Route::get('/', [ProductController::class, 'index']);

Route::delete('/products/{key}', [ProductController::class, 'destroy']);

Route::get('edit-product/{key}', [ProductController::class, 'edit']);

Route::patch('/products/{key}', [ProductController::class, 'update']);



Route::get('/eloquent', function () {

    // get a specific product
    // return Product::find(2);

    // accessing an attribute of the product
    // $product = Product::find(3);
    // return $product->name;

    // or
    // return Product::find(3)->name;

    // get all products
    // return Product::all();

    // get latest 2 products
    // return Product::latest('id')->limit(2)->get();

    // get products ordered by specific column
    // return Product::orderBy('price', 'ASC')->get()

    // get latest product
    // return Product::latest('id')->first();

    // get products that has price over 20
    // return Product::where('price', '>', 20)->get();

});


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
