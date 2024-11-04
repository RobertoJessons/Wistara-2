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
        ]);
    }
}