<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RPJMD\MisiController;
use App\Http\Controllers\Admin\RPJMD\ProgramController;
use App\Http\Controllers\Admin\RPJMD\VisiController;
use App\Http\Controllers\Admin\RPJMD\TujuanController;
use App\Http\Controllers\Admin\RPJMD\SasaranController;
use App\Http\Controllers\Admin\UrusanController;
use App\Http\Controllers\Admin\OpdController;

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

    //Program
    Route::get('/program/indikator/{id}', [ProgramController::class, 'indikator'])->name('program.indikator');

    Route::resource('program', ProgramController::class);
    Route::resource('opds', OpdController::class);
    Route::resource('urusan', UrusanController::class);
    Route::resource('visi', VisiController::class);
    Route::resource('misi', MisiController::class);
    Route::resource('tujuan', TujuanController::class);
});