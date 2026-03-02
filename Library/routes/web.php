<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Routes untuk Autentikasi
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Grup Route yang memerlukan Login
Route::middleware(['auth'])->group(function () {
    
    // 1. Menu yang bisa diakses SEMUA User (Admin & Member)
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');

    // 2. Menu yang HANYA bisa diakses ADMIN
    Route::middleware(['checkRole:admin'])->group(function () {
        // Resource Books kecuali 'index' karena index sudah diatur di atas
        Route::resource('books', BookController::class)->except(['index']);
        
        // Resource Users (Kelola Pengguna)
        Route::resource('users', UserController::class);
    });

    // 3. Menu yang HANYA bisa diakses MEMBER (Contoh: Form Peminjaman)
    Route::middleware(['checkRole:member'])->group(function () {
        Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
        Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    });
});