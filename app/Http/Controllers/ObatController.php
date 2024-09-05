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
        'kode_suplier' => 'nullable|string|max:7',
        'kode_obat' => 'required|string|max:7|unique:obat,kode_obat', 
        'nama_obat' => 'required|string|max:255',
        'harga_beli' => 'required|numeric|min:0', 
        'harga_jual' => 'required|numeric|min:0', 
        'jumlah_obat' => 'required|integer|min:1', 
        'unit' => 'required|string|max:15',  
        'created_at' => 'nullable|date_format:Y-m-d H:i:s',
    ]);

    
    Obat::create([
        'kode_suplier' => $request->kode_suplier,
        'kode_obat' => $request->kode_obat,
        'nama_obat' => $request->nama_obat,
        'harga_beli' => $request->harga_beli,
        'harga_jual' => $request->harga_jual,
        'jumlah_obat' => $request->jumlah_obat,
        'unit' => $request->unit,
        'created_at' => $request->created_at
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
        'kode_suplier' => 'nullable|string|max:7',
        'kode_obat' => 'required|string|max:7|unique:obat,kode_obat,' . $id . ',id_obat', 
        'nama_obat' => 'required|string|max:255',
        'harga_beli' => 'required|numeric|min:0', 
        'harga_jual' => 'required|numeric|min:0', 
        'jumlah_obat' => 'required|integer|min:1', 
        'unit' => 'required|string|max:15', 
        'created_at' => 'nullable|date_format:Y-m-d H:i:s',
    ]);

    
    $obat = Obat::findOrFail($id);
    $obat->update([
        'kode_suplier' => $request->kode_suplier,
        'kode_obat' => $request->kode_obat,
        'nama_obat' => $request->nama_obat,
        'harga_beli' => $request->harga_beli,
        'harga_jual' => $request->harga_jual,
        'jumlah_obat' => $request->jumlah_obat,
        'unit' => $request->unit,
        'created_at' => $request->created_at
    ]);

    return redirect()->route('obat.index')->with('success', 'Obat berhasil diperbarui!');
}

}
