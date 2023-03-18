<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public $title;

    public function __construct()
    {
        $this->title = 'Продукты';
    }

    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.product.index', [
            'products' => $products,
            'title' => $this->title,

        ]);
    }

    public function storeProduct(StoreRequest $request)
    {
        if (!empty($data['image'])) {
            $data['image'] = 'https://imgs.search.brave.com/mM8IwuXIBPE4lNJ7KB9iWs-25gwJoX2RUCRCcQmQ5WM/rs:fit:851:225:1/g:ce/aHR0cHM6Ly90c2Uy/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5f/V3BsYlFiMWhkbk9M/cjQwekJySWNnSGFF/SSZwaWQ9QXBp';

            $name = Carbon::now() . '_' . $data['image']->getClientOriginalExtension();
            $filePath = Storage::disk('public')->putFileAs('/images', $data['image'], $name);
            $image = url('/storage/' . $filePath);

        }

    }
}
