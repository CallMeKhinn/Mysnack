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

Route::get('/test-db-connection', function () {
    try {
        DB::connection()->getPdo();
        return "Connected successfully to database: " . DB::connection()->getDatabaseName();
    } catch (Exception $e) {
        die("Could not open connection to the database. Please check your configuration. Error: " . $e->getMessage());
    }
});