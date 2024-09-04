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
        'kode_suplier', 'kode_obat', 'nama_obat', 'harga_obat', 'jumlah_obat', 'Satuan', 'total_harga_obat'
    ];
}

