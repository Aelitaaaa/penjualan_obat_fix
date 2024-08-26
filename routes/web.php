<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController; // Pastikan controller diimpor

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);


Route::get('/index', function () {
    return view('index');
})->name('index');


Route::get('/obat', [ObatController::class, 'index'])->name('obat');


Route::get('/pasien', function () {
    return view('pasien');
})->name('pasien');


Route::get('/suplier', function () {
    return view('suplier');
})->name('suplier');


Route::get('/opname', function () {
    return view('opname');
})->name('opname');


use App\Http\Controllers\Auth\RegisterController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


use App\Http\Controllers\AuthController;

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
