<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
//namespace controllernya
use App\Http\Controllers\KaryawanController;


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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [DashboardController::class, 'index']);

// Route::get('/master/karyawan', [MasterController::class, 'index']);

Route::group(['prefix' => 'master', 'as' => 'master.'], function () {
    // Route::get('/karyawan', [MasterController::class, 'index'])->name('karyawan.index');
    // add method to resource
    // Route::get('karyawan/details/', [KaryawanController::class, 'details'])->name('karyawan.details');
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('dataunit', \App\Http\Controllers\DataUnitController::class);
});
