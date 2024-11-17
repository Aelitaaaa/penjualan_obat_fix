<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Exports\laporanExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index(Request $request)
{
    $start = $request->query('dari_tanggal');
    $end = $request->query('sampai_tanggal');

    $data = Pembayaran::orderBy('created_at', 'desc')->get();
    // dd($data);

    if ($start && $end) {
        // Ambil data laporan berdasarkan rentang tanggal
        $data = Pembayaran::whereBetween('created_at', [
            $start = Carbon::parse($start)->startOfDay(),
            $end = Carbon::parse($end)->endOfDay()
            ])->get();
    } else {
        // Jika tidak ada filter tanggal, ambil semua data
        $data = Pembayaran::orderBy('created_at', 'desc')->get();
    }

    return view('laporan.index', compact('data', 'start', 'end'));
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

    public function export(Request $request)
    {
        $start = $request->query('dari_tanggal');
        $end = $request->query('sampai_tanggal');
        $nama_modal = 'laporan_rawatjalan (' . date('d-m-Y') . ').xlsx';

        \Log::info("Dari Tanggal: " . $start);
        \Log::info("Sampai Tanggal: " . $end);
    

        return Excel::download(new laporanExport($start, $end), $nama_modal);
        
    }
}