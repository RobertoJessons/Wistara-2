<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        DB::table('supplier')->insert([
            [
                'id_supplier' => 'S001',
                'nama_supplier' => 'sapro',
                'alamat' => 'jalan ya disitu la pokoknya nomor 5',
                'nomor_telepon_supplier' => '0823567890',
            ],
            [
                'id_supplier' => '00002',
                'nama_supplier' => 'suryo',
                'alamat' => 'jalan ya disitu la pokoknya nomor 6',
                'nomor_telepon_supplier' => '0823567891',
            ],
            [
                'id_supplier' => '00003',
                'nama_supplier' => 'madin',
                'alamat' => 'jalan ya disitu la pokoknya nomor 7',
                'nomor_telepon_supplier' => '0823567892',
            ],
            [
                'id_supplier' => '00004',
                'nama_supplier' => 'sandi jamet',
                'alamat' => 'jalan kaki',
                'nomor_telepon_supplier' => '081258271945',
            ],
            [
                'id_supplier' => '00005',
                'nama_supplier' => 'mimmoy',
                'alamat' => 'jalan paragon',
                'nomor_telepon_supplier' => '081256779933',
            ],
            [
                'id_supplier' => '00006',
                'nama_supplier' => 'micel ranting',
                'alamat' => 'jalan kokonat',
                'nomor_telepon_supplier' => '081256779045',
            ],
            [
                'id_supplier' => '00007',
                'nama_supplier' => 'stepani karolin cen',
                'alamat' => 'jalan ya jalan aja',
                'nomor_telepon_supplier' => '081256726945',
            ],
            [
                'id_supplier' => '00008',
                'nama_supplier' => 'akiong store',
                'alamat' => 'jalan jalan doang',
                'nomor_telepon_supplier' => '082156778945',
            ],
            [
                'id_supplier' => '00009',
                'nama_supplier' => 'valen yakult',
                'alamat' => 'jalan pendek',
                'nomor_telepon_supplier' => '081256773245',
            ],
            [
                'id_supplier' => '00010',
                'nama_supplier' => 'Pelik 40',
                'alamat' => 'jalan panorama',
                'nomor_telepon_supplier' => '081256778912',
            ],
        ]);
    }
}
