<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StockInController;
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

// route Login
Route::get('/', [UserController::class,'index'])->name('login');
Route::post('/',[UserController::class,'loginAct'])->name('login-act');
Route::get('logout/',[UserController::class, 'logout'])->name('logout')->middleware('cek-admin');


// Dashboard
Route::get('dashboard/',[DashboardController::class,'index'])->name('dashboard')->middleware('cek-admin');

// Stock In
Route::resource('stockin',StockInController::class)->middleware('cek-admin')->except(['show']);

// Stock Out
