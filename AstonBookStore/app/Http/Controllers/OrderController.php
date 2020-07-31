<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Gate;

class OrderController extends Controller
{
    public function displayOrders()
    {
        $ordersQuery = Order::all();
        if (Gate::denies('displayall')) {
            $ordersQuery = $ordersQuery->where('userid', auth()->user()->id);
        }
        return view('orders', array('orders' => $ordersQuery));
    }
}
