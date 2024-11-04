<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Laporan;
use App\Models\Pasien;
use App\Models\Pembayaran;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->query('start');
        $end = $request->query('end');

        $data = Pembayaran::orderBy('created_at', 'desc')->get();

        if($start && $end){
            $data = Pembayaran::whereBetween('created_at', [$start, $end])->orderBy('created_at', 'desc')->get();
        }
    
        return view('laporan.index', compact('data'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'id_rekam_medis' => 'required',
            'tanggal' => 'required|date'
        ]);

        $laporan = new Laporan();
        $laporan->id_pasien = $request->id_pasien;
        $laporan->id_dokter = $request->id_dokter;
        $laporan->id_rekam_medis = $request->id_rekam_medis;
        $laporan->tanggal = $request->tanggal;
        $laporan->save();

        return redirect()->route('laporan.index')->with('success', 'Data Laporan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'id_rekam_medis' => 'required',
            'tanggal' => 'required|date'
        ]);

        $laporan->id_pasien = $request->id_pasien;
        $laporan->id_dokter = $request->id_dokter;
        $laporan->id_rekam_medis = $request->id_rekam_medis;
        $laporan->tanggal = $request->tanggal;
        $laporan->save();

        return redirect()->route('laporan.index')->with('success', 'Data Laporan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        $laporan->delete();
        return redirect()->route('laporan.index')->with('success', 'Data Laporan berhasil dihapus.');
    }
}
