<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
        public function index()
    {
        $penjualan = Penjualan::all();
        $pasien = Pasien::all(); 
        return view('penjualan.index', compact('penjualan', 'pasien'));
    }

       public function create()
    {
        return view('penjualan.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
           'kode_penjualan' => 'required|max:7',
            'id_pasien' => 'required|max:7',
            'total_penjualan' => 'nullable|numeric',
            'created_at' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        Penjualan::create($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil ditambahkan.');
    }

    
    public function edit($id)
    {
        $penjualanItem = Penjualan::findOrFail($id);
        return view('penjualan.update', compact('penjualanItem'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_penjualan' => 'required|max:7',
            'kode_suplier' => 'required|max:7',
            'total_penjualan' => 'nullable|numeric',
            'created_at' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        $penjualanItem = Penjualan::findOrFail($id);
        $penjualanItem->update($request->all());

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil diperbarui.');
    }

    
    public function destroy($id)
    {
        $penjualan = Penjualan::find($id);
    
        if (!$penjualan) {
            return redirect()->route('penjualan.index')->with('error', 'Penjualan tidak ditemukan.');
        }
    
        try {
          
            $penjualan->delete();
            return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
           
            return redirect()->route('penjualan.index')->with('error', 'Gagal menghapus Penjualan: ' . $e->getMessage());
        }
    }
    
}
