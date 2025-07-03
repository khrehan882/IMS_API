<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class InventoryController extends Controller
{
    public function index(Request $request)
{
    $query = DB::table('inventories');

    if ($request->has('filter.location')) {
        $query->where('location', $request->input('filter.location'));
    }

    //pagination Logic

    $inventories = $query->paginate($request->input('limit', 50));

    return response()->json($inventories);
}


//Get Single Item Details logic.
public function show($sku)
{
    $item = DB::table('inventories')->where('sku', $sku)->first();

    if (!$item) {
        return response()->json(['error' => 'Inventory item not found'], 404);
    }

    return response()->json($item);
}

public function updateQuantity(Request $request, $sku)
{
    try {
        $quantity = $request->input('quantity');

        if (!is_numeric($quantity)) {
            return response()->json(['error' => 'Invalid quantity'], 422);
        }

        $updated = DB::table('inventories')
            ->where('sku', $sku)
            ->update(['quantity' => $quantity]);

        if ($updated === 0) {
            return response()->json(['error' => 'Inventory item not found'], 404);
        }

        return response()->json(['message' => 'Quantity updated']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


}
