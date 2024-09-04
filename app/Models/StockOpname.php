<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    protected $table = 'stock_opname';
    protected $primaryKey = 'id'; 
    public $timestamps = false; 
    
    
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
