<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservedVehicleController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\MakeController;
use App\Http\Controllers\NotifcationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PendingTTController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShipmentController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockRenderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('authKey')
    ->prefix('/api/stock/')
    ->controller(StockRenderController::class)
    ->group(function () {
        Route::get('all',  'index');
        Route::get('byCategory',  'byCategory');
        Route::get('single/{id}',  'single');
        Route::get('totalStock',  'totalStock');
        Route::get('makes',  'makes');
        Route::get('makes/count',  'makesCount');
        Route::get('country/count',  'countryCount');
        Route::get('vehicleOfTheDay',  'vehicleOfTheDay');
        // Filteration
        Route::get('filterOptions',  'filterOptions');
        Route::get('filterByMake/{make}',  'filterByMake');
        Route::get('filterByType/{type}',  'filterByType');
    });

Route::middleware(['auth', 'customerRoleCheck'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('customer-account', CustomerAccountController::class);
    Route::post('customer-account/email', [CustomerAccountController::class, 'searchByEmail'])
        ->name('customer-account.searchByEmail');
    Route::post('customer-account/company', [CustomerAccountController::class, 'searchByCompany'])
        ->name('customer-account.searchByCompany');

    Route::resource('reserved-vehicle', ReservedVehicleController::class);

    Route::resource('stock', StockController::class);
    Route::post('stock/search', [StockController::class, 'search'])
        ->name('stock.search');

    Route::resource('shipment', ShipmentController::class);
    Route::resource('document', DocumentController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('pending-tt', PendingTTController::class);

    Route::middleware(['permission:view_settings'])->group(function () {
        Route::resource('make', MakeController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('currency', CurrencyController::class);
        Route::resource('inquiry', InquiryController::class);
        Route::resource('country', CountryController::class);
        Route::resource('user', UserController::class);
        Route::resource('permission', PermissionController::class);
    });

    Route::resource('notification', NotifcationController::class)
        ->middleware(['permission:view_notifications']);
});

require __DIR__ . '/auth.php';
