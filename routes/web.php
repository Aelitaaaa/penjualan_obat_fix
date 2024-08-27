<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Halaman Utama
Route::get('/', function () {
    return view('index');
})->name('index');

// Login & Register
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Group routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/obat', [ObatController::class, 'index'])->name('obat');
    Route::get('/suplier', [SuplierController::class, 'index'])->name('suplier');
    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien');
    Route::get('/opname', [OpnameController::class, 'index'])->name('opname');
});
