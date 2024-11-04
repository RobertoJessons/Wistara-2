<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotaPembelianSeeder extends Seeder
{
    public function run()
    {
        DB::table('nota_pembelian')->insert([
            [
                'id_nota_pembelian' => 'P00001',
                'tanggal_pembelian' => now(),
                'id_supplier' => 'S001',
                'nama_supplier' => 'sapro',
                'nama_stok' => 'kopi',
                'jumlah_stok' => 10,
                'harga_stok' => 5000,
                'total_pembelian' => 50000,
            ],
        ]);
    }
}