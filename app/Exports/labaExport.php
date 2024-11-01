<?php

namespace App\Exports;

use App\Models\DetailResep;
use App\Models\Pembelian;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class labaExport implements FromView
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
        
        $data_penjualan = DetailResep::whereBetween('created_at', [
            $this->start, 
            $this->end
        ])->get();

        $data_pembelian = Pembelian::whereBetween('created_at', [
            $this->start,
            $this->end
        ])->get();

        $modal = $data_pembelian->sum('total_pembelian');
        $omset = $data_penjualan->sum('total');
        $laba = $omset - $modal;


        return view('export.laba', [
            'data_penjualan' => $data_penjualan, 
            'data_pembelian' => $data_pembelian, 
            'start' => $this->start,
            'end' => $this->end,
            'modal' => $modal,
            'omset' => $omset,
            'laba' => $laba
    ]);
    }
}
