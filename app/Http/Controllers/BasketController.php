<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
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
        Basket::create([
            'title' => $request->title,
            'image' => $request->image,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
        ]);

        return back()->with(['message' => 'Товар успешно добавлен в корзину',
        ]);
    }

    public function destroyBasket(Basket $basket)
    {
        $basket->delete();
        return back()->with(['message' => 'Товар удален',
        ]);
    }

    public function continueOrder(Request $request)
    {
        $priceCountArr = array_combine($request->price, $request->count);

        $result = null;
        foreach ($priceCountArr as $key => $val) {
            $result += $key * $val;
        }

        $ids = $request->product_id;
        $counts = $request->count;
        $mergeArr = array_combine($ids, $counts);

        $idOrderDB = array();
        foreach ($mergeArr as $id => $count) {
            $order = Order::create([
                'user_id' => $request->user_id,
                'count' => $count,
                'product_id' => $id,
                'sum' => $result,
            ]);

            $basket = Basket::where('user_id', $request->user_id)
                ->where('product_id', $id)
                ->first();
            $basket->delete();

            array_push($idOrderDB, $order->id);
        }

        return view('basket.continue', [
            'result' => $result,
            'idOrderDB' => $idOrderDB,


        ]);
    }

}
