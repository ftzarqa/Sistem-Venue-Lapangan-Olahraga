<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::updateOrCreate(['tim_tuan_rumah' => 'Garuda FC', 'tim_tamu' => 'Elang FC'], [
            'tanggal_tanding' => '2026-10-20',
            'stok_tiket' => 150,
        ]);

        Event::updateOrCreate(['tim_tuan_rumah' => 'Harimau United', 'tim_tamu' => 'Singa Raya'], [
            'tanggal_tanding' => '2026-10-25',
            'stok_tiket' => 45,
        ]);
    }
}