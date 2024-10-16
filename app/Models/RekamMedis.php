<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RekamMedis extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'id_jadwal',
        'diagnosis',
        'tindakan'
    ];

    public function pasien(){
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }
    
    public function dokter(){
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    public function resep()
    {
        return $this->hasOne(Resep::class, 'id_rekam_medis');
    }

    public function jadwal()
    {
        return $this->belongsTo( Jadwal::class, 'id_jadwal');
    }
}
