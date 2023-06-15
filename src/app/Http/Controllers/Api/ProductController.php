<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function add(Request $request)
    {
        $item = new Product;
        $item->fill(($request->all()));
        $item->save();
        return response()->json(['status' => 'succuss']);
    }
    function list()
    {
        $result = [];
        $items = Product::with(Customer::class)->get();
        foreach ($items as $item) {
            $result[] = [
                'id' => $item->id,
                'name' => $item->name,
                'date' => date('m/d', strtotime($item->purchase_date)),
                'customer_name' => $item->customer->name,
            ];
        }
        return response()->json(['list' => $result]);
    }
}
