<?php

// In ObatController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all(); 
        return view('obat.index', compact('obat')); 
    }
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'kode_suplier' => 'required',
            'kode_obat' => 'required',
            'nama_obat' => 'required',
            'harga_obat' => 'required|numeric',
            'jumlah_obat' => 'required|numeric',
            'Satuan' => 'required',
            'total_harga_obat' => 'required|numeric',
        ]);
    
      
        $obat = Obat::findOrFail($id);
    
       
        $obat->kode_suplier = $request->kode_suplier;
        $obat->kode_obat = $request->kode_obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->harga_obat = $request->harga_obat;
        $obat->jumlah_obat = $request->jumlah_obat;
        $obat->Satuan = $request->Satuan;
        $obat->total_harga_obat = $request->total_harga_obat;
    
      
        $obat->save();
    
       
        return redirect()->route('obat.index')->with('success', 'Data Obat berhasil diupdate');
    }
    
    
}
