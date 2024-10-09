<?php

namespace App\Http\Controllers;

use App\Models\DetailPembelian;
use App\Models\Pembelian;
use Illuminate\Http\Request;
 use App\Models\Suplier;
 use App\Models\Obat;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::with('detailPembelian')->get();
        $suplier = Suplier::all(); 
    
        // Hitung total pembelian untuk setiap item berdasarkan detail pembelian
        foreach ($pembelian as $item) {
            $item->total_pembelian = $item->detailPembelian->sum('subtotal');
        }
    
        // Buat kode pembelian baru
        $lastPembelian = Pembelian::orderBy('kode_pembelian', 'desc')->first();
        $newKodePembelian = $lastPembelian ? 'KDBL' . str_pad((int)substr($lastPembelian->kode_pembelian, 4) + 1, 4, '0', STR_PAD_LEFT) : 'KDBL0001';
    
        return view('pembelian.index', compact('pembelian', 'suplier', 'newKodePembelian'));
    }
    
       public function create()
    {
    
       $suplier = Suplier::all(); 
        return view('pembelian.create', compact('suplier'));
    }
   
    public function store(Request $request)
{
    // Validasi input tanpa total_pembelian
    $request->validate([
        'kode_suplier' => 'required|max:7',
        'kode_pembelian' => 'required|max:8',
        'created_at' => 'nullable|date_format:Y-m-d H:i:s',
    ]);

    // Simpan data pembelian tanpa total_pembelian
    $pembelian = Pembelian::create([
        'kode_pembelian' => $request->kode_pembelian,
        'kode_suplier' => $request->kode_suplier,
        'created_at' => now(),
    ]);

    return redirect()->route('detail_pembelian.index', ['kode' => $pembelian->kode_pembelian]);
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
        
        $details = DetailPembelian::where('kode_pembelian', $pembelian->kode_pembelian)->get();

        // Mengurangi stok obat sesuai dengan detail pembelian
        foreach ($details as $detail) {
            $obat = Obat::where('kode_obat', $detail->kode_obat)->first();
            
            if ($obat) {
                $obat->jumlah_obat -= $detail->jumlah; 
                $obat->save();
            }

            // Hapus detail pembelian
            $detail->delete();
        }

        // Hapus data pembelian setelah stok obat dikembalikan
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Pembelian dan stok obat berhasil dihapus.');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->route('pembelian.index')->with('error', 'Gagal menghapus pembelian: ' . $e->getMessage());
    }
}
    
    
}
