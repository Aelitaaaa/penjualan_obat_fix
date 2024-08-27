<?php

namespace App\Http\Controllers;

use App\Models\StockOpname;
use Illuminate\Http\Request;

class StockOpnameController extends Controller
{
    public function index()
    {
        // Ambil data dari database
        $stockOpnames = StockOpname::all();

        // Kirim data ke view
        return view('opname', compact('stockOpnames'));
    }
}
