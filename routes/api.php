<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductRatingController;
use App\Http\Controllers\UserController;
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


//public route
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'show']);
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show'])->where('id', '[0-9]+');
    Route::get('/discount', [ProductController::class, 'discount']);
    Route::get('/special', [ProductController::class, 'onSpecialList']);
    Route::get('/welcome-offer', [ProductController::class, 'onWelcomeList']);
});


//prtected route
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);

    Route::prefix('users')->group(function () {
        Route::get('/me', [UserController::class, 'getMe']);
        Route::delete('/me', [UserController::class, 'deleteMe']);

        Route::get('/{id}', [UserController::class, 'show'])->where('id', '[0-9]+');
        Route::patch('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });

    Route::middleware('can:admin-only')->prefix('users')->group(function () {
        Route::post('/ban/{id}', [UserController::class, 'ban']);
        Route::post('/unban/{id}', [UserController::class, 'unban']);
        Route::get('/', [UserController::class, 'index']);
    });

    // Category
    Route::middleware('can:admin-only')->prefix('categories')->group(function () {
        Route::post('/', [CategoryController::class, 'store']);
        Route::patch('/{id}', [CategoryController::class, 'update']);
        Route::delete('/{id}', [CategoryController::class, 'destroy']);
    });

    // products
    Route::middleware('can:admin-only')->prefix('products')->group(function () {
        Route::post('/', [ProductController::class, 'store']);
        Route::patch('/{id}', [ProductController::class, 'update']);
        Route::delete('/{id}', [ProductController::class, 'destroy']);
    });

    // order
    Route::prefix('orders')->group(function () {
        Route::get('/current-order', [OrderController::class, 'get_currentOrderBelongToUser']);
        Route::get('/finished-orders', [OrderController::class, 'get_finishedOrderBelongToUser']);
        Route::get('/pending-orders', [OrderController::class, 'get_pendingOrderBelongToUser']);
        Route::get('/{id}', [OrderController::class, 'get_anOrderBelongToUser'])->where('id', '[0-9]+');

        Route::get('/', [OrderController::class, 'get_allOrdersBelongToUser']);
        Route::post('/', [OrderController::class, 'store']);
        Route::delete('/{id}', [OrderController::class, 'remove_anOrderBelongToUser']);
        Route::patch('/', [OrderController::class, 'update_anOrderBelongToUser']);
    });

    Route::middleware('can:admin-only')->prefix('orders')->group(function () {
        Route::patch('/update/{id}', [OrderController::class, 'update'])->where('id', '[0-9]+');
        Route::get('/all', [OrderController::class, 'index']);
        Route::get('/exclude-busy', [OrderController::class, 'exclude_busyOrder']);
    });

    //order detail
    Route::prefix('order-details')->group(function () {
        Route::get('/{id}', [OrderDetailController::class, 'show']);
        Route::post('/', [OrderDetailController::class, 'store']);
        Route::delete('/{id}', [OrderDetailController::class, 'destroy']);
        Route::patch('/{id}', [OrderDetailController::class, 'update']);
    });

    // Route::middleware('can:admin-only')->prefix('product-images')->group(function () {
    //     Route::post('/', [ProductImageController::class, 'store']);
    //     Route::delete('/{id}', [ProductImageController::class, 'destroy']);
    // });

    // Route::prefix('product-rating')->group(function () {
    //     Route::post('/', [ProductRatingController::class, 'store']);
    //     Route::delete('/{id}', [ProductRatingController::class, 'destroy']);
    // });
});
