<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function add(Request $request)
    {
        $item = new Customer;
        $item->fill(($request->all()));
        $item->save();
        return response()->json(['status' => 'succuss']);
    }
    function list()
    {
        $result = [];
        $items = Customer::all();
        foreach ($items as $item) {
            $result[] = [
                'id' => $item->id,
                'name' => $item->name,
                'products' => $item->products
            ];
        }
        return response()->json(['list' => $result]);
    }
}
