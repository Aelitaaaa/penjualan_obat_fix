<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        // Ambil data dari database
        $pasien = Pasien::all();
    
        // Kirim data ke view
        return view('pasien', compact('pasien'));
    }
}
