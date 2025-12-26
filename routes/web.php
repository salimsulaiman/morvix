<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccountSetting;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\OrderGuideController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SimController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest.redirect')->group(function () {
    Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
});

Route::middleware('auth.redirect')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/detail', [ProfileController::class, 'detail'])->name('profile.detail');
    Route::post('/profile/detail/edit', [ProfileController::class, 'editProfile'])->name('profile.detail.edit');


    Route::post('/profile/detail/sim', [SimController::class, 'store'])->name('sim.store');
    Route::delete('/profile/detail/sim/delete/{id}', [SimController::class, 'destroy'])->name('sim.delete');
    Route::put('/profile/detail/sim/update/{id}', [SimController::class, 'update'])->name('sim.update');

    Route::get('/profile/account-setting', [AccountSetting::class, 'index'])->name('profile.account-setting.index');
    Route::put('/profile/account-setting/password/update', [AccountSetting::class, 'updatePassword'])->name('profile.account-setting.password.update');

    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/order-guide', [OrderGuideController::class, 'index'])->name('order-guide.index');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// Cars
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{code}', [CarController::class, 'show'])->name('cars.show');

// Motorcycles
Route::get('/motorcycles', [MotorcycleController::class, 'index'])->name('motorcycles.index');
Route::get('/motorcycles/{code}', [MotorcycleController::class, 'show'])->name('motorcycles.show');
