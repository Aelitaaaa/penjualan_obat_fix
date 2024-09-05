<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $table = 'detail_penjualan';

    protected $primaryKey = 'id_detail_penjualan';

    protected $fillable = [
        'kode_penjualan',
        'kode_obat',
        'jumlah',
        'harga_satuan',
        'subtotal',
        'total_penjualan',
    ];

}
