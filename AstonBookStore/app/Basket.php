<?php

namespace App;

class Basket
{
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0.00;

    /**
     * Basket constructor.
     * @param $oldBasket
     */
    public function __construct($oldBasket)
    {
        if ($oldBasket) {
            $this->items = $oldBasket->items;
            $this->totalQuantity = $oldBasket->totalQuantity;
            $this->totalPrice = $oldBasket->totalPrice;
        }
    }

    /**
     * Add an item to the basket
     *
     * @param $item
     * @param $id
     */
    public function add($item, $id)
    {
        $storedItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];
        //Check if the basket already contains the same item
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        // Creating a new item in the basket if there wasnt already a matching item
        $storedItem['quantity']++;
        $storedItem['price'] = $item->price;
        $this->items[$id] = $storedItem;
        $this->calculateTotals();
    }

    /**
     * Calculate the total cost and total number of items in the basket
     */
    public function calculateTotals()
    {
        $this->totalQuantity = 0;
        $this->totalPrice = 0.00;
        foreach ($this->items as $item) {
            $this->totalQuantity += $item['quantity'];
            $this->totalPrice += $item['quantity'] * $item['price'];
        }
        $this->totalPrice = number_format($this->totalPrice, 2, '.', '');
    }

    /**
     * Update the basket
     *
     * @param $request
     * @param $item
     * @param $id
     */
    public function update($request, $item, $id)
    {
        $this->items[$id]['quantity'] = 0;
        $storedItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];

        //Check if the basket already contains the same item
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
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

    /**
     * Remove an item from the basket
     *
     * @param $id
     */
    public function removeItem($id)
    {
        unset($this->items[$id]);
        $this->calculateTotals();
    }

}
