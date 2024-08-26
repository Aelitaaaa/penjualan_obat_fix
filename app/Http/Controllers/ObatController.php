<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return view('obat.index', compact('obats'));
    }

    public function store(Request $request)
{
    $request->validate([
        'kode_suplier' => 'required',
        'kode_obat' => 'required|unique:obat,kode_obat',  
        'nama_obat' => 'required',
        'harga_obat' => 'required|numeric',
        'jumlah_obat' => 'required|integer',
        'Satuan' => 'required',
        'total_harga_obat' => 'required|numeric',
    ]);

    Obat::create($request->all());
    return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan.');
}


public function update(Request $request, $id)
{
    $obat = Obat::find($id);

    $request->validate([
        'kode_suplier' => 'required',
        'kode_obat' => [
            'required',
            Rule::unique('obat', 'kode_obat')->ignore($id)  
        ],
        'nama_obat' => 'required',
        'harga_obat' => 'required|numeric',
        'jumlah_obat' => 'required|integer',
        'Satuan' => 'required',
        'total_harga_obat' => 'required|numeric',
    ]);

    $obat->update($request->all());
    return redirect()->route('obat.index')->with('success', 'Obat berhasil diupdate.');
}


    public function destroy($id)
    {
        $obat = Obat::find($id);
        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus.');
    }
}
