<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id_user' => '000001',
                'nama' => 'yanco',
                'email' => 'yanco@gmail.com',
                'password' => 'yanco123',
                'tempat_tinggal' => 'jalan disana lah nomor 9',
                'nama_role' => 'Owner',
            ],
            [
                'id_user' => '000002',
                'nama' => 'bodat',
                'email' => 'bodat@gmail.com',
                'password' => 'bodat123',
                'tempat_tinggal' => 'jalan disana lah nomor 8',
                'nama_role' => 'Karyawan',
            ],
            [
                'id_user' => '000003',
                'nama' => 'kumari',
                'email' => 'kumari@gmail.com',
                'password' => 'kumari123',
                'tempat_tinggal' => 'jalan disana lah nomor 7',
                'nama_role' => 'Karyawan',
            ],
            [
                'id_user' => '000004',
                'nama' => 'padsi hebat',
                'email' => 'padsihebat@gmail.com',
                'password' => 'padsihebat',
                'tempat_tinggal' => 'jalan bantak yaban',
                'nama_role' => 'Karyawan',
            ],
            [
                'id_user' => '000005',
                'nama' => 'mimiperi',
                'email' => 'mimiperi@gmail.com',
                'password' => 'mimiperi',
                'tempat_tinggal' => 'jalan jalan',
                'nama_role' => 'Karyawan',
            ],
            [
                'id_user' => '000006',
                'nama' => 'vadeldance',
                'email' => 'vadeldance@gmail.com',
                'password' => 'vadeldance',
                'tempat_tinggal' => 'jalan kaki',
                'nama_role' => 'Karyawan',
            ],
            [
                'id_user' => '000007',
                'nama' => 'lollycafe',
                'email' => 'lollycafe@gmail.com',
                'password' => 'lollycafe',
                'tempat_tinggal' => 'jalan tembak ditolak',
                'nama_role' => 'Karyawan',
            ],
            [
                'id_user' => '000008',
                'nama' => 'riocina',
                'email' => 'riocina@gmail.com',
                'password' => 'riocina',
                'tempat_tinggal' => 'jalan yang tak mulus',
                'nama_role' => 'Karyawan',
            ],
            [
                'id_user' => '000009',
                'nama' => 'kairikumar',
                'email' => 'kairikumar@gmail.com',
                'password' => 'kairikumar',
                'tempat_tinggal' => 'jalan terbaik',
                'nama_role' => 'Karyawan',
            ],
            [
                'id_user' => '000010',
                'nama' => 'patriarki',
                'email' => 'kumalala123@gmail.com',
                'password' => 'rejak123',
                'tempat_tinggal' => 'Jalan jalan ga jadian',
                'nama_role' => 'Karyawan',
            ],
        ]);
    }
}
