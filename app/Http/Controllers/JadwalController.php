<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Dokter;
use app\Models\Pasien;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $jadwals = Jadwal::with('pasien', 'dokter')->get();
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('jadwal.index', compact('jadwals', 'pasiens', 'dokters'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
        ]);
    
        Jadwal::create($validatedData);
        return redirect()->route('jadwal.index');
    }

public function edit($id)
{
    
}
public function destroy(Jadwal $jadwal)
{
    $jadwal->delete();
    return redirect()->route('jadwal.index');
}
}
