<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamps = Carbon::now();

        DB::table('sellers')->insert([
            'email' => 'permataberkah@gmail.com',
            'password' => 'aminb3rk4h',
            'role' => 2,
            'name' => 'Bakso Berkah Pak Budi',
            'rent' => 5,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('sellers')->insert([
            'email' => 'ajisoko@gmail.com',
            'password' => 'a4jj11',
            'role' => 2,
            'name' => 'Bakso Berkah Pak Budi',
            'rent' => 5,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('sellers')->insert([
            'email' => 'diana77@gmail.com',
            'password' => 'di4na77',
            'role' => 2,
            'name' => 'Warung Nasi Goreng',
            'rent' => 4,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('sellers')->insert([
            'email' => 'mariana@gmail.com',
            'password' => 'yana123',
            'role' => 2,
            'name' => 'Salad Buah Yummy',
            'rent' => 3,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
    }
}
