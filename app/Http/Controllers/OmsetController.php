<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Carbon\Carbon;
use Illuminate\Http\Request;


class OmsetController extends Controller
{
    public function index(Request $request){
        $start = $request->query('dari_tanggal');
        $end = $request->query('sampai_tanggal');
        $data = collect();

        if($start && $end){
            $data = Pembelian::whereBetween("created_at", [
                $start = Carbon::parse($start)->startOfDay(),
                $end = Carbon::parse($end)->endOfDay()      
             ])->get();
        }

        $total_modal = $data->sum('total_pembelian');
      


        return view("omset.index", [
            'data' => $data,
            'start' => $start,
            'end' => $end,
            'total_modal' => $total_modal,
          
        ]);
    }
}


