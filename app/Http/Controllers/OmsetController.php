<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;

class OmsetController extends Controller
{
    public function index(Request $request){
        $start = $request->query('dari_tanggal');
        $end = $request->query('sampai_tanggal');
        $data = collect();

        if($start && $end){
            $data = Pembelian::whereBetween("created_at", [$start, $end])->get();
        }


        return view("omset.index",["data"=> $data]);
    }
}


