<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricingRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pricing_rules')->insert([
            [
                'sku' => 'Example_SKU_1',
                'type' => 'time_based',
                'price' => 699,
                'min_quantity' => 5,
                'start_time' => now(),
                'end_time' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sku' => 'Example _SKU_2',
                'type' => 'quantity_based',
                'price' => 18,
                'min_quantity' => 10,
                'start_time' => now(),
                'end_time' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
