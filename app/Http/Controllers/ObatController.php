<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat; 

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all(); 
        return view('obat', compact('obat')); 
    }
}
