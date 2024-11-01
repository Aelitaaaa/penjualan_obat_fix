<?php
namespace App\Exports;

use App\Models\Pembelian;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class modalExport implements FromView
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
        
        $pembelian = Pembelian::whereBetween('created_at', [
            $this->start, 
            $this->end
        ])->get();

        $total_modal = Pembelian::whereBetween('created_at', [
            $this->start,
            $this->end
        ])->sum('total_pembelian');

        return view('export.modal', [
            'data' => $pembelian, 
            'start' => $this->start,
            'end' => $this->end,
            'total_modal' => $total_modal
    ]);
    }
}
