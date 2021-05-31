<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HcCirController;
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

    Route::resource('hc/cir', HcCirController::class);
    Route::get('hc/cir/{id}/delete', [HcCirController::class, 'delete'])->name('cir.delete');
    Route::get('hc/cir/{id}/atasan_approve', [HcCirController::class, 'atasanApprove'])->name('cir.atasan_approve');
    Route::get('hc/cir/{id}/atasan_tolak', [HcCirController::class, 'atasanTolak'])->name('cir.atasan_tolak');
    Route::get('hc/cir/{id}/hc_approve', [HcCirController::class, 'hcApprove'])->name('cir.hc_approve');
    Route::get('hc/cir/{id}/hc_tolak', [HcCirController::class, 'hcTolak'])->name('cir.hc_tolak');

    Route::get('hc/form_resign', [HcCirController::class, 'resignFormIndex'])->name('cir.index_form_resign');
    Route::get('hc/form_resign/{id}/show', [HcCirController::class, 'resignShow'])->name('cir.resign_show');
    Route::get('hc/form_resign/{id}/delete', [HcCirController::class, 'resignDelete'])->name('cir.resign_delete');
    Route::get('hc/form_resign/{id}/atasan_approve', [HcCirController::class, 'resignAtasanApprove'])->name('cir.resign_atasan_approve');
    Route::get('hc/form_resign/{id}/atasan_tolak', [HcCirController::class, 'resignAtasanTolak'])->name('cir.resign_atasan_tolak');
    Route::get('hc/form_resign/{id}/hc_approve', [HcCirController::class, 'resignHcApprove'])->name('cir.resign_hc_approve');
    Route::get('hc/form_resign/{id}/hc_tolak', [HcCirController::class, 'resignHcTolak'])->name('cir.resign_hc_tolak');

    Route::get('hc/cuti', [HcCirController::class, 'indexCuti'])->name('cir.index_cuti');
    Route::get('hc/cuti/create', [HcCirController::class, 'createCuti'])->name('cir.create_cuti');
    Route::post('hc/cuti/store', [HcCirController::class, 'storeCuti'])->name('cir.store_cuti');
    Route::get('hc/resign', [HcCirController::class, 'indexResign'])->name('cir.index_resign');
    Route::get('hc/resign/create', [HcCirController::class, 'createResign'])->name('cir.create_resign');
    Route::post('hc/resign/store', [HcCirController::class, 'storeResign'])->name('cir.store_resign');

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
