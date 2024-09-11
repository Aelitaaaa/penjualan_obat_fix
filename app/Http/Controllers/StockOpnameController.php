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
            'jumlah_fisik' => 'required|numeric|min:1', 
            'minus' => 'required|numeric',
            'harga_obat' => 'required|numeric|min:0', 
            'total_kerugian' => 'required|numeric|min:0', 
        ]);
    
        StockOpname::create([
            'kode_obat'  => $request->kode_obat,
            'jumlah_sistem' => $request->jumlah_sistem,
            'jumlah_fisik' => $request->jumlah_fisik,
            'minus' => $request->minus,
            'harga_obat' => $request->harga_obat,
            'total_kerugian' => $request->total_kerugian,
        ]);
    
        return redirect()->route('opname.index')->with('success', 'Opname berhasil ditambahkan!');
    }

    public function destroy($id)
    {
    $stockOpnames = StockOpname::findOrFail($id); 
    $stockOpnames->delete(); 

        return redirect()->route('opname.index')->with('success', 'Opname berhasil dihapus.');
    }

    public function update(Request $request, $id)
{

    $request->validate([
        'kode_obat' => 'required|string|max:7', 
        'jumlah_sistem' => 'required|numeric|min:1', 
        'jumlah_fisik' => 'required|numeric|min:1', 
        'minus' => 'required|numeric',
        'harga_obat' => 'required|numeric|min:0', 
        'total_kerugian' => 'required|numeric|min:0', 
    ]);

    $opname = StockOpname::findOrFail($id);

    $opname->update([
        'kode_obat'  => $request->kode_obat,
        'jumlah_sistem' => $request->jumlah_sistem,
        'jumlah_fisik' => $request->jumlah_fisik,
        'minus' => $request->minus,
        'harga_obat' => $request->harga_obat,
        'total_kerugian' => $request->total_kerugian,
    ]);


    return redirect()->route('opname.index')->with('success', 'Opname berhasil diperbarui!');
}
}


