<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dari nama model
    protected $table = 'pasien';

    // Tentukan kolom-kolom yang bisa diisi
    protected $fillable = ['nama', 'alamat', 'nomor_telepon'];
}
