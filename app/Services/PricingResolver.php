<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class PricingResolver
{
   public static function resolvePrice(string $sku, int $quantity): ?float
    {
        $time = now()->format('H:i:s');
        $day = now()->format('l'); //Thursday

        // This Check weekend-specific time-based pricing
        if (in_array($day, ['Saturday', 'Sunday'])) {
            $timeRule = DB::table('pricing_rules')
                ->where('sku', $sku)
                ->where('type', 'time_based')
                ->where('start_time', '<=', $time)
                ->where('end_time', '>=', $time)
                ->orderByDesc('start_time')
                ->first();

            if ($timeRule) {
                return $timeRule->price;
            }
        }

        //Quantity-based pricing
        $quantityRule = DB::table('pricing_rules')
            ->where('sku', $sku)
            ->where('type', 'quantity_based')
            ->where('min_quantity', '<=', $quantity)
            ->orderByDesc('min_quantity')
            ->first();

        if ($quantityRule) {
            return $quantityRule->price;
        }

        // Step 3: Fallback to product base price
        $product = DB::table('products')->where('sku', $sku)->first();
        return $product->price ?? null;
    }
}
