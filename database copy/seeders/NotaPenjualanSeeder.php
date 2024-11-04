<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotaPenjualanSeeder extends Seeder
{
    public function run()
    {
        DB::table('nota_penjualan')->insert([
            [
                'id_nota_penjualan' => 'J00001',
                'tanggal_transaksi' => now(),
                'id_produk' => 'm001',
                'nama_produk' => 'kopi lawak',
                'harga_produk' => 15000,
                'jumlah_produk' => 2,
                'total_harga' => 30000,
            ],
        ]);
    }
}
