<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\StockOpnameController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Halaman Utama (assuming this is your default route)
Route::get('/', function () {
    return view('login'); // Keep as login if it is the intended start page
})->name('login');

// Define the index route to prevent the RouteNotFoundException
Route::get('/index', function () {
    return view('index'); // Replace 'index' with the actual view file name you want to use
})->name('index');

// Login & Register routes
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Group routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/obat', [ObatController::class, 'index'])->name('obat');
    Route::get('/suplier', [SuplierController::class, 'index'])->name('suplier');
    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien');
    Route::get('/opname', [StockOpnameController::class, 'index'])->name('opname');
});