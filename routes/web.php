<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('login', [AuthController::class, 'login'])->name('login')->middleware('only_guest');
Route::post('login', [AuthController::class, 'authenticating'])->middleware('only_guest');
Route::get('register', [AuthController::class, 'register'])->middleware('only_guest');

Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'only_admin']);
Route::get('profile', [UserController::class, 'profile'])->middleware(['auth', 'only_client']);
Route::get('books', [BookController::class, 'index'])->middleware('auth');
