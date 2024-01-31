<?php

use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\MahasiswaController;
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

Route::get( '/', [ MahasiswaController::class, 'index' ] )->name('pilih-beasiswa');
Route::resource('daftar', BeasiswaController::class);
Route::get('hasil', [ MahasiswaController::class, 'hasil' ] )->name('hasil');
