<?php

namespace App\Exports;

use App\Models\DetailResep;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class omsetExport implements FromView
{

    private $start;
    private $end;

    public function __construct($start, $end)
    {
        $this->start = Carbon::parse($start)->startOfDay();
        $this->end = Carbon::parse($end)->endOfDay();
    }

    public function view(): View
    {
        
        $penjualan = DetailResep::whereBetween('created_at', [
            $this->start, 
            $this->end
        ])->get();


        $total_omset = $penjualan->sum('total');

        return view('export.omset', [
            'data' => $penjualan, 
            'start' => $this->start,
            'end' => $this->end,
            'total_omset' => $total_omset
    ]);
    }
}
