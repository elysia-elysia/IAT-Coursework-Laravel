<?php
namespace App;

class Basket
{
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;


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
        // Creating a new item in the cart if there wasnt already a matching item
        $storedItem['quantity']++;
        $storedItem['price'] = $item->price * $storedItem['quantity'];
        $this->items[$id] = $storedItem;
        $this->totalQuantity++;
        $this->totalPrice += $item->price;
    }
}
