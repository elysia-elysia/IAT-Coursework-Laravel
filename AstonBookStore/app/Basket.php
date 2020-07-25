<?php
namespace App;

class Basket
{
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0.00;


    public function __construct($oldBasket)
    {
        if ($oldBasket){
            $this->items = $oldBasket->items;
            $this->totalQuantity = $oldBasket->totalQuantity;
            $this->totalPrice = $oldBasket->totalPrice;
        }
    }

    public function add($item, $id){
        $storedItem = ['quantity'=> 0, 'price'=> $item->price, 'item'=> $item];
        //Check if the basket already contains the same item
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        // Creating a new item in the basket if there wasnt already a matching item
        $storedItem['quantity']++;
        $storedItem['price'] = $item->price;
        $this->items[$id] = $storedItem;
        $this->calculateTotals();
    }

//    public function remove($item, $id){
//
//        //Check if the basket already contains the same item
//        if($this->items){
//            if(array_key_exists($id, $this->items)){
//                // Remove item from basket
//                $this->totalQuantity -= $this->totalQuantity;
//                $this->totalPrice -= $item->price * $item->quantity;
//                unset($this->items[$id]);
//            }
//        }
//    }
//
    public function update($request,$item, $id){
        $this->items[$id]['quantity'] = 0;
        $storedItem = ['quantity'=> 0, 'price'=> $item->price, 'item'=> $item];

        //Check if the basket already contains the same item
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
                $storedItem['quantity'] = $request->input('quantity');
                $storedItem['price'] = $item->price;

                $this->items[$id] = $storedItem;
                $this->calculateTotals();
            }
        }

        if ($this->items[$id]['quantity'] <= 0) {
            $this->removeItem($id);
        }
    }

    public function removeItem($id) {

        unset($this->items[$id]);
        $this->calculateTotals();
    }

    public function calculateTotals(){
        $this->totalQuantity = 0;
        $this->totalPrice = 0.00;
        foreach ($this->items as $item){
            $this->totalQuantity += $item['quantity'];
            $this->totalPrice += $item['quantity'] * $item['price'];
        }
    }

}