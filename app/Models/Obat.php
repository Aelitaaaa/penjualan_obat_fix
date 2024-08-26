<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat'; // Nama tabel di database
    protected $primaryKey = 'id_obat'; // Primary Key
    public $timestamps = false; // Jika tabel tidak memiliki kolom created_at dan updated_at

    protected $fillable = [
        'kode_suplier',
        'kode_obat',
        'nama_obat',
        'harga_obat',
        'jumlah_obat',
        'Satuan',
        'total_harga_obat',
    ];
}

