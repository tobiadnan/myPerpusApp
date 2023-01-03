<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PublicController::class, 'index']);

Route::middleware('only_guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'Logout']);
    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');

    Route::middleware('only_admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::get('books', [BookController::class, 'index']);
        Route::get('book-add', [BookController::class, 'add']);
        Route::post('book-add', [BookController::class, 'store']);
        Route::get('book-edit/{slug}', [BookController::class, 'edit']);
        Route::put('book-edit/{slug}', [BookController::class, 'update']);
        Route::get('book-delete/{slug}', [BookController::class, 'delete']);
        Route::get('book-destroy/{slug}', [BookController::class, 'destroy']);
        Route::get('book-deleted', [BookController::class, 'deleted']);
        Route::get('book-restore/{slug}', [BookController::class, 'restore']);
        //Route::get('book-restore/{slug}', [BookController::class, 'restore']);

        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('category-add', [CategoryController::class, 'add']);
        Route::post('category-add', [CategoryController::class, 'store']);
        Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('category-edit/{slug}', [CategoryController::class, 'update']);
        Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
        Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']);
        Route::get('category-deleted', [CategoryController::class, 'deleted']);
        Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);

        Route::get('users', [UserController::class, 'index']);
        Route::get('user-registered', [UserController::class, 'registered']);
        Route::get('user-detail/{slug}', [UserController::class, 'show']);
        Route::get('user-approve/{slug}', [UserController::class, 'approve']);
        Route::get('user-banned/{slug}', [UserController::class, 'banned']);
        Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);
        Route::get('user-deleted', [UserController::class, 'deleted']);
        Route::get('user-restore/{slug}', [UserController::class, 'restore']);

        Route::get('book-rent', [BookRentController::class, 'index']);
        Route::post('book-rent', [BookRentController::class, 'store']);
        Route::get('book-return', [BookRentController::class, 'return']);
        Route::post('book-return', [BookRentController::class, 'storeReturn']);

        Route::get('rentLogs', [RentLogController::class, 'index']);
    });
});
