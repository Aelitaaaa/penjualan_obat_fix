<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        
        $pasien = Pasien::all();
    
        
        return view('pasien.index', compact('pasien'));
    }

    public function create()
    {
        $pasien = Pasien::all();
        return view('pasien.create', compact('pasien')); 
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama_pasien' => 'required|string|max:50',
        'jenis_kelamin' => 'required|in:pria,wanita',
        'tanggal_lahir' => 'required|date',
        'nomor_telepon' => 'required|numeric',
        'alamat' => 'required|string|max:255',
        'created_at' => 'nullable|date_format:Y-m-d H:i:s',
    ]);

    
    Pasien::create([
        'nama_pasien' => $request->nama_pasien,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tanggal_lahir' => $request->tanggal_lahir,
        'nomor_telepon' => $request->nomor_telepon,
        'alamat' => $request->alamat,
        'created_at' => $request->created_at
    ]);

    
    return redirect()->route('pasien.index')->with('success', 'Pasien berhasil ditambahkan!');
}


    
public function destroy($id)
{
    $pasien = Pasien::findOrFail($id); 
    $pasien->delete(); 

    return redirect()->route('pasien.index')->with('success', 'Pasien berhasil dihapus.');
}

public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama_pasien' => 'required|string|max:50',
        'jenis_kelamin' => 'required|in:pria,wanita',
        'tanggal_lahir' => 'required|date',
        'nomor_telepon' => 'required|number|max:13',
        'alamat' => 'required|string|max:255',
        'created_at' => 'nullable|date_format:Y-m-d H:i:s',
    ]);

    
    $pasien = Pasien::findOrFail($id);
    $pasien->update([
        'nama_pasien' => $request->nama_pasien,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tanggal_lahir' => $request->tanggal_lahir,
        'nomor_telepon' => $request->nomor_telepon,
        'alamat' => $request->alamat,
        'created_at' => $request->created_at
    ]);

    return redirect()->route('pasien.index')->with('success', 'Pasien berhasil diperbarui!');
}


}
