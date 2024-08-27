<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari nama model
    protected $table = 'stock_opname';

    // Tentukan primary key jika berbeda dari 'id'
    protected $primaryKey = 'id';

    // Tentukan kolom-kolom yang bisa diisi
    protected $fillable = [
        'nama_obat',
        'jumlah',
        'minus',
        'harga',
        'kerugian',
        'tanggal'
    ];
}
