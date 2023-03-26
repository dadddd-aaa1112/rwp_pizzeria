<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function storeOrder()
    {
        return redirect()->route('basket_index')->with(['message' => 'Ваш заказ успешно создан']);
    }

    public function destroyOrder(Request $request)
    {
        foreach ($request->ids as $item) {
            Order::find($item)->delete();
        }
        return redirect()->route('basket_index')->with(['message' => 'Ваш заказ отменен']);
    }
}
