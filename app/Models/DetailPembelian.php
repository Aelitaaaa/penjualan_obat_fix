<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    use HasFactory;

    protected $table = 'detail_pembelian';

    protected $primaryKey = 'id_detail_pembelian';

    protected $fillable = [
        'kode_pembelian',
        'kode_obat',
        'jumlah',
        'harga_satuan',
        'subtotal',
        'total_pembelian',
        'created_at',
        'updated_at',
    ];

    public function pembelian()
{
    return $this->belongsTo(Pembelian::class, 'kode_pembelian', 'kode_pembelian');
}

}
