<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    use HasFactory;

    protected $table = 'pemeliharaans';

    protected $fillable = [
        'alat_id',
        'tgl_servis',
        'deskripsi',
        'biaya_servis',
        'status_pemeliharaan',
    ];

    public function alat()
    {
        return $this->belongsTo(AlatBerat::class, 'alat_id');
    }
}
