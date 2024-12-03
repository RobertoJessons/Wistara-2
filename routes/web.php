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
use App\Http\Controllers\LaporanPembelianController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// Route dengan akses penuh untuk Owner dan Supervisor
Route::get('/kelola-laporan', function () {
    if (Auth::user() && (Auth::user()->role->nama_role === 'admin')) {
        return app(LaporanController::class)->index();
    }
    return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
})->middleware('auth')->name('kelola-laporan.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::get('/login',function () {
    return view('auth.login');
})->middleware(['auth', 'verified'])->name('login');

// CRUD Routes
Route::resource('customer', CustomerController::class);
Route::resource('produk', ProdukController::class);
Route::resource('stok', StokController::class);
Route::resource('transaksiPembelian', TransaksiPembelianController::class);
Route::resource('transaksiPenjualan', TransaksiPenjualanController::class);
Route::resource('supplier', SupplierController::class);
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/download', [LaporanController::class, 'download'])->name('laporan.download');
Route::get('/laporan-pembelian', [LaporanPembelianController::class, 'index'])->name('laporan.pembelian.index');
Route::get('/laporan-pembelian/download', [LaporanPembelianController::class, 'download'])->name('laporan.pembelian.download');
// Rute untuk halaman penukaran poin
Route::get('/transaksiPenjualan/poin', [TransaksiPenjualanController::class, 'poin'])->name('transaksiPenjualan.poin');


// Other routes
Route::get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
