<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HcLokerController;
use App\Http\Controllers\LaporanController;
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

Route::get('/client', [ClientController::class, 'index'])->name('client');
Route::get('/client/form-syarat', [ClientController::class, 'formSyarat'])->name('client.form.syarat');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/laporan/pengunjung', [LaporanController::class, 'pengunjung'])->name('laporan.pengunjung');

    Route::resource('karyawan', MasterKaryawanController::class);
    Route::get('karyawan/{id}/delete', [MasterKaryawanController::class, 'delete'])->name('karyawan.delete');

    Route::resource('hc/loker', HcLokerController::class);
    Route::get('hc/loker/{id}/delete', [HcLokerController::class, 'delete'])->name('loker.delete');
});
