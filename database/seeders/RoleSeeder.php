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
                'nama_role' => 'Karyawan',
            ],
            [
                'nama_role' => 'Owner',
            ],
        ]);
    }
}