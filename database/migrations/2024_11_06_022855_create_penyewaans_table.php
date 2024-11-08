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
        Schema::create('penyewaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alat_id');
            $table->unsignedBigInteger('pelanggan_id');
            $table->date('tgl_sewa');
            $table->date('tgl_kembali');
            $table->integer('total_harga');
            $table->enum('status_penyewaan', ['Sedang Diproses', 'Sedang Berjalan', 'Ditolak', 'Selesai'])->default('Sedang Diproses');
            $table->string('bukti_pembayaran');
            $table->string('alasan_penolakan')->nullable();
            $table->string('bukti_refund')->nullable();
            $table->timestamps();

            $table->foreign('alat_id')->references('id')->on('alat_berats');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaans');
    }
};
