<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_dokter',
        'tanggal',
        'waktu',
        'hari',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }
}

