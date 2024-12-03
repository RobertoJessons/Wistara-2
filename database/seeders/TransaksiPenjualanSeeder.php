<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiPenjualanSeeder extends Seeder
{
    public function run()
    {
        DB::table('transaksi_penjualan')->insert([
            [
                'nomor_transaksi_penjualan' => 'J00001',
                'tanggal_transaksi' => now(),
                'id_produk' => 'm001',
                'nama_produk' => 'kopi lawak',
                'harga' => 15000,
                'jumlah_produk' => 2,
                'total_harga' => 30000,
                'id_customer' => '3',
                'tukar_poin' => true,
            ],
        ]);
    }
}