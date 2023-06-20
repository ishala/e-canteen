<?php

namespace Database\Seeders;

use App\Models\Seller;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seller = Seller::all();  
        $timestamps = Carbon::now();

        DB::table('products')->insert([
            'name' => 'Bakso Spesial',
            'price' => 15000,
            'category' => 1,
            'seller_id' => $seller[0]->id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);

        DB::table('products')->insert([
            'name' => 'Sate Madura',
            'price' => 15000,
            'category' => 1,
            'seller_id' => $seller[3]->id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('products')->insert([
            'name' => 'Es Teh Jumbo',
            'price' => 5.000,
            'category' => 2,
            'seller_id' => $seller[3]->id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('products')->insert([
            'name' => 'Es Teh',
            'price' => 3.000,
            'category' => 2,
            'seller_id' => $seller[3]->id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('products')->insert([
            'name' => 'Nasi Goreng Sosis',
            'price' => 16000,
            'category' => 1,
            'seller_id' => $seller[1]->id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);

        DB::table('products')->insert([
            'name' => 'Nasi Goreng Bakso',
            'price' => 16000,
            'category' => 1,
            'seller_id' => $seller[1]->id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('products')->insert([
            'name' => 'Nasi Goreng Spesial',
            'price' => 20000,
            'category' => 1,
            'seller_id' => $seller[1]->id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('products')->insert([
            'name' => 'Es Jeruk',
            'price' => 4000,
            'category' => 2,
            'seller_id' => $seller[3]->id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('products')->insert([
            'name' => 'Salad Buah',
            'price' => 14000,
            'category' => 1,
            'seller_id' => $seller[2]->id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('products')->insert([
            'name' => 'Salad Buah Spesial',
            'price' => 18000,
            'category' => 1,
            'seller_id' => $seller[2]->id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
    }
}
