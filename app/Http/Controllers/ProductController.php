<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{

    public function store(Request $request)
{
    $request->validate([
        'sku' => 'required|unique:products,sku',
        'name' => 'required|string',
        'description' => 'nullable|string',
        'price' => 'required|numeric'
    ]);

    DB::table('products')->insert([
        'sku' => $request->sku,
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return response()->json(['message' => 'Product created successfully']);
}


    public function show($sku)
{
    $product = DB::table('products')->where('sku', $sku)->first();

    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    return response()->json($product);
}

}
