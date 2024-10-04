<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/login',[AuthController::class,'login'])->name('login');

Route::post('/signup-save',[AuthController::class,'signupsave'])->name('signup.save');
Route::post('/signin',[AuthController::class,'signin'])->name('signin.check');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::get('/role', [AdminController::class, 'role'])->name('role.page');
        Route::get('/category', [AdminController::class, 'category'])->name('cat.page');

    });
});

// Vendor Routes
Route::middleware(['auth', 'vendor'])->group(function () {
    Route::prefix('vendor')->name('vendor.')->group(function () {
        Route::get('/dashboard', [VendorController::class, 'index'])->name('dashboard');

    });
});



