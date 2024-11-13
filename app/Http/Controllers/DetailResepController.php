<?php

namespace App\Http\Controllers;

use App\Models\DetailResep;
use App\Models\Resep;
use App\Models\Obat;
use Illuminate\Http\Request;

class DetailResepController extends Controller
{
    public function index(Request $request)
    {  
       
        $kodeResep = $request->query('kode');

        $detailResep = DetailResep::where('kode_resep', $kodeResep)->get();
        $obat = Obat::all();

        return view('resep.detail_resep',compact('detailResep', 'obat', 'kodeResep'));
    }

    public function create()
    {
        $resep = Resep::all();
    
        return view('detail_resep.create', compact('resep', 'obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'total' => 'required',
            'keterangan' => 'required',
            'kode_obat' => 'required',
            'jumlah_obat' => 'required|integer'
        ]);
    
        // Cari obat berdasarkan kode_obat
        $obat = Obat::where('kode_obat', $request->kode_obat)->first();
    
        // Validasi stok obat
        if (!$obat || $obat->jumlah_obat < $request->jumlah_obat) {
            return redirect()->back()->with('error', 'Stok obat tidak mencukupi');
        }
    
        // Kurangi stok obat
        $obat->jumlah_obat -= $request->jumlah_obat;
        $obat->save();
    
        // Simpan detail resep
        $detail = DetailResep::create($request->all());
    
        return redirect()->route('detail_resep.index', ['kode' => $detail->kode_resep])->with('success', 'Detail resep berhasil ditambahkan');
    }    
    

    public function update(Request $request, DetailResep $detailResep)
    {
        $request->validate([
            'resep_id' => 'required',
            'obat_id' => 'required',
            'jumlah_obat' => 'required|integer',
            'dosis' => 'required|string',
            'harga_satuan' => 'required|numeric',
        ]);

        $detailResep->update($request->all());
        return redirect()->route('detail_resep.index')->with('success', 'Detail resep berhasil diperbarui');
    }

    public function destroy(DetailResep $detailResep)
{
    // Cari data obat berdasarkan kode_obat di detail resep
    $obat = Obat::where('kode_obat', $detailResep->kode_obat)->first();

    if ($obat) {
        // Kembalikan stok obat
        $obat->jumlah_obat += $detailResep->jumlah_obat;
        $obat->save();
    }

    // Hapus detail resep
    $detailResep->delete();

    return redirect()->back()->with('success', 'Detail resep berhasil dihapus');
}

}
