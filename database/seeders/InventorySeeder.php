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
                'sku' => 'SKU_1',
                'location' => 'Warehouse A',
                'quantity' => 100,
                'cost' => 700,
                'batch' => 'LOT123-TB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sku' => 'SKU_2',
                'location' => 'Warehouse B',
                'quantity' => 60,
                'cost' => 750,
                'batch' => 'LOT456-QB',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
