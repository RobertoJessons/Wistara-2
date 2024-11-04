<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sessions')->insert([
            [
                'id' => Str::uuid()->toString(),
                'user_id' => 1, // Sesuaikan dengan ID pengguna yang ada atau null jika tidak terkait dengan pengguna tertentu
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36',
                'payload' => base64_encode(serialize([])), // Payload kosong
                'last_activity' => now()->timestamp,
            ],
            [
                'id' => Str::uuid()->toString(),
                'user_id' => null, // Jika sesi tidak terkait dengan pengguna tertentu
                'ip_address' => '192.168.1.1',
                'user_agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/14.0.3 Safari/605.1.15',
                'payload' => base64_encode(serialize([])),
                'last_activity' => now()->subMinutes(5)->timestamp,
            ]
        ]);
    }
}
