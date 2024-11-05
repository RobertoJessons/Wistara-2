<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('role')->insert([
            [
                'id_role' => 'O001', //note apabila stok kopi, id_stok berawal K, apaila sirup S
                'nama_role' => 'admin',
            ],
            [
                'id_role' => 'K001', //note apabila stok kopi, id_stok berawal K, apaila sirup S
                'nama_role' => 'user',
            ],
        ]);
    }
}
