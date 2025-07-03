<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the \"api\" middleware group. Enjoy building your API!
|
*/

Route::get('/inventory', [InventoryController::class, 'index']);

Route::get('/inventory/{sku}', [InventoryController::class, 'show']);

Route::put('/inventory/{sku}/quantity', [InventoryController::class, 'updateQuantity']);

Route::post('/products', [ProductController::class, 'store']);

Route::get('/products/{sku}', [ProductController::class, 'show']);

Route::post('/transactions/sale', [TransactionController::class, 'store']);