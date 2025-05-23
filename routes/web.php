<?php

use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use App\Models\CustomerAccount;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('customer-account', CustomerAccountController::class);
    Route::resource('stock', StockController::class);
});

require __DIR__ . '/auth.php';
