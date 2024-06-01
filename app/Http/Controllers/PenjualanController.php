<?php

namespace App\Http\Controllers;

use App\Models\HistoriPenjualan;

class PenjualanController extends Controller
{

    public function index()
    {
        $data = HistoriPenjualan::orderBy('total', 'asc')->get();
        return view('penjualan.index', compact('data'));
    }
}
