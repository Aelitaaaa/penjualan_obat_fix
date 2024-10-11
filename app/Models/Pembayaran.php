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
        'id_rekammedis',
        'total_biaya',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'id_rekammedis');
    }
}