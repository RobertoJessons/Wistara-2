<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataBaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(TransaksiPenjualanSeeder::class);
        $this->call(NotaPenjualanSeeder::class);
        $this->call(TransaksiPembelianSeeder::class);
        $this->call(NotaPembelianSeeder::class);
        $this->call(StokSeeder::class);
        $this->call(SessionsTableSeeder::class);
    }
}
