<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('inventories')->insert([
            [
                'sku' => 'Example_SKU_1',
                'location' => 'warehouse1',
                'quantity' => 25,
                'cost' => 750,
                'batch' => 'LAPTOP-B1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sku' => 'Example_SKU_2',
                'location' => 'warehouse2',
                'quantity' => 60,
                'cost' => 20,
                'batch' => 'MOUSE-B2',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
