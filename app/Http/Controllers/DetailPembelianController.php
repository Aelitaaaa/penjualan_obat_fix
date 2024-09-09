<?php

namespace App\Http\Controllers;

use App\Models\DetailPembelian;
use App\Models\Pembelian;
use App\Models\Obat;
use App\Models\Suplier;
use Illuminate\Http\Request;

class DetailPembelianController extends Controller
{
        public function index(Request $request)
    {
        $kodePembelian = $request->query('kode');

        $detailPembelian = DetailPembelian::where('kode_pembelian', $kodePembelian)->get();
        
        $obat = Obat::all();
        $suplier = Suplier::all();
        $pembelian = Pembelian::where('kode_pembelian', $kodePembelian)->first();


        return view('detail_pembelian.index', compact('detailPembelian','obat', 'suplier', 'pembelian'));
    }

       public function create()
    {
        $obat = Obat::all();
        return view('detail_pembelian.create', compact('obat'));
    }

   
    public function store(Request $request)
    {
        // Lakukan validasi dan proses penyimpanan
        $validatedData = $request->validate([
            'kode_obat' => 'required|max:7',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'kode_pembelian' => 'required|max:7',
        ]);
    
        // Ambil kode_pembelian dari request
        $validatedData['kode_pembelian'] = $request->input('kode_pembelian');
    
        DetailPembelian::create($validatedData);
    
        return redirect()->route('detail_pembelian.index', ['kode' => $validatedData['kode_pembelian']])
                         ->with('success', 'Pembelian berhasil ditambahkan.');
    }    


    
    public function edit($id)
    {
        $detailpembelianItem = DetailPembelian::findOrFail($id);
        return view('detail_pembelian.update', compact('pembelianItem'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_pembelian' => 'required|max:7',
            'kode_obat' => 'required|max:7',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'total_pembelian' => 'required|numeric',
            'create_at' => 'required|date',
        ]);

        $detailPembelianItem = DetailPembelian::findOrFail($id);
        $detailPembelianItem->update($request->all());

        return redirect()->route('detail_pembelian.index')->with('success', 'Pembelian berhasil diperbarui.');
    }

    
    public function destroy($id)
    {
      
        $detailPembelian = DetailPembelian::find($id);
    
        if (!$detailPembelian) {
            return redirect()->route('detail_pembelian.index')->with('error', 'Pembelian tidak ditemukan.');
        }
    
        try {
          
            $detailPembelian->delete();
            return redirect()->route('detail_pembelian.index')->with('success', 'Pembelian berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
           
            return redirect()->route('detail_pembelian.index')->with('error', 'Gagal menghapus pembelian: ' . $e->getMessage());
        }
    }
    
}
