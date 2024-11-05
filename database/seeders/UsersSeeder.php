<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'yanco',
                'id_role' => 'O001',
                'email' => 'yanco@gmail.com',
                'password' => bcrypt('yanco123'),
            ],
            [
                'name' => 'batu',
                'id_role' => 'K001',
                'email' => 'batu@gmail.com',
                'password' => bcrypt('batu123'),
            ],
        ]);
    }
}