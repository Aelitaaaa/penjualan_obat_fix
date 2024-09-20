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
    ];

    public function pembelian()
{
    return $this->belongsTo(Pembelian::class, 'kode_pembelian', 'kode_pembelian');
}

public function obat()
{
    return $this->belongsTo(Obat::class, 'kode_obat', 'kode_obat');
}

}
