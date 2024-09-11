<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    use HasFactory;

   
    protected $table = 'suplier';

        protected $primaryKey = 'id_suplier';

    
    protected $fillable = [
        'kode_suplier', 
        'nama_suplier', 
        'alamat', 
        'nomor_telepon',
        'created_at',
        'updated_at',
    ];

   
    public $incrementing = true;
}
