<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\PelangganController;
use App\Http\Controllers\Web\PencatatanMeteranController;
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
    Route::get('pencatatan-meteran/mass-assigment', [PencatatanMeteranController::class, 'massAssigment'])->name('pencatatan_meteran.mass_assigment');
    Route::get('pencatatan-meteran/catat/{pelanggan}', [PencatatanMeteranController::class, 'catat'])->name('pencatatan_meteran.catat');
    Route::post('pencatatan-meteran/catat/{pelanggan}', [PencatatanMeteranController::class, 'catatAction'])->name('pencatatan_meteran.catat_action');
    Route::get('pencatatan-meteran/{id_pelanggan}', [PencatatanMeteranController::class, 'show'])->name('pencatatan_meteran.show');
    

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    

});
