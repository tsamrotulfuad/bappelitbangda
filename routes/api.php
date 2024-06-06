<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OpdController;
use App\Http\Controllers\Admin\UrusanController;
use App\Http\Controllers\Admin\RPJMD\SasaranController;

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

Route::get('/urusan', [UrusanController::class, 'data_urusan'])->name('urusan.data');
Route::get('/perangkat-daerah', [OpdController::class, 'data_perangkatdaerah'])->name('perangkatdaerah.data');