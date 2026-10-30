<?php

namespace Tests\Feature;

use App\Models\AlatOlahraga;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AlatOlahragaTest extends TestCase
{
    use RefreshDatabase;

    public function test_root_loads_index_page(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Daftar Alat Olahraga');
    }

    public function test_can_view_index_page(): void
    {
        $response = $this->get(route('alat-olahraga.index'));
        $response->assertStatus(200);
        $response->assertSee('Daftar Alat Olahraga');
        $response->assertSee('Tambah Alat Baru');
    }

    public function test_can_view_create_page(): void
    {
        $response = $this->get(route('alat-olahraga.create'));
        $response->assertStatus(200);
        $response->assertSee('Tambah Alat Olahraga');
    }

    public function test_can_store_alat_olahraga(): void
    {
        $payload = [
            'nama_alat'  => 'Bola Basket Molten GG7X',
            'kategori'   => 'Bola Basket',
            'kondisi'    => 'Baik',
            'tarif_sewa' => 30000,
            'stok'       => 8,
        ];

        $response = $this->post(route('alat-olahraga.store'), $payload);

        $response->assertRedirect(route('alat-olahraga.index'));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('alat_olahragas', [
            'nama_alat' => 'Bola Basket Molten GG7X',
        ]);
    }

    public function test_validation_fails_when_storing_empty_data(): void
    {
        $response = $this->post(route('alat-olahraga.store'), []);

        $response->assertSessionHasErrors(['nama_alat', 'kategori', 'kondisi', 'tarif_sewa', 'stok']);
    }

    public function test_can_view_edit_page(): void
    {
        $alat = AlatOlahraga::create([
            'nama_alat'  => 'Raket Badminton Yonex',
            'kategori'   => 'Bulu Tangkis',
            'kondisi'    => 'Baik',
            'tarif_sewa' => 25000,
            'stok'       => 5,
        ]);

        $response = $this->get(route('alat-olahraga.edit', $alat->id));
        $response->assertStatus(200);
        $response->assertSee('Raket Badminton Yonex');
    }

    public function test_can_update_alat_olahraga(): void
    {
        $alat = AlatOlahraga::create([
            'nama_alat'  => 'Raket Badminton Yonex',
            'kategori'   => 'Bulu Tangkis',
            'kondisi'    => 'Baik',
            'tarif_sewa' => 25000,
            'stok'       => 5,
        ]);

        $payload = [
            'nama_alat'  => 'Raket Badminton Yonex Nanoray Updated',
            'kategori'   => 'Bulu Tangkis',
            'kondisi'    => 'Sangat Baik',
            'tarif_sewa' => 35000,
            'stok'       => 4,
        ];

        $response = $this->put(route('alat-olahraga.update', $alat->id), $payload);

        $response->assertRedirect(route('alat-olahraga.index'));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('alat_olahragas', [
            'id' => $alat->id,
            'nama_alat' => 'Raket Badminton Yonex Nanoray Updated',
        ]);
    }

    public function test_can_delete_alat_olahraga(): void
    {
        $alat = AlatOlahraga::create([
            'nama_alat'  => 'Matras Yoga Kettler',
            'kategori'   => 'Fitness & Gym',
            'kondisi'    => 'Baik',
            'tarif_sewa' => 15000,
            'stok'       => 3,
        ]);

        $response = $this->delete(route('alat-olahraga.destroy', $alat->id));

        $response->assertRedirect(route('alat-olahraga.index'));
        $response->assertSessionHas('success');
        $this->assertDatabaseMissing('alat_olahragas', [
            'id' => $alat->id,
        ]);
    }
}
