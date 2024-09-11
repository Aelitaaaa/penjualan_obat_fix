<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pasien = Pasien::whereDoesntHave('rekamMedis')->get();
        $Dokter = Dokter::all();
        $RekamMedis = RekamMedis::orderBy('created_at', 'DESC')->get();

        return view('rekammedis', ['rekamMedis'=>$RekamMedis, 'pasien'=>$Pasien, 'dokter'=>$Dokter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RekamMedis::created($request->all());

        return redirect()->route('rekammedis')->with('sucsess', 'Data Berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function show(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function edit(RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RekamMedis $rekamMedis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RekamMedis  $rekamMedis
     * @return \Illuminate\Http\Response
     */
    public function destroy(RekamMedis $rekamMedis)
    {
        //
    }
}
