<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $products = Product::orderBy('category_id')->paginate(8);
        return view('welcome', [
            'products' => $products
        ]);
    }

    public function about() {
        return view('about.index', [
        ]);
    }

    public function contact() {
        return view('contact.index', [
        ]);
    }
}
