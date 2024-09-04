<?php

namespace App\Http\Controllers;

use App\Models\StockOpname;
use Illuminate\Http\Request;

class StockOpnameController extends Controller
{
    public function index()
    {
        $stockOpnames = StockOpname::all();
        return view('opname', compact('stockOpnames')); 
    }
}

