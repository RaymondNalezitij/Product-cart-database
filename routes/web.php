<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\CartController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::post('/dashboard/add-to-cart', [\App\Http\Controllers\CartController::class, 'addToCart'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.addToCart');
Route::post('/dashboard/edit-cart', [\App\Http\Controllers\CartController::class, 'editCartProduct'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.editCart');
Route::post('/dashboard/remove-from-cart', [\App\Http\Controllers\CartController::class, 'removeFromCart'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.removeFromCart');
Route::post('/dashboard/make-purchase', [\App\Http\Controllers\CartController::class, 'makePurchase'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.purchase');

Route::get('/product', [\App\Http\Controllers\ProductController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('product');
Route::post('/product', [\App\Http\Controllers\ProductController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('product.store');
Route::post('/product/edit-product', [\App\Http\Controllers\ProductController::class, 'editProduct'])
    ->middleware(['auth', 'verified'])
    ->name('product.editProduct');
Route::post('/product/commit-product-changes', [\App\Http\Controllers\ProductController::class, 'commitProductChanges'])
    ->middleware(['auth', 'verified'])
    ->name('product.commitProductChanges');
Route::post('/product/delete-product', [\App\Http\Controllers\ProductController::class, 'deleteProduct'])
    ->middleware(['auth', 'verified'])
    ->name('product.deleteProduct');


require __DIR__ . '/auth.php';
