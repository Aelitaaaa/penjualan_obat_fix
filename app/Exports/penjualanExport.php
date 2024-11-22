<?php

namespace App\Exports;

use App\Models\DetailResep;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PenjualanExport implements FromView
{
    /**
    * @return \Illuminate\Contracts\View\View
    */
    public function view(): View
    {
        $request = DetailResep::all();
      
        return view('export.penjualan', ['detailResep' => $request]);
    }
}
