<?php

// In ObatController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all(); // Retrieve all obat records
        return view('obat.index', compact('obat')); // Return view with obat data
    }

    // Other methods...
}
