<?php

// In ObatController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Suplier;

class ObatController extends Controller
{
    public function index()
{
    $obat = Obat::all();
    $suplier = Suplier::all(); // Ambil data suplier
    return view('obat.index', compact('obat', 'suplier')); // Kirim data obat dan suplier ke view
}

    public function create()
    {
        $suplier = Suplier::all();
        return view('obat.create', compact('suplier')); 
    }


}
