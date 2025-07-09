<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->truncate(); // Clears existing data

        DB::table('products')->insert([
            [
                'sku' => 'SKU_1',
                'name' => 'Product One',
                'description' => 'Time-based priced product',
                'price'=> 800,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sku' => 'SKU_2',
                'name' => 'Product Two',
                'description' => 'Quantity-based priced product',
                'price'=> 850,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
