<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPenjualan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_penjualan';
    protected $primaryKey = 'nomor_transaksi_penjualan';
    public $incrementing = false; // karena primary key adalah string

    protected $fillable = [
        'nomor_transaksi_penjualan',
        'tanggal_transaksi',
        'id_produk',
        'nama_produk',
        'harga',
        'jumlah_produk',
        'total_harga',
        'id_customer', // Menambahkan id_customer pada fillable
        'tukar_poin',
    ];

    public $timestamps = false; // Nonaktifkan timestamps jika tidak digunakan

    // Relasi ke model Customer (optional)
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id_customer');
    }

    // Relasi ke model Produk (optional)
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}
