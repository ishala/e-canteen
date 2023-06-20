<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BuyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamps = Carbon::now();

        DB::table('buyers')->insert([
            'name' => 'Muhammad Ali',
            'email' => 'muhammad33@gmail.com',
            'password' => 'al12345',
            'role' => 3,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('buyers')->insert([
            'name' => 'Dhafazra Dafa',
            'email' => 'dafadhafazra001@gmail.com',
            'password' => 'dh4fa001',
            'role' => 3,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('buyers')->insert([
            'name' => 'Muhammad Rizky',
            'email' => 'rizkyjack@gmail.com',
            'password' => 'j4acx22',
            'role' => 3,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('buyers')->insert([
            'name' => 'Widiya Sari',
            'email' => 'ccelaaw@gmail.com',
            'password' => 'sar111',
            'role' => 3,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
    }
}
