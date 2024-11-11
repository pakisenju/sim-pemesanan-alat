<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;

    protected $table = 'penyewaans';

    protected $fillable = [
        'alat_id',
        'pelanggan_id',
        'tgl_sewa',
        'tgl_kembali',
        'total_harga',
        'bukti_pembayaran',
        'status_penyewaan',
        'lokasi_penyewaan',
        'alasan_penolakan',
        'bukti_refund',
    ];

    public function alat()
    {
        return $this->belongsTo(AlatBerat::class, 'alat_id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
}
