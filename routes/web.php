<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DishController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;

Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// users
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [HomeController::class, 'menu'])->name('menu');
Route::get('/reserveren', [HomeController::class, 'reserveren'])->name('reserveren');
Route::get('/over-ons', [HomeController::class, 'overOns'])->name('over-ons');
Route::post('/reserveren', [HomeController::class, 'storeReservation'])->name('reservations.store');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
// Cart routes
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add/{dish}', [CartController::class, 'add'])->name('add');
    Route::post('/remove/{dish}', [CartController::class, 'remove'])->name('remove');
    Route::post('/update/{dish}', [CartController::class, 'update'])->name('update');
});

// Checkout routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Dishes
    Route::get('dishes', [DishController::class, 'index'])->name('dishes.index');
    Route::get('dishes/create', [DishController::class, 'create'])->name('dishes.create');
    Route::post('dishes', [DishController::class, 'store'])->name('dishes.store');
    Route::get('dishes/{dish}/edit', [DishController::class, 'edit'])->name('dishes.edit');
    Route::put('dishes/{dish}', [DishController::class, 'update'])->name('dishes.update');
    Route::delete('dishes/{dish}', [DishController::class, 'destroy'])->name('dishes.destroy');

    // Orders
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

    // Reservations
    Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::patch('reservations/{id}/status', [ReservationController::class, 'updateStatus'])->name('reservations.updateStatus');

    // Messages
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{id}', [MessageController::class, 'show'])->name('messages.show');
    Route::patch('messages/{id}/read', [MessageController::class, 'markRead'])->name('messages.markRead');
    Route::delete('messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
});

require __DIR__ . '/auth.php';