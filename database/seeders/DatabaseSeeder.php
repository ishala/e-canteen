<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\HistoryTransaction;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            SellerSeeder::class,
            ProductSeeder::class,
            BuyerSeeder::class,
            TransactionSeeder::class,
            HistoryTransactionSeeder::class
        ]);
    }
}
