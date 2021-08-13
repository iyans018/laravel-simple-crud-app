<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InformasiKampusController;
use App\Http\Controllers\TahunAkademikController;


Route::get('/', function() {
    return view('siakad.home');
});

Route::get('informasi', [InformasiKampusController::class, 'informasiKampus']);
Route::put('informasi', [InformasiKampusController::class, 'updateInformasiKampus']);

Route::get('thnakademik', [TahunAkademikController::class, 'Thnakademik']);
Route::post('thnakademik', [TahunAkademikController::class, 'createThnakademik']);
Route::get('thnakademik/{id}/edit', [TahunAkademikController::class, 'updateThnakademik']);
Route::put('thnakademik/{id}', [TahunAkademikController::class, 'updateProcess']);
Route::delete('thnakademik/{id}', [TahunAkademikController::class, 'deleteThnakademik']);

