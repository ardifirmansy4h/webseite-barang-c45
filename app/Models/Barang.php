<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = [
        'nama',
        'ukuran',
        'jenis_motor',
        'masa_berlaku',
        'harga',
        'jumlah'
    ];

    public function historiPenjualan()
    {
        return $this->hasMany(HistoriPenjualan::class);
    }
}
