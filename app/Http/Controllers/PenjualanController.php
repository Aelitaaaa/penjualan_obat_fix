<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailResep;
use App\Exports\PenjualanExport;
use Maatwebsite\Excel\Facades\Excel;




class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = DetailResep::all();

        return view('penjualan.index', compact('penjualan'));
        
    }
        public function export()
    {
         return Excel::download(new PenjualanExport, 'Data Penjualan Obat.xlsx');
    }
}
