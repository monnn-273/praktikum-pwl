<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/daftar_mahasiswa', 'App\Http\Controllers\MahasiswaController@index');

Route::get('/daftar_mahasiswa', [MahasiswaController::class, 'index']);
//Route::post('/detail_mahasiswa', [MahasiswaController::class, 'detail_mhs']);

//Route::match(['get', 'post'], '/detail_mahasiswa', [MahasiswaController::class, 'detail_mhs']);

Route::view('/detail_mahasiswa', 'detail_mahasiswa');





