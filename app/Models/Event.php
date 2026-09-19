<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'tim_tuan_rumah',
        'tim_tamu',
        'tanggal_tanding',
        'stok_tiket',
    ];

    protected $casts = [
        'tanggal_tanding' => 'date',
    ];
}