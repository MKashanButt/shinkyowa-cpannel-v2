<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\MakeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\StockController;
use App\Models\CustomerAccount;
use App\Models\Inquiry;
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
    Route::resource('shipment', ShipmentController::class);

    Route::resource('make', MakeController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('currency', CurrencyController::class);
    Route::resource('inquiry', InquiryController::class);
    Route::resource('country', CountryController::class);
});

require __DIR__ . '/auth.php';
