<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $products = Product::orderBy('category_id')->paginate(10);
        return view('welcome', [
            'products' => $products
        ]);
    }
}
