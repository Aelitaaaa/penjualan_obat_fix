<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'resep'; 
    protected $primaryKey = 'kode_resep'; 
    
    public $timestamps = true;
    public $incrementing = false;
    protected $keyType = 'char';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->kode_resep = $model->generateCustomId();
        });
    }

    public function generateCustomId()
    {
        $prefix = "AA";

        $lastRecord = self::orderBy('kode_resep', 'desc')->first();
        if (!$lastRecord) {
            $increment = 1;
        } else {
            $lastIncrement = (int)substr($lastRecord->kode_resep, -3);
            $increment = $lastIncrement + 1;
        }

        $incrementString = str_pad($increment, 3, '0', STR_PAD_LEFT);

        return ($prefix  . $incrementString);
    }
    
    protected $fillable = [
        'kode_resep',
        'nama_resep',
        'nama_obat',
        'id_rekam_medis',
    ];

    
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'nama_obat', 'id_obat');
    }

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'id_rekam_medis', 'id');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'kode_resep');
    }

    
    public function detailResep()
    {
        return $this->hasMany(DetailResep::class, 'resep_id', 'kode_resep'); // Menghubungkan ke detail resep
    }
}
