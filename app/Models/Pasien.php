<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari nama model
    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';

    // Tentukan kolom-kolom yang bisa diisi
    protected $fillable = [
        'nama_pasien', 
        'jenis_kelamin', 
        'tanggal_lahir',
        'nomor_telepon', 
        'alamat',

    ];

    public function rekamMedis(){
        return $this->hasOne(RekamMedis::class, 'id_pasien');
    }

    public function Jadwals(): HasMany
    {
        return $this->hasMany(Jadwal::class, 'id_pasien');
    }
}
