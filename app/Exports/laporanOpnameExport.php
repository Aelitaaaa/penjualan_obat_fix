<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use App\Models\StockOpname;
use Illuminate\Contracts\View\View;

class laporanOpnameExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $request = StockOpname::all();
        return view('export.opname', ['stockOpname' => $request]);
    }
}
