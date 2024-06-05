<?php

namespace App\Http\Controllers;

use App\Models\HistoriPenjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{

    public function index()
    {
        $data = HistoriPenjualan::orderBy('total', 'asc')->get();
        return view('penjualan.index', compact('data'));
    }

    public function indexLaporan()
    {
        return view('penjualan.index-laporan');
    }

    public function laporan(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $data = HistoriPenjualan::where('bulan', $bulan)->where('tahun', $tahun)->get();

        $totalPendapatan = $data->sum('total');

        return view('penjualan.laporan', compact('data', 'bulan', 'tahun', 'totalPendapatan'));
    }
}
