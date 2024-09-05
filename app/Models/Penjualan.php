<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan_obat';

    protected $primaryKey = 'id_penjualan';

    protected $fillable = [
        'kode_penjualan',
        'id_pasien',
        'total_penjualan',
        'created_at'
    ];

}
