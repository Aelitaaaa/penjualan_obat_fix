<?php

namespace App\Exports;

use App\Models\Obat;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class obatExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        $request = Obat::all();
        return view('export.obat', ['obat' => $request]);
    }

}
