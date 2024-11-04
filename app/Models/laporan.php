<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;

    protected $table = "laporan";

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'nama_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(Pasien::class, 'nama');
    }

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'id_rekammedis');
    }

    public function keluhan()
    {
        return $this->belongsTo(RekamMedis::class, 'keluhan');
    }
}
