<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class laporanExport implements FromView
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
        $pembayaran = Pembayaran::whereBetween('created_at', [
            $this->start, 
            $this->end
        ])->get();

        return view('export.laporan', [
            'data' => $pembayaran, 
            'start' => $this->start,
            'end' => $this->end,
    ]);
    }
}
