<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\StockOpnameController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Default route (if you want to use it as the home page)
Route::get('/', function () {
    return view('login'); // Assuming login is the intended start page
})->name('login');

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
    Route::get('/index', function () {
        return view('index'); // Route for index view, if needed
    })->name('index');

    Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
    Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
    Route::delete('/obat/{id}', [ObatController::class, 'delete'])->name('obat.delete'); // Add this line
});

Route::get('/suplier', [SuplierController::class, 'index'])->name('suplier');
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
Route::get('/opname', [StockOpnameController::class, 'index'])->name('opname');
