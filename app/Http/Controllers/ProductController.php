<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products/index')->with('myProducts', Product::latest('id')->where('name', 'aaaa')->get());
    }

    public function create()
    {
        return view('products/create');
    }

    public function store(Request $request)
    {
        $p = new Product;

        $p->name = request('name');
        $p->price = request('price');
        $p->description = request('description');

        $p->save();

        return redirect('products');
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('products/show')->with('item', $product);
    }
}
