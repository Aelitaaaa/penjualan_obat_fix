<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    use HasFactory;

   
    protected $table = 'stock_opname';

    
    protected $primaryKey = 'id';

   
    protected $fillable = [
        'nama_obat',
        'jumlah_sistem',
        'jumlah_fisik',
        'minus',
        'harga',
        'kerugian',
        'tanggal'
    ];
}
