<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index()
    {
        $supliers = Suplier::all();

          $latestSuplier = Suplier::orderBy('id_suplier', 'desc')->first();
    if (!$latestSuplier) {
        $newKode = 'SP0001';
    } else {
        // Ambil angka terakhir dari kode suplier terakhir, lalu tambahkan 1
        $lastNumber = (int) substr($latestSuplier->kode_suplier, 2);
        $newKode = 'SP' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    }

        return view('suplier.index', compact('supliers', 'newKode'));
    }


    public function create()
{
   
    
}


    public function store(Request $request)
    {
        $request->validate([
            'kode_suplier' => 'required|max:6',
            'nama_suplier' => 'required|max:50',
            'alamat' => 'required|max:100',
            'nomor_telepon' => 'required|numeric|digits_between:10,13|regex:/^08[0-9]+$/',
        ]);

        Suplier::create($request->all());

        return redirect()->route('suplier.index')->with('success', 'Suplier berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $suplierItem = Suplier::findOrFail($id);
        return view('suplier.edit', compact('suplierItem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_suplier' => 'required|max:6',
            'nama_suplier' => 'required|max:50',
            'alamat' => 'required|max:100',
            'nomor_telepon' => 'required|numeric|digits_between:10,13|regex:/^08[0-9]+$/',
        ]);

        $suplierItem = Suplier::findOrFail($id);
        $suplierItem->update($request->all());

        return redirect()->route('suplier.index')->with('success', 'Suplier berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $suplier = Suplier::find($id);

        if (!$suplier) {
            return redirect()->route('suplier.index')->with('error', 'Suplier tidak ditemukan.');
        }

        try {
            $suplier->delete();
            return redirect()->route('suplier.index')->with('success', 'Suplier berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('suplier.index')->with('error', 'Gagal menghapus suplier: ' . $e->getMessage());
        }
    }
}
