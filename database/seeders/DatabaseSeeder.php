<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(TransaksiPenjualanSeeder::class);
        $this->call(NotaPenjualanSeeder::class);
        $this->call(TransaksiPembelianSeeder::class);
        $this->call(NotaPembelianSeeder::class);
        $this->call(StokSeeder::class);
    }
}