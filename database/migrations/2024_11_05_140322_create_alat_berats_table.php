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
        Schema::create('alat_berats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_alat');
            $table->string('thumbnail');
            $table->string('kapasitas');
            $table->integer('harga_sewa');
            $table->enum('status_ketersediaan', ['Tersedia', 'Disewakan', 'Maintenance'])->default('Tersedia');
            $table->string('tahun_pembuatan');
            $table->longText('deskripsi');
            $table->string('lokasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_berats');
    }
};
