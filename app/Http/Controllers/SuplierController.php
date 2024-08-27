<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index()
    {
        // Ambil data dari database
        $supliers = Suplier::all();
    
        // Kirim data ke view
        return view('suplier', compact('supliers'));
    }
    
}
