<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OpdController;
use App\Http\Controllers\Admin\PokinController;
use App\Http\Controllers\Admin\UrusanController;
use App\Http\Controllers\Admin\CascadingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RPJMD\MisiController;
use App\Http\Controllers\Admin\RPJMD\VisiController;
use App\Http\Controllers\Admin\RPJMD\TujuanController;
use App\Http\Controllers\Admin\RPJMD\ProgramController;
use App\Http\Controllers\Admin\ManualIndikatorController;
use App\Http\Controllers\Admin\RPJMD\TujuanIndikatorController;

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
//Pokin
Route::get('/pokin/struktur', [PokinController::class, 'index'])->name('pokin.struktur');
Route::get('/pokin/struktur/tema1', [PokinController::class, 'pokin_tema1'])->name('pokin.tema1');
Route::get('/pokin/struktur/tema2', [PokinController::class, 'pokin_tema2'])->name('pokin.tema2');
Route::get('/pokin/struktur/tema3', [PokinController::class, 'pokin_tema3'])->name('pokin.tema3');
Route::get('/pokin/struktur/tema4', [PokinController::class, 'pokin_tema4'])->name('pokin.tema4');
Route::get('/pokin/dokumen', [PokinController::class, 'pokin_dokumen'])->name('pokin.dokumen');
Route::get('/pokin/dokumen/tampil', [PokinController::class, 'pokin_dokumen_tampil'])->name('pokin.dokumen.tampil');
Route::get('/pokin/dokumen/{id}/show', [PokinController::class, 'pokin_dokumen_show'])->name('pokin.dokumen.show'); // pokin download

//Cascading
Route::get('/cascading/dokumen', [CascadingController::class, 'cascading_dokumen'])->name('cascading.dokumen');
Route::get('/cascading/dokumen/tampil', [CascadingController::class, 'cascading_dokumen_tampil'])->name('cascading.dokumen.tampil');
Route::get('/cascading/dokumen/{id}/show', [CascadingController::class, 'cascading_dokumen_show'])->name('cascading.dokumen.show'); // cascading download

//Manual Indikator
Route::get('/manual_indikator/dokumen', [ManualIndikatorController::class, 'manual_indikator_dokumen'])->name('manual.indikator.dokumen');
Route::get('/manual_indikator/tampil', [ManualIndikatorController::class, 'manual_indikator_tampil'])->name('manual.indikator.tampil');
Route::get('/manual_indikator/dokumen/{id}/show', [ManualIndikatorController::class, 'manual_indikator_show'])->name('manual.indikator.show'); // manual indikator download

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //Tujuan Indikator
    Route::get('/tujuan/indikator/{id}', [TujuanIndikatorController::class, 'index'])->name('tujuan.indikator');
    Route::post('/tujuan/indikator/{id}', [TujuanIndikatorController::class, 'store'])->name('tujuan.indikator.store');

    //Pohon Kinerja
    Route::get('/pokin/kota', [PokinController::class, 'pokin_kota'])->name('pokin.kota');
    Route::post('/pokin/kota', [PokinController::class, 'pokin_kota_store'])->name('pokin.kota.store');
    Route::get('/pokin/opd', [PokinController::class, 'pokin_opd'])->name('pokin.opd');
    Route::post('/pokin/opd', [PokinController::class, 'pokin_opd'])->name('pokin.opd.store');
    Route::get('/pokin/upload', [PokinController::class, 'upload_view'])->name('pokin.upload.view');
    Route::post('/pokin/dokumen/store', [PokinController::class, 'pokin_dokumen_store'])->name('pokin.dokumen.store');

    // Cascading
    Route::get('/cascading/upload', [CascadingController::class, 'upload_view'])->name('cascading.upload.view');
    Route::post('/cascading/dokumen/store', [CascadingController::class, 'cascading_dokumen_store'])->name('cascading.dokumen.store');

    //Manual Indikator
    Route::get('/manual_indikator/upload', [ManualIndikatorController::class, 'upload_view'])->name('manualindikator.upload.view');
    Route::post('/manual_indikator/dokumen/store', [ManualIndikatorController::class, 'manualindikator_dokumen_store'])->name('manualindikator.dokumen.store');

    Route::resource('program', ProgramController::class);
    Route::resource('opds', OpdController::class);
    Route::resource('urusan', UrusanController::class);
    Route::resource('visi', VisiController::class);
    Route::resource('misi', MisiController::class);
    Route::resource('tujuan', TujuanController::class);
});