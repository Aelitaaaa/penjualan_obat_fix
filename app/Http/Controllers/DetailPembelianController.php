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
    // Validasi input awal
    $validatedData = $request->validate([
        'kode_obat' => 'required|max:7',
        'jumlah' => 'required|integer|min:1',
        'harga_satuan' => 'required|numeric',
        'subtotal' => 'required|numeric',
        'kode_pembelian' => 'required|max:8',
        'created_at' => 'nullable|date',
    ]);

    // Dapatkan data obat berdasarkan kode_obat
    $obat = Obat::where('kode_obat', $request->input('kode_obat'))->first();

    // Simpan data detail pembelian
    $detailPembelian = DetailPembelian::create($validatedData);

    // Update total pembelian pada tabel Pembelian
    $pembelian = Pembelian::where('kode_pembelian', $request->input('kode_pembelian'))->first();
    $pembelian->total_pembelian += $detailPembelian->subtotal;
    $pembelian->save();

    // Kurangi stok obat di tabel Obat
    $obat->jumlah_obat += $validatedData['jumlah'];
    $obat->save(); // Simpan perubahan jumlah obat

    // Redirect ke halaman detail pembelian dengan pesan sukses
    return redirect()->route('detail_pembelian.index', ['kode' => $validatedData['kode_pembelian']])
                     ->with('success', 'Stok obat berhasil ditambahkan.');
}


    public function edit($id)
    {
        $detailPembelianItem = DetailPembelian::findOrFail($id);
        return view('detail_pembelian.update', compact('detailPembelianItem'));
    }

    public function destroy($id)
{
    $detailPembelian = DetailPembelian::find($id);

    if (!$detailPembelian) {
        return redirect()->back();
    }

    try {
        // Kurangi subtotal dari total pembelian
        $pembelian = Pembelian::where('kode_pembelian', $detailPembelian->kode_pembelian)->first();
        $pembelian->total_pembelian -= $detailPembelian->subtotal;
        $pembelian->save();

        // Mengembalikan stok obat sesuai jumlah yang telah dibeli
        $obat = Obat::where('kode_obat', $detailPembelian->kode_obat)->first();
        $obat->jumlah_obat -= $detailPembelian->jumlah; // Kurangi stok obat
        $obat->save(); // Simpan perubahan stok obat

        // Hapus detail pembelian
        $detailPembelian->delete();

        return redirect()->back()->with('success', 'Detail pembelian dan stok obat berhasil dihapus.');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->back()->with('error', 'Gagal menghapus detail pembelian: ' . $e->getMessage());
    }
}


}
