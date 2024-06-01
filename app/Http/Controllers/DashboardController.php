<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\HistoriPenjualan;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $totalBarang = Barang::count();
        $stokTersedia = Barang::where('jumlah', '>', 0)->count();
        $stokHabis = Barang::where('jumlah', 0)->count();

        $bulan = date('m');
        $tahun = date('Y');
        $totalPendapatan = HistoriPenjualan::where('bulan', $bulan)
            ->where('tahun', $tahun)
            ->sum('total');

        $namaBulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $namaBulanSekarang = $namaBulan[(int)$bulan];

        $data = [
            'totalBarang' => $totalBarang,
            'stokTersedia' => $stokTersedia,
            'stokHabis' => $stokHabis,
            'totalPendapatan' =>  number_format($totalPendapatan, 0, ',', '.'),
            'namaBulanSekarang' => $namaBulanSekarang,
        ];
        return view('dashboard.index', compact('data'));
    }
}
