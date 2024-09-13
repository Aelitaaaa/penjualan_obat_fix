<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'resep'; 
    protected $primaryKey = 'kode_resep'; 
    
   
    public $timestamps = true;

    
    protected $fillable = [
        'kode_resep',
        'nama_resep',
        'daftar_obat',
        'id_rekam_medis',
    ];

  
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'daftar_obat', 'nama_obat');
    }

    
    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'id_rekam_medis', 'id');
    }
}
