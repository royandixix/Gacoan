<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// =======================
// Admin Controllers
// =======================
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\PesananController as AdminPesananController;

// =======================
// User Controllers
// =======================
use App\Http\Controllers\User\BerandaController;
use App\Http\Controllers\User\MenuController as UserMenuController;
use App\Http\Controllers\User\PesananController as UserPesananController;
use App\Http\Controllers\User\KeranjangController;
use App\Http\Controllers\User\CheckoutController;

// Redirect root ke login
Route::get('/', fn() => redirect()->route('login'));

// -----------------------
// Auth Routes
// -----------------------
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// =======================
// Admin Routes (harus di atas user supaya tidak bentrok)
// =======================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Menu Admin
    Route::controller(AdminMenuController::class)
        ->prefix('menu')
        ->name('menu.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{menu}/edit', 'edit')->name('edit');
            Route::put('/{menu}', 'update')->name('update');
            Route::delete('/{menu}', 'destroy')->name('destroy');
        });

    // Pesanan Admin
    Route::controller(AdminPesananController::class)
        ->prefix('pesanan')
        ->name('pesanan.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
            Route::get('/{id}/view-payment', 'viewPayment')->name('viewPaymentPage'); // Bukti pembayaran
        });
});

// =======================
// User Routes
// =======================
Route::middleware('auth')->group(function () {

    Route::get('/profile', fn() => view('user.page.profile.index'))->name('profile');
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');

    Route::get('/menu', [UserMenuController::class, 'index'])->name('user.menu.index');
    Route::get('/menu/{menu}', [UserMenuController::class, 'show'])->name('user.menu.show');

    // Pesanan User
    Route::get('/pesanan', [UserPesananController::class, 'index'])
        ->name('pesanan.index');
    Route::get('/pesanan', [UserPesananController::class, 'index'])->name('pesanan');
    Route::post('/pesanan/add/{menu}', [UserPesananController::class, 'addToCart'])->name('pesanan.add');
    Route::get('/riwayat', [UserPesananController::class, 'riwayat'])->name('riwayat');
    Route::delete('/pesanan/{order}', [UserPesananController::class, 'destroy'])
        ->name('pesanan.destroy');


    // Keranjang
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::put('/keranjang/update/{item}', [KeranjangController::class, 'update'])->name('keranjang.update');
    Route::delete('/keranjang/remove/{item}', [KeranjangController::class, 'remove'])->name('keranjang.remove');
    Route::post('/keranjang/checkout', [KeranjangController::class, 'checkout'])->name('keranjang.checkout');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/qris', [CheckoutController::class, 'qris'])->name('checkout.qris');
    Route::get('/checkout/transfer', [CheckoutController::class, 'transfer'])->name('checkout.transfer');
    Route::post('/checkout/qris/confirm', [CheckoutController::class, 'confirmQris'])->name('checkout.qris.confirm');
    Route::post('/checkout/transfer/upload/{order}', [CheckoutController::class, 'uploadTransfer'])->name('checkout.upload_transfer');
});
