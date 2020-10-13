<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    public function show($id)
    {
        $product = Product::find($id);
        if($product)
        {
             return $product;
        }else {
            return response()->json([
                'message' => 'produk tidak ada'
            ], 404);
        }
    }
}
