<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishlistController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class, 'index']);
Route::get('category', [FrontController::class, 'category']);
Route::get('view-category/{slug}', [FrontController::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontController::class, 'productview']);

Auth::routes();

// Route::get('load-cart-data', [CartController::class, 'cartcount']);

// Route::get('add-to-cart/{id}', [ProductController::class, 'getAddToCart']);  pour le session

Route::middleware(['auth'])->group(function(){
    Route::post('add-to-cart/{id}', [CartController::class, 'addProduct']);
    // Route::post('add-to-cart', [CartController::class, 'addProduct']);
    // Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);
    Route::get('delete-cart-item/{id}', [CartController::class, 'deleteproduct']);
    Route::post('update-cart', [CartController::class, 'updatecart']);
    Route::get('cart', [CartController::class, 'viewcart']);

    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placorder']);

    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order', [UserController::class, 'view']);

    Route::get('wishlist', [WishlistController::class, 'index']);
    Route::post('add-to-wishlist/{id}', [WishlistController::class, 'add']);
    Route::get('delete-wishlist-item/{id}', [WishlistController::class, 'deleteitem']);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [FrontendController::class, 'index']);

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'add']);
    Route::post('insert-category', [CategoryController::class, 'insert']);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-products', [ProductController::class, 'insert']);
    Route::get('edit-products/{id}', [ProductController::class, 'edit']);
    Route::put('update-products/{id}', [ProductController::class, 'update']);
    Route::get('delete-products/{id}', [ProductController::class, 'destroy']);

    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateorder']);
    Route::get('order-history', [OrderController::class, 'orderhistory']);

    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-user/{id}', [DashboardController::class, 'viewuser']);
    Route::get('view_profile', [DashboardController::class, 'view_profile']);
});
