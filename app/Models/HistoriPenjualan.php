<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriPenjualan extends Model
{
    use HasFactory;
    protected $table = 'histori_penjualan';

    protected $fillable = [
        'barang_id',
        'jumlah_awal',
        'jumlah_terjual',
        'harga',
        'total',
        'bulan',
        'tahun',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
