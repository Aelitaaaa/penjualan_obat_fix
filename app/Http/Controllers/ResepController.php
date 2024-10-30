<?php
namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Obat;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function index()
    {
        $resep = Resep::with('detailResep.obat')->get();

        // dd($resep);
        // $resep = Resep::with('detailResep')->get();
        $rekamMedis = RekamMedis::whereDoesntHave('resep')->get();
        $obat = Obat::all(); 

        return view('resep.resep', compact('resep', 'rekamMedis', 'obat'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'kode_resep' => 'required',
            'nama_resep' => 'required',
            'id_rekam_medis' => 'required',
        ]);

        $resep = Resep::create([
            'kode_resep' => $request->kode_resep,
            'created_at' => now(),
        ]);


        return redirect()->route('resep.index', ['kode' => $resep->kode_resep]);
        
    }

    public function update(Request $request, $kode_resep)
    {
        $request->validate([
            'nama_resep' => 'required',
            'id_rekam_medis' => 'required',
        ]);

        $resep = Resep::findOrFail($kode_resep);
        $resep->update($request->all());

        return redirect()->route('resep.index');
    }

    public function destroy($kode_resep)
    {
        $resep = Resep::findOrFail($kode_resep);
        $resep->delete();

        return redirect()->route('resep.index');
    }
}
