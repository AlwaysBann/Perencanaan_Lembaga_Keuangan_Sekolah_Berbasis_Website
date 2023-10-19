<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\TblUserController;

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

// Route::middleware(['guest'])->group(function () {
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'login']);
// });
// Route::middleware(['$akses' == 'super_admin'])->group(function () {
Route::get('/akun', [TblUserController::class, 'index']);
Route::get('/akun/tambah', [TblUserController::class, 'create']);
Route::post('/akun/tambah/simpan', [TblUserController::class, 'store']);
Route::get('/akun/edit/{id}', [TblUserController::class, 'edit']);
Route::post('/akun/edit/simpan', [TblUserController::class, 'update']);
Route::delete('/akun/hapus', [TblUserController::class, 'destroy']);
// });

Route::get('/ruangan', [RuanganController::class,'index']);
Route::get('/ruangan/tambah', [RuanganController::class,'create']);
Route::post('/ruangan/tambah/simpan', [RuanganController::class,'store']);
Route::get('/ruangan/edit/{id}', [RuanganController::class,'edit']);
Route::post('/ruangan/edit/simpan', [RuanganController::class,'update']);
Route::delete('/ruangan/hapus', [RuanganController::class, 'destroy']);


Route::get('/logout', [AuthController::class, 'logout']);