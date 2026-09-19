<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\ProfileController;
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
Route::get('/tiket/{id}', function ($id) {
    $event = Event::findOrFail($id);

    return "<h1>Halaman Pemesanan Tiket</h1><p>Anda sedang memproses pembelian tiket untuk: <b>{$event->tim_tuan_rumah} vs {$event->tim_tamu}</b></p><a href='/'>Kembali ke Beranda</a>";
})->middleware('auth')->name('tiket.show');

require __DIR__.'/auth.php';

// ==================== ADMIN ====================

Route::get('/admin/login', [AdminAuthController::class, 'create'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'store']);
Route::post('/admin/logout', [AdminAuthController::class, 'destroy'])->name('admin.logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('events', AdminEventController::class)->except(['show']);
});