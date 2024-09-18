<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua dokter dengan relasi jadwals
        $dokters = Dokter::with(['jadwals' => function($query) use ($request) {
            if ($request->has('minggu')) {
                $mingguAwal = Carbon::parse($request->minggu)->startOfWeek();
                $mingguAkhir = Carbon::parse($request->minggu)->endOfWeek();
                $query->whereBetween('tanggal', [$mingguAwal, $mingguAkhir]);
            } else {
                $mingguAwal = Carbon::now()->startOfWeek();
                $mingguAkhir = Carbon::now()->endOfWeek();
                $query->whereBetween('tanggal', [$mingguAwal, $mingguAkhir]);
            }
        }])->get();

        // Jika minggu dipilih, hitung tanggal awal dan akhir minggu
        if ($request->has('minggu')) {
            $mingguAwal = Carbon::parse($request->minggu)->startOfWeek();
            $mingguAkhir = Carbon::parse($request->minggu)->endOfWeek();
        } else {
            // Default ke minggu ini
            $mingguAwal = Carbon::now()->startOfWeek();
            $mingguAkhir = Carbon::now()->endOfWeek();
        }

        // Kembalikan view dengan data
        return view('jadwal.index', compact('dokters', 'mingguAwal', 'mingguAkhir'));
    }
}
