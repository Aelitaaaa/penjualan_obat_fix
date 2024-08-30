<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian_obat';

    protected $primaryKey = 'id_pembelian';

    protected $fillable = [
        'kode_pembelian',
        'kode_obat',
        'kode_suplier',
        'harga_obat',
        'jumlah_pembelian',
        'total_harga',
        'tanggal_pembelian',
    ];

    protected $dates = ['tanggal_pembelian'];
}
