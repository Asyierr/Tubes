<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Driver\DriverController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return redirect()->route('register.choose');
})->name('register');

Route::get('/register/choose', function () {
    return view('auth.choose-role');
})->name('register.choose');

Route::get('/register/user', [RegisteredUserController::class, 'createUser'])
    ->name('register.user');

Route::get('/register/driver', [RegisteredUserController::class, 'createDriver'])
    ->name('register.driver');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('orders', OrderController::class);

    Route::post('/orders/{order}/pay', [PaymentController::class, 'pay'])
        ->name('orders.pay');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

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

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::put('/orders/{order}', [AdminOrderController::class, 'update'])
            ->name('orders.update');

        Route::delete('/orders/{order}', [AdminOrderController::class, 'destroy'])
            ->name('orders.destroy');
    });

require __DIR__ . '/auth.php';
