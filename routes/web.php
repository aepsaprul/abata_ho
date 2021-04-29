<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HcLokerController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\HcLamaranController;
use App\Http\Controllers\HcTrainingController;
use App\Http\Controllers\MasterDivisiController;
use App\Http\Controllers\MasterKaryawanController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('divisi', MasterDivisiController::class);
    Route::get('divisi/{id}/delete', [MasterDivisiController::class, 'delete'])->name('divisi.delete');
    
    Route::get('/laporan/pengunjung', [LaporanController::class, 'pengunjung'])->name('laporan.pengunjung');
    Route::get('/laporan/pengunjung/json', [LaporanController::class, 'pengunjungJson'])->name('laporan.pengunjung.json');

    Route::resource('karyawan', MasterKaryawanController::class);
    Route::get('karyawan/{id}/delete', [MasterKaryawanController::class, 'delete'])->name('karyawan.delete');

    Route::resource('hc/loker', HcLokerController::class);
    Route::get('hc/loker/{id}/delete', [HcLokerController::class, 'delete'])->name('loker.delete');

    Route::resource('hc/lamaran', HcLamaranController::class);
    Route::get('hc/lamaran/{id}/delete', [HcLamaranController::class, 'delete'])->name('lamaran.delete');
    Route::get('hc/lamaran/{id}/rekrutmen', [HcLamaranController::class, 'rekrutmen'])->name('lamaran.rekrutmen');
    Route::get('hc/lamaran/{id}/gagal_interview', [HcLamaranController::class, 'gagalInterview'])->name('lamaran.gagal.interview');
    Route::get('hc/lamaran/{id}/interview', [HcLamaranController::class, 'interview'])->name('lamaran.interview');
    Route::get('hc/lamaran/{id}/gagal', [HcLamaranController::class, 'gagal'])->name('lamaran.gagal');
    Route::get('hc/lamaran/{id}/terima', [HcLamaranController::class, 'terima'])->name('lamaran.terima');
    
    Route::resource('hc/training', HcTrainingController::class);
    Route::get('hc/training/{id}/delete', [HcTrainingController::class, 'delete'])->name('training.delete');
    Route::get('hc/training/data/modul', [HcTrainingController::class, 'datamodul'])->name('training.cek.datamodul');
});
