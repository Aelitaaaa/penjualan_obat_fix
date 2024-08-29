<?php

namespace App\Http\Controllers;

use App\Models\StockOpname;
use Illuminate\Http\Request;

class StockOpnameController extends Controller
{
    public function index()
    {
        $stockOpnames = StockOpname::all(); // Mengambil semua data dari tabel opname
        return view('opname', compact('stockOpnames')); // Mengirim data ke view
    }
}

