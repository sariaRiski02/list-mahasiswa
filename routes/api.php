<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswaController;
use App\Http\Middleware\MahasiswaTokenMiddleware;

Route::post('/register', [mahasiswaController::class, 'register']);
Route::post('/login', [mahasiswaController::class, 'login']);


Route::middleware(MahasiswaTokenMiddleware::class)->group(function () {
    Route::get('/mahasiswa', [mahasiswaController::class, 'allMahasiswa']);
    Route::get('/mahasiswa/{id}', [mahasiswaController::class, 'getMahasiswa']);
    Route::post('/mahasiswa', [mahasiswaController::class, 'createMahasiswa']);
    Route::put('/mahasiswa/{id}', [mahasiswaController::class, 'updateMahasiswa']);
    Route::delete('/mahasiswa/{id}', [mahasiswaController::class, 'deleteMahasiswa']);
});
