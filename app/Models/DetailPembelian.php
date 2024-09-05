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
        return $this->belongsTo(Pembelian::class, 'kode_pembelian', 'id_pembelian');
    }

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($detailPembelian) {
            $totalPembelian = DetailPembelian::where('kode_pembelian', $detailPembelian->kode_pembelian)
                ->sum('subtotal');

            Pembelian::where('kode_pembelian', $detailPembelian->kode_pembelian)
                ->update(['total_pembelian' => $totalPembelian]);
        });

        static::deleted(function ($detailPembelian) {
            $totalPembelian = DetailPembelian::where('kode_pembelian', $detailPembelian->kode_pembelian)
                ->sum('subtotal');

            Pembelian::where('kode_pembelian', $detailPembelian->kode_pembelian)
                ->update(['total_pembelian' => $totalPembelian]);
        });
    }

}
