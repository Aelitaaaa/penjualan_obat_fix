<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\Resep;
class PembayaranController extends Controller
{
    public function index()
    {

        $resep = Resep::all();
        $pembayaran = Pembayaran::all();
        return view('pembayaran.index', compact('resep', 'pembayaran'));
    }

    public function create()
    {
        return view('pembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'no_rekam_medis' => 'required',
            'id_resep' => 'required',
            'total_biaya' => 'required|numeric',
        ]);

        Pembayaran::create($request->all());
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'no_rekam_medis' => 'required',
            'id_resep' => 'required',
            'total_biaya' => 'required|numeric',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update($request->all());
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}
