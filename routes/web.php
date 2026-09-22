<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TiketController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

// Rute Halaman Utama (Welcome)
Route::get('/', function () {
    $events = Event::orderBy('tanggal_tanding')->get();

    return view('welcome', compact('events'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute Halaman Beli Tiket — dikunci, wajib login dulu
Route::get('/tiket/{event}', [TiketController::class, 'show'])->middleware('auth')->name('tiket.show');

require __DIR__.'/auth.php';

// ==================== ADMIN ====================

// Admin authentication (login) — hanya untuk guest
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'create'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'store']);
});

// Admin logout — hanya untuk user yang sudah login
Route::post('/admin/logout', [AdminAuthController::class, 'destroy'])
    ->middleware('auth')
    ->name('admin.logout');

// Admin area — wajib login + role admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/dashboard');
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('events', AdminEventController::class)->except(['show']);
});