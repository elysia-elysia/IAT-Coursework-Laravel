<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Gate;

class OrderController extends Controller
{
    /*public function customerOrder($id){
        $order = Order::find($id);
        return view('orders', array('order' => $order));
    }*/

    /*public function orders(){
        return view('orders', array('orders'=>Order::all()));
    }*/
    public function displayOrders()
    {
/*        if (auth()->user()->role == 1 || auth()->user()->role == 0) {
            $ordersQuery = Order::all();
            if (Gate::denies('displayall')) {
                $ordersQuery = $ordersQuery->where('userid', auth()->user()->id);
            }
            return view('orders', array('orders' => $ordersQuery));
        }

        return redirect('welcome')->with('error', 'Sorry, you do not have permission to see that.');*/

        $ordersQuery = Order::all();
        if (Gate::denies('displayall')) {
            $ordersQuery = $ordersQuery->where('userid', auth()->user()->id);
        }
        return view('orders', array('orders' => $ordersQuery));
    }
}
