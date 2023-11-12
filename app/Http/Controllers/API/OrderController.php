<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store()
    {
        $customer = auth()->user();
        
        $order = new Order;
        $order->customer_id = $customer->id;
        $order->save();

        foreach (request('products') as $product) {
            $product = Product::find($product['id']);

            $item = $order->items()->make(); // new OrderItem associated with the created order
            $item->product_id = $product->id;
            $item->quantity = $product['quantity'] ? $product['quantity'] : 1;
            $item->sold_price = $product->price;

            $item->save();
        }

        return response()->json(['order' => $order->load('items')]);
    }
}
