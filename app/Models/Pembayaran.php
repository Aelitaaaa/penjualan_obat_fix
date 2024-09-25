<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    use HasFactory;

    protected $fillable = [
        'kode_resep',
        'biaya_dokter',
        'biaya_obat',
    ];
    /**
     * Get the resep that owns the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function resep(): BelongsTo
    {
        return $this->belongsTo(Resep::class, 'kode_resep');
    }
}
