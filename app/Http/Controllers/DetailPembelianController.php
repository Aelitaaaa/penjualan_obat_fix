<?php

namespace App\Http\Controllers;

use App\Models\DetailPembelian;
use App\Models\Pembelian;
use App\Models\Obat;
use App\Models\Suplier;
use Illuminate\Http\Request;

class DetailPembelianController extends Controller
{
        public function index($kodePembelian)
    {
        $detailPembelian = DetailPembelian::where('kode_pembelian', $kodePembelian)->get();
        $obat = Obat::all();
        $suplier = Suplier::all();
        $pembelian = Pembelian::findOrFail($kodePembelian);
        $totalPembelian = DetailPembelian::where('kode_pembelian', $kodePembelian)->sum('subtotal');


        return view('detail_pembelian.index', compact('detailPembelian', 'pembelian','obat', 'suplier', 'totalPembelian'));
    }

       public function create()
    {
        $obat = Obat::all();
        return view('detail_pembelian.create', compact('obat'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'kode_pembelian' => 'required|max:7',
            'kode_obat' => 'required|max:7',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

            $kodePembelian = $request->input('kode_pembelian');

            DetailPembelian::create([
                'kode_pembelian' => $kodePembelian,
                'kode_obat' => $request->input('kode_obat'),
                'jumlah' => $request->input('jumlah'),
                'harga_satuan' => $request->input('harga_satuan'),
                'subtotal' => $request->input('subtotal'),
    
            ]);

          
            $totalPembelian = DetailPembelian::where('kode_pembelian', $request->kode_pembelian)
            ->sum('subtotal');

            Pembelian::where('kode_pembelian', $request->kode_pembelian)
                ->update(['total_pembelian' => $totalPembelian]);

                return redirect()->route('detail_pembelian.index', [$request->kode_pembelian])
                                ->with('success', 'Pembelian berhasil ditambahkan.');

    }

    
    public function edit($id)
    {
        $detailpembelianItem = DetailPembelian::findOrFail($id);
        return view('detail_pembelian.update', compact('pembelianItem'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_pembelian' => 'required|max:7',
            'kode_obat' => 'required|max:7',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'total_pembelian' => 'required|numeric',
        ]);

        $detailPembelian = DetailPembelian::findOrFail($id);
        $detailPembelian->update($request->all());

    
    $totalPembelian = DetailPembelian::where('kode_pembelian', $request->kode_pembelian)
        ->sum('subtotal');

    Pembelian::where('kode_pembelian', $request->kode_pembelian)
        ->update(['total_pembelian' => $totalPembelian]);

    return redirect()->route('detail_pembelian.index', [$request->kode_pembelian])
                     ->with('success', 'Pembelian berhasil diperbarui.');
    }

    
    public function destroy($id)
{
    $detailPembelian = DetailPembelian::find($id);

    if (!$detailPembelian) {
        return redirect()->route('detail_pembelian.index')->with('error', 'Pembelian tidak ditemukan.');
    }

    try {
        $detailPembelian->delete();

        // Calculate total_pembelian and update Pembelian record
        $totalPembelian = DetailPembelian::where('kode_pembelian', $detailPembelian->kode_pembelian)
            ->sum('subtotal');

        Pembelian::where('kode_pembelian', $detailPembelian->kode_pembelian)
            ->update(['total_pembelian' => $totalPembelian]);

        return redirect()->route('detail_pembelian.index', [$detailPembelian->kode_pembelian])
                         ->with('success', 'Pembelian berhasil dihapus.');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->route('detail_pembelian.index')->with('error', 'Gagal menghapus pembelian: ' . $e->getMessage());
    }
}

    
}
