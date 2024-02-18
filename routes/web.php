<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\JenisTagihanController;
use App\Http\Controllers\logsAkunController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RealisasiController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\JabatanPengelolaController;
use App\Http\Controllers\TblUserController;
use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\JabatanPemintaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PemintaController;
use App\Http\Controllers\PerencanaanController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\LogsRealisasiController;

use App\Http\Controllers\SumberDanaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\KelolaKeuanganController;

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

// Route::middleware(['auth'])->group(function () {

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
    Route::get('/perencanaan/detail/{id}', [PerencanaanController::class,'show']);
    Route::get('/perencanaan/search', [PerencanaanController::class,'search']);
    Route::get('/perencanaan/cetak/{id}', [PerencanaanController::class,'cetak']);
    
    Route::get('/realisasi', [RealisasiController::class,'index']);
    Route::get('/realisasi/search', [RealisasiController::class, 'show']);
    Route::get('/realisasi/detail/{id}', [RealisasiController::class, 'detail']);

Route::get('/pembayaran', [PembayaranController::class, 'index']);
    Route::get('/pembayaran/detail/{id}', [PembayaranController::class, 'detail']);

    Route::get('/pemasukan/confirm/{id}', [KelolaKeuanganController::class, 'confirm']);
    Route::post('/pemasukan/confirm/simpan', [KelolaKeuanganController::class, 'simpan']);


    Route::get('/kelola/tambah', [KelolaKeuanganController::class, 'create']);
    Route::post('/kelola/tambah/simpan', [KelolaKeuanganController::class, 'store']);
    Route::get('/kelola/edit/{id}', [KelolaKeuanganController::class, 'edit']);
    Route::post('/kelola/edit/simpan', [KelolaKeuanganController::class, 'update']);
    Route::get('/kelola/detail/{id}', [KelolaKeuanganController::class, 'show']);
    Route::delete('/kelola/hapus', [KelolaKeuanganController::class, 'destroy']);
    Route::get('/kelola/cetak', [KelolaKeuanganController::class, 'cetak']);

    Route::get('/profile-siswa/{id}', [SiswaController::class, 'profile']);
    Route::get('/profile-siswa/pembayaran/{id}', [SiswaController::class, 'pembayaran']);
    Route::post('/profile-siswa/pembayaran/bayar', [SiswaController::class, 'bayar']);

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
Route::get('/profile-pengelola/{id}', [PengelolaController::class,'profile']);
Route::get('/pengelola/tambah', [PengelolaController::class,'create']);
Route::post('/pengelola/tambah/simpan', [PengelolaController::class,'store']);
Route::get('/pengelola/edit/{id}', [PengelolaController::class,'edit']);
Route::post('/pengelola/edit/simpan', [PengelolaController::class,'update']);
Route::delete('/pengelola/hapus', [PengelolaController::class, 'destroy']);

Route::get('/jabatan_peminta', [JabatanPemintaController::class,'index']);
Route::get('/jabatan_peminta/tambah', [JabatanPemintaController::class,'create']);
Route::post('/jabatan_peminta/tambah/simpan', [JabatanPemintaController::class,'store']);
Route::get('/jabatan_peminta/edit/{id}', [JabatanPemintaController::class,'edit']);
Route::post('/jabatan_peminta/edit/simpan', [JabatanPemintaController::class,'update']);
Route::delete('/jabatan_peminta/hapus', [JabatanPemintaController::class, 'destroy']);

Route::get('/peminta', [PemintaController::class,'index']);
Route::get('/peminta/tambah', [PemintaController::class,'create']);
Route::post('/peminta/tambah/simpan', [PemintaController::class,'store']);
Route::get('/peminta/edit/{id}', [PemintaController::class,'edit']);
Route::post('/peminta/edit/simpan', [PemintaController::class,'update']);
Route::delete('/peminta/hapus', [PemintaController::class, 'destroy']);

Route::get('/jurusan', [JurusanController::class,'index']);
Route::get('/jurusan/tambah', [JurusanController::class,'create']);
Route::post('/jurusan/tambah/simpan', [JurusanController::class,'store']);
Route::get('/jurusan/edit/{id}', [JurusanController::class,'edit']);
Route::post('/jurusan/edit/simpan', [JurusanController::class,'update']);
Route::delete('/jurusan/hapus', [JurusanController::class, 'destroy']);

Route::get('/JenisTagihan', [JenisTagihanController::class,'index']);
Route::get('/JenisTagihan/tambah', [JenisTagihanController::class,'create']);
Route::post('/JenisTagihan/tambah/simpan', [JenisTagihanController::class,'store']);
Route::get('/JenisTagihan/edit/{id}', [JenisTagihanController::class,'edit']);
Route::post('/JenisTagihan/edit/simpan', [JenisTagihanController::class,'update']);
Route::delete('/JenisTagihan/hapus', [JenisTagihanController::class, 'destroy']);

Route::get('/tagihan', [TagihanController::class,'index']);
Route::get('/tagihan/logs', [TagihanController::class,'logs']);
Route::get('/tagihan/tambah', [TagihanController::class,'create']);
Route::post('/tagihan/tambah/simpan', [TagihanController::class,'store']);
Route::get('/tagihan/edit/{id}', [TagihanController::class,'edit']);
Route::post('/tagihan/edit/simpan', [TagihanController::class,'update']);
Route::delete('/tagihan/hapus', [TagihanController::class, 'destroy']);

Route::get('/angkatan', [AngkatanController::class,'index']);
Route::get('/angkatan/tambah', [AngkatanController::class,'create']);
Route::post('/angkatan/tambah/simpan', [AngkatanController::class,'store']);
Route::get('/angkatan/edit/{id}', [AngkatanController::class,'edit']);
Route::post('/angkatan/edit/simpan', [AngkatanController::class,'update']);
Route::delete('/angkatan/hapus', [AngkatanController::class, 'destroy']);
Route::get('/angkatan/search', [AngkatanController::class, 'search']);

Route::get('/realisasi/tambah/{id}', [RealisasiController::class,'create']);
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
Route::get('/kelas/search', [KelasController::class, 'search']);

Route::get('/siswa', [SiswaController::class,'index']);
Route::get('/siswa/tambah', [SiswaController::class,'create']);
Route::post('/siswa/tambah/simpan', [SiswaController::class,'store']);
Route::get('/siswa/edit/{id}', [SiswaController::class,'edit']);
Route::post('/siswa/edit/simpan/{id}', [SiswaController::class,'update']);
Route::delete('/siswa/hapus', [SiswaController::class, 'destroy']);
Route::get('/siswa/search', [SiswaController::class, 'search']);

Route::get('/pengajuan/confirm/{id}', [PerencanaanController::class,'create']);
Route::post('/pengajuan/confirm/simpan', [PerencanaanController::class,'store']);


Route::get('/sumber_dana', [SumberDanaController::class,'index']);
Route::get('/sumber_dana/tambah', [SumberDanaController::class,'create']);
Route::post('/sumber_dana/tambah/simpan', [SumberDanaController::class,'store']);
Route::get('/sumber_dana/edit/{id}', [SumberDanaController::class,'edit']);
Route::post('/sumber_dana/edit/simpan', [SumberDanaController::class,'update']);
Route::delete('/sumber_dana/hapus', [SumberDanaController::class, 'destroy']);
Route::get('/sumber_dana/detail/{id}', [SumberDanaController::class,'show']);
});

Route::middleware(['akses:peminta,pengelola'])->group(function () {
    Route::get('/pengajuan', [PengajuanController::class,'index']);
    Route::get('/pengajuan/detail/{id}', [PengajuanController::class,'show']);
    Route::get('/pengajuan/search', [PengajuanController::class,'search']);
    Route::get('/pengajuan/cetak/{id}', [PengajuanController::class,'cetak']);
    Route::get('/pengajuan/logs', [PengajuanController::class,'logs']);
    
    Route::get('/realisasi/cetak', [RealisasiController::class, 'cetak']);
    Route::get('/realisasi/logs', [LogsRealisasiController::class, 'index']);
});

Route::middleware(['akses:peminta'])->group(function () {
    Route::get('/perencanaan/edit/{id}', [PerencanaanController::class,'edit']);
    Route::post('/perencanaan/edit/simpan', [PerencanaanController::class,'update']);
    Route::delete('/perencanaan/hapus', [PerencanaanController::class, 'destroy']);
    Route::get('/profile-peminta/{id}', [PemintaController::class,'profile']);
    
    Route::get('/pengajuan/tambah', [PengajuanController::class,'create']);
    Route::post('/pengajuan/tambah/simpan', [PengajuanController::class,'store']);
    Route::get('/pengajuan/edit/{id}', [PengajuanController::class,'edit']);
    Route::post('/pengajuan/edit/simpan', [PengajuanController::class,'update']);
    Route::delete('/pengajuan/hapus', [PengajuanController::class,'destroy']);
});


Route::get('/logout', [AuthController::class, 'logout']);
// });