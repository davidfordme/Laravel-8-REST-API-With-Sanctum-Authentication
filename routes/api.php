<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/products', function() {
    return Product::all();
});

Route::post('/products', function() {
    //Post method to create a product in the db
    return Product::create([
        'name' => 'Product 1',
        'slug' => 'product-1',
        'description' => 'This is the first product',
        'sku' => 'PRO001',
        'price' => 50.99
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
