<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    HomeController,
    CartController,
    CheckoutController,
    ContactController
};
use App\Http\Controllers\Admin\{
    DashboardController,
    DishController,
    OrderController,
    ReservationController,
    MessageController,
    UserController,
    ContactMessageController
};

// Public routes 

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/menu', 'menu')->name('menu');
    Route::match(['get', 'post'], '/reserveren', 'reserveren')->name('reserveren');
    Route::get('/over-ons', 'overOns')->name('over-ons');

    Route::post('/reserveren', 'storeReservation')->name('reservations.store');
    Route::post('/message', 'storeMessage')->name('message.store');
});

// Contact routes

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact');
    Route::post('/contact/send', 'send')->name('contact.send');
});

// Cart routes 

Route::prefix('cart')->name('cart.')->controller(CartController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/add/{dish}', 'add')->name('add');
    Route::post('/remove/{dish}', 'remove')->name('remove');
    Route::post('/update/{dish}', 'update')->name('update');
});

// Checkout routes

Route::controller(CheckoutController::class)->group(function () {
    Route::get('/checkout', 'index')->name('checkout');
    Route::post('/checkout', 'store')->name('checkout.store');
});

// Auth routes


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});


// Admin routes


Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('dishes', DishController::class);
        Route::resource('users', UserController::class);

        Route::get('orders', [OrderController::class, 'index'])->name('orders.index');

        Route::resource('reservations', ReservationController::class)->only(['index', 'update']);

        Route::resource('messages', MessageController::class)
            ->only(['index', 'show', 'update', 'destroy']);

        Route::resource('contact-messages', ContactMessageController::class)
            ->only(['index', 'show', 'update']);
        Route::post('contact-messages/{message}', [ContactMessageController::class, 'update'])
            ->name('contact-messages.update');
    });

require __DIR__ . '/auth.php';