<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPhotoController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// --- Public Routes ---
Route::get('/', [PageController::class, 'home']);
Route::get('/products/{productid?}', [ProductController::class, 'index']);
Route::get('/categories', [ProductController::class, 'categories']);
Route::get('/singleproduct/{productId}', [ProductController::class, 'show']);
Route::post('/lang/{locale}', [PageController::class, 'changeLanguage'])->name('changeLanguage');

// Reviews
Route::get('/addreview', [ReviewController::class, 'create']);
Route::post('/storereview', [ReviewController::class, 'store']);

// --- Authenticated Routes ---
Route::middleware(['auth'])->group(function () {
    // Product Management
    Route::get('/addproduct', [ProductController::class, 'create']);
    Route::post('/storeproduct', [ProductController::class, 'store']);
    Route::get('/editproduct/{productid}', [ProductController::class, 'edit']);
    Route::post('/updateproduct', [ProductController::class, 'update']);
    Route::get('/deleteproduct/{productid}', [ProductController::class, 'destroy']);
    Route::get('/productstable', [ProductController::class, 'adminIndex']);

    // Product Photos
    Route::get('/addproductimage/{productid}', [ProductPhotoController::class, 'create']);
    Route::post('/storeproductphoto', [ProductPhotoController::class, 'store']);
    Route::get('/deleteproductphoto/{productid}', [ProductPhotoController::class, 'destroy']);

    // Cart Actions
    Route::get('/cart', [CartController::class, 'Cart']);
    Route::get('/addproducttocart/{productId?}', [CartController::class, 'AddProductToCart']);
    Route::get('/cartproductremove/{cartId?}', [CartController::class, 'CartProductRemove']);
    Route::post('/cart/increase/{id?}', [CartController::class, 'IncreaseCartQuantity']);
    Route::post('/cart/decrease/{id?}', [CartController::class, 'DecreaseCartQuantity']);
    Route::post('/singleproducttocart', [CartController::class, 'storeSingleProduct']);

    // Orders
    Route::get('/checkout', [OrderController::class, 'checkout']);
    Route::post('/storeorder', [OrderController::class, 'store']);
    Route::get('/previousorders', [OrderController::class, 'index']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
