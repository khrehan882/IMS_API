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
                'sku' => 'Example _SKU_1',
                'name' => 'Laptop',
                'description' => '14 inch gaming laptop',
                'price'=> 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sku' => 'Example_SKU_2',
                'name' => 'Wireless Mouse',
                'description' => 'Bluetooth enabled mouse',
                'price'=> 800,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
