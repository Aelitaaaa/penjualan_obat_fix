<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Suplier;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();
        $suplier = Suplier::all(); 
        return view('obat.index', compact('obat', 'suplier')); 
    }

    public function create()
    {
        $suplier = Suplier::all();
        return view('obat.create', compact('suplier')); 
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'kode_suplier' => 'required|string|max:7',
        'kode_obat' => 'required|string|max:7|unique:obat,kode_obat', 
        'nama_obat' => 'required|string|max:255',
        'harga_obat' => 'required|numeric|min:0', 
        'jumlah_obat' => 'required|integer|min:1', 
        'unit' => 'required|string|max:15', 
        'total_harga_obat' => 'required|numeric|min:0', 
    ]);

    
    Obat::create([
        'kode_suplier' => $request->kode_suplier,
        'kode_obat' => $request->kode_obat,
        'nama_obat' => $request->nama_obat,
        'harga_obat' => $request->harga_obat,
        'jumlah_obat' => $request->jumlah_obat,
        'Satuan' => $request->unit,
        'total_harga_obat' => $request->total_harga_obat,
    ]);

    
    return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan!');
}


    
public function destroy($id)
{
    $obat = Obat::findOrFail($id); 
    $obat->delete(); 

    return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus.');
}

public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'kode_suplier' => 'required|string|max:7',
        'kode_obat' => 'required|string|max:7|unique:obat,kode_obat,' . $id . ',id_obat', 
        'nama_obat' => 'required|string|max:255',
        'harga_obat' => 'required|numeric|min:0', 
        'jumlah_obat' => 'required|integer|min:1', 
        'unit' => 'required|string|max:15', 
        'total_harga_obat' => 'required|numeric|min:0', 
    ]);

    
    $obat = Obat::findOrFail($id);
    $obat->update([
        'kode_suplier' => $request->kode_suplier,
        'kode_obat' => $request->kode_obat,
        'nama_obat' => $request->nama_obat,
        'harga_obat' => $request->harga_obat,
        'jumlah_obat' => $request->jumlah_obat,
        'Satuan' => $request->unit,
        'total_harga_obat' => $request->total_harga_obat,
    ]);

    return redirect()->route('obat.index')->with('success', 'Obat berhasil diperbarui!');
}

}
