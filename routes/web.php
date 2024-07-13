<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
use App\Http\Controllers\Admin\RPJMD\UploadController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// RPJMD
Route::get('/rpjmd/dokumen', [UploadController::class, 'index'])->name('rpjmd.index');
Route::get('/rpjmd/dokumen/tampil', [UploadController::class, 'rpjmd_dokumen_tampil'])->name('rpjmd.dokumen.tampil');
Route::get('/rpjmd/dokumen/{id}/show', [UploadController::class, 'rpjmd_dokumen_show'])->name('rpjmd.dokumen.show'); // rpjmd download

// RKPD
Route::get('/rkpd/dokumen', [App\Http\Controllers\Admin\RKPD\UploadController::class, 'index'])->name('rkpd.index');
Route::get('/rkpd/dokumen/tampil', [App\Http\Controllers\Admin\RKPD\UploadController::class, 'rkpd_dokumen_tampil'])->name('rkpd.dokumen.tampil');
Route::get('/rkpd/dokumen/{id}/show', [App\Http\Controllers\Admin\RKPD\UploadController::class, 'rkpd_dokumen_show'])->name('rkpd.dokumen.show'); // rpjmd download

// LKPJ
Route::get('/lkpj/dokumen', [App\Http\Controllers\Admin\LKPJ\UploadController::class, 'index'])->name('lkpj.index');
Route::get('/lkpj/dokumen/tampil', [App\Http\Controllers\Admin\LKPJ\UploadController::class, 'lkpj_dokumen_tampil'])->name('lkpj.dokumen.tampil');
Route::get('/lkpj/dokumen/{id}/show', [App\Http\Controllers\Admin\LKPJ\UploadController::class, 'lkpj_dokumen_show'])->name('lkpj.dokumen.show'); // rpjmd download

//Pokin 
Route::get('/pokin/struktur', [PokinController::class, 'index'])->name('pokin.struktur');
Route::get('/pokin/pd/struktur', [PokinController::class, 'pd_index'])->name('pokin.pd.struktur');
//
Route::get('/pokin/struktur/tema1', [PokinController::class, 'pokin_tema1'])->name('pokin.tema1');
Route::get('/pokin/struktur/tema2', [PokinController::class, 'pokin_tema2'])->name('pokin.tema2');
Route::get('/pokin/struktur/tema3', [PokinController::class, 'pokin_tema3'])->name('pokin.tema3');
Route::get('/pokin/struktur/tema4', [PokinController::class, 'pokin_tema4'])->name('pokin.tema4');
//
Route::get('/pokin/kota/dokumen', [PokinController::class, 'pokin_kota_dokumen'])->name('pokin.kota.dokumen');
Route::get('/pokin/tematik/dokumen', [PokinController::class, 'pokin_tematik_dokumen'])->name('pokin.tematik.dokumen');
Route::get('/pokin/tematik/rb/dokumen', [PokinController::class, 'pokin_rb_dokumen'])->name('pokin.rb.dokumen');
Route::get('/pokin/perangkatdaerah/dokumen', [PokinController::class, 'pokin_pd_dokumen'])->name('pokin.perangkatdaerah.dokumen');
//
Route::get('/pokin/kota/tampil', [PokinController::class, 'pokin_kota_tampil'])->name('pokin.kota.tampil'); // Pokin Perangkat Daerah
Route::get('/pokin/tematik/tampil', [PokinController::class, 'pokin_tematik_tampil'])->name('pokin.tematik.tampil'); // Pokin Tematik
Route::get('/pokin/tematik/rb/tampil', [PokinController::class, 'pokin_rb_tampil'])->name('pokin.rb.tampil'); // Pokin RB Tematik
Route::get('/pokin/perangkatdaerah/tampil', [PokinController::class, 'pokin_perangkatdaerah_tampil'])->name('pokin.perangkatdaerah.tampil'); // Pokin Perangkat Daerah
//
Route::get('/pokin/dokumen/{id}/show', [PokinController::class, 'pokin_dokumen_show'])->name('pokin.dokumen.show'); // pokin download
Route::get('/pokin/dokumen/{id}/preview', [PokinController::class, 'pokin_dokumen_preview'])->name('pokin.dokumen.preview'); // pokin preview

//Cascading
Route::get('/cascading/dokumen', [CascadingController::class, 'cascading_dokumen'])->name('cascading.dokumen');
Route::get('/cascading/dokumen/tampil', [CascadingController::class, 'cascading_dokumen_tampil'])->name('cascading.dokumen.tampil');
Route::get('/cascading/dokumen/{id}/show', [CascadingController::class, 'cascading_dokumen_show'])->name('cascading.dokumen.show'); // cascading download
Route::get('/cascading/dokumen/{id}/preview', [CascadingController::class, 'cascading_dokumen_preview'])->name('cascading.dokumen.preview'); // cascading preview

//Manual Indikator
Route::get('/manual_indikator/dokumen', [ManualIndikatorController::class, 'manual_indikator_dokumen'])->name('manual.indikator.dokumen');
Route::get('/manual_indikator/tampil', [ManualIndikatorController::class, 'manual_indikator_tampil'])->name('manual.indikator.tampil');
Route::get('/manual_indikator/dokumen/{id}/show', [ManualIndikatorController::class, 'manual_indikator_show'])->name('manual.indikator.show'); // manual indikator download
Route::get('/manual_indikator/dokumen/{id}/preview', [ManualIndikatorController::class, 'manual_indikator_preview'])->name('manual.indikator.preview'); // manual indikator preview

// Admin Controller
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // RPJMD Upload
    Route::get('/rpjmd/upload', [UploadController::class, 'upload_menu'])->name('upload.rpjmd.menu');
    Route::post('/rpjmd/dokumen/store', [UploadController::class, 'rpjmd_dokumen_store'])->name('rpjmd.dokumen.store');

    // RKPD Upload
    Route::get('/rkpd/upload', [App\Http\Controllers\Admin\RKPD\UploadController::class, 'upload_menu'])->name('upload.rkpd.menu');
    Route::post('/rkpd/dokumen/store', [App\Http\Controllers\Admin\RKPD\UploadController::class, 'rkpd_dokumen_store'])->name('rkpd.dokumen.store');
    
    // RKPD Upload
    Route::get('/lkpj/upload', [App\Http\Controllers\Admin\LKPJ\UploadController::class, 'upload_menu'])->name('upload.lkpj.menu');
    Route::post('/lkpj/dokumen/store', [App\Http\Controllers\Admin\LKPJ\UploadController::class, 'lkpj_dokumen_store'])->name('lkpj.dokumen.store'); 

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