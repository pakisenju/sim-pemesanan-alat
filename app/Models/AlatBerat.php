<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatBerat extends Model
{
    use HasFactory;

    protected $table = 'alat_berats';

    protected $fillable = [
        'nama_alat',
        'thumbnail',
        'kapasitas',
        'harga_sewa',
        'status_ketersediaan',
        'tahun_pembuatan',
        'deskripsi',
        'lokasi',
    ];

    public function penyewaans()
    {
        return $this->hasMany(Penyewaan::class, 'alat_id');
    }

    public function pemeliharaans()
    {
        return $this->hasMany(Pemeliharaan::class, 'alat_id');
    }
}
