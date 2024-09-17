<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Omset extends Model
{
    use HasFactory;
    protected $table = 'laporan_omset';
    protected $primaryKey = 'id_omset';
}
