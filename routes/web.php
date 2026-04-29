<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesPageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/generate', [SalesPageController::class, 'index']);
    Route::post('/generate', [SalesPageController::class, 'generate']);
    Route::get('/history', [SalesPageController::class, 'history']);
    Route::delete('/history/{id}', [SalesPageController::class, 'delete']);
    Route::get('/history/{id}', [SalesPageController::class, 'show']);
});

require __DIR__.'/auth.php';
