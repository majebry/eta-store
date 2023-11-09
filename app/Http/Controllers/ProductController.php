<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products/index')->with('myProducts', Product::latest()->get());

        // Category::find(3)->products()->orderBy('price', 'DESC')->get()
    }

    public function create()
    {
        $categories = Category::all();
        
        return view('products/create')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        // php artisan storage:link

        $p = new Product;

        $p->name = request('name');
        $p->price = request('price');
        $p->description = request('description');
        $p->category_id = request('category_id');

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

    public function edit($id)
    {
        $categories = Category::all();

        $product = Product::find($id);
        
        return view('products/edit')
            ->with('categories', $categories)
            ->with('product', $product);
    }

    public function update($id)
    {
        $p = Product::find($id);

        $p->name = request('name');
        $p->price = request('price');
        $p->description = request('description');
        $p->category_id = request('category_id');

        if (request('image')) {
            $imagePath = request('image')->store('product_images');

            $p->image = $imagePath;
        }

        $p->save();

        return redirect('products');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect('products');
    }
}
