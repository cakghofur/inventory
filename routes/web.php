<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
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
Route::get('/', [UserController::class,'index'])->name('login')->middleware('cek-login');
Route::post('/',[UserController::class,'loginAct'])->name('login-act');
Route::get('logout/',[UserController::class, 'logout'])->name('logout')->middleware('cek-admin');
Route::get('user/',[UserController::class,'list'])->name('user.list')->middleware('cek-admin','cek-role');
Route::delete('user/{id}',[UserController::class,'destroy'])->name('user.destroy')->middleware('cek-admin');
Route::get('user/{id}',[UserController::class,'edit'])->name('user.edit')->middleware('cek-admin');
Route::get('/change-password', [UserController::class, 'change_password'])->name('user.changePassword')->middleware('cek-admin');
Route::post('/change-password', [UserController::class, 'change'])->name('user.change');
Route::get('/profile', [UserController::class, 'myprofile'])->name('user.profile')->middleware('cek-admin');
Route::get('/create', [UserController::class, 'create'])->name('user.create')->middleware('cek-admin','cek-role');
Route::post('/create',[UserController::class,'store'])->name('user.store');
// Dashboard
Route::get('dashboard/',[DashboardController::class,'index'])->name('dashboard')->middleware('cek-admin');

// Stock In
Route::resource('stockin',StockInController::class)->middleware('cek-admin');

// Stock Out
Route::resource('stockout',StockOutController::class)->middleware('cek-admin')->except(['create']);
Route::get('stockout-process/{stockout}',[StockOutController::class,'process'])->middleware('cek-admin')->name('stockout.process');
