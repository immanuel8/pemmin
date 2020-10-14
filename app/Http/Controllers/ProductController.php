<?php

namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;

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

    public function store(Request $request)

    {
        $product = Product::create([
            'name' => $request->name, 
            'price' => $request->price, 
            'rating' => $request->rating, 
            'quantity' => $request->quantity 

        ]);
        if($product) {
        return response()->json([
            'message' => 'produk berhasil disimpan',
            'data' => $product
        ], 200);     
        }
        else {
        return response()->json([
            'message' => 'produk gagal disimpan'
        ], 401);
        }
    }


        public function destroy($id)
        {
        $product = Product::find($id);
         if($product){
             $product->delete();
            return response()->json([
            'message' => 'produk berhasil dihapus',
            ], 200);        
          }else {
             return response()->json([
            'message' => 'produk tidak ada'
            ], 404);
    }
}

        public function  update(Request $request, $id)
        {
            $product = Product::whereid($id)->update([
                'name' => $request->name, 
                'price' => $request->price, 
                'rating' => $request->rating, 
                'quantity' => $request->quantity 
    
            ]);
            if($product) {
            return response()->json([
                'message' => 'produk berhasil diupdate',
                'data' => $id
            ], 200);     
            }
            else {
            return response()->json([
                'message' => 'produk gagal diupdate'
            ], 401);
            }
   
        }
}