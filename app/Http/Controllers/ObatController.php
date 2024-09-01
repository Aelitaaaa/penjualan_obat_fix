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
        $suplier = Suplier::all(); // Ambil data suplier
        return view('obat.index', compact('obat', 'suplier')); // Kirim data obat dan suplier ke view
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
        'kode_suplier' => 'required|string|max:7',
        'kode_obat' => 'required|string|max:7|unique:obat,kode_obat', // Kode obat harus unik
        'nama_obat' => 'required|string|max:255',
        'harga_obat' => 'required|numeric|min:0', // Sesuaikan dengan input form
        'jumlah_obat' => 'required|integer|min:1', // Sesuaikan dengan input form
        'unit' => 'required|string|max:15', // Sesuaikan dengan input form
        'total_harga_obat' => 'required|numeric|min:0', // Sesuaikan dengan input form
    ]);

    // Simpan data ke database
    Obat::create([
        'kode_suplier' => $request->kode_suplier,
        'kode_obat' => $request->kode_obat,
        'nama_obat' => $request->nama_obat,
        'harga_obat' => $request->harga_obat,
        'jumlah_obat' => $request->jumlah_obat,
        'Satuan' => $request->unit,
        'total_harga_obat' => $request->total_harga_obat,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan!');
}


    // In ObatController.php
public function destroy($id)
{
    $obat = Obat::findOrFail($id); // Temukan data obat berdasarkan ID
    $obat->delete(); // Hapus data obat

    return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus.');
}

}
