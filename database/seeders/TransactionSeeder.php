<?php

namespace Database\Seeders;

use App\Models\Buyer;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buyer = Buyer::all();
        $product = Product::all();
        $timestamps = Carbon::now();

        DB::table('transactions')->insert([
            'price' => 15000,
            'quantity' => 1,
            'buyer_id' => $buyer[0]->id,
            'product_id' => $product[1]->id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('transactions')->insert([
            'price' => 30000,
            'quantity' => 2,
            'buyer_id' => $buyer[2]->id,
            'product_id' => $product[2]->id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('transactions')->insert([
            'price' => 10000,
            'quantity' => 2,
            'buyer_id' => $buyer[2]->id,
            'product_id' => $product[3]->id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('transactions')->insert([
            'price' => 9000,
            'quantity' => 3,
            'buyer_id' => $buyer[1]->id,
            'product_id' => $product[3]->id,
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
    }
}
