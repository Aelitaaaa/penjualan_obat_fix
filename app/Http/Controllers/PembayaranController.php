<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Pembayaran;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use App\Models\Resep;
class PembayaranController extends Controller
{
    public function index()
    {
        $resep = Resep::all();
        $pembayaran = Pembayaran::all();
        $dokter = Dokter::all();
        $pasien = Pasien::all();
        $rekammedis = RekamMedis::all();

        return view('pembayaran.index', compact('resep', 'pembayaran', 'dokter', 'pasien', 'rekammedis'));
    }

    public function create()
    {
        return view('pembayaran.create');
    }

   // PembayaranController.php
    public function store(Request $request)
    {
        $request->validate([
            'id_rekam_medis' => 'required',
            // 'id_dokter' => 'required',
            'total_biaya' => 'required|numeric',
        ]);

        $rekamMedis = RekamMedis::find($request->id_rekam_medis);

        Pembayaran::create([
            'id_pasien' => $rekamMedis->id_pasien,
            'id_dokter' => $rekamMedis->id_dokter,
            'id_rekammedis' => $request->id_rekam_medis,
            'total_biaya' => $request->total_biaya,
        ]);

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
