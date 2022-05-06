<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * request: GET
     * url: '/products'
     * opt: all products
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     * request: POST
     * url: '/products'
     * opt: Record new product to
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);

        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * request: GET
     * url: /products/{$id}
     * opt: single product
     */
    public function show($id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * request: PUT
     * url: '/products/{$id}
     * opt: update the selected product
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     * request: DELETE
     * url: '/products/{$id}'
     * opt: true/error response but deletes selected product
     */
    public function destroy($id)
    {
        return Product::destroy($id);   
    }

    /**
     * Search for a name
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     * 
     * request: GET
     * url: '/products/search/{$name}'
     * opt: pass in a search query (name) and get a sql where like response
     */
    public function search($name)
    {
        return Product::where('name', 'like', '%' . $name . '%')->get();   
    }
}
