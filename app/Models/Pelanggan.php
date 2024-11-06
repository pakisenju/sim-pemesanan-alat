<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';

    protected $fillable = [
        'user_id',
        'nama',
        'nomor_telepon',
        'alamat',
        'instansi',
    ];

    public function penyewaans()
    {
        return $this->hasMany(Penyewaan::class, 'pelanggan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
