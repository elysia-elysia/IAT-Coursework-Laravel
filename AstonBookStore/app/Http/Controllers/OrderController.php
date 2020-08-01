<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Book;
use App\Notifications\OrderSuccessNotification;
use Illuminate\Http\Request;
use App\Order;
use Gate;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Session;


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

    //Basket Functions
    public function getBasket()
    {
        if (!Session::has('basket')) {
            return view('/basket');
        }
        $oldBasket = Session::get('basket');
        $basket = new Basket($oldBasket);
        return view('/basket', ['books' => $basket->items, 'totalPrice' => $basket->totalPrice, 'totalQuantity' => $basket->totalQuantity]);
    }

    public function addToBasket(Request $request, $id)
    {
        $book = Book::find($id);
        $oldBasket = Session::has('basket') ? Session::get('basket') : null;
        $basket = new Basket($oldBasket);
        $basket->add($book, $book->id);

        $request->session()->put('basket', $basket);
        return redirect()->route('books.index')->with('success', 'Book added to your basket successfully!');
    }

    public function removeFromBasket($id)
    {
        $oldBasket = Session::has('basket') ? Session::get('basket') : null;
        $basket = new basket($oldBasket);
        $basket->removeItem($id);

        if (count($basket->items) > 0) {
            Session::put('basket', $basket);
        } else {
            Session::forget('basket');
        }

        return back()->with('success', 'Book removed from your basket successfully!');
    }

    public function updateBasketQuantity(Request $request, $id)
    {
        $book = Book::find($id);
        $oldBasket = Session::has('basket') ? Session::get('basket') : null;
        $basket = new Basket($oldBasket);
        $basket->update($request, $book, $book->id);

        $request->session()->put('basket', $basket);
        return back()->with('success', 'Book quantity changed successfully!');
    }

    //Checkout Functions
    public function getCheckout()
    {
        if (!Session::has('basket')) {
            return view('/basket');
        }

        $oldBasket = Session::get('basket');
        $basket = new Basket($oldBasket);
        $errorArray = [];

        foreach ($basket->items as $item) {
            $book = Book::find($item['item']['id']);

            if ($item['quantity'] > $book->stock) {
                $errorArray[] = " You have added " . $item['quantity'] . " " . $book->title . "to your basket, but there are only " . $book->stock . " in stock.";
            }
        }
        if (count($errorArray) == 0) {
            $total = $basket->totalPrice;
            return view('checkout', ['totalPrice' => $total]);
        } else {
            return back()->withErrors([$errorArray, " Please remove some items from your basket. "]);
        }
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('basket')) {
            return view('/basket');
        }
        $oldBasket = Session::get('basket');
        $basket = new Basket($oldBasket);

        $order = new Order();
        $order->username = $request->input('name');
        $order->userid = auth()->user()->id;
        $order->address = $request->input('address');
        $order->cardno = $request->input('card-number');
        $order->orderprice = $basket->totalPrice;
        $order->orderquantity = $basket->totalQuantity;

        $order->save();
        foreach ($basket->items as $item) {
            $book = Book::find($item['item']['id']);
            $book->stock = $book->stock - $item['quantity'];
            $book->updated_at = now();
            $book->save();
        }
        $this->sendOrderReceiptNotification($order->id, $order->orderprice);
        Session::forget('basket');
        return redirect('/order/success');
    }

    public function sendOrderReceiptNotification($ordernum, $orderprice)
    {
        $user = auth()->user();
        $details = [
            'ordernum' => $ordernum,
            'orderprice' => $orderprice
        ];
        $user->notify(new OrderSuccessNotification($details));
    }
}
