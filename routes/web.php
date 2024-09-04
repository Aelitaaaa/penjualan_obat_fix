<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\StockOpnameController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\DetailPembelianController;


Route::get('/', function () {
    return view('login'); 
})->name('login');

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/index', function () {
        return view('index'); 
    })->name('index');

    
    Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
    Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
    Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
    Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');
    Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.delete');
    
    
    Route::prefix('pembelian')->name('pembelian.')->group(function () {
        Route::get('/', [PembelianController::class, 'index'])->name('index');
        Route::get('/create', [PembelianController::class, 'create'])->name('create');
        Route::post('/', [PembelianController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PembelianController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PembelianController::class, 'update'])->name('update');
        Route::delete('/{id}', [PembelianController::class, 'destroy'])->name('destroy');
    });
   
    Route::get('/suplier', [SuplierController::class, 'index'])->name('suplier.index');
    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
    Route::get('/opname', [StockOpnameController::class, 'index'])->name('opname');

    Route::get('/penjualan-obat', function () {
        return view('penjualan');
    })->name('penjualan.obat');

    Route::get('/laporan-omset', function () {
        return view('laporan');
    })->name('laporan.omset');
});
