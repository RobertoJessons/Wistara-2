<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiPembelian extends Model
{
    use SoftDeletes;
    protected $table = 'transaksi_pembelian';
    protected $primaryKey = 'id_transaksi_pembelian';
    public $incrementing = false; // Karena id_transaksi_pembelian adalah string

    protected $fillable = [
        'id_transaksi_pembelian', 
        'tanggal_pembelian', 
        'id_supplier',
        'nama_supplier',
        'nama_stok', 
        'jumlah_stok', 
        'harga_stok', 
        'total_pembelian'
    ];

    public $timestamps = false; // Nonaktifkan timestamps jika tidak digunakan
}
