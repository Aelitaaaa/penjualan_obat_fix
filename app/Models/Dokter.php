<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'spesialis',
        'telp',
        'tarif'
    ];

    public function rekamMedis(){
        return $this->hasMany(RekamMedis::class, 'id_dokter');
    }
    public function jadwals(){
        return $this->hasMany(Jadwal::class, 'id_dokter');
    }
}
