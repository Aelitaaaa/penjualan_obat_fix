<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat'; 
    protected $primaryKey = 'id_obat'; 
    public $timestamps = false; 
    
    protected $fillable = [
        'kode_suplier', 
        'kode_obat', 
        'nama_obat', 
        'harga_beli', 
        'harga_jual', 
        'jumlah_obat', 
        'unit', 
        'total_harga_obat', 
        'created_at'
    ];

    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'kode_suplier', 'kode_suplier');
    }
}

