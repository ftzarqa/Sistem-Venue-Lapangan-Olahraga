<?php

use Illuminate\Support\Facades\Route;

// Rute Halaman Utama (Welcome)
Route::get('/', function () {
    $events = [
        (object) [
            'id' => 1,
            'tim_tuan_rumah' => 'Garuda FC',
            'tim_tamu' => 'Elang FC',
            'tanggal_tanding' => '2026-10-20',
            'stok_tiket' => 150
        ],
        (object) [
            'id' => 2,
            'tim_tuan_rumah' => 'Harimau United',
            'tim_tamu' => 'Singa Raya',
            'tanggal_tanding' => '2026-10-25',
            'stok_tiket' => 45
        ]
    ];

    return view('welcome', compact('events'));
});

// Rute Halaman Login Sementara
Route::get('/login', function () {
    return '<h1>Halaman Login</h1><p>Halaman ini masih dalam tahap pengembangan oleh tim.</p><a href="/">Kembali ke Beranda</a>';
});

// Rute Halaman Beli Tiket Sementara
Route::get('/tiket/{id}', function ($id) {
    return '<h1>Halaman Pemesanan Tiket</h1><p>Anda sedang memproses pembelian tiket untuk Pertandingan ID: <b>' . $id . '</b></p><a href="/">Kembali ke Beranda</a>';
});