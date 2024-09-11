<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    protected $table = 'stock_opname';
    protected $primaryKey = 'id_opname'; 
    
    
    protected $fillable = [
        'kode_obat',
        'jumlah_sistem',
        'jumlah_fisik',
        'minus',
        'harga_obat',
        'total_kerugian',
        'tanggal_opname',
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'kode_obat', 'kode_obat');
    }
}
