<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class ProductController extends Controller
{
    public function getProducts($storeID)
    {
        // Get the store
        $store = Store::find($storeID);
        // dd($store);
        // If the store does not exist, return an error
        if (!$store) {
            return response()->json(['message' => "Store not found"], 404);
        }
    
        // If the store does exist, return its products
        return response()->json($store->products);
    }
}
