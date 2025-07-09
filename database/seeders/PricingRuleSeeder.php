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
                'sku' => 'SKU_1',
                'type' => 'time_based',
                'price' => 720,
                'min_quantity' => Null,
                'start_time' => now(),
                'end_time' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sku' => 'SKU_2',
                'type' => 'quantity_based',
                'price' => 700,
                'min_quantity' => 10,
                'start_time' => now(),
                'end_time' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
