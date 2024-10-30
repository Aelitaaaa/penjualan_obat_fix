<?php
namespace App\Exports;

use App\Models\Pembelian;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class laporanExport implements FromView
{
    private $start;
    private $end;

    public function __construct($start, $end)
    {
        $this->start = Carbon::parse($start);
        $this->end = Carbon::parse($end);
    }

    public function view(): View
    {
        
        $pembelian = Pembelian::whereBetween('created_at', [
            $this->start, 
            $this->end
        ])->get();

        $total_modal = Pembelian::whereBetween('created_at', [
            $this->start,
            $this->end
        ])->sum('total_pembelian');

        return view('export.omset', [
            'data' => $pembelian, 
            'start' => $this->start,
            'end' => $this->end,
            'total_modal' => $total_modal
    ]);
    }
}
