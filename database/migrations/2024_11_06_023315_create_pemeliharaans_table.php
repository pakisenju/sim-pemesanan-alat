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
        Schema::create('pemeliharaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alat_id');
            $table->date('tgl_servis');
            $table->longText('deskripsi');
            $table->integer('biaya_servis');
            $table->enum('status_pemeliharaan', ['Dalam Proses', 'Selesai'])->default('Dalam Proses');
            $table->timestamps();

            $table->foreign('alat_id')->references('id')->on('alat_berats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeliharaans');
    }
};
