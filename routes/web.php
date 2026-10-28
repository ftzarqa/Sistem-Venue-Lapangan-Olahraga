<?php

use App\Http\Controllers\AlatOlahragaController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect root to dashboard/catalog
Route::get('/', function () {
    return redirect()->route('alat-olahraga.index');
});

// Authentication Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Logout Route (Auth Only)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Protected Routes (Harus Login)
Route::middleware('auth')->group(function () {

    // 1. Dashboard / Daftar Alat (Read Only - Dapat diakses oleh Admin & User)
    Route::get('/alat-olahraga', [AlatOlahragaController::class, 'index'])->name('alat-olahraga.index');

    // 2. Fitur CRUD Khusus Role Admin (Tambah, Edit, Update, Hapus)
    Route::middleware('role:admin')->group(function () {
        Route::get('/alat-olahraga/create', [AlatOlahragaController::class, 'create'])->name('alat-olahraga.create');
        Route::post('/alat-olahraga', [AlatOlahragaController::class, 'store'])->name('alat-olahraga.store');
        Route::get('/alat-olahraga/{alat_olahraga}', [AlatOlahragaController::class, 'show'])->name('alat-olahraga.show');
        Route::get('/alat-olahraga/{alat_olahraga}/edit', [AlatOlahragaController::class, 'edit'])->name('alat-olahraga.edit');
        Route::put('/alat-olahraga/{alat_olahraga}', [AlatOlahragaController::class, 'update'])->name('alat-olahraga.update');
        Route::delete('/alat-olahraga/{alat_olahraga}', [AlatOlahragaController::class, 'destroy'])->name('alat-olahraga.destroy');
    });

});
