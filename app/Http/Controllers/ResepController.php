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
        $resep = Resep::all();
        $rekamMedis = RekamMedis::whereDoesntHave('resep')->get();
        $obat = Obat::all(); 

        return view('resep', compact('resep', 'rekamMedis', 'obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_resep' => 'required',
            'nama_obat' => 'required',
            'id_rekam_medis' => 'required',
        ]);

        Resep::create($request->all());

        return redirect()->route('resep.index');
        
    }

    public function update(Request $request, $kode_resep)
    {
        // dd($request);

        $request->validate([
            'nama_resep' => 'required',
            'nama_obat' => 'required',
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
