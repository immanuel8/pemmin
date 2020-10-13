<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'message' => 'menampilkan semua produk',
            'data' => $products
        ], 200);  
    }

    public function show($id)
    {
        $product = Product::find($id);
        if($product)
        {
            return response()->json([
                'message' => 'produk berhasil ditemukan',
                'data' => $product
            ], 200);        
        }else {
            return response()->json([
                'message' => 'produk tidak ada'
            ], 404);
        }
    }
}
