<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\driver\DriverController;

Route::middleware(['auth', 'driver'])
    ->prefix('driver')
    ->name('driver.')
    ->group(function () {

    Route::get('/dashboard', [DriverController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/orders/available', [DriverController::class, 'available'])
        ->name('orders.available');

    Route::get('/orders/my', [DriverController::class, 'myOrders'])
        ->name('orders.my');

    Route::put('/orders/{order}/take', [DriverController::class, 'take'])
        ->name('orders.take');

    Route::put('/orders/{order}/status', [DriverController::class, 'updateStatus'])
        ->name('orders.status');
});



Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('dashboard');

    Route::put('/orders/{order}', [AdminOrderController::class, 'update'])
        ->name('orders.update');

    Route::delete('/orders/{order}', [AdminOrderController::class, 'destroy'])
        ->name('orders.destroy');
});



Route::middleware(['auth'])->group(function () {
    Route::resource('orders', OrderController::class);
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
