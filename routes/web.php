<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ObatController, KunjunganController,PengunjungController, RayonController,RombelController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.master');
});

Route::resource('Obat', ObatController::class);
Route::resource('Pengunjung', PengunjungController::class);
Route::resource('Kunjungan', KunjunganController::class);
Route::resource('Rayon', RayonController::class);
Route::resource('Rombel', RombelController::class);
