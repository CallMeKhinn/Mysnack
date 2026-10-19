<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\JajanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/tambah', [KategoriController::class, 'tambah']);
Route::post('/kategori/tambah', [KategoriController::class, 'simpan']);
Route::get('/kategori/hapus/{id}', [KategoriController::class, 'hapus']);
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
Route::post('/kategori/simpan/{id}', [KategoriController::class, 'simpan']);

Route::get('/jajan', [JajanController::class, 'index']);
Route::get('/jajan/tambah', [JajanController::class, 'tambah']);
Route::post('/jajan/tambah', [JajanController::class, 'simpan']);
Route::get('/jajan/hapus/{id}', [JajanController::class, 'hapus']);
Route::get('/jajan/edit/{id}', [JajanController::class, 'edit']);
Route::post('/jajan/simpan/{id}', [JajanController::class, 'simpan']);

Route::get('rekap', [JajanController::class, 'rekap']);