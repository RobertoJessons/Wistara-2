<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        DB::table('produk')->insert([
            [
                'id_produk' => 'm001',
                'nama_produk' => 'kopi lawak',
                'jenis_produk' => 'kopi',
                'harga' => 15000,
            ],
            [
                'id_produk' => 'm002',
                'nama_produk' => 'kopi lucu',
                'jenis_produk' => 'kopi',
                'harga' => 15000,
            ],
            [
                'id_produk' => 'm003',
                'nama_produk' => 'hazlenut latte',
                'jenis_produk' => 'kopi',
                'harga' => 15000,
            ],
        ]);
    }
}