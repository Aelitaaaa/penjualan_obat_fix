<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat'; 
    protected $primaryKey = 'id_obat'; 
    public $timestamps = false; 
    
    protected $fillable = [
        'kode_suplier', 
        'kode_obat', 
        'nama_obat', 
        'harga_beli', 
        'harga_jual', 
        'jumlah_obat', 
        'unit', 
    ];

    // Relasi dengan tabel suplier
    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'kode_suplier', 'kode_suplier');
    }

    // Relasi dengan tabel detail_pembelian
    public function detailPembelian()
    {
        return $this->hasMany(DetailPembelian::class, 'kode_obat', 'kode_obat');
    }

    // Override fungsi boot untuk cascading delete
    protected static function boot()
    {
        parent::boot();

        // Menghapus entri di detail_pembelian jika obat dihapus
        static::deleting(function ($obat) {
            $obat->detailPembelian()->delete();
        });
    }

    public function stockOpnames()
    {
        return $this->hasMany(StockOpname::class, 'kode_obat', 'kode_obat');
    }

    protected static function booted()
    {
        static::deleting(function ($obat) {
            $obat->stockOpnames()->delete();
        });
    }
}
