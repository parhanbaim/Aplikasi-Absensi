<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('absensi', AbsensiController::class);
Route::resource('siswa', SiswaController::class);
