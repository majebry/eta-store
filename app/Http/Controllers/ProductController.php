<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products/index')->with('myProducts', Product::latest()->get());
    }

    public function create()
    {
        return view('products/create');
    }

    public function store(Request $request)
    {
        // php artisan storage:link


        $p = new Product;

        $p->name = request('name');
        $p->price = request('price');
        $p->description = request('description');

        if (request('image')) {
            $imagePath = request('image')->store('product_images');

            $p->image = $imagePath;
        }

        $p->save();

        return redirect('products');
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('products/show')->with('item', $product);
    }
}
