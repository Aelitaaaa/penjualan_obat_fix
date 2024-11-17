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
            'nama_resep' => 'required',
            'id_rekam_medis' => 'required',
        ]);

        $resep = Resep::create([
            'kode_resep' => $request->kode_resep,
            'created_at' => now(),
            'nama_resep' => $request->nama_resep,
            'id_rekam_medis' => $request->id_rekam_medis
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
    $resep = Resep::with('detailResep')->findOrFail($kode_resep);

    // Mengembalikan stok obat untuk setiap detail resep
    foreach ($resep->detailResep as $detail) {
        $obat = Obat::where('kode_obat', $detail->kode_obat)->first();
        if ($obat) {
            // Kembalikan stok obat
            $obat->jumlah_obat += $detail->jumlah_obat;
            $obat->save();
        }
    }

    // Hapus resep beserta detail resepnya
    $resep->delete();

    return redirect()->route('resep.index')->with('success', 'Resep Berhasil Dihapus!');
}

}
