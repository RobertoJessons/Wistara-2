<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        DB::table('customer')->insert([
            [
                'nomor_telepon' => '081234567891',
                'nama_customer' => 'walawe',
                'password' => 'walawe123',
                'poin' => '69',
                'tanggal_mendaftar' => now(),
            ],
            [
                'nomor_telepon' => '081234567892',
                'nama_customer' => 'balong',
                'password' => 'balong123',
                'poin' => '0',
                'tanggal_mendaftar' => now(),
            ],
            [
                'nomor_telepon' => '081234567893',
                'nama_customer' => 'san huang',
                'password' => 'sanhuang123',
                'poin' => '40',
                'tanggal_mendaftar' => now(),
            ],
            [
                'nomor_telepon' => '081234567694',
                'nama_customer' => 'Rendi',
                'password' => 'rendi123',
                'poin' => '4',
                'tanggal_mendaftar' => now(),
            ],
            [
                'nomor_telepon' => '082134567895',
                'nama_customer' => 'akiong pan8',
                'password' => 'akiong123',
                'poin' => '14',
                'tanggal_mendaftar' => now(),
            ], [
                'nomor_telepon' => '081234567233',
                'nama_customer' => 'reynaldo',
                'password' => 'qiwue12',
                'poin' => '17',
                'tanggal_mendaftar' => now(),
            ], [
                'nomor_telepon' => '081234567800',
                'nama_customer' => 'san rio',
                'password' => 'sanrio123',
                'poin' => '21',
                'tanggal_mendaftar' => now(),
            ], [
                'nomor_telepon' => '081234565493',
                'nama_customer' => 'huang so he',
                'password' => 'sohee123',
                'poin' => '77',
                'tanggal_mendaftar' => now(),
            ], [
                'nomor_telepon' => '081234593763',
                'nama_customer' => 'mythical fish',
                'password' => 'mancing123',
                'poin' => '9',
                'tanggal_mendaftar' => now(),
            ], [
                'nomor_telepon' => '081234563213',
                'nama_customer' => 'san jose',
                'password' => 'sanjose123',
                'poin' => '7',
                'tanggal_mendaftar' => now(),
            ],
        ]);
    }
}