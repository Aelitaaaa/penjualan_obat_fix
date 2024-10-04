<?php

namespace App\Http\Controllers;

use App\Models\StockOpname;
use App\Models\Obat;
use Illuminate\Http\Request;

class StockOpnameController extends Controller
{
    public function index()
    {
        $stockOpname = StockOpname::all();
        $obat = Obat::all();
        return view('opname.index', compact('stockOpname', 'obat')); 
    }

    public function create()
    {
        $obat = Obat::all();
        return view('opname.create', compact('obat')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_obat' => 'required|string|max:7', 
            'jumlah_sistem' => 'required|numeric|min:1', 
            'jumlah_fisik' => 'required|numeric|min:0', 
            'harga_obat' => 'required|numeric|min:0', 
        ]);

        // Menghitung nilai minus
        $minus = $request->jumlah_sistem - $request->jumlah_fisik;

        // Menghitung total kerugian
        $total_kerugian = $minus * $request->harga_obat;

        // Simpan data opname
        StockOpname::create([
            'kode_obat'  => $request->kode_obat,
            'jumlah_sistem' => $request->jumlah_sistem,
            'jumlah_fisik' => $request->jumlah_fisik,
            'minus' => $minus, // Menggunakan nilai minus yang sudah dihitung
            'harga_obat' => $request->harga_obat,
            'total_kerugian' => $total_kerugian, // Menggunakan nilai total kerugian yang sudah dihitung
        ]);
    
        return redirect()->route('opname.index')->with('success', 'Opname berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $stockOpnames = StockOpname::findOrFail($id); 
        $stockOpnames->delete(); 

        return redirect()->back()->with('success', 'Opname berhasil dihapus.');
    }

    // Method update
public function update(Request $request, string $id)
{
    // Validasi tetap sama

    $opname = StockOpname::findOrFail($id);

    // Menghitung ulang nilai minus dan total kerugian
    $minus = $request->jumlah_sistem - $request->jumlah_fisik;
    $total_kerugian = $minus * $request->harga_obat;

    // Update data opname
    $opname->update([
        'kode_obat'  => $request->kode_obat,
        'jumlah_sistem' => $request->jumlah_sistem,
        'jumlah_fisik' => $request->jumlah_fisik,
        'minus' => $minus,
        'harga_obat' => $request->harga_obat,
        'total_kerugian' => $total_kerugian,
    ]);

    return redirect()->route('opname.index')->with('success', 'Opname berhasil diperbarui!');
}
}
