<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'suplier';

    // Primary key dari tabel
    protected $primaryKey = 'id_suplier';

    // Tentukan kolom-kolom yang bisa diisi
    protected $fillable = ['kode_suplier', 'nama_suplier', 'alamat', 'nomor_telepon'];

    // Jika primary key tidak auto-increment (jika kode_suplier digunakan juga), bisa tambahkan ini
    public $incrementing = true;
}
