<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\DetailResep;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\modalExport;
use App\Exports\omsetExport;
use App\Exports\labaExport;
use Maatwebsite\Excel\Facades\Excel;

class OmsetController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->query('dari_tanggal');
        $end = $request->query('sampai_tanggal');
        $data_pembelian = collect();
        $data_penjualan = collect();

        if ($start && $end) {
            $data_pembelian = Pembelian::whereBetween("created_at", [
                $start = Carbon::parse($start)->startOfDay(),
                $end = Carbon::parse($end)->endOfDay()
            ])->get();
        }

        if ($start && $end) {
            $data_penjualan = DetailResep::whereBetween("created_at", [
                $start = Carbon::parse($start)->startOfDay(),
                $end = Carbon::parse($end)->endOfDay()
            ])->get();
        }

        $total_modal = $data_pembelian->sum('total_pembelian');

        $omset = $data_penjualan->sum('total');

        $laba = $omset - $total_modal;
        
        return view("omset.index", [
            'data_pembelian' => $data_pembelian,
            'data_penjualan' => $data_penjualan,
            'start' => $start,
            'end' => $end,
            'total_modal' => $total_modal,
            'omset' => $omset,
            'laba' => $laba,
        ]);
    }

    public function exportModal(Request $request)
    {
        $start = $request->query('dari_tanggal');
        $end = $request->query('sampai_tanggal');
        $nama_modal = 'laporan_HPP (' . date('d-m-Y') . ').xlsx';

        return Excel::download(new modalExport($start, $end), $nama_modal);
        
    }

    public function exportOmset(Request $request)
    {
        $start = $request->query('dari_tanggal');
        $end = $request->query('sampai_tanggal');
        $nama_omset = 'laporan_omset (' . date('d-m-Y') . ').xlsx';

        return Excel::download(new omsetExport($start, $end), $nama_omset);
        
    }

    public function exportLaba(Request $request)
    {
        $start = $request->query('dari_tanggal');
        $end = $request->query('sampai_tanggal');
        $nama_laba = 'laporan_laba_kotor (' . date('d-m-Y') . ').xlsx';

        return Excel::download(new labaExport($start, $end), $nama_laba);
        
    }
}
