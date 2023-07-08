<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LacakController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\UnitController;
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
    return view('auth.login');
});

// Route::get('/', [DashboardController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => 'isLogin', 'prefix' => 'master', 'as' => 'master.'], function () {
    // Route::get('/karyawan', [MasterController::class, 'index'])->name('karyawan.index');
    // add method to resource
    Route::patch('karyawan/{$id}', [KaryawanController::class, 'reset'])->name('karyawan.reset');
    Route::resource('karyawan', KaryawanController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('status', StatusController::class);
});


Route::group(['middleware' => 'isLogin', 'prefix' => 'tiket', 'as' => 'tiket.'], function () {
    Route::resource('new', TiketController::class);
    Route::resource('order', OrderController::class);

    // untuk selesai
    Route::put('orderend/{id}', [OrderController::class, 'end'])->name('order.end');
    Route::get('order/{id}/finish', [OrderController::class, 'finish'])->name('order.finish');
});


Route::resource('lacak', LacakController::class)->middleware('isLogin');
Route::get('search', [LacakController::class, 'search'])->name('search')->middleware('isLogin');


require __DIR__ . '/auth.php';
