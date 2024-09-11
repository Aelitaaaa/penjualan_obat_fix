<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;
 use App\Models\Suplier;

class PembelianController extends Controller
{
        public function index()
    {
        $pembelian = Pembelian::all();
        $suplier = Suplier::all(); 

        $lastPembelian = Pembelian::orderBy('kode_pembelian', 'desc')->first();

        // Tentukan kode pembelian baru
        if (!$lastPembelian) {
            $newKodePembelian = 'KDBL0001';
        } else {
            $lastNumber = (int)substr($lastPembelian->kode_pembelian, 4);
            $newKodePembelian = 'KDBL' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        }

        return view('pembelian.index', compact('pembelian', 'suplier', 'newKodePembelian'));
    }

       public function create()
    {
    
       $suplier = Suplier::all(); 
        return view('pembelian.create', compact('suplier'));
    }
   
    public function store(Request $request)
{
    // Validasi input lainnya
    $request->validate([
        'kode_suplier' => 'required|max:7',
        'total_pembelian' => 'nullable|numeric',
        'created_at' => 'nullable|date_format:Y-m-d H:i:s',
    ]);

    // Simpan data pembelian, kode pembelian sudah ada di request dari form
    Pembelian::create([
        'kode_pembelian' => $request->kode_pembelian, // Ini akan menggunakan value dari form
        'kode_suplier' => $request->kode_suplier,
        'total_pembelian' => $request->total_pembelian,
        'created_at' => now(),
    ]);

    return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil ditambahkan.');
}
    
    public function edit($id)
    {
        $pembelianItem = Pembelian::findOrFail($id);
        return view('pembelian.update', compact('pembelianItem'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_pembelian' => 'required|max:8',
            'kode_suplier' => 'required|max:7',
            'total_pembelian' => 'nullable|numeric',
            'created_at' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        $pembelianItem = Pembelian::findOrFail($id);
        $pembelianItem->update($request->all());

        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil diperbarui.');
    }

    
    public function destroy($id)
    {
        $pembelian = Pembelian::find($id);
    
        if (!$pembelian) {
            return redirect()->route('pembelian.index')->with('error', 'Pembelian tidak ditemukan.');
        }
    
        try {
          
            $pembelian->delete();
            return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
           
            return redirect()->route('pembelian.index')->with('error', 'Gagal menghapus pembelian: ' . $e->getMessage());
        }
    }


     

    
}
