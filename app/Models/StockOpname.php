<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    protected $table = 'stock_opname'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key tabel
    public $timestamps = false; // Jika tabel tidak memiliki kolom created_at dan updated_at
    
    // Tentukan kolom yang dapat diisi secara massal jika diperlukan
    protected $fillable = [
        'tanggal_obat',
        'kode_obat',
        'jumlah_obat',
        'jumlah_fisik',
        'minus',
        'harga',
        'total_kerugian',
    ];
}
