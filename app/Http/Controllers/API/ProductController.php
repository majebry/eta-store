<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store()
    {
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

        return $p;
    }
}
