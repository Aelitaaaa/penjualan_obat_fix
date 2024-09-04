<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
        public function index()
    {
        $pembelian = Pembelian::all();
        return view('pembelian.index', compact('pembelian'));
    }

       public function create()
    {
        return view('pembelian.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'kode_pembelian' => 'required|max:7',
            'kode_obat' => 'required|max:7',
            'kode_suplier' => 'required|max:7',
            'harga_obat' => 'required|numeric',
            'jumlah_pembelian' => 'required|integer',
            'total_harga' => 'required|numeric',
            'tanggal_pembelian' => 'required|date',
        ]);

        Pembelian::create($request->all());

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
            'kode_pembelian' => 'required|max:7',
            'kode_obat' => 'required|max:7',
            'kode_suplier' => 'required|max:7',
            'harga_obat' => 'required|numeric',
            'jumlah_pembelian' => 'required|integer',
            'total_harga' => 'required|numeric',
            'tanggal_pembelian' => 'required|date',
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
