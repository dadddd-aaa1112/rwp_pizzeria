<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Category;
use App\Models\Price;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public $title;

    public function __construct()
    {
        $this->title = 'Продукты';
    }

    /**
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.product.index', [
            'products' => $products,
            'title' => $this->title,

        ]);
    }

    public function storeProduct(StoreRequest $request)
    {
        $data = $request->validated();

        if (!empty($data['image'])) {
            $name = md5(Carbon::now() . '_' . $data['image']->getClientOriginalName()) . '_' . $data['image']->getClientOriginalExtension();
            $filePath = Storage::disk('public')->putFileAs('/images', $data['image'], $name);
            $data['image'] = url('/storage/' . $filePath);
        }

        Product::firstOrCreate([
            'title' => $data['title'],
        ], [
            'image' => $data['image'] ?? null,
            'price_id' => $data['price_id'],
            'category_id' => $data['category_id'],
        ]);

        $products = Product::orderBy('created_at', 'desc')->paginate(10);

        return redirect()->route('product_index', [
            'products' => $products,
            'title' => $this->title,
        ])->with(['message' => 'Товар успешно добавлен']);

    }

    /**
     * Форма для добавления продукта
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function addProduct(): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        $prices = Price::orderBy('price')->get();

        return view('admin.product.store', [
            'title' => 'Добавить продукт',
            'categories' => $categories,
            'prices' => $prices,
        ]);
    }
}
