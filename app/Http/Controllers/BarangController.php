<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\HistoriPenjualan;
use Illuminate\Http\Request;

class BarangController extends Controller
{

    public function index()
    {
        $data = Barang::orderBy('harga', 'asc')->get();
        return view('barang.index', compact('data'));
    }


    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'ukuran' => $request->ukuran,
            'jenis_motor' => $request->jenis,
            'masa_berlaku' => $request->masa_berlaku,
            'harga' => $request->harga,
            'jumlah' => $request->stok,
        ];
        Barang::create($data);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $data = [
            'nama' => $request->nama_barang_edit,
            'ukuran' => $request->ukuran_edit,
            'jenis_motor' => $request->jenis_edit,
            'masa_berlaku' => $request->masa_edit,
            'harga' => $request->harga_edit,
        ];
        $barang = Barang::where('id', $id)->update($data);
        if ($barang) {
            return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data barang.');
        }
    }

    public function storeStok(Request $request)
    {
        $barang = Barang::find($request->id);

        $barang->jumlah += $request->stok;
        $barang->save();
        return redirect()->route('barang.index')->with('success', 'Stok berhasil ditambahkan');
    }

    public function penjualan(Request $request)
    {
        $barang = Barang::find($request->id);
        if ($barang->jumlah < $request->jumlah_terjual) {
            return redirect()->route('barang.index')->with('error', 'Stok tidak mencukupi !');
        }
        $barang->jumlah -= $request->jumlah_terjual;
        $dataPenjualan = [
            'barang_id' => $barang->id,
            'jumlah_awal' => $request->stoksekarangterjual,
            'jumlah_terjual' => $request->jumlah_terjual,
            'harga' => $barang->harga,
            'total' => $barang->harga * $request->jumlah_terjual,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ];
        HistoriPenjualan::create($dataPenjualan);
        $barang->save();
        return redirect()->route('barang.index')->with('success', 'Barang terjual ditambahkan !');
    }



    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);
        HistoriPenjualan::where('barang_id', $id)->delete();
        $barang->forceDelete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus secara permanen');
    }

    public function tersedia()
    {
        $data = Barang::where('jumlah', '>', 0)->get();
        $dataT = Barang::where('jumlah', '<', 1)->get();

        return view('stok.tersedia', compact('data', 'dataT'));
    }
}
