<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OpdController;
use App\Http\Controllers\Admin\MisiController;
use App\Http\Controllers\Admin\VisiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SasaranController;
use App\Http\Controllers\Admin\TujuanController;

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
    Route::resource('opds', OpdController::class);
    Route::resource('visi', VisiController::class);
    Route::resource('misi', MisiController::class);
    Route::resource('tujuan', TujuanController::class);
    Route::resource('sasaran', SasaranController::class);
});