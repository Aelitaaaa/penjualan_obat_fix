<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    use HasFactory;

    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'no_rekam_medis',
        'id_resep',
        'total_biaya',
    ];
}
