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
                'name' => 'Yanco',
                'email' => 'yanco@gmail.com',
                'password' => bcrypt('yanco123'),
            ],
        ]);
    }
}