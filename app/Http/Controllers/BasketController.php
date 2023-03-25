<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index()
    {
        $forAuthUser = Basket::where('user_id', auth()->user()->id)->get();
        $basket = Basket::orderBy('category_id')->get();
        return view('basket.index', [
            'basket' => $basket,
            'forAuthUser' => $forAuthUser
        ]);
    }

    public function storeBasket(Request $request)
    {
        //  dd($request);
        Basket::create([
            'title' => $request->title,
            'image' => $request->image,
            'price_id' => $request->price_id,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
        ]);

        return back()->with(['message' => 'Товар успешно добавлен в корзину',
        ]);
    }

}
