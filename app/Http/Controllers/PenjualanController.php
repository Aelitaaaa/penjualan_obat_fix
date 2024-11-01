<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailResep;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = DetailResep::all();

        return view('penjualan.index', compact('penjualan'));
        
    }
}
