<?php

use App\Http\Controllers\Admin\CascadingController;
use App\Http\Controllers\Admin\ManualIndikatorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OpdController;
use App\Http\Controllers\Admin\PokinController;
use App\Http\Controllers\Admin\UrusanController;
use App\Http\Controllers\Admin\RPJMD\TujuanController;
use App\Http\Controllers\Admin\RPJMD\ProgramController;
use App\Http\Controllers\Admin\RPJMD\TujuanIndikatorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//tujuan
Route::get('/tujuan', [TujuanController::class, 'tujuan_data'])->name('tujuan.data');

// Urusan
Route::get('/urusan', [UrusanController::class, 'data_urusan'])->name('urusan.data');

// Perangkat Daerah
Route::get('/perangkat-daerah', [OpdController::class, 'perangkatdaerah'])->name('perangkatdaerah.data');

//Tujuan Indikator
Route::get('/tujuan-indikator', [TujuanIndikatorController::class, 'tujuan_indikator_data'])->name('tujuan.indikator.data');
Route::get('/tujuan/indikator/edit/{id}', [TujuanIndikatorController::class, 'edit'])->name('tujuan.indikator.edit');
Route::post('/tujuan/indikator/urusan', [TujuanIndikatorController::class, 'urusan'])->name('tujuan.indikator.urusan');

// Pohon Kinerja
Route::get('/pokin/kota/cari', [PokinController::class, 'pokin_kota_cari'])->name('pokin.kota.cari');
Route::get('/pokin/kota/tema1', [PokinController::class, 'pokin_kota_tema1'])->name('pokin.kota.tema1');
Route::get('/pokin/kota/tema2', [PokinController::class, 'pokin_kota_tema2'])->name('pokin.kota.tema2');
Route::get('/pokin/kota/tema3', [PokinController::class, 'pokin_kota_tema3'])->name('pokin.kota.tema3');
Route::get('/pokin/kota/tema4', [PokinController::class, 'pokin_kota_tema4'])->name('pokin.kota.tema4');
Route::get('/pokin/data/upload', [PokinController::class, 'data_pokin_upload']);

// Cascading
Route::get('/cascading/data/upload', [CascadingController::class, 'data_cascading_upload']);

// Manual Indikator
Route::get('/manual_indikator/data/upload', [ManualIndikatorController::class, 'data_manual_indikator_upload']);