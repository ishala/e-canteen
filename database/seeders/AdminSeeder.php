<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamps = Carbon::now();
        
        DB::table('admins')->insert([
            'email' => 'cahaya@gmail.com',
            'password' => 'chy123',
            'role' => 1,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('admins')->insert([
            'email' => 'faizaummu@gmail.com',
            'password' => 'faizummu99',
            'role' => 1,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
    }
}
