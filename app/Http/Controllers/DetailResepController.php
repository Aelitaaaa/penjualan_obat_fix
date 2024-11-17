<?php

namespace App\Http\Controllers;

use App\Models\DetailResep;
use App\Models\Resep;
use App\Models\Obat;
use Illuminate\Http\Request;

class DetailResepController extends Controller
{
    public function index(Request $request)
    {  
       
        $kodeResep = $request->query('kode');

        $detailResep = DetailResep::where('kode_resep', $kodeResep)->get();
        $obat = Obat::all();

        return view('resep.detail_resep',compact('detailResep', 'obat', 'kodeResep'));
    }

    public function create()
    {
        $resep = Resep::all();
    
        return view('detail_resep.create', compact('resep', 'obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
        ]);


        $detail = DetailResep::create($request->all());
        return redirect()->route('detail_resep.index', ['kode'=>$detail->kode_resep])->with('success', 'Detail resep berhasil ditambahkan');
    }

    public function edit(DetailResep $detailResep)
    {
        $reseps = Resep::all();
        $obats = Obat::all();
        return view('detail_resep.edit', compact('detailResep', 'resep', 'obat'));
    }

    public function update(Request $request, DetailResep $detailResep)
    {
        $request->validate([
            'resep_id' => 'required',
            'obat_id' => 'required',
            'jumlah_obat' => 'required|integer',
            'dosis' => 'required|string',
            'harga_satuan' => 'required|numeric',
        ]);

        $detailResep->update($request->all());
        return redirect()->route('detail_resep.index')->with('success', 'Detail resep berhasil diperbarui');
    }

    public function destroy(DetailResep $detailResep)
    {
        $detailResep->delete();
        return redirect()->back()->with('success', 'Detail resep berhasil dihapus');
    }
}
