<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PricingResolver;
use Illuminate\Support\Facades\DB;


class TransactionController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $transactionId = DB::table('transactions')->insertGetId([
                'type' => 'sale',
                'executed_at' => now(),
                'day_of_week' => now()->format('l'), // Stores Days Of Week...
                'created_at' => now(),
                'updated_at' => now(),
            ]);


            foreach ($request->items as $item) {
                $sku = $item['sku'];
                $quantity = $item['quantity'];

                //This Lock inventory row to avoid concurrent updates

                $inventory = DB::table('inventories')
                    ->where('sku', $sku)
                    ->lockForUpdate()
                    ->first();

                if ($inventory->quantity < $quantity) {
                    throw new \Exception("Insufficient inventory for SKU: $sku");
                }


                //Here to use PricingResolver Service to get price
                $price = PricingResolver::resolvePrice($sku, $quantity);

                if ($price === null) {
                    throw new \Exception("No valid price found for SKU: $sku");
                }

                // 💾 Save transaction item
                DB::table('transaction_items')->insert([
                    'transaction_id' => $transactionId,
                    'sku' => $sku,
                    'quantity' => $quantity,
                    'price' => $price,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // This Reduce inventory
                DB::table('inventories')
                    ->where('sku', $sku)
                    ->decrement('quantity', $quantity);
            }

            DB::commit();
            return response()->json(['message' => 'Transaction completed successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
