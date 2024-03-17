<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\PelangganController;
use App\Http\Controllers\Web\PemakaianAirController;
use App\Http\Controllers\Web\PencatatanMeteranController;
use App\Http\Controllers\Web\TagihanPembayaranController;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Route;

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
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login_process');

Route::middleware('auth:petugas')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    // Route::get('pelanggan/add', [PelangganController::class, 'add'])->name('pelanggan.add');
    // Route::post('pelanggan/insert', [PelangganController::class, 'insert'])->name('pelanggan.insert');
    Route::resource('pelanggan', PelangganController::class);

    Route::get('pencatatan-meteran', [PencatatanMeteranController::class, 'index'])->name('pencatatan_meteran.index');
    Route::get('pencatatan-meteran/catat/{pelanggan}', [PencatatanMeteranController::class, 'catat'])->name('pencatatan_meteran.catat');
    Route::post('pencatatan-meteran/catat/{pelanggan}', [PencatatanMeteranController::class, 'catatAction'])->name('pencatatan_meteran.catat_action');
    Route::get('pencatatan-meteran/{id}', [PencatatanMeteranController::class, 'show'])->name('pencatatan_meteran.show');
    Route::get('pemakaian-air', [PemakaianAirController::class, 'index'])->name('pemakaian_air.index');
    Route::post('terbitkan-tagihan', [TagihanPembayaranController::class, 'createAll'])->name('tagihan.terbitkan');
    Route::get('tagihan', [TagihanPembayaranController::class, 'index'])->name('tagihan.index');
    Route::get('tagihan/create/{id_meteran}', [TagihanPembayaranController::class, 'create'])->name('tagihan.create');
    Route::post('tagihan/konfirmasi', [TagihanPembayaranController::class, 'confirmPayment'])->name('tagihan.konfirmasi');
    Route::get('tagihan/cetak-kwitansi', [TagihanPembayaranController::class, 'cetakKwitansiSemua'])->name('tagihan.cetak_kwitansi');
    Route::get('tagihan/cetak-kwitansi/{id}', [TagihanPembayaranController::class, 'cetakKwitansiSatu'])->name('tagihan.cetak_kwitansi_satuan');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    

});
