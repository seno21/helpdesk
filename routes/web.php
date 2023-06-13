<?php

use App\Http\Controllers\MasterController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});

// Route::get('/master/karyawan', [MasterController::class, 'index']);s

Route::group(['prefix' => 'master', 'as' => 'master.'], function () {
    // Route::get('/karyawan', [MasterController::class, 'index'])->name('karyawan.index');
    Route::resource('karyawan', \App\Http\Controllers\MasterController::class);
    Route::resource('dataunit', \App\Http\Controllers\DataUnitController::class);
});
