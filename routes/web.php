<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::resource('/kecamatan', App\Http\Controllers\KecamatanController::class)->names([
    'index' => 'kecamatan.index',
]);
