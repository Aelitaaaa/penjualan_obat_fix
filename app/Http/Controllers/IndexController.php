<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Pembelian;
use App\Models\Dokter;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $obat = Obat::count();
        $pasien = Pasien::count();
        $pembelian = Pembelian::count();
        $dokter = Dokter::count();

        return view("index", compact('obat', 'pasien', 'pembelian', 'dokter'));
    }
}
