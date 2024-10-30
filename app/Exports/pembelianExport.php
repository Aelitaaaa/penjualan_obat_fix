<?php

namespace App\Exports;

use App\Models\DetailPembelian;
use App\Models\Pembelian;
use App\Models\Obat;
use App\Models\Suplier;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class pembelianExport implements FromView
{
    public function view(): View
    {
    
        // Ambil data detail pembelian dengan relasi obat
        $request = DetailPembelian::all();
      
        return view('export.pembelian', ['detailPembelian' => $request]);
    }

}
