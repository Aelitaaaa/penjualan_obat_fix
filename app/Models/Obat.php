<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';  

    protected $primaryKey = 'kode_obat'; 

    
    public $incrementing = false;

   
    public $timestamps = false;
}
