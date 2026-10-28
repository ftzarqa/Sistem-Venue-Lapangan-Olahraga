<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatOlahraga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_alat',
        'kategori',
        'kondisi',
        'tarif_sewa',
        'stok',
    ];

    protected $casts = [
        'tarif_sewa' => 'integer',
        'stok' => 'integer',
    ];
}
