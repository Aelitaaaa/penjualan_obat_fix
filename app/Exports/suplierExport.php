<?php

namespace App\Exports;

use App\Models\Suplier;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class suplierExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $request = Suplier::all();
        return view('export.suplier', ['supliers' => $request]);
    }
}
