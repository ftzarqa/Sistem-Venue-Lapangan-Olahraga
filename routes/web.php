<?php

use App\Http\Controllers\AlatOlahragaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route utama mengarah langsung ke daftar alat olahraga
Route::get('/', [AlatOlahragaController::class, 'index']);

// Resource route CRUD alat olahraga tanpa proteksi middleware
Route::resource('alat-olahraga', AlatOlahragaController::class);
