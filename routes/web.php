<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Models\Customer;
use App\Http\Controllers\TransaksiPembelianController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiPenjualanController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::get('/login',function () {
    return view('auth.login');
})->middleware(['auth', 'verified'])->name('login');

Route::get('/kelola-produk', [ProdukController::class, 'index'])->name('kelola.produk');
Route::get('/kelola-customer', [CustomerController::class, 'index'])->name('kelola.customer');
Route::get('/kelola-transaksi-pembelian', [TransaksiPembelianController::class, 'index'])->name('kelola.transaksiPembelian');
Route::get('/kelola-stok', [StokController::class, 'index'])->name('kelola.stok');
Route::get('/kelola-supplier', [SupplierController::class, 'index'])->name('kelola.supplier');
Route::get('/kelola-transaksi-penjualan', [TransaksiPenjualanController::class, 'index'])->name('kelola.transaksiPenjualan');
Route::get('/kelola-laporan', [LaporanController::class, 'index'])->name('kelola.laporan');


require __DIR__.'/auth.php';
