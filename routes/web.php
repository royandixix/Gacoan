<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\User\MenuController as UserMenuController;
use App\Http\Controllers\User\BerandaController;

Route::get('/', fn() => redirect()->route('login'));

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    Route::view('/pesanan', 'user.page.pesanan.pesanan')->name('pesanan');
    Route::view('/riwayat', 'user.page.riwayat.riwayat')->name('riwayat');
    Route::view('/profile', 'user.page.profile.index')->name('profile');
    Route::get('/menu', [UserMenuController::class, 'index'])->name('user.menu.index');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

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

    Route::controller(PesananController::class)
        ->prefix('pesanan')
        ->name('pesanan.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });
});
