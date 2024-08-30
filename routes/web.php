<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\StockOpnameController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return view('login'); 
})->name('login');


Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Logout 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/index', function () {
        return view('index'); 
    })->name('index');

    Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
    Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
    Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');
    Route::delete('/obat/{id}', [ObatController::class, 'delete'])->name('obat.delete'); 
});

Route::get('/suplier', [SuplierController::class, 'index'])->name('suplier.index');
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
Route::get('/opname', [StockOpnameController::class, 'index'])->name('opname');

Route::get('/pembelian-obat', function () {
    return view('pembelian');
})->name('pembelian.obat');

Route::get('/penjualan-obat', function () {
    return view('penjualan');
})->name('penjualan.obat');

Route::get('/laporan-omset', function () {
    return view('laporan');
})->name('laporan.omset');