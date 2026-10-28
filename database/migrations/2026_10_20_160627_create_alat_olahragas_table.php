<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alat_olahragas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alat');
            $table->string('kategori');
            $table->string('kondisi');
            $table->integer('tarif_sewa');
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_olahragas');
    }
};
