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

        // Mendapatkan semua detail pembelian berdasarkan kode pembelian
        $detailPembelian = DetailPembelian::where('kode_pembelian', $kodePembelian)->get();
        
        // Mengambil data obat, suplier, dan pembelian
        $obat = Obat::all();
        $suplier = Suplier::all();
        $pembelian = Pembelian::where('kode_pembelian', $kodePembelian)->first();

        // Menghitung total harga dari subtotal di detail pembelian
        $totalHarga = $detailPembelian->sum('subtotal');

        // Mengirimkan data ke view
        return view('detail_pembelian.index', compact('detailPembelian','obat', 'suplier', 'pembelian', 'totalHarga'));
    }

    public function create()
    {
        $obat = Obat::all();
        return view('detail_pembelian.create', compact('obat'));
    }

    public function store(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'kode_obat' => 'required|max:7',
        'jumlah' => 'required|integer',
        'harga_satuan' => 'required|numeric',
        'subtotal' => 'required|numeric',
        'kode_pembelian' => 'required|max:7',
    ]);

    // Ambil kode_pembelian dari request
    $validatedData['kode_pembelian'] = $request->input('kode_pembelian');

    // Simpan data detail pembelian
    $detailPembelian = DetailPembelian::create($validatedData);

    // Update total pembelian pada tabel Pembelian
    $pembelian = Pembelian::where('kode_pembelian', $request->input('kode_pembelian'))->first();
    $pembelian->total_pembelian += $detailPembelian->subtotal; // Tambahkan subtotal ke total pembelian
    $pembelian->save();

    // Redirect kembali ke halaman detail pembelian
    return redirect()->route('detail_pembelian.index', ['kode' => $validatedData['kode_pembelian']])
                     ->with('success', 'Pembelian berhasil ditambahkan.');
}
  

    public function edit($id)
    {
        $detailPembelianItem = DetailPembelian::findOrFail($id);
        return view('detail_pembelian.update', compact('detailPembelianItem'));
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
            'created_at' => 'nullable|date',
        ]);

        $detailPembelianItem = DetailPembelian::findOrFail($id);
        $detailPembelianItem->update($request->all());

        return redirect()->route('detail_pembelian.index')->with('success', 'Pembelian berhasil diperbarui.');
    }

    public function destroy($id)
{
    $detailPembelian = DetailPembelian::find($id);

    if (!$detailPembelian) {
        return redirect()->back()->with('error', 'Pembelian tidak ditemukan.');
    }

    try {
        // Kurangi subtotal dari total pembelian
        $pembelian = Pembelian::where('kode_pembelian', $detailPembelian->kode_pembelian)->first();
        $pembelian->total_pembelian -= $detailPembelian->subtotal;
        $pembelian->save();

        // Hapus detail pembelian
        $detailPembelian->delete();

        return redirect()->back()->with('success', 'Pembelian berhasil dihapus.');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->back()->with('error', 'Gagal menghapus pembelian: ' . $e->getMessage());
    }
}

}
