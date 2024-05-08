<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OpdController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RPJMD\MisiController;
use App\Http\Controllers\Admin\RPJMD\ProgramController;
use App\Http\Controllers\Admin\RPJMD\VisiController;
use App\Http\Controllers\Admin\RPJMD\TujuanController;
use App\Http\Controllers\Admin\RPJMD\SasaranController;
use App\Models\Sasaran;
use App\Models\TujuanIndikator;

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

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // Tujuan
    Route::get('/tujuan/indikator/{id}', [TujuanController::class, 'indikator'])->name('tujuan.indikator');
    Route::post('/tujuan/indikator', [TujuanController::class, 'indikator_store'])->name('tujuan.indikator.store');
    Route::get('/tujuan/indikator/edit/{id}', [TujuanController::class, 'indikator_edit'])->name('tujuan.indikator.edit');
    Route::put('/tujuan/indikator/{id}', [TujuanController::class, 'indikator_update'])->name('tujuan.indikator.update');
    Route::delete('/tujuan/indikator/{id}', [TujuanController::class, 'indikator_delete'])->name('tujuan.indikator.delete');

    // Sasaran
    Route::get('/sasaran/indikator/{id}', [SasaranController::class, 'indikator'])->name('sasaran.indikator');
    Route::post('/sasaran/indikator', [SasaranController::class, 'indikator_store'])->name('sasaran.indikator.store');
    Route::get('/sasaran/indikator/edit/{id}', [SasaranController::class, 'indikator_edit'])->name('sasaran.indikator.edit');
    Route::put('/sasaran/indikator/{id}', [SasaranController::class, 'indikator_update'])->name('sasaran.indikator.update');
    Route::delete('/sasaran/indikator/{id}', [SasaranController::class, 'indikator_delete'])->name('sasaran.indikator.delete');

    //Program

    Route::resource('program', ProgramController::class);
    Route::resource('opds', OpdController::class);
    Route::resource('visi', VisiController::class);
    Route::resource('misi', MisiController::class);
    Route::resource('tujuan', TujuanController::class);
    Route::resource('sasaran', SasaranController::class);
});