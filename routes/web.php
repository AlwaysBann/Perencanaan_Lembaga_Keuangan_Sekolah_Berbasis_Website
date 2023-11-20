<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\logsAkunController;
use App\Http\Controllers\PengelolaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RealisasiController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\JabatanPengelolaController;
use App\Http\Controllers\TblUserController;
use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PerencanaanController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index']);
    Route::post('/', [AuthController::class, 'login']);
});

Route::middleware(['akses:super_admin'])->group(function () {
    Route::get('/akun', [TblUserController::class, 'index']);
    Route::get('/akun/tambah', [TblUserController::class, 'create']);
    Route::post('/akun/tambah/simpan', [TblUserController::class, 'store']);
    Route::get('/search', [TblUserController::class, 'show']);
    Route::get('/akun/edit/{id}', [TblUserController::class, 'edit']);
    Route::post('/akun/edit/simpan', [TblUserController::class, 'update']);
    Route::delete('/akun/hapus', [TblUserController::class, 'destroy']);
    Route::get('/akun/logs', [logsAkunController::class, 'index']);
});

Route::middleware(['akses:siswa,pengelola,peminta'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/perencanaan', [PerencanaanController::class,'index']);
    Route::get('/realisasi', [RealisasiController::class,'index']);
});

Route::middleware(['akses:pengelola'])->group(function () {
Route::get('/ruangan', [RuanganController::class,'index']);
Route::get('/ruangan/tambah', [RuanganController::class,'create']);
Route::post('/ruangan/tambah/simpan', [RuanganController::class,'store']);
Route::get('/ruangan/edit/{id}', [RuanganController::class,'edit']);
Route::post('/ruangan/edit/simpan', [RuanganController::class,'update']);
Route::delete('/ruangan/hapus', [RuanganController::class, 'destroy']);

Route::get('/jabatan_pengelola', [JabatanPengelolaController::class,'index']);
Route::get('/jabatan_pengelola/tambah', [JabatanPengelolaController::class,'create']);
Route::post('/jabatan_pengelola/tambah/simpan', [JabatanPengelolaController::class,'store']);
Route::get('/jabatan_pengelola/edit/{id}', [JabatanPengelolaController::class,'edit']);
Route::post('/jabatan_pengelola/edit/simpan', [JabatanPengelolaController::class,'update']);
Route::delete('/jabatan_pengelola/hapus', [JabatanPengelolaController::class, 'destroy']);

Route::get('/pengelola', [PengelolaController::class,'index']);
Route::get('/pengelola/tambah', [PengelolaController::class,'create']);
Route::post('/pengelola/tambah/simpan', [PengelolaController::class,'store']);
Route::get('/pengelola/edit/{id}', [PengelolaController::class,'edit']);
Route::post('/pengelola/edit/simpan', [PengelolaController::class,'update']);
Route::delete('/pengelola/hapus', [PengelolaController::class, 'destroy']);

Route::get('/jurusan', [JurusanController::class,'index']);
Route::get('/jurusan/tambah', [JurusanController::class,'create']);
Route::post('/jurusan/tambah/simpan', [JurusanController::class,'store']);
Route::get('/jurusan/edit/{id}', [JurusanController::class,'edit']);
Route::post('/jurusan/edit/simpan', [JurusanController::class,'update']);
Route::delete('/jurusan/hapus', [JurusanController::class, 'destroy']);

Route::get('/angkatan', [AngkatanController::class,'index']);
Route::get('/angkatan/tambah', [AngkatanController::class,'create']);
Route::post('/angkatan/tambah/simpan', [AngkatanController::class,'store']);
Route::get('/angkatan/edit/{id}', [AngkatanController::class,'edit']);
Route::post('/angkatan/edit/simpan', [AngkatanController::class,'update']);
Route::delete('/angkatan/hapus', [AngkatanController::class, 'destroy']);

Route::get('/realisasi/tambah', [RealisasiController::class,'create']);
Route::post('/realisasi/tambah/simpan', [RealisasiController::class,'store']);
Route::get('/realisasi/edit/{id}', [RealisasiController::class,'edit']);
Route::post('/realisasi/edit/simpan', [RealisasiController::class,'update']);
Route::delete('/realisasi/hapus', [RealisasiController::class, 'destroy']);

Route::get('/kelas', [KelasController::class,'index']);
Route::get('/kelas/tambah', [KelasController::class,'create']);
Route::post('/kelas/tambah/simpan', [KelasController::class,'store']);
Route::get('/kelas/edit/{id}', [KelasController::class,'edit']);
Route::post('/kelas/edit/simpan', [KelasController::class,'update']);
Route::delete('/kelas/hapus', [KelasController::class, 'destroy']);

Route::get('/pengajuan/confirm/{id}', [PerencanaanController::class,'create']);
Route::post('/pengajuan/confirm/simpan', [PerencanaanController::class,'store']);
Route::get('/perencanaan/edit/{id}', [PerencanaanController::class,'edit']);
Route::post('/perencanaan/edit/simpan', [PerencanaanController::class,'update']);
Route::delete('/perencanaan/hapus', [PerencanaanController::class, 'destroy']);
Route::get('/perencanaan/detail/{id}', [PerencanaanController::class,'show']);
});

Route::middleware(['akses:peminta,pengelola'])->group(function () {
Route::get('/pengajuan', [PengajuanController::class,'index']);
Route::get('/pengajuan/tambah', [PengajuanController::class,'create']);
Route::post('/pengajuan/tambah/simpan', [PengajuanController::class,'store']);
Route::get('/pengajuan/edit/{id}', [PengajuanController::class,'edit']);
Route::post('/pengajuan/edit/simpan', [PengajuanController::class,'update']);
Route::get('/pengajuan/detail/{id}', [PengajuanController::class,'show']);
Route::delete('/pengajuan/hapus', [PengajuanController::class,'destroy']);
});

Route::middleware(['akses:peminta'])->group(function () {
});
Route::middleware(['akses:peminta'])->group(function () {
});


Route::get('/logout', [AuthController::class, 'logout']);