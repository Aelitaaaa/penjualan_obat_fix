<?php

namespace App\Http\Controllers;

use App\Exports\laporanExport;
use App\Exports\laporanOpnameExport;
use App\Models\StockOpname;
use App\Models\Obat;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StockOpnameController extends Controller
{
    public function index()
{
    $stockOpname = StockOpname::all();
    $obat = Obat::all();
    $totalkerugian = $stockOpname->sum('total_kerugian'); // Wrap 'total_kerugian' in quotes

    return view('opname.index', compact('stockOpname', 'obat', 'totalkerugian')); 
}


    public function create()
    {
        $obat = Obat::all();
        return view('opname.create', compact('obat')); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
                        'kode_obat' => 'required|string|max:7', 
                        'jumlah_sistem' => 'required|numeric|min:1', 
                        'jumlah_fisik' => 'required|numeric|min:0', 
                        'harga_obat' => 'required|numeric|min:0', 
                    ]);

        // Menghitung nilai minus
        $minus = $request->jumlah_sistem - $request->jumlah_fisik;

        // Menghitung total kerugian
        $total_kerugian = $minus * $request->harga_obat;

        // Update stok obat
        $obat = Obat::where('kode_obat', $request->kode_obat)
        ->first();

        // Cek jika obat ditemukan
        if ($obat) {
            // Kurangkan stok obat dengan nilai minus
            $obat->jumlah_obat -= $minus;

            // Pastikan stok tidak negatif
            if ($obat->jumlah_obat < 0) {
                $obat->jumlah_obat = 0;
            }

            $obat->save();
        }

        // Simpan data opname
        StockOpname::create([
            'kode_obat'  => $request->kode_obat,
            'jumlah_sistem' => $request->jumlah_sistem,
            'jumlah_fisik' => $request->jumlah_fisik,
            'minus' => $minus, // Menggunakan nilai minus yang sudah dihitung
            'harga_obat' => $request->harga_obat,
            'total_kerugian' => $total_kerugian, // Menggunakan nilai total kerugian yang sudah dihitung
        ]);
    
        return redirect()->route('opname.index')->with('success', 'Opname berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $stockOpnames = StockOpname::findOrFail($id); 
        $stockOpnames->delete(); 

        return redirect()->back()->with('success', 'Opname berhasil dihapus.');
    }

    // Method update
    // public function update(Request $request, string $id)
    // {
        // Validasi tetap sama

       //  $opname = StockOpname::findOrFail($id);

        // Menghitung ulang nilai minus dan total kerugian
       // $minus = $request->jumlah_sistem - $request->jumlah_fisik;
       // $total_kerugian = $minus * $request->harga_obat;

        // Update stok obat
        // $obat = Obat::where('kode_obat', $request->kode_obat)
        // ->first();

        // Cek jika obat ditemukan
       //  if ($obat) {
            // Kurangkan stok obat dengan nilai minus
            // $obat->jumlah_obat -= $minus;

            // Pastikan stok tidak negatif
            // if ($obat->jumlah_obat < 0) {
               // $obat->jumlah_obat = 0;
          //  }

           // $obat->save();
       // }

        // Update data opname
        // $opname->update([
         //   'kode_obat'  => $request->kode_obat,
           // 'jumlah_sistem' => $request->jumlah_sistem,
           // 'jumlah_fisik' => $request->jumlah_fisik,
           // 'minus' => $minus,
           // 'harga_obat' => $request->harga_obat,
           // 'total_kerugian' => $total_kerugian,
        // ]);

       // return redirect()->route('opname.index')->with('success', 'Opname berhasil diperbarui!');
    // }

    public function export()
    {
       
        $filenames = 'data_opname (' .date('d-m-Y') . ').xlsx';
        return Excel::download(new laporanOpnameExport, $filenames);
    }
}
