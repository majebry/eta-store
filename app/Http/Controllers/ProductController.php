<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return 'Hello index';
    }

    public function create()
    {
        $p = new Product;

        $p->name = 'Hat';
        $p->price = 18;
        $p->description = 'Nice small hat for children';

        $p->save();
    }
}
