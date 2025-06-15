<?php

use App\Http\Controllers\C_Login;
use App\Http\Controllers\C_Cabang;
use App\Http\Controllers\C_Profil;
use App\Http\Controllers\C_Laporan;
use App\Http\Controllers\C_HasilPanen;
use App\Http\Controllers\C_AdminHasilPanen;
use App\Http\Controllers\C_HasilPenjualan;
use App\Http\Controllers\C_AdminJadwalKunjungan;
use App\Http\Controllers\C_CabangJadwalKunjungan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\C_AdminLaporan;
use App\Http\Controllers\C_AdminLaporan as AdminLaporanController;

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
    return view('auth.landing');
})->name('landing');

// login
Route::get('/login', [C_Login::class , 'masuk'])->name('login');
Route::post('/login', [C_Login::class, 'proses'])->name('login.proses');

// DASHBOARD ADMIN
Route::get('/admin/dashboard', function () {
    return view('admin.dashadmin');
})->middleware('auth')->name('admin.dashboard');

// DASHBOARD CABANG
Route::get('/cabang/dashboard', function () {
    return view('cabang.dashcabang');
})->middleware('auth:cabang')->name('cabang.dashboard');

// LOGOUT
Route::post('/logout', [C_Login::class, 'logout'])->name('logout');
Route::post('/logout/cabang', [C_Login::class, 'logoutCabang'])->name('logout.cabang');

// AKUN CABANG -- ADMIN
Route::get('/akuncabang/show', [C_Profil::class, 'index'])->middleware('auth')->name('admin.akuncabang');
Route::post('/akuncabang/update', [C_Profil::class, 'store'])->name('admin.akuncabang.store')->middleware('auth');
Route::get('/cabang/{id}', [C_Cabang::class, 'show'])->name('cabang.show');

// PROFIL ADMIN
Route::get('/profiladmin', function () {
    return view('admin.profil', [
        'user' => Auth::user()
    ]);
})->middleware('auth')->name('profil');
Route::get('/profil/edit', [C_Profil::class, 'editProfil'])->name('profil.edit');
Route::post('/profil/update', [C_Profil::class, 'updateProfil'])->name('profil.update');

// PROFIL CABANG
Route::get('/profilcabang', [C_Cabang::class, 'profil'])->middleware('auth:cabang')->name('cabang.profil');
Route::get('/cabang/profil/edit', [C_Cabang::class, 'editProfilCabang'])->name('cabang.profil.edit');
Route::post('/cabang/profil/update', [C_Cabang::class, 'updateProfilCabang'])->name('cabang.profil.update');

// LAPORAN CABANG
Route::middleware('auth:cabang')->group(function () {
    Route::get('/laporan', [C_Laporan::class, 'index'])->name('cabang.laporan');
    Route::get('/laporan/tambah', [C_Laporan::class, 'create'])->name('cabang.laporan.create');
    Route::post('/laporan/store', [C_Laporan::class, 'store'])->name('cabang.laporan.store');
    Route::get('/cabang/laporan/{id}', [C_Laporan::class, 'show'])->name('cabang.laporan.show');
    Route::get('/laporan/{id}/edit', [C_Laporan::class, 'edit'])->name('cabang.laporan.edit');
    Route::put('/laporan/{id}', [C_Laporan::class, 'update'])->name('cabang.laporan.update');
    Route::delete('/laporan/{id}', [C_Laporan::class, 'destroy'])->name('cabang.laporan.destroy');
});

// LAPORAN ADMIN
Route::middleware('auth:web')->group(function () {
    Route::get('/admin/laporan', [AdminLaporanController::class, 'index'])->name('admin.laporan');
    Route::get('/admin/laporan/{id}', [AdminLaporanController::class, 'show'])->name('admin.laporan.detail');
});

// FEEDBACK ADMIN
Route::middleware('auth')->group(function () {
    Route::get('/admin/laporan/{id}/feedback', [C_AdminLaporan::class, 'feedbackForm'])->name('admin.laporan.feedback');
    Route::post('/admin/laporan/{id}/feedback', [C_AdminLaporan::class, 'submitFeedback'])->name('admin.laporan.feedback.submit');
});

// HASIL PANEN CABANG
Route::middleware('auth:cabang')->group(function () {
    Route::get('/hasilpanen', [C_HasilPanen::class, 'index'])->name('cabang.hasilpanen');
    Route::post('/hasilpanen', [C_HasilPanen::class, 'store'])->name('cabang.hasilpanen.store');
    Route::get('/hasilpanen/{id}/edit', [C_HasilPanen::class, 'edit'])->name('cabang.hasilpanen.edit');
    Route::put('/hasilpanen/{id}', [C_HasilPanen::class, 'update'])->name('cabang.hasilpanen.update');
    Route::delete('/hasilpanen/{id}', [C_HasilPanen::class, 'destroy'])->name('cabang.hasilpanen.destroy');
});

// HASIL PANEN ADMIN
Route::get('/admin/hasilpanen', [C_AdminHasilPanen::class, 'index'])->name('admin.hasilpanen')->middleware('auth');

// HASIL JUAL ADMIN
Route::get('/admin/hasilpenjualan', [C_HasilPenjualan::class, 'index'])->name('admin.hasilpenjualan.index');
Route::post('/admin/hasilpenjualan', [C_HasilPenjualan::class, 'store'])->name('admin.hasilpenjualan.store');

