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
        'kode_suplier',
        'total_pembelian',
        'created_at'
    ];

    public function detailPembelian()
    {
        return $this->hasMany(DetailPembelian::class, 'kode_pembelian', 'id_detail_pembelian');
    }

}
