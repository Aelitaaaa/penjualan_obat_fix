<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dokter',
        'id_pasien',
        'tanggal',
        'waktu',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(pasien::class, 'id_pasien');
    }
}

