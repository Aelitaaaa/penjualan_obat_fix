<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailResep extends Model
{
    use HasFactory;
    protected $table = "detail_resep";

    protected $fillable = [
        'kode_resep',
        'kode_obat',
        'jumlah_obat',
        'harga_satuan',
        'total',
        'keterangan',
        'created_at'
    ];

    public function resep()
    {
        return $this->belongsTo(Resep::class, 'kode_resep');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'kode_obat', 'kode_obat');
    }
}
