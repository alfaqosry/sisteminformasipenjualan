<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $fillable = [
        'barang_id',
        'kuantitas',
        'kasir_id',
        'toko_id',
        'harga',
        'sisa_stok'


    ];

    public function kasir()
    {
        return $this->belongsToMany(User::class);
    }

    public function barangs()
    {
        return $this->belongsTo(Barang::class);
    }
}
