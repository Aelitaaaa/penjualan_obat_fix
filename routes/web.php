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
use App\Http\Controllers\PenjualanController;

Route::redirect('/', '/login');


Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/index', function () {
        return view('index');
    })->name('index');

    Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
    Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
    Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
    Route::get('obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
    Route::put('obat/{id}', [ObatController::class, 'update'])->name('obat.update');
    Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.delete');
    
    Route::prefix('pembelian')->name('pembelian.')->group(function () {
        Route::get('/', [PembelianController::class, 'index'])->name('index');
        Route::get('/create', [PembelianController::class, 'create'])->name('create');
        Route::post('/', [PembelianController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PembelianController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PembelianController::class, 'update'])->name('update');
        Route::delete('/{id}', [PembelianController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('detail_pembelian')->name('detail_pembelian.')->group(function () {
        Route::get('/{kodePembelian}', [DetailPembelianController::class, 'index'])->name('index');
        Route::get('/create', [DetailPembelianController::class, 'create'])->name('create');
        Route::post('/{kodePembelian}', [DetailPembelianController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [DetailPembelianController::class, 'edit'])->name('edit');
        Route::put('/{id}', [DetailPembelianController::class, 'update'])->name('update');
        Route::delete('/{id}', [DetailPembelianController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('suplier')->name('suplier.')->group(function () {
        Route::get('/', [SuplierController::class, 'index'])->name('index');
        Route::get('/create', [SuplierController::class, 'create'])->name('create');
        Route::post('/', [SuplierController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [SuplierController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SuplierController::class, 'update'])->name('update');
        Route::delete('/{id}', [SuplierController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('pasien')->name('pasien.')->group(function () {
        Route::get('/', [PasienController::class, 'index'])->name('index');
        Route::get('/create', [PasienController::class, 'create'])->name('create');
        Route::post('/', [PasienController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PasienController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PasienController::class, 'update'])->name('update');
        Route::delete('/{id}', [PasienController::class, 'destroy'])->name('destroy');
    });
    

    Route::get('/opname', [StockOpnameController::class, 'index'])->name('opname');

    Route::prefix('penjualan')->name('penjualan.')->group(function () {
        Route::get('/', [PenjualanController::class, 'index'])->name('index');
        Route::get('/create', [PenjualanController::class, 'create'])->name('create');
        Route::post('/', [PenjualanController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [PenjualanController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PenjualanController::class, 'update'])->name('update');
        Route::delete('/{id}', [PenjualanController::class, 'destroy'])->name('destroy');
    });

    Route::get('/laporan-omset', function () {
        return view('laporan');
    })->name('laporan.omset');

    
});
