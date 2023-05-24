<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/daftar_mahasiswa', 'App\Http\Controllers\MahasiswaController@index');

Route::get('/daftar_mahasiswa', [MahasiswaController::class, 'index']);
//Route::post('/detail_mahasiswa', [MahasiswaController::class, 'detail_mhs']);

//Route::match(['get', 'post'], '/detail_mahasiswa', [MahasiswaController::class, 'detail_mhs']);

Route::view('/detail_mahasiswa', 'detail_mahasiswa');

Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::get('/admin/postingan', [AdminController::class, 'show_postingan']);
Route::get('/admin/postingan/{id}/edit', [AdminController::class, 'edit_post'])->name('posts.edit');
Route::put('/admin/postingan/{id}', [AdminController::class, 'update_post'])->name('posts.update');
Route::delete('/admin/postingan/{id}', [AdminController::class, 'delete_post'])->name('posts.delete');
Route::get('/admin/arsip', [AdminController::class, 'show_arsip']);
Route::get('/admin/create_post', [AdminController::class, 'create_post']);
Route::post('/admin/store_post', [AdminController::class, 'store_post']);
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);