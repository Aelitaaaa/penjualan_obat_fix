<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index()
    {
        $supliers = Suplier::all();
        return view('suplier.index', compact('supliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_suplier' => 'required|max:5',
            'nama_suplier' => 'required|max:50',
            'alamat' => 'required|max:100',
            'nomor_telepon' => 'required|numeric',
            'created_at' => 'nullable|date_format:Y-m-d H:i:s',
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
            'kode_suplier' => 'required|max:5',
            'nama_suplier' => 'required|max:50',
            'alamat' => 'required|max:100',
            'nomor_telepon' => 'required|numeric',
            'created_at' => 'nullable|date_format:Y-m-d H:i:s',
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
