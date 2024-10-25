<?php
namespace App\Exports;

use App\Models\Pembelian;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class laporanExport implements FromView
{
    private $tanggalMulai;
    private $tanggalSelesai;

    public function __construct($tanggalMulai, $tanggalSelesai)
    {
        $this->tanggalMulai = $tanggalMulai;
        $this->tanggalSelesai = $tanggalSelesai;
    }

    public function view(): View
    {
        $pembelian = Pembelian::whereBetween('created_at', [
            $this->tanggalMulai, 
            $this->tanggalSelesai
        ])->get();

        return view('export.omset', ['data' => $pembelian]);
    }
}
