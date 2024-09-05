<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Obat;
use App\Models\Pasien;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
        public function index($kodepenjualan)
    {
        $detailPenjualan = DetailPenjualan::where('kode_penjualan', $kodePenjualan)->get();
        $obat = Obat::all();
        $pasien = Pasien::all();
        $penjualan = Penjualan::findOrFail($kode_penjualan);
        return view('detail_penjualan.index', compact('detailPenjualan', 'penjualan','obat', 'pasien'));
    }

       public function create()
    {
        $obat = Obat::all();
        return view('detail_penjualan.create', compact('obat'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'kode_penjualan' => 'required|max:7',
            'kode_obat' => 'required|max:7',
            'jumlah_penjualan' => 'required|integer',
            'harga_satuan' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'total_penjualan' => 'required|numeric',
            'create_at' => 'required|date',
        ]);

        DetailPenjualan::create($request->all());

        return redirect()->route('detail_penjualan.index')->with('success', 'Penjualan berhasil ditambahkan.');
    }

    
    public function edit($id)
    {
        $detailPenjualanItem = DetailPenjualan::findOrFail($id);
        return view('detail_penjualan.update', compact('penjualanItem'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_penjualan' => 'required|max:7',
            'kode_obat' => 'required|max:7',
            'jumlah_penjualan' => 'required|integer',
            'harga_satuan' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'total_penjualan' => 'required|numeric',
            'create_at' => 'required|date',
        ]);

        $detailPenjualanItem = DetailPenjualan::findOrFail($id);
        $detaiPenjualanItem->update($request->all());

        return redirect()->route('detail_penjualan.index')->with('success', 'penjualan berhasil diperbarui.');
    }

    
    public function destroy($id)
    {
      
        $detailPenjualan = DetailPenjualan::find($id);
    
        if (!$detailPenjualan) {
            return redirect()->route('detail_penjualan.index')->with('error', 'Penjualan tidak ditemukan.');
        }
    
        try {
          
            $detailPenjualan->delete();
            return redirect()->route('detail_penjualan.index')->with('success', 'Penjualan berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
           
            return redirect()->route('detail_penjualan.index')->with('error', 'Gagal menghapus penjualan: ' . $e->getMessage());
        }
    }
    
}
