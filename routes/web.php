<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\OrderGuideController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/order-guide', [OrderGuideController::class, 'index'])->name('order-guide.index');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');
Route::get('/motorcycles', [MotorcycleController::class, 'index'])->name('motorcycles.index');
Route::get('/motorcycles/{id}', [MotorcycleController::class, 'show'])->name('motorcycles.show');
