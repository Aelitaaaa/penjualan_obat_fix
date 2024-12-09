<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penjualan extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $table = 'penjualan_obat';

    protected $primaryKey = 'id_penjualan';

    protected $fillable = [
        'kode_penjualan',
    ];
}
