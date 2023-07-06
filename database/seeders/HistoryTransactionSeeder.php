<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HistoryTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = Product::all();
        $timestamps = Carbon::now();

        DB::table('history_transactions')->insert([
            'total_price' => 10000,
            'num_table' => 3,
            'all_products' => implode(',', [$product[0]->name, $product[1]->name, $product[2]->name]),
            'trans_id' => '2, 3',
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('history_transactions')->insert([
            'total_price' => 15000,
            'num_table' => 1,
            'all_products' => implode(',', [$product[2]->name, $product[1]->name, $product[3]->name]),
            'trans_id' => '1',
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('history_transactions')->insert([
            'total_price' => 30000,
            'num_table' => 2,
            'all_products' => implode(',', [$product[1]->name, $product[2]->name, $product[3]->name]),
            'trans_id' => '2, 3',
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
        DB::table('history_transactions')->insert([
            'total_price' => 30000,
            'num_table' => 2,
            'all_products' => implode(',', [$product[1]->name, $product[2]->name, $product[3]->name]),
            'trans_id' => '3,4',
            'created_at' => $timestamps,
            'updated_at' => $timestamps
        ]);
    }
}
