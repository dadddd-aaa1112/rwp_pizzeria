<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $title;

    public function __construct()
    {
        $this->title = 'Заказы';
    }

    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.order.index', [
            'orders' => $orders,
            'title' => $this->title,

        ]);
    }
}
