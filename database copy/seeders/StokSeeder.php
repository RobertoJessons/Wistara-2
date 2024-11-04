<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    public function run()
    {
        DB::table('stok')->insert([
            [
                'id_stok' => 'K01', //note apabila stok kopi, id_stok berawal K, apaila sirup S
                'nama_stok' => 'kopi',
                'tanggal_pembelian' => now(),
                'kuantitas' => 10,
            ],
        ]);
    }
}
